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

				<h4>Ash Township</h4>
				<small>1677 Read Rd.<br/>
				PO BOX 387<br/>
				Carleton, MI 48117<br/>
				Website <?php echo date("Y"); ?> - Developed By <a href="http://toddproductions.com" target="_blank">Todd Productions Inc.</a></small>
			</div>

			<div class="col-xs-8">
			<div class="footer-nav">

			<div class="row">
				<div class="col-xs-4">
					<?php
						if ( has_nav_menu( 'footer-menu-1' ) ){
								wp_nav_menu( array( 'theme_location' => 'footer-menu-1', 'menu_id' => 'footer-menu-primary' ) );
								}
						?>
				</div>
				<div class="col-xs-4">
					<?php
					if( has_nav_menu( 'footer-menu-2' ) ){
						wp_nav_menu( array( 'theme_location' => 'footer-menu-2', 'menu_id' => 'footer-menu-secondary' ) );
						}
					?>
				</div>
				<div class="col-xs-4">
					<?php
					if( has_nav_menu( 'footer-menu-3' ) ){
						wp_nav_menu( array( 'theme_location' => 'footer-menu-3', 'menu_id' => 'footer-menu-third' ) );
						}
					?>
				</div>

			</div><!--row-->

			<div class="site-disclaimer">
				INFORMATIONAL DISCLAIMER  The content of this website is for general information purposes only and does not constitute advice. This website tries to provide content that is true and accurate as of the date of writing. However, there is no assurance or warranty regarding the accuracy, timeliness or applicability of any of the contents. Visitors to the website should not act upon the content or information without first seeking confirmation from the appropriate Township Department if applicable. The information at this website might include opinions or views which are not necessarily those of all Township Employees or Board Members. "Ash Township excludes liability for any claims, losses, demands or damages of any kind whatsoever with regard to any information, content or services provided at this website, including, but not limited to, direct, indirect, incidental, or consequential loss or damages, compensatory damages, loss of profits or data or otherwise."
			</div>

			</div>
			</div>

			</div><!--.row-->

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
