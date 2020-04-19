<?php
function mp_url($type)
{
  $url = "";

  if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $http = "https://";
  } else {
    $http = "http://";
  }

  if ($type == "share") {
    $url = $http . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  } else if ($type == "site") {
    $url = $http . $_SERVER['HTTP_HOST'];
  }
  return $url;
}
?>

<!doctype html>
<html class="no-js" lang="pt-br">

<head>

  <?php include "meta-tags.php"; ?>

  <link type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">


  <!-- //libs -->
  <link type="text/css" href="<?php echo $mainFolder; ?>/includes/lib/foundation.min.css" rel="stylesheet">
  <link type="text/css" href="<?php echo $mainFolder ?>/includes/lib/swiper.min.css" rel="stylesheet">
  <link type="text/css" href="<?php echo $mainFolder; ?>/includes/lib/fallback.css" rel="stylesheet">
  <link type="text/css" href="<?php echo $mainFolder; ?>/includes/lib/jquery.sweetalert2.css" rel="stylesheet">
  <link type="text/css" href="<?php echo $mainFolder; ?>/includes/lib/lightgallery.css" rel="stylesheet">

  <link type="text/css" href="<?php echo $mainFolder; ?>/includes/css/app.css" rel="stylesheet">

  <script src="<?php echo $mainFolder ?>/includes/lib/jquery.min.js"></script>
  <script src="<?php echo $mainFolder ?>/includes/lib/jquery.mask.min.js"></script>

  <?php
  /* 
  //calendario
  <script type="text/javascript" src="<?php //echo $mainFolder; ?> /includes/lib/moment.js"></script>-->
  <script type="text/javascript" src="<?php //echo $mainFolder; ?>/includes/lib/calendario.js"></script>--> 
  */
  ?>

  <script src="<?php echo $mainFolder; ?>/includes/lib/wow.js"></script>
  <script src="<?php echo $mainFolder; ?>/includes/lib/foundation.min.js"></script>
  <script src="<?php echo $mainFolder ?>/includes/lib/swiper.min.js"></script>

  <!-- //scripts projeto -->
  <script src="<?php echo $mainFolder; ?>/includes/js/core.js"></script>
  <script src="<?php echo $mainFolder; ?>/includes/js/app.js"></script>


  <!-- //form ajax -->
  <script type="text/javascript" src="<?php echo $mainFolder; ?>/includes/lib/jquery.sweetalert2.js"></script>
  <script type="text/javascript" src="<?php echo $mainFolder; ?>/includes/lib/jquery.form.js"></script>

  <!-- //scripts mp -->
  <script type="text/javascript" src="<?php echo $mainFolder; ?>/includes/lib/mp-ajax.js"></script>
  <script type="text/javascript" src="<?php echo $mainFolder; ?>/includes/lib/mp-lightbox.js"></script>
  <script type="text/javascript" src="<?php echo $mainFolder; ?>/includes/lib/mp-utils.js"></script>

  <script type="text/javascript">
    // new WOW().init();

    window.mainFolder = '<?php echo $mainFolder; ?>';
    window.mpPage = '<?php echo ucfirst(@$page); ?>';
    window.mainTitle = '<?php echo $titulo_site; ?>';
  </script>
</head>

<body>

  <div id="menuMobile" class="off-canvas position-left" data-off-canvas>

    <ul class="vertical menu accordion-menu" data-accordion-menu>
      <li><a href="<?php echo $mainFolder ?>/home">Home</a></li>
      <li>
        <a href="#">Submenu</a>
        <ul class="menu vertical nested">
          <li><a href="#">Item 1A</a></li>
          <li><a href="#">Item 1B</a></li>
        </ul>
      </li>
    </ul>

  </div>

  <div class="off-canvas-content" data-off-canvas-content>

    <div id="lt_page">
      <div id="lt_int_page"></div>
    </div>