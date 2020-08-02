<?php

if ( ! function_exists( 'pawfriends_mikado_register_icon_widget' ) ) {
	/**
	 * Function that register icon widget
	 */
	function pawfriends_mikado_register_icon_widget( $widgets ) {
		$widgets[] = 'PawFriendsMikadoClassIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'pawfriends_core_filter_register_widgets', 'pawfriends_mikado_register_icon_widget' );
}