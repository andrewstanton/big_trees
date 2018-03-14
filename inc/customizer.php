<?php
/**
 * Todd Productions Inc. Theme Customizer
 *
 * @package Todd Productions Inc.
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function big_trees_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	//Custom Control For Phone Number
	$wp_customize->add_setting( 'big_trees_email' , array(
		'default' => 'no-reply@bigtreesonthemove.net',
		'sanitize_callback' => 'sanitize_email'
		));

	$wp_customize->add_setting( 'big_trees_phone' , array(
		'default' => '(###)  ### - ####',
		'sanitize_callback' => 'sanitize_text_field'
		));

	$wp_customize->add_setting( 'big_trees_fb' , array(
		'default' => 'http://facebook.com/{your facebook page}',
		'sanitize_callback' => 'sanitize_text_field'
		));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'big_trees_email',
			array(
				'label' => __( 'Email', 'big_trees' ),
				'type' => 'text',
							'section' => 'title_tagline'
							)
		));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'big_trees_phone',
			array(
				'label' => __( 'Phone', 'big_trees' ),
				'type' => 'text',
							'section' => 'title_tagline'
							)
		));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'big_trees_fb',
			array(
				'label' => __( 'Facebook', 'big_trees' ),
				'type' => 'text',
							'section' => 'title_tagline'
							)
		));
}
add_action( 'customize_register', 'big_trees_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function big_trees_customize_preview_js() {
	wp_enqueue_script( 'big_trees_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'big_trees_customize_preview_js' );
