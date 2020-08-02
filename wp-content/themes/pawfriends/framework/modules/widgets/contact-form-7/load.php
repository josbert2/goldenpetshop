<?php

if ( pawfriends_mikado_is_plugin_installed( 'contact-form-7' ) ) {
	include_once MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/contact-form-7/contact-form-7.php';
	
	add_filter( 'pawfriends_core_filter_register_widgets', 'pawfriends_mikado_register_cf7_widget' );
}

if ( ! function_exists( 'pawfriends_mikado_register_cf7_widget' ) ) {
	/**
	 * Function that register cf7 widget
	 */
	function pawfriends_mikado_register_cf7_widget( $widgets ) {
		$widgets[] = 'PawFriendsMikadoClassContactForm7Widget';
		
		return $widgets;
	}
}