<?php

if ( ! function_exists( 'pawfriends_mikado_map_footer_meta' ) ) {
	function pawfriends_mikado_map_footer_meta() {
		
		$footer_meta_box = pawfriends_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'pawfriends_mikado_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'footer_meta' ),
				'title' => esc_html__( 'Footer', 'pawfriends' ),
				'name'  => 'footer_meta'
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_disable_footer_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Disable Footer For This Page', 'pawfriends' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'pawfriends' ),
				'options'       => pawfriends_mikado_get_yes_no_select_array(),
				'parent'        => $footer_meta_box
			)
		);
		
		$show_footer_meta_container = pawfriends_mikado_add_admin_container(
			array(
				'name'       => 'mkdf_show_footer_meta_container',
				'parent'     => $footer_meta_box,
				'dependency' => array(
					'hide' => array(
						'mkdf_disable_footer_meta' => 'yes'
					)
				)
			)
		);
		
			pawfriends_mikado_create_meta_box_field(
				array(
					'name'          => 'mkdf_footer_in_grid_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Footer in Grid', 'pawfriends' ),
					'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'pawfriends' ),
					'options'       => pawfriends_mikado_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
			
			pawfriends_mikado_create_meta_box_field(
				array(
					'name'          => 'mkdf_uncovering_footer_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Uncovering Footer', 'pawfriends' ),
					'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'pawfriends' ),
					'options'       => pawfriends_mikado_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
		
			pawfriends_mikado_create_meta_box_field(
				array(
					'name'          => 'mkdf_show_footer_top_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Top', 'pawfriends' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'pawfriends' ),
					'options'       => pawfriends_mikado_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
		
			$footer_top_styles_group = pawfriends_mikado_add_admin_group(
				array(
					'name'        => 'footer_top_styles_group',
					'title'       => esc_html__( 'Footer Top Styles', 'pawfriends' ),
					'description' => esc_html__( 'Define style for footer top area', 'pawfriends' ),
					'parent'      => $show_footer_meta_container,
					'dependency'  => array(
						'hide' => array(
							'mkdf_show_footer_top_meta' => 'no'
						)
					)
				)
			);
			
			$footer_top_styles_row_1 = pawfriends_mikado_add_admin_row(
				array(
					'name'   => 'footer_top_styles_row_1',
					'parent' => $footer_top_styles_group
				)
			);
		
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'   => 'mkdf_footer_top_background_color_meta',
						'type'   => 'colorsimple',
						'label'  => esc_html__( 'Background Color', 'pawfriends' ),
						'parent' => $footer_top_styles_row_1
					)
				);
		
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'   => 'mkdf_footer_top_border_color_meta',
						'type'   => 'colorsimple',
						'label'  => esc_html__( 'Border Color', 'pawfriends' ),
						'parent' => $footer_top_styles_row_1
					)
				);
		
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'   => 'mkdf_footer_top_border_width_meta',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Border Width', 'pawfriends' ),
						'parent' => $footer_top_styles_row_1,
						'args'   => array(
							'suffix' => 'px'
						)
					)
				);
			
			pawfriends_mikado_create_meta_box_field(
				array(
					'name'          => 'mkdf_show_footer_bottom_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Bottom', 'pawfriends' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'pawfriends' ),
					'options'       => pawfriends_mikado_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
		
			$footer_bottom_styles_group = pawfriends_mikado_add_admin_group(
				array(
					'name'        => 'footer_bottom_styles_group',
					'title'       => esc_html__( 'Footer Bottom Styles', 'pawfriends' ),
					'description' => esc_html__( 'Define style for footer bottom area', 'pawfriends' ),
					'parent'      => $show_footer_meta_container,
					'dependency'  => array(
						'hide' => array(
							'mkdf_show_footer_bottom_meta' => 'no'
						)
					)
				)
			);
			
			$footer_bottom_styles_row_1 = pawfriends_mikado_add_admin_row(
				array(
					'name'   => 'footer_bottom_styles_row_1',
					'parent' => $footer_bottom_styles_group
				)
			);
			
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'   => 'mkdf_footer_bottom_background_color_meta',
						'type'   => 'colorsimple',
						'label'  => esc_html__( 'Background Color', 'pawfriends' ),
						'parent' => $footer_bottom_styles_row_1
					)
				);
				
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'   => 'mkdf_footer_bottom_border_color_meta',
						'type'   => 'colorsimple',
						'label'  => esc_html__( 'Border Color', 'pawfriends' ),
						'parent' => $footer_bottom_styles_row_1
					)
				);
				
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'   => 'mkdf_footer_bottom_border_width_meta',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Border Width', 'pawfriends' ),
						'parent' => $footer_bottom_styles_row_1,
						'args'   => array(
							'suffix' => 'px'
						)
					)
				);
	}
	
	add_action( 'pawfriends_mikado_action_meta_boxes_map', 'pawfriends_mikado_map_footer_meta', 70 );
}