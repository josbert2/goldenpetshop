<?php

if ( ! function_exists( 'pawfriends_mikado_mobile_header_options_map' ) ) {
	function pawfriends_mikado_mobile_header_options_map() {
		
		pawfriends_mikado_add_admin_page(
			array(
				'slug'  => '_mobile_header',
				'title' => esc_html__( 'Mobile Header', 'pawfriends' ),
				'icon'  => 'fa fa-mobile'
			)
		);
		
		$panel_mobile_header = pawfriends_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Mobile Header', 'pawfriends' ),
				'name'  => 'panel_mobile_header',
				'page'  => '_mobile_header'
			)
		);
		
		$mobile_header_group = pawfriends_mikado_add_admin_group(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_header_group',
				'title'  => esc_html__( 'Mobile Header Styles', 'pawfriends' )
			)
		);
		
		$mobile_header_row1 = pawfriends_mikado_add_admin_row(
			array(
				'parent' => $mobile_header_group,
				'name'   => 'mobile_header_row1'
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'   => 'mobile_header_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Height', 'pawfriends' ),
				'parent' => $mobile_header_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'   => 'mobile_header_background_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Background Color', 'pawfriends' ),
				'parent' => $mobile_header_row1
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'   => 'mobile_header_border_bottom_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Border Bottom Color', 'pawfriends' ),
				'parent' => $mobile_header_row1
			)
		);
		
		$mobile_menu_group = pawfriends_mikado_add_admin_group(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_menu_group',
				'title'  => esc_html__( 'Mobile Menu Styles', 'pawfriends' )
			)
		);
		
		$mobile_menu_row1 = pawfriends_mikado_add_admin_row(
			array(
				'parent' => $mobile_menu_group,
				'name'   => 'mobile_menu_row1'
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'   => 'mobile_menu_background_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Background Color', 'pawfriends' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'   => 'mobile_menu_border_bottom_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Border Bottom Color', 'pawfriends' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'   => 'mobile_menu_separator_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Menu Item Separator Color', 'pawfriends' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'        => 'mobile_logo_height',
				'type'        => 'text',
				'label'       => esc_html__( 'Logo Height For Mobile Header', 'pawfriends' ),
				'description' => esc_html__( 'Define logo height for screen size smaller than 1024px', 'pawfriends' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'        => 'mobile_logo_height_phones',
				'type'        => 'text',
				'label'       => esc_html__( 'Logo Height For Mobile Devices', 'pawfriends' ),
				'description' => esc_html__( 'Define logo height for screen size smaller than 480px', 'pawfriends' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);

		pawfriends_mikado_add_admin_field(
			array(
				'name'          => 'mobile_header_in_grid',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Mobile Header in Grid', 'pawfriends' ),
				'description'   => esc_html__( 'Enabling this option will put mobile header in grid', 'pawfriends' ),
				'parent'        => $panel_mobile_header,
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);

		$mobile_header_without_grid_container = pawfriends_mikado_add_admin_container(
			array(
				'parent'          => $panel_mobile_header,
				'name'            => 'mobile_header_without_grid_container',
				'dependency' => array(
					'show' => array(
						'mobile_header_in_grid' => 'no'
					)
				)
			)
		);

		pawfriends_mikado_add_admin_field(
			array(
				'name'        => 'mobile_header_without_grid_padding',
				'type'        => 'text',
				'label'       => esc_html__( 'Mobile Header Padding', 'pawfriends' ),
				'description' => esc_html__( 'Set padding for Mobile Header', 'pawfriends' ),
				'parent'      => $mobile_header_without_grid_container,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		pawfriends_mikado_add_admin_section_title(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_header_fonts_title',
				'title'  => esc_html__( 'Typography', 'pawfriends' )
			)
		);
		
		$first_level_group = pawfriends_mikado_add_admin_group(
			array(
				'parent'      => $panel_mobile_header,
				'name'        => 'first_level_group',
				'title'       => esc_html__( '1st Level Menu', 'pawfriends' ),
				'description' => esc_html__( 'Define styles for 1st level in Mobile Menu Navigation', 'pawfriends' )
			)
		);
		
		$first_level_row1 = pawfriends_mikado_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row1'
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'   => 'mobile_text_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Text Color', 'pawfriends' ),
				'parent' => $first_level_row1
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'   => 'mobile_text_hover_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Hover/Active Text Color', 'pawfriends' ),
				'parent' => $first_level_row1
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'   => 'mobile_text_google_fonts',
				'type'   => 'fontsimple',
				'label'  => esc_html__( 'Font Family', 'pawfriends' ),
				'parent' => $first_level_row1
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'   => 'mobile_text_font_size',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Font Size', 'pawfriends' ),
				'parent' => $first_level_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		$first_level_row2 = pawfriends_mikado_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row2'
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'   => 'mobile_text_line_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Line Height', 'pawfriends' ),
				'parent' => $first_level_row2,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'    => 'mobile_text_text_transform',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Text Transform', 'pawfriends' ),
				'parent'  => $first_level_row2,
				'options' => pawfriends_mikado_get_text_transform_array()
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'    => 'mobile_text_font_style',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Style', 'pawfriends' ),
				'parent'  => $first_level_row2,
				'options' => pawfriends_mikado_get_font_style_array()
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'    => 'mobile_text_font_weight',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Weight', 'pawfriends' ),
				'parent'  => $first_level_row2,
				'options' => pawfriends_mikado_get_font_weight_array()
			)
		);
		
		$first_level_row3 = pawfriends_mikado_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row3'
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'mobile_text_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'pawfriends' ),
				'default_value' => '',
				'parent'        => $first_level_row3,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$second_level_group = pawfriends_mikado_add_admin_group(
			array(
				'parent'      => $panel_mobile_header,
				'name'        => 'second_level_group',
				'title'       => esc_html__( 'Dropdown Menu', 'pawfriends' ),
				'description' => esc_html__( 'Define styles for drop down menu items in Mobile Menu Navigation', 'pawfriends' )
			)
		);
		
		$second_level_row1 = pawfriends_mikado_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row1'
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Text Color', 'pawfriends' ),
				'parent' => $second_level_row1
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_hover_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Hover/Active Text Color', 'pawfriends' ),
				'parent' => $second_level_row1
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_google_fonts',
				'type'   => 'fontsimple',
				'label'  => esc_html__( 'Font Family', 'pawfriends' ),
				'parent' => $second_level_row1
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_font_size',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Font Size', 'pawfriends' ),
				'parent' => $second_level_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		$second_level_row2 = pawfriends_mikado_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row2'
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_line_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Line Height', 'pawfriends' ),
				'parent' => $second_level_row2,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_text_text_transform',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Text Transform', 'pawfriends' ),
				'parent'  => $second_level_row2,
				'options' => pawfriends_mikado_get_text_transform_array()
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_text_font_style',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Style', 'pawfriends' ),
				'parent'  => $second_level_row2,
				'options' => pawfriends_mikado_get_font_style_array()
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_text_font_weight',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Weight', 'pawfriends' ),
				'parent'  => $second_level_row2,
				'options' => pawfriends_mikado_get_font_weight_array()
			)
		);
		
		$second_level_row3 = pawfriends_mikado_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row3'
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'mobile_dropdown_text_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'pawfriends' ),
				'default_value' => '',
				'parent'        => $second_level_row3,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		pawfriends_mikado_add_admin_section_title(
			array(
				'name'   => 'mobile_opener_panel',
				'parent' => $panel_mobile_header,
				'title'  => esc_html__( 'Mobile Menu Opener', 'pawfriends' )
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'        => 'mobile_menu_title',
				'type'        => 'text',
				'label'       => esc_html__( 'Mobile Navigation Title', 'pawfriends' ),
				'description' => esc_html__( 'Enter title for mobile menu navigation', 'pawfriends' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3
				)
			)
		);

		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $panel_mobile_header,
				'type'          => 'select',
				'name'          => 'mobile_icon_source',
				'default_value' => 'predefined',
				'label'         => esc_html__( 'Select Mobile Navigation Icon Source', 'pawfriends' ),
				'description'   => esc_html__( 'Choose whether you would like to use icons from an icon pack or SVG icons', 'pawfriends' ),
				'options'       => pawfriends_mikado_get_icon_sources_array()
			)
		);

		$mobile_icon_pack_container = pawfriends_mikado_add_admin_container(
			array(
				'parent'          => $panel_mobile_header,
				'name'            => 'mobile_icon_pack_container',
				'dependency' => array(
					'show' => array(
						'mobile_icon_source' => 'icon_pack'
					)
				)
			)
		);

		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $mobile_icon_pack_container,
				'type'          => 'select',
				'name'          => 'mobile_icon_pack',
				'default_value' => 'font_elegant',
				'label'         => esc_html__( 'Mobile Navigation Icon Pack', 'pawfriends' ),
				'description'   => esc_html__( 'Choose icon pack for mobile navigation icon', 'pawfriends' ),
				'options'       => pawfriends_mikado_icon_collections()->getIconCollectionsExclude( array( 'linea_icons', 'dripicons', 'simple_line_icons' ) )
			)
		);

		$mobile_icon_svg_path_container = pawfriends_mikado_add_admin_container(
			array(
				'parent'          => $panel_mobile_header,
				'name'            => 'mobile_icon_svg_path_container',
				'dependency' => array(
					'show' => array(
						'mobile_icon_source' => 'svg_path'
					)
				)
			)
		);

		pawfriends_mikado_add_admin_field(
			array(
				'parent'      => $mobile_icon_svg_path_container,
				'type'        => 'textarea',
				'name'        => 'mobile_icon_svg_path',
				'label'       => esc_html__( 'Mobile Navigation Icon SVG Path', 'pawfriends' ),
				'description' => esc_html__( 'Enter your mobile navigation icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'pawfriends' ),
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'   => 'mobile_icon_color',
				'type'   => 'color',
				'label'  => esc_html__( 'Mobile Navigation Icon Color', 'pawfriends' ),
				'parent' => $panel_mobile_header
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'   => 'mobile_icon_hover_color',
				'type'   => 'color',
				'label'  => esc_html__( 'Mobile Navigation Icon Hover Color', 'pawfriends' ),
				'parent' => $panel_mobile_header
			)
		);
	}
	
	add_action( 'pawfriends_mikado_action_options_map', 'pawfriends_mikado_mobile_header_options_map', pawfriends_mikado_set_options_map_position( 'mobile-header' ) );
}