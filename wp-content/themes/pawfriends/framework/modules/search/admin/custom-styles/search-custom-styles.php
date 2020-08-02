<?php

if ( ! function_exists( 'pawfriends_mikado_search_opener_icon_size' ) ) {
	function pawfriends_mikado_search_opener_icon_size() {
		$icon_size = pawfriends_mikado_options()->getOptionValue( 'header_search_icon_size' );

        $item_selector = array(
            '.mkdf-search-opener-wrapper .mkdf-icon-linear-icons',
            '.mkdf-search-cover .mkdf-search-close.mkdf-search-close-icon-pack *',
            '.mkdf-search-opener-wrapper .icon_search',
            '.mkdf-search-opener-wrapper .ion-ios-search',
            '.mkdf-search-cover .mkdf-search-close.mkdf-search-close-icon-pack .ion-close'
        );

		if ( ! empty( $icon_size ) ) {
			echo pawfriends_mikado_dynamic_css( $item_selector, array(
				'font-size' => pawfriends_mikado_filter_px( $icon_size ) . 'px'
			) );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_search_opener_icon_size' );
}

if ( ! function_exists( 'pawfriends_mikado_search_opener_icon_colors' ) ) {
	function pawfriends_mikado_search_opener_icon_colors() {
		$icon_color       = pawfriends_mikado_options()->getOptionValue( 'header_search_icon_color' );
		$icon_hover_color = pawfriends_mikado_options()->getOptionValue( 'header_search_icon_hover_color' );

        $color_selector = array(
            '.mkdf-search-opener',
            '.mkdf-search-cover .mkdf-search-close'
        );

		if ( ! empty( $icon_color ) ) {
			echo pawfriends_mikado_dynamic_css( $color_selector, array(
				'color' => $icon_color
			) );
		}

        $hover_selector = array(
            '.mkdf-search-opener:hover',
            '.mkdf-search-cover .mkdf-search-close:hover'
        );
		
		if ( ! empty( $icon_hover_color ) ) {
			echo pawfriends_mikado_dynamic_css( $hover_selector, array(
				'color' => $icon_hover_color
			) );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_search_opener_icon_colors' );
}

if ( ! function_exists( 'pawfriends_mikado_search_opener_text_styles' ) ) {
	function pawfriends_mikado_search_opener_text_styles() {
		$item_styles = pawfriends_mikado_get_typography_styles( 'search_icon_text' );
		
		$item_selector = array(
			'.mkdf-search-icon-text'
		);
		
		echo pawfriends_mikado_dynamic_css( $item_selector, $item_styles );
		
		$text_hover_color = pawfriends_mikado_options()->getOptionValue( 'search_icon_text_color_hover' );
		
		if ( ! empty( $text_hover_color ) ) {
			echo pawfriends_mikado_dynamic_css( '.mkdf-search-opener:hover .mkdf-search-icon-text', array(
				'color' => $text_hover_color
			) );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_search_opener_text_styles' );
}