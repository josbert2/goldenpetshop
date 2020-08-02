<?php
namespace PawFriendsCore\CPT\Shortcodes\Team;

use PawFriendsCore\lib;

class Team implements lib\ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'mkdf_team';

		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		$team_social_icons_array = array();
		
		for ( $x = 1; $x < 6; $x ++ ) {
			$teamIconCollections = pawfriends_mikado_icon_collections()->getCollectionsWithSocialIcons();
			foreach ( $teamIconCollections as $collection_key => $collection ) {
				
				$team_social_icons_array[] = array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Social Icon ', 'pawfriends-core' ) . $x,
					'param_name' => 'team_social_' . $collection->param . '_' . $x,
					'value'      => $collection->getSocialIconsArrayVC(),
					'dependency' => Array( 'element' => 'team_social_icon_pack', 'value' => array( $collection_key ) )
				);
			}
			
			$team_social_icons_array[] = array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Social Icon ', 'pawfriends-core' ) . $x . esc_html__( ' Link', 'pawfriends-core' ),
				'param_name' => 'team_social_icon_' . $x . '_link',
				'dependency' => array(
					'element' => 'team_social_icon_pack',
					'value'   => pawfriends_mikado_icon_collections()->getIconCollectionsKeys()
				)
			);
			
			$team_social_icons_array[] = array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Social Icon ', 'pawfriends-core' ) . $x . esc_html__( ' Target', 'pawfriends-core' ),
				'param_name'  => 'team_social_icon_' . $x . '_target',
				'value'       => array(
					esc_html__( 'Same Window', 'pawfriends-core' ) => '_self',
					esc_html__( 'New Window', 'pawfriends-core' )  => '_blank'
				),
				'dependency'  => Array( 'element' => 'team_social_icon_' . $x . '_link', 'not_empty' => true ),
                'save_always' => true
			);
		}
		
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Team', 'pawfriends-core' ),
					'base'                      => $this->base,
					'category'                  => esc_html__( 'by PAWFRIENDS', 'pawfriends-core' ),
					'icon'                      => 'icon-wpb-team extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array_merge(
						array(
							array(
								'type'        => 'dropdown',
								'param_name'  => 'type',
								'heading'     => esc_html__( 'Type', 'pawfriends-core' ),
								'value'       => array(
									esc_html__( 'Info Over Image', 'pawfriends-core' )  => 'info-on-image',
                                    esc_html__( 'Info Below Image', 'pawfriends-core' ) => 'info-below-image'
								),
								'save_always' => true
							),
							array(
								'type'       => 'attach_image',
								'param_name' => 'team_image',
								'heading'    => esc_html__( 'Image', 'pawfriends-core' )
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'team_name',
								'heading'    => esc_html__( 'Name', 'pawfriends-core' )
							),
							array(
								'type'        => 'dropdown',
								'param_name'  => 'team_name_tag',
								'heading'     => esc_html__( 'Name Tag', 'pawfriends-core' ),
								'value'       => array_flip( pawfriends_mikado_get_title_tag( true ) ),
								'save_always' => true,
								'dependency'  => array( 'element' => 'team_name', 'not_empty' => true )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'team_name_color',
								'heading'    => esc_html__( 'Name Color', 'pawfriends-core' ),
								'description' => esc_html__( 'Applies when using \'Info Below Image\' only', 'pawfriends-core' ),
								'dependency' => array( 'element' => 'team_name', 'not_empty' => true )
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'team_position',
								'heading'    => esc_html__( 'Position', 'pawfriends-core' )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'team_position_color',
								'heading'    => esc_html__( 'Position Color', 'pawfriends-core' ),
                                'description' => esc_html__( 'Applies when using \'Info Below Image\' only', 'pawfriends-core' ),
								'dependency' => array( 'element' => 'team_position', 'not_empty' => true )
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'team_text',
								'heading'    => esc_html__( 'Text', 'pawfriends-core' ),
                                'dependency' => array( 'element' => 'type', 'value' => 'info-below-image' )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'team_text_color',
								'heading'    => esc_html__( 'Text Color', 'pawfriends-core' ),
								'dependency' => array( 'element' => 'team_text', 'not_empty' => true )
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'team_link',
								'heading'    => esc_html__( 'Link', 'pawfriends-core' )
							),
							array(
								'type'       => 'dropdown',
								'param_name' => 'team_target',
								'heading'    => esc_html__( 'Target', 'pawfriends-core' ),
								'value'      => array_flip( pawfriends_mikado_get_link_target_array() ),
								'dependency' => array( 'element' => 'team_link', 'not_empty' => true ),
                                'save_always' => true
							),
							array(
								'type'        => 'dropdown',
								'param_name'  => 'team_social_icon_pack',
								'heading'     => esc_html__( 'Social Icon Pack', 'pawfriends-core' ),
								'value'       => array_merge( array( '' => '' ), pawfriends_mikado_icon_collections()->getIconCollectionsVCExclude( array('linea_icons', 'dripicons', 'linear_icons') ) ),
								'save_always' => true
							),
						),
						$team_social_icons_array
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args = array(
			'type'                  => 'info-over-image',
			'team_image'            => '',
			'team_name'             => '',
			'team_name_tag'         => 'h4',
			'team_name_color'       => '',
			'team_position'         => '',
			'team_position_color'   => '',
			'team_text'             => '',
			'team_text_color'       => '',
			'team_link'             => '',
			'team_target'           => '',
			'team_social_icon_pack' => ''
		);
		
		$team_social_icons_form_fields = array();
		$number_of_social_icons        = 5;
		
		for ( $x = 1; $x <= $number_of_social_icons; $x ++ ) {
			
			foreach ( pawfriends_mikado_icon_collections()->iconCollections as $collection_key => $collection ) {
				$team_social_icons_form_fields[ 'team_social_' . $collection->param . '_' . $x ] = '';
			}
			
			$team_social_icons_form_fields[ 'team_social_icon_' . $x . '_link' ]   = '';
			$team_social_icons_form_fields[ 'team_social_icon_' . $x . '_target' ] = '';
		}
		
		$args = array_merge( $args, $team_social_icons_form_fields );
		
		$params = shortcode_atts( $args, $atts );
		
		$params['number_of_social_icons'] = 5;
		
		$params['type']                   = ! empty( $params['type'] ) ? $params['type'] : $args['type'];
		$params['holder_classes']         = $this->getHolderClasses( $params );
		$params['team_name_tag']          = ! empty( $params['team_name_tag'] ) ? $params['team_name_tag'] : $args['team_name_tag'];
		$params['team_social_icons']      = $this->getTeamSocialIcons( $params );
        $params['team_social_icon_links'] = $this->getTeamSocialIconLinks( $params );
		$params['team_name_styles']       = $this->getTeamNameStyles( $params );
		$params['team_position_styles']   = $this->getTeamPositionStyles( $params );
		$params['team_text_styles']       = $this->getTeamTextStyles( $params );
		
		//Get HTML from template based on type of team
		$html = pawfriends_core_get_shortcode_module_template_part( 'templates/' . $params['type'], 'team', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['type'] ) ? 'mkdf-team-' . $params['type'] : '';
		
		return implode( ' ', $holderClasses );
	}
	
	private function getTeamSocialIcons( $params ) {
		extract( $params );
		$social_icons = array();
		
		if ( $team_social_icon_pack !== '' ) {
			
			$icon_pack                    = pawfriends_mikado_icon_collections()->getIconCollection( $team_social_icon_pack );
			$team_social_icon_type_label  = 'team_social_' . $icon_pack->param;
			$team_social_icon_param_label = $icon_pack->param;
			
			for ( $i = 1; $i <= $params['number_of_social_icons']; $i ++ ) {
				
				$team_social_icon   = ${$team_social_icon_type_label . '_' . $i};
				$team_social_link   = ${'team_social_icon_' . $i . '_link'};
				$team_social_target = ${'team_social_icon_' . $i . '_target'};
				
				if ( $team_social_icon !== '' ) {
					
					$team_icon_params                                  = array();
					$team_icon_params['icon_pack']                     = $team_social_icon_pack;
					$team_icon_params[ $team_social_icon_param_label ] = $team_social_icon;

					if ($params['type'] == 'info-below-image') {
                        $team_icon_params['link']                      = ( $team_social_link !== '' ) ? $team_social_link : '';
                        $team_icon_params['target']                    = ( $team_social_target !== '' ) ? $team_social_target : '';
                    } else {
                        $team_icon_params['link'] = '';
                    }

					$social_icons[] = pawfriends_mikado_execute_shortcode( 'mkdf_icon', $team_icon_params );
				}
			}
		}
		
		return $social_icons;
	}

    private function getTeamSocialIconLinks( $params ) {
        extract( $params );
        $social_icon_links = array();

        if ( $team_social_icon_pack !== '' ) {
            $icon_pack                    = pawfriends_mikado_icon_collections()->getIconCollection( $team_social_icon_pack );
            $team_social_icon_type_label  = 'team_social_' . $icon_pack->param;

            for ( $i = 1; $i <= $params['number_of_social_icons']; $i ++ ) {

                $team_social_icon   = ${$team_social_icon_type_label . '_' . $i};
                $team_social_link   = ${'team_social_icon_' . $i . '_link'};
                $team_social_target = ${'team_social_icon_' . $i . '_target'};

                if ( $team_social_icon !== '' ) {

                    $team_icon_params           = array();
                    $team_icon_params['link']   = ( $team_social_link !== '' ) ? $team_social_link : '';
                    $team_icon_params['target'] = ( $team_social_target !== '' ) ? $team_social_target : '';

                    $social_icon_links[] = array($team_icon_params['link'], $team_icon_params['target']);
                }
            }
        }

        return $social_icon_links;
    }

	private function getTeamNameStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['team_name_color'] ) ) {
			$styles[] = 'color: ' . $params['team_name_color'];
		}
		
		return implode( ';', $styles );
	}
	
	private function getTeamPositionStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['team_position_color'] ) ) {
			$styles[] = 'color: ' . $params['team_position_color'];
		}
		
		return implode( ';', $styles );
	}
	
	private function getTeamTextStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['team_text_color'] ) ) {
			$styles[] = 'color: ' . $params['team_text_color'];
		}
		
		return implode( ';', $styles );
	}
}