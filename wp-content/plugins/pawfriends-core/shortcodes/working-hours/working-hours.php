<?php
namespace PawFriendsCore\CPT\Shortcodes\WorkingHours;

use PawFriendsCore\Lib;

class WorkingHours implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'mkdf_working_hours';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Working Hours', 'pawfriends-core' ),
					'base'                      => $this->getBase(),
					'icon'                      => 'icon-wpb-working-hours extended-custom-icon',
					'category'                  => esc_html__( 'by PAWFRIENDS', 'pawfriends-core' ),
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'pawfriends-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'pawfriends-core' )
						),
                        array(
                            'type'        => 'colorpicker',
                            'param_name'  => 'hours_color',
                            'heading'     => esc_html__( 'Hours Color', 'pawfriends-core' ),
                        ),
                        array(
                            'type'        => 'colorpicker',
                            'param_name'  => 'hours_bg_color',
                            'heading'     => esc_html__( 'Hours Background Color', 'pawfriends-core' ),
                        ),
                        array(
                            'type'       => 'param_group',
                            'param_name' => 'working_hour_items',
                            'heading'    => esc_html__( 'Working Hour Items', 'pawfriends-core' ),
                            'params'     => array(
                                array(
                                    'type'       => 'textfield',
                                    'param_name' => 'day',
                                    'heading'    => esc_html__( 'Day of the Week', 'pawfriends-core' ),
                                ),
                                array(
                                    'type'       => 'textfield',
                                    'param_name' => 'hour',
                                    'heading'    => esc_html__( 'Working Hours', 'pawfriends-core' ),
                                ),
                            )
                        )
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'       => '',
            'working_hour_items' => '',
            'hours_color'        => '',
            'hours_bg_color'        => '',
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes']        = $this->getHolderClasses( $params );
        $params['working_hour_items']    = json_decode( urldecode( $params['working_hour_items'] ), true );
        $params['hours_styles']          = $this->getHoursStyles( $params );
        $params['hours_bg_styles']       = $this->getHoursBgStyles( $params );
        $params['hours_bg_color_styles'] = $this->getHoursBgColorStyles( $params );
		
		$html = pawfriends_core_get_shortcode_module_template_part( 'templates/working-hours', 'working-hours', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		
		return implode( ' ', $holderClasses );
	}

    private function getHoursStyles( $params ) {
        $itemStyle = array();

        if ( ! empty( $params['hours_color'] ) ) {
            $itemStyle[] = 'color: ' . $params['hours_color'];
        }

        return implode( ';', $itemStyle );
    }

    private function getHoursBgStyles( $params ) {
        $itemStyle = array();

        if ( ! empty( $params['hours_bg_color'] ) ) {
            $itemStyle[] = 'color: ' . $params['hours_bg_color'];
        }

        return implode( ';', $itemStyle );
    }

    private function getHoursBgColorStyles( $params ) {
        $itemStyle = array();

        if ( ! empty( $params['hours_bg_color'] ) ) {
            $itemStyle[] = 'background-color: ' . $params['hours_bg_color'];
        }

        return implode( ';', $itemStyle );
    }
}