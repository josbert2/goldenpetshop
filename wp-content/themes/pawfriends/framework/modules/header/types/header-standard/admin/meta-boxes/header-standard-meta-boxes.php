<?php

if ( ! function_exists( 'pawfriends_mikado_get_hide_dep_for_header_standard_meta_boxes' ) ) {
	function pawfriends_mikado_get_hide_dep_for_header_standard_meta_boxes() {
		$hide_dep_options = apply_filters( 'pawfriends_mikado_filter_header_standard_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'pawfriends_mikado_header_standard_meta_map' ) ) {
	function pawfriends_mikado_header_standard_meta_map( $parent ) {
		$hide_dep_options = pawfriends_mikado_get_hide_dep_for_header_standard_meta_boxes();
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'mkdf_set_menu_area_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Menu Area Position', 'pawfriends' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'pawfriends' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'pawfriends' ),
					'left'   => esc_html__( 'Left', 'pawfriends' ),
					'right'  => esc_html__( 'Right', 'pawfriends' ),
					'center' => esc_html__( 'Center', 'pawfriends' )
				),
				'dependency' => array(
					'hide' => array(
						'mkdf_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'pawfriends_mikado_action_additional_header_area_meta_boxes_map', 'pawfriends_mikado_header_standard_meta_map' );
}