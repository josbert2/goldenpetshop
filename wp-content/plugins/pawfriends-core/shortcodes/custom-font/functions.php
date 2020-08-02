<?php

if ( ! function_exists( 'pawfriends_core_add_custom_font' ) ) {
	function pawfriends_core_add_custom_font( $shortcodes_class_name ) {
		$shortcodes = array(
			'PawFriendsCore\CPT\Shortcodes\CustomFont\CustomFont'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'pawfriends_core_filter_add_vc_shortcode', 'pawfriends_core_add_custom_font' );
}

if ( ! function_exists( 'pawfriends_core_set_custom_font_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for counter shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function pawfriends_core_set_custom_font_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-custom-font';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'pawfriends_core_filter_add_vc_shortcodes_custom_icon_class', 'pawfriends_core_set_custom_font_icon_class_name_for_vc_shortcodes' );
}

if ( ! function_exists( 'pawfriends_core_custom_font_highlighted_word_left_svg' ) ) {

    function pawfriends_core_custom_font_highlighted_word_left_svg( ) {

        $html = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" xml:space="preserve" class="mkdf-active-hover-left">
                    <path class="st0" d="M2,0C0.9,0,0,0.9,0,2l2,23.8c0,1.1,0.9,2,2,2h3.9V0H2z"/>
                </svg>';

        return $html;
    }
}

if ( ! function_exists( 'pawfriends_core_custom_font_highlighted_word_right_svg' ) ) {

    function pawfriends_core_custom_font_highlighted_word_right_svg( ) {

        $html = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" xml:space="preserve" class="mkdf-active-hover-right">
                    <g><path class="st0" d="M5.9,0c1.1,0,2,0.9,2,2L5,25.8c-0.2,1.6-1.1,1.9-3,2H0V0H5.9"/></g>
                </svg>';

        return $html;
    }
}