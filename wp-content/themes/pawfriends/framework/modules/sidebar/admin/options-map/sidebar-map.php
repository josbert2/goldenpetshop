<?php

if ( ! function_exists( 'pawfriends_mikado_sidebar_options_map' ) ) {
	function pawfriends_mikado_sidebar_options_map() {
		
		pawfriends_mikado_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__( 'Sidebar Area', 'pawfriends' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$sidebar_panel = pawfriends_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Sidebar Area', 'pawfriends' ),
				'name'  => 'sidebar',
				'page'  => '_sidebar_page'
			)
		);
		
		pawfriends_mikado_add_admin_field( array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'pawfriends' ),
			'description'   => esc_html__( 'Choose a sidebar layout for pages', 'pawfriends' ),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
            'options'       => pawfriends_mikado_get_custom_sidebars_options()
		) );
		
		$pawfriends_custom_sidebars = pawfriends_mikado_get_custom_sidebars();
		if ( count( $pawfriends_custom_sidebars ) > 0 ) {
			pawfriends_mikado_add_admin_field( array(
				'name'        => 'custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'pawfriends' ),
				'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'pawfriends' ),
				'parent'      => $sidebar_panel,
				'options'     => $pawfriends_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
	}
	
	add_action( 'pawfriends_mikado_action_options_map', 'pawfriends_mikado_sidebar_options_map', pawfriends_mikado_set_options_map_position( 'sidebar' ) );
}