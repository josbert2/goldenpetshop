<?php

if ( ! function_exists( 'pawfriends_mikado_get_search_types_options' ) ) {
    function pawfriends_mikado_get_search_types_options() {
        $search_type_options = apply_filters( 'pawfriends_mikado_filter_search_type_global_option', $search_type_options = array() );

        return $search_type_options;
    }
}

if ( ! function_exists( 'pawfriends_mikado_search_options_map' ) ) {
	function pawfriends_mikado_search_options_map() {
		
		pawfriends_mikado_add_admin_page(
			array(
				'slug'  => '_search_page',
				'title' => esc_html__( 'Search', 'pawfriends' ),
				'icon'  => 'fa fa-search'
			)
		);
		
		$search_page_panel = pawfriends_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Search Page', 'pawfriends' ),
				'name'  => 'search_template',
				'page'  => '_search_page'
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'          => 'search_page_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Layout', 'pawfriends' ),
				'default_value' => 'in-grid',
				'description'   => esc_html__( 'Set layout. Default is in grid.', 'pawfriends' ),
				'parent'        => $search_page_panel,
				'options'       => array(
					'in-grid'    => esc_html__( 'In Grid', 'pawfriends' ),
					'full-width' => esc_html__( 'Full Width', 'pawfriends' )
				)
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'          => 'search_page_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'pawfriends' ),
				'description'   => esc_html__( "Choose a sidebar layout for search page", 'pawfriends' ),
				'default_value' => 'no-sidebar',
				'options'       => pawfriends_mikado_get_custom_sidebars_options(),
				'parent'        => $search_page_panel
			)
		);
		
		$pawfriends_custom_sidebars = pawfriends_mikado_get_custom_sidebars();
		if ( count( $pawfriends_custom_sidebars ) > 0 ) {
			pawfriends_mikado_add_admin_field(
				array(
					'name'        => 'search_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display', 'pawfriends' ),
					'description' => esc_html__( 'Choose a sidebar to display on search page. Default sidebar is "Sidebar"', 'pawfriends' ),
					'parent'      => $search_page_panel,
					'options'     => $pawfriends_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		$search_panel = pawfriends_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Search', 'pawfriends' ),
				'name'  => 'search',
				'page'  => '_search_page'
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'select',
				'name'          => 'search_type',
				'default_value' => 'covers-header',
				'label'         => esc_html__( 'Select Search Type', 'pawfriends' ),
				'description'   => esc_html__( "Choose a type of Select search bar (Note: Slide From Header Bottom search type doesn't work with Vertical Header)", 'pawfriends' ),
				'options'       => pawfriends_mikado_get_search_types_options()
			)
		);

		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'select',
				'name'          => 'search_icon_source',
				'default_value' => 'predefined',
				'label'         => esc_html__( 'Select Search Icon Source', 'pawfriends' ),
				'description'   => esc_html__( 'Choose whether you would like to use icons from an icon pack or SVG icons', 'pawfriends' ),
				'options'       => pawfriends_mikado_get_icon_sources_array( false, true )
			)
		);

		$search_icon_pack_container = pawfriends_mikado_add_admin_container(
			array(
				'parent'          => $search_panel,
				'name'            => 'search_icon_pack_container',
				'dependency' => array(
					'show' => array(
						'search_icon_source' => 'icon_pack'
					)
				)
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $search_icon_pack_container,
				'type'          => 'select',
				'name'          => 'search_icon_pack',
				'default_value' => 'font_elegant',
				'label'         => esc_html__( 'Search Icon Pack', 'pawfriends' ),
				'description'   => esc_html__( 'Choose icon pack for search icon', 'pawfriends' ),
				'options'       => pawfriends_mikado_icon_collections()->getIconCollectionsExclude( array( 'linea_icons', 'dripicons', 'simple_line_icons' ) )
			)
		);

		$search_svg_path_container = pawfriends_mikado_add_admin_container(
			array(
				'parent'          => $search_panel,
				'name'            => 'search_icon_svg_path_container',
				'dependency' => array(
					'show' => array(
						'search_icon_source' => 'svg_path'
					)
				)
			)
		);

		pawfriends_mikado_add_admin_field(
			array(
				'parent'      => $search_svg_path_container,
				'type'        => 'textarea',
				'name'        => 'search_icon_svg_path',
				'label'       => esc_html__( 'Search Icon SVG Path', 'pawfriends' ),
				'description' => esc_html__( 'Enter your search icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'pawfriends' ),
			)
		);

		pawfriends_mikado_add_admin_field(
			array(
				'parent'      => $search_svg_path_container,
				'type'        => 'textarea',
				'name'        => 'search_close_icon_svg_path',
				'label'       => esc_html__( 'Search Close Icon SVG Path', 'pawfriends' ),
				'description' => esc_html__( 'Enter your search close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'pawfriends' ),
			)
		);

        pawfriends_mikado_add_admin_field(
            array(
                'type'          => 'select',
                'name'          => 'search_sidebar_columns',
                'parent'        => $search_panel,
                'default_value' => '3',
                'label'         => esc_html__( 'Search Sidebar Columns', 'pawfriends' ),
                'description'   => esc_html__( 'Choose number of columns for FullScreen search sidebar area', 'pawfriends' ),
                'options'       => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                ),
				'dependency' => array(
					'show' => array(
						'search_type' => apply_filters('search_sidebar_columns_dependency', $dependency_array = array())
					)
				)
            )
        );
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'yesno',
				'name'          => 'search_in_grid',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Grid Layout', 'pawfriends' ),
				'description'   => esc_html__( 'Set search area to be in grid. (Applied for Search covers header and Slide from Window Top types.', 'pawfriends' ),
				'dependency' => array(
					'show' => array(
						'search_type' => apply_filters('search_in_grid_dependency', $dependency_array = array())
					)
				)
			)
		);
		
		pawfriends_mikado_add_admin_section_title(
			array(
				'parent' => $search_panel,
				'name'   => 'initial_header_icon_title',
				'title'  => esc_html__( 'Initial Search Icon in Header', 'pawfriends' )
			)
		);

		$search_icon_pack_icon_styles_container = pawfriends_mikado_add_admin_container(
			array(
				'parent'          => $search_panel,
				'name'            => 'search_icon_pack_icon_styles_container',
				'dependency' => array(
					'show' => array(
						'search_icon_source' => 'icon_pack'
					)
				)
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $search_icon_pack_icon_styles_container,
				'type'          => 'text',
				'name'          => 'header_search_icon_size',
				'default_value' => '',
				'label'         => esc_html__( 'Icon Size', 'pawfriends' ),
				'description'   => esc_html__( 'Set size for icon', 'pawfriends' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		$search_icon_color_group = pawfriends_mikado_add_admin_group(
			array(
				'parent'      => $search_panel,
				'title'       => esc_html__( 'Icon Colors', 'pawfriends' ),
				'description' => esc_html__( 'Define color style for icon', 'pawfriends' ),
				'name'        => 'search_icon_color_group'
			)
		);
		
		$search_icon_color_row = pawfriends_mikado_add_admin_row(
			array(
				'parent' => $search_icon_color_group,
				'name'   => 'search_icon_color_row'
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'   => 'colorsimple',
				'name'   => 'header_search_icon_color',
				'label'  => esc_html__( 'Color', 'pawfriends' )
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'   => 'colorsimple',
				'name'   => 'header_search_icon_hover_color',
				'label'  => esc_html__( 'Hover Color', 'pawfriends' )
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'yesno',
				'name'          => 'enable_search_icon_text',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Search Icon Text', 'pawfriends' ),
				'description'   => esc_html__( "Enable this option to show 'Search' text next to search icon in header", 'pawfriends' )
			)
		);
		
		$enable_search_icon_text_container = pawfriends_mikado_add_admin_container(
			array(
				'parent'          => $search_panel,
				'name'            => 'enable_search_icon_text_container',
				'dependency' => array(
					'show' => array(
						'enable_search_icon_text' => 'yes'
					)
				)
			)
		);
		
		$enable_search_icon_text_group = pawfriends_mikado_add_admin_group(
			array(
				'parent'      => $enable_search_icon_text_container,
				'title'       => esc_html__( 'Search Icon Text', 'pawfriends' ),
				'name'        => 'enable_search_icon_text_group',
				'description' => esc_html__( 'Define style for search icon text', 'pawfriends' )
			)
		);
		
		$enable_search_icon_text_row = pawfriends_mikado_add_admin_row(
			array(
				'parent' => $enable_search_icon_text_group,
				'name'   => 'enable_search_icon_text_row'
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent' => $enable_search_icon_text_row,
				'type'   => 'colorsimple',
				'name'   => 'search_icon_text_color',
				'label'  => esc_html__( 'Text Color', 'pawfriends' )
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent' => $enable_search_icon_text_row,
				'type'   => 'colorsimple',
				'name'   => 'search_icon_text_color_hover',
				'label'  => esc_html__( 'Text Hover Color', 'pawfriends' )
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row,
				'type'          => 'textsimple',
				'name'          => 'search_icon_text_font_size',
				'label'         => esc_html__( 'Font Size', 'pawfriends' ),
				'default_value' => '',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row,
				'type'          => 'textsimple',
				'name'          => 'search_icon_text_line_height',
				'label'         => esc_html__( 'Line Height', 'pawfriends' ),
				'default_value' => '',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$enable_search_icon_text_row2 = pawfriends_mikado_add_admin_row(
			array(
				'parent' => $enable_search_icon_text_group,
				'name'   => 'enable_search_icon_text_row2',
				'next'   => true
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_icon_text_text_transform',
				'label'         => esc_html__( 'Text Transform', 'pawfriends' ),
				'default_value' => '',
				'options'       => pawfriends_mikado_get_text_transform_array()
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'fontsimple',
				'name'          => 'search_icon_text_google_fonts',
				'label'         => esc_html__( 'Font Family', 'pawfriends' ),
				'default_value' => '-1',
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_icon_text_font_style',
				'label'         => esc_html__( 'Font Style', 'pawfriends' ),
				'default_value' => '',
				'options'       => pawfriends_mikado_get_font_style_array(),
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_icon_text_font_weight',
				'label'         => esc_html__( 'Font Weight', 'pawfriends' ),
				'default_value' => '',
				'options'       => pawfriends_mikado_get_font_weight_array(),
			)
		);
		
		$enable_search_icon_text_row3 = pawfriends_mikado_add_admin_row(
			array(
				'parent' => $enable_search_icon_text_group,
				'name'   => 'enable_search_icon_text_row3',
				'next'   => true
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row3,
				'type'          => 'textsimple',
				'name'          => 'search_icon_text_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'pawfriends' ),
				'default_value' => '',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
	}
	
	add_action( 'pawfriends_mikado_action_options_map', 'pawfriends_mikado_search_options_map', pawfriends_mikado_set_options_map_position( 'search' ) );
}