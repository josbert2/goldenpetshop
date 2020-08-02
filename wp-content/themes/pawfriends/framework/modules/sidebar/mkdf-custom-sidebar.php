<?php

/**
 * Mikado Sidebar
 * Class for adding custom widget area and choose them on single pages/posts/portfolios
 */
if ( ! class_exists( 'PawFriendsMikadoClassSidebar' ) ) {
	class PawFriendsMikadoClassSidebar {
		var $sidebars = array();
		var $stored = "";
		
		// load needed stuff on widget page
		function __construct() {
			$this->stored = 'mkdf_sidebars';
			$this->title  = esc_html__( 'Custom Widget Area', 'pawfriends' );
			
			add_action( 'load-widgets.php', array( &$this, 'load_assets' ), 5 );
			add_action( 'widgets_init', array( &$this, 'register_custom_sidebars' ), 1000 );
			add_action( 'wp_ajax_mkdf_ajax_delete_custom_sidebar', array( &$this, 'delete_sidebar_area' ), 1000 );
		}
		
		//load css, js and add hooks to the widget page
		function load_assets() {
			add_action( 'admin_print_scripts', array( &$this, 'template_add_widget_field' ) );
			add_action( 'load-widgets.php', array( &$this, 'add_sidebar_area' ), 100 );
			
			wp_enqueue_script( 'mkdf-admin-sidebar-script', MIKADO_ROOT . '/framework/admin/assets/js/mkdf-ui/mkdf-sidebar.js' );
			wp_enqueue_style( 'mkdf-admin-sidebar', MIKADO_ROOT . '/framework/admin/assets/css/mkdf-sidebar.css' );
		}
		
		//widget form template
		function template_add_widget_field() {
			$nonce = '<input type="hidden" name="mkdf-delete-sidebar" value="' . wp_create_nonce('mkdf-delete-sidebar') . '" />';
			
			echo "\n<script type='text/html' id='mkdf-add-widget'>";
			echo "\n  <form class='mkdf-add-widget' method='POST'>";
			echo "\n  <h3>" . esc_html($this->title) . "</h3>";
			echo "\n    <span class='input_wrap'><input type='text' value='' placeholder = '" . esc_attr__('Enter Name of the new Widget Area', 'pawfriends') . "' name='mkdf-add-widget' /></span>";
			echo "\n    <input class='button' type='submit' value='" . esc_attr__('Add Widget Area', 'pawfriends') . "' />";
			echo "\n    " . $nonce;
			echo "\n  </form>";
			echo "\n</script>\n";
		}
		
		//add sidebar area to the db
		function add_sidebar_area() {
			if ( ! empty( $_POST['mkdf-add-widget'] ) ) {
				$this->sidebars = get_option( $this->stored );
				$name           = $this->get_name( $_POST['mkdf-add-widget'] );
				
				if ( empty( $this->sidebars ) ) {
					$this->sidebars = array( $name );
				} else {
					$this->sidebars = array_merge( $this->sidebars, array( $name ) );
				}
				
				update_option( $this->stored, $this->sidebars );
				wp_redirect( admin_url( 'widgets.php' ) );
				die();
			}
		}
		
		//delete sidebar area from the db
		function delete_sidebar_area() {
			check_ajax_referer( 'mkdf-delete-sidebar' );
			
			if ( ! empty( $_POST['name'] ) ) {
				$name           = stripslashes( $_POST['name'] );
				$this->sidebars = get_option( $this->stored );
				
				if ( ( $key = array_search( $name, $this->sidebars ) ) !== false ) {
					unset( $this->sidebars[ $key ] );
					update_option( $this->stored, $this->sidebars );
					echo "sidebar-deleted";
				}
			}
			
			die();
		}
		
		//checks the user submitted name and makes sure that there are no colitions
		function get_name( $name ) {
			if ( empty( $GLOBALS['wp_registered_sidebars'] ) ) {
				return $name;
			}
			
			$taken = array();
			foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
				$taken[] = $sidebar['name'];
			}
			
			if ( empty( $this->sidebars ) ) {
				$this->sidebars = array();
			}
			$taken = array_merge( $taken, $this->sidebars );
			
			if ( in_array( $name, $taken ) ) {
				$counter  = substr( $name, - 1 );
				$new_name = ! is_numeric( $counter ) ? $name . " 1" : substr( $name, 0, - 1 ) . ( (int) $counter + 1 );
				$name     = $this->get_name( $new_name );
			}
			
			return $name;
		}
		
		//register custom sidebar areas
		function register_custom_sidebars() {
			if ( empty( $this->sidebars ) ) {
				$this->sidebars = get_option( $this->stored );
			}
			
			$args = array(
				'before_widget' => '<div class="widget %2$s">',
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
			);
			
			$args = apply_filters( 'pawfriends_mikado_filter_custom_widget_args', $args );
			
			if ( is_array( $this->sidebars ) ) {
				foreach ( $this->sidebars as $sidebar ) {
					$args['name']  = $sidebar;
					$args['id']    = sanitize_title( $sidebar );
					$args['class'] = 'mkdf-custom';
					register_sidebar( $args );
				}
			}
		}
	}
}