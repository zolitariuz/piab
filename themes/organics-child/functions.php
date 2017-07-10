<?php
/**
 * Child-Theme functions and definitions
 */

/**
* Define paths to javascript, styles, theme and site.
**/
define( 'JSPATH', get_stylesheet_directory_uri() . '/js/' );
define( 'THEMEPATH', get_stylesheet_directory_uri() . '/' );

/*------------------------------------*\
	#GENERAL FUNCTIONS
\*------------------------------------*/

/**
* Enqueue frontend scripts and styles
**/
add_action( 'wp_enqueue_scripts', function(){
	wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-2.1.1.min.js', array(''), '2.1.1', true );
	wp_enqueue_script( 'piab_functions', JSPATH.'functions.js', array('jquery'), '1.0', true );

	wp_localize_script( 'piab_functions', 'siteUrl', SITEURL );
});

/*Remover secciones woocommerce*/
remove_action('woocommerce_after_single_product_summary','woocommerce_output_product_data_tabs',10);

/*Easy password in register*/
function wc_ninja_remove_password_strength() {
  if ( wp_script_is( 'wc-password-strength-meter', 'enqueued' ) ) {
    wp_dequeue_script( 'wc-password-strength-meter' );
  }
}
add_action( 'wp_print_scripts', 'wc_ninja_remove_password_strength', 100 );