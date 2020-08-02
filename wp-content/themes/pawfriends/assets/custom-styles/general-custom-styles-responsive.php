<?php

if ( ! function_exists( 'pawfriends_mikado_content_responsive_styles' ) ) {
	/**
	 * Generates content responsive custom styles
	 */
	function pawfriends_mikado_content_responsive_styles() {
		$content_style = array();
		
		$padding_mobile = pawfriends_mikado_options()->getOptionValue( 'content_padding_mobile' );
		if ( $padding_mobile !== '' ) {
			$content_style['padding'] = $padding_mobile;
		}
		
		$content_selector = array(
			'.mkdf-content .mkdf-content-inner > .mkdf-container > .mkdf-container-inner',
			'.mkdf-content .mkdf-content-inner > .mkdf-full-width > .mkdf-full-width-inner',
		);
		
		echo pawfriends_mikado_dynamic_css( $content_selector, $content_style );
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic_responsive_1024', 'pawfriends_mikado_content_responsive_styles' );
}

if ( ! function_exists( 'pawfriends_mikado_h1_responsive_styles3' ) ) {
	function pawfriends_mikado_h1_responsive_styles3() {
		$selector = array(
			'h1'
		);
		
		$styles = pawfriends_mikado_get_responsive_typography_styles( 'h1_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo pawfriends_mikado_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic_responsive_768_1024', 'pawfriends_mikado_h1_responsive_styles3' );
}

if ( ! function_exists( 'pawfriends_mikado_h2_responsive_styles3' ) ) {
	function pawfriends_mikado_h2_responsive_styles3() {
		$selector = array(
			'h2'
		);
		
		$styles = pawfriends_mikado_get_responsive_typography_styles( 'h2_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo pawfriends_mikado_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic_responsive_768_1024', 'pawfriends_mikado_h2_responsive_styles3' );
}

if ( ! function_exists( 'pawfriends_mikado_h3_responsive_styles3' ) ) {
	function pawfriends_mikado_h3_responsive_styles3() {
		$selector = array(
			'h3',
            '.mkdf-title-holder h3.mkdf-page-title'
		);
		
		$styles = pawfriends_mikado_get_responsive_typography_styles( 'h3_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo pawfriends_mikado_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic_responsive_768_1024', 'pawfriends_mikado_h3_responsive_styles3' );
}

if ( ! function_exists( 'pawfriends_mikado_h4_responsive_styles3' ) ) {
	function pawfriends_mikado_h4_responsive_styles3() {
		$selector = array(
			'h4'
		);
		
		$styles = pawfriends_mikado_get_responsive_typography_styles( 'h4_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo pawfriends_mikado_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic_responsive_768_1024', 'pawfriends_mikado_h4_responsive_styles3' );
}

if ( ! function_exists( 'pawfriends_mikado_h5_responsive_styles3' ) ) {
	function pawfriends_mikado_h5_responsive_styles3() {
		$selector = array(
			'h5'
		);
		
		$styles = pawfriends_mikado_get_responsive_typography_styles( 'h5_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo pawfriends_mikado_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic_responsive_768_1024', 'pawfriends_mikado_h5_responsive_styles3' );
}

if ( ! function_exists( 'pawfriends_mikado_h6_responsive_styles3' ) ) {
	function pawfriends_mikado_h6_responsive_styles3() {
		$selector = array(
			'h6'
		);
		
		$styles = pawfriends_mikado_get_responsive_typography_styles( 'h6_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo pawfriends_mikado_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic_responsive_768_1024', 'pawfriends_mikado_h6_responsive_styles3' );
}

if ( ! function_exists( 'pawfriends_mikado_h1_responsive_styles' ) ) {
	function pawfriends_mikado_h1_responsive_styles() {
		$selector = array(
			'h1'
		);
		
		$styles = pawfriends_mikado_get_responsive_typography_styles( 'h1_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo pawfriends_mikado_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic_responsive_680_768', 'pawfriends_mikado_h1_responsive_styles' );
}

if ( ! function_exists( 'pawfriends_mikado_h2_responsive_styles' ) ) {
	function pawfriends_mikado_h2_responsive_styles() {
		$selector = array(
			'h2'
		);
		
		$styles = pawfriends_mikado_get_responsive_typography_styles( 'h2_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo pawfriends_mikado_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic_responsive_680_768', 'pawfriends_mikado_h2_responsive_styles' );
}

if ( ! function_exists( 'pawfriends_mikado_h3_responsive_styles' ) ) {
	function pawfriends_mikado_h3_responsive_styles() {
		$selector = array(
			'h3',
            '.mkdf-title-holder h3.mkdf-page-title'
		);
		
		$styles = pawfriends_mikado_get_responsive_typography_styles( 'h3_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo pawfriends_mikado_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic_responsive_680_768', 'pawfriends_mikado_h3_responsive_styles' );
}

if ( ! function_exists( 'pawfriends_mikado_h4_responsive_styles' ) ) {
	function pawfriends_mikado_h4_responsive_styles() {
		$selector = array(
			'h4'
		);
		
		$styles = pawfriends_mikado_get_responsive_typography_styles( 'h4_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo pawfriends_mikado_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic_responsive_680_768', 'pawfriends_mikado_h4_responsive_styles' );
}

if ( ! function_exists( 'pawfriends_mikado_h5_responsive_styles' ) ) {
	function pawfriends_mikado_h5_responsive_styles() {
		$selector = array(
			'h5'
		);
		
		$styles = pawfriends_mikado_get_responsive_typography_styles( 'h5_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo pawfriends_mikado_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic_responsive_680_768', 'pawfriends_mikado_h5_responsive_styles' );
}

if ( ! function_exists( 'pawfriends_mikado_h6_responsive_styles' ) ) {
	function pawfriends_mikado_h6_responsive_styles() {
		$selector = array(
			'h6'
		);
		
		$styles = pawfriends_mikado_get_responsive_typography_styles( 'h6_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo pawfriends_mikado_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic_responsive_680_768', 'pawfriends_mikado_h6_responsive_styles' );
}

if ( ! function_exists( 'pawfriends_mikado_text_responsive_styles' ) ) {
	function pawfriends_mikado_text_responsive_styles() {
		$selector = array(
			'body',
			'p'
		);
		
		$styles = pawfriends_mikado_get_responsive_typography_styles( 'text', '_res1' );
		
		if ( ! empty( $styles ) ) {
			echo pawfriends_mikado_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic_responsive_680_768', 'pawfriends_mikado_text_responsive_styles' );
}

if ( ! function_exists( 'pawfriends_mikado_h1_responsive_styles2' ) ) {
	function pawfriends_mikado_h1_responsive_styles2() {
		$selector = array(
			'h1'
		);
		
		$styles = pawfriends_mikado_get_responsive_typography_styles( 'h1_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo pawfriends_mikado_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic_responsive_680', 'pawfriends_mikado_h1_responsive_styles2' );
}

if ( ! function_exists( 'pawfriends_mikado_h2_responsive_styles2' ) ) {
	function pawfriends_mikado_h2_responsive_styles2() {
		$selector = array(
			'h2'
		);
		
		$styles = pawfriends_mikado_get_responsive_typography_styles( 'h2_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo pawfriends_mikado_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic_responsive_680', 'pawfriends_mikado_h2_responsive_styles2' );
}

if ( ! function_exists( 'pawfriends_mikado_h3_responsive_styles2' ) ) {
	function pawfriends_mikado_h3_responsive_styles2() {
		$selector = array(
			'h3',
            '.mkdf-title-holder h3.mkdf-page-title'
		);
		
		$styles = pawfriends_mikado_get_responsive_typography_styles( 'h3_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo pawfriends_mikado_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic_responsive_680', 'pawfriends_mikado_h3_responsive_styles2' );
}

if ( ! function_exists( 'pawfriends_mikado_h4_responsive_styles2' ) ) {
	function pawfriends_mikado_h4_responsive_styles2() {
		$selector = array(
			'h4'
		);
		
		$styles = pawfriends_mikado_get_responsive_typography_styles( 'h4_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo pawfriends_mikado_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic_responsive_680', 'pawfriends_mikado_h4_responsive_styles2' );
}

if ( ! function_exists( 'pawfriends_mikado_h5_responsive_styles2' ) ) {
	function pawfriends_mikado_h5_responsive_styles2() {
		$selector = array(
			'h5'
		);
		
		$styles = pawfriends_mikado_get_responsive_typography_styles( 'h5_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo pawfriends_mikado_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic_responsive_680', 'pawfriends_mikado_h5_responsive_styles2' );
}

if ( ! function_exists( 'pawfriends_mikado_h6_responsive_styles2' ) ) {
	function pawfriends_mikado_h6_responsive_styles2() {
		$selector = array(
			'h6'
		);
		
		$styles = pawfriends_mikado_get_responsive_typography_styles( 'h6_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo pawfriends_mikado_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic_responsive_680', 'pawfriends_mikado_h6_responsive_styles2' );
}

if ( ! function_exists( 'pawfriends_mikado_text_responsive_styles2' ) ) {
	function pawfriends_mikado_text_responsive_styles2() {
		$selector = array(
			'body',
			'p'
		);
		
		$styles = pawfriends_mikado_get_responsive_typography_styles( 'text', '_res2' );
		
		if ( ! empty( $styles ) ) {
			echo pawfriends_mikado_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic_responsive_680', 'pawfriends_mikado_text_responsive_styles2' );
}