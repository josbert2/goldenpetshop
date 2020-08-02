<?php

if ( ! function_exists( 'pawfriends_mikado_skewed_section_title_meta' ) ) {
	function pawfriends_mikado_skewed_section_title_meta( $show_title_area_container ) {
		
		pawfriends_mikado_add_admin_section_title(
			array(
				'parent' => $show_title_area_container,
				'name'   => 'skewed_section_container',
				'title'  => esc_html__( 'Skewed Section', 'pawfriends' )
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_enable_skewed_section_on_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Enable Skewed Section', 'pawfriends' ),
				'description'   => esc_html__( 'This option will enable/disable Skew Section on Title Area', 'pawfriends' ),
				'options'       => pawfriends_mikado_get_yes_no_select_array(),
				'parent'        => $show_title_area_container
			)
		);
		
		$show_skewed_section_title_area_container = pawfriends_mikado_add_admin_container(
			array(
				'parent'     => $show_title_area_container,
				'name'       => 'show_skewed_section_title_area_container',
				'dependency' => array(
					'show' => array(
						'mkdf_enable_skewed_section_on_title_area_meta' => 'yes'
					)
				)
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_title_area_skewed_section_type_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Position', 'pawfriends' ),
				'description'   => esc_html__( 'Specify skewed section position', 'pawfriends' ),
				'parent'        => $show_skewed_section_title_area_container,
				'options'       => array(
					''        => esc_html__( 'Default', 'pawfriends' ),
					'outline' => esc_html__( 'Outline', 'pawfriends' ),
					'inset'   => esc_html__( 'Inset', 'pawfriends' )
				)
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'parent'      => $show_skewed_section_title_area_container,
				'type'        => 'textarea',
				'name'        => 'mkdf_title_area_skewed_section_svg_path_meta',
				'label'       => esc_html__( 'Skewed Section On Title Area SVG Path', 'pawfriends' ),
				'description' => esc_html__( 'Enter your Section On Title Area SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'pawfriends' ),
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'parent'      => $show_skewed_section_title_area_container,
				'type'        => 'color',
				'name'        => 'mkdf_title_area_skewed_section_svg_color_meta',
				'label'       => esc_html__( 'Skewed Section Color', 'pawfriends' ),
				'description' => esc_html__( 'Choose a background color for Skewed Section', 'pawfriends' ),
			)
		);
	}
	
	add_action( 'pawfriends_mikado_action_additional_title_area_meta_boxes', 'pawfriends_mikado_skewed_section_title_meta', 20 );
}

if ( ! function_exists( 'pawfriends_mikado_skewed_section_header_meta' ) ) {
	function pawfriends_mikado_skewed_section_header_meta( $show_header_area_container ) {
		
		pawfriends_mikado_add_admin_section_title(
			array(
				'parent' => $show_header_area_container,
				'name'   => 'skewed_section_container',
				'title'  => esc_html__( 'Skewed Section', 'pawfriends' )
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_enable_skewed_section_on_header_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Enable Skewed Section', 'pawfriends' ),
				'description'   => esc_html__( 'This option will enable/disable Skew Section on Header Area', 'pawfriends' ),
				'options'       => pawfriends_mikado_get_yes_no_select_array(),
				'parent'        => $show_header_area_container
			)
		);
		
		$show_skewed_section_header_area_container = pawfriends_mikado_add_admin_container(
			array(
				'parent'     => $show_header_area_container,
				'name'       => 'show_skewed_section_header_area_container',
				'dependency' => array(
					'show' => array(
						'mkdf_enable_skewed_section_on_header_area_meta' => 'yes'
					)
				)
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'parent'      => $show_skewed_section_header_area_container,
				'type'        => 'textarea',
				'name'        => 'mkdf_header_area_skewed_section_svg_path_meta',
				'label'       => esc_html__( 'Skewed Section On Header Area SVG Path', 'pawfriends' ),
				'description' => esc_html__( 'Enter your Section On Header Area SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'pawfriends' ),
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'parent'      => $show_skewed_section_header_area_container,
				'type'        => 'color',
				'name'        => 'mkdf_header_area_skewed_section_svg_color_meta',
				'label'       => esc_html__( 'Skewed Section Color', 'pawfriends' ),
				'description' => esc_html__( 'Choose a background color for Skewed Section', 'pawfriends' ),
			)
		);
	}
	
	add_action( 'pawfriends_mikado_action_additional_header_area_meta_boxes', 'pawfriends_mikado_skewed_section_header_meta', 20 );
}