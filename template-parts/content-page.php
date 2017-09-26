<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Todd Productions Inc.
 */

?>

<?php
	if(is_front_page()){
		if(has_post_thumbnail()){
			$thumb_id = get_post_thumbnail_id();
			$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
			$thumb_url = $thumb_url_array[0];
			}
		else{
			$thumb_url = "";
		}
		echo '<div class="home-banner" style="background-image: url('.$thumb_url.');">';
		echo '<div class="container home-banner-title text-center">
					<h1>'.get_the_title().'</h1>
					</div>';
		echo '</div>';
	}
	?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="content-body">

	<div class="container">

	<div class="entry-content">

		<?php
			if(!is_front_page()){
				echo '<div class="header-page">
							<h1 class="page-title">'.get_the_title().'</h1>
							</div>';
			}
		 ?>

		<?php the_content(); ?>

	</div><!-- .entry-content -->

	</div><!--conatiner-->

	</div><!--content-body-->
</article><!-- #post-## -->
