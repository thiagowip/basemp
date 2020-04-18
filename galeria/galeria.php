<div id="lightgallery">
  <a data-src="<?php echo $mainFolder; ?>/includes/imgs/1.jpg"
     data-sub-html="<h4>Algum texto</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius obcaecati, voluptate laboriosam! Reprehenderit pariatur nesciunt quisqua distinctio. Quibusdam neque ipsa natus error tempore!</p>">
    <img src="<?php echo $mainFolder; ?>/includes/imgs/1.jpg">
  </a>
  <a data-src="<?php echo $mainFolder; ?>/includes/imgs/2.jpg"
     data-sub-html="<h4>Algum texto</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius obcaecati, voluptate laboriosam! Reprehenderit pariatur nesciunt quisqua distinctio. Quibusdam neque ipsa natus error tempore!</p>">
    <img src="<?php echo $mainFolder; ?>/includes/imgs/2.jpg">
  </a>
  <a data-src="<?php echo $mainFolder; ?>/includes/imgs/3.jpg"
     data-sub-html="<h4>Algum texto</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius obcaecati, voluptate laboriosam! Reprehenderit pariatur nesciunt quisqua distinctio. Quibusdam neque ipsa natus error tempore!</p>">
    <img src="<?php echo $mainFolder; ?>/includes/imgs/3.jpg">
  </a>
</div>


<script type="text/javascript">

    $(document).ready(function () {

        $('#lightgallery').lightGallery({});
    });
</script>

<script src="<?php echo $mainFolder; ?>/includes/js/picturefill.min.js"></script>
<script src="<?php echo $mainFolder; ?>/includes/js/lightgallery-all.min.js"></script>
<script src="<?php echo $mainFolder; ?>/includes/js/jquery.mousewheel.min.js"></script>

