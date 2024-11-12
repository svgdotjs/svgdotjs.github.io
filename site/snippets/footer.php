
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

<script src="https://cdn.jsdelivr.net/npm/@docsearch/js@3"></script>
<script type="text/javascript"> 
docsearch({
  container: '#agolia',
  appId: 'RCTWD4XAD7',
  indexName: 'svgjs',
  apiKey: '318954acedf80e42c51262a239983386',
  searchParameters: { 'facetFilters': ["version:<?= DOCS_VERSION ?>"] },
});
</script>

</div> <!-- /.container -->
</body>
</html>
