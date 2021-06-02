<?php

$isCmd = defined('STDIN');

require_once './version.php';

/**
 * Instructions:
 *
 * 1. Put this into the document root of your Kirby site
 * 2. Make sure to setup the base url for your site correctly
 * 3. Run this script with `php statify.php` or open it in your browser
 * 4. Upload all files and folders from the version (e.g. 2.7 or 3.0) dir to your server
 * 5. Test your site
 */

// Define version prefix for menu
global $version_prefix;
$version_prefix = '/docs/' . DOCS_VERSION;

// Setup the base url for your site here
$url = 'https://svgdotjs.com' . $version_prefix;

// Don't touch below here
define('DS', DIRECTORY_SEPARATOR);

// load the cms bootstrapper
include(__DIR__ . DS . 'kirby' . DS . 'bootstrap.php');

$kirby = kirby();

$kirby->urls->index = $version_prefix;

$site = $kirby->site();

if($site->multilang()) {
  die('Multilanguage sites are not supported');
}

// root dir
$root = __DIR__ . $version_prefix . DS;

dir::copy(__DIR__ . DS . 'assets',  $root . 'assets');
dir::copy(__DIR__ . DS . 'content', $root . 'content');

// set the timezone for all date functions
date_default_timezone_set($kirby->options['timezone']);

// load all extensions
$kirby->extensions();

// load all plugins
$kirby->plugins();

// load all models
$kirby->models();

// load all language variables
$kirby->localize();

foreach($site->index() as $page) {
  // render page
  $site->visit( $page->uri() );
  $html = $kirby->render( $page );

  // convert h2-6 tags
  $html = preg_replace_callback( "#<(h[1-6])>(.*?)</\\1>#", 'retitle', $html );

  // set root base
  $name = $page->isHomePage() ? 'index.html' : $page->uri() . DS . 'index.html';

  // write static file
  f::write($root . $name, $html);
}

// write CNAME file
file_put_contents( $root . 'CNAME', 'svgdotjs.com' );

// move 404 file
rename( $root . '404/index.html', $root . '404.html' );
rmdir( $root . '404' );

if($isCmd) {
  echo "Version ".DOCS_VERSION." was exported to $version_prefix\n";
  exit;
}

// helpers
function retitle( $match ) {
  list( $_unused, $hx, $title ) = $match;

  // clean id
  $id = strtolower( preg_replace( '/[^A-Za-z0-9-]+/', '-', strip_tags( $title ) ) );
  $id = preg_replace( '/^\-/', '', preg_replace( '/-$/', '', $id ) );

  return "<$hx id='$id'>$title</$hx>";
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Statification</title>
</head>
<body>

Your site has been exported to the <b><?php echo $version_prefix ?></b> folder.<br />
Copy all sites and folders from there and upload them to your server.<br />
Make sure the main URL is correct: <b><?php echo $url ?></b>

</body>
</html>
