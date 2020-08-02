<?php

if ( ! function_exists( 'pawfriends_mikado_register_image_gallery_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function pawfriends_mikado_register_image_gallery_widget( $widgets ) {
		$widgets[] = 'PawFriendsMikadoClassImageGalleryWidget';
		
		return $widgets;
	}
	
	add_filter( 'pawfriends_core_filter_register_widgets', 'pawfriends_mikado_register_image_gallery_widget' );
}