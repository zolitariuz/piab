<?php
/**
 * Child-Theme functions and definitions
 */

/**
* Define paths to javascript, styles, theme and site.
**/
define( 'THEMEPATH', get_stylesheet_directory_uri() . '/' );

remove_action('woocommerce_after_single_product_summary','woocommerce_output_product_data_tabs',10);