<?php

if ( class_exists( 'PawFriendsCoreClassWidget' ) ) {
	class PawFriendsMikadoClassButtonWidget extends PawFriendsCoreClassWidget {
		public function __construct() {
			parent::__construct(
				'mkdf_button_widget',
				esc_html__( 'PawFriends Button Widget', 'pawfriends' ),
				array( 'description' => esc_html__( 'Add button element to widget areas', 'pawfriends' ) )
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
						'solid'   => esc_html__( 'Solid', 'pawfriends' ),
						'outline' => esc_html__( 'Outline', 'pawfriends' ),
						'simple'  => esc_html__( 'Simple', 'pawfriends' )
					)
				),
				array(
					'type'        => 'dropdown',
					'name'        => 'size',
					'title'       => esc_html__( 'Size', 'pawfriends' ),
					'options'     => array(
						'small'  => esc_html__( 'Small', 'pawfriends' ),
						'medium' => esc_html__( 'Medium', 'pawfriends' ),
						'large'  => esc_html__( 'Large', 'pawfriends' ),
						'huge'   => esc_html__( 'Huge', 'pawfriends' )
					),
					'description' => esc_html__( 'This option is only available for solid and outline button type', 'pawfriends' )
				),
				array(
					'type'    => 'textfield',
					'name'    => 'text',
					'title'   => esc_html__( 'Text', 'pawfriends' ),
					'default' => esc_html__( 'Button Text', 'pawfriends' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'link',
					'title' => esc_html__( 'Link', 'pawfriends' )
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'target',
					'title'   => esc_html__( 'Link Target', 'pawfriends' ),
					'options' => pawfriends_mikado_get_link_target_array()
				),
				array(
					'type'  => 'colorpicker',
					'name'  => 'color',
					'title' => esc_html__( 'Color', 'pawfriends' )
				),
				array(
					'type'  => 'colorpicker',
					'name'  => 'hover_color',
					'title' => esc_html__( 'Hover Color', 'pawfriends' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'background_color',
					'title'       => esc_html__( 'Background Color', 'pawfriends' ),
					'description' => esc_html__( 'This option is only available for solid button type', 'pawfriends' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'hover_background_color',
					'title'       => esc_html__( 'Hover Background Color', 'pawfriends' ),
					'description' => esc_html__( 'This option is only available for solid button type', 'pawfriends' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'border_color',
					'title'       => esc_html__( 'Border Color', 'pawfriends' ),
					'description' => esc_html__( 'This option is only available for solid and outline button type', 'pawfriends' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'hover_border_color',
					'title'       => esc_html__( 'Hover Border Color', 'pawfriends' ),
					'description' => esc_html__( 'This option is only available for solid and outline button type', 'pawfriends' )
				),
				array(
					'type'        => 'textfield',
					'name'        => 'margin',
					'title'       => esc_html__( 'Margin', 'pawfriends' ),
					'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'pawfriends' )
				)
			);
		}
		
		public function widget( $args, $instance ) {
			$params = '';
			
			if ( ! is_array( $instance ) ) {
				$instance = array();
			}
			
			// Filter out all empty params
			$instance = array_filter( $instance, function ( $array_value ) {
				return trim( $array_value ) != '';
			} );
			
			// Default values
			if ( ! isset( $instance['text'] ) ) {
				$instance['text'] = 'Button Text';
                $paw_background = ( pawfriends_mikado_options()->getOptionValue( 'decorative_paw_background' ) === "yes" ? 'yes' : 'no' );
                if ( $paw_background === 'yes') {
                    $instance['paw_background'] = 'yes';
                }
			}
			
			// Generate shortcode params
			foreach ( $instance as $key => $value ) {
				$params .= " $key='$value' ";
			}
			
			echo '<div class="widget mkdf-button-widget">';
			echo do_shortcode( "[mkdf_button $params]" ); // XSS OK
			echo '</div>';
		}
	}
}