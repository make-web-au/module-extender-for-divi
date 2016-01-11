<?php

// Returns url based on path provided
if(!function_exists("getme_url")) {
	function getme_url($loc){
		$wp_root_url = get_site_url();
		$wp_root_path = str_replace('/wp-content/themes', '', get_theme_root());
		$location = $loc;
		$url = str_replace($wp_root_path, $wp_root_url, $location);
		return $url;
	}
}