<?php

if ( ! function_exists( 'pawfriends_mikado_portfolio_category_additional_fields' ) ) {
	function pawfriends_mikado_portfolio_category_additional_fields() {
		
		$fields = pawfriends_mikado_add_taxonomy_fields(
			array(
				'scope' => 'portfolio-category',
				'name'  => 'portfolio_category_options'
			)
		);
		
		pawfriends_mikado_add_taxonomy_field(
			array(
				'name'   => 'mkdf_portfolio_category_image_meta',
				'type'   => 'image',
				'label'  => esc_html__( 'Category Image', 'pawfriends-core' ),
				'parent' => $fields
			)
		);
	}
	
	add_action( 'pawfriends_mikado_action_custom_taxonomy_fields', 'pawfriends_mikado_portfolio_category_additional_fields' );
}