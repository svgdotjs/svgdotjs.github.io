
<?php snippet('header') ?>
  <div class="wrap content">

    <?php snippet('sidebar') ?>

    <section id="main" class="main-content" role="main">
      <h2>Search results for "<?php echo esc($query) ?>"</h2>
      <ul>
        <?php foreach($results as $result): ?>
          <li>
            <a href="<?php echo $result->url() ?>">
              <?php foreach($result->parents()->flip() as $parent): ?>
                <?php echo $parent->title()->html() ?> &gt;
              <?php endforeach ?>
              <?php echo $result->title()->html() ?>
            </a>
          </li>
        <?php endforeach ?>
      </ul>
    </section>

  </div><!-- /.wrap content -->

<?php snippet('footer') ?>
</div> <!-- /.container -->
