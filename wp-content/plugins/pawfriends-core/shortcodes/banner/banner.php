<?php
namespace PawFriendsCore\CPT\Shortcodes\Banner;

use PawFriendsCore\Lib;

class Banner implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'mkdf_banner';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Banner', 'pawfriends-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by PAWFRIENDS', 'pawfriends-core' ),
					'icon'                      => 'icon-wpb-banner extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'pawfriends-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'pawfriends-core' )
						),
						array(
							'type'        => 'attach_image',
							'param_name'  => 'background_image',
							'heading'     => esc_html__( 'Background Image', 'pawfriends-core' ),
							'description' => esc_html__( 'Select image from media library', 'pawfriends-core' )
						),
                        array(
                            'type'        => 'attach_image',
                            'param_name'  => 'foreground_image',
                            'heading'     => esc_html__( 'Foreground Image', 'pawfriends-core' ),
                            'description' => esc_html__( 'Select image from media library', 'pawfriends-core' )
                        ),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'info_position',
							'heading'     => esc_html__( 'Info Position', 'pawfriends-core' ),
							'value'       => array(
								esc_html__( 'Default', 'pawfriends-core' )  => 'default',
								esc_html__( 'Centered', 'pawfriends-core' ) => 'centered'
							),
							'save_always' => true
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'info_content_padding',
							'heading'     => esc_html__( 'Info Content Padding', 'pawfriends-core' ),
							'description' => esc_html__( 'Please insert padding in format top right bottom left', 'pawfriends-core' )
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
                            'dependency'  => array( 'element' => 'title', 'not_empty' => true )
                        ),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_color',
							'heading'    => esc_html__( 'Title Color', 'pawfriends-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true )
						),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'text',
                            'heading'    => esc_html__( 'Text', 'pawfriends-core' )
                        ),
                        array(
                            'type'       => 'colorpicker',
                            'param_name' => 'text_color',
                            'heading'    => esc_html__( 'Text Color', 'pawfriends-core' ),
                            'dependency' => array( 'element' => 'text', 'not_empty' => true )
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'text_top_margin',
                            'heading'    => esc_html__( 'Text Top Margin (px)', 'pawfriends-core' ),
                            'dependency' => array( 'element' => 'text', 'not_empty' => true )
                        ),
						array(
							'type'       => 'textfield',
							'param_name' => 'link',
							'heading'    => esc_html__( 'Link', 'pawfriends-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'target',
							'heading'    => esc_html__( 'Target', 'pawfriends-core' ),
							'value'      => array_flip( pawfriends_mikado_get_link_target_array() ),
							'dependency' => array( 'element' => 'link', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'link_text',
							'heading'    => esc_html__( 'Link Text', 'pawfriends-core' ),
							'dependency' => array( 'element' => 'link', 'not_empty' => true )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'link_color',
							'heading'    => esc_html__( 'Link Text Color', 'pawfriends-core' ),
							'dependency' => array( 'element' => 'link', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'link_top_margin',
							'heading'    => esc_html__( 'Link Text Top Margin (px)', 'pawfriends-core' ),
							'dependency' => array( 'element' => 'link', 'not_empty' => true )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'         => '',
			'background_image'     => '',
            'foreground_image'     => '',
			'info_position'        => 'default',
			'info_content_padding' => '',
			'text'                 => '',
			'text_color'           => '',
			'text_top_margin'      => '',
			'title'                => '',
			'title_tag'            => 'h3',
			'title_size'           => '',
			'title_color'          => '',
			'link'                 => '',
			'target'               => '_self',
			'link_text'            => '',
			'link_color'           => '',
			'link_top_margin'      => ''
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes']  = $this->getHolderClasses( $params, $args );
		$params['overlay_styles']  = $this->getOverlayStyles( $params );
		$params['text_styles']     = $this->getTextStyles( $params );
		$params['title_tag']       = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $args['title_tag'];
		$params['title_styles']    = $this->getTitleStyles( $params );
		$params['link_styles']     = $this->getLinkStyles( $params );
		
		$html = pawfriends_core_get_shortcode_module_template_part( 'templates/banner', 'banner', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params, $args ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['info_position'] ) ? 'mkdf-banner-info-' . $params['info_position'] : 'mkdf-banner-info-' . $args['info_position'];
        $holderClasses[] = ! empty( $params['foreground_image'] ) ? 'foreground-image' : '';
		
		return implode( ' ', $holderClasses );
	}
	
	private function getOverlayStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['info_content_padding'] ) ) {
			$styles[] = 'padding: ' . $params['info_content_padding'];
		}
		
		return implode( ';', $styles );
	}
	
	private function getTextStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['text_color'] ) ) {
			$styles[] = 'color: ' . $params['text_color'];
		}

        if ( ! empty( $params['text_top_margin'] ) ) {
            $styles[] = 'margin-top: ' . pawfriends_mikado_filter_px( $params['text_top_margin'] ) . 'px';
        }
		
		return implode( ';', $styles );
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
		
		return implode( ';', $styles );
	}
	
	private function getLinkStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['link_color'] ) ) {
			$styles[] = 'color: ' . $params['link_color'];
		}
		
		if ( ! empty( $params['link_top_margin'] ) ) {
			$styles[] = 'margin-top: ' . pawfriends_mikado_filter_px( $params['link_top_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}
}