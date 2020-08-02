<?php
namespace PawFriendsCore\CPT\Shortcodes\PricingTable;

use PawFriendsCore\Lib;

class PricingTableItem implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'mkdf_pricing_table_item';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Pricing Table Item', 'pawfriends-core' ),
					'base'                      => $this->base,
					'icon'                      => 'icon-wpb-pricing-table-item extended-custom-icon',
					'category'                  => esc_html__( 'by PAWFRIENDS', 'pawfriends-core' ),
					'allowed_container_element' => 'vc_row',
					'as_child'                  => array( 'only' => 'mkdf_pricing_table' ),
					'params'                    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'pawfriends-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'pawfriends-core' )
						),
                        array(
                            'type'        => 'attach_image',
                            'param_name'  => 'image',
                            'heading'     => esc_html__( 'Image', 'pawfriends-core' ),
                            'description' => esc_html__( 'Select image from media library', 'pawfriends-core' )
                        ),
						array(
							'type'        => 'textfield',
							'param_name'  => 'title',
							'heading'     => esc_html__( 'Title', 'pawfriends-core' ),
							'value'       => esc_html__( 'Basic Plan', 'pawfriends-core' ),
							'save_always' => true
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_color',
							'heading'    => esc_html__( 'Title Color', 'pawfriends-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true )
						),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'subtitle',
                            'heading'     => esc_html__( 'Subtitle', 'pawfriends-core' ),
                        ),
						array(
							'type'       => 'textfield',
							'param_name' => 'price',
							'heading'    => esc_html__( 'Price', 'pawfriends-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'currency',
							'heading'     => esc_html__( 'Currency', 'pawfriends-core' ),
							'description' => esc_html__( 'Default mark is $', 'pawfriends-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'price_bg_color',
							'heading'    => esc_html__( 'Price Background Color', 'pawfriends-core' ),
							'dependency' => array( 'element' => 'currency', 'not_empty' => true )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'price_period',
							'heading'     => esc_html__( 'Price Period', 'pawfriends-core' ),
							'description' => esc_html__( 'Default label is monthly', 'pawfriends-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'button_text',
							'heading'     => esc_html__( 'Button Text', 'pawfriends-core' ),
							'value'       => esc_html__( 'Buy Now', 'pawfriends-core' ),
							'save_always' => true
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'link',
							'heading'    => esc_html__( 'Button Link', 'pawfriends-core' ),
							'dependency' => array( 'element' => 'button_text', 'not_empty' => true )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'target',
							'heading'     => esc_html__( 'Link Target', 'pawfriends-core' ),
							'value'       => array_flip( pawfriends_mikado_get_link_target_array() ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'button_type',
							'heading'     => esc_html__( 'Button Type', 'pawfriends-core' ),
							'value'       => array(
								esc_html__( 'Solid', 'pawfriends-core' )   => 'solid',
								esc_html__( 'Outline', 'pawfriends-core' ) => 'outline'
							),
							'save_always' => true,
							'dependency'  => array( 'element' => 'button_text', 'not_empty' => true )
						),
						array(
							'type'       => 'textarea_html',
							'param_name' => 'content',
							'heading'    => esc_html__( 'Content', 'pawfriends-core' ),
							'value'      => '<li>content content content</li><li>content content content</li><li>content content content</li>'
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'             => '',
			'image'                    => '',
			'title'                    => '',
			'title_color'              => '',
			'title_border_color'       => '',
			'subtitle'                 => '',
			'price'                    => '100',
			'currency'                 => '$',
			'price_bg_color'           => '',
			'price_period'             => 'monthly',
			'button_text'              => '',
			'link'                     => '',
			'target'                   => '',
			'button_type'              => 'outline'
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['content']             = preg_replace( '#^<\/p>|<p>$#', '', $content ); // delete p tag before and after content
		$params['holder_classes']      = $this->getHolderClasses( $params );
        $params['image']               = $this->getImage( $params );
		$params['title_styles']        = $this->getTitleStyles( $params );
		$params['price_styles']        = $this->getPriceStyles( $params );
        $params['price_color']         = $this->getPriceColor( $params );
		$params['button_type']         = ! empty( $params['button_type'] ) ? $params['button_type'] : $args['button_type'];
		
		$html = pawfriends_core_get_shortcode_module_template_part( 'templates/pricing-table-template', 'pricing-table', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		
		return implode( ' ', $holderClasses );
	}

    private function getImage( $params ) {
        $image = array();

        if ( ! empty( $params['image'] ) ) {
            $id = $params['image'];

            $image['image_id'] = $id;
            $image_original    = wp_get_attachment_image_src( $id, 'full' );
            $image['url']      = $image_original[0];
            $image['alt']      = get_post_meta( $id, '_wp_attachment_image_alt', true );
        }

        return $image;
    }
	
	private function getTitleStyles( $params ) {
		$itemStyle = array();
		
		if ( ! empty( $params['title_color'] ) ) {
			$itemStyle[] = 'color: ' . $params['title_color'];
		}
		
		if ( ! empty( $params['title_border_color'] ) ) {
			$itemStyle[] = 'border-color: ' . $params['title_border_color'];
		}
		
		return implode( ';', $itemStyle );
	}
	
	private function getPriceStyles( $params ) {
		$itemStyle = array();
		
		if ( ! empty( $params['price_bg_color'] ) ) {
			$itemStyle[] = 'background-color: ' . $params['price_bg_color'];
		}
		
		return implode( ';', $itemStyle );
	}

    private function getPriceColor( $params ) {
        $itemStyle = array();

        if ( ! empty( $params['price_bg_color'] ) ) {
            $itemStyle[] = 'color: ' . $params['price_bg_color'];
        }

        return implode( ';', $itemStyle );
    }
}