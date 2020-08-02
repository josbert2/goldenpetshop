<?php

namespace PawFriendsCore\CPT\Shortcodes\VideoButton;

use PawFriendsCore\Lib;

class VideoButton implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'mkdf_video_button';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Video Button', 'pawfriends-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by PAWFRIENDS', 'pawfriends-core' ),
					'icon'                      => 'icon-wpb-video-button extended-custom-icon',
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
							'param_name' => 'video_link',
							'heading'    => esc_html__( 'Video Link', 'pawfriends-core' )
						),
						array(
							'type'        => 'attach_image',
							'param_name'  => 'video_image',
							'heading'     => esc_html__( 'Video Image', 'pawfriends-core' ),
							'description' => esc_html__( 'Select image from media library', 'pawfriends-core' )
						),
						array(
							'type'        => 'colorpicker',
							'param_name'  => 'play_button_color',
							'heading'     => esc_html__( 'Play Button Color', 'pawfriends-core' ),
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'      => '',
			'video_link'        => '#',
			'video_image'       => '',
			'play_button_color' => ''
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes'] = $this->getHolderClasses( $params );
        $params['holder_styles']  = $this->getHolderStyles( $params );
		
		$html = pawfriends_core_get_shortcode_module_template_part( 'templates/video-button', 'video-button', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		
		return implode( ' ', $holderClasses );
	}

    private function getHolderStyles( $params ) {
        $styles = array();

        if ($params['play_button_color'] !== '') {
            $styles[] = 'color: ' . $params['play_button_color'];
        }

        return implode( ';', $styles );
    }
}