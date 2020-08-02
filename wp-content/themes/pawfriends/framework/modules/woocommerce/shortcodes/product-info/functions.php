<?php

if ( ! function_exists( 'pawfriends_mikado_add_product_info_shortcode' ) ) {
	function pawfriends_mikado_add_product_info_shortcode( $shortcodes_class_name ) {
		$shortcodes = array(
			'PawFriendsCore\CPT\Shortcodes\ProductInfo\ProductInfo',
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'pawfriends_core_filter_add_vc_shortcode', 'pawfriends_mikado_add_product_info_shortcode' );
}

if ( ! function_exists( 'pawfriends_mikado_set_product_info_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for product info shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function pawfriends_mikado_set_product_info_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-product-info';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'pawfriends_core_filter_add_vc_shortcodes_custom_icon_class', 'pawfriends_mikado_set_product_info_icon_class_name_for_vc_shortcodes' );
}

if ( ! function_exists( 'pawfriends_mikado_add_product_info_into_shortcodes_list' ) ) {
	function pawfriends_mikado_add_product_info_into_shortcodes_list( $woocommerce_shortcodes ) {
		$woocommerce_shortcodes[] = 'mkdf_product_info';
		
		return $woocommerce_shortcodes;
	}
	
	add_filter( 'pawfriends_mikado_filter_woocommerce_shortcodes_list', 'pawfriends_mikado_add_product_info_into_shortcodes_list' );
}