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

  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="<?php echo $mainFolder; ?>/includes/lib/lightgallery.css?01891" rel="stylesheet">
  <link href="<?php echo $mainFolder; ?>/includes/lib/foundation.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
  <link href="<?php echo $mainFolder; ?>/includes/lib/animate.css" rel="stylesheet">
  <link href="<?php echo $mainFolder; ?>/includes/lib/hover.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo $mainFolder; ?>/includes/css/app.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $mainFolder; ?>/includes/lib/fallback.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $mainFolder; ?>/includes/lib/jquery.sweetalert2.css" />

  <script src="<?php echo $mainFolder ?>/includes/lib/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <?php /* <script type="text/javascript" src="<?php //echo $mainFolder; ?> /includes/lib/moment.js"></script>-->
  <!--  <script type="text/javascript" src="<?php //echo $mainFolder; ?>/includes/lib/calendario.js"></script>--> */ ?>
  <script src="<?php echo $mainFolder; ?>/includes/lib/wow.js"></script>
  <script src="<?php echo $mainFolder; ?>/includes/lib/foundation.min.js"></script>
  <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
  <script src="<?php echo $mainFolder; ?>/includes/js/core.js"></script>
  <script src="<?php echo $mainFolder; ?>/includes/js/app.js"></script>
  <!-- <script type="text/javascript" src="<?php echo $mainFolder; ?>/includes/lib/jquery.sweetalert2.js"></script> -->
  <script type="text/javascript" src="<?php echo $mainFolder; ?>/includes/lib/jquery.form.js"></script>
  <!-- <script type="text/javascript" src="<?php echo $mainFolder; ?>/includes/lib/mp-ajax.js"></script> -->
  <script type="text/javascript" src="<?php echo $mainFolder; ?>/includes/lib/mp-lightbox.js"></script>
  <script type="text/javascript" src="<?php echo $mainFolder; ?>/includes/lib/mp-utils.js"></script>

  <script type="text/javascript">
    new WOW().init();

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