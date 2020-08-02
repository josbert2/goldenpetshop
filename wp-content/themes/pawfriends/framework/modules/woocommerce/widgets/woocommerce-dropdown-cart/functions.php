<?php

if ( ! function_exists( 'pawfriends_mikado_register_woocommerce_dropdown_cart_widget' ) ) {
	/**
	 * Function that register dropdown cart widget
	 */
	function pawfriends_mikado_register_woocommerce_dropdown_cart_widget( $widgets ) {
		$widgets[] = 'PawFriendsMikadoClassWoocommerceDropdownCart';
		
		return $widgets;
	}
	
	add_filter( 'pawfriends_core_filter_register_widgets', 'pawfriends_mikado_register_woocommerce_dropdown_cart_widget' );
}

if ( ! function_exists( 'pawfriends_mikado_get_dropdown_cart_icon_class' ) ) {
	/**
	 * Returns dropdown cart icon class
	 */
	function pawfriends_mikado_get_dropdown_cart_icon_class() {
		$classes = array(
			'mkdf-header-cart'
		);
		
		$classes[] = pawfriends_mikado_get_icon_sources_class( 'dropdown_cart', 'mkdf-header-cart' );
		
		return implode( ' ', $classes );
	}
}