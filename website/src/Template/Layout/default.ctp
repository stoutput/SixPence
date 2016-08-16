<?php
/**
 * Nate Kaldor made some changes here to allow register, login, logout
 * Ben Stout added jquery, jquery UI and CSS files, adjusted default template styling
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?= $this->Html->charset() ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
  <title>
      <?= 'SixPence | Spare Change Making Change' ?>:
      <?= $this->fetch('title') ?>
  </title>
  <?= $this->fetch('meta') ?>
  <?= $this->fetch('css') ?>
  <?= $this->fetch('script') ?>
  <?= $this->Html->meta(
    'logo-favicon.png',
    'img/logo-favicon.png',
    ['type' => 'icon']
  ); ?>
  <?= $this->Html->script('webfont') ?>
  <script>
    WebFont.load({
      google: {
        families: ["Raleway:100,200,300,regular,500,600,700,800,900"]
      }
    });
  </script>
  <?= $this->Html->css('normalize') ?>
  <?= $this->Html->css('bootstrap.min') ?>
	<?= $this->Html->css('sixpence') ?>
  <?= $this->Html->css('fonts') ?>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">
            <?= $this->Html->image("icon-white-small.png", [
                'alt' => 'SixPence',
				        'class' => 'brand-image'
            ]); ?>
          </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="nav-button"><?= $this->Html->link(__('About'), '/alpha'); ?></li>
            <li class="nav-button"><?= $this->Html->link(__('Browse'), ['controller' => 'campaigns']); ?></li>
            <?php if($loggedIn) : ?>
        				<li class="nav-button"><?= $this->Html->link(__('Account'), ['controller' => 'users', 'action' => 'myAccount']); ?></li>
                <li class="nav-button last"><?= $this->Html->link(__('Logout'), ['controller' => 'users', 'action' => 'logout']); ?></li>
      		  <?php else :?>
                <li class="nav-button"><?= $this->Html->link(__('Login'), ['controller' => 'users', 'action' => 'login']); ?></li>
                <li class="nav-button last"><?= $this->Html->link(__('Sign Up'), ['controller' => 'users', 'action' => 'register']); ?></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid sp-content">
      <?= $this->Flash->render() ?>
      <?= $this->Flash->render('auth') ?>
      <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
    <?= $this->Html->script('jquery-2.2.3.min') ?>
    <?= $this->Html->script('bootstrap.min') ?>
    <?= $this->Html->script('https://www.google-analytics.com/analytics.js') ?>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" integrity="sha256-xNjb53/rY+WmG+4L6tTl9m6PpqknWZvRt0rO1SRnJzw=" crossorigin="anonymous"></script>
    <script type="text/javascript">
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-76792905-1', 'auto');
      ga('send', 'pageview');
    </script>
</body>
</html>
