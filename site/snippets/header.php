<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Temporary redirect for fragemted docs -->
    <?php $uri = $page->uri(); ?>
    <?php $url = 'https://svgjs.com/docs/2.7/' . ( $uri == 'home' ? '' : $uri ); ?>
    <meta http-equiv="refresh" content="0; url=<?= $url ?>">
    <link rel="canonical" href="<?= $url ?>" />
    <!-- End temporary redirect for fragemted docs -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>
    <meta name="description" content="<?= $page->description()->html() ?>">
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@svg_js" />
    <meta name="twitter:creator" content="@svg_js" />
    <meta property="og:url" content="<?= $page->url() ?>" />
    <meta property="og:title" content="<?= $page->title()->html() ?>" />
    <meta property="og:description" content="<?= $page->description()->html() ?>" />
    <meta property="og:image" content="<?= $site->url() ?>/assets/images/logo-svg-js-01d.png" />

    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="/assets/images/favicon.png" type="image/png" />
    <?= css('assets/css/main.css?r=' . date( 'YmdHis' ) ) ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/docsearch.js/2/docsearch.min.css" />
  </head>
  <body class="docs-svgjs">
  <div class="container">
  <header role="banner">
    <div class="wrap">
      <img src="/assets/images/logo-svg-js-01d-128.png" alt="SVG.js logo" class="svgjs-logo">
      <h1 class="site-title"><a class="title-link" href="<?= url() ?>"><?= $site->title()->html() ?></a></h1>
    </div>
  </header>
