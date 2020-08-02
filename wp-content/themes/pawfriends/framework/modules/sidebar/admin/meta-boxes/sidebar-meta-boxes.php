<?php

if ( ! function_exists( 'pawfriends_mikado_map_sidebar_meta' ) ) {
	function pawfriends_mikado_map_sidebar_meta() {
		$mkdf_sidebar_meta_box = pawfriends_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'pawfriends_mikado_filter_set_scope_for_meta_boxes', array( 'page' ), 'sidebar_meta' ),
				'title' => esc_html__( 'Sidebar', 'pawfriends' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Sidebar Layout', 'pawfriends' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'pawfriends' ),
				'parent'      => $mkdf_sidebar_meta_box,
                'options'       => pawfriends_mikado_get_custom_sidebars_options( true )
			)
		);
		
		$mkdf_custom_sidebars = pawfriends_mikado_get_custom_sidebars();
		if ( count( $mkdf_custom_sidebars ) > 0 ) {
			pawfriends_mikado_create_meta_box_field(
				array(
					'name'        => 'mkdf_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'pawfriends' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'pawfriends' ),
					'parent'      => $mkdf_sidebar_meta_box,
					'options'     => $mkdf_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'pawfriends_mikado_action_meta_boxes_map', 'pawfriends_mikado_map_sidebar_meta', 31 );
}