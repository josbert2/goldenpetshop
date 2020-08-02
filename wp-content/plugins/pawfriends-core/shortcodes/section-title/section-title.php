<?php
namespace PawFriendsCore\CPT\Shortcodes\SectionTitle;

use PawFriendsCore\Lib;

class SectionTitle implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'mkdf_section_title';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Section Title', 'pawfriends-core' ),
					'base'                      => $this->base,
					'category'                  => esc_html__( 'by PAWFRIENDS', 'pawfriends-core' ),
					'icon'                      => 'icon-wpb-section-title extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'pawfriends-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'pawfriends-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'position',
							'heading'     => esc_html__( 'Horizontal Position', 'pawfriends-core' ),
							'value'       => array(
								esc_html__( 'Default', 'pawfriends-core' ) => '',
								esc_html__( 'Left', 'pawfriends-core' )    => 'left',
								esc_html__( 'Center', 'pawfriends-core' )  => 'center',
								esc_html__( 'Right', 'pawfriends-core' )   => 'right'
							),
							'save_always' => true
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'holder_padding',
							'heading'    => esc_html__( 'Holder Side Padding (px or %)', 'pawfriends-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'title',
							'heading'     => esc_html__( 'Title', 'pawfriends-core' ),
							'admin_label' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_tag',
							'heading'     => esc_html__( 'Title Tag', 'pawfriends-core' ),
							'value'       => array_flip( pawfriends_mikado_get_title_tag( true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'title', 'not_empty' => true ),
							'group'       => esc_html__( 'Title Style', 'pawfriends-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_color',
							'heading'    => esc_html__( 'Title Color', 'pawfriends-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true ),
							'group'      => esc_html__( 'Title Style', 'pawfriends-core' )
						),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'title_font_family',
                            'heading'    => esc_html__( 'Title Font Family', 'pawfriends-core' ),
                            'dependency' => array( 'element' => 'title', 'not_empty' => true ),
                            'group'      => esc_html__( 'Title Style', 'pawfriends-core' )
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'title_font_size',
                            'heading'    => esc_html__( 'Title Font Size (px)', 'pawfriends-core' ),
                            'dependency' => array( 'element' => 'title', 'not_empty' => true ),
                            'group'      => esc_html__( 'Title Style', 'pawfriends-core' )
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'title_font_weight',
                            'heading'     => esc_html__( 'Title Font Weight', 'pawfriends-core' ),
                            'value'       => array_flip( pawfriends_mikado_get_font_weight_array( true ) ),
                            'save_always' => true,
                            'dependency'  => array( 'element' => 'title', 'not_empty' => true ),
                            'group'       => esc_html__( 'Title Style', 'pawfriends-core' )
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'title_line_height',
                            'heading'    => esc_html__( 'Title Line Height (px)', 'pawfriends-core' ),
                            'dependency' => array( 'element' => 'title', 'not_empty' => true ),
                            'group'      => esc_html__( 'Title Style', 'pawfriends-core' )
                        ),
						array(
							'type'        => 'textfield',
							'param_name'  => 'title_break_words',
							'heading'     => esc_html__( 'Position of Line Break', 'pawfriends-core' ),
							'description' => esc_html__( 'Enter the position of the word after which you would like to create a line break (e.g. if you would like the line break after the 3rd word, you would enter "3")', 'pawfriends-core' ),
							'dependency'  => array( 'element' => 'title', 'not_empty' => true ),
							'group'       => esc_html__( 'Title Style', 'pawfriends-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'disable_break_words',
							'heading'     => esc_html__( 'Disable Line Break for Smaller Screens', 'pawfriends-core' ),
							'value'       => array_flip( pawfriends_mikado_get_yes_no_select_array( false ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'title', 'not_empty' => true ),
							'group'       => esc_html__( 'Title Style', 'pawfriends-core' )
						),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'title_highlight_words',
                            'heading'     => esc_html__( 'Position of Highlighted Word', 'pawfriends-core' ),
                            'description' => esc_html__( 'Enter the position of the word which you would like to have highlighted (e.g. if you would like to highlight 3rd word, you would enter "3")', 'pawfriends-core' ),
                            'dependency'  => array( 'element' => 'title', 'not_empty' => true ),
                            'group'       => esc_html__( 'Title Style', 'pawfriends-core' )
                        ),
                        array(
                            'type'       => 'colorpicker',
                            'param_name' => 'title_highlight_color',
                            'heading'    => esc_html__( 'Highlighted Word Color', 'pawfriends-core' ),
                            'dependency' => array( 'element' => 'title_highlight_words', 'not_empty' => true ),
                            'group'      => esc_html__( 'Title Style', 'pawfriends-core' )
                        ),
                        array(
                            'type'       => 'colorpicker',
                            'param_name' => 'highlight_color',
                            'heading'    => esc_html__( 'Highlight Color', 'pawfriends-core' ),
                            'dependency' => array( 'element' => 'title_highlight_words', 'not_empty' => true ),
                            'group'      => esc_html__( 'Title Style', 'pawfriends-core' )
                        ),
						array(
							'type'       => 'textarea',
							'param_name' => 'text',
							'heading'    => esc_html__( 'Text', 'pawfriends-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'text_tag',
							'heading'     => esc_html__( 'Text Tag', 'pawfriends-core' ),
							'value'       => array_flip( pawfriends_mikado_get_title_tag( true, array( 'p' => 'p' ) ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'text', 'not_empty' => true ),
							'group'       => esc_html__( 'Text Style', 'pawfriends-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'text_color',
							'heading'    => esc_html__( 'Text Color', 'pawfriends-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true ),
							'group'      => esc_html__( 'Text Style', 'pawfriends-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text_font_size',
							'heading'    => esc_html__( 'Text Font Size (px)', 'pawfriends-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true ),
							'group'      => esc_html__( 'Text Style', 'pawfriends-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text_line_height',
							'heading'    => esc_html__( 'Text Line Height (px)', 'pawfriends-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true ),
							'group'      => esc_html__( 'Text Style', 'pawfriends-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'text_font_weight',
							'heading'     => esc_html__( 'Text Font Weight', 'pawfriends-core' ),
							'value'       => array_flip( pawfriends_mikado_get_font_weight_array( true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'text', 'not_empty' => true ),
							'group'       => esc_html__( 'Text Style', 'pawfriends-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text_margin',
							'heading'    => esc_html__( 'Text Top Margin (px)', 'pawfriends-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true ),
							'group'      => esc_html__( 'Text Style', 'pawfriends-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'button_text',
							'heading'     => esc_html__( 'Button Text', 'pawfriends-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'button_link',
							'heading'    => esc_html__( 'Button Link', 'pawfriends-core' ),
							'group'      => esc_html__( 'Button Style', 'pawfriends-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'button_target',
							'heading'    => esc_html__( 'Button Link Target', 'pawfriends-core' ),
							'value'      => array_flip( pawfriends_mikado_get_link_target_array() ),
							'group'      => esc_html__( 'Button Style', 'pawfriends-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'button_color',
							'heading'    => esc_html__( 'Button Color', 'pawfriends-core' ),
							'group'      => esc_html__( 'Button Style', 'pawfriends-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'button_hover_color',
							'heading'    => esc_html__( 'Button Hover Color', 'pawfriends-core' ),
							'group'      => esc_html__( 'Button Style', 'pawfriends-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'button_top_margin',
							'heading'    => esc_html__( 'Button Top Margin (px)', 'pawfriends-core' ),
							'group'      => esc_html__( 'Button Style', 'pawfriends-core' )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'          => '',
			'position'              => '',
			'holder_padding'        => '',
			'title'                 => '',
			'title_tag'             => 'h2',
			'title_color'           => '',
			'title_font_family'     => '',
			'title_font_size'       => '',
			'title_font_weight'     => '',
			'title_line_height'     => '',
			'title_break_words'     => '',
			'title_highlight_words' => '',
			'title_highlight_color' => '',
            'highlight_color'       => '',
			'disable_break_words'   => '',
			'text'                  => '',
			'text_tag'              => 'p',
			'text_color'            => '',
			'text_font_size'        => '',
			'text_line_height'      => '',
			'text_font_weight'      => '',
			'text_margin'           => '',
			'button_text'           => '',
			'button_link'           => '',
			'button_target'         => '_self',
			'button_color'          => '',
			'button_hover_color'    => '',
			'button_top_margin'     => ''
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes']        = $this->getHolderClasses( $params, $args );
		$params['holder_styles']         = $this->getHolderStyles( $params );
		$params['title']                 = $this->getModifiedTitle( $params );
		$params['title_tag']             = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $args['title_tag'];
		$params['title_styles']          = $this->getTitleStyles( $params );
		$params['text_tag']              = ! empty( $params['text_tag'] ) ? $params['text_tag'] : $args['text_tag'];
		$params['text_styles']           = $this->getTextStyles( $params );
		$params['button_parameters']     = $this->getButtonParameters( $params );
		
		$html = pawfriends_core_get_shortcode_module_template_part( 'templates/section-title', 'section-title', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params, $args ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = $params['disable_break_words'] === 'yes' ? 'mkdf-st-disable-title-break' : '';
        $holderClasses[] = ! empty( $params['title_highlight_words'] ) ? 'mkdf-st-highlight' : '';
		
		return implode( ' ', $holderClasses );
	}
	
	private function getHolderStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['holder_padding'] ) ) {
			$styles[] = 'padding: 0 ' . $params['holder_padding'];
		}
		
		if ( ! empty( $params['position'] ) ) {
			$styles[] = 'text-align: ' . $params['position'];
		}
		
		return implode( ';', $styles );
	}
	
	private function getModifiedTitle( $params ) {
		$title                 = $params['title'];
		$title_break_words     = str_replace( ' ', '', $params['title_break_words'] );
        $title_highlight_words = str_replace( ' ', '', $params['title_highlight_words'] );
		
		if ( ! empty( $title ) ) {
			$split_title = explode( ' ', $title );
            $highlight_words = explode( ',', $title_highlight_words );
			
			if ( ! empty( $title_break_words ) ) {
				if ( ! empty( $split_title[ $title_break_words - 1 ] ) ) {
					$split_title[ $title_break_words - 1 ] = $split_title[ $title_break_words - 1 ] . '<br />';
				}
			}

            if ( ! empty( $title_highlight_words ) ) {

                $title_highlight_color = $params['title_highlight_color'];
                $highlight_color       = $params['highlight_color'];
                $title_color           = ! empty( $params['title_color'] ) ? $params['title_color'] : '#424242';

                if ( ! empty( $title_highlight_color ) ) {
                    $color = $title_highlight_color;
                } else {
                    $color = '#fff';
                }

                if ( empty( $highlight_color ) ) {
                    $highlight_color = $title_color;
                }

                foreach ( $highlight_words as $value ) {
                    if ( ! empty( $split_title[ $value - 1 ] ) ) {
                        $split_title[ $value - 1] = '<span class="mkdf-st-highlight-title-holder" style="color: ' . esc_attr($highlight_color) . '">
                                                        <span class="mkdf-st-highlight-title" style="color: ' . esc_attr($color) . '">' . $split_title[ $value - 1 ] . '</span>
                                                        <span class="mkdf-st-highlight">
                                                            ' . pawfriends_core_section_title_highlighted_word_left_svg() . '
                                                        <span class="mkdf-active-hover-middle"></span>
                                                            ' . pawfriends_core_section_title_highlighted_word_right_svg() . '
                                                        </span>
                                                    </span>';
                    }
                }
            }

			$title = implode( ' ', $split_title );
		}

		return $title;
	}
	
	private function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_color'] ) ) {
			$styles[] = 'color: ' . $params['title_color'];
		}

        if ( ! empty( $params['title_font_family'] ) ) {
            $styles[] = 'font-family: ' . $params['title_font_family'];
        }

        if ( ! empty( $params['title_font_size'] ) ) {
            $styles[] = 'font-size: ' . pawfriends_mikado_filter_px( $params['title_font_size'] ) . 'px';
        }

        if ( ! empty( $params['title_font_weight'] ) ) {
            $styles[] = 'font-weight: ' . $params['title_font_weight'];
        }

        if ( ! empty( $params['title_line_height'] ) ) {
            $styles[] = 'line-height: ' . pawfriends_mikado_filter_px( $params['title_line_height'] ) . 'px';
        }
		
		return implode( ';', $styles );
	}
	
	private function getTextStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['text_color'] ) ) {
			$styles[] = 'color: ' . $params['text_color'];
		}
		
		if ( ! empty( $params['text_font_size'] ) ) {
			$styles[] = 'font-size: ' . pawfriends_mikado_filter_px( $params['text_font_size'] ) . 'px';
		}
		
		if ( ! empty( $params['text_line_height'] ) ) {
			$styles[] = 'line-height: ' . pawfriends_mikado_filter_px( $params['text_line_height'] ) . 'px';
		}
		
		if ( ! empty( $params['text_font_weight'] ) ) {
			$styles[] = 'font-weight: ' . $params['text_font_weight'];
		}
		
		if ( $params['text_margin'] !== '' ) {
			$styles[] = 'margin-top: ' . pawfriends_mikado_filter_px( $params['text_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}
	
	private function getButtonParameters( $params ) {
		$button_params = array();
		
		if ( ! empty( $params['button_text'] ) ) {
			$button_params['text'] = $params['button_text'];
			$button_params['type'] = 'simple';
			$button_params['link'] = ! empty( $params['button_link'] ) ? $params['button_link'] : '#';
			$button_params['target'] = ! empty( $params['button_target'] ) ? $params['button_target'] : '_self';
			
			if ( ! empty( $params['button_color'] ) ) {
				$button_params['color'] = $params['button_color'];
			}
			
			if ( ! empty( $params['button_hover_color'] ) ) {
				$button_params['hover_color'] = $params['button_hover_color'];
			}
			
			if ( $params['button_top_margin'] !== '' ) {
				$button_params['margin'] = intval( $params['button_top_margin'] ) . 'px 0 0';
			}
		}
		
		return $button_params;
	}
}