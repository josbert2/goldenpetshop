<?php

if ( ! function_exists( 'pawfriends_mikado_map_post_link_meta' ) ) {
	function pawfriends_mikado_map_post_link_meta() {
		$link_post_format_meta_box = pawfriends_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'pawfriends' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'pawfriends' ),
				'description' => esc_html__( 'Enter link', 'pawfriends' ),
				'parent'      => $link_post_format_meta_box
			)
		);
	}
	
	add_action( 'pawfriends_mikado_action_meta_boxes_map', 'pawfriends_mikado_map_post_link_meta', 24 );
}