<?php
add_action( 'admin_menu', 'MW_add_admin_menu' );
add_action( 'admin_init', 'MW_settings_init' );


function MW_add_admin_menu(  ) { 

	add_options_page( 'Module Extender', 'Module Extender', 'manage_options', 'module_extender', 'MW_options_page' );

}


function MW_settings_init(  ) { 

	register_setting( 'pluginPage', 'MW_settings' );

	add_settings_section(
		'MW_pluginPage_section', 
		 "", 
		'MW_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'MW_devmode', 
		__( 'Dev Mode?', 'wordpress' ), 
		'MW_devmode_render', 
		'pluginPage', 
		'MW_pluginPage_section' 
	);

}


function MW_devmode_render(  ) { 

	$options = get_option( 'MW_settings' );
	?>
	<input type='checkbox' name='MW_settings[MW_devmode]' <?php checked( $options['MW_devmode'], 1 ); ?> value='1'>
	<p>This setting will auto clear local storage and make module development a lot nicer (currently in BETA).</p>
	<?php

}


function MW_settings_section_callback(  ) {}


function MW_options_page(  ) { 

	?>
	<form action='options.php' method='post'>

		<h2>Module Extender</h2>

		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>

	</form>
	<?php

}