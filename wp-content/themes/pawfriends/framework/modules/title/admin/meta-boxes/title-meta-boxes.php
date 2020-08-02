<?php

if ( ! function_exists( 'pawfriends_mikado_get_title_types_meta_boxes' ) ) {
	function pawfriends_mikado_get_title_types_meta_boxes() {
		$title_type_options = apply_filters( 'pawfriends_mikado_filter_title_type_meta_boxes', $title_type_options = array( '' => esc_html__( 'Default', 'pawfriends' ) ) );
		
		return $title_type_options;
	}
}

foreach ( glob( MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'pawfriends_mikado_map_title_meta' ) ) {
	function pawfriends_mikado_map_title_meta() {
		$title_type_meta_boxes = pawfriends_mikado_get_title_types_meta_boxes();
		
		$title_meta_box = pawfriends_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'pawfriends_mikado_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'title_meta' ),
				'title' => esc_html__( 'Title', 'pawfriends' ),
				'name'  => 'title_meta'
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'pawfriends' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'pawfriends' ),
				'parent'        => $title_meta_box,
				'options'       => pawfriends_mikado_get_yes_no_select_array()
			)
		);
		
			$show_title_area_meta_container = pawfriends_mikado_add_admin_container(
				array(
					'parent'          => $title_meta_box,
					'name'            => 'mkdf_show_title_area_meta_container',
					'dependency' => array(
						'hide' => array(
							'mkdf_show_title_area_meta' => 'no'
						)
					)
				)
			);
		
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_type_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area Type', 'pawfriends' ),
						'description'   => esc_html__( 'Choose title type', 'pawfriends' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => $title_type_meta_boxes
					)
				);
		
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_in_grid_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area In Grid', 'pawfriends' ),
						'description'   => esc_html__( 'Set title area content to be in grid', 'pawfriends' ),
						'options'       => pawfriends_mikado_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
		
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_height_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height', 'pawfriends' ),
						'description' => esc_html__( 'Set a height for Title Area', 'pawfriends' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);

				pawfriends_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_height_mobile_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height on Mobile', 'pawfriends' ),
						'description' => esc_html__( 'Set a height for Title Area on Mobile', 'pawfriends' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);
				
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Background Color', 'pawfriends' ),
						'description' => esc_html__( 'Choose a background color for title area', 'pawfriends' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'pawfriends' ),
						'description' => esc_html__( 'Choose an Image for title area', 'pawfriends' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_background_image_behavior_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Behavior', 'pawfriends' ),
						'description'   => esc_html__( 'Choose title area background image behavior', 'pawfriends' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''                    => esc_html__( 'Default', 'pawfriends' ),
							'hide'                => esc_html__( 'Hide Image', 'pawfriends' ),
							'responsive'          => esc_html__( 'Enable Responsive Image', 'pawfriends' ),
							'responsive-disabled' => esc_html__( 'Disable Responsive Image', 'pawfriends' ),
							'parallax'            => esc_html__( 'Enable Parallax Image', 'pawfriends' ),
							'parallax-zoom-out'   => esc_html__( 'Enable Parallax With Zoom Out Image', 'pawfriends' ),
							'parallax-disabled'   => esc_html__( 'Disable Parallax Image', 'pawfriends' )
						)
					)
				);
				
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Vertical Alignment', 'pawfriends' ),
						'description'   => esc_html__( 'Specify title area content vertical alignment', 'pawfriends' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''              => esc_html__( 'Default', 'pawfriends' ),
							'header-bottom' => esc_html__( 'From Bottom of Header', 'pawfriends' ),
							'window-top'    => esc_html__( 'From Window Top', 'pawfriends' )
						)
					)
				);
				
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_title_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Tag', 'pawfriends' ),
						'options'       => pawfriends_mikado_get_title_tag( true ),
						'parent'        => $show_title_area_meta_container
					)
				);

                pawfriends_mikado_create_meta_box_field(
                    array(
                        'name'          => 'mkdf_title_area_title_box_meta',
                        'type'          => 'select',
                        'default_value' => '',
                        'label'         => esc_html__( 'Text in Box', 'pawfriends' ),
                        'options'       => pawfriends_mikado_get_yes_no_select_array(),
                        'parent'        => $show_title_area_meta_container
                    )
                );
				
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_text_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Title Color', 'pawfriends' ),
						'description' => esc_html__( 'Choose a color for title text', 'pawfriends' ),
						'parent'      => $show_title_area_meta_container
					)
				);
				
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_subtitle_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Text', 'pawfriends' ),
						'description'   => esc_html__( 'Enter your subtitle text', 'pawfriends' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
		
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_subtitle_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Tag', 'pawfriends' ),
						'options'       => pawfriends_mikado_get_title_tag( true, array( 'p' => 'p' ) ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_subtitle_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Subtitle Color', 'pawfriends' ),
						'description' => esc_html__( 'Choose a color for subtitle text', 'pawfriends' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'pawfriends_mikado_action_additional_title_area_meta_boxes', $show_title_area_meta_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
	}
	
	add_action( 'pawfriends_mikado_action_meta_boxes_map', 'pawfriends_mikado_map_title_meta', 60 );
}