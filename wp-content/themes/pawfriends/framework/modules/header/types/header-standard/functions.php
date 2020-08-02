<?php

if ( ! function_exists( 'pawfriends_mikado_register_header_standard_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function pawfriends_mikado_register_header_standard_type( $header_types ) {
		$header_type = array(
			'header-standard' => 'PawFriendsMikadoNamespace\Modules\Header\Types\HeaderStandard'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'pawfriends_mikado_init_register_header_standard_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function pawfriends_mikado_init_register_header_standard_type() {
		add_filter( 'pawfriends_mikado_filter_register_header_type_class', 'pawfriends_mikado_register_header_standard_type' );
	}
	
	add_action( 'pawfriends_mikado_action_before_header_function_init', 'pawfriends_mikado_init_register_header_standard_type' );
}