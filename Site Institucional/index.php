<?php include('config.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Welcome to BMD Company</title>
  <link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>css/style.css">
  <link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>css/404.css">

</head>

<body>

  <header>
    <div class="center">
      <div class="logo left"><a href="./">BMD</a></div><!-- Logomarca -->
      <nav class="desktop right">
        <ul>
          <li><a href="<?php echo INCLUDE_PATH ?>#home">Home</a></li>
          <li><a href="<?php echo INCLUDE_PATH ?>#about">About</a></li>
          <li><a href="<?php echo INCLUDE_PATH ?>#technology">Technology</a></li>
          <li><a href="<?php echo INCLUDE_PATH ?>#testimonials">Testimonials</a></li>
        </ul>
      </nav> <!-- desktop -->
      <nav class="mobile right">
        <div class="mobile-button"><i class="fa fa-bars"></i></div>
        <ul>
          <li><a href="#home">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#technology">Technology</a></li>
          <li><a href="#testimonials">Testimonials</a></li>
        </ul>
      </nav> <!-- mobile -->
      <div class="clear"></div>
    </div><!-- center -->
  </header><!-- header -->

  <?php 
    $url = isset($_GET['url']) ? $_GET['url'] : 'home';

    if(file_exists('pages/'.$url.'.php')) {
      include(('pages/'.$url.'.php'));
    } else {
      $pagina404 = true;
      include('pages/404.php');

    }

  ?>

  <footer <?php if(isset($pagina404) && $pagina404 == true) echo 'class="fixed"'; ?>>
    <div class="center">
      <p>All rights reserved &copy; 2019</p>
    </div>
  </footer>

  <script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>
  <script src="<?php echo INCLUDE_PATH ?>js/scripts.js"></script>
  <script src="<?php echo INCLUDE_PATH ?>js/all.min.js"></script>
</body>

</html>