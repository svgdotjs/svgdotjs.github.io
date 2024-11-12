
<footer role="contentinfo">
  <div class="wrap">
    <?= $site->copyright()->kirbytext() ?>
  </div><!--/.wrap -->
</footer>

<a class="github-fork-ribbon" href="https://github.com/svgdotjs/svg.js" data-ribbon="Fork me on GitHub" title="Fork me on GitHub">Fork me on GitHub</a>
<style>.github-fork-ribbon:before { background-color: #ff7600; }</style>

<?= js('assets/js/libs/highlight.pack.js') ?>
<?= js('assets/js/libs/accordion-plain.js') ?>
<?= js('assets/js/kdoc.js' ) ?>
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
