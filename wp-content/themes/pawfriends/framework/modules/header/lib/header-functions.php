<?php

use PawFriendsMikadoNamespace\Modules\Header\Lib;

if ( ! function_exists( 'pawfriends_mikado_get_header_type_options' ) ) {
	/**
	 * This function collect all header types values and forward them to header factory file for further processing
	 */
	function pawfriends_mikado_get_header_type_options() {
		do_action( 'pawfriends_mikado_action_before_header_function_init' );
		
		$header_types_option = apply_filters( 'pawfriends_mikado_filter_register_header_type_class', $header_types_option = array() );
		
		return $header_types_option;
	}
}

if ( ! function_exists( 'pawfriends_mikado_set_default_logo_height_for_header_types' ) ) {
	/**
	 * This function set default logo area height for header types
	 */
	function pawfriends_mikado_set_default_logo_height_for_header_types() {
		$logo_height_meta = pawfriends_mikado_filter_px( pawfriends_mikado_get_meta_field_intersect( 'logo_area_height', pawfriends_mikado_get_page_id() ) );
		$logo_height      = ! empty( $logo_height_meta ) ? intval( $logo_height_meta ) : 90;
		
		return apply_filters( 'pawfriends_mikado_filter_set_default_logo_height_value_for_header_types', $logo_height );
	}
}

if ( ! function_exists( 'pawfriends_mikado_set_default_menu_height_for_header_types' ) ) {
	/**
	 * This function set default menu area height for header types
	 */
	function pawfriends_mikado_set_default_menu_height_for_header_types() {
		$menu_height_meta = pawfriends_mikado_filter_px( pawfriends_mikado_get_meta_field_intersect( 'menu_area_height', pawfriends_mikado_get_page_id() ) );
		
		$menu_height = ! empty( $menu_height_meta ) ? intval( $menu_height_meta ) : 98;
		
		return apply_filters( 'pawfriends_mikado_filter_set_default_menu_height_value_for_header_types', $menu_height );
	}
}

if ( ! function_exists( 'pawfriends_mikado_set_default_mobile_menu_height_for_header_types' ) ) {
	/**
	 * This function set default mobile menu area height for header types
	 */
	function pawfriends_mikado_set_default_mobile_menu_height_for_header_types() {
		$mobile_menu_height_meta = pawfriends_mikado_filter_px( pawfriends_mikado_options()->getOptionValue( 'mobile_header_height' ) );
		$mobile_menu_height      = ! empty( $mobile_menu_height_meta ) ? intval( $mobile_menu_height_meta ) : 70;
		
		return apply_filters( 'pawfriends_mikado_filter_set_default_mobile_menu_height_value_for_header_types', $mobile_menu_height );
	}
}

if ( ! function_exists( 'pawfriends_mikado_set_header_object' ) ) {
	/**
	 * This function is used to instance header type object
	 */
	function pawfriends_mikado_set_header_object() {
		$header_type         = pawfriends_mikado_get_meta_field_intersect( 'header_type', pawfriends_mikado_get_page_id() );
		$header_types_option = pawfriends_mikado_get_header_type_options();
		
		$object = Lib\HeaderFactory::getInstance()->build( $header_type, $header_types_option );
		
		if ( Lib\HeaderFactory::getInstance()->validHeaderObject() ) {
			$header_connector = new Lib\PawFriendsMikadoClassHeaderConnector( $object );
			$header_connector->connect( $object->getConnectConfig() );
		}
	}
	
	add_action( 'wp', 'pawfriends_mikado_set_header_object', 1 );
}