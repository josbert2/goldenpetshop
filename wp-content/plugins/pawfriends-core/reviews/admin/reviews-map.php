<?php

if ( ! function_exists( 'pawfriends_core_reviews_map' ) ) {
	function pawfriends_core_reviews_map() {
		
		$reviews_panel = pawfriends_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Reviews', 'pawfriends-core' ),
				'name'  => 'panel_reviews',
				'page'  => '_page_page'
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'      => $reviews_panel,
				'type'        => 'text',
				'name'        => 'reviews_section_title',
				'label'       => esc_html__( 'Reviews Section Title', 'pawfriends-core' ),
				'description' => esc_html__( 'Enter title that you want to show before average rating on your page', 'pawfriends-core' ),
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'      => $reviews_panel,
				'type'        => 'textarea',
				'name'        => 'reviews_section_subtitle',
				'label'       => esc_html__( 'Reviews Section Subtitle', 'pawfriends-core' ),
				'description' => esc_html__( 'Enter subtitle that you want to show before average rating on your page', 'pawfriends-core' ),
			)
		);
	}
	
	add_action( 'pawfriends_mikado_action_additional_page_options_map', 'pawfriends_core_reviews_map', 75 ); //one after elements
}