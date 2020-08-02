<?php
namespace PawFriendsCore\CPT\Shortcodes\Tabs;

use PawFriendsCore\Lib;

class Tabs implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'mkdf_tabs';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'            => esc_html__( 'Tabs', 'pawfriends-core' ),
					'base'            => $this->getBase(),
					'as_parent'       => array( 'only' => 'mkdf_tabs_item' ),
					'content_element' => true,
					'category'        => esc_html__( 'by PAWFRIENDS', 'pawfriends-core' ),
					'icon'            => 'icon-wpb-tabs extended-custom-icon',
					'js_view'         => 'VcColumnView',
					'params'          => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'pawfriends-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'pawfriends-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'type',
							'heading'     => esc_html__( 'Type', 'pawfriends-core' ),
							'value'       => array(
								esc_html__( 'Standard', 'pawfriends-core' ) => 'standard',
								esc_html__( 'Boxed', 'pawfriends-core' )    => 'boxed',
								esc_html__( 'Simple', 'pawfriends-core' )   => 'simple',
								esc_html__( 'Vertical', 'pawfriends-core' ) => 'vertical'
							),
							'save_always' => true
						),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'overflow',
                            'heading'     => esc_html__( 'Overflowing Tabs', 'pawfriends-core' ),
                            'description'  => esc_html__( 'Set \'Yes\' to have tab titles overflow grid in which placed', 'pawfriends-core' ),
                            'value'       => array(
                                esc_html__( 'No', 'pawfriends-core' ) => 'no-overflow',
                                esc_html__( 'Yes', 'pawfriends-core' ) => 'overflow'
                            ),
                            'dependency'  => array( 'element' => 'type', 'value' => 'vertical' )
                        )
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class' => '',
			'type'         => 'standard',
            'overflow'     => 'no-overflow',
		);
		$params = shortcode_atts( $args, $atts );
		
		// Extract tab titles
		preg_match_all( '/tab_title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
		$tab_titles = array();
		
		/**
		 * get tab titles array
		 */
		if ( isset( $matches[0] ) ) {
			$tab_titles = $matches[0];
		}
		
		$tab_title_array = array();
		
		foreach ( $tab_titles as $tab ) {
			preg_match( '/tab_title="([^\"]+)"/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE );
			$tab_title_array[] = $tab_matches[1][0];
		}

        // Extract tab titles color
        preg_match_all( '/tab_color=".*?"/i', $content, $matches );
        $tab_titles_color = array();

        /**
         * get tab titles color array
         */
        if ( isset( $matches[0] ) ) {
            $tab_titles_color = $matches[0];
        }

        $tab_title_color_array = array();

        foreach ($tab_titles_color as $tab) {
            $tab_title_color_array[] = str_replace(array('tab_color="', '"'), array('', ''), $tab);
        }

        $tab_title_color_array;

        $params['holder_classes'] = $this->getHolderClasses($params);
        $params['tabs_titles'] = $tab_title_array;
        $params['tabs_titles_color'] = $tab_title_color_array;
        $params['content'] = $content;

		$output = pawfriends_core_get_shortcode_module_template_part( 'templates/tab-template', 'tabs', '', $params );

		return $output;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['type'] ) ? 'mkdf-tabs-' . esc_attr( $params['type'] ) : 'mkdf-tabs-standard';
        $holderClasses[] = ! empty( $params['overflow'] ) ? esc_attr( $params['overflow'] ) : '';
		
		return implode( ' ', $holderClasses );
	}
}