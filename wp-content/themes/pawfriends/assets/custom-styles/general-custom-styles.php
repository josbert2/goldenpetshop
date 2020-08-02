<?php

if ( ! function_exists( 'pawfriends_mikado_design_styles' ) ) {
	/**
	 * Generates general custom styles
	 */
	function pawfriends_mikado_design_styles() {
		$font_family = pawfriends_mikado_options()->getOptionValue( 'google_fonts' );
		if ( ! empty( $font_family ) && pawfriends_mikado_is_font_option_valid( $font_family ) ) {
			$font_family_selector = array(
				'body'
			);
			echo pawfriends_mikado_dynamic_css( $font_family_selector, array( 'font-family' => pawfriends_mikado_get_font_option_val( $font_family ) ) );
		}
		
		$first_main_color = pawfriends_mikado_options()->getOptionValue( 'first_color' );
		if ( ! empty( $first_main_color ) ) {
			$color_selector = $color_important_selector = $background_color_selector = $background_color_important_selector = $border_color_selector = $border_color_important_selector = $fill_color_selector = $fill_color_important_selector = $stroke_color_selector = $stroke_color_important_selector = array();

			// Include first main color selectors
			include_once 'parts/first-main-color.php';

			if ( pawfriends_mikado_is_plugin_installed( 'woocommerce' ) ) {
				$woo_color_selector = $woo_color_important_selector = $woo_background_color_selector = $woo_background_color_important_selector = $woo_border_color_selector = $woo_border_color_important_selector = $woo_fill_color_selector = $woo_fill_color_important_selector = $woo_stroke_color_selector = $woo_stroke_color_important_selector = array();

				// Include first main color WooCommerce selectors
				include_once 'parts/woocommerce-first-main-color.php';

				if ( isset( $woo_color_selector ) && ! empty( $woo_color_selector ) ) {
					$color_selector = array_merge( $color_selector, $woo_color_selector );
				}

				if ( isset( $woo_color_important_selector ) && ! empty( $woo_color_important_selector ) ) {
					$color_important_selector = array_merge( $color_important_selector, $woo_color_important_selector );
				}

				if ( isset( $woo_background_color_selector ) && ! empty( $woo_background_color_selector ) ) {
					$background_color_selector = array_merge( $background_color_selector, $woo_background_color_selector );
				}

				if ( isset( $woo_background_color_important_selector ) && ! empty( $woo_background_color_important_selector ) ) {
					$background_color_important_selector = array_merge( $background_color_important_selector, $woo_background_color_important_selector );
				}

				if ( isset( $woo_border_color_selector ) && ! empty( $woo_border_color_selector ) ) {
					$border_color_selector = array_merge( $border_color_selector, $woo_border_color_selector );
				}

				if ( isset( $woo_border_color_important_selector ) && ! empty( $woo_border_color_important_selector ) ) {
					$border_color_important_selector = array_merge( $border_color_important_selector, $woo_border_color_important_selector );
				}

				if ( isset( $woo_fill_color_selector ) && ! empty( $woo_fill_color_selector ) ) {
					$fill_color_selector = array_merge( $fill_color_selector, $woo_fill_color_selector );
				}

				if ( isset( $woo_fill_color_important_selector ) && ! empty( $woo_fill_color_important_selector ) ) {
					$fill_color_important_selector = array_merge( $fill_color_important_selector, $woo_fill_color_important_selector );
				}

				if ( isset( $woo_stroke_color_selector ) && ! empty( $woo_stroke_color_selector ) ) {
					$stroke_color_selector = array_merge( $stroke_color_selector, $woo_stroke_color_selector );
				}

				if ( isset( $woo_stroke_color_important_selector ) && ! empty( $woo_stroke_color_important_selector ) ) {
					$stroke_color_important_selector = array_merge( $stroke_color_important_selector, $woo_stroke_color_important_selector );
				}
			}

			if ( isset( $color_selector ) && ! empty( $color_selector ) ) {
				echo pawfriends_mikado_dynamic_css( $color_selector, array( 'color' => $first_main_color ) );
			}

			if ( isset( $color_important_selector ) && ! empty( $color_important_selector ) ) {
				echo pawfriends_mikado_dynamic_css( $color_important_selector, array( 'color' => $first_main_color . '!important' ) );
			}

			if ( isset( $background_color_selector ) && ! empty( $background_color_selector ) ) {
				echo pawfriends_mikado_dynamic_css( $background_color_selector, array( 'background-color' => $first_main_color ) );
			}

			if ( isset( $background_color_important_selector ) && ! empty( $background_color_important_selector ) ) {
				echo pawfriends_mikado_dynamic_css( $background_color_important_selector, array( 'background-color' => $first_main_color . '!important' ) );
			}

			if ( isset( $border_color_selector ) && ! empty( $border_color_selector ) ) {
				echo pawfriends_mikado_dynamic_css( $border_color_selector, array( 'border-color' => $first_main_color ) );
			}

			if ( isset( $border_color_important_selector ) && ! empty( $border_color_important_selector ) ) {
				echo pawfriends_mikado_dynamic_css( $border_color_important_selector, array( 'border-color' => $first_main_color . '!important' ) );
			}

			if ( isset( $fill_color_selector ) && ! empty( $fill_color_selector ) ) {
				echo pawfriends_mikado_dynamic_css( $fill_color_selector, array( 'fill' => $first_main_color ) );
			}

			if ( isset( $fill_color_important_selector ) && ! empty( $fill_color_important_selector ) ) {
				echo pawfriends_mikado_dynamic_css( $fill_color_important_selector, array( 'fill' => $first_main_color . '!important' ) );
			}

			if ( isset( $stroke_color_selector ) && ! empty( $stroke_color_selector ) ) {
				echo pawfriends_mikado_dynamic_css( $stroke_color_selector, array( 'stroke' => $first_main_color ) );
			}

			if ( isset( $stroke_color_important_selector ) && ! empty( $stroke_color_important_selector ) ) {
				echo pawfriends_mikado_dynamic_css( $stroke_color_important_selector, array( 'stroke' => $first_main_color . '!important' ) );
			}
		}
		
		$page_background_color = pawfriends_mikado_options()->getOptionValue( 'page_background_color' );
		if ( ! empty( $page_background_color ) ) {
			$background_color_selector = array(
				'body',
				'.mkdf-content'
			);
			echo pawfriends_mikado_dynamic_css( $background_color_selector, array( 'background-color' => $page_background_color ) );
		}
		
		$page_background_image  = pawfriends_mikado_options()->getOptionValue( 'page_background_image' );
		$page_background_repeat = pawfriends_mikado_options()->getOptionValue( 'page_background_image_repeat' );
		
		if ( ! empty( $page_background_image ) ) {
			
			if ( $page_background_repeat === 'yes' ) {
				$background_image_style = array(
					'background-image'    => 'url(' . esc_url( $page_background_image ) . ')',
					'background-repeat'   => 'repeat',
					'background-position' => '0 0',
				);
			} else {
				$background_image_style = array(
					'background-image'    => 'url(' . esc_url( $page_background_image ) . ')',
					'background-repeat'   => 'no-repeat',
					'background-position' => 'center 0',
					'background-size'     => 'cover'
				);
			}
			
			echo pawfriends_mikado_dynamic_css( '.mkdf-content', $background_image_style );
		}
		
		$selection_color = pawfriends_mikado_options()->getOptionValue( 'selection_color' );
		if ( ! empty( $selection_color ) ) {
			echo pawfriends_mikado_dynamic_css( '::selection', array( 'background' => $selection_color ) );
			echo pawfriends_mikado_dynamic_css( '::-moz-selection', array( 'background' => $selection_color ) );
		}
		
		$preload_background_styles = array();
		
		if ( pawfriends_mikado_options()->getOptionValue( 'preload_pattern_image' ) !== "" ) {
			$preload_background_styles['background-image'] = 'url(' . pawfriends_mikado_options()->getOptionValue( 'preload_pattern_image' ) . ') !important';
		}
		
		echo pawfriends_mikado_dynamic_css( '.mkdf-preload-background', $preload_background_styles );
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_design_styles' );
}

if ( ! function_exists( 'pawfriends_mikado_content_styles' ) ) {
	function pawfriends_mikado_content_styles() {
		$content_style = array();
		
		$padding = pawfriends_mikado_options()->getOptionValue( 'content_padding' );
		if ( $padding !== '' ) {
			$content_style['padding'] = $padding;
		}
		
		$content_selector = array(
			'.mkdf-content .mkdf-content-inner > .mkdf-full-width > .mkdf-full-width-inner',
		);
		
		echo pawfriends_mikado_dynamic_css( $content_selector, $content_style );
		
		$content_style_in_grid = array();
		
		$padding_in_grid = pawfriends_mikado_options()->getOptionValue( 'content_padding_in_grid' );
		if ( $padding_in_grid !== '' ) {
			$content_style_in_grid['padding'] = $padding_in_grid;
		}
		
		$content_selector_in_grid = array(
			'.mkdf-content .mkdf-content-inner > .mkdf-container > .mkdf-container-inner',
		);
		
		echo pawfriends_mikado_dynamic_css( $content_selector_in_grid, $content_style_in_grid );
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_content_styles' );
}

if ( ! function_exists( 'pawfriends_mikado_h1_styles' ) ) {
	function pawfriends_mikado_h1_styles() {
		$margin_top    = pawfriends_mikado_options()->getOptionValue( 'h1_margin_top' );
		$margin_bottom = pawfriends_mikado_options()->getOptionValue( 'h1_margin_bottom' );
		
		$item_styles = pawfriends_mikado_get_typography_styles( 'h1' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = pawfriends_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = pawfriends_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h1'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo pawfriends_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_h1_styles' );
}

if ( ! function_exists( 'pawfriends_mikado_h2_styles' ) ) {
	function pawfriends_mikado_h2_styles() {
		$margin_top    = pawfriends_mikado_options()->getOptionValue( 'h2_margin_top' );
		$margin_bottom = pawfriends_mikado_options()->getOptionValue( 'h2_margin_bottom' );
		
		$item_styles = pawfriends_mikado_get_typography_styles( 'h2' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = pawfriends_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = pawfriends_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h2',
			'.mkdf-blog-holder article .mkdf-post-title'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo pawfriends_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_h2_styles' );
}

if ( ! function_exists( 'pawfriends_mikado_h3_styles' ) ) {
	function pawfriends_mikado_h3_styles() {
		$margin_top    = pawfriends_mikado_options()->getOptionValue( 'h3_margin_top' );
		$margin_bottom = pawfriends_mikado_options()->getOptionValue( 'h3_margin_bottom' );
		
		$item_styles = pawfriends_mikado_get_typography_styles( 'h3' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = pawfriends_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = pawfriends_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h3'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo pawfriends_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_h3_styles' );
}

if ( ! function_exists( 'pawfriends_mikado_h4_styles' ) ) {
	function pawfriends_mikado_h4_styles() {
		$margin_top    = pawfriends_mikado_options()->getOptionValue( 'h4_margin_top' );
		$margin_bottom = pawfriends_mikado_options()->getOptionValue( 'h4_margin_bottom' );
		
		$item_styles = pawfriends_mikado_get_typography_styles( 'h4' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = pawfriends_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = pawfriends_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h4',
            '.mkdf-author-description .mkdf-author-name',
            '.mkdf-comment-holder .mkdf-comment-text .mkdf-comment-name',
            '.mkdf-blog-holder.mkdf-blog-masonry article.format-quote .mkdf-post-heading .mkdf-post-quote-holder .mkdf-post-quote-holder-inner .mkdf-post-title',
            '.mkdf-blog-holder.mkdf-blog-masonry article.format-link .mkdf-post-heading .mkdf-post-quote-holder .mkdf-post-quote-holder-inner .mkdf-post-title'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo pawfriends_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_h4_styles' );
}

if ( ! function_exists( 'pawfriends_mikado_h5_styles' ) ) {
	function pawfriends_mikado_h5_styles() {
		$margin_top    = pawfriends_mikado_options()->getOptionValue( 'h5_margin_top' );
		$margin_bottom = pawfriends_mikado_options()->getOptionValue( 'h5_margin_bottom' );
		
		$item_styles = pawfriends_mikado_get_typography_styles( 'h5' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = pawfriends_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = pawfriends_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h5',
            '.mkdf-blog-holder.mkdf-blog-masonry article .mkdf-post-title'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo pawfriends_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_h5_styles' );
}

if ( ! function_exists( 'pawfriends_mikado_h6_styles' ) ) {
	function pawfriends_mikado_h6_styles() {
		$margin_top    = pawfriends_mikado_options()->getOptionValue( 'h6_margin_top' );
		$margin_bottom = pawfriends_mikado_options()->getOptionValue( 'h6_margin_bottom' );
		
		$item_styles = pawfriends_mikado_get_typography_styles( 'h6' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = pawfriends_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = pawfriends_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h6'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo pawfriends_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_h6_styles' );
}

if ( ! function_exists( 'pawfriends_mikado_text_styles' ) ) {
	function pawfriends_mikado_text_styles() {
		$margin_top    = pawfriends_mikado_options()->getOptionValue( 'text_margin_top' );
		$margin_bottom = pawfriends_mikado_options()->getOptionValue( 'text_margin_bottom' );
		
		$item_styles = pawfriends_mikado_get_typography_styles( 'text' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = pawfriends_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = pawfriends_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'p'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo pawfriends_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_text_styles' );
}

if ( ! function_exists( 'pawfriends_mikado_link_styles' ) ) {
	function pawfriends_mikado_link_styles() {
		$link_styles      = array();
		$link_color       = pawfriends_mikado_options()->getOptionValue( 'link_color' );
		$link_font_style  = pawfriends_mikado_options()->getOptionValue( 'link_fontstyle' );
		$link_font_weight = pawfriends_mikado_options()->getOptionValue( 'link_fontweight' );
		$link_decoration  = pawfriends_mikado_options()->getOptionValue( 'link_fontdecoration' );
		
		if ( ! empty( $link_color ) ) {
			$link_styles['color'] = $link_color;
		}
		if ( ! empty( $link_font_style ) ) {
			$link_styles['font-style'] = $link_font_style;
		}
		if ( ! empty( $link_font_weight ) ) {
			$link_styles['font-weight'] = $link_font_weight;
		}
		if ( ! empty( $link_decoration ) ) {
			$link_styles['text-decoration'] = $link_decoration;
		}
		
		$link_selector = array(
			'a',
			'p a'
		);
		
		if ( ! empty( $link_styles ) ) {
			echo pawfriends_mikado_dynamic_css( $link_selector, $link_styles );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_link_styles' );
}

if ( ! function_exists( 'pawfriends_mikado_link_hover_styles' ) ) {
	function pawfriends_mikado_link_hover_styles() {
		$link_hover_styles     = array();
		$link_hover_color      = pawfriends_mikado_options()->getOptionValue( 'link_hovercolor' );
		$link_hover_decoration = pawfriends_mikado_options()->getOptionValue( 'link_hover_fontdecoration' );
		
		if ( ! empty( $link_hover_color ) ) {
			$link_hover_styles['color'] = $link_hover_color;
		}
		if ( ! empty( $link_hover_decoration ) ) {
			$link_hover_styles['text-decoration'] = $link_hover_decoration;
		}
		
		$link_hover_selector = array(
			'a:hover',
			'p a:hover'
		);
		
		if ( ! empty( $link_hover_styles ) ) {
			echo pawfriends_mikado_dynamic_css( $link_hover_selector, $link_hover_styles );
		}
		
		$link_heading_hover_styles = array();
		
		if ( ! empty( $link_hover_color ) ) {
			$link_heading_hover_styles['color'] = $link_hover_color;
		}
		
		$link_heading_hover_selector = array(
			'h1 a:hover',
			'h2 a:hover',
			'h3 a:hover',
			'h4 a:hover',
			'h5 a:hover',
			'h6 a:hover'
		);
		
		if ( ! empty( $link_heading_hover_styles ) ) {
			echo pawfriends_mikado_dynamic_css( $link_heading_hover_selector, $link_heading_hover_styles );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_link_hover_styles' );
}

if ( ! function_exists( 'pawfriends_mikado_smooth_page_transition_styles' ) ) {
	function pawfriends_mikado_smooth_page_transition_styles( $style ) {
		$id            = pawfriends_mikado_get_page_id();
		$loader_style  = array();
		$current_style = '';
		
		$background_color = pawfriends_mikado_get_meta_field_intersect( 'smooth_pt_bgnd_color', $id );
		if ( ! empty( $background_color ) ) {
			$loader_style['background-color'] = $background_color;
		}
		
		$loader_selector = array(
			'.mkdf-smooth-transition-loader'
		);
		
		if ( ! empty( $loader_style ) ) {
			$current_style .= pawfriends_mikado_dynamic_css( $loader_selector, $loader_style );
		}
		
		$spinner_style = array();
		$spinner_color = pawfriends_mikado_get_meta_field_intersect( 'smooth_pt_spinner_color', $id );
		if ( ! empty( $spinner_color ) ) {
			$spinner_style['background-color'] = $spinner_color;
		}
		
		$spinner_selectors = array(
			'.mkdf-st-loader .mkdf-rotate-circles > div',
			'.mkdf-st-loader .pulse',
			'.mkdf-st-loader .double_pulse .double-bounce1',
			'.mkdf-st-loader .double_pulse .double-bounce2',
			'.mkdf-st-loader .cube',
			'.mkdf-st-loader .rotating_cubes .cube1',
			'.mkdf-st-loader .rotating_cubes .cube2',
			'.mkdf-st-loader .stripes > div',
			'.mkdf-st-loader .wave > div',
			'.mkdf-st-loader .two_rotating_circles .dot1',
			'.mkdf-st-loader .two_rotating_circles .dot2',
			'.mkdf-st-loader .five_rotating_circles .container1 > div',
			'.mkdf-st-loader .five_rotating_circles .container2 > div',
			'.mkdf-st-loader .five_rotating_circles .container3 > div',
			'.mkdf-st-loader .atom .ball-1:before',
			'.mkdf-st-loader .atom .ball-2:before',
			'.mkdf-st-loader .atom .ball-3:before',
			'.mkdf-st-loader .atom .ball-4:before',
			'.mkdf-st-loader .clock .ball:before',
			'.mkdf-st-loader .mitosis .ball',
			'.mkdf-st-loader .lines .line1',
			'.mkdf-st-loader .lines .line2',
			'.mkdf-st-loader .lines .line3',
			'.mkdf-st-loader .lines .line4',
			'.mkdf-st-loader .fussion .ball',
			'.mkdf-st-loader .fussion .ball-1',
			'.mkdf-st-loader .fussion .ball-2',
			'.mkdf-st-loader .fussion .ball-3',
			'.mkdf-st-loader .fussion .ball-4',
			'.mkdf-st-loader .wave_circles .ball',
			'.mkdf-st-loader .pulse_circles .ball'
		);
		
		if ( ! empty( $spinner_style ) ) {
			$current_style .= pawfriends_mikado_dynamic_css( $spinner_selectors, $spinner_style );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'pawfriends_mikado_filter_add_page_custom_style', 'pawfriends_mikado_smooth_page_transition_styles' );
}

if ( ! function_exists( 'pawfriends_mikado_decorative_paw_styles' ) ) {
    function pawfriends_mikado_decorative_paw_styles() {
        $decorative_paws = pawfriends_mikado_options()->getOptionValue( 'decorative_paw_background' );
        $item_styles = array();
        $color = pawfriends_mikado_options()->getOptionValue( 'first_color' );

        if ( $decorative_paws === 'yes' ) {

            $item_styles['visibility'] = 'visible';

            if (!empty($color)) {
                $color = ltrim($color, '#');

                $item_styles['content'] = "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='19' height='19' viewBox='0 0 22 21' class='mkdf-paw'%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23" . esc_attr($color) . ";stroke-width:1.8;stroke-miterlimit:10' d='M4.8 4.3c1 0.4 1.7 1.1 2.6 1.7 1.1 0.7 2.3 1.2 3.3 2 1 0.8 1.7 2.3 1 3.4 -0.2 0.4-0.5 0.7-0.9 1 -1.2 1.1-2.4 2.2-3.6 3.3C6 16.9 4 17.8 2.6 16.2c-1.1-1.2-0.4-3.1 0.1-4.3 0.3-0.8 0.5-1.8 0-2.5C2.4 9.2 2.2 9 1.9 8.8 -0.2 6.9 2.1 3.2 4.8 4.3z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23" . esc_attr($color) . ";stroke-width:1.8;stroke-miterlimit:10' d='M9 2.8C8.5 3.3 8.1 4 8.4 4.6 8.5 5 8.8 5.2 9.2 5.4c1.8 1 6.1 1.1 5.5-2C14.2 0.9 10.3 1.4 9 2.8z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23" . esc_attr($color) . ";stroke-width:1.8;stroke-miterlimit:10' d='M16.6 6.1c-0.9 0.3-1.7 1.1-1.8 2.1 0 0.2 0 0.4 0.1 0.5C15 9 15.3 9.2 15.5 9.3c0.9 0.5 2 0.8 3.1 0.7 0.7 0 1.3-0.2 1.8-0.6C20.9 9 21.2 8.3 21 7.6 20.4 6 18.1 5.7 16.6 6.1z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23" . esc_attr($color) . ";stroke-width:1.8;stroke-miterlimit:10' d='M17.9 11.2c-0.8-0.3-1.8-0.4-2.6-0.1 -0.8 0.3-1.5 1.2-1.3 2.1 0.1 0.8 0.8 1.3 1.4 1.7 0.8 0.6 1.7 1 2.7 1 1 0 2-0.7 2.1-1.7C20.4 12.6 19.4 11.8 17.9 11.2z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23" . esc_attr($color) . ";stroke-width:1.8;stroke-miterlimit:10' d='M10.9 15.4c-0.6 0-1.3 0.3-1.7 0.8 -1.4 2.1 2.2 3.6 3.7 3.5 1.9-0.1 2.5-2 1.2-3.3C13.4 15.6 12 15.3 10.9 15.4z'/%3E%3C/svg%3E\") !important";
            } else {
                $item_styles['content'] = "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='19' height='19' viewBox='0 0 22 21' class='mkdf-paw'%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23f04336;stroke-width:1.8;stroke-miterlimit:10' d='M4.8 4.3c1 0.4 1.7 1.1 2.6 1.7 1.1 0.7 2.3 1.2 3.3 2 1 0.8 1.7 2.3 1 3.4 -0.2 0.4-0.5 0.7-0.9 1 -1.2 1.1-2.4 2.2-3.6 3.3C6 16.9 4 17.8 2.6 16.2c-1.1-1.2-0.4-3.1 0.1-4.3 0.3-0.8 0.5-1.8 0-2.5C2.4 9.2 2.2 9 1.9 8.8 -0.2 6.9 2.1 3.2 4.8 4.3z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23f04336;stroke-width:1.8;stroke-miterlimit:10' d='M9 2.8C8.5 3.3 8.1 4 8.4 4.6 8.5 5 8.8 5.2 9.2 5.4c1.8 1 6.1 1.1 5.5-2C14.2 0.9 10.3 1.4 9 2.8z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23f04336;stroke-width:1.8;stroke-miterlimit:10' d='M16.6 6.1c-0.9 0.3-1.7 1.1-1.8 2.1 0 0.2 0 0.4 0.1 0.5C15 9 15.3 9.2 15.5 9.3c0.9 0.5 2 0.8 3.1 0.7 0.7 0 1.3-0.2 1.8-0.6C20.9 9 21.2 8.3 21 7.6 20.4 6 18.1 5.7 16.6 6.1z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23f04336;stroke-width:1.8;stroke-miterlimit:10' d='M17.9 11.2c-0.8-0.3-1.8-0.4-2.6-0.1 -0.8 0.3-1.5 1.2-1.3 2.1 0.1 0.8 0.8 1.3 1.4 1.7 0.8 0.6 1.7 1 2.7 1 1 0 2-0.7 2.1-1.7C20.4 12.6 19.4 11.8 17.9 11.2z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23f04336;stroke-width:1.8;stroke-miterlimit:10' d='M10.9 15.4c-0.6 0-1.3 0.3-1.7 0.8 -1.4 2.1 2.2 3.6 3.7 3.5 1.9-0.1 2.5-2 1.2-3.3C13.4 15.6 12 15.3 10.9 15.4z'/%3E%3C/svg%3E\") !important";
            }
        }

        $item_selector = array(
            '.widget.woocommerce.widget_shopping_cart div p a.button:after',
            '#yith-quick-view-modal.open #yith-quick-view-content .summary .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a:after',
            '#yith-quick-view-modal.open #yith-quick-view-content .summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:after',
            '#yith-quick-view-modal.open #yith-quick-view-content .summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:after',
            '.yith-quick-view.yith-modal #yith-quick-view-content .summary .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a:after',
            '.yith-quick-view.yith-modal #yith-quick-view-content .summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:after',
            '.yith-quick-view.yith-modal #yith-quick-view-content .summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:after',
            '.mkdf-single-product-summary .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a:after',
            '.mkdf-single-product-summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:after',
            '.mkdf-single-product-summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:after',
            '.widget.woocommerce.widget_price_filter .price_slider_amount .button:after',
            '.mkdf-woo-pl-info-on-image-hover .mkdf-pl-main-holder ul.products>.product .mkdf-pl-text-inner a.button.add_to_cart_button:after',
            '.mkdf-woo-pl-info-on-image-hover .mkdf-pl-main-holder ul.products>.product .mkdf-pl-text-inner a.button.product_type_grouped:after',
            '.mkdf-woo-pl-info-on-image-hover .mkdf-pl-main-holder ul.products>.product .mkdf-pl-text-inner a.button.product_type_simple:after',
            '.mkdf-woo-pl-info-on-image-hover .mkdf-pl-main-holder ul.products>.product .mkdf-pl-text-inner a.product_type_external:after',
            '.mkdf-pl-holder.mkdf-info-on-image .mkdf-pli a.button.add_to_cart_button:after',
            '.mkdf-pl-holder.mkdf-info-on-image .mkdf-pli a.button.product_type_grouped:after',
            '.mkdf-pl-holder.mkdf-info-on-image .mkdf-pli a.button.product_type_simple:after',
            '.mkdf-pl-holder.mkdf-info-on-image .mkdf-pli a.mkdf-out-of-stock:after',
            '.mkdf-pl-holder.mkdf-info-on-image .mkdf-pli a.product_type_external:after',
        );

        if ( ! empty( $item_styles ) ) {
            echo pawfriends_mikado_dynamic_svg( $item_selector, $item_styles );
        }
    }

    add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_decorative_paw_styles' );
}

if ( ! function_exists( 'pawfriends_mikado_woo_filter_handle_style' ) ) {
    function pawfriends_mikado_woo_filter_handle_style() {
        $item_styles = array();
        $color = pawfriends_mikado_options()->getOptionValue( 'first_color' );

        $item_selector = array(
            '.widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-handle',
        );

        if (!empty($color)) {
            $color = ltrim($color, '#');
            $item_styles['background-image'] = "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 14 13' width='14' height='13'%3E%3Cpath style='fill:%23" . esc_attr($color) . ";f04336' d='M1 6.3c0 0-0.2-5.3 5.4-5.3S13 4.6 13 6.1s-1.2 5.7-5.9 5.8S1.2 8.2 1 6.3z'/%3E%3C/svg%3E\")";
            echo pawfriends_mikado_dynamic_svg( $item_selector, $item_styles );
        }
    }

    add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_woo_filter_handle_style' );
}

if ( ! function_exists( 'pawfriends_mikado_woo_filter_handle_style_2' ) ) {
    function pawfriends_mikado_woo_filter_handle_style_2() {
        $item_styles = array();
        $color = pawfriends_mikado_options()->getOptionValue( 'first_color' );

        $item_selector = array(
            '.widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-handle:last-child',
        );

        if (!empty($color)) {
            $color = ltrim($color, '#');
            $item_styles['background-image'] = "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 18' width='20' height='18'%3E%3Cpath style='fill:%23" . esc_attr($color) . ";' d='M10.3 6.5c2.1 0.3 2.9-1.5 3-2.1 0.1-0.6 0-2.4-2.6-2.7C8.3 1.3 8 3.6 8 3.6 8 4.4 8.2 6.2 10.3 6.5z'/%3E%3Cpath style='fill:%23" . esc_attr($color) . ";' d='M17.2 6.6c-2.5-0.4-2.8 1.9-2.8 1.9 0 0.2 0 0.5 0.1 0.8C13.6 7.9 12 6.5 8.5 6.5c-5.7 0.1-5.4 5.3-5.4 5.3 0.2 1.9 1.4 5.8 6.1 5.7 4.7-0.1 5.9-4.3 5.9-5.8 0-0.3-0.1-0.8-0.2-1.3 0.3 0.5 0.9 0.9 1.8 1 2.1 0.3 2.9-1.5 3-2.1C19.8 8.6 19.7 6.9 17.2 6.6z'/%3E%3Cpath style='fill:%23" . esc_attr($color) . ";' d='M4.6 3.7c-0.5-0.4-2-1.2-3.7 0.7s0.2 3.4 0.2 3.4c0.7 0.5 2.3 1.2 3.7-0.4C6.2 5.8 5.1 4.2 4.6 3.7z'/%3E%3C/svg%3E\")";
            echo pawfriends_mikado_dynamic_svg( $item_selector, $item_styles );
        }
    }

    add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_woo_filter_handle_style_2' );
}

if ( ! function_exists( 'pawfriends_mikado_decorative_paw_styles_dark_skin' ) ) {
    function pawfriends_mikado_decorative_paw_styles_dark_skin() {
        $decorative_paws = pawfriends_mikado_options()->getOptionValue( 'decorative_paw_background' );
        $item_styles = array();

        if ( $decorative_paws === 'yes' ) {
            $item_styles['content'] = "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='19' height='19' viewBox='0 0 22 21' class='mkdf-paw'%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23424242;stroke-width:1.8;stroke-miterlimit:10' d='M4.8 4.3c1 0.4 1.7 1.1 2.6 1.7 1.1 0.7 2.3 1.2 3.3 2 1 0.8 1.7 2.3 1 3.4 -0.2 0.4-0.5 0.7-0.9 1 -1.2 1.1-2.4 2.2-3.6 3.3C6 16.9 4 17.8 2.6 16.2c-1.1-1.2-0.4-3.1 0.1-4.3 0.3-0.8 0.5-1.8 0-2.5C2.4 9.2 2.2 9 1.9 8.8 -0.2 6.9 2.1 3.2 4.8 4.3z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23424242;stroke-width:1.8;stroke-miterlimit:10' d='M9 2.8C8.5 3.3 8.1 4 8.4 4.6 8.5 5 8.8 5.2 9.2 5.4c1.8 1 6.1 1.1 5.5-2C14.2 0.9 10.3 1.4 9 2.8z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23424242;stroke-width:1.8;stroke-miterlimit:10' d='M16.6 6.1c-0.9 0.3-1.7 1.1-1.8 2.1 0 0.2 0 0.4 0.1 0.5C15 9 15.3 9.2 15.5 9.3c0.9 0.5 2 0.8 3.1 0.7 0.7 0 1.3-0.2 1.8-0.6C20.9 9 21.2 8.3 21 7.6 20.4 6 18.1 5.7 16.6 6.1z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23424242;stroke-width:1.8;stroke-miterlimit:10' d='M17.9 11.2c-0.8-0.3-1.8-0.4-2.6-0.1 -0.8 0.3-1.5 1.2-1.3 2.1 0.1 0.8 0.8 1.3 1.4 1.7 0.8 0.6 1.7 1 2.7 1 1 0 2-0.7 2.1-1.7C20.4 12.6 19.4 11.8 17.9 11.2z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23424242;stroke-width:1.8;stroke-miterlimit:10' d='M10.9 15.4c-0.6 0-1.3 0.3-1.7 0.8 -1.4 2.1 2.2 3.6 3.7 3.5 1.9-0.1 2.5-2 1.2-3.3C13.4 15.6 12 15.3 10.9 15.4z'/%3E%3C/svg%3E\") !important";
        }

        $item_selector = array(
            '.mkdf-pl-holder.mkdf-info-on-image.mkdf-product-info-dark .mkdf-pli a.button.add_to_cart_button:after',
            '.mkdf-pl-holder.mkdf-info-on-image.mkdf-product-info-dark .mkdf-pli a.button.product_type_grouped:after',
            '.mkdf-pl-holder.mkdf-info-on-image.mkdf-product-info-dark .mkdf-pli a.button.product_type_simple:after',
            '.mkdf-pl-holder.mkdf-info-on-image.mkdf-product-info-dark .mkdf-pli a.mkdf-out-of-stock:after',
            '.mkdf-pl-holder.mkdf-info-on-image.mkdf-product-info-dark .mkdf-pli a.product_type_external:after',
        );

        if ( ! empty( $item_styles ) ) {
            echo pawfriends_mikado_dynamic_svg( $item_selector, $item_styles );
        }
    }

    add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_decorative_paw_styles_dark_skin' );
}

if ( ! function_exists( 'pawfriends_mikado_decorative_paw_styles_light_skin' ) ) {
    function pawfriends_mikado_decorative_paw_styles_light_skin() {
        $decorative_paws = pawfriends_mikado_options()->getOptionValue( 'decorative_paw_background' );
        $item_styles = array();

        if ( $decorative_paws === 'yes' ) {
            $item_styles['content'] = "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='19' height='19' viewBox='0 0 22 21' class='mkdf-paw'%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23ffffff;stroke-width:1.8;stroke-miterlimit:10' d='M4.8 4.3c1 0.4 1.7 1.1 2.6 1.7 1.1 0.7 2.3 1.2 3.3 2 1 0.8 1.7 2.3 1 3.4 -0.2 0.4-0.5 0.7-0.9 1 -1.2 1.1-2.4 2.2-3.6 3.3C6 16.9 4 17.8 2.6 16.2c-1.1-1.2-0.4-3.1 0.1-4.3 0.3-0.8 0.5-1.8 0-2.5C2.4 9.2 2.2 9 1.9 8.8 -0.2 6.9 2.1 3.2 4.8 4.3z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23ffffff;stroke-width:1.8;stroke-miterlimit:10' d='M9 2.8C8.5 3.3 8.1 4 8.4 4.6 8.5 5 8.8 5.2 9.2 5.4c1.8 1 6.1 1.1 5.5-2C14.2 0.9 10.3 1.4 9 2.8z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23ffffff;stroke-width:1.8;stroke-miterlimit:10' d='M16.6 6.1c-0.9 0.3-1.7 1.1-1.8 2.1 0 0.2 0 0.4 0.1 0.5C15 9 15.3 9.2 15.5 9.3c0.9 0.5 2 0.8 3.1 0.7 0.7 0 1.3-0.2 1.8-0.6C20.9 9 21.2 8.3 21 7.6 20.4 6 18.1 5.7 16.6 6.1z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23ffffff;stroke-width:1.8;stroke-miterlimit:10' d='M17.9 11.2c-0.8-0.3-1.8-0.4-2.6-0.1 -0.8 0.3-1.5 1.2-1.3 2.1 0.1 0.8 0.8 1.3 1.4 1.7 0.8 0.6 1.7 1 2.7 1 1 0 2-0.7 2.1-1.7C20.4 12.6 19.4 11.8 17.9 11.2z'/%3E%3Cpath class='mkdf-paw' style='fill:none;stroke:%23ffffff;stroke-width:1.8;stroke-miterlimit:10' d='M10.9 15.4c-0.6 0-1.3 0.3-1.7 0.8 -1.4 2.1 2.2 3.6 3.7 3.5 1.9-0.1 2.5-2 1.2-3.3C13.4 15.6 12 15.3 10.9 15.4z'/%3E%3C/svg%3E\") !important";
        }

        $item_selector = array(
            '.mkdf-pl-holder.mkdf-info-on-image.mkdf-product-info-light .mkdf-pli a.button.add_to_cart_button:after',
            '.mkdf-pl-holder.mkdf-info-on-image.mkdf-product-info-light .mkdf-pli a.button.product_type_grouped:after',
            '.mkdf-pl-holder.mkdf-info-on-image.mkdf-product-info-light .mkdf-pli a.button.product_type_simple:after',
            '.mkdf-pl-holder.mkdf-info-on-image.mkdf-product-info-light .mkdf-pli a.mkdf-out-of-stock:after',
            '.mkdf-pl-holder.mkdf-info-on-image.mkdf-product-info-light .mkdf-pli a.product_type_external:after',
        );

        if ( ! empty( $item_styles ) ) {
            echo pawfriends_mikado_dynamic_svg( $item_selector, $item_styles );
        }
    }

    add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_decorative_paw_styles_light_skin' );
}

if ( ! function_exists( 'pawfriends_mikado_remove_decorative_paws' ) ) {
    function pawfriends_mikado_remove_decorative_paws() {
        $decorative_paws = pawfriends_mikado_options()->getOptionValue( 'decorative_paw_background' );
        $item_styles = array();

        if ( $decorative_paws === 'no' ) {
            $item_styles['background-image'] = 'none';
        }

        $item_selector = array(
           '.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .added_to_cart',
           '.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .button:not(.yith-wcqv-button)',
        );

        if ( ! empty( $item_styles ) ) {
            echo pawfriends_mikado_dynamic_css( $item_selector, $item_styles );
        }
    }

    add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_remove_decorative_paws' );
}