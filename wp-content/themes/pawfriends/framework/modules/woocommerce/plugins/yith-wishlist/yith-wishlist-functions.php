<?php

if ( ! function_exists( 'pawfriends_mikado_woocommerce_wishlist_shortcode' ) ) {
	function pawfriends_mikado_woocommerce_wishlist_shortcode() {
		if ( pawfriends_mikado_is_yith_wcwl_installed() ) {
			echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
		}
	}
}

if ( ! function_exists( 'pawfriends_mikado_register_yith_wishlist_widget' ) ) {
	/**
	 * Function that register yith wishlist widget
	 */
	function pawfriends_mikado_register_yith_wishlist_widget( $widgets ) {
		$widgets[] = 'PawFriendsMikadoClassYithWishlist';
		
		return $widgets;
	}
	
	add_filter( 'pawfriends_core_filter_register_widgets', 'pawfriends_mikado_register_yith_wishlist_widget' );
}