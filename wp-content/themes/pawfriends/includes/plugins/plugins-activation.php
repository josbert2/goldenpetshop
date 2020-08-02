<?php

if ( ! function_exists( 'pawfriends_mikado_register_required_plugins' ) ) {
	/**
	 * Registers theme required and optional plugins. Hooks to tgmpa_register hook
	 */
	function pawfriends_mikado_register_required_plugins() {
		$plugins = array(
			array(
				'name'               => esc_html__( 'WPBakery Visual Composer', 'pawfriends' ),
				'slug'               => 'js_composer',
				'source'             => get_template_directory() . '/includes/plugins/js_composer.zip',
				'version'            => '6.0.5',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'               => esc_html__( 'Revolution Slider', 'pawfriends' ),
				'slug'               => 'revslider',
				'source'             => get_template_directory() . '/includes/plugins/revslider.zip',
				'version'            => '6.1.1',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'               => esc_html__( 'PawFriends Core', 'pawfriends' ),
				'slug'               => 'pawfriends-core',
				'source'             => get_template_directory() . '/includes/plugins/pawfriends-core.zip',
				'version'            => '1.0',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'               => esc_html__( 'PawFriends Instagram Feed', 'pawfriends' ),
				'slug'               => 'pawfriends-instagram-feed',
				'source'             => get_template_directory() . '/includes/plugins/pawfriends-instagram-feed.zip',
				'version'            => '1.0',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'               => esc_html__( 'PawFriends Twitter Feed', 'pawfriends' ),
				'slug'               => 'pawfriends-twitter-feed',
				'source'             => get_template_directory() . '/includes/plugins/pawfriends-twitter-feed.zip',
				'version'            => '1.0',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'     => esc_html__( 'WooCommerce plugin', 'pawfriends' ),
				'slug'     => 'woocommerce',
				'required' => false
			),
			array(
				'name'     => esc_html__( 'Contact Form 7', 'pawfriends' ),
				'slug'     => 'contact-form-7',
				'required' => false
			),
			array(
				'name'     => esc_html__( 'Envato Market', 'pawfriends' ),
				'slug'     => 'envato-market',
				'source'   => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
				'required' => false
			)
		);
		
		$config = array(
			'domain'       => 'pawfriends',
			'default_path' => '',
			'parent_slug'  => 'themes.php',
			'capability'   => 'edit_theme_options',
			'menu'         => 'install-required-plugins',
			'has_notices'  => true,
			'is_automatic' => false,
			'message'      => '',
			'strings'      => array(
				'page_title'                      => esc_html__( 'Install Required Plugins', 'pawfriends' ),
				'menu_title'                      => esc_html__( 'Install Plugins', 'pawfriends' ),
				'installing'                      => esc_html__( 'Installing Plugin: %s', 'pawfriends' ),
				'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'pawfriends' ),
				'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'pawfriends' ),
				'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'pawfriends' ),
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'pawfriends' ),
				'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'pawfriends' ),
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'pawfriends' ),
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'pawfriends' ),
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'pawfriends' ),
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'pawfriends' ),
				'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'pawfriends' ),
				'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'pawfriends' ),
				'return'                          => esc_html__( 'Return to Required Plugins Installer', 'pawfriends' ),
				'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'pawfriends' ),
				'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'pawfriends' ),
				'nag_type'                        => 'updated'
			)
		);
		
		tgmpa( $plugins, $config );
	}
	
	add_action( 'tgmpa_register', 'pawfriends_mikado_register_required_plugins' );
}