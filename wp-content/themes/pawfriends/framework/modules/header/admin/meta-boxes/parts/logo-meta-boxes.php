<?php

if ( ! function_exists( 'pawfriends_mikado_logo_meta_box_map' ) ) {
	function pawfriends_mikado_logo_meta_box_map() {
		
		$logo_meta_box = pawfriends_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'pawfriends_mikado_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'logo_meta' ),
				'title' => esc_html__( 'Logo', 'pawfriends' ),
				'name'  => 'logo_meta'
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'pawfriends' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'pawfriends' ),
				'parent'      => $logo_meta_box
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'pawfriends' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'pawfriends' ),
				'parent'      => $logo_meta_box
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'pawfriends' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'pawfriends' ),
				'parent'      => $logo_meta_box
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'pawfriends' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'pawfriends' ),
				'parent'      => $logo_meta_box
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'pawfriends' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'pawfriends' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'pawfriends_mikado_action_meta_boxes_map', 'pawfriends_mikado_logo_meta_box_map', 47 );
}