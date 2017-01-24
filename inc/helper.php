<?php
// Returns url based on path provided
if(!function_exists("getme_url")) {
	function getme_url($loc){
		$wp_root_url = get_site_url();
		$wp_root_path = str_replace('/wp-content/themes', '', get_theme_root());
		$location = $loc;
		$location = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $location);
		$url = str_replace($wp_root_path, $wp_root_url, $location);
		return $url;
	}
}

// Enques icon css to admin
if(!function_exists("getme_theIcon")) {
		function getme_theIcon(){
		$loc = debug_backtrace();
		$loc = $loc[0]['file'];
		$url = dirname(getme_url($loc));
		return $url;
	}
}

function print_inline_script() {
?>
<style type="text/css">
.et-pb-all-modules .et_pb_mw_linkbar:before, .et-pb-all-modules .et_pb_mw_linkbar:before, .et_pb_saved_layouts_list .et_pb_mw_linkbar:before, .et_pb_saved_layouts_list .et_pb_mw_linkbar:before {
    content: '\53';
}
</style>
<?php
}
add_action( 'admin_enqueue_scripts', 'print_inline_script' );