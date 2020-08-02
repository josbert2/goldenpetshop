<?php
namespace PawFriendsCore\CPT\Shortcodes\Tabs;

use PawFriendsCore\Lib;

class TabsItem implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'mkdf_tabs_item';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'            => esc_html__( 'Tabs Item', 'pawfriends-core' ),
					'base'            => $this->getBase(),
					'as_parent'       => array( 'except' => 'vc_row' ),
					'as_child'        => array( 'only' => 'mkdf_tabs' ),
					'category'        => esc_html__( 'by PAWFRIENDS', 'pawfriends-core' ),
					'icon'            => 'icon-wpb-tabs-item extended-custom-icon',
					'content_element' => true,
					'js_view'         => 'VcColumnView',
					'params'          => array(
						array(
							'type'       => 'textfield',
							'param_name' => 'tab_title',
							'heading'    => esc_html__( 'Title', 'pawfriends-core' )
						),
                        array(
                            'type'       => 'colorpicker',
                            'param_name' => 'tab_color',
                            'heading'    => esc_html__( 'Background Color', 'pawfriends-core' ),
                            'description' => esc_html__( 'Applies to \'Boxed\' and \'Vertical\' types only', 'pawfriends-core' ),
                            'value'       =>'',
                            'save_always' => true
                        )
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$default_atts = array(
			'tab_title' => 'Tab',
            'tab_color' => '',
			'tab_id'    => ''
		);
		$params       = shortcode_atts( $default_atts, $atts );
		
		$rand_number         = rand( 0, 1000 );
		$params['tab_title'] = $params['tab_title'] . '-' . $rand_number;
        $params['tab_color']  = $this->getTabColor( $params );
		$params['content']   = $content;
		
		$output = pawfriends_core_get_shortcode_module_template_part( 'templates/tab-content', 'tabs', '', $params );
		
		return $output;
	}

    private function getTabColor( $params ) {
        $styles = array();

        if ( ! empty( $params['tab_color'] ) ) {
            $styles[] = 'background-color: ' . $params['tab_color'];
        }

        return $styles;
    }
}