<?php

if ( ! function_exists( 'pawfriends_mikado_contact_form7_text_styles_1' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 elements
	 */
	function pawfriends_mikado_contact_form7_text_styles_1() {
		$selector = array(
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-text',
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-number',
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-date',
			'.cf7_custom_style_1 textarea.wpcf7-form-control.wpcf7-textarea',
			'.cf7_custom_style_1 select.wpcf7-form-control.wpcf7-select',
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-quiz',
		);
		
		$styles = pawfriends_mikado_get_typography_styles( 'cf7_style_1_text' );
		
		$background_color   = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_background_color' );
		$background_opacity = 1;
		if ( ! empty( $background_color ) ) {
			$background_transparency = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_background_transparency' );
			
			if ( $background_transparency !== '' ) {
				$background_opacity = $background_transparency;
			}
			
			$styles['background-color'] = pawfriends_mikado_rgba_color( $background_color, $background_opacity );
		}
		
		$border_color   = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_border_color' );
		$border_opacity = 1;
		if ( $border_color !== '' ) {
			$border_transparency = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_border_transparency' );
			
			if ( $border_transparency !== '' ) {
				$border_opacity = $border_transparency;
			}
			
			$styles['border-color'] = pawfriends_mikado_rgba_color( $border_color, $border_opacity );
		}
		
		$border_width = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_border_width' );
		if ( $border_width !== '' ) {
			$styles['border-width'] = pawfriends_mikado_filter_px( $border_width ) . 'px';
		}
		
		$border_radius = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_border_radius' );
		if ( $border_radius !== '' ) {
			$styles['border-radius'] = pawfriends_mikado_filter_px( $border_radius ) . 'px';
		}
		
		$padding_top = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_padding_top' );
		if ( $padding_top !== '' ) {
			$styles['padding-top'] = pawfriends_mikado_filter_px( $padding_top ) . 'px';
		}
		
		$padding_right = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_padding_right' );
		if ( $padding_right !== '' ) {
			$styles['padding-right'] = pawfriends_mikado_filter_px( $padding_right ) . 'px';
		}
		
		$padding_bottom = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_padding_bottom' );
		if ( $padding_bottom !== '' ) {
			$styles['padding-bottom'] = pawfriends_mikado_filter_px( $padding_bottom ) . 'px';
		}
		
		$padding_left = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_padding_left' );
		if ( $padding_left !== '' ) {
			$styles['padding-left'] = pawfriends_mikado_filter_px( $padding_left ) . 'px';
		}
		
		$margin_top = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_margin_top' );
		if ( $margin_top !== '' ) {
			$styles['margin-top'] = pawfriends_mikado_filter_px( $margin_top ) . 'px';
		}
		
		$margin_bottom = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_margin_bottom' );
		if ( $margin_bottom !== '' ) {
			$styles['margin-bottom'] = pawfriends_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$textarea_height = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_textarea_height' );
		if ( ! empty( $textarea_height ) ) {
			echo pawfriends_mikado_dynamic_css( '.cf7_custom_style_1 textarea.wpcf7-form-control.wpcf7-textarea',
				array( 'height' => pawfriends_mikado_filter_px( $textarea_height ) . 'px' )
			);
		}
		
		echo pawfriends_mikado_dynamic_css( $selector, $styles );
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_contact_form7_text_styles_1' );
}

if ( ! function_exists( 'pawfriends_mikado_contact_form7_placeholder_styles_1' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 elements placeholder
	 */
	function pawfriends_mikado_contact_form7_placeholder_styles_1() {
		$selector = array(
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-text::placeholder',
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-number::placeholder',
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-date::placeholder',
			'.cf7_custom_style_1 textarea.wpcf7-form-control.wpcf7-textarea::placeholder',
			'.cf7_custom_style_1 select.wpcf7-form-control.wpcf7-select::placeholder',
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-quiz::placeholder'
		);
		$styles   = array();

		$placeholder = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_placeholder_text_color' );
		if ( ! empty( $placeholder ) ) {
			$styles['color'] = $placeholder;
		}


		echo pawfriends_mikado_dynamic_css( $selector, $styles );
	}

	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_contact_form7_placeholder_styles_1' );
}

if ( ! function_exists( 'pawfriends_mikado_contact_form7_focus_styles_1' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 elements focus
	 */
	function pawfriends_mikado_contact_form7_focus_styles_1() {
		$selector = array(
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-text:focus',
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-number:focus',
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-date:focus',
			'.cf7_custom_style_1 textarea.wpcf7-form-control.wpcf7-textarea:focus',
			'.cf7_custom_style_1 select.wpcf7-form-control.wpcf7-select:focus',
			'.cf7_custom_style_1 input.wpcf7-form-control.wpcf7-quiz:focus'
		);
		$styles   = array();
		
		$color = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_focus_text_color' );
		if ( ! empty( $color ) ) {
			$styles['color'] = $color;
		}
		
		$background_color   = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_focus_background_color' );
		$background_opacity = 1;
		if ( ! empty( $background_color ) ) {
			$background_transparency = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_focus_background_transparency' );
			
			if ( $background_transparency !== '' ) {
				$background_opacity = $background_transparency;
			}
			
			$styles['background-color'] = pawfriends_mikado_rgba_color( $background_color, $background_opacity );
		}
		
		$border_color   = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_focus_border_color' );
		$border_opacity = 1;
		if ( ! empty( $border_color ) ) {
			$border_transparency = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_focus_border_transparency' );
			
			if ( $border_transparency !== '' ) {
				$border_opacity = $border_transparency;
			}
			
			$styles['border-color'] = pawfriends_mikado_rgba_color( $border_color, $border_opacity );
		}
		
		echo pawfriends_mikado_dynamic_css( $selector, $styles );
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_contact_form7_focus_styles_1' );
}

if ( ! function_exists( 'pawfriends_mikado_contact_form7_label_styles_1' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 label
	 */
	function pawfriends_mikado_contact_form7_label_styles_1() {
		$item_styles = pawfriends_mikado_get_typography_styles( 'cf7_style_1_label' );
		
		$item_selector = array(
			'.cf7_custom_style_1 p'
		);
		
		echo pawfriends_mikado_dynamic_css( $item_selector, $item_styles );
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_contact_form7_label_styles_1' );
}

if ( ! function_exists( 'pawfriends_mikado_contact_form7_button_styles_1' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 button
	 */
	function pawfriends_mikado_contact_form7_button_styles_1() {
		$selector = array(
			'.cf7_custom_style_1 button.wpcf7-form-control.wpcf7-submit',
            '.cf7_custom_style_1 button.wpcf7-form-control.wpcf7-submit.mkdf-btn.mkdf-btn-solid',
            '.cf7_custom_style_1 button.wpcf7-form-control.wpcf7-submit.mkdf-btn.mkdf-btn-simple'
		);
		
		$styles = pawfriends_mikado_get_typography_styles( 'cf7_style_1_button' );
		
		$height = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_button_height' );
		if ( $height !== '' ) {
			$styles['padding-top']    = '0';
			$styles['padding-bottom'] = '0';
			$styles['height']         = pawfriends_mikado_filter_px( $height ) . 'px';
			$styles['line-height']    = pawfriends_mikado_filter_px( $height ) . 'px';
		}
		
		$background_color   = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_button_background_color' );
		$background_opacity = 1;
		if ( ! empty( $background_color ) ) {
			$background_transparency = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_button_background_transparency' );
			
			if ( $background_transparency !== '' ) {
				$background_opacity = $background_transparency;
			}
			
			$styles['background-color'] = pawfriends_mikado_rgba_color( $background_color, $background_opacity );
		}
		
		$border_color   = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_button_border_color' );
		$border_opacity = 1;
		if ( ! empty( $border_color ) ) {
			$border_transparency = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_button_border_transparency' );
			
			if ( $border_transparency !== '' ) {
				$border_opacity = $border_transparency;
			}
			
			$styles['border-color'] = pawfriends_mikado_rgba_color( $border_color, $border_opacity );
		}
		
		$border_width = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_button_border_width' );
		if ( $border_width !== '' ) {
			$styles['border-width'] = pawfriends_mikado_filter_px( $border_width ) . 'px';
		}
		
		$border_radius = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_button_border_radius' );
		if ( $border_radius !== '' ) {
			$styles['border-radius'] = pawfriends_mikado_filter_px( $border_radius ) . 'px';
		}
		
		$padding_left_right = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_button_padding' );
		if ( $padding_left_right !== '' ) {
			$styles['padding-left']  = pawfriends_mikado_filter_px( $padding_left_right ) . 'px';
			$styles['padding-right'] = pawfriends_mikado_filter_px( $padding_left_right ) . 'px';
		}
		
		echo pawfriends_mikado_dynamic_css( $selector, $styles );
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_contact_form7_button_styles_1' );
}

if ( ! function_exists( 'pawfriends_mikado_contact_form7_button_hover_styles_1' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 button
	 */
	function pawfriends_mikado_contact_form7_button_hover_styles_1() {
		$selector = array(
			'.cf7_custom_style_1 button.wpcf7-form-control.wpcf7-submit:not([disabled]):hover',
            '.cf7_custom_style_1 button.wpcf7-form-control.wpcf7-submit.mkdf-btn.mkdf-btn-solid:hover',
            '.cf7_custom_style_1 button.wpcf7-form-control.wpcf7-submit.mkdf-btn.mkdf-btn-simple:hover'
		);
		$styles   = array();
		
		$color = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_button_hover_color' );
		if ( ! empty( $color ) ) {
			$styles['color'] = $color;
		}
		
		$background_color   = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_button_hover_bckg_color' );
		$background_opacity = 1;
		if ( ! empty( $background_color ) ) {
			$background_transparency = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_button_hover_bckg_transparency' );
			
			if ( $background_transparency !== '' ) {
				$background_opacity = $background_transparency;
			}
			
			$styles['background-color'] = pawfriends_mikado_rgba_color( $background_color, $background_opacity );
		}
		
		$border_color   = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_button_hover_border_color' );
		$border_opacity = 1;
		if ( ! empty( $border_color ) ) {
			$border_transparency = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_button_border_transparency' );
			
			if ( $border_transparency !== '' ) {
				$border_opacity = $border_transparency;
			}
			
			$styles['border-color'] = pawfriends_mikado_rgba_color( $border_color, $border_opacity );
		}
		
		echo pawfriends_mikado_dynamic_css( $selector, $styles );
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_contact_form7_button_hover_styles_1' );
}

if ( ! function_exists( 'pawfriends_mikado_contact_form7_button_svg_styles_1' ) ) {

    function pawfriends_mikado_contact_form7_button_svg_styles_1() {

        $selector = array(
            '.mkdf-paws .cf7_custom_style_1 button.wpcf7-form-control.wpcf7-submit.mkdf-btn.mkdf-btn-simple:after'
        );

        $styles = array();

        $color = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_button_color' );

        if ( ! empty( $color ) ) {
            $color = ltrim($color, '#');

            $styles['background-image'] = "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='19' height='19' viewBox='0 0 22 21' class='mkdf-paw'%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($color).";stroke-width:1.8;stroke-miterlimit:10' d='M4.8 4.3c1 0.4 1.7 1.1 2.6 1.7 1.1 0.7 2.3 1.2 3.3 2 1 0.8 1.7 2.3 1 3.4 -0.2 0.4-0.5 0.7-0.9 1 -1.2 1.1-2.4 2.2-3.6 3.3C6 16.9 4 17.8 2.6 16.2c-1.1-1.2-0.4-3.1 0.1-4.3 0.3-0.8 0.5-1.8 0-2.5C2.4 9.2 2.2 9 1.9 8.8 -0.2 6.9 2.1 3.2 4.8 4.3z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($color).";stroke-width:1.8;stroke-miterlimit:10' d='M9 2.8C8.5 3.3 8.1 4 8.4 4.6 8.5 5 8.8 5.2 9.2 5.4c1.8 1 6.1 1.1 5.5-2C14.2 0.9 10.3 1.4 9 2.8z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($color).";stroke-width:1.8;stroke-miterlimit:10' d='M16.6 6.1c-0.9 0.3-1.7 1.1-1.8 2.1 0 0.2 0 0.4 0.1 0.5C15 9 15.3 9.2 15.5 9.3c0.9 0.5 2 0.8 3.1 0.7 0.7 0 1.3-0.2 1.8-0.6C20.9 9 21.2 8.3 21 7.6 20.4 6 18.1 5.7 16.6 6.1z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($color).";stroke-width:1.8;stroke-miterlimit:10' d='M17.9 11.2c-0.8-0.3-1.8-0.4-2.6-0.1 -0.8 0.3-1.5 1.2-1.3 2.1 0.1 0.8 0.8 1.3 1.4 1.7 0.8 0.6 1.7 1 2.7 1 1 0 2-0.7 2.1-1.7C20.4 12.6 19.4 11.8 17.9 11.2z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($color).";stroke-width:1.8;stroke-miterlimit:10' d='M10.9 15.4c-0.6 0-1.3 0.3-1.7 0.8 -1.4 2.1 2.2 3.6 3.7 3.5 1.9-0.1 2.5-2 1.2-3.3C13.4 15.6 12 15.3 10.9 15.4z'/%3E%3C/svg%3E\")";
        } else {
            $styles['background-image'] = "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='19' height='19' viewBox='0 0 22 21' class='mkdf-paw'%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23FFFFFF;stroke-width:1.8;stroke-miterlimit:10' d='M4.8 4.3c1 0.4 1.7 1.1 2.6 1.7 1.1 0.7 2.3 1.2 3.3 2 1 0.8 1.7 2.3 1 3.4 -0.2 0.4-0.5 0.7-0.9 1 -1.2 1.1-2.4 2.2-3.6 3.3C6 16.9 4 17.8 2.6 16.2c-1.1-1.2-0.4-3.1 0.1-4.3 0.3-0.8 0.5-1.8 0-2.5C2.4 9.2 2.2 9 1.9 8.8 -0.2 6.9 2.1 3.2 4.8 4.3z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23FFFFFF;stroke-width:1.8;stroke-miterlimit:10' d='M9 2.8C8.5 3.3 8.1 4 8.4 4.6 8.5 5 8.8 5.2 9.2 5.4c1.8 1 6.1 1.1 5.5-2C14.2 0.9 10.3 1.4 9 2.8z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23FFFFFF;stroke-width:1.8;stroke-miterlimit:10' d='M16.6 6.1c-0.9 0.3-1.7 1.1-1.8 2.1 0 0.2 0 0.4 0.1 0.5C15 9 15.3 9.2 15.5 9.3c0.9 0.5 2 0.8 3.1 0.7 0.7 0 1.3-0.2 1.8-0.6C20.9 9 21.2 8.3 21 7.6 20.4 6 18.1 5.7 16.6 6.1z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23FFFFFF;stroke-width:1.8;stroke-miterlimit:10' d='M17.9 11.2c-0.8-0.3-1.8-0.4-2.6-0.1 -0.8 0.3-1.5 1.2-1.3 2.1 0.1 0.8 0.8 1.3 1.4 1.7 0.8 0.6 1.7 1 2.7 1 1 0 2-0.7 2.1-1.7C20.4 12.6 19.4 11.8 17.9 11.2z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23FFFFFF;stroke-width:1.8;stroke-miterlimit:10' d='M10.9 15.4c-0.6 0-1.3 0.3-1.7 0.8 -1.4 2.1 2.2 3.6 3.7 3.5 1.9-0.1 2.5-2 1.2-3.3C13.4 15.6 12 15.3 10.9 15.4z'/%3E%3C/svg%3E\")";
        }

        echo pawfriends_mikado_dynamic_svg( $selector, $styles );
    }

    add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_contact_form7_button_svg_styles_1' );
}

if ( ! function_exists( 'pawfriends_mikado_contact_form7_button_svg_hover_styles_1' ) ) {

    function pawfriends_mikado_contact_form7_button_svg_hover_styles_1() {

        $selector = array(
            '.mkdf-paws .cf7_custom_style_1 button.wpcf7-form-control.wpcf7-submit.mkdf-btn.mkdf-btn-simple:hover:after'
        );

        $styles = array();

        $hover_color = pawfriends_mikado_options()->getOptionValue( 'cf7_style_1_button_hover_color' );

        if ( ! empty( $hover_color ) ) {
            $hover_color = ltrim($hover_color, '#');

            $styles['background-image'] = "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='19' height='19' viewBox='0 0 22 21' class='mkdf-paw'%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($hover_color).";stroke-width:1.8;stroke-miterlimit:10' d='M4.8 4.3c1 0.4 1.7 1.1 2.6 1.7 1.1 0.7 2.3 1.2 3.3 2 1 0.8 1.7 2.3 1 3.4 -0.2 0.4-0.5 0.7-0.9 1 -1.2 1.1-2.4 2.2-3.6 3.3C6 16.9 4 17.8 2.6 16.2c-1.1-1.2-0.4-3.1 0.1-4.3 0.3-0.8 0.5-1.8 0-2.5C2.4 9.2 2.2 9 1.9 8.8 -0.2 6.9 2.1 3.2 4.8 4.3z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($hover_color).";stroke-width:1.8;stroke-miterlimit:10' d='M9 2.8C8.5 3.3 8.1 4 8.4 4.6 8.5 5 8.8 5.2 9.2 5.4c1.8 1 6.1 1.1 5.5-2C14.2 0.9 10.3 1.4 9 2.8z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($hover_color).";stroke-width:1.8;stroke-miterlimit:10' d='M16.6 6.1c-0.9 0.3-1.7 1.1-1.8 2.1 0 0.2 0 0.4 0.1 0.5C15 9 15.3 9.2 15.5 9.3c0.9 0.5 2 0.8 3.1 0.7 0.7 0 1.3-0.2 1.8-0.6C20.9 9 21.2 8.3 21 7.6 20.4 6 18.1 5.7 16.6 6.1z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($hover_color).";stroke-width:1.8;stroke-miterlimit:10' d='M17.9 11.2c-0.8-0.3-1.8-0.4-2.6-0.1 -0.8 0.3-1.5 1.2-1.3 2.1 0.1 0.8 0.8 1.3 1.4 1.7 0.8 0.6 1.7 1 2.7 1 1 0 2-0.7 2.1-1.7C20.4 12.6 19.4 11.8 17.9 11.2z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($hover_color).";stroke-width:1.8;stroke-miterlimit:10' d='M10.9 15.4c-0.6 0-1.3 0.3-1.7 0.8 -1.4 2.1 2.2 3.6 3.7 3.5 1.9-0.1 2.5-2 1.2-3.3C13.4 15.6 12 15.3 10.9 15.4z'/%3E%3C/svg%3E\")";
        } else {
            $styles['background-image'] = "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='19' height='19' viewBox='0 0 22 21' class='mkdf-paw'%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:rgb(240,67,54);stroke-width:1.8;stroke-miterlimit:10' d='M4.8 4.3c1 0.4 1.7 1.1 2.6 1.7 1.1 0.7 2.3 1.2 3.3 2 1 0.8 1.7 2.3 1 3.4 -0.2 0.4-0.5 0.7-0.9 1 -1.2 1.1-2.4 2.2-3.6 3.3C6 16.9 4 17.8 2.6 16.2c-1.1-1.2-0.4-3.1 0.1-4.3 0.3-0.8 0.5-1.8 0-2.5C2.4 9.2 2.2 9 1.9 8.8 -0.2 6.9 2.1 3.2 4.8 4.3z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:rgb(240,67,54);stroke-width:1.8;stroke-miterlimit:10' d='M9 2.8C8.5 3.3 8.1 4 8.4 4.6 8.5 5 8.8 5.2 9.2 5.4c1.8 1 6.1 1.1 5.5-2C14.2 0.9 10.3 1.4 9 2.8z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:rgb(240,67,54);stroke-width:1.8;stroke-miterlimit:10' d='M16.6 6.1c-0.9 0.3-1.7 1.1-1.8 2.1 0 0.2 0 0.4 0.1 0.5C15 9 15.3 9.2 15.5 9.3c0.9 0.5 2 0.8 3.1 0.7 0.7 0 1.3-0.2 1.8-0.6C20.9 9 21.2 8.3 21 7.6 20.4 6 18.1 5.7 16.6 6.1z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:rgb(240,67,54);stroke-width:1.8;stroke-miterlimit:10' d='M17.9 11.2c-0.8-0.3-1.8-0.4-2.6-0.1 -0.8 0.3-1.5 1.2-1.3 2.1 0.1 0.8 0.8 1.3 1.4 1.7 0.8 0.6 1.7 1 2.7 1 1 0 2-0.7 2.1-1.7C20.4 12.6 19.4 11.8 17.9 11.2z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:rgb(240,67,54);stroke-width:1.8;stroke-miterlimit:10' d='M10.9 15.4c-0.6 0-1.3 0.3-1.7 0.8 -1.4 2.1 2.2 3.6 3.7 3.5 1.9-0.1 2.5-2 1.2-3.3C13.4 15.6 12 15.3 10.9 15.4z'/%3E%3C/svg%3E\")";
        }

        echo pawfriends_mikado_dynamic_svg( $selector, $styles );
    }

    add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_contact_form7_button_svg_hover_styles_1' );
}

if ( ! function_exists( 'pawfriends_mikado_contact_form7_text_styles_2' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 elements
	 */
	function pawfriends_mikado_contact_form7_text_styles_2() {
		$selector = array(
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-text',
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-number',
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-date',
			'.cf7_custom_style_2 textarea.wpcf7-form-control.wpcf7-textarea',
			'.cf7_custom_style_2 select.wpcf7-form-control.wpcf7-select',
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-quiz'
		);
		
		$styles = pawfriends_mikado_get_typography_styles( 'cf7_style_2_text' );
		
		$background_color   = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_background_color' );
		$background_opacity = 1;
		if ( ! empty( $background_color ) ) {
			$background_transparency = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_background_transparency' );
			
			if ( $background_transparency !== '' ) {
				$background_opacity = $background_transparency;
			}
			
			$styles['background-color'] = pawfriends_mikado_rgba_color( $background_color, $background_opacity );
		}
		
		$border_color   = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_border_color' );
		$border_opacity = 1;
		if ( $border_color !== '' ) {
			$border_transparency = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_border_transparency' );
			
			if ( $border_transparency !== '' ) {
				$border_opacity = $border_transparency;
			}
			
			$styles['border-color'] = pawfriends_mikado_rgba_color( $border_color, $border_opacity );
		}
		
		$border_width = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_border_width' );
		if ( $border_width !== '' ) {
			$styles['border-width'] = pawfriends_mikado_filter_px( $border_width ) . 'px';
		}
		
		$border_radius = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_border_radius' );
		if ( $border_radius !== '' ) {
			$styles['border-radius'] = pawfriends_mikado_filter_px( $border_radius ) . 'px';
		}
		
		$padding_top = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_padding_top' );
		if ( $padding_top !== '' ) {
			$styles['padding-top'] = pawfriends_mikado_filter_px( $padding_top ) . 'px';
		}
		
		$padding_right = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_padding_right' );
		if ( $padding_right !== '' ) {
			$styles['padding-right'] = pawfriends_mikado_filter_px( $padding_right ) . 'px';
		}
		
		$padding_bottom = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_padding_bottom' );
		if ( $padding_bottom !== '' ) {
			$styles['padding-bottom'] = pawfriends_mikado_filter_px( $padding_bottom ) . 'px';
		}
		
		$padding_left = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_padding_left' );
		if ( $padding_left !== '' ) {
			$styles['padding-left'] = pawfriends_mikado_filter_px( $padding_left ) . 'px';
		}
		
		$margin_top = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_margin_top' );
		if ( $margin_top !== '' ) {
			$styles['margin-top'] = pawfriends_mikado_filter_px( $margin_top ) . 'px';
		}
		
		$margin_bottom = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_margin_bottom' );
		if ( $margin_bottom !== '' ) {
			$styles['margin-bottom'] = pawfriends_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$textarea_height = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_textarea_height' );
		if ( ! empty( $textarea_height ) ) {
			echo pawfriends_mikado_dynamic_css( '.cf7_custom_style_2 textarea.wpcf7-form-control.wpcf7-textarea',
				array( 'height' => pawfriends_mikado_filter_px( $textarea_height ) . 'px' )
			);
		}
		
		echo pawfriends_mikado_dynamic_css( $selector, $styles );
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_contact_form7_text_styles_2' );
}

if ( ! function_exists( 'pawfriends_mikado_contact_form7_placeholder_styles_2' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 elements placeholder
	 */
	function pawfriends_mikado_contact_form7_placeholder_styles_2() {
		$selector = array(
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-text::placeholder',
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-number::placeholder',
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-date::placeholder',
			'.cf7_custom_style_2 textarea.wpcf7-form-control.wpcf7-textarea::placeholder',
			'.cf7_custom_style_2 select.wpcf7-form-control.wpcf7-select::placeholder',
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-quiz::placeholder'
		);
		$styles   = array();

		$placeholder = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_placeholder_text_color' );
		if ( ! empty( $placeholder ) ) {
			$styles['color'] = $placeholder;
		}


		echo pawfriends_mikado_dynamic_css( $selector, $styles );
	}

	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_contact_form7_placeholder_styles_2' );
}

if ( ! function_exists( 'pawfriends_mikado_contact_form7_focus_styles_2' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 elements focus
	 */
	function pawfriends_mikado_contact_form7_focus_styles_2() {
		$selector = array(
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-text:focus',
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-number:focus',
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-date:focus',
			'.cf7_custom_style_2 textarea.wpcf7-form-control.wpcf7-textarea:focus',
			'.cf7_custom_style_2 select.wpcf7-form-control.wpcf7-select:focus',
			'.cf7_custom_style_2 input.wpcf7-form-control.wpcf7-quiz:focus'
		);
		$styles   = array();
		
		$color = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_focus_text_color' );
		if ( ! empty( $color ) ) {
			$styles['color'] = $color;
		}
		
		$background_color   = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_focus_background_color' );
		$background_opacity = 1;
		if ( ! empty( $background_color ) ) {
			$background_transparency = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_focus_background_transparency' );
			
			if ( $background_transparency !== '' ) {
				$background_opacity = $background_transparency;
			}
			
			$styles['background-color'] = pawfriends_mikado_rgba_color( $background_color, $background_opacity );
		}
		
		$border_color   = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_focus_border_color' );
		$border_opacity = 1;
		if ( ! empty( $border_color ) ) {
			$border_transparency = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_focus_border_transparency' );
			
			if ( $border_transparency !== '' ) {
				$border_opacity = $border_transparency;
			}
			
			$styles['border-color'] = pawfriends_mikado_rgba_color( $border_color, $border_opacity );
		}
		
		echo pawfriends_mikado_dynamic_css( $selector, $styles );
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_contact_form7_focus_styles_2' );
}

if ( ! function_exists( 'pawfriends_mikado_contact_form7_label_styles_2' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 label
	 */
	function pawfriends_mikado_contact_form7_label_styles_2() {
		$item_styles = pawfriends_mikado_get_typography_styles( 'cf7_style_2_label' );
		
		$item_selector = array(
			'.cf7_custom_style_2 p'
		);
		
		echo pawfriends_mikado_dynamic_css( $item_selector, $item_styles );
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_contact_form7_label_styles_2' );
}

if ( ! function_exists( 'pawfriends_mikado_contact_form7_button_styles_2' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 button
	 */
	function pawfriends_mikado_contact_form7_button_styles_2() {
		$selector = array(
			'.cf7_custom_style_2 button.wpcf7-form-control.wpcf7-submit',
            '.cf7_custom_style_2 button.wpcf7-form-control.wpcf7-submit.mkdf-btn.mkdf-btn-solid',
            '.cf7_custom_style_2 button.wpcf7-form-control.wpcf7-submit.mkdf-btn.mkdf-btn-simple'
		);
		
		$styles = pawfriends_mikado_get_typography_styles( 'cf7_style_2_button' );
		
		$height = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_button_height' );
		if ( $height !== '' ) {
			$styles['padding-top']    = '0';
			$styles['padding-bottom'] = '0';
			$styles['height']         = pawfriends_mikado_filter_px( $height ) . 'px';
			$styles['line-height']    = pawfriends_mikado_filter_px( $height ) . 'px';
		}
		
		$background_color   = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_button_background_color' );
		$background_opacity = 1;
		if ( ! empty( $background_color ) ) {
			$background_transparency = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_button_background_transparency' );
			
			if ( $background_transparency !== '' ) {
				$background_opacity = $background_transparency;
			}
			
			$styles['background-color'] = pawfriends_mikado_rgba_color( $background_color, $background_opacity );
		}
		
		$border_color   = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_button_border_color' );
		$border_opacity = 1;
		if ( ! empty( $border_color ) ) {
			$border_transparency = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_button_border_transparency' );
			
			if ( $border_transparency !== '' ) {
				$border_opacity = $border_transparency;
			}
			
			$styles['border-color'] = pawfriends_mikado_rgba_color( $border_color, $border_opacity );
		}
		
		$border_width = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_button_border_width' );
		if ( $border_width !== '' ) {
			$styles['border-width'] = pawfriends_mikado_filter_px( $border_width ) . 'px';
		}
		
		$border_radius = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_button_border_radius' );
		if ( $border_radius !== '' ) {
			$styles['border-radius'] = pawfriends_mikado_filter_px( $border_radius ) . 'px';
		}
		
		$padding_left_right = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_button_padding' );
		if ( $padding_left_right !== '' ) {
			$styles['padding-left']  = pawfriends_mikado_filter_px( $padding_left_right ) . 'px';
			$styles['padding-right'] = pawfriends_mikado_filter_px( $padding_left_right ) . 'px';
		}
		
		echo pawfriends_mikado_dynamic_css( $selector, $styles );
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_contact_form7_button_styles_2' );
}

if ( ! function_exists( 'pawfriends_mikado_contact_form7_button_hover_styles_2' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 button
	 */
	function pawfriends_mikado_contact_form7_button_hover_styles_2() {
		$selector = array(
			'.cf7_custom_style_2 button.wpcf7-form-control.wpcf7-submit:not([disabled]):hover',
            '.cf7_custom_style_2 button.wpcf7-form-control.wpcf7-submit.mkdf-btn.mkdf-btn-solid:hover',
            '.cf7_custom_style_2 button.wpcf7-form-control.wpcf7-submit.mkdf-btn.mkdf-btn-simple:hover'
		);
		$styles   = array();
		
		$color = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_button_hover_color' );
		if ( ! empty( $color ) ) {
			$styles['color'] = $color;
		}
		
		$background_color   = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_button_hover_bckg_color' );
		$background_opacity = 1;
		if ( ! empty( $background_color ) ) {
			$background_transparency = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_button_hover_bckg_transparency' );
			
			if ( $background_transparency !== '' ) {
				$background_opacity = $background_transparency;
			}
			
			$styles['background-color'] = pawfriends_mikado_rgba_color( $background_color, $background_opacity );
		}
		
		$border_color   = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_button_hover_border_color' );
		$border_opacity = 1;
		if ( ! empty( $border_color ) ) {
			$border_transparency = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_button_border_transparency' );
			
			if ( $border_transparency !== '' ) {
				$border_opacity = $border_transparency;
			}
			
			$styles['border-color'] = pawfriends_mikado_rgba_color( $border_color, $border_opacity );
		}
		
		echo pawfriends_mikado_dynamic_css( $selector, $styles );
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_contact_form7_button_hover_styles_2' );
}

if ( ! function_exists( 'pawfriends_mikado_contact_form7_button_svg_styles_2' ) ) {

    function pawfriends_mikado_contact_form7_button_svg_styles_2() {

        $selector = array(
            '.mkdf-paws .cf7_custom_style_2 button.wpcf7-form-control.wpcf7-submit.mkdf-btn.mkdf-btn-simple:after'
        );

        $styles = array();

        $color = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_button_color' );

        if ( ! empty( $color ) ) {
            $color = ltrim($color, '#');

            $styles['background-image'] = "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='19' height='19' viewBox='0 0 22 21' class='mkdf-paw'%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($color).";stroke-width:1.8;stroke-miterlimit:10' d='M4.8 4.3c1 0.4 1.7 1.1 2.6 1.7 1.1 0.7 2.3 1.2 3.3 2 1 0.8 1.7 2.3 1 3.4 -0.2 0.4-0.5 0.7-0.9 1 -1.2 1.1-2.4 2.2-3.6 3.3C6 16.9 4 17.8 2.6 16.2c-1.1-1.2-0.4-3.1 0.1-4.3 0.3-0.8 0.5-1.8 0-2.5C2.4 9.2 2.2 9 1.9 8.8 -0.2 6.9 2.1 3.2 4.8 4.3z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($color).";stroke-width:1.8;stroke-miterlimit:10' d='M9 2.8C8.5 3.3 8.1 4 8.4 4.6 8.5 5 8.8 5.2 9.2 5.4c1.8 1 6.1 1.1 5.5-2C14.2 0.9 10.3 1.4 9 2.8z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($color).";stroke-width:1.8;stroke-miterlimit:10' d='M16.6 6.1c-0.9 0.3-1.7 1.1-1.8 2.1 0 0.2 0 0.4 0.1 0.5C15 9 15.3 9.2 15.5 9.3c0.9 0.5 2 0.8 3.1 0.7 0.7 0 1.3-0.2 1.8-0.6C20.9 9 21.2 8.3 21 7.6 20.4 6 18.1 5.7 16.6 6.1z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($color).";stroke-width:1.8;stroke-miterlimit:10' d='M17.9 11.2c-0.8-0.3-1.8-0.4-2.6-0.1 -0.8 0.3-1.5 1.2-1.3 2.1 0.1 0.8 0.8 1.3 1.4 1.7 0.8 0.6 1.7 1 2.7 1 1 0 2-0.7 2.1-1.7C20.4 12.6 19.4 11.8 17.9 11.2z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($color).";stroke-width:1.8;stroke-miterlimit:10' d='M10.9 15.4c-0.6 0-1.3 0.3-1.7 0.8 -1.4 2.1 2.2 3.6 3.7 3.5 1.9-0.1 2.5-2 1.2-3.3C13.4 15.6 12 15.3 10.9 15.4z'/%3E%3C/svg%3E\")";
        } else {
            $styles['background-image'] = "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='19' height='19' viewBox='0 0 22 21' class='mkdf-paw'%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23FFFFFF;stroke-width:1.8;stroke-miterlimit:10' d='M4.8 4.3c1 0.4 1.7 1.1 2.6 1.7 1.1 0.7 2.3 1.2 3.3 2 1 0.8 1.7 2.3 1 3.4 -0.2 0.4-0.5 0.7-0.9 1 -1.2 1.1-2.4 2.2-3.6 3.3C6 16.9 4 17.8 2.6 16.2c-1.1-1.2-0.4-3.1 0.1-4.3 0.3-0.8 0.5-1.8 0-2.5C2.4 9.2 2.2 9 1.9 8.8 -0.2 6.9 2.1 3.2 4.8 4.3z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23FFFFFF;stroke-width:1.8;stroke-miterlimit:10' d='M9 2.8C8.5 3.3 8.1 4 8.4 4.6 8.5 5 8.8 5.2 9.2 5.4c1.8 1 6.1 1.1 5.5-2C14.2 0.9 10.3 1.4 9 2.8z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23FFFFFF;stroke-width:1.8;stroke-miterlimit:10' d='M16.6 6.1c-0.9 0.3-1.7 1.1-1.8 2.1 0 0.2 0 0.4 0.1 0.5C15 9 15.3 9.2 15.5 9.3c0.9 0.5 2 0.8 3.1 0.7 0.7 0 1.3-0.2 1.8-0.6C20.9 9 21.2 8.3 21 7.6 20.4 6 18.1 5.7 16.6 6.1z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23FFFFFF;stroke-width:1.8;stroke-miterlimit:10' d='M17.9 11.2c-0.8-0.3-1.8-0.4-2.6-0.1 -0.8 0.3-1.5 1.2-1.3 2.1 0.1 0.8 0.8 1.3 1.4 1.7 0.8 0.6 1.7 1 2.7 1 1 0 2-0.7 2.1-1.7C20.4 12.6 19.4 11.8 17.9 11.2z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23FFFFFF;stroke-width:1.8;stroke-miterlimit:10' d='M10.9 15.4c-0.6 0-1.3 0.3-1.7 0.8 -1.4 2.1 2.2 3.6 3.7 3.5 1.9-0.1 2.5-2 1.2-3.3C13.4 15.6 12 15.3 10.9 15.4z'/%3E%3C/svg%3E\")";
        }

        echo pawfriends_mikado_dynamic_svg( $selector, $styles );
    }

    add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_contact_form7_button_svg_styles_2' );
}

if ( ! function_exists( 'pawfriends_mikado_contact_form7_button_svg_hover_styles_2' ) ) {

    function pawfriends_mikado_contact_form7_button_svg_hover_styles_2() {

        $selector = array(
            '.mkdf-paws .cf7_custom_style_2 button.wpcf7-form-control.wpcf7-submit.mkdf-btn.mkdf-btn-simple:hover:after'
        );

        $styles = array();

        $hover_color = pawfriends_mikado_options()->getOptionValue( 'cf7_style_2_button_hover_color' );

        if ( ! empty( $hover_color ) ) {
            $hover_color = ltrim($hover_color, '#');

            $styles['background-image'] = "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='19' height='19' viewBox='0 0 22 21' class='mkdf-paw'%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($hover_color).";stroke-width:1.8;stroke-miterlimit:10' d='M4.8 4.3c1 0.4 1.7 1.1 2.6 1.7 1.1 0.7 2.3 1.2 3.3 2 1 0.8 1.7 2.3 1 3.4 -0.2 0.4-0.5 0.7-0.9 1 -1.2 1.1-2.4 2.2-3.6 3.3C6 16.9 4 17.8 2.6 16.2c-1.1-1.2-0.4-3.1 0.1-4.3 0.3-0.8 0.5-1.8 0-2.5C2.4 9.2 2.2 9 1.9 8.8 -0.2 6.9 2.1 3.2 4.8 4.3z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($hover_color).";stroke-width:1.8;stroke-miterlimit:10' d='M9 2.8C8.5 3.3 8.1 4 8.4 4.6 8.5 5 8.8 5.2 9.2 5.4c1.8 1 6.1 1.1 5.5-2C14.2 0.9 10.3 1.4 9 2.8z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($hover_color).";stroke-width:1.8;stroke-miterlimit:10' d='M16.6 6.1c-0.9 0.3-1.7 1.1-1.8 2.1 0 0.2 0 0.4 0.1 0.5C15 9 15.3 9.2 15.5 9.3c0.9 0.5 2 0.8 3.1 0.7 0.7 0 1.3-0.2 1.8-0.6C20.9 9 21.2 8.3 21 7.6 20.4 6 18.1 5.7 16.6 6.1z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($hover_color).";stroke-width:1.8;stroke-miterlimit:10' d='M17.9 11.2c-0.8-0.3-1.8-0.4-2.6-0.1 -0.8 0.3-1.5 1.2-1.3 2.1 0.1 0.8 0.8 1.3 1.4 1.7 0.8 0.6 1.7 1 2.7 1 1 0 2-0.7 2.1-1.7C20.4 12.6 19.4 11.8 17.9 11.2z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($hover_color).";stroke-width:1.8;stroke-miterlimit:10' d='M10.9 15.4c-0.6 0-1.3 0.3-1.7 0.8 -1.4 2.1 2.2 3.6 3.7 3.5 1.9-0.1 2.5-2 1.2-3.3C13.4 15.6 12 15.3 10.9 15.4z'/%3E%3C/svg%3E\")";
        }  else {
            $styles['background-image'] = "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='19' height='19' viewBox='0 0 22 21' class='mkdf-paw'%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:rgb(240,67,54);stroke-width:1.8;stroke-miterlimit:10' d='M4.8 4.3c1 0.4 1.7 1.1 2.6 1.7 1.1 0.7 2.3 1.2 3.3 2 1 0.8 1.7 2.3 1 3.4 -0.2 0.4-0.5 0.7-0.9 1 -1.2 1.1-2.4 2.2-3.6 3.3C6 16.9 4 17.8 2.6 16.2c-1.1-1.2-0.4-3.1 0.1-4.3 0.3-0.8 0.5-1.8 0-2.5C2.4 9.2 2.2 9 1.9 8.8 -0.2 6.9 2.1 3.2 4.8 4.3z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:rgb(240,67,54);stroke-width:1.8;stroke-miterlimit:10' d='M9 2.8C8.5 3.3 8.1 4 8.4 4.6 8.5 5 8.8 5.2 9.2 5.4c1.8 1 6.1 1.1 5.5-2C14.2 0.9 10.3 1.4 9 2.8z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:rgb(240,67,54);stroke-width:1.8;stroke-miterlimit:10' d='M16.6 6.1c-0.9 0.3-1.7 1.1-1.8 2.1 0 0.2 0 0.4 0.1 0.5C15 9 15.3 9.2 15.5 9.3c0.9 0.5 2 0.8 3.1 0.7 0.7 0 1.3-0.2 1.8-0.6C20.9 9 21.2 8.3 21 7.6 20.4 6 18.1 5.7 16.6 6.1z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:rgb(240,67,54);stroke-width:1.8;stroke-miterlimit:10' d='M17.9 11.2c-0.8-0.3-1.8-0.4-2.6-0.1 -0.8 0.3-1.5 1.2-1.3 2.1 0.1 0.8 0.8 1.3 1.4 1.7 0.8 0.6 1.7 1 2.7 1 1 0 2-0.7 2.1-1.7C20.4 12.6 19.4 11.8 17.9 11.2z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:rgb(240,67,54);stroke-width:1.8;stroke-miterlimit:10' d='M10.9 15.4c-0.6 0-1.3 0.3-1.7 0.8 -1.4 2.1 2.2 3.6 3.7 3.5 1.9-0.1 2.5-2 1.2-3.3C13.4 15.6 12 15.3 10.9 15.4z'/%3E%3C/svg%3E\")";
        }

        echo pawfriends_mikado_dynamic_svg( $selector, $styles );
    }

    add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_contact_form7_button_svg_hover_styles_2' );
}

if ( ! function_exists( 'pawfriends_mikado_contact_form7_text_styles_3' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 elements
	 */
	function pawfriends_mikado_contact_form7_text_styles_3() {
		$selector = array(
			'.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-text',
			'.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-number',
			'.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-date',
			'.cf7_custom_style_3 textarea.wpcf7-form-control.wpcf7-textarea',
			'.cf7_custom_style_3 select.wpcf7-form-control.wpcf7-select',
			'.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-quiz'
		);
		
		$styles = pawfriends_mikado_get_typography_styles( 'cf7_style_3_text' );
		
		$background_color   = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_background_color' );
		$background_opacity = 1;
		if ( ! empty( $background_color ) ) {
			$background_transparency = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_background_transparency' );
			
			if ( $background_transparency !== '' ) {
				$background_opacity = $background_transparency;
			}
			
			$styles['background-color'] = pawfriends_mikado_rgba_color( $background_color, $background_opacity );
		}
		
		$border_color   = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_border_color' );
		$border_opacity = 1;
		if ( $border_color !== '' ) {
			$border_transparency = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_border_transparency' );
			
			if ( $border_transparency !== '' ) {
				$border_opacity = $border_transparency;
			}
			
			$styles['border-color'] = pawfriends_mikado_rgba_color( $border_color, $border_opacity );
		}
		
		$border_width = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_border_width' );
		if ( $border_width !== '' ) {
			$styles['border-width'] = pawfriends_mikado_filter_px( $border_width ) . 'px';
		}
		
		$border_radius = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_border_radius' );
		if ( $border_radius !== '' ) {
			$styles['border-radius'] = pawfriends_mikado_filter_px( $border_radius ) . 'px';
		}
		
		$padding_top = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_padding_top' );
		if ( $padding_top !== '' ) {
			$styles['padding-top'] = pawfriends_mikado_filter_px( $padding_top ) . 'px';
		}
		
		$padding_right = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_padding_right' );
		if ( $padding_right !== '' ) {
			$styles['padding-right'] = pawfriends_mikado_filter_px( $padding_right ) . 'px';
		}
		
		$padding_bottom = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_padding_bottom' );
		if ( $padding_bottom !== '' ) {
			$styles['padding-bottom'] = pawfriends_mikado_filter_px( $padding_bottom ) . 'px';
		}
		
		$padding_left = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_padding_left' );
		if ( $padding_left !== '' ) {
			$styles['padding-left'] = pawfriends_mikado_filter_px( $padding_left ) . 'px';
		}
		
		$margin_top = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_margin_top' );
		if ( $margin_top !== '' ) {
			$styles['margin-top'] = pawfriends_mikado_filter_px( $margin_top ) . 'px';
		}
		
		$margin_bottom = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_margin_bottom' );
		if ( $margin_bottom !== '' ) {
			$styles['margin-bottom'] = pawfriends_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$textarea_height = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_textarea_height' );
		if ( ! empty( $textarea_height ) ) {
			echo pawfriends_mikado_dynamic_css( '.cf7_custom_style_3 textarea.wpcf7-form-control.wpcf7-textarea',
				array( 'height' => pawfriends_mikado_filter_px( $textarea_height ) . 'px' )
			);
		}
		
		echo pawfriends_mikado_dynamic_css( $selector, $styles );
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_contact_form7_text_styles_3' );
}

if ( ! function_exists( 'pawfriends_mikado_contact_form7_placeholder_styles_3' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 elements placeholder
	 */
	function pawfriends_mikado_contact_form7_placeholder_styles_3() {
		$selector = array(
			'.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-text::placeholder',
			'.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-number::placeholder',
			'.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-date::placeholder',
			'.cf7_custom_style_3 textarea.wpcf7-form-control.wpcf7-textarea::placeholder',
			'.cf7_custom_style_3 select.wpcf7-form-control.wpcf7-select::placeholder',
			'.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-quiz::placeholder'
		);
		$styles   = array();

		$placeholder = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_placeholder_text_color' );
		if ( ! empty( $placeholder ) ) {
			$styles['color'] = $placeholder;
		}


		echo pawfriends_mikado_dynamic_css( $selector, $styles );
	}

	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_contact_form7_placeholder_styles_3' );
}

if ( ! function_exists( 'pawfriends_mikado_contact_form7_focus_styles_3' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 elements focus
	 */
	function pawfriends_mikado_contact_form7_focus_styles_3() {
		$selector = array(
			'.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-text:focus',
			'.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-number:focus',
			'.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-date:focus',
			'.cf7_custom_style_3 textarea.wpcf7-form-control.wpcf7-textarea:focus',
			'.cf7_custom_style_3 select.wpcf7-form-control.wpcf7-select:focus',
			'.cf7_custom_style_3 input.wpcf7-form-control.wpcf7-quiz:focus'
		);
		$styles   = array();
		
		$color = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_focus_text_color' );
		if ( ! empty( $color ) ) {
			$styles['color'] = $color;
		}
		
		$background_color   = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_focus_background_color' );
		$background_opacity = 1;
		if ( ! empty( $background_color ) ) {
			$background_transparency = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_focus_background_transparency' );
			
			if ( $background_transparency !== '' ) {
				$background_opacity = $background_transparency;
			}
			
			$styles['background-color'] = pawfriends_mikado_rgba_color( $background_color, $background_opacity );
		}
		
		$border_color   = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_focus_border_color' );
		$border_opacity = 1;
		if ( ! empty( $border_color ) ) {
			$border_transparency = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_focus_border_transparency' );
			
			if ( $border_transparency !== '' ) {
				$border_opacity = $border_transparency;
			}
			
			$styles['border-color'] = pawfriends_mikado_rgba_color( $border_color, $border_opacity );
		}
		
		echo pawfriends_mikado_dynamic_css( $selector, $styles );
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_contact_form7_focus_styles_3' );
}

if ( ! function_exists( 'pawfriends_mikado_contact_form7_label_styles_3' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 label
	 */
	function pawfriends_mikado_contact_form7_label_styles_3() {
		$item_styles = pawfriends_mikado_get_typography_styles( 'cf7_style_3_label' );
		
		$item_selector = array(
			'.cf7_custom_style_3 p'
		);
		
		echo pawfriends_mikado_dynamic_css( $item_selector, $item_styles );
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_contact_form7_label_styles_3' );
}

if ( ! function_exists( 'pawfriends_mikado_contact_form7_button_styles_3' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 button
	 */
	function pawfriends_mikado_contact_form7_button_styles_3() {
		$selector = array(
			'.cf7_custom_style_3 button.wpcf7-form-control.wpcf7-submit',
            '.cf7_custom_style_3 button.wpcf7-form-control.wpcf7-submit.mkdf-btn.mkdf-btn-solid',
            '.cf7_custom_style_3 button.wpcf7-form-control.wpcf7-submit.mkdf-btn.mkdf-btn-simple'
		);
		
		$styles = pawfriends_mikado_get_typography_styles( 'cf7_style_3_button' );
		
		$height = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_button_height' );
		if ( $height !== '' ) {
			$styles['padding-top']    = '0';
			$styles['padding-bottom'] = '0';
			$styles['height']         = pawfriends_mikado_filter_px( $height ) . 'px';
			$styles['line-height']    = pawfriends_mikado_filter_px( $height ) . 'px';
		}
		
		$background_color   = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_button_background_color' );
		$background_opacity = 1;
		if ( ! empty( $background_color ) ) {
			$background_transparency = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_button_background_transparency' );
			
			if ( $background_transparency !== '' ) {
				$background_opacity = $background_transparency;
			}
			
			$styles['background-color'] = pawfriends_mikado_rgba_color( $background_color, $background_opacity );
		}
		
		$border_color   = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_button_border_color' );
		$border_opacity = 1;
		if ( ! empty( $border_color ) ) {
			$border_transparency = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_button_border_transparency' );
			
			if ( $border_transparency !== '' ) {
				$border_opacity = $border_transparency;
			}
			
			$styles['border-color'] = pawfriends_mikado_rgba_color( $border_color, $border_opacity );
		}
		
		$border_width = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_button_border_width' );
		if ( $border_width !== '' ) {
			$styles['border-width'] = pawfriends_mikado_filter_px( $border_width ) . 'px';
		}
		
		$border_radius = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_button_border_radius' );
		if ( $border_radius !== '' ) {
			$styles['border-radius'] = pawfriends_mikado_filter_px( $border_radius ) . 'px';
		}
		
		$padding_left_right = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_button_padding' );
		if ( $padding_left_right !== '' ) {
			$styles['padding-left']  = pawfriends_mikado_filter_px( $padding_left_right ) . 'px';
			$styles['padding-right'] = pawfriends_mikado_filter_px( $padding_left_right ) . 'px';
		}
		
		echo pawfriends_mikado_dynamic_css( $selector, $styles );
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_contact_form7_button_styles_3' );
}

if ( ! function_exists( 'pawfriends_mikado_contact_form7_button_hover_styles_3' ) ) {
	/**
	 * Generates custom styles for Contact Form 7 button
	 */
	function pawfriends_mikado_contact_form7_button_hover_styles_3() {
		$selector = array(
			'.cf7_custom_style_3 button.wpcf7-form-control.wpcf7-submit:not([disabled]):hover',
            '.cf7_custom_style_3 button.wpcf7-form-control.wpcf7-submit.mkdf-btn.mkdf-btn-solid:hover',
            '.cf7_custom_style_3 button.wpcf7-form-control.wpcf7-submit.mkdf-btn.mkdf-btn-simple:hover'
		);
		$styles   = array();
		
		$color = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_button_hover_color' );
		if ( ! empty( $color ) ) {
			$styles['color'] = $color;
		}
		
		$background_color   = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_button_hover_bckg_color' );
		$background_opacity = 1;
		if ( ! empty( $background_color ) ) {
			$background_transparency = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_button_hover_bckg_transparency' );
			
			if ( $background_transparency !== '' ) {
				$background_opacity = $background_transparency;
			}
			
			$styles['background-color'] = pawfriends_mikado_rgba_color( $background_color, $background_opacity );
		}
		
		$border_color   = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_button_hover_border_color' );
		$border_opacity = 1;
		if ( ! empty( $border_color ) ) {
			$border_transparency = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_button_border_transparency' );
			
			if ( $border_transparency !== '' ) {
				$border_opacity = $border_transparency;
			}
			
			$styles['border-color'] = pawfriends_mikado_rgba_color( $border_color, $border_opacity );
		}
		
		echo pawfriends_mikado_dynamic_css( $selector, $styles );
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_contact_form7_button_hover_styles_3' );
}

if ( ! function_exists( 'pawfriends_mikado_contact_form7_button_svg_styles_3' ) ) {

    function pawfriends_mikado_contact_form7_button_svg_styles_3() {

        $selector = array(
            '.mkdf-paws .cf7_custom_style_3 button.wpcf7-form-control.wpcf7-submit.mkdf-btn.mkdf-btn-simple:after'
        );

        $styles = array();

        $color = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_button_color' );

        if ( ! empty( $color ) ) {
            $color = ltrim($color, '#');

            $styles['background-image'] = "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='19' height='19' viewBox='0 0 22 21' class='mkdf-paw'%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($color).";stroke-width:1.8;stroke-miterlimit:10' d='M4.8 4.3c1 0.4 1.7 1.1 2.6 1.7 1.1 0.7 2.3 1.2 3.3 2 1 0.8 1.7 2.3 1 3.4 -0.2 0.4-0.5 0.7-0.9 1 -1.2 1.1-2.4 2.2-3.6 3.3C6 16.9 4 17.8 2.6 16.2c-1.1-1.2-0.4-3.1 0.1-4.3 0.3-0.8 0.5-1.8 0-2.5C2.4 9.2 2.2 9 1.9 8.8 -0.2 6.9 2.1 3.2 4.8 4.3z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($color).";stroke-width:1.8;stroke-miterlimit:10' d='M9 2.8C8.5 3.3 8.1 4 8.4 4.6 8.5 5 8.8 5.2 9.2 5.4c1.8 1 6.1 1.1 5.5-2C14.2 0.9 10.3 1.4 9 2.8z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($color).";stroke-width:1.8;stroke-miterlimit:10' d='M16.6 6.1c-0.9 0.3-1.7 1.1-1.8 2.1 0 0.2 0 0.4 0.1 0.5C15 9 15.3 9.2 15.5 9.3c0.9 0.5 2 0.8 3.1 0.7 0.7 0 1.3-0.2 1.8-0.6C20.9 9 21.2 8.3 21 7.6 20.4 6 18.1 5.7 16.6 6.1z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($color).";stroke-width:1.8;stroke-miterlimit:10' d='M17.9 11.2c-0.8-0.3-1.8-0.4-2.6-0.1 -0.8 0.3-1.5 1.2-1.3 2.1 0.1 0.8 0.8 1.3 1.4 1.7 0.8 0.6 1.7 1 2.7 1 1 0 2-0.7 2.1-1.7C20.4 12.6 19.4 11.8 17.9 11.2z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($color).";stroke-width:1.8;stroke-miterlimit:10' d='M10.9 15.4c-0.6 0-1.3 0.3-1.7 0.8 -1.4 2.1 2.2 3.6 3.7 3.5 1.9-0.1 2.5-2 1.2-3.3C13.4 15.6 12 15.3 10.9 15.4z'/%3E%3C/svg%3E\")";
        } else {
            $styles['background-image'] = "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='19' height='19' viewBox='0 0 22 21' class='mkdf-paw'%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23FFFFFF;stroke-width:1.8;stroke-miterlimit:10' d='M4.8 4.3c1 0.4 1.7 1.1 2.6 1.7 1.1 0.7 2.3 1.2 3.3 2 1 0.8 1.7 2.3 1 3.4 -0.2 0.4-0.5 0.7-0.9 1 -1.2 1.1-2.4 2.2-3.6 3.3C6 16.9 4 17.8 2.6 16.2c-1.1-1.2-0.4-3.1 0.1-4.3 0.3-0.8 0.5-1.8 0-2.5C2.4 9.2 2.2 9 1.9 8.8 -0.2 6.9 2.1 3.2 4.8 4.3z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23FFFFFF;stroke-width:1.8;stroke-miterlimit:10' d='M9 2.8C8.5 3.3 8.1 4 8.4 4.6 8.5 5 8.8 5.2 9.2 5.4c1.8 1 6.1 1.1 5.5-2C14.2 0.9 10.3 1.4 9 2.8z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23FFFFFF;stroke-width:1.8;stroke-miterlimit:10' d='M16.6 6.1c-0.9 0.3-1.7 1.1-1.8 2.1 0 0.2 0 0.4 0.1 0.5C15 9 15.3 9.2 15.5 9.3c0.9 0.5 2 0.8 3.1 0.7 0.7 0 1.3-0.2 1.8-0.6C20.9 9 21.2 8.3 21 7.6 20.4 6 18.1 5.7 16.6 6.1z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23FFFFFF;stroke-width:1.8;stroke-miterlimit:10' d='M17.9 11.2c-0.8-0.3-1.8-0.4-2.6-0.1 -0.8 0.3-1.5 1.2-1.3 2.1 0.1 0.8 0.8 1.3 1.4 1.7 0.8 0.6 1.7 1 2.7 1 1 0 2-0.7 2.1-1.7C20.4 12.6 19.4 11.8 17.9 11.2z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23FFFFFF;stroke-width:1.8;stroke-miterlimit:10' d='M10.9 15.4c-0.6 0-1.3 0.3-1.7 0.8 -1.4 2.1 2.2 3.6 3.7 3.5 1.9-0.1 2.5-2 1.2-3.3C13.4 15.6 12 15.3 10.9 15.4z'/%3E%3C/svg%3E\")";
        }

        echo pawfriends_mikado_dynamic_svg( $selector, $styles );
    }

    add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_contact_form7_button_svg_styles_3' );
}

if ( ! function_exists( 'pawfriends_mikado_contact_form7_button_svg_hover_styles_3' ) ) {

    function pawfriends_mikado_contact_form7_button_svg_hover_styles_3() {

        $selector = array(
            '.mkdf-paws .cf7_custom_style_3 button.wpcf7-form-control.wpcf7-submit.mkdf-btn.mkdf-btn-simple:hover:after'
        );

        $styles = array();

        $hover_color = pawfriends_mikado_options()->getOptionValue( 'cf7_style_3_button_hover_color' );

        if ( ! empty( $hover_color ) ) {
            $hover_color = ltrim($hover_color, '#');

            $styles['background-image'] = "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='19' height='19' viewBox='0 0 22 21' class='mkdf-paw'%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($hover_color).";stroke-width:1.8;stroke-miterlimit:10' d='M4.8 4.3c1 0.4 1.7 1.1 2.6 1.7 1.1 0.7 2.3 1.2 3.3 2 1 0.8 1.7 2.3 1 3.4 -0.2 0.4-0.5 0.7-0.9 1 -1.2 1.1-2.4 2.2-3.6 3.3C6 16.9 4 17.8 2.6 16.2c-1.1-1.2-0.4-3.1 0.1-4.3 0.3-0.8 0.5-1.8 0-2.5C2.4 9.2 2.2 9 1.9 8.8 -0.2 6.9 2.1 3.2 4.8 4.3z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($hover_color).";stroke-width:1.8;stroke-miterlimit:10' d='M9 2.8C8.5 3.3 8.1 4 8.4 4.6 8.5 5 8.8 5.2 9.2 5.4c1.8 1 6.1 1.1 5.5-2C14.2 0.9 10.3 1.4 9 2.8z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($hover_color).";stroke-width:1.8;stroke-miterlimit:10' d='M16.6 6.1c-0.9 0.3-1.7 1.1-1.8 2.1 0 0.2 0 0.4 0.1 0.5C15 9 15.3 9.2 15.5 9.3c0.9 0.5 2 0.8 3.1 0.7 0.7 0 1.3-0.2 1.8-0.6C20.9 9 21.2 8.3 21 7.6 20.4 6 18.1 5.7 16.6 6.1z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($hover_color).";stroke-width:1.8;stroke-miterlimit:10' d='M17.9 11.2c-0.8-0.3-1.8-0.4-2.6-0.1 -0.8 0.3-1.5 1.2-1.3 2.1 0.1 0.8 0.8 1.3 1.4 1.7 0.8 0.6 1.7 1 2.7 1 1 0 2-0.7 2.1-1.7C20.4 12.6 19.4 11.8 17.9 11.2z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23".esc_attr($hover_color).";stroke-width:1.8;stroke-miterlimit:10' d='M10.9 15.4c-0.6 0-1.3 0.3-1.7 0.8 -1.4 2.1 2.2 3.6 3.7 3.5 1.9-0.1 2.5-2 1.2-3.3C13.4 15.6 12 15.3 10.9 15.4z'/%3E%3C/svg%3E\")";
        }  else {
            $styles['background-image'] = "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='19' height='19' viewBox='0 0 22 21' class='mkdf-paw'%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:rgb(240,67,54);stroke-width:1.8;stroke-miterlimit:10' d='M4.8 4.3c1 0.4 1.7 1.1 2.6 1.7 1.1 0.7 2.3 1.2 3.3 2 1 0.8 1.7 2.3 1 3.4 -0.2 0.4-0.5 0.7-0.9 1 -1.2 1.1-2.4 2.2-3.6 3.3C6 16.9 4 17.8 2.6 16.2c-1.1-1.2-0.4-3.1 0.1-4.3 0.3-0.8 0.5-1.8 0-2.5C2.4 9.2 2.2 9 1.9 8.8 -0.2 6.9 2.1 3.2 4.8 4.3z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:rgb(240,67,54);stroke-width:1.8;stroke-miterlimit:10' d='M9 2.8C8.5 3.3 8.1 4 8.4 4.6 8.5 5 8.8 5.2 9.2 5.4c1.8 1 6.1 1.1 5.5-2C14.2 0.9 10.3 1.4 9 2.8z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:rgb(240,67,54);stroke-width:1.8;stroke-miterlimit:10' d='M16.6 6.1c-0.9 0.3-1.7 1.1-1.8 2.1 0 0.2 0 0.4 0.1 0.5C15 9 15.3 9.2 15.5 9.3c0.9 0.5 2 0.8 3.1 0.7 0.7 0 1.3-0.2 1.8-0.6C20.9 9 21.2 8.3 21 7.6 20.4 6 18.1 5.7 16.6 6.1z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:rgb(240,67,54);stroke-width:1.8;stroke-miterlimit:10' d='M17.9 11.2c-0.8-0.3-1.8-0.4-2.6-0.1 -0.8 0.3-1.5 1.2-1.3 2.1 0.1 0.8 0.8 1.3 1.4 1.7 0.8 0.6 1.7 1 2.7 1 1 0 2-0.7 2.1-1.7C20.4 12.6 19.4 11.8 17.9 11.2z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:rgb(240,67,54);stroke-width:1.8;stroke-miterlimit:10' d='M10.9 15.4c-0.6 0-1.3 0.3-1.7 0.8 -1.4 2.1 2.2 3.6 3.7 3.5 1.9-0.1 2.5-2 1.2-3.3C13.4 15.6 12 15.3 10.9 15.4z'/%3E%3C/svg%3E\")";
        }

        echo pawfriends_mikado_dynamic_svg( $selector, $styles );
    }

    add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_contact_form7_button_svg_hover_styles_3' );
}

