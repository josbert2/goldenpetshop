<?php

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Mkdf_Accordion extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Mkdf_Accordion_Tab extends WPBakeryShortCodesContainer {}
}

if ( ! function_exists( 'pawfriends_core_add_accordion_shortcodes' ) ) {
	function pawfriends_core_add_accordion_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'PawFriendsCore\CPT\Shortcodes\Accordion\Accordion',
			'PawFriendsCore\CPT\Shortcodes\AccordionTab\AccordionTab'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'pawfriends_core_filter_add_vc_shortcode', 'pawfriends_core_add_accordion_shortcodes' );
}

if ( ! function_exists( 'pawfriends_core_set_accordion_custom_style_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom css style for accordion shortcode
	 */
	function pawfriends_core_set_accordion_custom_style_for_vc_shortcodes( $style ) {
		$current_style = '.vc_shortcodes_container.wpb_mkdf_accordion_tab { 
			background-color: #f4f4f4; 
		}';
		
		$style .= $current_style;
		
		return $style;
	}
	
	add_filter( 'pawfriends_core_filter_add_vc_shortcodes_custom_style', 'pawfriends_core_set_accordion_custom_style_for_vc_shortcodes' );
}

if ( ! function_exists( 'pawfriends_core_set_accordion_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for accordion shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function pawfriends_core_set_accordion_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-accordion';
		$shortcodes_icon_class_array[] = '.icon-wpb-accordion-tab';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'pawfriends_core_filter_add_vc_shortcodes_custom_icon_class', 'pawfriends_core_set_accordion_icon_class_name_for_vc_shortcodes' );
}

if ( ! function_exists( 'pawfriends_core_accordion_minus_svg' ) ) {

    function pawfriends_core_accordion_minus_svg() {

        $html = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 44 41" xml:space="preserve">
                    <path class="st0" d="M1,16.5C1,16.5,1.3,1,22,1s21,18.5,21,18.5S44.8,38.3,22.8,40C9.2,41,1,29.5,1,16.5z"/>
                    <path class="st1" d="M32.5,21.5c0-1-20.1-3.8-21-2.9v2.9c0,1,2.6,1,10.5,1C28.1,22.5,32.5,22.5,32.5,21.5z"/>
                </svg>';

        return $html;
    }
}

if ( ! function_exists( 'pawfriends_core_accordion_plus_svg' ) ) {

    function pawfriends_core_accordion_plus_svg() {

        $html = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 44 41" xml:space="preserve">
                    <path class="st0" d="M1,16.5C1,16.5,1.3,1,22,1s21,18.5,21,18.5S44.8,38.4,22.8,40C9.2,41,1,29.5,1,16.5z"/>
                    <path class="st1" d="M32.2,18.5c-0.7-0.7-3-0.7-5.2-0.7h-3l0.7-2.8c1.5-2.1,1.5-2.1,0-3.6c-0.7-1.4-1.5-0.7-2.2,0.7 c0,1.4-0.7,2.8-0.7,3.6c0,1.4,0,1.4-5.9,1.4c-5.2,0-5.9,0.7-5.2,1.4c0,1.4,0.7,1.4,5.2,1.4l5.9-0.7L21.1,22c0,1.4,0,3.6-0.7,5 c-0.7,1.4-0.7,2.8-0.7,2.8v0.7c1.5,0,3.7-5,3.7-7.8c0-3.6,2.2-4.3,6.7-3.6C33.7,20.6,34.5,19.9,32.2,18.5z"/>
                </svg>';

        return $html;
    }
}