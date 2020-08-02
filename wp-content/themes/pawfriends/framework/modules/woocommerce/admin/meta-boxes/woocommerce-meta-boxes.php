<?php

if ( ! function_exists( 'pawfriends_mikado_map_woocommerce_meta' ) ) {
	function pawfriends_mikado_map_woocommerce_meta() {
		
		$woocommerce_meta_box = pawfriends_mikado_create_meta_box(
			array(
				'scope' => array( 'product' ),
				'title' => esc_html__( 'Product Meta', 'pawfriends' ),
				'name'  => 'woo_product_meta'
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_product_featured_image_size',
				'type'        => 'select',
				'label'       => esc_html__( 'Dimensions for Product List Shortcode', 'pawfriends' ),
				'description' => esc_html__( 'Choose image layout when it appears in Mikado Product List - Masonry layout shortcode', 'pawfriends' ),
				'options'     => array(
					''                   => esc_html__( 'Default', 'pawfriends' ),
					'small'              => esc_html__( 'Small', 'pawfriends' ),
					'large-width'        => esc_html__( 'Large Width', 'pawfriends' ),
					'large-height'       => esc_html__( 'Large Height', 'pawfriends' ),
					'large-width-height' => esc_html__( 'Large Width Height', 'pawfriends' )
				),
				'parent'      => $woocommerce_meta_box
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_woo_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'pawfriends' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'pawfriends' ),
				'options'       => pawfriends_mikado_get_yes_no_select_array(),
				'parent'        => $woocommerce_meta_box
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_new_sign_woo_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show New Sign', 'pawfriends' ),
				'description'   => esc_html__( 'Enabling this option will show new sign mark on product', 'pawfriends' ),
				'parent'        => $woocommerce_meta_box
			)
		);
	}
	
	add_action( 'pawfriends_mikado_action_meta_boxes_map', 'pawfriends_mikado_map_woocommerce_meta', 99 );
}