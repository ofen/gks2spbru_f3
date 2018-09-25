<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <?php foreach (($navbar?:[]) as $key=>$value): ?>
                <?php if (is_array($value)): ?>
                    
                    <!-- Item-->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= ($key) ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php foreach (($value?:[]) as $submenu=>$sublink): ?>
                                <li class="<?= ($PATH == $sublink ? 'active' : '') ?>">
                                    <a href="<?= ($sublink) ?>"><?= ($submenu) ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    
                    <?php else: ?>
                    <!-- Item-->
                    <li <?= (isActive($value)) ?>>
                        <a href="<?= ($value) ?>"><?= ($key) ?></a>
                    </li>
                    
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>