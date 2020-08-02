<?php
/*
Plugin Name: PawFriends Instagram Feed
Description: Plugin that adds Instagram feed functionality to our theme
Author: Mikado Themes
Version: 1.0
*/
define('PAWFRIENDS_INSTAGRAM_FEED_VERSION', '1.0');
define('PAWFRIENDS_INSTAGRAM_ABS_PATH', dirname(__FILE__));
define('PAWFRIENDS_INSTAGRAM_REL_PATH', dirname(plugin_basename(__FILE__ )));
define( 'PAWFRIENDS_INSTAGRAM_URL_PATH', plugin_dir_url( __FILE__ ) );
define( 'PAWFRIENDS_INSTAGRAM_ASSETS_PATH', PAWFRIENDS_INSTAGRAM_ABS_PATH . '/assets' );
define( 'PAWFRIENDS_INSTAGRAM_ASSETS_URL_PATH', PAWFRIENDS_INSTAGRAM_URL_PATH . 'assets' );
define( 'PAWFRIENDS_INSTAGRAM_SHORTCODES_PATH', PAWFRIENDS_INSTAGRAM_ABS_PATH . '/shortcodes' );
define( 'PAWFRIENDS_INSTAGRAM_SHORTCODES_URL_PATH', PAWFRIENDS_INSTAGRAM_URL_PATH . 'shortcodes' );

include_once 'load.php';

if ( ! function_exists( 'pawfriends_instagram_theme_installed' ) ) {
    /**
     * Checks whether theme is installed or not
     * @return bool
     */
    function pawfriends_instagram_theme_installed() {
        return defined( 'MIKADO_ROOT' );
    }
}

if ( ! function_exists( 'pawfriends_instagram_feed_text_domain' ) ) {
	/**
	 * Loads plugin text domain so it can be used in translation
	 */
	function pawfriends_instagram_feed_text_domain() {
		load_plugin_textdomain( 'pawfriends-instagram-feed', false, PAWFRIENDS_INSTAGRAM_REL_PATH . '/languages' );
	}
	
	add_action( 'plugins_loaded', 'pawfriends_instagram_feed_text_domain' );
}