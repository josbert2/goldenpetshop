<?php

if ( ! function_exists( 'pawfriends_mikado_sticky_header_styles' ) ) {
	/**
	 * Generates styles for sticky haeder
	 */
	function pawfriends_mikado_sticky_header_styles() {
		$background_color        = pawfriends_mikado_options()->getOptionValue( 'sticky_header_background_color' );
		$background_transparency = pawfriends_mikado_options()->getOptionValue( 'sticky_header_transparency' );
		$border_color            = pawfriends_mikado_options()->getOptionValue( 'sticky_header_border_color' );
		$header_height           = pawfriends_mikado_options()->getOptionValue( 'sticky_header_height' );
		
		if ( ! empty( $background_color ) ) {
			$header_background_color              = $background_color;
			$header_background_color_transparency = 1;
			
			if ( $background_transparency !== '' ) {
				$header_background_color_transparency = $background_transparency;
			}
			
			echo pawfriends_mikado_dynamic_css( '.mkdf-page-header .mkdf-sticky-header .mkdf-sticky-holder', array( 'background-color' => pawfriends_mikado_rgba_color( $header_background_color, $header_background_color_transparency ) ) );
		}
		
		if ( ! empty( $border_color ) ) {
			echo pawfriends_mikado_dynamic_css( '.mkdf-page-header .mkdf-sticky-header .mkdf-sticky-holder', array( 'border-color' => $border_color ) );
		}
		
		if ( ! empty( $header_height ) ) {
			$height = pawfriends_mikado_filter_px( $header_height ) . 'px';
			
			echo pawfriends_mikado_dynamic_css( '.mkdf-page-header .mkdf-sticky-header', array( 'height' => $height ) );
			echo pawfriends_mikado_dynamic_css( '.mkdf-page-header .mkdf-sticky-header .mkdf-logo-wrapper a', array( 'max-height' => $height ) );
		}
		
		$sticky_container_selector = '.mkdf-sticky-header .mkdf-sticky-holder .mkdf-vertical-align-containers';
		$sticky_container_styles   = array();
		$container_side_padding    = pawfriends_mikado_options()->getOptionValue( 'sticky_header_side_padding' );
		
		if ( $container_side_padding !== '' ) {
			if ( pawfriends_mikado_string_ends_with( $container_side_padding, 'px' ) || pawfriends_mikado_string_ends_with( $container_side_padding, '%' ) ) {
				$sticky_container_styles['padding-left']  = $container_side_padding;
				$sticky_container_styles['padding-right'] = $container_side_padding;
			} else {
				$sticky_container_styles['padding-left']  = pawfriends_mikado_filter_px( $container_side_padding ) . 'px';
				$sticky_container_styles['padding-right'] = pawfriends_mikado_filter_px( $container_side_padding ) . 'px';
			}
			
			echo pawfriends_mikado_dynamic_css( $sticky_container_selector, $sticky_container_styles );
		}
		
		// sticky menu style
		
		$menu_item_styles = pawfriends_mikado_get_typography_styles( 'sticky' );
		
		$menu_item_selector = array(
			'.mkdf-main-menu.mkdf-sticky-nav > ul > li > a'
		);
		
		echo pawfriends_mikado_dynamic_css( $menu_item_selector, $menu_item_styles );
		
		
		$hover_color = pawfriends_mikado_options()->getOptionValue( 'sticky_hovercolor' );
		
		$menu_item_hover_styles = array();
		if ( ! empty( $hover_color ) ) {
			$menu_item_hover_styles['color'] = $hover_color;
		}
		
		$menu_item_hover_selector = array(
			'.mkdf-main-menu.mkdf-sticky-nav > ul > li:hover > a',
			'.mkdf-main-menu.mkdf-sticky-nav > ul > li.mkdf-active-item > a',
            '.mkdf-main-menu>ul>li.current-menu-ancestor>a'
		);
		
		echo pawfriends_mikado_dynamic_css( $menu_item_hover_selector, $menu_item_hover_styles );
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_sticky_header_styles' );
}