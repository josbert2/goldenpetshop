<?php

if ( ! function_exists( 'pawfriends_mikado_register_blog_list_widget' ) ) {
	/**
	 * Function that register blog list widget
	 */
	function pawfriends_mikado_register_blog_list_widget( $widgets ) {
		$widgets[] = 'PawFriendsMikadoClassBlogListWidget';
		
		return $widgets;
	}
	
	add_filter( 'pawfriends_core_filter_register_widgets', 'pawfriends_mikado_register_blog_list_widget' );
}