<?php

if ( ! function_exists( 'pawfriends_mikado_set_title_centered_type_for_options' ) ) {
	/**
	 * This function set centered title type value for title options map and meta boxes
	 */
	function pawfriends_mikado_set_title_centered_type_for_options( $type ) {
		$type['centered'] = esc_html__( 'Centered', 'pawfriends' );
		
		return $type;
	}
	
	add_filter( 'pawfriends_mikado_filter_title_type_global_option', 'pawfriends_mikado_set_title_centered_type_for_options' );
	add_filter( 'pawfriends_mikado_filter_title_type_meta_boxes', 'pawfriends_mikado_set_title_centered_type_for_options' );
}