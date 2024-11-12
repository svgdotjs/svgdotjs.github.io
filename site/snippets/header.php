<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <title><?= $site->title()->html() ?> v<?= DOCS_VERSION ?> | <?= $page->title()->html() ?></title>
    <meta name="description" content="<?= $page->description()->html() ?>">
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@svg_js" />
    <meta name="twitter:creator" content="@svg_js" />
    <meta property="og:url" content="<?= $page->url() ?>" />
    <meta property="og:title" content="<?= $page->title()->html() ?>" />
    <meta property="og:description" content="<?= $page->description()->html() ?>" />
    <meta property="og:image" content="<?= $site->url() ?>/assets/images/logo-svg-js-01d.png" />
    
    <meta name="docsearch:version" content="<?= DOCS_VERSION ?>">

    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="<?= $site->url() ?>/assets/images/favicon.png" type="image/png" />
    <?= css('assets/css/main.css' ) ?>
    <link rel="preconnect" href="https://RCTWD4XAD7-dsn.algolia.net" crossorigin />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/github-fork-ribbon-css/0.2.3/gh-fork-ribbon.min.css" />
  </head>
  <body class="docs-svgjs">
  <div class="container">
  <header role="banner">
    <div class="wrap">
      <img src="<?= $site->url() ?>/assets/images/logo-svg-js-01d-128.png" alt="SVG.js logo" class="svgjs-logo">
      <h1 class="site-title"><a class="title-link" href="<?= url() ?>"><?= $site->title()->html() ?></a></h1>
      <?php global $availableVersions; ?>
      <?php if(isset($availableVersions) and count($availableVersions) > 0): ?>
      <select id="version-selector">
      <?php foreach($availableVersions as $version): ?>
       <option value="<?= '/docs/'.$version ?>"<?= $version == DOCS_VERSION ? ' selected' : '' ?>><?= $version ?></option>
      <?php endforeach ?>
      </select>
      <?php endif ?>
    </div>
  </header>
