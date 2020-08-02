<?php

if ( ! function_exists( 'pawfriends_mikado_page_options_map' ) ) {
	function pawfriends_mikado_page_options_map() {
		
		pawfriends_mikado_add_admin_page(
			array(
				'slug'  => '_page_page',
				'title' => esc_html__( 'Page', 'pawfriends' ),
				'icon'  => 'fa fa-file-text-o'
			)
		);
		
		/***************** Page Layout - begin **********************/
		
		$panel_sidebar = pawfriends_mikado_add_admin_panel(
			array(
				'page'  => '_page_page',
				'name'  => 'panel_sidebar',
				'title' => esc_html__( 'Page Style', 'pawfriends' )
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'        => 'page_grid_space',
				'type'        => 'select',
				'label'       => esc_html__( 'Grid Layout Space', 'pawfriends' ),
				'description' => esc_html__( 'Choose a space between content layout and sidebar layout for your page. (Applies to pages set to "Default Template")', 'pawfriends' ),
				'options'     => pawfriends_mikado_get_space_between_items_array( true ),
				'parent'      => $panel_sidebar
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'name'          => 'page_show_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments', 'pawfriends' ),
				'description'   => esc_html__( 'Enabling this option will show comments on your page', 'pawfriends' ),
				'default_value' => 'yes',
				'parent'        => $panel_sidebar
			)
		);
		
		/***************** Page Layout - end **********************/
		
		/***************** Content Layout - begin **********************/
		
		$panel_content = pawfriends_mikado_add_admin_panel(
			array(
				'page'  => '_page_page',
				'name'  => 'panel_content',
				'title' => esc_html__( 'Content Style', 'pawfriends' )
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'content_padding',
				'default_value' => '',
				'label'         => esc_html__( 'Content Padding for Template in Full Width', 'pawfriends' ),
				'description'   => esc_html__( 'Enter padding for content area for templates in full width. If you set this value then it\'s important to set also Content padding for mobile header value in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'pawfriends' ),
				'args'          => array(
					'col_width' => 3
				),
				'parent'        => $panel_content
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'content_padding_in_grid',
				'default_value' => '',
				'label'         => esc_html__( 'Content Padding for Templates in Grid', 'pawfriends' ),
				'description'   => esc_html__( 'Enter padding for content area for Templates in grid. If you set this value then it\'s important to set also Content padding for mobile header value in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'pawfriends' ),
				'args'          => array(
					'col_width' => 3
				),
				'parent'        => $panel_content
			)
		);
		
		pawfriends_mikado_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'content_padding_mobile',
				'default_value' => '',
				'label'         => esc_html__( 'Content Padding for Mobile Header', 'pawfriends' ),
				'description'   => esc_html__( 'Enter padding for content area for Mobile Header in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'pawfriends' ),
				'args'          => array(
					'col_width' => 3
				),
				'parent'        => $panel_content
			)
		);
		
		/***************** Content Layout - end **********************/
		
		/***************** Additional Page Layout - start *****************/
		
		do_action( 'pawfriends_mikado_action_additional_page_options_map' );
		
		/***************** Additional Page Layout - end *****************/
	}
	
	add_action( 'pawfriends_mikado_action_options_map', 'pawfriends_mikado_page_options_map', pawfriends_mikado_set_options_map_position( 'page' ) );
}

if ( ! function_exists( 'pawfriends_mikado_content_padding' ) ) {
	/**
	 * Function that return padding for content
	 */
	function pawfriends_mikado_content_padding( $style ) {
		$page_id      = pawfriends_mikado_get_page_id();
		$class_prefix = pawfriends_mikado_get_unique_page_class( $page_id, true );
		
		$return_style = '';
		$current_style_string = '';
		$current_mobile_style_string = '';
		
		$content_selector = array(
			$class_prefix . ' .mkdf-content .mkdf-content-inner > .mkdf-container > .mkdf-container-inner',
			$class_prefix . ' .mkdf-content .mkdf-content-inner > .mkdf-full-width > .mkdf-full-width-inner',
		);
		
		// general padding
		$content_style = array();
		
		$page_padding = get_post_meta( $page_id, 'mkdf_page_content_padding', true );
		
		if ( $page_padding !== '' ) {
			$content_style['padding'] = $page_padding;
			
			$current_style_string .= pawfriends_mikado_dynamic_css( $content_selector, $content_style );
		}
		
		// mobile padding
		$content_mobile_style = array();
		
		$page_mobile_padding = get_post_meta( $page_id, 'mkdf_page_content_padding_mobile', true );
		
		if ( $page_mobile_padding !== '' ) {
			$content_mobile_style['padding'] = $page_mobile_padding;
			
			$current_mobile_style_string .= pawfriends_mikado_dynamic_css( $content_selector, $content_mobile_style );
		}
		
		// print
		
		if ( ! empty( $current_style_string ) ) {
			$return_style .= $current_style_string;
		}
		
		if ( ! empty( $current_mobile_style_string ) ) {
			$return_style .= '@media only screen and (max-width: 1024px) {' . $current_mobile_style_string . '}';
		}
		
		$return_style .= $return_style . $style;
		
		return $return_style;
	}
	
	add_filter( 'pawfriends_mikado_filter_add_page_custom_style', 'pawfriends_mikado_content_padding' );
}