<?php

if ( ! function_exists( 'pawfriends_mikado_portfolio_options_map' ) ) {
	function pawfriends_mikado_portfolio_options_map() {
		
		pawfriends_mikado_add_admin_page(
			array(
				'slug'  => '_portfolio',
				'title' => esc_html__( 'Portfolio', 'pawfriends-core' ),
				'icon'  => 'fa fa-camera-retro'
			)
		);
		
		$panel_archive = pawfriends_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Portfolio Archive', 'pawfriends-core' ),
				'name'  => 'panel_portfolio_archive',
				'page'  => '_portfolio'
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'        => 'portfolio_archive_number_of_items',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Items', 'pawfriends-core' ),
				'description' => esc_html__( 'Set number of items for your portfolio list on archive pages. Default value is 12', 'pawfriends-core' ),
				'parent'      => $panel_archive,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_archive_number_of_columns',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'pawfriends-core' ),
				'default_value' => 'four',
				'description'   => esc_html__( 'Set number of columns for your portfolio list on archive pages. Default value is Four columns', 'pawfriends-core' ),
				'parent'        => $panel_archive,
				'options'       => pawfriends_mikado_get_number_of_columns_array( false, array( 'one', 'six' ) )
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_archive_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'pawfriends-core' ),
				'description'   => esc_html__( 'Set space size between portfolio items for your portfolio list on archive pages. Default value is normal', 'pawfriends-core' ),
				'default_value' => 'normal',
				'options'       => pawfriends_mikado_get_space_between_items_array(),
				'parent'        => $panel_archive
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_archive_image_size',
				'type'          => 'select',
				'label'         => esc_html__( 'Image Proportions', 'pawfriends-core' ),
				'default_value' => 'landscape',
				'description'   => esc_html__( 'Set image proportions for your portfolio list on archive pages. Default value is landscape', 'pawfriends-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'full'      => esc_html__( 'Original', 'pawfriends-core' ),
					'landscape' => esc_html__( 'Landscape', 'pawfriends-core' ),
					'portrait'  => esc_html__( 'Portrait', 'pawfriends-core' ),
					'square'    => esc_html__( 'Square', 'pawfriends-core' )
				)
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_archive_item_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Item Style', 'pawfriends-core' ),
				'default_value' => 'standard-shader',
				'description'   => esc_html__( 'Set item style for your portfolio list on archive pages. Default value is Standard - Shader', 'pawfriends-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'standard-shader' => esc_html__( 'Standard - Shader', 'pawfriends-core' ),
					'gallery-overlay' => esc_html__( 'Gallery - Overlay', 'pawfriends-core' )
				)
			)
		);
		
		$panel = pawfriends_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Portfolio Single', 'pawfriends-core' ),
				'name'  => 'panel_portfolio_single',
				'page'  => '_portfolio'
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_template',
				'type'          => 'select',
				'label'         => esc_html__( 'Portfolio Type', 'pawfriends-core' ),
				'default_value' => 'small-images',
				'description'   => esc_html__( 'Choose a default type for Single Project pages', 'pawfriends-core' ),
				'parent'        => $panel,
				'options'       => array(
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
			)
		);
		
		/***************** Gallery Layout *****************/
		
		$portfolio_gallery_container = pawfriends_mikado_add_admin_container(
			array(
				'parent'          => $panel,
				'name'            => 'portfolio_gallery_container',
				'dependency' => array(
					'show' => array(
						'portfolio_single_template'  => array(
							'gallery',
							'small-gallery'
						)
					)
				)
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_gallery_columns_number',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'pawfriends-core' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for portfolio gallery type', 'pawfriends-core' ),
				'parent'        => $portfolio_gallery_container,
				'options'       => pawfriends_mikado_get_number_of_columns_array( false, array( 'one', 'five', 'six' ) )
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_gallery_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'pawfriends-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio gallery type', 'pawfriends-core' ),
				'default_value' => 'normal',
				'options'       => pawfriends_mikado_get_space_between_items_array(),
				'parent'        => $portfolio_gallery_container
			)
		);
		
		/***************** Gallery Layout *****************/
		
		/***************** Masonry Layout *****************/
		
		$portfolio_masonry_container = pawfriends_mikado_add_admin_container(
			array(
				'parent'          => $panel,
				'name'            => 'portfolio_masonry_container',
				'dependency' => array(
					'show' => array(
						'portfolio_single_template'  => array(
							'masonry',
							'small-masonry'
						)
					)
				)
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_masonry_columns_number',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'pawfriends-core' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for portfolio masonry type', 'pawfriends-core' ),
				'parent'        => $portfolio_masonry_container,
				'options'       => pawfriends_mikado_get_number_of_columns_array( false, array( 'one', 'five', 'six' ) )
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_masonry_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'pawfriends-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio masonry type', 'pawfriends-core' ),
				'default_value' => 'normal',
				'options'       => pawfriends_mikado_get_space_between_items_array(),
				'parent'        => $portfolio_masonry_container
			)
		);
		
		/***************** Masonry Layout *****************/
		
		pawfriends_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_portfolio_single',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'pawfriends-core' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single projects', 'pawfriends-core' ),
				'parent'        => $panel,
				'options'       => array(
					''    => esc_html__( 'Default', 'pawfriends-core' ),
					'yes' => esc_html__( 'Yes', 'pawfriends-core' ),
					'no'  => esc_html__( 'No', 'pawfriends-core' )
				),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_lightbox_images',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Lightbox for Images', 'pawfriends-core' ),
				'description'   => esc_html__( 'Enabling this option will turn on lightbox functionality for projects with images', 'pawfriends-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_lightbox_videos',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Lightbox for Videos', 'pawfriends-core' ),
				'description'   => esc_html__( 'Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects', 'pawfriends-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_enable_categories',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Categories', 'pawfriends-core' ),
				'description'   => esc_html__( 'Enabling this option will enable category meta description on single projects', 'pawfriends-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_hide_date',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Date', 'pawfriends-core' ),
				'description'   => esc_html__( 'Enabling this option will enable date meta on single projects', 'pawfriends-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_sticky_sidebar',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Sticky Side Text', 'pawfriends-core' ),
				'description'   => esc_html__( 'Enabling this option will make side text sticky on Single Project pages. This option works only for Full Width Images, Small Images, Small Gallery and Small Masonry portfolio types', 'pawfriends-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments', 'pawfriends-core' ),
				'description'   => esc_html__( 'Enabling this option will show comments on your page', 'pawfriends-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_hide_pagination',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Hide Pagination', 'pawfriends-core' ),
				'description'   => esc_html__( 'Enabling this option will turn off portfolio pagination functionality', 'pawfriends-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		$container_navigate_category = pawfriends_mikado_add_admin_container(
			array(
				'name'            => 'navigate_same_category_container',
				'parent'          => $panel,
				'dependency' => array(
					'hide' => array(
						'portfolio_single_hide_pagination'  => array(
							'yes'
						)
					)
				)
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_nav_same_category',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Pagination Through Same Category', 'pawfriends-core' ),
				'description'   => esc_html__( 'Enabling this option will make portfolio pagination sort through current category', 'pawfriends-core' ),
				'parent'        => $container_navigate_category,
				'default_value' => 'no'
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'        => 'portfolio_single_slug',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio Single Slug', 'pawfriends-core' ),
				'description' => esc_html__( 'Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)', 'pawfriends-core' ),
				'parent'      => $panel,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'pawfriends_mikado_action_options_map', 'pawfriends_mikado_portfolio_options_map', pawfriends_mikado_set_options_map_position( 'portfolio' ) );
}