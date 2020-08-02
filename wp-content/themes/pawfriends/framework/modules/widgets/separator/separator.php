<?php

if ( class_exists( 'PawFriendsCoreClassWidget' ) ) {
	class PawFriendsMikadoClassSeparatorWidget extends PawFriendsCoreClassWidget {
		public function __construct() {
			parent::__construct(
				'mkdf_separator_widget',
				esc_html__( 'PawFriends Separator Widget', 'pawfriends' ),
				array( 'description' => esc_html__( 'Add a separator element to your widget areas', 'pawfriends' ) )
			);
			
			$this->setParams();
		}
		
		protected function setParams() {
			$this->params = array(
				array(
					'type'    => 'dropdown',
					'name'    => 'type',
					'title'   => esc_html__( 'Type', 'pawfriends' ),
					'options' => array(
						'normal'     => esc_html__( 'Normal', 'pawfriends' ),
						'full-width' => esc_html__( 'Full Width', 'pawfriends' )
					)
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'position',
					'title'   => esc_html__( 'Position', 'pawfriends' ),
					'options' => array(
						'center' => esc_html__( 'Center', 'pawfriends' ),
						'left'   => esc_html__( 'Left', 'pawfriends' ),
						'right'  => esc_html__( 'Right', 'pawfriends' )
					)
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'border_style',
					'title'   => esc_html__( 'Style', 'pawfriends' ),
					'options' => array(
						'solid'  => esc_html__( 'Solid', 'pawfriends' ),
						'dashed' => esc_html__( 'Dashed', 'pawfriends' ),
						'dotted' => esc_html__( 'Dotted', 'pawfriends' )
					)
				),
				array(
					'type'  => 'colorpicker',
					'name'  => 'color',
					'title' => esc_html__( 'Color', 'pawfriends' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'width',
					'title' => esc_html__( 'Width (px or %)', 'pawfriends' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'thickness',
					'title' => esc_html__( 'Thickness (px)', 'pawfriends' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'top_margin',
					'title' => esc_html__( 'Top Margin (px or %)', 'pawfriends' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'bottom_margin',
					'title' => esc_html__( 'Bottom Margin (px or %)', 'pawfriends' )
				)
			);
		}
		
		public function widget( $args, $instance ) {
			if ( ! is_array( $instance ) ) {
				$instance = array();
			}
			
			//prepare variables
			$params = '';
			
			//is instance empty?
			if ( is_array( $instance ) && count( $instance ) ) {
				//generate shortcode params
				foreach ( $instance as $key => $value ) {
					$params .= " $key='$value' ";
				}
			}
			
			echo '<div class="widget mkdf-separator-widget">';
			echo do_shortcode( "[mkdf_separator $params]" ); // XSS OK
			echo '</div>';
		}
	}
}