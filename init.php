<?php
/*
Plugin Name: Module Extender for Divi
Plugin URI:  http://optimusdivi.com/modules/
Description: The Module Extender for Divi adds the capacity to import custom modules into the Divi Page Builder. Build your own or choose from our modules list.
Version:     1.0.0
Author:      Mitchell Bray
Author URI:  http://makeweb.com.au/
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {die;}

if ( ! function_exists( 'et_builder_add_main_elements' ) ){
	function et_builder_add_main_elements() {
		require ET_BUILDER_DIR . 'main-structure-elements.php';
		require ET_BUILDER_DIR . 'main-modules.php';
		ME_get_the_modules();
	}	
}else{	
	ME_get_the_modules();
}

function ME_get_the_modules( )
{
	/*Get the modules from child them 
	todo: 
	add a filter to allow custom $directories 
	check for file before loading
	*/
	
	$directories = glob(get_stylesheet_directory() . '/modules/*' , GLOB_ONLYDIR);
	foreach ($directories as $filename) {
		include_once ($filename.'/init.php');
	}
}