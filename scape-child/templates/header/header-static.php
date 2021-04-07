<?php
$link_url = 'https://www.shirtchamp.com';
?>
  <!-- <?php// echo do_shortcode('[content_block slug=thumbnails]'); ?> -->

<header class="header-static">
    <?php echo do_shortcode('[content_block slug=header]'); ?>
    <div class="header-static__mobile">
      <?php echo do_shortcode('[content_block slug=thumbnails]'); ?>
    </div>
</header>