<?php

if ( ! function_exists( 'pawfriends_mikado_error_404_options_map' ) ) {
	function pawfriends_mikado_error_404_options_map() {
		
		pawfriends_mikado_add_admin_page(
			array(
				'slug'  => '__404_error_page',
				'title' => esc_html__( '404 Error Page', 'pawfriends' ),
				'icon'  => 'fa fa-exclamation-triangle'
			)
		);
		
		$panel_404_header = pawfriends_mikado_add_admin_panel(
			array(
				'page'  => '__404_error_page',
				'name'  => 'panel_404_header',
				'title' => esc_html__( 'Header', 'pawfriends' )
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'      => $panel_404_header,
				'type'        => 'color',
				'name'        => '404_menu_area_background_color_header',
				'label'       => esc_html__( 'Background Color', 'pawfriends' ),
				'description' => esc_html__( 'Choose a background color for header area', 'pawfriends' )
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $panel_404_header,
				'type'          => 'text',
				'name'          => '404_menu_area_background_transparency_header',
				'default_value' => '',
				'label'         => esc_html__( 'Background Transparency', 'pawfriends' ),
				'description'   => esc_html__( 'Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'pawfriends' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'      => $panel_404_header,
				'type'        => 'color',
				'name'        => '404_menu_area_border_color_header',
				'label'       => esc_html__( 'Border Color', 'pawfriends' ),
				'description' => esc_html__( 'Choose a border bottom color for header area', 'pawfriends' )
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $panel_404_header,
				'type'          => 'select',
				'name'          => '404_header_style',
				'default_value' => '',
				'label'         => esc_html__( 'Header Skin', 'pawfriends' ),
				'description'   => esc_html__( 'Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'pawfriends' ),
				'options'       => array(
					''             => esc_html__( 'Default', 'pawfriends' ),
					'light-header' => esc_html__( 'Light', 'pawfriends' ),
					'dark-header'  => esc_html__( 'Dark', 'pawfriends' )
				)
			)
		);
		
		$panel_404_options = pawfriends_mikado_add_admin_panel(
			array(
				'page'  => '__404_error_page',
				'name'  => 'panel_404_options',
				'title' => esc_html__( '404 Page Options', 'pawfriends' )
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type'   => 'color',
				'name'   => '404_page_background_color',
				'label'  => esc_html__( 'Background Color', 'pawfriends' )
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'image',
				'name'        => '404_page_background_image',
				'label'       => esc_html__( 'Background Image', 'pawfriends' ),
				'description' => esc_html__( 'Choose a background image for 404 page', 'pawfriends' )
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'image',
				'name'        => '404_page_background_pattern_image',
				'label'       => esc_html__( 'Pattern Background Image', 'pawfriends' ),
				'description' => esc_html__( 'Choose a pattern image for 404 page', 'pawfriends' )
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'image',
				'name'        => '404_page_title_image',
				'label'       => esc_html__( 'Title Image', 'pawfriends' ),
				'description' => esc_html__( 'Choose a background image for displaying above 404 page Title', 'pawfriends' )
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $panel_404_options,
				'type'          => 'text',
				'name'          => '404_title',
				'default_value' => '',
				'label'         => esc_html__( 'Title', 'pawfriends' ),
				'description'   => esc_html__( 'Enter title for 404 page. Default label is "404".', 'pawfriends' )
			)
		);
		
		$first_level_group = pawfriends_mikado_add_admin_group(
			array(
				'parent'      => $panel_404_options,
				'name'        => 'first_level_group',
				'title'       => esc_html__( 'Title Style', 'pawfriends' ),
				'description' => esc_html__( 'Define styles for 404 page title', 'pawfriends' )
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
				'parent' => $first_level_row1,
				'type'   => 'colorsimple',
				'name'   => '404_title_color',
				'label'  => esc_html__( 'Text Color', 'pawfriends' ),
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'fontsimple',
				'name'          => '404_title_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'pawfriends' ),
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_title_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'pawfriends' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_title_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'pawfriends' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$first_level_row2 = pawfriends_mikado_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row2',
				'next'   => true
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_title_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'pawfriends' ),
				'options'       => pawfriends_mikado_get_font_style_array()
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_title_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'pawfriends' ),
				'options'       => pawfriends_mikado_get_font_weight_array()
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'textsimple',
				'name'          => '404_title_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'pawfriends' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_title_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'pawfriends' ),
				'options'       => pawfriends_mikado_get_text_transform_array()
			)
		);

        $first_level_group_responsive = pawfriends_mikado_add_admin_group(
            array(
                'parent'      => $panel_404_options,
                'name'        => 'first_level_group_responsive',
                'title'       => esc_html__( 'Title Style Responsive', 'pawfriends' ),
                'description' => esc_html__( 'Define responsive styles for 404 page title (under 680px)', 'pawfriends' )
            )
        );

        $first_level_row3 = pawfriends_mikado_add_admin_row(
            array(
                'parent' => $first_level_group_responsive,
                'name'   => 'first_level_row3'
            )
        );

        pawfriends_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_title_responsive_font_size',
                'default_value' => '',
                'label'         => esc_html__( 'Font Size', 'pawfriends' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        pawfriends_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_title_responsive_line_height',
                'default_value' => '',
                'label'         => esc_html__( 'Line Height', 'pawfriends' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        pawfriends_mikado_add_admin_field(
            array(
                'parent'        => $first_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_title_responsive_letter_spacing',
                'default_value' => '',
                'label'         => esc_html__( 'Letter Spacing', 'pawfriends' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        pawfriends_mikado_add_admin_field(
            array(
                'parent'        => $panel_404_options,
                'type'          => 'yesno',
                'name'          => '404_highlight_title',
                'label'         => esc_html__( 'Highlight Title', 'pawfriends' ),
                'default_value' => 'yes'
            )
        );
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $panel_404_options,
				'type'          => 'text',
				'name'          => '404_subtitle',
				'default_value' => '',
				'label'         => esc_html__( 'Subtitle', 'pawfriends' ),
				'description'   => esc_html__( 'Enter subtitle for 404 page. Default label is "PAGE NOT FOUND".', 'pawfriends' )
			)
		);
		
		$second_level_group = pawfriends_mikado_add_admin_group(
			array(
				'parent'      => $panel_404_options,
				'name'        => 'second_level_group',
				'title'       => esc_html__( 'Subtitle Style', 'pawfriends' ),
				'description' => esc_html__( 'Define styles for 404 page subtitle', 'pawfriends' )
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
				'parent' => $second_level_row1,
				'type'   => 'colorsimple',
				'name'   => '404_subtitle_color',
				'label'  => esc_html__( 'Text Color', 'pawfriends' ),
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row1,
				'type'          => 'fontsimple',
				'name'          => '404_subtitle_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'pawfriends' ),
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_subtitle_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'pawfriends' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_subtitle_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'pawfriends' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$second_level_row2 = pawfriends_mikado_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row2',
				'next'   => true
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_subtitle_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'pawfriends' ),
				'options'       => pawfriends_mikado_get_font_style_array()
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_subtitle_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'pawfriends' ),
				'options'       => pawfriends_mikado_get_font_weight_array()
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'textsimple',
				'name'          => '404_subtitle_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'pawfriends' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_subtitle_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'pawfriends' ),
				'options'       => pawfriends_mikado_get_text_transform_array()
			)
		);

        $second_level_group_responsive = pawfriends_mikado_add_admin_group(
            array(
                'parent'      => $panel_404_options,
                'name'        => 'second_level_group_responsive',
                'title'       => esc_html__( 'Subtitle Style Responsive', 'pawfriends' ),
                'description' => esc_html__( 'Define responsive styles for 404 page subtitle (under 680px)', 'pawfriends' )
            )
        );

        $second_level_row3 = pawfriends_mikado_add_admin_row(
            array(
                'parent' => $second_level_group_responsive,
                'name'   => 'second_level_row3'
            )
        );

        pawfriends_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_subtitle_responsive_font_size',
                'default_value' => '',
                'label'         => esc_html__( 'Font Size', 'pawfriends' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        pawfriends_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_subtitle_responsive_line_height',
                'default_value' => '',
                'label'         => esc_html__( 'Line Height', 'pawfriends' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        pawfriends_mikado_add_admin_field(
            array(
                'parent'        => $second_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_subtitle_responsive_letter_spacing',
                'default_value' => '',
                'label'         => esc_html__( 'Letter Spacing', 'pawfriends' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $panel_404_options,
				'type'          => 'text',
				'name'          => '404_text',
				'default_value' => '',
				'label'         => esc_html__( 'Text', 'pawfriends' ),
				'description'   => esc_html__( 'Enter text for 404 page.', 'pawfriends' )
			)
		);
		
		$third_level_group = pawfriends_mikado_add_admin_group(
			array(
				'parent'      => $panel_404_options,
				'name'        => '$third_level_group',
				'title'       => esc_html__( 'Text Style', 'pawfriends' ),
				'description' => esc_html__( 'Define styles for 404 page text', 'pawfriends' )
			)
		);
		
		$third_level_row1 = pawfriends_mikado_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name'   => '$third_level_row1'
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type'   => 'colorsimple',
				'name'   => '404_text_color',
				'label'  => esc_html__( 'Text Color', 'pawfriends' ),
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'fontsimple',
				'name'          => '404_text_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'pawfriends' ),
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_text_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'pawfriends' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_text_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'pawfriends' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$third_level_row2 = pawfriends_mikado_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name'   => '$third_level_row2',
				'next'   => true
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_text_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'pawfriends' ),
				'options'       => pawfriends_mikado_get_font_style_array()
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_text_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'pawfriends' ),
				'options'       => pawfriends_mikado_get_font_weight_array()
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'textsimple',
				'name'          => '404_text_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'pawfriends' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_text_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'pawfriends' ),
				'options'       => pawfriends_mikado_get_text_transform_array()
			)
		);

        $third_level_group_responsive = pawfriends_mikado_add_admin_group(
            array(
                'parent'      => $panel_404_options,
                'name'        => 'third_level_group_responsive',
                'title'       => esc_html__( 'Text Style Responsive', 'pawfriends' ),
                'description' => esc_html__( 'Define responsive styles for 404 page text (under 680px)', 'pawfriends' )
            )
        );

        $third_level_row3 = pawfriends_mikado_add_admin_row(
            array(
                'parent' => $third_level_group_responsive,
                'name'   => 'third_level_row3'
            )
        );

        pawfriends_mikado_add_admin_field(
            array(
                'parent'        => $third_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_text_responsive_font_size',
                'default_value' => '',
                'label'         => esc_html__( 'Font Size', 'pawfriends' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        pawfriends_mikado_add_admin_field(
            array(
                'parent'        => $third_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_text_responsive_line_height',
                'default_value' => '',
                'label'         => esc_html__( 'Line Height', 'pawfriends' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        pawfriends_mikado_add_admin_field(
            array(
                'parent'        => $third_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_text_responsive_letter_spacing',
                'default_value' => '',
                'label'         => esc_html__( 'Letter Spacing', 'pawfriends' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        pawfriends_mikado_add_admin_field(
            array(
                'parent'        => $panel_404_options,
                'type'          => 'yesno',
                'name'          => '404_search',
                'label'         => esc_html__( 'Enable Search Form', 'pawfriends' ),
                'default_value' => 'yes'
            )
        );

        pawfriends_mikado_add_admin_field(
            array(
                'parent'        => $panel_404_options,
                'type'          => 'yesno',
                'name'          => '404_button',
                'label'         => esc_html__( 'Enable Back to Home Button', 'pawfriends' ),
                'default_value' => 'no'
            )
        );
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'text',
				'name'        => '404_back_to_home',
				'label'       => esc_html__( 'Back to Home Button Label', 'pawfriends' ),
				'description' => esc_html__( 'Enter label for "Back to home" button', 'pawfriends' )
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'parent'        => $panel_404_options,
				'type'          => 'select',
				'name'          => '404_button_style',
				'default_value' => '',
				'label'         => esc_html__( 'Button Skin', 'pawfriends' ),
				'description'   => esc_html__( 'Choose a style to make Back to Home button in that predefined style', 'pawfriends' ),
				'options'       => array(
					''            => esc_html__( 'Default', 'pawfriends' ),
					'light-style' => esc_html__( 'Light', 'pawfriends' )
				)
			)
		);
	}
	
	add_action( 'pawfriends_mikado_action_options_map', 'pawfriends_mikado_error_404_options_map', pawfriends_mikado_set_options_map_position( '404' ) );
}