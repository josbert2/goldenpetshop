<?php

if ( ! function_exists( 'pawfriends_mikado_header_top_bar_styles' ) ) {
	/**
	 * Generates styles for header top bar
	 */
	function pawfriends_mikado_header_top_bar_styles() {
		$top_header_height = pawfriends_mikado_options()->getOptionValue( 'top_bar_height' );
		
		if ( ! empty( $top_header_height ) ) {
			echo pawfriends_mikado_dynamic_css( '.mkdf-top-bar', array( 'height' => pawfriends_mikado_filter_px( $top_header_height ) . 'px' ) );
			echo pawfriends_mikado_dynamic_css( '.mkdf-top-bar .mkdf-logo-wrapper a', array( 'max-height' => pawfriends_mikado_filter_px( $top_header_height ) . 'px' ) );
		}
		
		echo pawfriends_mikado_dynamic_css( '.mkdf-header-box .mkdf-top-bar-background', array( 'height' => pawfriends_mikado_get_top_bar_background_height() . 'px' ) );
		
		$top_bar_container_selector = '.mkdf-top-bar > .mkdf-vertical-align-containers';
		$top_bar_container_styles   = array();
		$container_side_padding     = pawfriends_mikado_options()->getOptionValue( 'top_bar_side_padding' );
		
		if ( $container_side_padding !== '' ) {
			if ( pawfriends_mikado_string_ends_with( $container_side_padding, 'px' ) || pawfriends_mikado_string_ends_with( $container_side_padding, '%' ) ) {
				$top_bar_container_styles['padding-left'] = $container_side_padding;
				$top_bar_container_styles['padding-right'] = $container_side_padding;
			} else {
				$top_bar_container_styles['padding-left'] = pawfriends_mikado_filter_px( $container_side_padding ) . 'px';
				$top_bar_container_styles['padding-right'] = pawfriends_mikado_filter_px( $container_side_padding ) . 'px';
			}
			
			echo pawfriends_mikado_dynamic_css( $top_bar_container_selector, $top_bar_container_styles );
		}
		
		if ( pawfriends_mikado_options()->getOptionValue( 'top_bar_in_grid' ) == 'yes' ) {
			$top_bar_grid_selector                = '.mkdf-top-bar .mkdf-grid .mkdf-vertical-align-containers';
			$top_bar_grid_styles                  = array();
			$top_bar_grid_background_color        = pawfriends_mikado_options()->getOptionValue( 'top_bar_grid_background_color' );
			$top_bar_grid_background_transparency = pawfriends_mikado_options()->getOptionValue( 'top_bar_grid_background_transparency' );
			
			if ( !empty($top_bar_grid_background_color) ) {
				$grid_background_color        = $top_bar_grid_background_color;
				$grid_background_transparency = 1;
				
				if ( $top_bar_grid_background_transparency !== '' ) {
					$grid_background_transparency = $top_bar_grid_background_transparency;
				}
				
				$grid_background_color                   = pawfriends_mikado_rgba_color( $grid_background_color, $grid_background_transparency );
				$top_bar_grid_styles['background-color'] = $grid_background_color;
			}
			
			echo pawfriends_mikado_dynamic_css( $top_bar_grid_selector, $top_bar_grid_styles );
		}
		
		$top_bar_styles   = array();
		$background_color = pawfriends_mikado_options()->getOptionValue( 'top_bar_background_color' );
		$border_color     = pawfriends_mikado_options()->getOptionValue( 'top_bar_border_color' );
		
		if ( $background_color !== '' ) {
			$background_transparency = 1;
			if ( pawfriends_mikado_options()->getOptionValue( 'top_bar_background_transparency' ) !== '' ) {
				$background_transparency = pawfriends_mikado_options()->getOptionValue( 'top_bar_background_transparency' );
			}
			
			$background_color                   = pawfriends_mikado_rgba_color( $background_color, $background_transparency );
			$top_bar_styles['background-color'] = $background_color;
			
			echo pawfriends_mikado_dynamic_css( '.mkdf-header-box .mkdf-top-bar-background', array( 'background-color' => $background_color ) );
		}
		
		if ( pawfriends_mikado_options()->getOptionValue( 'top_bar_border' ) == 'yes' && $border_color != '' ) {
			$top_bar_styles['border-bottom'] = '1px solid ' . $border_color;
		}
		
		echo pawfriends_mikado_dynamic_css( '.mkdf-top-bar', $top_bar_styles );
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_header_top_bar_styles' );
}