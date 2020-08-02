<?php
namespace PawFriendsCore\CPT\Shortcodes\BlockQuote;

use PawFriendsCore\Lib;

class BlockQuote implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'mkdf_block_quote';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Block Quote', 'pawfriends-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by PAWFRIENDS', 'pawfriends-core' ),
					'icon'                      => 'icon-wpb-block-quote extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'pawfriends-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'pawfriends-core' )
						),
						array(
							'type'       => 'textarea',
							'param_name' => 'text',
							'heading'    => esc_html__( 'Text', 'pawfriends-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'text_color',
							'heading'    => esc_html__( 'Text Color', 'pawfriends-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true )
						),
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'        => '',
			'text'                => '',
			'text_color'          => '',
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes']     = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$params['text_styles']        = $this->getTextStyles( $params );
		
		$html = pawfriends_core_get_shortcode_module_template_part( 'templates/block-quote', 'block-quote', '', $params );
		
		return $html;
	}
	
	private function getTextStyles( $params ) {
		$styles = '';
		
		if ( ! empty( $params['text_color'] ) ) {
			$styles = 'color: ' . $params['text_color'];
		}
		
		return $styles;
	}
}