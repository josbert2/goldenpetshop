<?php

if ( ! function_exists( 'pawfriends_mikado_register_search_opener_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function pawfriends_mikado_register_search_opener_widget( $widgets ) {
		$widgets[] = 'PawFriendsMikadoClassSearchOpener';
		
		return $widgets;
	}
	
	add_filter( 'pawfriends_core_filter_register_widgets', 'pawfriends_mikado_register_search_opener_widget' );
}