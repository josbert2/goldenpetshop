<?php

if ( ! function_exists( 'pawfriends_core_import_object' ) ) {
	function pawfriends_core_import_object() {
		$pawfriends_core_import_object = new PawFriendsCoreImport();
	}
	
	add_action( 'init', 'pawfriends_core_import_object' );
}

if ( ! function_exists( 'pawfriends_core_data_import' ) ) {
	function pawfriends_core_data_import() {
		$importObject = PawFriendsCoreImport::getInstance();
		
		if ( $_POST['import_attachments'] == 1 ) {
			$importObject->attachments = true;
		} else {
			$importObject->attachments = false;
		}
		
		$folder = "pawfriends/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_content( $folder . $_POST['xml'] );
		
		die();
	}
	
	add_action( 'wp_ajax_pawfriends_core_data_import', 'pawfriends_core_data_import' );
}

if ( ! function_exists( 'pawfriends_core_widgets_import' ) ) {
	function pawfriends_core_widgets_import() {
		$importObject = PawFriendsCoreImport::getInstance();
		
		$folder = "pawfriends/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_widgets( $folder . 'widgets.txt', $folder . 'custom_sidebars.txt' );
		
		die();
	}
	
	add_action( 'wp_ajax_pawfriends_core_widgets_import', 'pawfriends_core_widgets_import' );
}

if ( ! function_exists( 'pawfriends_core_options_import' ) ) {
	function pawfriends_core_options_import() {
		$importObject = PawFriendsCoreImport::getInstance();
		
		$folder = "pawfriends/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_options( $folder . 'options.txt' );
		
		die();
	}
	
	add_action( 'wp_ajax_pawfriends_core_options_import', 'pawfriends_core_options_import' );
}

if ( ! function_exists( 'pawfriends_core_other_import' ) ) {
	function pawfriends_core_other_import() {
		$importObject = PawFriendsCoreImport::getInstance();
		
		$folder = "pawfriends/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_options( $folder . 'options.txt' );
		$importObject->import_widgets( $folder . 'widgets.txt', $folder . 'custom_sidebars.txt' );
		$importObject->import_menus( $folder . 'menus.txt' );
		$importObject->import_settings_pages( $folder . 'settingpages.txt' );
		
		$importObject->mkdf_update_meta_fields_after_import( $folder );
		$importObject->mkdf_update_options_after_import( $folder );
		
		if ( pawfriends_core_is_revolution_slider_installed() ) {
			$importObject->rev_slider_import( $folder );
		}
		
		die();
	}
	
	add_action( 'wp_ajax_pawfriends_core_other_import', 'pawfriends_core_other_import' );
}