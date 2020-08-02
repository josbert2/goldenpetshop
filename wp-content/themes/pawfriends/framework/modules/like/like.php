<?php

class PawFriendsMikadoClassLike {
	private static $instance;
	
	private function __construct() {
		add_action( 'wp_ajax_pawfriends_mikado_like', array( $this, 'ajax' ) );
		add_action( 'wp_ajax_nopriv_pawfriends_mikado_like', array( $this, 'ajax' ) );
	}
	
	public static function get_instance() {
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		
		return self::$instance;
	}
	
	function ajax() {
		
		//update
		if ( isset( $_POST['likes_id'] ) ) {
			$post_id = str_replace( 'mkdf-like-', '', $_POST['likes_id'] );
			$post_id = substr( $post_id, 0, - 4 );
			$type    = isset( $_POST['type'] ) ? $_POST['type'] : '';
			
			echo wp_kses( $this->like_post( $post_id, 'update', $type ), array(
				'span' => array(
					'class'       => true,
					'aria-hidden' => true,
					'style'       => true,
					'id'          => true
				),
				'svg'    => array(
					'xmlns'   => true,
                    'class'   => true,
					'viewbox' => true,
                    'width'   => true,
                    'height'  => true,
				),
                'path'   => array(
                    'd'  => true,
                )
			) );
		} //get
		else {
			$post_id = str_replace( 'mkdf-like-', '', $_POST['likes_id'] );
			$post_id = substr( $post_id, 0, - 4 );
			echo wp_kses( $this->like_post( $post_id, 'get' ), array(
				'span' => array(
					'class'       => true,
					'aria-hidden' => true,
					'style'       => true,
					'id'          => true
				),
                'svg'    => array(
                    'xmlns'   => true,
                    'class'   => true,
                    'viewbox' => true,
                    'width'   => true,
                    'height'  => true,
                ),
                'path'   => array(
                    'd'  => true,
                )
			) );
		}
		
		exit;
	}
	
	public function like_post( $post_id, $action = 'get', $type = '' ) {
		if ( ! is_numeric( $post_id ) ) {
			return;
		}
		
		switch ( $action ) {
			
			case 'get':
				$like_count = get_post_meta( $post_id, '_mkdf-like', true );

				$icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 33 24" class="mkdf-heart" width="33" height="24">' .
                        '<path d="M19.8 22.5c1.4 0.9 11.2-5.6 12.1-8.9 0.5-1.4-1.9-3.3-4.2-3.3 -0.9 0-2.3 0-2.8 0.5 -0.5 0.5-0.5 0 0.5-1.9 1.4-2.3 1.4-4.2 0-5.6 -0.9-0.9-1.4-1.4-3.7-1.4 -2.3-0.5-3.3 0-5.1 0.9 -1.4 0.5-2.8 1.4-2.8 1.9 -0.9 1.4-1.4 1.4-2.3-0.5C10.5 2.4 7.7 1 5.9 1 4 1 2.2 2.9 1.7 5.7 0.8 7.5 0.8 8 1.7 9.9c0.9 2.3 4.2 7 5.6 7.9 0.9 0.5 2.3 1.9 3.3 2.8 1.4 0.9 2.8 1.9 3.3 2.3 0 0 0.5 0 0.9 0 0.5 0.5 0.9-1.4 0.5-1.4 0-0.5 0.5-1.4 1.4-1.9l1.9-1.9 1.4 1.4c0.9 1.4 0.9 1.4 0.5 1.9C19.4 21.5 19.4 22 19.8 22.5zM17.5 14.5c0.5 1.9 0.5 2.3 0 3.3l-2.8 1.4c-2.3 0.5-3.7 0-6.5-1.9C5.4 15 2.6 9.4 2.6 7.1c0-1.9 1.4-4.7 3.3-4.7 2.8-0.5 5.6 2.8 5.6 6.5 0 0.5 0.5 1.4 0.9 1.4 0.5 0.9 0.9 0.5 1.4-2.8 0.9-5.1 11.6-7 11.6-1.4 0 0.5-0.5 1.9-0.9 2.8 -0.5 0.9-0.9 0.9-2.8 0.9 -1.4-0.5-2.3 0-3.3 0.9C17.1 11.7 17.1 11.7 17.5 14.5zM19.8 10.8c0.5 0 3.3 0 2.8 0.5 0 0.5-0.5 1.4-1.4 2.8l-1.9 1.9 -0.5-1.4C18.4 13.1 18.9 11.3 19.8 10.8zM19.4 17.3l1.9-2.3c1.4-1.4 1.9-1.9 2.8-1.9 0.5 0 1.4 0 1.9-0.5 1.4-1.9 5.1-0.9 5.1 0.9 0 0.9-4.2 4.7-6.5 5.6 -0.9 0.9-1.9 1.4-1.9 1.4s-0.9-0.9-1.4-1.9L19.4 17.3z"/>' .
                        '</svg>';

				if ( ! $like_count ) {
					$like_count = 0;
					add_post_meta( $post_id, '_mkdf-like', $like_count, true );
                    $icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 33 24" class="mkdf-heart" width="33" height="24">' .
                            '<path d="M19.8 22.5c1.4 0.9 11.2-5.6 12.1-8.9 0.5-1.4-1.9-3.3-4.2-3.3 -0.9 0-2.3 0-2.8 0.5 -0.5 0.5-0.5 0 0.5-1.9 1.4-2.3 1.4-4.2 0-5.6 -0.9-0.9-1.4-1.4-3.7-1.4 -2.3-0.5-3.3 0-5.1 0.9 -1.4 0.5-2.8 1.4-2.8 1.9 -0.9 1.4-1.4 1.4-2.3-0.5C10.5 2.4 7.7 1 5.9 1 4 1 2.2 2.9 1.7 5.7 0.8 7.5 0.8 8 1.7 9.9c0.9 2.3 4.2 7 5.6 7.9 0.9 0.5 2.3 1.9 3.3 2.8 1.4 0.9 2.8 1.9 3.3 2.3 0 0 0.5 0 0.9 0 0.5 0.5 0.9-1.4 0.5-1.4 0-0.5 0.5-1.4 1.4-1.9l1.9-1.9 1.4 1.4c0.9 1.4 0.9 1.4 0.5 1.9C19.4 21.5 19.4 22 19.8 22.5zM17.5 14.5c0.5 1.9 0.5 2.3 0 3.3l-2.8 1.4c-2.3 0.5-3.7 0-6.5-1.9C5.4 15 2.6 9.4 2.6 7.1c0-1.9 1.4-4.7 3.3-4.7 2.8-0.5 5.6 2.8 5.6 6.5 0 0.5 0.5 1.4 0.9 1.4 0.5 0.9 0.9 0.5 1.4-2.8 0.9-5.1 11.6-7 11.6-1.4 0 0.5-0.5 1.9-0.9 2.8 -0.5 0.9-0.9 0.9-2.8 0.9 -1.4-0.5-2.3 0-3.3 0.9C17.1 11.7 17.1 11.7 17.5 14.5zM19.8 10.8c0.5 0 3.3 0 2.8 0.5 0 0.5-0.5 1.4-1.4 2.8l-1.9 1.9 -0.5-1.4C18.4 13.1 18.9 11.3 19.8 10.8zM19.4 17.3l1.9-2.3c1.4-1.4 1.9-1.9 2.8-1.9 0.5 0 1.4 0 1.9-0.5 1.4-1.9 5.1-0.9 5.1 0.9 0 0.9-4.2 4.7-6.5 5.6 -0.9 0.9-1.9 1.4-1.9 1.4s-0.9-0.9-1.4-1.9L19.4 17.3z"/>' .
                            '</svg>';
				}
				
				$return_value = $icon . '<span>' . esc_attr( $like_count ) . '</span>';
				
				return $return_value;
				break;
			
			case 'update':
				$like_count = get_post_meta( $post_id, '_mkdf-like', true );
				
				if ( isset( $_COOKIE[ 'mkdf-like_' . $post_id ] ) ) {
					return $like_count;
				}
				
				$like_count ++;
				
				update_post_meta( $post_id, '_mkdf-like', $like_count );
				setcookie( 'mkdf-like_' . $post_id, $post_id, time() * 20, '/' );
				
				$return_value = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 33 24" class="mkdf-heart" width="33" height="24">' .
                                '<path d="M19.8 22.5c1.4 0.9 11.2-5.6 12.1-8.9 0.5-1.4-1.9-3.3-4.2-3.3 -0.9 0-2.3 0-2.8 0.5 -0.5 0.5-0.5 0 0.5-1.9 1.4-2.3 1.4-4.2 0-5.6 -0.9-0.9-1.4-1.4-3.7-1.4 -2.3-0.5-3.3 0-5.1 0.9 -1.4 0.5-2.8 1.4-2.8 1.9 -0.9 1.4-1.4 1.4-2.3-0.5C10.5 2.4 7.7 1 5.9 1 4 1 2.2 2.9 1.7 5.7 0.8 7.5 0.8 8 1.7 9.9c0.9 2.3 4.2 7 5.6 7.9 0.9 0.5 2.3 1.9 3.3 2.8 1.4 0.9 2.8 1.9 3.3 2.3 0 0 0.5 0 0.9 0 0.5 0.5 0.9-1.4 0.5-1.4 0-0.5 0.5-1.4 1.4-1.9l1.9-1.9 1.4 1.4c0.9 1.4 0.9 1.4 0.5 1.9C19.4 21.5 19.4 22 19.8 22.5zM17.5 14.5c0.5 1.9 0.5 2.3 0 3.3l-2.8 1.4c-2.3 0.5-3.7 0-6.5-1.9C5.4 15 2.6 9.4 2.6 7.1c0-1.9 1.4-4.7 3.3-4.7 2.8-0.5 5.6 2.8 5.6 6.5 0 0.5 0.5 1.4 0.9 1.4 0.5 0.9 0.9 0.5 1.4-2.8 0.9-5.1 11.6-7 11.6-1.4 0 0.5-0.5 1.9-0.9 2.8 -0.5 0.9-0.9 0.9-2.8 0.9 -1.4-0.5-2.3 0-3.3 0.9C17.1 11.7 17.1 11.7 17.5 14.5zM19.8 10.8c0.5 0 3.3 0 2.8 0.5 0 0.5-0.5 1.4-1.4 2.8l-1.9 1.9 -0.5-1.4C18.4 13.1 18.9 11.3 19.8 10.8zM19.4 17.3l1.9-2.3c1.4-1.4 1.9-1.9 2.8-1.9 0.5 0 1.4 0 1.9-0.5 1.4-1.9 5.1-0.9 5.1 0.9 0 0.9-4.2 4.7-6.5 5.6 -0.9 0.9-1.9 1.4-1.9 1.4s-0.9-0.9-1.4-1.9L19.4 17.3z"/>' .
                                '</svg>' .
                                '<span>' . esc_attr( $like_count ) . '</span>';
				
				return $return_value;
				
				break;
			default:
				return '';
				break;
		}
	}
	
	public function add_like() {
		global $post;
		
		$output = $this->like_post( $post->ID );
		
		$class       = 'mkdf-like';
		$rand_number = rand( 100, 999 );
		$title       = esc_html__( 'Like this', 'pawfriends' );
		
		if ( isset( $_COOKIE[ 'mkdf-like_' . $post->ID ] ) ) {
			$class = 'mkdf-like liked';
			$title = esc_html__( 'You already like this!', 'pawfriends' );
		}
		
		return '<a href="#" class="' . esc_attr( $class ) . '" id="mkdf-like-' . esc_attr( $post->ID ) . '-' . $rand_number . '" title="' . esc_attr( $title ) . '">' . $output . '</a>';
	}
}

if ( ! function_exists( 'pawfriends_mikado_create_like' ) ) {
	function pawfriends_mikado_create_like() {
		PawFriendsMikadoClassLike::get_instance();
	}
	
	add_action( 'after_setup_theme', 'pawfriends_mikado_create_like' );
}