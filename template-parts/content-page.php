<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Todd Productions Inc.
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="content-body">

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

	</div><!--content-body-->
</article><!-- #post-## -->
