<?php

if ( ! function_exists( 'pawfriends_core_map_portfolio_settings_meta' ) ) {
	function pawfriends_core_map_portfolio_settings_meta() {
		$meta_box = pawfriends_mikado_create_meta_box( array(
			'scope' => 'portfolio-item',
			'title' => esc_html__( 'Portfolio Settings', 'pawfriends-core' ),
			'name'  => 'portfolio_settings_meta_box'
		) );
		
		pawfriends_mikado_create_meta_box_field( array(
			'name'        => 'mkdf_portfolio_single_template_meta',
			'type'        => 'select',
			'label'       => esc_html__( 'Portfolio Type', 'pawfriends-core' ),
			'description' => esc_html__( 'Choose a default type for Single Project pages', 'pawfriends-core' ),
			'parent'      => $meta_box,
			'options'     => array(
				''                  => esc_html__( 'Default', 'pawfriends-core' ),
				'huge-images'       => esc_html__( 'Portfolio Full Width Images', 'pawfriends-core' ),
				'images'            => esc_html__( 'Portfolio Images', 'pawfriends-core' ),
				'small-images'      => esc_html__( 'Portfolio Small Images', 'pawfriends-core' ),
				'slider'            => esc_html__( 'Portfolio Slider', 'pawfriends-core' ),
				'small-slider'      => esc_html__( 'Portfolio Small Slider', 'pawfriends-core' ),
				'gallery'           => esc_html__( 'Portfolio Gallery', 'pawfriends-core' ),
				'small-gallery'     => esc_html__( 'Portfolio Small Gallery', 'pawfriends-core' ),
				'masonry'           => esc_html__( 'Portfolio Masonry', 'pawfriends-core' ),
				'small-masonry'     => esc_html__( 'Portfolio Small Masonry', 'pawfriends-core' ),
				'custom'            => esc_html__( 'Portfolio Custom', 'pawfriends-core' ),
				'full-width-custom' => esc_html__( 'Portfolio Full Width Custom', 'pawfriends-core' )
			)
		) );
		
		/***************** Gallery Layout *****************/
		
		$gallery_type_meta_container = pawfriends_mikado_add_admin_container(
			array(
				'parent'          => $meta_box,
				'name'            => 'mkdf_gallery_type_meta_container',
				'dependency' => array(
					'show' => array(
						'mkdf_portfolio_single_template_meta'  => array(
							'gallery',
							'small-gallery'
						)
					)
				)
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_single_gallery_columns_number_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'pawfriends-core' ),
				'default_value' => '',
				'description'   => esc_html__( 'Set number of columns for portfolio gallery type', 'pawfriends-core' ),
				'parent'        => $gallery_type_meta_container,
				'options'       => pawfriends_mikado_get_number_of_columns_array( true, array( 'one', 'five', 'six' ) )
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_single_gallery_space_between_items_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'pawfriends-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio gallery type', 'pawfriends-core' ),
				'default_value' => '',
				'options'       => pawfriends_mikado_get_space_between_items_array( true ),
				'parent'        => $gallery_type_meta_container
			)
		);
		
		/***************** Gallery Layout *****************/
		
		/***************** Masonry Layout *****************/
		
		$masonry_type_meta_container = pawfriends_mikado_add_admin_container(
			array(
				'parent'          => $meta_box,
				'name'            => 'mkdf_masonry_type_meta_container',
				'dependency' => array(
					'show' => array(
						'mkdf_portfolio_single_template_meta'  => array(
							'masonry',
							'small-masonry'
						)
					)
				)
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_single_masonry_columns_number_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'pawfriends-core' ),
				'default_value' => '',
				'description'   => esc_html__( 'Set number of columns for portfolio masonry type', 'pawfriends-core' ),
				'parent'        => $masonry_type_meta_container,
				'options'       => pawfriends_mikado_get_number_of_columns_array( true, array( 'one', 'five', 'six' ) )
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_single_masonry_space_between_items_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'pawfriends-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio masonry type', 'pawfriends-core' ),
				'default_value' => '',
				'options'       => pawfriends_mikado_get_space_between_items_array( true ),
				'parent'        => $masonry_type_meta_container
			)
		);
		
		/***************** Masonry Layout *****************/
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_portfolio_single_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'pawfriends-core' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single portfolio page', 'pawfriends-core' ),
				'parent'        => $meta_box,
				'options'       => pawfriends_mikado_get_yes_no_select_array()
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'portfolio_info_top_padding',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio Info Top Padding', 'pawfriends-core' ),
				'description' => esc_html__( 'Set top padding for portfolio info elements holder. This option works only for Portfolio Images, Slider, Gallery and Masonry portfolio types', 'pawfriends-core' ),
				'parent'      => $meta_box,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'portfolio_external_link',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio External Link', 'pawfriends-core' ),
				'description' => esc_html__( 'Enter URL to link from Portfolio List page', 'pawfriends-core' ),
				'parent'      => $meta_box,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_portfolio_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Featured Image', 'pawfriends-core' ),
				'description' => esc_html__( 'Choose an image for Portfolio Lists shortcode where Hover Type option is Switch Featured Images', 'pawfriends-core' ),
				'parent'      => $meta_box
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_masonry_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Masonry - Image Fixed Proportion', 'pawfriends-core' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry type portfolio lists where image proportion is fixed', 'pawfriends-core' ),
				'default_value' => '',
				'parent'        => $meta_box,
				'options'       => array(
					''                   => esc_html__( 'Default', 'pawfriends-core' ),
					'small'              => esc_html__( 'Small', 'pawfriends-core' ),
					'large-width'        => esc_html__( 'Large Width', 'pawfriends-core' ),
					'large-height'       => esc_html__( 'Large Height', 'pawfriends-core' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'pawfriends-core' )
				)
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_masonry_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Masonry - Image Original Proportion', 'pawfriends-core' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry type portfolio lists where image proportion is original', 'pawfriends-core' ),
				'default_value' => '',
				'parent'        => $meta_box,
				'options'       => array(
					''            => esc_html__( 'Default', 'pawfriends-core' ),
					'large-width' => esc_html__( 'Large Width', 'pawfriends-core' )
				)
			)
		);
		
		$all_pages = array();
		$pages     = get_pages();
		foreach ( $pages as $page ) {
			$all_pages[ $page->ID ] = $page->post_title;
		}
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'portfolio_single_back_to_link',
				'type'        => 'select',
				'label'       => esc_html__( '"Back To" Link', 'pawfriends-core' ),
				'description' => esc_html__( 'Choose "Back To" page to link from portfolio Single Project page', 'pawfriends-core' ),
				'parent'      => $meta_box,
				'options'     => $all_pages,
				'args'        => array(
					'select2' => true
				)
			)
		);
	}
	
	add_action( 'pawfriends_mikado_action_meta_boxes_map', 'pawfriends_core_map_portfolio_settings_meta', 41 );
}