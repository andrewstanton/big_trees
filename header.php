<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Todd Productions Inc.
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'big_trees' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
	<div class="container">
	<div class="row">

	<div class="col-md-2">
	<div class="logo">
	<?php 
		echo '<a href="'.get_home_url().'" title="Home Page">';
	?>
		<span class="tree-block"><i class="fas fa-tree"></i></span>
	<?php
		echo bloginfo( 'name' ) . '<br/>';
		echo '<span class="sub-logo">' . bloginfo( 'description' ) . '</span>';
		echo '</a>';
	?>
	</div>
	</div>
	<div class="col-md-10 text-right">

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="mobile-menu-button-container"><button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'big_trees' ); ?></button></div>
			<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->

	</div>

	</div><!--row-->
	</div><!--.container-->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
