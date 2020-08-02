<?php

if ( ! function_exists( 'pawfriends_mikado_register_social_icon_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function pawfriends_mikado_register_social_icon_widget( $widgets ) {
		$widgets[] = 'PawFriendsMikadoClassSocialIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'pawfriends_core_filter_register_widgets', 'pawfriends_mikado_register_social_icon_widget' );
}