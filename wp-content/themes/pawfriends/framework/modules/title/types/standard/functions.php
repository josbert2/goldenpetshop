<?php

if ( ! function_exists( 'pawfriends_mikado_set_title_standard_type_for_options' ) ) {
	/**
	 * This function set standard title type value for title options map and meta boxes
	 */
	function pawfriends_mikado_set_title_standard_type_for_options( $type ) {
		$type['standard'] = esc_html__( 'Standard', 'pawfriends' );
		
		return $type;
	}
	
	add_filter( 'pawfriends_mikado_filter_title_type_global_option', 'pawfriends_mikado_set_title_standard_type_for_options' );
	add_filter( 'pawfriends_mikado_filter_title_type_meta_boxes', 'pawfriends_mikado_set_title_standard_type_for_options' );
}