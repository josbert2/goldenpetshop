<?php

if ( ! function_exists( 'pawfriends_mikado_register_custom_font_widget' ) ) {
	/**
	 * Function that register custom font widget
	 */
	function pawfriends_mikado_register_custom_font_widget( $widgets ) {
		$widgets[] = 'PawFriendsMikadoClassCustomFontWidget';
		
		return $widgets;
	}
	
	add_filter( 'pawfriends_core_filter_register_widgets', 'pawfriends_mikado_register_custom_font_widget' );
}