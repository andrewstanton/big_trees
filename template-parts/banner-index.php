<?php 
$thumb_url = "";
$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
$thumb_url = $thumb_url_array[0];

if(has_post_thumbnail()): ?>
<div id="home-slider" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="slide-image-background" style="background-image: url('<?php echo $thumb_url; ?>');"></div>

      <div class="carousel-caption w-50">
        <h2><?php echo get_the_title(); ?></h2>

        <?php if(has_excerpt()){ ?>
          
          <span class="excerpt"><?php echo get_the_excerpt(); ?></span>

        <?php } ?>
      
        <a role="button" class="btn btn-light" href="/contact-us"><i class="fas fa-tree"></i> Contact Us Today</a>

      </div>

    </div>
  </div>
</div>
<?php endif; ?>