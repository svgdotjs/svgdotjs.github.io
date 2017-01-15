<?php

header( 'Content-Type: text/html' );

/**
 * Instructions:
 *
 * 1. Put this into the document root of your Kirby site
 * 2. Make sure to setup the base url for your site correctly
 * 3. Run this script with `php statify.php` or open it in your browser
 * 4. Upload all files and folders from static to your server
 * 5. Test your site
 */

// Setup the base url for your site here
$url = 'https://svgdotjs.github.io/';

// Don't touch below here
define('DS', DIRECTORY_SEPARATOR);

// load the cms bootstrapper
include(__DIR__ . DS . 'kirby' . DS . 'bootstrap.php');

$kirby = kirby();
$kirby->urls->index = $url;

$site = $kirby->site();

if($site->multilang()) {
  die('Multilanguage sites are not supported');
}

dir::copy(__DIR__ . DS . 'assets',  __DIR__ . DS . 'static' . DS . 'assets');
dir::copy(__DIR__ . DS . 'content', __DIR__ . DS . 'static' . DS . 'content');

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

// build json index for static search
$index = [];

foreach($site->index() as $page) {
  // render page
  $site->visit( $page->uri() );
  $html = $kirby->render( $page );

  // convert h2 tags
  $html = preg_replace_callback( "#<(h[2-6])>(.*?)</\\1>#", 'retitle', $html );

  // set root base
  $root  = __DIR__ . DS . 'static' . DS;
  $root .= $page->isHomePage() ? 'index.html' : $page->uri() . DS . 'index.html';

  // write static file
  f::write($root, $html);
  
  // add every page as json object to index
  array_push( $index, [
    'uri'  => $page->uri()
  , 'text' => str_replace( PHP_EOL, ' ', strip_tags( html_entity_decode( $page->text()->kirbytext() )))
  ]);

}

// write json index
file_put_contents( __DIR__ . DS . 'static' . DS . 'index.json',  'var documents = ' . json_encode( $index ) );

// helpers
function retitle( $match ) {
  list( $_unused, $hx, $title ) = $match;

  $id = strtolower( preg_replace( '/[^A-Za-z0-9-]+/', '-', $title ) );

  return "<$hx id='$id'>$title</$hx>";
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Statification</title>
</head>
<body>

Your site has been exported to the <b>static</b> folder.<br />
Copy all sites and folders from there and upload them to your server.<br />
Make sure the main URL is correct: <b><?php echo $url ?></b>

</body>
</html>
