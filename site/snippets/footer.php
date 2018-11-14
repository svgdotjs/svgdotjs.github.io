
<footer role="contentinfo">
  <div class="wrap">
    <?= $site->copyright()->kirbytext() ?>
  </div><!--/.wrap -->
</footer>

<a href="https://github.com/svgdotjs/svg.js">
  <img src="https://camo.githubusercontent.com/a6677b08c955af8400f44c6298f40e7d19cc5b2d/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677261795f3664366436642e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_orange_ff7600.png" class="fork-me-on-github">
</a>

<?= js('assets/js/libs/highlight.pack.js') ?>
<?= js('assets/js/libs/accordion-plain.js') ?>
<?= js('assets/js/kdoc.js?r=' . date( 'YmdHis' ) ) ?>
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/docsearch.js/2/docsearch.min.js"></script>
<script type="text/javascript"> docsearch({
  apiKey: 'a01bac6cbc400d1cd9b3ae22bb918066',
  indexName: 'svgjs',
  inputSelector: '#agolia',
  algoliaOptions: { 'facetFilters': ["version:<?= DOCS_VERSION ?>"] },
  debug: false // Set debug to true if you want to inspect the dropdown
});
</script>

</div> <!-- /.container -->
</body>
</html>
