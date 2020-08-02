<?php

if ( ! function_exists( 'pawfriends_mikado_set_hide_dep_options_title_standard' ) ) {
	/**
	 * This function is used to hide all containers/panels for admin options when this title type is selected
	 */
	function pawfriends_mikado_set_hide_dep_options_title_standard( $hide_dep_options ) {
		$hide_dep_options[] = 'standard';
		
		return $hide_dep_options;
	}
	
	// hide breadcrumbs meta
	add_filter( 'pawfriends_mikado_filter_breadcrumbs_title_hide_meta_boxes', 'pawfriends_mikado_set_hide_dep_options_title_standard' );
}