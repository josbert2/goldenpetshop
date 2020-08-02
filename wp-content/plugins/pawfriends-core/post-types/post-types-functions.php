<?php

if ( ! function_exists( 'pawfriends_core_include_custom_post_types_files' ) ) {
	/**
	 * Loads all custom post types by going through all folders that are placed directly in post types folder
	 */
	function pawfriends_core_include_custom_post_types_files() {
		if ( pawfriends_core_theme_installed() ) {
			foreach ( glob( PAWFRIENDS_CORE_CPT_PATH . '/*/load.php' ) as $cpt ) {
				if ( pawfriends_mikado_is_customizer_item_enabled( $cpt, 'pawfriends_performance_disable_cpt_' ) ) {
					include_once $cpt;
				}
			}
		}
	}
	
	add_action( 'after_setup_theme', 'pawfriends_core_include_custom_post_types_files', 1 );
}

if ( ! function_exists( 'pawfriends_core_include_custom_post_types_meta_boxes' ) ) {
	/**
	 * Loads all meta boxes functions for custom post types by going through all folders that are placed directly in post types folder
	 */
	function pawfriends_core_include_custom_post_types_meta_boxes() {
		if ( pawfriends_core_theme_installed() ) {
			foreach ( glob( PAWFRIENDS_CORE_CPT_PATH . '/*/admin/meta-boxes/*.php' ) as $option ) {
				$cpt_relative_path = str_replace( PAWFRIENDS_CORE_CPT_PATH . '/', '', $option );
				$cpt_name          = substr( $cpt_relative_path, 0, strpos( $cpt_relative_path, '/' ) );
				
				if ( pawfriends_mikado_is_customizer_item_enabled( $cpt_name, 'pawfriends_performance_disable_cpt_', true ) ) {
					include_once $option;
				}
			}
		}
	}
	
	add_action( 'pawfriends_mikado_action_before_meta_boxes_map', 'pawfriends_core_include_custom_post_types_meta_boxes' );
}

if ( ! function_exists( 'pawfriends_core_include_custom_post_types_global_options' ) ) {
	/**
	 * Loads all global otpions functions for custom post types by going through all folders that are placed directly in post types folder
	 */
	function pawfriends_core_include_custom_post_types_global_options() {
		if ( pawfriends_core_theme_installed() ) {
			foreach ( glob( PAWFRIENDS_CORE_CPT_PATH . '/*/admin/options/*.php' ) as $option ) {
				$cpt_relative_path = str_replace( PAWFRIENDS_CORE_CPT_PATH . '/', '', $option );
				$cpt_name          = substr( $cpt_relative_path, 0, strpos( $cpt_relative_path, '/' ) );
				
				if ( pawfriends_mikado_is_customizer_item_enabled( $cpt_name, 'pawfriends_performance_disable_cpt_', true ) ) {
					include_once $option;
				}
			}
		}
	}
	
	add_action( 'pawfriends_mikado_action_before_options_map', 'pawfriends_core_include_custom_post_types_global_options', 1 );
}