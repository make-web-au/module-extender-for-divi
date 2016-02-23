<?php
/*
Plugin Name: Module Extender for Divi
Plugin URI:  http://optimusdivi.com/modules/
Description: The Module Extender for Divi adds the capacity to import custom modules into the Divi Page Builder. Build your own or choose from our modules list.
Version:     1.2.0
Author:      Mitchell Bray
Author URI:  http://makeweb.com.au/
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {die;}

include_once plugin_dir_path( __FILE__ ) . 'inc/helper.php'; //Include helper functions to be used by modules

function load_custom_wp_admin_style() {
        wp_register_style( 'module_icons_css',  plugin_dir_url( __FILE__ ) . '/inc/icons.css', false, '1.0.0' );
        wp_enqueue_style( 'module_icons_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

add_action('et_builder_ready', 'ME_get_the_modules');

function ME_get_the_modules( )
{
	/* Get the modules from child theme */
	
	$directories = glob(get_stylesheet_directory() . '/modules/*' , GLOB_ONLYDIR);
	foreach ($directories as $filename) {
		include_once ($filename.'/init.php');
	}
}