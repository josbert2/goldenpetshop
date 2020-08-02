<?php

if ( ! function_exists( 'pawfriends_mikado_sticky_header_meta_boxes_options_map' ) ) {
	function pawfriends_mikado_sticky_header_meta_boxes_options_map( $header_meta_box ) {
		
		$sticky_amount_container = pawfriends_mikado_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'sticky_amount_container_meta_container',
				'dependency' => array(
					'hide' => array(
						'mkdf_header_behaviour_meta'  => array( '', 'no-behavior','fixed-on-scroll','sticky-header-on-scroll-up' )
					)
				)
			)
		);

		pawfriends_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_sticky_header_in_grid_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Sticky Header in Grid', 'pawfriends' ),
				'description'   => esc_html__( 'Enabling this option will put sticky header in grid', 'pawfriends' ),
				'parent'        => $header_meta_box,
				'options'       => pawfriends_mikado_get_yes_no_select_array()
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_scroll_amount_for_sticky_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Scroll Amount for Sticky Header Appearance', 'pawfriends' ),
				'description' => esc_html__( 'Define scroll amount for sticky header appearance', 'pawfriends' ),
				'parent'      => $sticky_amount_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);
		
		$pawfriends_custom_sidebars = pawfriends_mikado_get_custom_sidebars();
		if ( count( $pawfriends_custom_sidebars ) > 0 ) {
			pawfriends_mikado_create_meta_box_field(
				array(
					'name'        => 'mkdf_custom_sticky_menu_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area In Sticky Header Menu Area', 'pawfriends' ),
					'description' => esc_html__( 'Choose custom widget area to display in sticky header menu area"', 'pawfriends' ),
					'parent'      => $header_meta_box,
					'options'     => $pawfriends_custom_sidebars,
					'dependency' => array(
						'show' => array(
							'mkdf_header_behaviour_meta' => array( 'sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up' )
						)
					)
				)
			);
		}
	}
	
	add_action( 'pawfriends_mikado_action_additional_header_area_meta_boxes_map', 'pawfriends_mikado_sticky_header_meta_boxes_options_map', 8 );
}