<?php

if ( ! function_exists( 'pawfriends_mikado_register_blog_masonry_template_file' ) ) {
	/**
	 * Function that register blog masonry template
	 */
	function pawfriends_mikado_register_blog_masonry_template_file( $templates ) {
		$templates['blog-masonry'] = esc_html__( 'Blog: Masonry', 'pawfriends' );
		
		return $templates;
	}
	
	add_filter( 'pawfriends_mikado_filter_register_blog_templates', 'pawfriends_mikado_register_blog_masonry_template_file' );
}

if ( ! function_exists( 'pawfriends_mikado_set_blog_masonry_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function pawfriends_mikado_set_blog_masonry_type_global_option( $options ) {
		$options['masonry'] = esc_html__( 'Blog: Masonry', 'pawfriends' );
		
		return $options;
	}
	
	add_filter( 'pawfriends_mikado_filter_blog_list_type_global_option', 'pawfriends_mikado_set_blog_masonry_type_global_option' );
}