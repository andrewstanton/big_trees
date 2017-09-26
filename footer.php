<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Todd Productions Inc.
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer hidden-xs" role="contentinfo">
		<div class="site-info container">
		<div class="row">

			<div class="col-xs-4">

				<h3><?php bloginfo( 'name' ); ?></h3>
				<small>Website <?php echo date("Y"); ?> - Developed By <a href="http://toddproductions.com" target="_blank">Todd Productions Inc.</a></small>
			</div>

			<div class="col-xs-8">
			<div class="footer-nav">
				<?php

				if( has_nav_menu( 'footer-menu' ) ){
					wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_id' => 'footer-menu' ) );
					}
					
				?>

			</div><!--footer-nav-->
			</div><!--col-xs-8-->

			</div><!--.row-->

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
