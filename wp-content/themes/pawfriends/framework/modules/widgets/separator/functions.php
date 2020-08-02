<?php

if ( ! function_exists( 'pawfriends_mikado_register_separator_widget' ) ) {
	/**
	 * Function that register separator widget
	 */
	function pawfriends_mikado_register_separator_widget( $widgets ) {
		$widgets[] = 'PawFriendsMikadoClassSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'pawfriends_core_filter_register_widgets', 'pawfriends_mikado_register_separator_widget' );
}