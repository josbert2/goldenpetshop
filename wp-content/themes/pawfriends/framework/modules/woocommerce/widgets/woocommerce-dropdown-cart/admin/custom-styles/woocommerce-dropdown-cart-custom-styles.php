<?php

if ( ! function_exists( 'pawfriends_mikado_dropdown_cart_icon_styles' ) ) {
	/**
	 * Generates styles for dropdown cart icon
	 */
	function pawfriends_mikado_dropdown_cart_icon_styles() {
		$icon_color       = pawfriends_mikado_options()->getOptionValue( 'dropdown_cart_icon_color' );
		$icon_hover_color = pawfriends_mikado_options()->getOptionValue( 'dropdown_cart_hover_color' );

        $icon_color_selector = array(
            '.mkdf-shopping-cart-holder .mkdf-header-cart a',
            '.mkdf-shopping-cart-holder .mkdf-header-cart .mkdf-sc-opener-icon'
        );

        $icon_hover_color_selector = array(
            '.mkdf-shopping-cart-holder a:hover .mkdf-sc-opener-icon',
        );
		
		if ( ! empty( $icon_color ) ) {
			echo pawfriends_mikado_dynamic_css( $icon_color_selector, array( 'color' => $icon_color ) );
		}
		
		if ( ! empty( $icon_hover_color ) ) {
			echo pawfriends_mikado_dynamic_css( $icon_hover_color_selector, array( 'color' => $icon_hover_color ) );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_dropdown_cart_icon_styles' );
}