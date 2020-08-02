<?php

if ( ! function_exists( 'pawfriends_mikado_register_sidearea_opener_widget' ) ) {
	/**
	 * Function that register sidearea opener widget
	 */
	function pawfriends_mikado_register_sidearea_opener_widget( $widgets ) {
		$widgets[] = 'PawFriendsMikadoClassSideAreaOpener';
		
		return $widgets;
	}
	
	add_filter( 'pawfriends_core_filter_register_widgets', 'pawfriends_mikado_register_sidearea_opener_widget' );
}