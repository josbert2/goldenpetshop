<?php

if ( ! function_exists( 'pawfriends_mikado_admin_map_init' ) ) {
	function pawfriends_mikado_admin_map_init() {
		do_action( 'pawfriends_mikado_action_before_options_map' );
		
		foreach ( glob( MIKADO_FRAMEWORK_ROOT_DIR . '/admin/options/*/*.php' ) as $module_load ) {
			include_once $module_load;
		}
		
		do_action( 'pawfriends_mikado_action_options_map' );
		
		do_action( 'pawfriends_mikado_action_after_options_map' );
	}
	
	add_action( 'after_setup_theme', 'pawfriends_mikado_admin_map_init', 1 );
}