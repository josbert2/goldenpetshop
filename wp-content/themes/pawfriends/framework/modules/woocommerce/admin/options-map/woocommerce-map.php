<?php

if ( ! function_exists( 'pawfriends_mikado_woocommerce_options_map' ) ) {
	
	/**
	 * Add Woocommerce options page
	 */
	function pawfriends_mikado_woocommerce_options_map() {
		
		pawfriends_mikado_add_admin_page(
			array(
				'slug'  => '_woocommerce_page',
				'title' => esc_html__( 'Woocommerce', 'pawfriends' ),
				'icon'  => 'fa fa-shopping-cart'
			)
		);
		
		/**
		 * Product List Settings
		 */
		$panel_product_list = pawfriends_mikado_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_product_list',
				'title' => esc_html__( 'Product List', 'pawfriends' )
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'        => 'woo_list_grid_space',
				'type'        => 'select',
				'label'       => esc_html__( 'Grid Layout Space', 'pawfriends' ),
				'description' => esc_html__( 'Choose a space between content layout and sidebar layout for main shop page', 'pawfriends' ),
				'options'     => pawfriends_mikado_get_space_between_items_array( true ),
				'parent'      => $panel_product_list
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_woo_product_list_columns',
				'label'         => esc_html__( 'Product List Columns', 'pawfriends' ),
				'default_value' => 'mkdf-woocommerce-columns-3',
				'description'   => esc_html__( 'Choose number of columns for main shop page', 'pawfriends' ),
				'options'       => array(
					'mkdf-woocommerce-columns-3' => esc_html__( '3 Columns', 'pawfriends' ),
					'mkdf-woocommerce-columns-4' => esc_html__( '4 Columns', 'pawfriends' )
				),
				'parent'        => $panel_product_list,
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_woo_product_list_columns_space',
				'label'         => esc_html__( 'Space Between Items', 'pawfriends' ),
				'description'   => esc_html__( 'Select space between items for product listing and related products on single product', 'pawfriends' ),
				'default_value' => 'normal',
				'options'       => pawfriends_mikado_get_space_between_items_array(false, array('huge')),
				'parent'        => $panel_product_list,
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_woo_product_list_info_position',
				'label'         => esc_html__( 'Product Info Position', 'pawfriends' ),
				'default_value' => 'info_below_image',
				'description'   => esc_html__( 'Select product info position for product listing and related products on single product', 'pawfriends' ),
				'options'       => array(
					'info_below_image'    => esc_html__( 'Info Below Image', 'pawfriends' ),
					'info_on_image_hover' => esc_html__( 'Info On Image Hover', 'pawfriends' )
				),
				'parent'        => $panel_product_list,
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'mkdf_woo_products_per_page',
				'label'         => esc_html__( 'Number of products per page', 'pawfriends' ),
				'description'   => esc_html__( 'Set number of products on shop page', 'pawfriends' ),
				'parent'        => $panel_product_list,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_products_list_title_tag',
				'label'         => esc_html__( 'Products Title Tag', 'pawfriends' ),
				'default_value' => 'h5',
				'options'       => pawfriends_mikado_get_title_tag(),
				'parent'        => $panel_product_list,
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'woo_enable_percent_sign_value',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Percent Sign', 'pawfriends' ),
				'description'   => esc_html__( 'Enabling this option will show percent value mark instead of sale label on products', 'pawfriends' ),
				'parent'        => $panel_product_list
			)
		);
		
		/**
		 * Single Product Settings
		 */
		$panel_single_product = pawfriends_mikado_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_single_product',
				'title' => esc_html__( 'Single Product', 'pawfriends' )
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_woo',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'pawfriends' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'pawfriends' ),
				'parent'        => $panel_single_product,
				'options'       => pawfriends_mikado_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_single_product_title_tag',
				'default_value' => 'h3',
				'label'         => esc_html__( 'Single Product Title Tag', 'pawfriends' ),
				'options'       => pawfriends_mikado_get_title_tag(),
				'parent'        => $panel_single_product,
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_number_of_thumb_images',
				'default_value' => '4',
				'label'         => esc_html__( 'Number of Thumbnail Images per Row', 'pawfriends' ),
				'options'       => array(
					'4' => esc_html__( 'Four', 'pawfriends' ),
					'3' => esc_html__( 'Three', 'pawfriends' ),
					'2' => esc_html__( 'Two', 'pawfriends' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_set_thumb_images_position',
				'default_value' => 'on-left-side',
				'label'         => esc_html__( 'Set Thumbnail Images Position', 'pawfriends' ),
				'options'       => array(
                    'on-left-side' => esc_html__( 'On The Left Side Of Featured Image', 'pawfriends' ),
					'below-image'  => esc_html__( 'Below Featured Image', 'pawfriends' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_enable_single_product_zoom_image',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Zoom Maginfier', 'pawfriends' ),
				'description'   => esc_html__( 'Enabling this option will show magnifier image on featured image hover', 'pawfriends' ),
				'parent'        => $panel_single_product,
				'options'       => pawfriends_mikado_get_yes_no_select_array( false ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_set_single_images_behavior',
				'default_value' => 'pretty-photo',
				'label'         => esc_html__( 'Set Images Behavior', 'pawfriends' ),
				'options'       => array(
					'pretty-photo' => esc_html__( 'Pretty Photo Lightbox', 'pawfriends' ),
					'photo-swipe'  => esc_html__( 'Photo Swipe Lightbox', 'pawfriends' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_woo_related_products_columns',
				'label'         => esc_html__( 'Related Products Columns', 'pawfriends' ),
				'default_value' => 'mkdf-woocommerce-columns-4',
				'description'   => esc_html__( 'Choose number of columns for related products on single product page', 'pawfriends' ),
				'options'       => array(
					'mkdf-woocommerce-columns-3' => esc_html__( '3 Columns', 'pawfriends' ),
					'mkdf-woocommerce-columns-4' => esc_html__( '4 Columns', 'pawfriends' )
				),
				'parent'        => $panel_single_product,
			)
		);

		do_action('pawfriends_mikado_woocommerce_additional_options_map');
	}
	
	add_action( 'pawfriends_mikado_action_options_map', 'pawfriends_mikado_woocommerce_options_map', pawfriends_mikado_set_options_map_position( 'woocommerce' ) );
}