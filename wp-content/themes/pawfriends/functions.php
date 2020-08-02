<?php
include_once get_template_directory() . '/theme-includes.php';

if ( ! function_exists( 'pawfriends_mikado_styles' ) ) {
	/**
	 * Function that includes theme's core styles
	 */
	function pawfriends_mikado_styles() {

        $modules_css_deps_array = apply_filters( 'pawfriends_mikado_filter_modules_css_deps', array() );
		
		//include theme's core styles
		wp_enqueue_style( 'pawfriends-mikado-default-style', MIKADO_ROOT . '/style.css' );
		wp_enqueue_style( 'pawfriends-mikado-modules', MIKADO_ASSETS_ROOT . '/css/modules.min.css', $modules_css_deps_array );
		
		pawfriends_mikado_icon_collections()->enqueueStyles();

		wp_enqueue_style( 'wp-mediaelement' );
		
		do_action( 'pawfriends_mikado_action_enqueue_third_party_styles' );
		
		//is woocommerce installed?
		if ( pawfriends_mikado_is_plugin_installed( 'woocommerce' ) && pawfriends_mikado_load_woo_assets() ) {
			//include theme's woocommerce styles
			wp_enqueue_style( 'pawfriends-mikado-woo', MIKADO_ASSETS_ROOT . '/css/woocommerce.min.css' );
		}
		
		if ( pawfriends_mikado_dashboard_page() || pawfriends_mikado_has_dashboard_shortcodes() ) {
			wp_enqueue_style( 'pawfriends-mikado-dashboard', MIKADO_FRAMEWORK_ADMIN_ASSETS_ROOT . '/css/mkdf-dashboard.css' );
		}
		
		//define files after which style dynamic needs to be included. It should be included last so it can override other files
        $style_dynamic_deps_array = apply_filters( 'pawfriends_mikado_filter_style_dynamic_deps', array() );

		if ( file_exists( MIKADO_ROOT_DIR . '/assets/css/style_dynamic.css' ) && pawfriends_mikado_is_css_folder_writable() && ! is_multisite() ) {
			wp_enqueue_style( 'pawfriends-mikado-style-dynamic', MIKADO_ASSETS_ROOT . '/css/style_dynamic.css', $style_dynamic_deps_array, filemtime( MIKADO_ROOT_DIR . '/assets/css/style_dynamic.css' ) ); //it must be included after woocommerce styles so it can override it
		} else if ( file_exists( MIKADO_ROOT_DIR . '/assets/css/style_dynamic_ms_id_' . pawfriends_mikado_get_multisite_blog_id() . '.css' ) && pawfriends_mikado_is_css_folder_writable() && is_multisite() ) {
			wp_enqueue_style( 'pawfriends-mikado-style-dynamic', MIKADO_ASSETS_ROOT . '/css/style_dynamic_ms_id_' . pawfriends_mikado_get_multisite_blog_id() . '.css', $style_dynamic_deps_array, filemtime( MIKADO_ROOT_DIR . '/assets/css/style_dynamic_ms_id_' . pawfriends_mikado_get_multisite_blog_id() . '.css' ) ); //it must be included after woocommerce styles so it can override it
		}
		
		//is responsive option turned on?
		if ( pawfriends_mikado_is_responsive_on() ) {
			wp_enqueue_style( 'pawfriends-mikado-modules-responsive', MIKADO_ASSETS_ROOT . '/css/modules-responsive.min.css' );
			
			//is woocommerce installed?
			if ( pawfriends_mikado_is_plugin_installed( 'woocommerce' ) && pawfriends_mikado_load_woo_assets() ) {
				//include theme's woocommerce responsive styles
				wp_enqueue_style( 'pawfriends-mikado-woo-responsive', MIKADO_ASSETS_ROOT . '/css/woocommerce-responsive.min.css' );
			}
			
			//include proper styles
			if ( file_exists( MIKADO_ROOT_DIR . '/assets/css/style_dynamic_responsive.css' ) && pawfriends_mikado_is_css_folder_writable() && ! is_multisite() ) {
				wp_enqueue_style( 'pawfriends-mikado-style-dynamic-responsive', MIKADO_ASSETS_ROOT . '/css/style_dynamic_responsive.css', array(), filemtime( MIKADO_ROOT_DIR . '/assets/css/style_dynamic_responsive.css' ) );
			} else if ( file_exists( MIKADO_ROOT_DIR . '/assets/css/style_dynamic_responsive_ms_id_' . pawfriends_mikado_get_multisite_blog_id() . '.css' ) && pawfriends_mikado_is_css_folder_writable() && is_multisite() ) {
				wp_enqueue_style( 'pawfriends-mikado-style-dynamic-responsive', MIKADO_ASSETS_ROOT . '/css/style_dynamic_responsive_ms_id_' . pawfriends_mikado_get_multisite_blog_id() . '.css', array(), filemtime( MIKADO_ROOT_DIR . '/assets/css/style_dynamic_responsive_ms_id_' . pawfriends_mikado_get_multisite_blog_id() . '.css' ) );
			}
		}
	}
	
	add_action( 'wp_enqueue_scripts', 'pawfriends_mikado_styles' );
}

if ( ! function_exists( 'pawfriends_mikado_google_fonts_styles' ) ) {
	/**
	 * Function that includes google fonts defined anywhere in the theme
	 */
	function pawfriends_mikado_google_fonts_styles() {
		$font_simple_field_array = pawfriends_mikado_options()->getOptionsByType( 'fontsimple' );
		if ( ! ( is_array( $font_simple_field_array ) && count( $font_simple_field_array ) > 0 ) ) {
			$font_simple_field_array = array();
		}
		
		$font_field_array = pawfriends_mikado_options()->getOptionsByType( 'font' );
		if ( ! ( is_array( $font_field_array ) && count( $font_field_array ) > 0 ) ) {
			$font_field_array = array();
		}
		
		$available_font_options = array_merge( $font_simple_field_array, $font_field_array );
		
		$google_font_weight_array = pawfriends_mikado_options()->getOptionValue( 'google_font_weight' );
		if ( ! empty( $google_font_weight_array ) ) {
			$google_font_weight_array = array_slice( pawfriends_mikado_options()->getOptionValue( 'google_font_weight' ), 1 );
		}
		
		$font_weight_str = '400,700,800,900';
		if ( ! empty( $google_font_weight_array ) && $google_font_weight_array !== '' ) {
			$font_weight_str = implode( ',', $google_font_weight_array );
		}
		
		$google_font_subset_array = pawfriends_mikado_options()->getOptionValue( 'google_font_subset' );
		if ( ! empty( $google_font_subset_array ) ) {
			$google_font_subset_array = array_slice( pawfriends_mikado_options()->getOptionValue( 'google_font_subset' ), 1 );
		}
		
		$font_subset_str = 'latin-ext';
		if ( ! empty( $google_font_subset_array ) && $google_font_subset_array !== '' ) {
			$font_subset_str = implode( ',', $google_font_subset_array );
		}
		
		//default fonts
		$default_font_family = array(
			'Nunito',
            'Amatic SC',
            'Open Sans',
		);
		
		$modified_default_font_family = array();
		foreach ( $default_font_family as $default_font ) {
			$modified_default_font_family[] = $default_font . ':' . str_replace( ' ', '', $font_weight_str );
		}
		
		$default_font_string = implode( '|', $modified_default_font_family );
		
		//define available font options array
		$fonts_array = array();
		foreach ( $available_font_options as $font_option ) {
			//is font set and not set to default and not empty?
			$font_option_value = pawfriends_mikado_options()->getOptionValue( $font_option );
			
			if ( pawfriends_mikado_is_font_option_valid( $font_option_value ) && ! pawfriends_mikado_is_native_font( $font_option_value ) ) {
				$font_option_string = $font_option_value . ':' . $font_weight_str;
				
				if ( ! in_array( str_replace( '+', ' ', $font_option_value ), $default_font_family ) && ! in_array( $font_option_string, $fonts_array ) ) {
					$fonts_array[] = $font_option_string;
				}
			}
		}

		$fonts_array         = array_diff( $fonts_array, array( '-1:' . $font_weight_str ) );
		$google_fonts_string = implode( '|', $fonts_array );
		
		$protocol = is_ssl() ? 'https:' : 'http:';
		
		//is google font option checked anywhere in theme?
		if ( count( $fonts_array ) > 0 ) {
			
			//include all checked fonts
			$fonts_full_list      = $default_font_string . '|' . str_replace( '+', ' ', $google_fonts_string );
			$fonts_full_list_args = array(
				'family' => urlencode( $fonts_full_list ),
				'subset' => urlencode( $font_subset_str ),
			);
			
			$pawfriends_mikado_global_fonts = add_query_arg( $fonts_full_list_args, $protocol . '//fonts.googleapis.com/css' );
			wp_enqueue_style( 'pawfriends-mikado-google-fonts', esc_url_raw( $pawfriends_mikado_global_fonts ), array(), '1.0.0' );
			
		} else {
			//include default google font that theme is using
			$default_fonts_args          = array(
				'family' => urlencode( $default_font_string ),
				'subset' => urlencode( $font_subset_str ),
			);
			$pawfriends_mikado_global_fonts = add_query_arg( $default_fonts_args, $protocol . '//fonts.googleapis.com/css' );
			wp_enqueue_style( 'pawfriends-mikado-google-fonts', esc_url_raw( $pawfriends_mikado_global_fonts ), array(), '1.0.0' );
		}
	}
	
	add_action( 'wp_enqueue_scripts', 'pawfriends_mikado_google_fonts_styles' );
}

if ( ! function_exists( 'pawfriends_mikado_scripts' ) ) {
	/**
	 * Function that includes all necessary scripts
	 */
	function pawfriends_mikado_scripts() {
		global $wp_scripts;
		
		//init theme core scripts
		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-ui-tabs' );
		wp_enqueue_script( 'wp-mediaelement' );
		
		// 3rd party JavaScripts that we used in our theme
		wp_enqueue_script( 'appear', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.appear.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'modernizr', MIKADO_ASSETS_ROOT . '/js/modules/plugins/modernizr.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'hoverIntent', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.hoverIntent.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'jquery-plugin', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.plugin.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'owl-carousel', MIKADO_ASSETS_ROOT . '/js/modules/plugins/owl.carousel.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'waypoints', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.waypoints.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'fluidvids', MIKADO_ASSETS_ROOT . '/js/modules/plugins/fluidvids.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'perfect-scrollbar', MIKADO_ASSETS_ROOT . '/js/modules/plugins/perfect-scrollbar.jquery.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'ScrollToPlugin', MIKADO_ASSETS_ROOT . '/js/modules/plugins/ScrollToPlugin.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'parallax', MIKADO_ASSETS_ROOT . '/js/modules/plugins/parallax.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'waitforimages', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.waitforimages.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'prettyphoto', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.prettyPhoto.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'jquery-easing', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.easing.1.3.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'isotope', MIKADO_ASSETS_ROOT . '/js/modules/plugins/isotope.pkgd.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'packery', MIKADO_ASSETS_ROOT . '/js/modules/plugins/packery-mode.pkgd.min.js', array( 'jquery' ), false, true );
		
		do_action( 'pawfriends_mikado_action_enqueue_third_party_scripts' );

		if ( pawfriends_mikado_is_plugin_installed( 'woocommerce' ) ) {
			wp_enqueue_script( 'select2' );
		}

		if ( pawfriends_mikado_is_page_smooth_scroll_enabled() ) {
			wp_enqueue_script( 'tweenLite', MIKADO_ASSETS_ROOT . '/js/modules/plugins/TweenLite.min.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'smoothPageScroll', MIKADO_ASSETS_ROOT . '/js/modules/plugins/smoothPageScroll.js', array( 'jquery' ), false, true );
		}

		//include google map api script
		$google_maps_api_key          = pawfriends_mikado_options()->getOptionValue( 'google_maps_api_key' );
		$google_maps_extensions       = '';
		$google_maps_extensions_array = apply_filters( 'pawfriends_mikado_filter_google_maps_extensions_array', array() );

		if ( ! empty( $google_maps_extensions_array ) ) {
			$google_maps_extensions .= '&libraries=';
			$google_maps_extensions .= implode( ',', $google_maps_extensions_array );
		}

		if ( ! empty( $google_maps_api_key ) ) {
			wp_enqueue_script( 'pawfriends-mikado-google-map-api', '//maps.googleapis.com/maps/api/js?key=' . esc_attr( $google_maps_api_key ) . $google_maps_extensions, array(), false, true );
            if ( ! empty( $google_maps_extensions_array ) && is_array( $google_maps_extensions_array ) ) {
                wp_enqueue_script('geocomplete', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.geocomplete.min.js', array('jquery', 'pawfriends-mikado-google-map-api'), false, true);
            }
		}

		wp_enqueue_script( 'pawfriends-mikado-modules', MIKADO_ASSETS_ROOT . '/js/modules.min.js', array( 'jquery' ), false, true );
		
		if ( pawfriends_mikado_dashboard_page() || pawfriends_mikado_has_dashboard_shortcodes() ) {
			$dash_array_deps = array(
				'jquery-ui-datepicker',
				'jquery-ui-sortable'
			);
			
			wp_enqueue_script( 'pawfriends-mikado-dashboard', MIKADO_FRAMEWORK_ADMIN_ASSETS_ROOT . '/js/mkdf-dashboard.js', $dash_array_deps, false, true );
			
			wp_enqueue_script( 'wp-util' );
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'iris', admin_url( 'js/iris.min.js' ), array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ), false, 1 );
			wp_enqueue_script( 'wp-color-picker', admin_url( 'js/color-picker.min.js' ), array( 'iris' ), false, 1 );
			
			$colorpicker_l10n = array(
				'clear'         => esc_html__( 'Clear', 'pawfriends' ),
				'defaultString' => esc_html__( 'Default', 'pawfriends' ),
				'pick'          => esc_html__( 'Select Color', 'pawfriends' ),
				'current'       => esc_html__( 'Current Color', 'pawfriends' ),
			);
			
			wp_localize_script( 'wp-color-picker', 'wpColorPickerL10n', $colorpicker_l10n );
		}

		//include comment reply script
		$wp_scripts->add_data( 'comment-reply', 'group', 1 );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

	add_action( 'wp_enqueue_scripts', 'pawfriends_mikado_scripts' );
}

if ( ! function_exists( 'pawfriends_mikado_theme_setup' ) ) {
	/**
	 * Function that adds various features to theme. Also defines image sizes that are used in a theme
	 */
	function pawfriends_mikado_theme_setup() {
		//add support for feed links
		add_theme_support( 'automatic-feed-links' );

		//add support for post formats
		add_theme_support( 'post-formats', array( 'gallery', 'link', 'quote', 'video', 'audio' ) );

		//add theme support for post thumbnails
		add_theme_support( 'post-thumbnails' );

		//add theme support for title tag
		add_theme_support( 'title-tag' );

        //add theme support for editor style
        add_editor_style( 'framework/admin/assets/css/editor-style.css' );

		//defined content width variable
		$GLOBALS['content_width'] = apply_filters( 'pawfriends_mikado_filter_set_content_width', 1100 );

		//define thumbnail sizes
		add_image_size( 'pawfriends_mikado_image_square', 650, 650, true );
		add_image_size( 'pawfriends_mikado_image_landscape', 1300, 650, true );
		add_image_size( 'pawfriends_mikado_image_portrait', 650, 1300, true );
		add_image_size( 'pawfriends_mikado_image_huge', 1300, 1300, true );

		load_theme_textdomain( 'pawfriends', get_template_directory() . '/languages' );
	}

	add_action( 'after_setup_theme', 'pawfriends_mikado_theme_setup' );
}

if ( ! function_exists( 'pawfriends_mikado_enqueue_editor_customizer_styles' ) ) {
	/**
	 * Enqueue supplemental block editor styles
	 */
	function pawfriends_mikado_enqueue_editor_customizer_styles() {
		wp_enqueue_style( 'themename-style-modules-admin-styles', MIKADO_FRAMEWORK_ADMIN_ASSETS_ROOT . '/css/mkdf-modules-admin.css' );
		wp_enqueue_style( 'pawfriends-mikado-editor-customizer-styles', MIKADO_FRAMEWORK_ADMIN_ASSETS_ROOT . '/css/editor-customizer-style.css' );
	}

	// add google font
	add_action( 'enqueue_block_editor_assets', 'pawfriends_mikado_google_fonts_styles' );
	// add action
	add_action( 'enqueue_block_editor_assets', 'pawfriends_mikado_enqueue_editor_customizer_styles' );
}

if ( ! function_exists( 'pawfriends_mikado_is_responsive_on' ) ) {
	/**
	 * Checks whether responsive mode is enabled in theme options
	 * @return bool
	 */
	function pawfriends_mikado_is_responsive_on() {
		return pawfriends_mikado_options()->getOptionValue( 'responsiveness' ) !== 'no';
	}
}

if ( ! function_exists( 'pawfriends_mikado_rgba_color' ) ) {
	/**
	 * Function that generates rgba part of css color property
	 *
	 * @param $color string hex color
	 * @param $transparency float transparency value between 0 and 1
	 *
	 * @return string generated rgba string
	 */
	function pawfriends_mikado_rgba_color( $color, $transparency ) {
		if ( $color !== '' && $transparency !== '' ) {
			$rgba_color = '';

			$rgb_color_array = pawfriends_mikado_hex2rgb( $color );
			$rgba_color      .= 'rgba(' . implode( ', ', $rgb_color_array ) . ', ' . $transparency . ')';

			return $rgba_color;
		}
	}
}

if ( ! function_exists( 'pawfriends_mikado_header_meta' ) ) {
	/**
	 * Function that echoes meta data if our seo is enabled
	 */
	function pawfriends_mikado_header_meta() { ?>

		<meta charset="<?php bloginfo( 'charset' ); ?>"/>
		<link rel="profile" href="http://gmpg.org/xfn/11"/>
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>

	<?php }

	add_action( 'pawfriends_mikado_action_header_meta', 'pawfriends_mikado_header_meta' );
}

if ( ! function_exists( 'pawfriends_mikado_user_scalable_meta' ) ) {
	/**
	 * Function that outputs user scalable meta if responsiveness is turned on
	 * Hooked to pawfriends_mikado_action_header_meta action
	 */
	function pawfriends_mikado_user_scalable_meta() {
		//is responsiveness option is chosen?
		if ( pawfriends_mikado_is_responsive_on() ) { ?>
			<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=yes">
		<?php } else { ?>
			<meta name="viewport" content="width=1200,user-scalable=yes">
		<?php }
	}

	add_action( 'pawfriends_mikado_action_header_meta', 'pawfriends_mikado_user_scalable_meta' );
}

if ( ! function_exists( 'pawfriends_mikado_smooth_page_transitions' ) ) {
	/**
	 * Function that outputs smooth page transitions html if smooth page transitions functionality is turned on
	 * Hooked to pawfriends_mikado_action_before_closing_body_tag action
	 */
	function pawfriends_mikado_smooth_page_transitions() {
		$id = pawfriends_mikado_get_page_id();

		if ( pawfriends_mikado_get_meta_field_intersect( 'smooth_page_transitions', $id ) === 'yes' && pawfriends_mikado_get_meta_field_intersect( 'page_transition_preloader', $id ) === 'yes' ) { ?>
			<div class="mkdf-smooth-transition-loader mkdf-mimic-ajax">
				<div class="mkdf-st-loader">
					<div class="mkdf-st-loader1">
						<?php pawfriends_mikado_loading_spinners(); ?>
					</div>
				</div>
			</div>
		<?php }
	}

	add_action( 'pawfriends_mikado_action_after_opening_tag', 'pawfriends_mikado_smooth_page_transitions', 10 );
}

if ( ! function_exists( 'pawfriends_mikado_back_to_top_button' ) ) {
	/**
	 * Function that outputs back to top button html if back to top functionality is turned on
	 * Hooked to pawfriends_mikado_action_after_wrapper_inner action
	 */
	function pawfriends_mikado_back_to_top_button() {
		if ( pawfriends_mikado_options()->getOptionValue( 'show_back_button' ) == 'yes' ) { ?>
			<a id='mkdf-back-to-top' href='#'>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 57 53" class="mkdf-back-to-top">
                    <path class="mkdf-back-to-top-circle" d="M4.5 36.5c0 0-3.2-6.7-3.4-12.1S1.5 13.3 6.8 9.1s12.2-7.5 16.1-8 14-0.9 21.8 5.5S55.9 19.1 56 23.2s-2.5 15.3-11.5 22.6 -10.6 6.6-21.3 6.1C17 51.7 7.6 43.4 4.5 36.5z"/>
                    <path class="mkdf-back-to-top-arrow" d="M24.3 27.3c0.2 0.5-0.4 0.7-2.3 0.2 -1.3-0.2-2.5-0.3-2.5-0.3 -1.6 0.5-0.7 1.4 2.2 2.9l2.7 0.9 0.6 3.4c0.4 4.6 1.7 8.4 3.3 9.6 1.4 0.7 4.1-0.2 4.6-2.2 1.6-2.3 0.1-6.6-2.7-9.8 -1.4-0.7-2.3-1.6-3.1-2 -0.5 0.2 0.8-8.1 2.4-14l0.3-2.5 1.5 4.3c0.9 4.5 1.6 4.8 2.5 3.9 0.5-0.2 0.4-0.7 0.2-1.3s0.2-1.3 0.5-2l-0.5-1.6c-0.9-0.9-2.4-5.2-2-5.9 0.5-0.2-1.4-2.5-2.5-2.1 0 0-2.3 2-4.6 4 -4.4 4.5-5.2 5.9-1.1 3.9l2.5-1.4 -0.3 2.5C24.9 20.5 24.4 26.1 24.3 27.3zM28.6 34.8c1.1 1.4 2.3 3.4 2.5 3.9 0.2 0.5-0.2 1.3-0.5 2 -0.5 2-0.5 2-2 1.3 -0.9-0.9-2.4-5.2-2-7.7l0-1.8L28.6 34.8z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.2 21.8" class="mkdf-bark-1">
                    <path d="M9.5 13.9c-1-1.8-2.5-1.8-3.9-1.1 0-1-0.7-1.6-1.7-2.1 -1.1-0.5-3.8 0.4-3.1 1.9 0.1 0.1 0.2 0.2 0.3 0.1 0.6 1.2 1.2 2.7 1.6 4C3.1 18 3.4 19.3 4 20.4c0.2 0.3 0.7 0.1 0.6-0.2 0 0 0.1 0 0.2 0C6.9 19.2 11.2 16.9 9.5 13.9zM9.1 16.1c-0.8 1.7-3 2.7-4.5 3.5 0 0-0.1 0-0.1 0.1 -1.1-2.5-1.8-5.1-3.1-7.5 0 0 0 0 0 0 0.1-0.3 0.6-0.7 0.8-0.7 0.9-0.4 1.9-0.1 2.5 0.7C4.9 12.7 5 13 4.9 13.3c-0.7 0.6-1.4 1.4-1.8 2.1 -0.2 0.3 0.2 0.6 0.4 0.4 0.8-0.5 1.6-1.3 1.9-2.2 0.6-0.3 2.3-0.5 2.7-0.2C8.9 14 9.4 15.3 9.1 16.1z"/>
                    <path d="M12.4 7.9c0-0.2-0.2-0.4-0.4-0.3 -0.1 0-0.2 0.1-0.2 0.2 -0.9 0.7-1.2 1.8-1.1 2.9 0.1 1.5 0.5 3.8 1.6 4.9 0.3 0.3 0.7-0.1 0.5-0.4 -1.2-1.5-2.2-5.3-0.7-6.9 1.7 1.7 3 4.3 3.4 6.6 0.1 0.4 0.6 0.3 0.6-0.1C15.8 12.4 14.2 9.6 12.4 7.9z"/>
                    <path d="M13.1 11.4c0 0.1-0.5 0.5-0.6 0.6 -0.2 0.2-0.5 0.4-0.8 0.5 -0.3 0.1-0.1 0.6 0.2 0.4 0.4-0.2 0.7-0.4 1.1-0.7 0.3-0.2 0.7-0.5 0.6-0.9C13.6 11.1 13.1 11.1 13.1 11.4z"/>
                    <path d="M21.8 10.2c-0.8-0.5-2.5-2.4-3.9-2.4 0.8-1.2 1.5-2.8 0-3.9 -1.2-0.9-2.8 0-3.5 1 -0.1 0.2 0 0.4 0.2 0.5C15 6.5 15.5 7.5 16 8.6c0.5 1 1.6 2.6 1.4 3.8 0 0.3 0.5 0.4 0.6 0.1 0.2-0.8-0.2-1.7-0.5-2.4 -0.1-0.4-0.3-0.7-0.5-1.1 0 0 0.1 0 0.1-0.1 0.1-0.1 0.2-0.2 0.2-0.3 1.2-1 3.3 1.6 4.2 2.1C21.8 10.8 22.1 10.4 21.8 10.2zM17.3 4.5c1.7 0.8 0.2 2.8-0.6 3.9 0 0 0 0.1-0.1 0.1 -0.6-1.1-1.2-2.1-1.6-3.3 0 0 0 0 0 0C15.7 4.5 16.5 4.1 17.3 4.5z"/>
                    <path d="M27.2 5.6c-0.7-0.2-1.3-0.3-2-0.3 -0.4 0-1.9 0.4-2.2 0.2 -0.2-0.3 0.2-1.4 0.3-1.8 0.2-0.8 0.2-1.7 0.2-2.5 0-0.4-0.6-0.4-0.6 0 -0.1 1.1-0.1 2.1-0.4 3.1 0 0.1-0.1 0.3-0.1 0.4 -0.6-1.2-1.1-2.5-1.7-3.8 -0.2-0.3-0.6-0.1-0.5 0.2C20.9 2.4 21.4 3.7 22 5c0.1 0.3 0.3 0.6 0.4 0.9 0 0 0 0 0 0 0 0.1 0 0.1 0.1 0.1 0.4 0.9 0.8 1.7 1 2.6 0.1 0.4 0.7 0.3 0.7-0.1C24 7.8 23.6 7 23.3 6.2c0.3 0 0.7-0.1 1-0.1 1-0.1 1.8-0.1 2.8 0.1C27.4 6.2 27.6 5.7 27.2 5.6z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.1 12.1" class="mkdf-bark-2">
                    <path d="M7.4 6.6c0.3-1.7-0.6-2.5-1.8-2.7 0.6-0.6 0.4-1.4 0.1-2.2C5.3 0.7 3.2-0.2 2.8 1.1c0 0.1 0 0.2 0.1 0.2C2.6 2.4 2.2 3.7 1.7 4.6 1.3 5.6 0.8 6.5 0.6 7.5 0.5 7.8 0.9 8 1.1 7.7c0 0 0.1 0.1 0.1 0.1C3 8.4 6.9 9.3 7.4 6.6zM5.9 7.6c-1.4 0.6-3.3 0-4.6-0.3 0 0-0.1 0-0.1 0 0.7-2.1 1.7-4 2.1-6.2 0 0 0 0 0 0 0.2-0.1 0.7-0.1 0.9 0 0.8 0.3 1.2 1 1.1 1.8C5.3 3.3 5.1 3.6 4.9 3.7 4.1 3.7 3.3 3.8 2.7 4 2.4 4.1 2.5 4.5 2.7 4.5c0.8 0.1 1.6 0.1 2.3-0.3 0.5 0.2 1.6 0.9 1.8 1.4C7 6.3 6.6 7.3 5.9 7.6z"/>
                    <path d="M12.4 4.4c0.1-0.1 0.1-0.3-0.1-0.4C12.2 4 12.1 4 12 4c-0.9 0-1.7 0.4-2.3 1.2C9 6.1 8 7.8 8.1 9c0 0.3 0.5 0.3 0.5 0 0.1-1.6 1.5-4.4 3.3-4.6 0.1 1.9-0.4 4.2-1.5 5.8 -0.2 0.3 0.2 0.5 0.4 0.3C12.1 9 12.5 6.4 12.4 4.4z"/>
                    <path d="M10.9 7c-0.1 0.1-0.6 0-0.7 0 -0.2 0-0.5 0-0.7-0.1C9.2 6.8 9.1 7.2 9.4 7.2c0.3 0.1 0.7 0.1 1 0.2 0.3 0 0.7 0.1 0.8-0.2C11.4 7 11.1 6.8 10.9 7z"/>
                    <path d="M16.8 10.9c-0.2-0.8-0.3-2.8-1.1-3.6C16.9 7 18.2 6.4 17.9 5c-0.2-1.2-1.7-1.5-2.7-1.3C15 3.7 15 4 15.1 4.1c-0.4 0.9-0.6 1.8-0.9 2.7 -0.2 0.9-0.4 2.4-1.2 3 -0.2 0.2 0.1 0.5 0.3 0.4 0.5-0.4 0.8-1.2 1-1.8 0.1-0.3 0.2-0.6 0.3-0.9 0 0 0.1 0 0.1 0 0.1 0 0.2 0 0.3 0 1.2 0 1.1 2.8 1.4 3.5C16.5 11.3 16.9 11.2 16.8 10.9zM17.2 5c0.6 1.4-1.4 1.8-2.5 2 0 0-0.1 0-0.1 0 0.2-1 0.4-1.9 0.8-2.9 0 0 0 0 0 0C16.2 4.1 16.9 4.3 17.2 5z"/>
                    <path d="M22.6 11c-0.3-0.5-0.6-0.9-1-1.2 -0.3-0.2-1.4-0.8-1.4-1.1 0-0.3 0.9-0.7 1.1-0.9 0.5-0.4 1-0.9 1.5-1.4 0.2-0.2-0.1-0.6-0.3-0.3 -0.6 0.6-1.2 1.2-1.9 1.7 -0.1 0.1-0.2 0.1-0.3 0.2 0.3-1.1 0.7-2.1 1-3.2 0.1-0.3-0.4-0.4-0.4-0.1 -0.3 1.1-0.7 2.1-1.1 3.2 -0.1 0.3-0.2 0.5-0.2 0.8 0 0 0 0 0 0 0 0 0 0.1 0 0.1 -0.2 0.7-0.4 1.5-0.8 2.1 -0.2 0.3 0.3 0.6 0.5 0.3 0.4-0.6 0.6-1.3 0.8-1.9 0.2 0.2 0.5 0.3 0.7 0.4 0.7 0.5 1.2 0.9 1.6 1.6C22.4 11.5 22.8 11.3 22.6 11z"/>
                </svg>
			</a>
		<?php }
	}
	
	add_action( 'pawfriends_mikado_action_after_wrapper_inner', 'pawfriends_mikado_back_to_top_button', 30 );
}

if ( ! function_exists( 'pawfriends_mikado_get_page_id' ) ) {
	/**
	 * Function that returns current page / post id.
	 * Checks if current page is woocommerce page and returns that id if it is.
	 * Checks if current page is any archive page (category, tag, date, author etc.) and returns -1 because that isn't
	 * page that is created in WP admin.
	 *
	 * @return int
	 *
	 * @version 0.1
	 *
	 * @see pawfriends_mikado_is_plugin_installed()
	 * @see pawfriends_mikado_is_woocommerce_shop()
	 */
	function pawfriends_mikado_get_page_id() {
		if ( pawfriends_mikado_is_plugin_installed( 'woocommerce' ) && pawfriends_mikado_is_woocommerce_shop() ) {
			return pawfriends_mikado_get_woo_shop_page_id();
		}

		if ( pawfriends_mikado_is_default_wp_template() ) {
			return - 1;
		}

		return get_queried_object_id();
	}
}

if ( ! function_exists( 'pawfriends_mikado_get_multisite_blog_id' ) ) {
	/**
	 * Check is multisite and return blog id
	 *
	 * @return int
	 */
	function pawfriends_mikado_get_multisite_blog_id() {
		if ( is_multisite() ) {
			return get_blog_details()->blog_id;
		}
	}
}

if ( ! function_exists( 'pawfriends_mikado_is_default_wp_template' ) ) {
	/**
	 * Function that checks if current page archive page, search, 404 or default home blog page
	 * @return bool
	 *
	 * @see is_archive()
	 * @see is_search()
	 * @see is_404()
	 * @see is_front_page()
	 * @see is_home()
	 */
	function pawfriends_mikado_is_default_wp_template() {
		return is_archive() || is_search() || is_404() || ( is_front_page() && is_home() );
	}
}

if ( ! function_exists( 'pawfriends_mikado_has_shortcode' ) ) {
	/**
	 * Function that checks whether shortcode exists on current page / post
	 *
	 * @param string shortcode to find
	 * @param string content to check. If isn't passed current post content will be used
	 *
	 * @return bool whether content has shortcode or not
	 */
	function pawfriends_mikado_has_shortcode( $shortcode, $content = '' ) {
		$has_shortcode = false;

		if ( $shortcode ) {
			//if content variable isn't past
			if ( $content == '' ) {
				//take content from current post
				$page_id = pawfriends_mikado_get_page_id();
				if ( ! empty( $page_id ) ) {
					$current_post = get_post( $page_id );

					if ( is_object( $current_post ) && property_exists( $current_post, 'post_content' ) ) {
						$content = $current_post->post_content;
					}
				}
			}

			//does content has shortcode added?
			if( has_shortcode( $content, $shortcode ) ) {
				$has_shortcode = true;
			}
		}

		return $has_shortcode;
	}
}

if ( ! function_exists( 'pawfriends_mikado_get_unique_page_class' ) ) {
	/**
	 * Returns unique page class based on post type and page id
	 *
	 * $params int $id is page id
	 * $params bool $allowSingleProductOption
	 * @return string
	 */
	function pawfriends_mikado_get_unique_page_class( $id, $allowSingleProductOption = false ) {
		$page_class = '';

		if ( pawfriends_mikado_is_plugin_installed( 'woocommerce' ) && $allowSingleProductOption ) {

			if ( is_product() ) {
				$id = get_the_ID();
			}
		}

		if ( is_single() ) {
			$page_class = '.postid-' . $id;
		} elseif ( is_home() ) {
			$page_class .= '.home';
		} elseif ( is_archive() || $id === pawfriends_mikado_get_woo_shop_page_id() ) {
			$page_class .= '.archive';
		} elseif ( is_search() ) {
			$page_class .= '.search';
		} elseif ( is_404() ) {
			$page_class .= '.error404';
		} else {
			$page_class .= '.page-id-' . $id;
		}

		return $page_class;
	}
}

if ( ! function_exists( 'pawfriends_mikado_page_custom_style' ) ) {
	/**
	 * Function that print custom page style
	 */
	function pawfriends_mikado_page_custom_style() {
		$style = apply_filters( 'pawfriends_mikado_filter_add_page_custom_style', $style = '' );

		if ( $style !== '' ) {

			if ( pawfriends_mikado_is_plugin_installed( 'woocommerce' ) && pawfriends_mikado_load_woo_assets() ) {
				wp_add_inline_style( 'pawfriends-mikado-woo', $style );
			} else {
				wp_add_inline_style( 'pawfriends-mikado-modules', $style );
			}
		}
	}

	add_action( 'wp_enqueue_scripts', 'pawfriends_mikado_page_custom_style' );
}

if ( ! function_exists( 'pawfriends_mikado_print_custom_js' ) ) {
	/**
	 * Prints out custom css from theme options
	 */
	function pawfriends_mikado_print_custom_js() {
		$custom_js = pawfriends_mikado_options()->getOptionValue( 'custom_js' );

		if ( ! empty( $custom_js ) ) {
			wp_add_inline_script( 'pawfriends-mikado-modules', $custom_js );
		}
	}

	add_action( 'wp_enqueue_scripts', 'pawfriends_mikado_print_custom_js' );
}

if ( ! function_exists( 'pawfriends_mikado_get_global_variables' ) ) {
	/**
	 * Function that generates global variables and put them in array so they could be used in the theme
	 */
	function pawfriends_mikado_get_global_variables() {
		$global_variables = array();
		
		$global_variables['mkdfAddForAdminBar']      = is_admin_bar_showing() ? 32 : 0;
		$global_variables['mkdfElementAppearAmount'] = -100;
		$global_variables['mkdfAjaxUrl']             = esc_url( admin_url( 'admin-ajax.php' ) );
		$global_variables['sliderNavPrevArrow']       = 'ion-ios-arrow-left';
		$global_variables['sliderNavNextArrow']       = 'ion-ios-arrow-right';
		$global_variables['ppExpand']                 = esc_html__( 'Expand the image', 'pawfriends' );
		$global_variables['ppNext']                   = esc_html__( 'Next', 'pawfriends' );
		$global_variables['ppPrev']                   = esc_html__( 'Previous', 'pawfriends' );
		$global_variables['ppClose']                  = esc_html__( 'Close', 'pawfriends' );
		
		$global_variables = apply_filters( 'pawfriends_mikado_filter_js_global_variables', $global_variables );
		
		wp_localize_script( 'pawfriends-mikado-modules', 'mkdfGlobalVars', array(
			'vars' => $global_variables
		) );
	}

	add_action( 'wp_enqueue_scripts', 'pawfriends_mikado_get_global_variables' );
}

if ( ! function_exists( 'pawfriends_mikado_per_page_js_variables' ) ) {
	/**
	 * Outputs global JS variable that holds page settings
	 */
	function pawfriends_mikado_per_page_js_variables() {
		$per_page_js_vars = apply_filters( 'pawfriends_mikado_filter_per_page_js_vars', array() );

		wp_localize_script( 'pawfriends-mikado-modules', 'mkdfPerPageVars', array(
			'vars' => $per_page_js_vars
		) );
	}

	add_action( 'wp_enqueue_scripts', 'pawfriends_mikado_per_page_js_variables' );
}

if ( ! function_exists( 'pawfriends_mikado_content_elem_style_attr' ) ) {
	/**
	 * Defines filter for adding custom styles to content HTML element
	 */
	function pawfriends_mikado_content_elem_style_attr() {
		$styles = apply_filters( 'pawfriends_mikado_filter_content_elem_style_attr', array() );

		pawfriends_mikado_inline_style( $styles );
	}
}

if ( ! function_exists( 'pawfriends_mikado_is_plugin_installed' ) ) {
	/**
	 * Function that checks if forward plugin installed
	 *
	 * @param $plugin string
	 *
	 * @return bool
	 */
	function pawfriends_mikado_is_plugin_installed( $plugin ) {
		switch ( $plugin ) {
			case 'core':
				return defined( 'PAWFRIENDS_CORE_VERSION' );
				break;
			case 'woocommerce':
				return function_exists( 'is_woocommerce' );
				break;
			case 'visual-composer':
				return class_exists( 'WPBakeryVisualComposerAbstract' );
				break;
			case 'revolution-slider':
				return class_exists( 'RevSliderFront' );
				break;
			case 'contact-form-7':
				return defined( 'WPCF7_VERSION' );
				break;
			case 'wpml':
				return defined( 'ICL_SITEPRESS_VERSION' );
				break;
			case 'gutenberg-editor':
				return class_exists( 'WP_Block_Type' );
				break;
			case 'gutenberg-plugin':
				return function_exists( 'is_gutenberg_page' ) && is_gutenberg_page();
				break;
			default:
				return false;
				break;
		}
	}
}

if ( ! function_exists( 'pawfriends_mikado_get_module_part' ) ) {
	function pawfriends_mikado_get_module_part( $module ) {
		return $module;
	}
}

if ( ! function_exists( 'pawfriends_mikado_max_image_width_srcset' ) ) {
	/**
	 * Set max width for srcset to 1920
	 *
	 * @return int
	 */
	function pawfriends_mikado_max_image_width_srcset() {
		return 1920;
	}
	
	add_filter( 'max_srcset_image_width', 'pawfriends_mikado_max_image_width_srcset' );
}


if ( ! function_exists( 'pawfriends_mikado_has_dashboard_shortcodes' ) ) {
	/**
	 * Function that checks if current page has at least one of dashboard shortcodes added
	 * @return bool
	 */
	function pawfriends_mikado_has_dashboard_shortcodes() {
		$dashboard_shortcodes = array();

		$dashboard_shortcodes = apply_filters( 'pawfriends_mikado_filter_dashboard_shortcodes_list', $dashboard_shortcodes );

		foreach ( $dashboard_shortcodes as $dashboard_shortcode ) {
			$has_shortcode = pawfriends_mikado_has_shortcode( $dashboard_shortcode );

			if ( $has_shortcode ) {
				return true;
			}
		}

		return false;
	}
}

if ( ! function_exists( 'pawfriends_mikado_tag_cloud_filter' ) ) {
    /**
     * Adds '/' between tags in tag cloud widget
     */
    function pawfriends_mikado_tag_cloud_filter() {
        $args = array(
            'separator' => " / ",
            'echo' => false
        );
        return $args;
    }

    add_filter('widget_tag_cloud_args', 'pawfriends_mikado_tag_cloud_filter');
}

if ( ! function_exists( 'pawfriends_mikado_highlight_left_svg' ) ) {

    function pawfriends_mikado_highlight_left_svg( ) {

        $html = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" xml:space="preserve" class="mkdf-active-hover-left">
                    <path class="st0" d="M2,0C0.9,0,0,0.9,0,2l2,23.8c0,1.1,0.9,2,2,2h3.9V0H2z"/>
                </svg>';

        return $html;
    }
}

if ( ! function_exists( 'pawfriends_mikado_highlight_right_svg' ) ) {

    function pawfriends_mikado_highlight_right_svg( ) {

        $html = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" xml:space="preserve" class="mkdf-active-hover-right">
                    <g><path class="st0" d="M5.9,0c1.1,0,2,0.9,2,2L5,25.8c-0.2,1.6-1.1,1.9-3,2H0V0H5.9"/></g>
                </svg>';

        return $html;
    }
}
