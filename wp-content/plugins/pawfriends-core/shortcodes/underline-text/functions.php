<?php

if ( ! function_exists( 'pawfriends_core_add_underline_text_shortcodes' ) ) {
	function pawfriends_core_add_underline_text_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'PawFriendsCore\CPT\Shortcodes\UnderlineText\UnderlineText'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'pawfriends_core_filter_add_vc_shortcode', 'pawfriends_core_add_underline_text_shortcodes' );
}

if ( ! function_exists( 'pawfriends_core_set_underline_text_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for underline text shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function pawfriends_core_set_underline_text_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-underline-text';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'pawfriends_core_filter_add_vc_shortcodes_custom_icon_class', 'pawfriends_core_set_underline_text_icon_class_name_for_vc_shortcodes' );
}