<?php
/**
 * Pchc-wic Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pchc-wic
 */

add_action( 'wp_enqueue_scripts', 'astra_parent_theme_enqueue_styles' );

/**
 * Enqueue scripts and styles.
 */
function astra_parent_theme_enqueue_styles() {
	wp_enqueue_style( 'astra-style', get_template_directory_uri() . '/style.css', array(), '20180926' );
	wp_enqueue_style(
		'pchc-wic-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'astra-style' ),
		'20180926'
	);

}

require_once get_stylesheet_directory() . '/widgets/hero/widget.php';
