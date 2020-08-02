<?php

if ( ! function_exists( 'pawfriends_mikado_register_button_widget' ) ) {
	/**
	 * Function that register button widget
	 */
	function pawfriends_mikado_register_button_widget( $widgets ) {
		$widgets[] = 'PawFriendsMikadoClassButtonWidget';
		
		return $widgets;
	}
	
	add_filter( 'pawfriends_core_filter_register_widgets', 'pawfriends_mikado_register_button_widget' );
}