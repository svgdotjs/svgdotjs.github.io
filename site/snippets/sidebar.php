
<aside class="sidebar-menu">
  <p class="intro"><?php echo $site->description()->kirbytext() ?></p>
  <a class="skip-link visuallyhidden focusable" href="#main">Skip to Main Content</a>

  <div class="search">
    <input name="q" type="text" placeholder="Search..." autocomplete="off">
    <ul class="results">
      <li class="result">
        nothing yet
      </li>
    </ul>
  </div>

  <nav class="sidebar-nav" role="navigation">
    <ul>
      <?php foreach($pages->visible() as $p): ?>
      <li class="group<?php e($p->isOpen(), ' sidebar-nav-active') ?>">

        <?php if($p->hasVisibleChildren() && $p->isOpen()) : ?>
          <button class="expand-subnav" aria-expanded="true" aria-controls="nav-collapsible-<?php echo $p->uid() ?>">+</button>
        <?php endif ?>
        <?php if($p->hasVisibleChildren() && !$p->isOpen()): ?>
          <button class="expand-subnav" aria-expanded="false" aria-controls="nav-collapsible-<?php echo $p->uid() ?>">+</button>
        <?php endif ?>
        <a href="<?= $p->template() == 'anchor' ? "#{$p->uid()}" : $p->template() == 'link' ? $p->link() : $p->url() ?>"><?= $p->title()->html() ?></a>

        <?php if($p->hasVisibleChildren() && $p->isOpen()): ?>
          <ul class="submenu nav-children" id="nav-collapsible-<?php echo $p->uid() ?>" aria-hidden="false">
        <?php endif ?>
        <?php if($p->hasVisibleChildren() && !$p->isOpen()): ?>
        <ul class="submenu nav-children" id="nav-collapsible-<?php echo $p->uid() ?>" aria-hidden="true">
        <?php endif ?>

        <?php if($p->hasVisibleChildren()) : ?>
          <?php foreach($p->children()->visible() as $sp): ?>
          <li class="<?php e($sp->isOpen(), 'sidebar-nav-active') ?>">
            
            <?php if($sp->hasVisibleChildren() && $sp->isOpen()) : ?>
              <button class="expand-subnav expand-sub-subnav" aria-expanded="true" aria-controls="nav-collapsible-<?php echo $sp->uid() ?>">+</button>
            <?php endif ?>
            <?php if($sp->hasVisibleChildren() && !$sp->isOpen()): ?>
              <button class="expand-subnav expand-sub-subnav" aria-expanded="false" aria-controls="nav-collapsible-<?php echo $sp->uid() ?>">+</button>
            <?php endif ?>
            <a href="<?= $sp->template() == 'anchor' ? "#{$sp->uid()}" : $sp->template() == 'link' ? $sp->link() : $sp->url() ?>"><?= $sp->title()->html() ?></a>

            <?php if($sp->hasVisibleChildren() && $sp->isOpen()): ?>
              <ul class="submenu nav-children" id="nav-collapsible-<?php echo $sp->uid() ?>" aria-hidden="false">
            <?php endif ?>
            <?php if($sp->hasVisibleChildren() && !$sp->isOpen()): ?>
            <ul class="submenu nav-children" id="nav-collapsible-<?php echo $sp->uid() ?>" aria-hidden="true">
            <?php endif ?>

            <?php if($sp->hasVisibleChildren()) : ?>
              <?php foreach($sp->children()->visible() as $ssp): ?>
              <li class="sidebar-nav-sub <?php e($ssp->isOpen(), 'sidebar-nav-active') ?>">
                <a href="<?= $ssp->template() == 'anchor' ? "#{$ssp->uid()}" : $ssp->template() == 'link' ? $ssp->link() : $ssp->url() ?>"><?= $ssp->title()->html() ?></a>
              </li>
              <?php endforeach ?>
            </ul>
            <?php endif ?>

          </li>
          <?php endforeach ?>
        </ul>
        <?php endif ?>

      </li>
      <?php endforeach ?>
    </ul>    
  </nav>
</aside>
