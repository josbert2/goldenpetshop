<?php

if ( ! function_exists( 'pawfriends_mikado_include_blog_shortcodes' ) ) {
	function pawfriends_mikado_include_blog_shortcodes() {
		foreach ( glob( MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/blog/shortcodes/*/load.php' ) as $shortcode_load ) {
			include_once $shortcode_load;
		}
	}
	
	if ( pawfriends_mikado_is_plugin_installed( 'core' ) ) {
		add_action( 'pawfriends_core_action_include_shortcodes_file', 'pawfriends_mikado_include_blog_shortcodes' );
	}
}
