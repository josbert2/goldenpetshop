<?php
namespace PawFriendsCore\CPT\Shortcodes\imageMarquee;

use PawFriendsCore\Lib;

class imageMarquee implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'mkdf_image_marquee';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Image Marquee', 'pawfriends-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by PAWFRIENDS', 'pawfriends-core' ),
					'icon'                      => 'icon-wpb-image-marquee extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
							array(
							'type'        => 'attach_image',
							'param_name'  => 'image',
							'heading'     => esc_html__( 'Image', 'pawfriends-core' ),
							'description' => esc_html__( 'Select image from media library', 'pawfriends-core' )
						),
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'image' => '',
		);
		
		$params = shortcode_atts( $args, $atts );
		$html = pawfriends_core_get_shortcode_module_template_part( 'templates/image-marquee-template', 'image-marquee', '', $params );
		
		return $html;
	}
}