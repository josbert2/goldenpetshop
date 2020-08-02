<?php

if ( ! function_exists( 'pawfriends_mikado_map_post_quote_meta' ) ) {
	function pawfriends_mikado_map_post_quote_meta() {
		$quote_post_format_meta_box = pawfriends_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'pawfriends' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'pawfriends' ),
				'description' => esc_html__( 'Enter Quote text', 'pawfriends' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'pawfriends' ),
				'description' => esc_html__( 'Enter Quote author', 'pawfriends' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
	}
	
	add_action( 'pawfriends_mikado_action_meta_boxes_map', 'pawfriends_mikado_map_post_quote_meta', 25 );
}