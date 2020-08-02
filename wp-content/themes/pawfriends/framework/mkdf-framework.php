<?php

require_once MIKADO_FRAMEWORK_ROOT_DIR . "/lib/mkdf.welcome.page.php";
require_once MIKADO_FRAMEWORK_ROOT_DIR . "/lib/mkdf.customizer.php";
require_once MIKADO_FRAMEWORK_ROOT_DIR . "/lib/mkdf.kses.php";
require_once MIKADO_FRAMEWORK_ROOT_DIR . "/lib/mkdf.layout1.php";
require_once MIKADO_FRAMEWORK_ROOT_DIR . "/lib/mkdf.layout2.php";
require_once MIKADO_FRAMEWORK_ROOT_DIR . "/lib/mkdf.layout3.php";
require_once MIKADO_FRAMEWORK_ROOT_DIR . "/lib/mkdf.layout.tax.php";
require_once MIKADO_FRAMEWORK_ROOT_DIR . "/lib/mkdf.layout.user.php";
require_once MIKADO_FRAMEWORK_ROOT_DIR . "/lib/mkdf.layout.dashboard.php";
require_once MIKADO_FRAMEWORK_ROOT_DIR . "/lib/mkdf.optionsapi.php";
require_once MIKADO_FRAMEWORK_ROOT_DIR . "/lib/mkdf.framework.php";
require_once MIKADO_FRAMEWORK_ROOT_DIR . "/lib/mkdf.functions.php";
require_once MIKADO_FRAMEWORK_ROOT_DIR . "/lib/icons-pack/icons-pack.php";
require_once MIKADO_FRAMEWORK_ROOT_DIR . "/admin/options/mkdf-options-setup.php";
require_once MIKADO_FRAMEWORK_ROOT_DIR . "/admin/meta-boxes/mkdf-meta-boxes-setup.php";
require_once MIKADO_FRAMEWORK_ROOT_DIR . "/modules/mkdf-modules-loader.php";

if ( ! function_exists( 'pawfriends_mikado_admin_scripts_init' ) ) {
	/**
	 * Function that registers all scripts that are necessary for our back-end
	 */
	function pawfriends_mikado_admin_scripts_init() {
		
		//This part is required for field type address
		$enable_google_map_in_admin = apply_filters( 'pawfriends_mikado_filter_google_maps_in_backend', false );
		if ( $enable_google_map_in_admin ) {
			//include google map api script
			$google_maps_api_key          = pawfriends_mikado_options()->getOptionValue( 'google_maps_api_key' );
			$google_maps_extensions       = '';
			$google_maps_extensions_array = apply_filters( 'pawfriends_mikado_filter_google_maps_extensions_array', array() );
			if ( ! empty( $google_maps_extensions_array ) ) {
				$google_maps_extensions .= '&libraries=';
				$google_maps_extensions .= implode( ',', $google_maps_extensions_array );
			}
			if ( ! empty( $google_maps_api_key ) ) {
				wp_enqueue_script( 'mkdf-admin-maps', '//maps.googleapis.com/maps/api/js?key=' . esc_attr( $google_maps_api_key ) . $google_maps_extensions, array(), false, true );
				if ( ! empty( $google_maps_extensions_array ) && is_array( $google_maps_extensions_array ) ) {
					wp_enqueue_script( 'geocomplete', get_template_directory_uri() . '/framework/admin/assets/js/`jquery.geocomplete.min.js', array( 'jquery', 'mkdf-admin-maps' ), false, true );
				}
			}
		}

		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/framework/admin/assets/js/bootstrap.min.js', array(), false, true );
		wp_enqueue_script( 'bootstrap-select', get_template_directory_uri() . '/framework/admin/assets/js/bootstrap-select.min.js', array(), false, true );
		wp_enqueue_script( 'select2', get_template_directory_uri() . '/framework/admin/assets/js/select2.min.js', array(), false, true );
		wp_enqueue_script( 'mkdf-ui-admin', get_template_directory_uri() . '/framework/admin/assets/js/mkdf-ui/mkdf-ui.js', array(), false, true );


		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/framework/admin/assets/css/font-awesome/css/font-awesome.min.css' );
		wp_enqueue_style( 'select2', get_template_directory_uri() . '/framework/admin/assets/css/select2.min.css' );

		/**
		 * @see PawFriendsMikadoClassSkinAbstract::registerScripts - hooked with 10
		 * @see PawFriendsMikadoClassSkinAbstract::registerStyles - hooked with 10
		 */
		do_action( 'pawfriends_mikado_action_admin_scripts_init' );
	}

	add_action( 'admin_init', 'pawfriends_mikado_admin_scripts_init' );
}

if ( ! function_exists( 'pawfriends_mikado_enqueue_admin_styles' ) ) {
	/**
	 * Function that enqueues styles for options page
	 */
	function pawfriends_mikado_enqueue_admin_styles() {
		wp_enqueue_style( 'wp-color-picker' );

		/**
		 * @see PawFriendsMikadoClassSkinAbstract::enqueueStyles - hooked with 10
		 */
		do_action( 'pawfriends_mikado_action_enqueue_admin_styles' );
	}
}

if ( ! function_exists( 'pawfriends_mikado_enqueue_admin_scripts' ) ) {
	/**
	 * Function that enqueues styles for options page
	 */
	function pawfriends_mikado_enqueue_admin_scripts() {
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_enqueue_script( 'jquery-ui-accordion' );
		wp_enqueue_script( 'common' );
		wp_enqueue_script( 'wp-lists' );
		wp_enqueue_script( 'postbox' );
		wp_enqueue_media();
		wp_enqueue_script( 'mkdf-dependence', get_template_directory_uri() . '/framework/admin/assets/js/mkdf-ui/mkdf-dependence.js', array(), false, true );
		wp_enqueue_script( 'mkdf-twitter-connect', get_template_directory_uri() . '/framework/admin/assets/js/mkdf-ui/mkdf-twitter-connect.js', array(), false, true );

		/**
		 * @see PawFriendsMikadoClassSkinAbstract::enqueueScripts - hooked with 10
		 */
		do_action( 'pawfriends_mikado_action_enqueue_admin_scripts' );
	}
}

if ( ! function_exists( 'pawfriends_mikado_enqueue_meta_box_styles' ) ) {
	/**
	 * Function that enqueues styles for meta boxes
	 */
	function pawfriends_mikado_enqueue_meta_box_styles() {
		wp_enqueue_style( 'wp-color-picker' );

		/**
		 * @see PawFriendsMikadoClassSkinAbstract::enqueueStyles - hooked with 10
		 */
		do_action( 'pawfriends_mikado_action_enqueue_meta_box_styles' );
	}
}

if ( ! function_exists( 'pawfriends_mikado_enqueue_meta_box_scripts' ) ) {
	/**
	 * Function that enqueues scripts for meta boxes
	 */
	function pawfriends_mikado_enqueue_meta_box_scripts() {
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_enqueue_script( 'jquery-ui-accordion' );
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'common' );
		wp_enqueue_script( 'wp-lists' );
		wp_enqueue_script( 'postbox' );
		wp_enqueue_media();
        wp_enqueue_script( 'mkdf-dependence', get_template_directory_uri() . '/framework/admin/assets/js/mkdf-ui/mkdf-dependence.js', array(), false, true );
        wp_enqueue_script( 'mkdf-repeater', get_template_directory_uri() . '/framework/admin/assets/js/mkdf-ui/mkdf-ui-repeater.js', array(), false, true );

		/**
		 * @see PawFriendsMikadoClassSkinAbstract::enqueueScripts - hooked with 10
		 */
		do_action( 'pawfriends_mikado_action_enqueue_meta_box_scripts' );
	}
}

if ( ! function_exists( 'pawfriends_mikado_enqueue_nav_menu_script' ) ) {
	/**
	 * Function that enqueues styles and scripts necessary for menu administration page.
	 * It checks $hook variable
	 *
	 * @param $hook string current page hook to check
	 */
	function pawfriends_mikado_enqueue_nav_menu_script( $hook ) {
		if ( $hook == 'nav-menus.php' ) {
			wp_enqueue_script( 'mkdf-nav-menu', get_template_directory_uri() . '/framework/admin/assets/js/mkdf-ui/mkdf-nav-menu.js' );
			wp_enqueue_style( 'mkdf-nav-menu', get_template_directory_uri() . '/framework/admin/assets/css/mkdf-nav-menu.css' );
		}
	}

	add_action( 'admin_enqueue_scripts', 'pawfriends_mikado_enqueue_nav_menu_script' );
}

if ( ! function_exists( 'pawfriends_mikado_enqueue_widgets_admin_script' ) ) {
	/**
	 * Function that enqueues styles and scripts for admin widgets page.
	 *
	 * @param $hook string current page hook to check
	 */
	function pawfriends_mikado_enqueue_widgets_admin_script( $hook ) {
		if ( $hook == 'widgets.php' ) {
			wp_enqueue_script( 'wp-color-picker' );
            wp_enqueue_script( 'mkdf-dependence', get_template_directory_uri() . '/framework/admin/assets/js/mkdf-ui/mkdf-dependence.js', array(), false, true );
			wp_enqueue_script( 'mkdf-widgets-dependence', get_template_directory_uri() . '/framework/admin/assets/js/mkdf-ui/mkdf-widget-dependence.js', array(), false, true );
		}
	}

	add_action( 'admin_enqueue_scripts', 'pawfriends_mikado_enqueue_widgets_admin_script' );
}

if ( ! function_exists( 'pawfriends_mikado_enqueue_taxonomy_script' ) ) {
	/**
	 * Function that enqueues styles and scripts necessary for menu administration page.
	 * It checks $hook variable
	 *
	 * @param $hook string current page hook to check
	 */
	function pawfriends_mikado_enqueue_taxonomy_script( $hook ) {
		if ( $hook == 'edit-tags.php' || $hook == 'term.php' ) {
			wp_enqueue_script( 'select2' );
			wp_enqueue_style( 'select2', get_template_directory_uri() . '/framework/admin/assets/css/select2.min.css' );
			wp_enqueue_style( 'mkdf-taxonomy', get_template_directory_uri() . '/framework/admin/assets/css/mkdf-taxonomy.css' );
		}
	}

	add_action( 'admin_enqueue_scripts', 'pawfriends_mikado_enqueue_taxonomy_script' );
}


if ( ! function_exists( 'pawfriends_mikado_dashboard_page' ) ) {
	/**
	 * Function that checks whether Dashboard assets needs to be loaded.
	 *
	 */
	function pawfriends_mikado_dashboard_page() {
		return is_page_template('user-dashboard.php');
	}
}

if ( ! function_exists( 'pawfriends_mikado_init_theme_options_array' ) ) {
	/**
	 * Function that merges $pawfriends_mikado_global_options and default options array into one array.
	 *
	 * @see array_merge()
	 */
	function pawfriends_mikado_init_theme_options_array() {
		global $pawfriends_mikado_global_options, $pawfriends_mikado_global_Framework;

		$db_options = get_option( 'mkdf_options_pawfriends' );

		//does mkdf_options_pawfriends exists in db?
		if ( is_array( $db_options ) ) {
			//merge with default options
			$pawfriends_mikado_global_options = array_merge( $pawfriends_mikado_global_Framework->mkdOptions->options, get_option( 'mkdf_options_pawfriends' ) );
		} else {
			//options don't exists in db, take default ones
			$pawfriends_mikado_global_options = $pawfriends_mikado_global_Framework->mkdOptions->options;
		}
	}

	add_action( 'pawfriends_mikado_action_after_options_map', 'pawfriends_mikado_init_theme_options_array', 0 );
}

if ( ! function_exists( 'pawfriends_mikado_init_theme_options' ) ) {
	/**
	 * Function that sets $pawfriends_mikado_global_options variable if it does'nt exists
	 */
	function pawfriends_mikado_init_theme_options() {
		global $pawfriends_mikado_global_options;
		global $pawfriends_mikado_global_Framework;
		if ( isset( $pawfriends_mikado_global_options['reset_to_defaults'] ) ) {
			if ( $pawfriends_mikado_global_options['reset_to_defaults'] == 'yes' ) {
				delete_option( "mkdf_options_pawfriends" );
			}
		}

		if ( ! get_option( "mkdf_options_pawfriends" ) ) {
			add_option( "mkdf_options_pawfriends", $pawfriends_mikado_global_Framework->mkdOptions->options );

			$pawfriends_mikado_global_options = $pawfriends_mikado_global_Framework->mkdOptions->options;
		}
	}
}

if ( ! function_exists( 'pawfriends_mikado_register_theme_settings' ) ) {
	/**
	 * Function that registers setting that will be used to store theme options
	 */
	function pawfriends_mikado_register_theme_settings() {
		register_setting( MIKADO_OPTIONS_SLUG, 'mkdf_options' );
	}

	add_action( 'admin_init', 'pawfriends_mikado_register_theme_settings' );
}

if ( ! function_exists( 'pawfriends_mikado_get_admin_tab' ) ) {
	/**
	 * Helper function that returns current tab from url.
	 * @return null
	 */
	function pawfriends_mikado_get_admin_tab() {
		return isset( $_GET['page'] ) ? pawfriends_mikado_strafter( $_GET['page'], 'tab' ) : null;
	}
}

if ( ! function_exists( 'pawfriends_mikado_strafter' ) ) {
	/**
	 * Function that returns string that comes after found string
	 *
	 * @param $string string where to search
	 * @param $substring string what to search for
	 *
	 * @return null|string string that comes after found string
	 */
	function pawfriends_mikado_strafter( $string, $substring ) {
		$pos = strpos( $string, $substring );
		if ( $pos === false ) {
			return null;
		}

		return ( substr( $string, $pos + strlen( $substring ) ) );
	}
}

if ( ! function_exists( 'pawfriends_mikado_save_options' ) ) {
	/**
	 * Function that saves theme options to db.
	 * It hooks to ajax wp_ajax_mkdf_save_options action.
	 */
	function pawfriends_mikado_save_options() {
		global $pawfriends_mikado_global_options;

		if ( current_user_can( 'administrator' ) ) {
			$_REQUEST = stripslashes_deep( $_REQUEST );

			unset( $_REQUEST['action'] );

			check_ajax_referer( 'mkdf_ajax_save_nonce', 'mkdf_ajax_save_nonce' );

			$pawfriends_mikado_global_options = array_merge( $pawfriends_mikado_global_options, $_REQUEST );

			update_option( 'mkdf_options_pawfriends', $pawfriends_mikado_global_options );

			do_action( 'pawfriends_mikado_action_after_theme_option_save' );
			echo esc_html__( 'Saved', 'pawfriends' );

			die();
		}
	}

	add_action( 'wp_ajax_pawfriends_mikado_save_options', 'pawfriends_mikado_save_options' );
}

if ( ! function_exists( 'pawfriends_mikado_meta_box_add' ) ) {
	/**
	 * Function that adds all defined meta boxes.
	 * It loops through array of created meta boxes and adds them
	 */
	function pawfriends_mikado_meta_box_add() {
		global $pawfriends_mikado_global_Framework;

		foreach ( $pawfriends_mikado_global_Framework->mkdMetaBoxes->metaBoxes as $key => $box ) {
			$hidden = false;
			if ( ! empty( $box->hidden_property ) ) {
				foreach ( $box->hidden_values as $value ) {
					if ( pawfriends_mikado_option_get_value( $box->hidden_property ) == $value ) {
						$hidden = true;
					}
				}
			}

			if ( is_string( $box->scope ) ) {
				$box->scope = array( $box->scope );
			}

			if ( is_array( $box->scope ) && count( $box->scope ) ) {
				foreach ( $box->scope as $screen ) {
                    pawfriends_mikado_create_meta_box_handler( $box, $key, $screen );

					if ( $hidden ) {
						add_filter( 'postbox_classes_' . $screen . '_mkdf-meta-box-' . $key, 'pawfriends_mikado_meta_box_add_hidden_class' );
					}
				}
			}
		}
		
		if ( pawfriends_mikado_is_plugin_installed( 'gutenberg-editor' ) || pawfriends_mikado_is_plugin_installed( 'gutenberg-plugin' ) ) {
			pawfriends_mikado_enqueue_meta_box_styles();
			pawfriends_mikado_enqueue_meta_box_scripts();
		} else {
			add_action( 'admin_enqueue_scripts', 'pawfriends_mikado_enqueue_meta_box_styles' );
			add_action( 'admin_enqueue_scripts', 'pawfriends_mikado_enqueue_meta_box_scripts' );
		}
	}
}

if ( ! function_exists( 'pawfriends_mikado_meta_box_save' ) ) {
	/**
	 * Function that saves meta box to postmeta table
	 *
	 * @param $post_id int id of post that meta box is being saved
	 * @param $post WP_Post current post object
	 */
	function pawfriends_mikado_meta_box_save( $post_id, $post ) {
		global $pawfriends_mikado_global_Framework;

		$nonces_array = array();
		$meta_boxes   = pawfriends_mikado_framework()->mkdMetaBoxes->getMetaBoxesByScope( $post->post_type );

		if ( is_array( $meta_boxes ) && count( $meta_boxes ) ) {
			foreach ( $meta_boxes as $meta_box ) {
				$nonces_array[] = 'pawfriends_mikado_meta_box_' . $meta_box->name . '_save';
			}
		}

		if ( is_array( $nonces_array ) && count( $nonces_array ) ) {
			foreach ( $nonces_array as $nonce ) {
				if ( ! isset( $_POST[ $nonce ] ) || ! wp_verify_nonce( $_POST[ $nonce ], $nonce ) ) {
					return;
				}
			}
		}

		$postTypes = apply_filters( 'pawfriends_mikado_filter_meta_box_post_types_save', array( 'post', 'page' ) );

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( ! isset( $_POST['_wpnonce'] ) ) {
			return;
		}

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		if ( ! in_array( $post->post_type, $postTypes ) ) {
			return;
		}

		foreach ( $pawfriends_mikado_global_Framework->mkdMetaBoxes->options as $key => $box ) {

			if ( isset( $_POST[ $key ] ) && trim( $_POST[ $key ] !== '' ) ) {

				$value = $_POST[ $key ];

				update_post_meta( $post_id, $key, $value );
			} else {
				delete_post_meta( $post_id, $key );
			}
		}
	}

	add_action( 'save_post', 'pawfriends_mikado_meta_box_save', 1, 2 );
}

if ( ! function_exists( 'pawfriends_mikado_render_meta_box' ) ) {
	/**
	 * Function that renders meta box
	 *
	 * @param $post WP_Post post object
	 * @param $metabox array array of current meta box parameters
	 */
	function pawfriends_mikado_render_meta_box( $post, $metabox ) { ?>
		<div class="mkdf-meta-box mkdf-page">
			<div class="mkdf-meta-box-holder">
				<?php $metabox['args']['box']->render(); ?>
				<?php wp_nonce_field( 'pawfriends_mikado_meta_box_' . $metabox['args']['box']->name . '_save', 'pawfriends_mikado_meta_box_' . $metabox['args']['box']->name . '_save' ); ?>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'pawfriends_mikado_meta_box_add_hidden_class' ) ) {
	/**
	 * Function that adds class that will initially hide meta box
	 *
	 * @param array $classes array of classes
	 *
	 * @return array modified array of classes
	 */
	function pawfriends_mikado_meta_box_add_hidden_class( $classes = array() ) {
		if ( ! in_array( 'mkdf-meta-box-hidden', $classes ) ) {
			$classes[] = 'mkdf-meta-box-hidden';
		}

		return $classes;
	}
}

if ( ! function_exists( 'pawfriends_mikado_remove_default_custom_fields' ) ) {
	/**
	 * Function that removes default WordPress custom fields interface
	 */
	function pawfriends_mikado_remove_default_custom_fields() {
		foreach ( array( 'normal', 'advanced', 'side' ) as $context ) {
			foreach ( apply_filters( 'pawfriends_mikado_filter_meta_box_post_types_remove', array( 'post', 'page' ) ) as $postType ) {
				remove_meta_box( 'postcustom', $postType, $context );
			}
		}
	}

	add_action( 'do_meta_boxes', 'pawfriends_mikado_remove_default_custom_fields' );
}

if ( ! function_exists( 'pawfriends_mikado_generate_icon_pack_options' ) ) {
	/**
	 * Generates options HTML for each icon in given icon pack
	 * Hooked to wp_ajax_update_admin_nav_icon_options action
	 */
	function pawfriends_mikado_generate_icon_pack_options() {
		$html               = '';
		$icon_pack          = isset( $_POST['icon_pack'] ) ? $_POST['icon_pack'] : '';
		$collections_object = pawfriends_mikado_icon_collections()->getIconCollection( $icon_pack );

		if ( $collections_object ) {
			$icons = $collections_object->getIconsArray();
			if ( is_array( $icons ) && count( $icons ) ) {
				foreach ( $icons as $key => $value ) {
					$html .= '<option value="' . esc_attr( $value ) . '">' . esc_html( $key ) . '</option>';
				}
			}
		}

		echo wp_kses( $html, array( 'option' => array( 'value' => true ) ) );
	}

	add_action( 'wp_ajax_update_admin_nav_icon_options', 'pawfriends_mikado_generate_icon_pack_options' );
}

if ( ! function_exists( 'pawfriends_mikado_save_dismisable_notice' ) ) {
	/**
	 * Updates user meta with dismisable notice. Hooks to admin_init action
	 * in order to check this on every page request in admin
	 */
	function pawfriends_mikado_save_dismisable_notice() {
		if ( is_admin() && ! empty( $_GET['mkdf_dismis_notice'] ) ) {
			$notice_id       = sanitize_key( $_GET['mkdf_dismis_notice'] );
			$current_user_id = get_current_user_id();

			update_user_meta( $current_user_id, 'dismis_' . $notice_id, 1 );
		}
	}

	add_action( 'admin_init', 'pawfriends_mikado_save_dismisable_notice' );
}

if ( ! function_exists( 'pawfriends_mikado_ajax_status' ) ) {
	/**
	 * Function that return status from ajax functions
	 */
	function pawfriends_mikado_ajax_status( $status, $message, $data = null ) {
		$response = array(
			'status'  => $status,
			'message' => $message,
			'data'    => $data
		);

		$output = json_encode( $response );

		exit( $output );
	}
}

if ( ! function_exists( 'pawfriends_mikado_hook_twitter_request_ajax' ) ) {
	/**
	 * Wrapper function for obtaining twitter request token.
	 * Hooks to wp_ajax_mkdf_twitter_obtain_request_token ajax action
	 *
	 * @see PawFriendsTwitterApi::obtainRequestToken()
	 */
	function pawfriends_mikado_hook_twitter_request_ajax() {
		PawFriendsTwitterApi::getInstance()->obtainRequestToken();
	}
	
	add_action( 'wp_ajax_mkdf_twitter_obtain_request_token', 'pawfriends_mikado_hook_twitter_request_ajax' );
}

if ( ! function_exists( 'pawfriends_mikado_set_admin_google_api_class' ) ) {
	function pawfriends_mikado_set_admin_google_api_class( $classes ) {
		$google_map_api = pawfriends_mikado_options()->getOptionValue( 'google_maps_api_key' );

		if ( empty( $google_map_api ) ) {
			$classes .= ' mkdf-empty-google-api';
		}
		
		return $classes;
	}
	
	add_filter( 'admin_body_class', 'pawfriends_mikado_set_admin_google_api_class' );
}

if ( ! function_exists( 'pawfriends_mikado_comment' ) ) {
	/**
	 * Function which modify default wordpress comments
	 *
	 * @return comments html
	 */
	function pawfriends_mikado_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		
		global $post;
		
		$is_pingback_comment = $comment->comment_type == 'pingback';
		$is_author_comment   = $post->post_author == $comment->user_id;
		
		$comment_class = 'mkdf-comment clearfix';
		
		if ( $is_author_comment ) {
			$comment_class .= ' mkdf-post-author-comment';
		}
		
		if ( $is_pingback_comment ) {
			$comment_class .= ' mkdf-pingback-comment';
		}

        if ( ! get_avatar( $comment, 'thumbnail' ) ) {
            $comment_class .= ' mkdf-pingback-comment';
        }
		?>
		
		<li>
		<div class="<?php echo esc_attr( $comment_class ); ?>">
            <?php if ( ! $is_pingback_comment && get_avatar( $comment, 'thumbnail' ) ) { ?>
                <?php if ($comment->comment_parent>0) { ?>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 40" width="26" height="40" class="mkdf-reply-comment">
                        <path d="M17.7 37.6c-1.5 2.3-2.3 2.3-3.1 0.8 0-0.8 0.8-1.5 3.1-3.1l3.1-1.5L15.4 33c-6.9 0-9.2-1.5-12.3-7.7l-1.5-3.8 0.8-10c0.8-6.2 0.8-10 1.5-10 0.8 0 0.8 1.5 0.8 10C3.9 23 4.7 25.3 8.5 28.4c2.3 1.5 10.7 3.8 11.5 3.1 0.8 0-0.8-1.5-1.5-2.3 -2.3-1.5-3.8-4.6-2.3-4.6 0.8 0 8.4 7.7 8.4 8.5 0 0.8-0.8 1.5-2.3 1.5C20.8 35.3 19.2 36.9 17.7 37.6z"/>
                    </svg>
                <?php } ?>
				<div class="mkdf-comment-image">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 153 131" width="153" height="131">
                        <defs>
                            <clipPath id="mkdf-post-comment-img-<?php echo comment_ID(); ?>">
                                <path d="M144 130H7c-3.3 0-6-2.7-6-6V10c0-3.3 2.7-6 6-6l139-3c3.3 0 6 2.7 6 6l-2 117C150 127.3 147.3 130 144 130z"/>
                            </clipPath>
                        </defs>
                        <image class="clipped" width="153" height="153" href="<?php echo get_avatar_url( $comment, $arg = array( 'size' => 153 ) ) ?>" clip-path="url(#mkdf-post-comment-img-<?php echo comment_ID(); ?>)" />
                    </svg>
                    <?php echo pawfriends_mikado_kses_img( get_avatar( $comment, 156 ) ); ?>
                </div>
			<?php } ?>
			<div class="mkdf-comment-text">
				<div class="mkdf-comment-info">
					<h4 class="mkdf-comment-name vcard">
						<?php if ( $is_pingback_comment ) {
							esc_html_e( 'Pingback:', 'pawfriends' );
						} ?>
						<?php echo wp_kses_post( get_comment_author_link() ); ?>
					</h4>
                    <div class="mkdf-comment-date"><?php comment_time( get_option( 'date_format' ) ); ?></div>
                    <?php
                    comment_reply_link( array_merge( $args, array(
                        'reply_text' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 33 23" width="33" height="23">' .
                            '<path d="M0.9 6c0 0 1.3 0.5 2.3 1C4.5 7.3 6 7.8 6.8 8c1.8 0.3 3.3 1 4.1 1.8 0.8 0.5 1 0.5 1-1V7.5h4.1c4.1-0.3 5.3 0 7.9 1.3 1.8 0.8 2.3 1.3 2.3 3.3 -0.3 0.8-1.8 2.6-2.8 3.1 -2 0.5-8.6 0.5-10.7-0.5 -0.5-0.3-1-0.3-1-0.3 -0.3 0.3 0 1.5 0.3 3.1 0.3 1.8 0.5 3.3 0.5 3.8 0 0.8 0.3 0.8 0.8 0.8h3c4.1 0.3 6.6-0.5 9.7-2 2-0.8 4.3-3.1 4.8-4.3 0-0.5 0.3-1 0.5-1 0.3 0 0.5-1.3 0.5-2.3 0-2-0.5-3.1-3.6-6.4 -0.5-0.5-1-1-1.3-1 -0.3 0-0.8 0-0.8-0.3 -0.3-0.3-2.5-0.3-10.2-0.5 -5.1-0.3-5.3-0.3-5.6-0.8 -0.3-0.3-0.3-0.8 0-1 0.3-0.8 0.3-1-0.5-1.3 -0.3 0-0.5 0-0.5 0 0 0.5-1.5 1.8-2.8 2.6C5 4.4 3.5 5 1.4 5.5 0.7 5.7 0.4 6 0.9 6zM14.9 5.7c1.5 1 1.3 1.3-0.5 0C13.6 5.5 13.1 5 13.1 5 13.4 4.7 14.1 5.2 14.9 5.7zM10.8 6.5c-0.3 0-0.5-0.3-0.5-0.5 0 0 0.3 0 0.5 0 0.3 0 0.3 0.3 0.3 0.5C11.1 6.5 11.1 6.5 10.8 6.5zM15.2 5.2c0-0.3 0.5 0 1.3 0.3 0.5 0.5 1 0.5 1 0.5 0.3 0 0.3 0 0.3 0.3 0 0.3-0.3 0.3-0.3 0.3C15.4 5.5 14.9 5.2 15.2 5.2zM16.9 5.5c0 0 0 0-0.3 0l-0.3-0.3L16.7 5C16.9 5 16.9 5.2 16.9 5.5zM27.9 7.3c-0.3 0-1-0.5-1.5-0.8C25.8 6.2 24.8 6 24 5.7c-1.5-0.5-1.3-0.8 0.3-0.5 0.5 0 0.8 0.3 0.8 0.5 0 0 0.3 0 0.8 0h0.3c-0.3 0.3-0.3 0.5 0.5 0.8 0.5 0 0.8 0.3 1 0.3 0 0 0.3 0.3 0.5 0.3C28.4 7.3 28.4 7.5 27.9 7.3zM24.6 20c0 0-0.5-0.3-0.8-0.5 -0.5-0.3-0.8-0.8-1-0.8 0 0-0.5-0.3-1-0.5 -0.5-0.5-1.3-1-1.5-1 -0.8-0.3-0.8-0.8-0.3-0.8C20.2 16.5 24.8 19.8 24.6 20zM17.4 18.5c-2.3-1.5-2.5-2-1-1.3 0.3 0.3 1.5 1 2.8 2 1 0.8 2 1.3 2 1V20c-0.3-0.3-1-0.8-2.3-1.5 -2-1.5-2-1.3-1.8-1.5 0 0 1.3 0.8 2.8 1.5 1.3 1 2.5 1.8 2.5 1.8 0.3-0.3-0.8-1-2.8-2.3 -1.5-0.8-1.8-1-1.3-1 0.5-0.3 0.8 0 0.8 0 0.3 0.3 0.5 0.5 0.8 0.5 1 0.5 3.6 2.6 3.6 2.8 0 0-0.5 0.3-1.3 0.5C20.7 21.1 20.7 21.1 17.4 18.5zM18.7 20.8c-0.5-0.5-1.8-1.5-3-2.3 -2.3-1.5-3-2.6-1.8-1.8 1.3 0.5 5.8 4.1 5.8 4.6C19.7 21.6 19.5 21.6 18.7 20.8zM13.6 20c0.5 0.5 1 1.3 1 1.3 -0.3 0.3-1.3-0.3-1.5-0.5C12.9 19.8 12.9 19.5 13.6 20zM14.1 19.3c0.8 0.8 1.8 1.5 2.3 1.8 0.5 0.3 0.5 0.3 0 0.3s-2.3-1-2.8-2C13.4 19 13.1 19 12.9 19c0 0-0.3 0-0.3-0.5C12.6 18.2 12.9 18.2 14.1 19.3zM12.4 15.9c0.3 0 0.3 0.3 0.5 0.8 0.3 0.3 1.3 1.3 2.5 2.3 1.5 0.8 2.5 1.8 2.5 1.8 0 0.3 0 0.3 0.3 0.3 0 0 0.3 0.3 0 0.3 -0.3 0.3-3-1.8-4.6-3.1 -0.5-0.5-0.8-0.5-0.8-0.5 -0.3 0-0.5-0.3-0.5-0.8s0-0.8 0-0.8V15.9zM27.6 18c0 0-0.3 0.3-0.5 0.5C26.3 19 26.6 19 23.3 17c-0.8-0.3-1.3-0.5-1.3-0.5s0.3 0.3 0.8 0.5c1.5 0.8 3.3 2.3 3 2.6 -0.3 0.3-0.5 0-0.8-0.3 -0.3 0-1.5-0.8-2.5-1.5 -2-1.3-2-1.3-1.3-1.5 0.5 0 1-0.3 1-0.3 0.3 0 1.3 0.3 2.3 1 1.3 0.8 2 1.3 2.3 1.3 0.3-0.3-0.3-0.8-0.8-1 0 0-0.8-0.3-1.5-0.8s-1-0.8-1-0.8C24 15.4 27.6 17.5 27.6 18zM25.3 15.2c0.8 0.3 3.3 2 3 2 -0.3 0-0.8-0.3-1.5-0.5 -0.5-0.5-1.3-1-1.3-1 -0.3 0-1-0.5-1-0.5S25.1 15.2 25.3 15.2zM29.4 13.9c0.3 0 0.5 0.3 0.5 0.3 0.3 0-0.5 1.8-0.8 2 -0.3 0.3-0.5 0.3-1.3-0.3 -0.8-0.3-1.5-0.8-1.8-0.8 -0.5-0.3-1-1-0.5-1 0 0 0.8 0.5 1.3 0.8 1.5 1 2 1 2 0.5 0 0 0-0.3-0.3-0.3 -0.5 0-2.3-0.8-2.5-1.3 0 0 0-0.3 0-0.5 0.3 0 0.8 0.3 1.8 0.8 1.5 1 1.5 1 1.5 0.8 0-0.3-0.5-0.8-1.3-1 -1.5-0.8-1.8-1-1.5-1.3C26.6 12.4 28.1 12.9 29.4 13.9zM26.8 9.6c0.3 0 3 1.8 3 2 0 0.3-0.3 0.3-1.8-0.8 -0.5-0.3-1.3-0.5-1.3-0.5 -0.3 0-0.3 0.3 0 0.3 0 0 0.3 0.3 0.8 0.5 0.5 0.3 1.3 0.8 1.5 1 1.3 0.5 1.3 0.5 1 1 -0.3 0.3-0.3 0.3-1.8-0.3 -1.3-0.8-1.5-1-1.8-1.5C26.3 10.1 26.3 9.6 26.8 9.6zM26.8 8.8c0.5 0.3 1.3 0.5 1.5 0.8 0.5 0 0.8 0.3 1 0.3 0.3 0 0.5 0.5 0.3 0.5 0 0-0.5 0-1.3-0.5 -0.8-0.3-1.5-0.5-1.8-0.8 -0.3 0-0.8-0.3-0.8-0.3C25.8 8.5 26.3 8.5 26.8 8.8zM25.6 7.8c0.5 0 0.5 0.3 0.5 0.3s-0.3 0-0.8 0c-0.3 0-0.3-0.3-0.3-0.3S25.3 7.8 25.6 7.8zM20.7 5.5c-0.3 0 3 1.5 3.3 1.5 0.3 0 0.5 0.3 0.5 0.3 0 0.3-0.5 0-1.5-0.3 -0.8-0.3-1.8-0.5-2.3-0.5 -0.5 0-1.3-0.3-2-0.5 -1.3-0.8-1.5-0.8-0.8-0.8 0.3 0 1 0 1.5 0.5 0.8 0.5 1.3 0.8 1.3 0.5 0 0-0.3-0.3-0.8-0.5l-0.8-0.5h1C20.7 5 22 5.5 23.3 6c2.3 0.8 5.6 2.3 5.6 2.6 0 0.3-5.8-2-7.4-2.8C21.3 5.5 20.7 5.5 20.7 5.5zM7 6.7c0 0 0.5 0 0.8 0.3 0.5 0.3 0.8 0.3 0.5 0.3C8 7.5 6.8 6.7 7 6.7zM4.5 6c0-0.3 0.5-0.5 0.8-0.5C6 5.2 6.3 5 8 3.7l1-0.8v0.8c-0.3 0.8-0.3 0.8 1.3 1 0.8 0 1.8 0.3 2.8 1 0.8 0.3 1.3 0.8 1.3 0.8 -0.3 0-1-0.3-1.5-0.8 -1.5-0.8-2.5-0.8-1 0 0.3 0.3 0.8 0.5 0.5 0.5 -0.3 0-0.8-0.3-1.3-0.5C10.6 5.5 9.8 5 9.6 5 9.3 5 8.8 5 8.8 4.7c0 0-0.3 0-0.5 0 -0.5 0-0.5 0 0 0.3 0.5 0.5 0.3 0.5-0.5 0C7.5 5 7.3 5 7.3 5s0.5 0.5 1 0.8c0.8 0.5 1.3 0.8 1.3 1C9.3 7 8 6.7 7.5 6.5 7.3 6.2 7 6.2 6.5 6c-0.3 0-0.8-0.3-1-0.3 -0.3 0-0.5 0-0.5 0C5 6 5.5 6.2 6 6.2c0.3 0 0.8 0.3 0.5 0.3C6.3 6.7 4.5 6.2 4.5 6z"/>' .
                            '</svg>',
                        'depth'      => $depth,
                        'max_depth'  => $args['max_depth']
                    ) ) );
                    edit_comment_link( esc_html__( 'edit', 'pawfriends' ) );
                    ?>
				</div>
				<?php if ( ! $is_pingback_comment ) { ?>
					<div class="mkdf-text-holder" id="comment-<?php echo comment_ID(); ?>">
						<?php comment_text(); ?>
					</div>
				<?php } ?>
			</div>
		</div>
		<?php //li tag will be closed by WordPress after looping through child elements ?>
		<?php
	}
}

/* Taxonomy custom fields functions - START */

if ( ! function_exists( 'pawfriends_mikado_init_custom_taxonomy_fields' ) ) {
	function pawfriends_mikado_init_custom_taxonomy_fields() {
		do_action( 'pawfriends_mikado_action_custom_taxonomy_fields' );
	}
	
	add_action( 'after_setup_theme', 'pawfriends_mikado_init_custom_taxonomy_fields' );
}

if ( ! function_exists( 'pawfriends_mikado_taxonomy_fields_add' ) ) {
	function pawfriends_mikado_taxonomy_fields_add() {
		global $pawfriends_mikado_global_Framework;
		
		foreach ( $pawfriends_mikado_global_Framework->mkdTaxonomyOptions->taxonomyOptions as $key => $fields ) {
			add_action( $fields->scope . '_add_form_fields', 'pawfriends_mikado_taxonomy_fields_display_add', 10, 2 );
		}
	}
	
	add_action( 'after_setup_theme', 'pawfriends_mikado_taxonomy_fields_add', 11 );
}

if ( ! function_exists( 'pawfriends_mikado_taxonomy_fields_edit' ) ) {
	function pawfriends_mikado_taxonomy_fields_edit() {
		global $pawfriends_mikado_global_Framework;
		
		foreach ( $pawfriends_mikado_global_Framework->mkdTaxonomyOptions->taxonomyOptions as $key => $fields ) {
			add_action( $fields->scope . '_edit_form_fields', 'pawfriends_mikado_taxonomy_fields_display_edit', 10, 2 );
		}
	}
	
	add_action( 'after_setup_theme', 'pawfriends_mikado_taxonomy_fields_edit', 11 );
}

if ( ! function_exists( 'pawfriends_mikado_taxonomy_fields_display_add' ) ) {
	function pawfriends_mikado_taxonomy_fields_display_add( $taxonomy ) {
		global $pawfriends_mikado_global_Framework;
		
		foreach ( $pawfriends_mikado_global_Framework->mkdTaxonomyOptions->taxonomyOptions as $key => $fields ) {
			if ( $taxonomy == $fields->scope ) {
				$fields->render();
			}
		}
	}
}

if ( ! function_exists( 'pawfriends_mikado_taxonomy_fields_display_edit' ) ) {
	function pawfriends_mikado_taxonomy_fields_display_edit( $term, $taxonomy ) {
		global $pawfriends_mikado_global_Framework;
		
		foreach ( $pawfriends_mikado_global_Framework->mkdTaxonomyOptions->taxonomyOptions as $key => $fields ) {
			if ( $taxonomy == $fields->scope ) {
				$fields->render();
			}
		}
	}
}

if ( ! function_exists( 'pawfriends_mikado_save_taxonomy_custom_fields' ) ) {
	function pawfriends_mikado_save_taxonomy_custom_fields( $term_id ) {
		$fields = apply_filters( 'pawfriends_mikado_filter_taxonomy_fields', array() );
		
		foreach ( $fields as $value ) {
			if ( isset( $_POST[ $value ] ) && '' !== $_POST[ $value ] ) {
				add_term_meta( $term_id, $value, $_POST[ $value ] );
			}
		}
	}
	
	add_action( 'created_term', 'pawfriends_mikado_save_taxonomy_custom_fields', 10, 2 );
}

if ( ! function_exists( 'pawfriends_mikado_update_taxonomy_custom_fields' ) ) {
	function pawfriends_mikado_update_taxonomy_custom_fields( $term_id ) {
		$fields = apply_filters( 'pawfriends_mikado_filter_taxonomy_fields', array() );
		
		foreach ( $fields as $value ) {
			if ( isset( $_POST[ $value ] ) && '' !== $_POST[ $value ] ) {
				update_term_meta( $term_id, $value, $_POST[ $value ] );
			} else {
				update_term_meta( $term_id, $value, '' );
			}
		}
	}
	
	add_action( 'edited_term', 'pawfriends_mikado_update_taxonomy_custom_fields', 10, 2 );
}

if ( ! function_exists( 'pawfriends_mikado_tax_add_script' ) ) {
	function pawfriends_mikado_tax_add_script() {
		wp_enqueue_media();
		wp_enqueue_script( 'mkdf-tax-js', MIKADO_FRAMEWORK_ROOT . '/admin/assets/js/mkdf-ui/mkdf-tax-custom-fields.js' );
	}
	
	add_action( 'admin_enqueue_scripts', 'pawfriends_mikado_tax_add_script' );
}

/** Taxonomy Delete Image **/
if ( ! function_exists( 'pawfriends_mikado_tax_del_image' ) ) {
	function pawfriends_mikado_tax_del_image() {
		/** If we don't have a term_id, bail out **/
		if ( ! isset( $_GET['term_id'] ) ) {
			esc_html_e( 'Not Set or Empty', 'pawfriends' );
			exit;
		}
		
		$field_name = $_GET['field_name'];
		$term_id    = $_GET['term_id'];
		$imageID    = get_term_meta( $term_id, $field_name, true );  // Get our attachment ID
		
		if ( is_numeric( $imageID ) ) {                              // Verify that the attachment ID is indeed a number
			wp_delete_attachment( $imageID );                       // Delete our image
			delete_term_meta( $term_id, $field_name );// Delete our image meta
			exit;
		}
		
		esc_html_e( 'Contact Administrator', 'pawfriends' ); // If we've reached this point, something went wrong - enable debugging
		exit;
	}
	
	add_action( 'wp_ajax_pawfriends_mikado_tax_del_image', 'pawfriends_mikado_tax_del_image' );
}

/* Taxonomy custom fields functions - END */

/* User custom fields functions - START */

if ( ! function_exists( 'pawfriends_mikado_user_add_script' ) ) {
	function pawfriends_mikado_user_add_script() {
		wp_enqueue_script( 'mkdf-user-js', MIKADO_FRAMEWORK_ROOT . '/admin/assets/js/mkdf-ui/mkdf-user-custom-fields.js' );
	}

	add_action( 'admin_enqueue_scripts', 'pawfriends_mikado_user_add_script' );
}


if ( ! function_exists( 'pawfriends_mikado_init_custom_user_fields' ) ) {
	function pawfriends_mikado_init_custom_user_fields() {
		do_action( 'pawfriends_mikado_action_custom_user_fields' );
	}
	
	add_action( 'after_setup_theme', 'pawfriends_mikado_init_custom_user_fields' );
}

if ( ! function_exists( 'pawfriends_mikado_user_fields_edit' ) ) {
	function pawfriends_mikado_user_fields_edit($user) {
		global $pawfriends_mikado_global_Framework;

		foreach ( $pawfriends_mikado_global_Framework->mkdUserOptions->userOptions as $key => $fields ) {

			$display_fields = false;
			foreach ($user->roles as $role) {
				if (in_array($role, $fields->scope)){
					$display_fields = true;
					break;
				}
			}
			if ( $display_fields ) {
				$fields->render();
			}
		}
	}
	
	add_action('show_user_profile', 'pawfriends_mikado_user_fields_edit');
	add_action('edit_user_profile', 'pawfriends_mikado_user_fields_edit');
}

if ( ! function_exists( 'pawfriends_mikado_save_user_fields' ) ) {
	function pawfriends_mikado_save_user_fields($user_id) {

		$fields = apply_filters( 'pawfriends_mikado_filter_user_fields', array() );

		foreach ( $fields as $value ) {
			if ( isset( $_POST[ $value ] ) && '' !== $_POST[ $value ] ) {
				update_user_meta( $user_id, $value, $_POST[ $value ] );
			}
		}
	}
		
	add_action( 'personal_options_update', 'pawfriends_mikado_save_user_fields');
	add_action( 'edit_user_profile_update', 'pawfriends_mikado_save_user_fields');
}
/* User custom fields functions - END */

/** User Delete Image **/
if ( ! function_exists( 'pawfriends_mikado_user_del_image' ) ) {
	function pawfriends_mikado_user_del_image() {
		/** If we don't have a term_id, bail out **/
		if ( ! isset( $_GET['user_id'] ) ) {
			esc_html_e( 'Not Set or Empty', 'pawfriends' );
			exit;
		}

		$field_name = $_GET['field_name'];
		$user_id    = $_GET['user_id'];
		$imageID    = get_user_meta( $user_id, $field_name, true );;  // Get our attachment ID

		if ( is_numeric( $imageID ) ) {               // Verify that the attachment ID is indeed a number
			delete_user_meta( $user_id, $field_name );// Delete our image meta
			exit;
		}

		esc_html_e( 'Contact Administrator', 'pawfriends' ); // If we've reached this point, something went wrong - enable debugging
		exit;
	}

	add_action( 'wp_ajax_pawfriends_mikado_user_del_image', 'pawfriends_mikado_user_del_image' );
}
?>