<?php
namespace PawFriendsCore\CPT\Shortcodes\ProgressBar;

use PawFriendsCore\Lib;

class ProgressBar implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'mkdf_progress_bar';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Progress Bar', 'pawfriends-core' ),
					'base'                      => $this->base,
					'icon'                      => 'icon-wpb-progress-bar extended-custom-icon',
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
							'type'       => 'textfield',
							'param_name' => 'percent',
							'heading'    => esc_html__( 'Percentage', 'pawfriends-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'percentage_type',
							'heading'    => esc_html__( 'Percentage Type', 'pawfriends-core' ),
							'value'      => array(
								esc_html__( 'Default', 'pawfriends-core' )  => '',
								esc_html__( 'Floating', 'pawfriends-core' ) => 'floating'
							),
							'dependency'  => array( 'element' => 'percent', 'not_empty' => true )
						),
                        array(
                            'type'       => 'colorpicker',
                            'param_name' => 'percentage_bg_color',
                            'heading'    => esc_html__( 'Percentage Background Color', 'pawfriends-core' ),
                            'dependency'  => array( 'element' => 'percent', 'not_empty' => true )
                        ),
						array(
							'type'       => 'textfield',
							'param_name' => 'title',
							'heading'    => esc_html__( 'Title', 'pawfriends-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_tag',
							'heading'     => esc_html__( 'Title Tag', 'pawfriends-core' ),
							'value'       => array_flip( pawfriends_mikado_get_title_tag( true, array( 'p' => 'p' ) ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'title', 'not_empty' => true )
						),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'title_size',
                            'heading'     => esc_html__( 'Title Size (px or em)', 'pawfriends-core' ),
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'title_font_weight',
                            'heading'     => esc_html__( 'Title Font Weight', 'pawfriends-core' ),
                            'value'       => array_flip( pawfriends_mikado_get_font_weight_array( true ) ),
                            'dependency'  => array( 'element' => 'title', 'not_empty' => true )
                        ),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_color',
							'heading'    => esc_html__( 'Title Color', 'pawfriends-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'color_active',
							'heading'    => esc_html__( 'Active Color', 'pawfriends-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'color_inactive',
							'heading'    => esc_html__( 'Inactive Color', 'pawfriends-core' )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'        => '',
			'percent'             => '100',
			'percentage_type'     => '',
			'percentage_bg_color' => '',
			'title'               => '',
			'title_tag'           => 'h6',
            'title_size'          => '',
            'title_font_weight'   => '',
			'title_color'         => '',
			'color_active'        => '',
			'color_inactive'      => ''
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes']      = $this->getHolderClasses( $params );
        $params['svg_bg_color']        = $this->getSvgBgColor( $params );
        $params['percentage_color']    = $this->getPercentageColor( $params );
		$params['title_tag']           = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $args['title_tag'];
		$params['title_styles']        = $this->getTitleStyles( $params );
		$params['active_bar_style']    = $this->getActiveColor( $params );
		$params['inactive_bar_style']  = $this->getInactiveColor( $params );
		
		wp_enqueue_script( 'counter', PAWFRIENDS_CORE_SHORTCODES_URL_PATH . '/progress-bar/assets/js/plugins/counter.js', array( 'jquery' ), false, true );
		
		$html = pawfriends_core_get_shortcode_module_template_part( 'templates/progress-bar-template', 'progress-bar', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['percentage_type'] ) ? 'mkdf-pb-percent-' . esc_attr( $params['percentage_type'] ) : '';
		
		return implode( ' ', $holderClasses );
	}
	
	private function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_color'] ) ) {
			$styles[] = 'color: ' . $params['title_color'];
		}

        if ( ! empty( $params['title_size'] ) ) {
            if ( pawfriends_mikado_string_ends_with( $params['title_size'], 'px' ) || pawfriends_mikado_string_ends_with( $params['title_size'], 'em' ) ) {
                $styles[] = 'font-size: ' . $params['title_size'];
            } else {
                $styles[] = 'font-size: ' . $params['title_size'] . 'px';
            }
        }

        if ( ! empty( $params['title_font_weight'] ) ) {
            $styles[] = 'font-weight: ' . $params['title_font_weight'];
        }

        return implode( ';', $styles );
	}
	
	private function getActiveColor( $params ) {
		$styles = array();
		
		if ( ! empty( $params['color_active'] ) ) {
			$styles[] = 'background-color: ' . $params['color_active'];
		}
		
		return $styles;
	}
	
	private function getInactiveColor( $params ) {
		$styles = array();
		
		if ( ! empty( $params['color_inactive'] ) ) {
			$styles[] = 'background-color: ' . $params['color_inactive'];
		}
		
		return $styles;
	}

    private function getPercentageColor( $params ) {
        $styles = array();

        if ( ! empty( $params['percentage_bg_color'] ) ) {
            $styles[] = 'color: ' . $params['percentage_bg_color'];
        }

        return $styles;
    }

    private function getSvgBgColor( $params ) {
        $styles = array();

        if ( ! empty( $params['percentage_bg_color'] ) ) {
            $styles[] = 'background-color: ' . $params['percentage_bg_color'];
        }

        return $styles;
    }
}