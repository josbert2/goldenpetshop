<?php
namespace PawFriendsCore\CPT\Shortcodes\Team;

use PawFriendsCore\Lib;

class TeamCarousel implements Lib\ShortcodeInterface {
    private $base;

    public function __construct() {
        $this->base = 'mkdf_team_carousel';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
	    if(function_exists('vc_map')) {
		    vc_map(
		    	array(
				    'name'     => esc_html__( 'Team Carousel', 'pawfriends-core' ),
				    'base'     => $this->base,
				    'category' => esc_html__( 'by PAWFRIENDS', 'pawfriends-core' ),
				    'icon'     => 'icon-wpb-team-carousel extended-custom-icon',
				    'as_parent'       => array( 'only' => 'mkdf_team' ),
				    'js_view'         => 'VcColumnView',
				    'params'   => array(
					    array(
						    'type'        => 'dropdown',
						    'param_name'  => 'number_of_visible_items',
						    'heading'     => esc_html__( 'Number of Visible Items', 'pawfriends-core' ),
						    'value'       => array(
							    esc_html__( 'One', 'pawfriends-core' )   => '1',
							    esc_html__( 'Two', 'pawfriends-core' )   => '2',
							    esc_html__( 'Three', 'pawfriends-core' ) => '3',
							    esc_html__( 'Four', 'pawfriends-core' )  => '4',
							    esc_html__( 'Five', 'pawfriends-core' )  => '5',
							    esc_html__( 'Six', 'pawfriends-core' )   => '6'
						    ),
						    'save_always' => true
					    ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'space_between_items',
                            'heading'     => esc_html__( 'Space Between Items', 'pawfriends-core' ),
                            'value'       => array_flip( pawfriends_mikado_get_space_between_items_array() ),
                            'save_always' => true
                        ),
					    array(
						    'type'        => 'dropdown',
						    'param_name'  => 'slider_loop',
						    'heading'     => esc_html__( 'Enable Slider Loop', 'pawfriends-core' ),
						    'value'       => array_flip( pawfriends_mikado_get_yes_no_select_array( false, true ) ),
						    'save_always' => true
					    ),
					    array(
						    'type'        => 'dropdown',
						    'param_name'  => 'slider_autoplay',
						    'heading'     => esc_html__( 'Enable Slider Autoplay', 'pawfriends-core' ),
						    'value'       => array_flip( pawfriends_mikado_get_yes_no_select_array( false, true ) ),
						    'save_always' => true
					    ),
					    array(
						    'type'        => 'textfield',
						    'param_name'  => 'slider_speed',
						    'heading'     => esc_html__( 'Slide Duration', 'pawfriends-core' ),
						    'description' => esc_html__( 'Default value is 5000 (ms)', 'pawfriends-core' )
					    ),
					    array(
						    'type'        => 'textfield',
						    'param_name'  => 'slider_speed_animation',
						    'heading'     => esc_html__( 'Slide Animation Duration', 'pawfriends-core' ),
						    'description' => esc_html__( 'Speed of slide animation in milliseconds. Default value is 600.', 'pawfriends-core' )
					    )
				    )
			    )
		    );
	    }
    }
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'number_of_visible_items' => '3',
			'space_between_items'     => 'normal',
			'slider_loop'             => 'yes',
			'slider_autoplay'         => 'yes',
			'slider_speed'            => '5000',
			'slider_speed_animation'  => '600'
		);
		$params = shortcode_atts( $args, $atts );
		
		$holder_classes = $this->getHolderClasses( $params, $args );
		$slider_data    = $this->getSliderData( $params );
		
		$html = '<div class="mkdf-team-carousel-holder ' . esc_attr( $holder_classes ) . '">';
			$html .= '<div class="mkdf-tc-inner mkdf-owl-slider" ' . pawfriends_mikado_get_inline_attrs( $slider_data ) . '>';
				$html .= do_shortcode( $content );
			$html .= '</div>';
		$html .= '</div>';
		
		return $html;
	}
	
	private function getHolderClasses( $params, $args ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['space_between_items'] ) ? 'mkdf-' . $params['space_between_items'] . '-space' : 'mkdf-' . $args['space_between_items'] . '-space';
		
		return implode( ' ', $holderClasses );
	}
	
	private function getSliderData( $params ) {
		$slider_data = array();
		
		$slider_data['data-number-of-items']        = $params['number_of_visible_items'] !== '' ? $params['number_of_visible_items'] : '3';
		$slider_data['data-enable-loop']            = ! empty( $params['slider_loop'] ) ? $params['slider_loop'] : '';
		$slider_data['data-enable-autoplay']        = ! empty( $params['slider_autoplay'] ) ? $params['slider_autoplay'] : '';
		$slider_data['data-slider-speed']           = ! empty( $params['slider_speed'] ) ? $params['slider_speed'] : '5000';
		$slider_data['data-slider-speed-animation'] = ! empty( $params['slider_speed_animation'] ) ? $params['slider_speed_animation'] : '600';
		$slider_data['data-enable-navigation']      = 'no';
		$slider_data['data-enable-pagination']      = 'no';
		
		return $slider_data;
	}
}