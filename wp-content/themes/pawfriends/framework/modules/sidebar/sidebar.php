<?php

if ( ! function_exists( 'pawfriends_mikado_register_sidebars' ) ) {
	/**
	 * Function that registers theme's sidebars
	 */
	function pawfriends_mikado_register_sidebars() {
		
		register_sidebar(
			array(
				'id'            => 'sidebar',
				'name'          => esc_html__( 'Sidebar', 'pawfriends' ),
				'description'   => esc_html__( 'Default Sidebar area. In order to display this area you need to enable it through global theme options or on page meta box options.', 'pawfriends' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="mkdf-widget-title-holder">' .
                                       '<span class="mkdf-active-hover">' .
                                           '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-left">' .
                                               '<path d="M2 0C0.9 0 0 0.9 0 2l2 23.8c0 1.1 0.9 2 2 2h3.9V0H2z"/>' .
                                           '</svg>' .
                                           '<span class="mkdf-active-hover-middle"></span>' .
                                           '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-right">' .
                                               '<path d="M5.9 0c1.1 0 2 0.9 2 2L5 25.8c-0.2 1.6-1.1 1.9-3 2H0V0H5.9"/>' .
                                           '</svg>' .
                                       '</span>' .
                                   '<h5 class="mkdf-widget-title">',
				'after_title'   => '</h5></div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'pawfriends_mikado_register_sidebars', 1 );
}

if ( ! function_exists( 'pawfriends_mikado_add_support_custom_sidebar' ) ) {
	/**
	 * Function that adds theme support for custom sidebars. It also creates PawFriendsMikadoClassSidebar object
	 */
	function pawfriends_mikado_add_support_custom_sidebar() {
		add_theme_support( 'PawFriendsMikadoClassSidebar' );
		
		if ( get_theme_support( 'PawFriendsMikadoClassSidebar' ) ) {
			new PawFriendsMikadoClassSidebar();
		}
	}
	
	add_action( 'after_setup_theme', 'pawfriends_mikado_add_support_custom_sidebar' );
}