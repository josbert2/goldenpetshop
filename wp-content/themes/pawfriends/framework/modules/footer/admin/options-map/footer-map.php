<?php

if ( ! function_exists( 'pawfriends_mikado_footer_options_map' ) ) {
	function pawfriends_mikado_footer_options_map() {

		pawfriends_mikado_add_admin_page(
			array(
				'slug'  => '_footer_page',
				'title' => esc_html__( 'Footer', 'pawfriends' ),
				'icon'  => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = pawfriends_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Footer', 'pawfriends' ),
				'name'  => 'footer',
				'page'  => '_footer_page'
			)
		);

		pawfriends_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'footer_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Footer in Grid', 'pawfriends' ),
				'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'pawfriends' ),
				'parent'        => $footer_panel
			)
		);

        pawfriends_mikado_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'uncovering_footer',
                'default_value' => 'no',
                'label'         => esc_html__( 'Uncovering Footer', 'pawfriends' ),
                'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'pawfriends' ),
                'parent'        => $footer_panel
            )
        );

		pawfriends_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_top',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Top', 'pawfriends' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'pawfriends' ),
				'parent'        => $footer_panel
			)
		);
		
		$show_footer_top_container = pawfriends_mikado_add_admin_container(
			array(
				'name'       => 'show_footer_top_container',
				'parent'     => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_top' => 'yes'
					)
				)
			)
		);

		pawfriends_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns',
				'parent'        => $show_footer_top_container,
				'default_value' => '3 3 3 3',
				'label'         => esc_html__( 'Footer Top Columns', 'pawfriends' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Top area', 'pawfriends' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3',
                    '3 3 6' => '3 (25% + 25% + 50%)',
					'3 3 3 3' => '4'
				)
			)
		);

		pawfriends_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns_alignment',
				'default_value' => 'left',
				'label'         => esc_html__( 'Footer Top Columns Alignment', 'pawfriends' ),
				'description'   => esc_html__( 'Text Alignment in Footer Columns', 'pawfriends' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'pawfriends' ),
					'left'   => esc_html__( 'Left', 'pawfriends' ),
					'center' => esc_html__( 'Center', 'pawfriends' ),
					'right'  => esc_html__( 'Right', 'pawfriends' )
				),
				'parent'        => $show_footer_top_container
			)
		);
		
		$footer_top_styles_group = pawfriends_mikado_add_admin_group(
			array(
				'name'        => 'footer_top_styles_group',
				'title'       => esc_html__( 'Footer Top Styles', 'pawfriends' ),
				'description' => esc_html__( 'Define style for footer top area', 'pawfriends' ),
				'parent'      => $show_footer_top_container
			)
		);
		
		$footer_top_styles_row_1 = pawfriends_mikado_add_admin_row(
			array(
				'name'   => 'footer_top_styles_row_1',
				'parent' => $footer_top_styles_group
			)
		);
		
			pawfriends_mikado_add_admin_field(
				array(
					'name'   => 'footer_top_background_color',
					'type'   => 'colorsimple',
					'label'  => esc_html__( 'Background Color', 'pawfriends' ),
					'parent' => $footer_top_styles_row_1
				)
			);
			
			pawfriends_mikado_add_admin_field(
				array(
					'name'   => 'footer_top_border_color',
					'type'   => 'colorsimple',
					'label'  => esc_html__( 'Border Color', 'pawfriends' ),
					'parent' => $footer_top_styles_row_1
				)
			);
			
			pawfriends_mikado_add_admin_field(
				array(
					'name'   => 'footer_top_border_width',
					'type'   => 'textsimple',
					'label'  => esc_html__( 'Border Width', 'pawfriends' ),
					'parent' => $footer_top_styles_row_1,
					'args'   => array(
						'suffix' => 'px'
					)
				)
			);

        pawfriends_mikado_add_admin_field(
            array(
                'name'          => 'footer_top_bg_image',
                'type'          => 'image',
                'label'         => esc_html__( 'Footer Top Background Image', 'pawfriends' ),
                'description'   => esc_html__( 'Choose an image for Footer Top', 'pawfriends' ),
                'parent'        => $show_footer_top_container
            )
        );

		pawfriends_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_bottom',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Bottom', 'pawfriends' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'pawfriends' ),
				'parent'        => $footer_panel
			)
		);

		$show_footer_bottom_container = pawfriends_mikado_add_admin_container(
			array(
				'name'            => 'show_footer_bottom_container',
				'parent'          => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_bottom'  => 'yes'
					)
				)
			)
		);

		pawfriends_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_bottom_columns',
				'default_value' => '12',
				'label'         => esc_html__( 'Footer Bottom Columns', 'pawfriends' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Bottom area', 'pawfriends' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3'
				),
				'parent'        => $show_footer_bottom_container
			)
		);
		
		$footer_bottom_styles_group = pawfriends_mikado_add_admin_group(
			array(
				'name'        => 'footer_bottom_styles_group',
				'title'       => esc_html__( 'Footer Bottom Styles', 'pawfriends' ),
				'description' => esc_html__( 'Define style for footer bottom area', 'pawfriends' ),
				'parent'      => $show_footer_bottom_container
			)
		);
		
		$footer_bottom_styles_row_1 = pawfriends_mikado_add_admin_row(
			array(
				'name'   => 'footer_bottom_styles_row_1',
				'parent' => $footer_bottom_styles_group
			)
		);
		
			pawfriends_mikado_add_admin_field(
				array(
					'name'   => 'footer_bottom_background_color',
					'type'   => 'colorsimple',
					'label'  => esc_html__( 'Background Color', 'pawfriends' ),
					'parent' => $footer_bottom_styles_row_1
				)
			);
			
			pawfriends_mikado_add_admin_field(
				array(
					'name'   => 'footer_bottom_border_color',
					'type'   => 'colorsimple',
					'label'  => esc_html__( 'Border Color', 'pawfriends' ),
					'parent' => $footer_bottom_styles_row_1
				)
			);
			
			pawfriends_mikado_add_admin_field(
				array(
					'name'   => 'footer_bottom_border_width',
					'type'   => 'textsimple',
					'label'  => esc_html__( 'Border Width', 'pawfriends' ),
					'parent' => $footer_bottom_styles_row_1,
					'args'   => array(
						'suffix' => 'px'
					)
				)
			);
	}

	add_action( 'pawfriends_mikado_action_options_map', 'pawfriends_mikado_footer_options_map', pawfriends_mikado_set_options_map_position( 'footer' ) );
}