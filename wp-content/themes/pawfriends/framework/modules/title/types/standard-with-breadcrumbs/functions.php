<?php

if ( ! function_exists( 'pawfriends_mikado_set_title_standard_with_breadcrumbs_type_for_options' ) ) {
	/**
	 * This function set standard with breadcrumbs title type value for title options map and meta boxes
	 */
	function pawfriends_mikado_set_title_standard_with_breadcrumbs_type_for_options( $type ) {
		$type['standard-with-breadcrumbs'] = esc_html__( 'Standard With Breadcrumbs', 'pawfriends' );
		
		return $type;
	}
	
	add_filter( 'pawfriends_mikado_filter_title_type_global_option', 'pawfriends_mikado_set_title_standard_with_breadcrumbs_type_for_options' );
	add_filter( 'pawfriends_mikado_filter_title_type_meta_boxes', 'pawfriends_mikado_set_title_standard_with_breadcrumbs_type_for_options' );
}

if ( ! function_exists( 'pawfriends_mikado_set_title_standard_type_as_default_options' ) ) {
    /**
     * This function set default title type value for global title option map
     */
    function pawfriends_mikado_set_title_standard_type_as_default_options( $type ) {
        $type = 'standard-with-breadcrumbs';

        return $type;
    }

    add_filter( 'pawfriends_mikado_filter_default_title_type_global_option', 'pawfriends_mikado_set_title_standard_type_as_default_options' );
}