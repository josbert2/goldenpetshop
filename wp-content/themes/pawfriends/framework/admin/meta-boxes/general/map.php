<?php

if ( ! function_exists( 'pawfriends_mikado_map_general_meta' ) ) {
	function pawfriends_mikado_map_general_meta() {
		
		$general_meta_box = pawfriends_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'pawfriends_mikado_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'general_meta' ),
				'title' => esc_html__( 'General', 'pawfriends' ),
				'name'  => 'general_meta'
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_page_slider_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Shortcode', 'pawfriends' ),
				'description' => esc_html__( 'Paste your slider shortcode here', 'pawfriends' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		/***************** Content Layout - begin **********************/
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Always put content behind header', 'pawfriends' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'pawfriends' ),
				'parent'        => $general_meta_box
			)
		);
		
		$mkdf_content_padding_group = pawfriends_mikado_add_admin_group(
			array(
				'name'        => 'content_padding_group',
				'title'       => esc_html__( 'Content Styles', 'pawfriends' ),
				'description' => esc_html__( 'Define styles for Content area', 'pawfriends' ),
				'parent'      => $general_meta_box
			)
		);
		
			$mkdf_content_padding_row = pawfriends_mikado_add_admin_row(
				array(
					'name'   => 'mkdf_content_padding_row',
					'parent' => $mkdf_content_padding_group
				)
			);
			
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_page_background_color_meta',
						'type'        => 'colorsimple',
						'label'       => esc_html__( 'Page Background Color', 'pawfriends' ),
						'parent'      => $mkdf_content_padding_row
					)
				);
				
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_page_background_image_meta',
						'type'          => 'imagesimple',
						'label'         => esc_html__( 'Page Background Image', 'pawfriends' ),
						'parent'        => $mkdf_content_padding_row
					)
				);
				
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_page_background_repeat_meta',
						'type'          => 'selectsimple',
						'default_value' => '',
						'label'         => esc_html__( 'Page Background Image Repeat', 'pawfriends' ),
						'options'       => pawfriends_mikado_get_yes_no_select_array(),
						'parent'        => $mkdf_content_padding_row
					)
				);
		
			$mkdf_content_padding_row_1 = pawfriends_mikado_add_admin_row(
				array(
					'name'   => 'mkdf_content_padding_row_1',
					'next'   => true,
					'parent' => $mkdf_content_padding_group
				)
			);
		
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'   => 'mkdf_page_content_padding',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Content Padding (eg. 10px 5px 10px 5px)', 'pawfriends' ),
						'parent' => $mkdf_content_padding_row_1,
						'args'        => array(
							'col_width' => 4
						)
					)
				);
				
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'    => 'mkdf_page_content_padding_mobile',
						'type'    => 'textsimple',
						'label'   => esc_html__( 'Content Padding for mobile (eg. 10px 5px 10px 5px)', 'pawfriends' ),
						'parent'  => $mkdf_content_padding_row_1,
						'args'        => array(
							'col_width' => 4
						)
					)
				);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_initial_content_width_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'pawfriends' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'pawfriends' ),
				'parent'        => $general_meta_box,
				'options'       => array(
					''                => esc_html__( 'Default', 'pawfriends' ),
					'mkdf-grid-1300' => esc_html__( '1300px', 'pawfriends' ),
					'mkdf-grid-1200' => esc_html__( '1200px', 'pawfriends' ),
					'mkdf-grid-1100' => esc_html__( '1100px', 'pawfriends' ),
					'mkdf-grid-1000' => esc_html__( '1000px', 'pawfriends' ),
					'mkdf-grid-800'  => esc_html__( '800px', 'pawfriends' )
				)
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_page_grid_space_meta',
				'type'        => 'select',
				'default_value' => '',
				'label'       => esc_html__( 'Grid Layout Space', 'pawfriends' ),
				'description' => esc_html__( 'Choose a space between content layout and sidebar layout for your page', 'pawfriends' ),
				'options'     => pawfriends_mikado_get_space_between_items_array( true ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Content Layout - end **********************/
		
		/***************** Boxed Layout - begin **********************/
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'    => 'mkdf_boxed_meta',
				'type'    => 'select',
				'label'   => esc_html__( 'Boxed Layout', 'pawfriends' ),
				'parent'  => $general_meta_box,
				'options' => pawfriends_mikado_get_yes_no_select_array()
			)
		);
		
			$boxed_container_meta = pawfriends_mikado_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'boxed_container_meta',
					'dependency' => array(
						'hide' => array(
							'mkdf_boxed_meta' => array( '', 'no' )
						)
					)
				)
			);
		
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_page_background_color_in_box_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'pawfriends' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'pawfriends' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_boxed_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'pawfriends' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'pawfriends' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_boxed_pattern_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'pawfriends' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'pawfriends' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_boxed_background_image_attachment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Attachment', 'pawfriends' ),
						'description'   => esc_html__( 'Choose background image attachment', 'pawfriends' ),
						'parent'        => $boxed_container_meta,
						'options'       => array(
							''       => esc_html__( 'Default', 'pawfriends' ),
							'fixed'  => esc_html__( 'Fixed', 'pawfriends' ),
							'scroll' => esc_html__( 'Scroll', 'pawfriends' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_paspartu_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Passepartout', 'pawfriends' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'pawfriends' ),
				'parent'        => $general_meta_box,
				'options'       => pawfriends_mikado_get_yes_no_select_array(),
			)
		);
		
			$paspartu_container_meta = pawfriends_mikado_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'mkdf_paspartu_container_meta',
					'dependency' => array(
						'hide' => array(
							'mkdf_paspartu_meta'  => array('','no')
						)
					)
				)
			);
		
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_paspartu_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'pawfriends' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'pawfriends' ),
						'parent'      => $paspartu_container_meta
					)
				);
				
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_paspartu_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'pawfriends' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'pawfriends' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_paspartu_responsive_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'pawfriends' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'pawfriends' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				pawfriends_mikado_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'mkdf_disable_top_paspartu_meta',
						'label'         => esc_html__( 'Disable Top Passepartout', 'pawfriends' ),
						'options'       => pawfriends_mikado_get_yes_no_select_array(),
					)
				);
		
				pawfriends_mikado_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'mkdf_enable_fixed_paspartu_meta',
						'label'         => esc_html__( 'Enable Fixed Passepartout', 'pawfriends' ),
						'description'   => esc_html__( 'Enabling this option will set fixed passepartout for your screens', 'pawfriends' ),
						'options'       => pawfriends_mikado_get_yes_no_select_array(),
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_smooth_page_transitions_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Smooth Page Transitions', 'pawfriends' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'pawfriends' ),
				'parent'        => $general_meta_box,
				'options'       => pawfriends_mikado_get_yes_no_select_array()
			)
		);
		
			$page_transitions_container_meta = pawfriends_mikado_add_admin_container(
				array(
					'parent'     => $general_meta_box,
					'name'       => 'page_transitions_container_meta',
					'dependency' => array(
						'hide' => array(
							'mkdf_smooth_page_transitions_meta' => array( '', 'no' )
						)
					)
				)
			);
		
				pawfriends_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_page_transition_preloader_meta',
						'type'        => 'select',
						'label'       => esc_html__( 'Enable Preloading Animation', 'pawfriends' ),
						'description' => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'pawfriends' ),
						'parent'      => $page_transitions_container_meta,
						'options'     => pawfriends_mikado_get_yes_no_select_array()
					)
				);
		
				$page_transition_preloader_container_meta = pawfriends_mikado_add_admin_container(
					array(
						'parent'     => $page_transitions_container_meta,
						'name'       => 'page_transition_preloader_container_meta',
						'dependency' => array(
							'hide' => array(
								'mkdf_page_transition_preloader_meta' => array( '', 'no' )
							)
						)
					)
				);
				
					pawfriends_mikado_create_meta_box_field(
						array(
							'name'   => 'mkdf_smooth_pt_bgnd_color_meta',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'pawfriends' ),
							'parent' => $page_transition_preloader_container_meta
						)
					);
					
					$group_pt_spinner_animation_meta = pawfriends_mikado_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation_meta',
							'title'       => esc_html__( 'Loader Style', 'pawfriends' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'pawfriends' ),
							'parent'      => $page_transition_preloader_container_meta
						)
					);
					
					$row_pt_spinner_animation_meta = pawfriends_mikado_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation_meta',
							'parent' => $group_pt_spinner_animation_meta
						)
					);
					
					pawfriends_mikado_create_meta_box_field(
						array(
							'type'    => 'selectsimple',
							'name'    => 'mkdf_smooth_pt_spinner_type_meta',
							'label'   => esc_html__( 'Spinner Type', 'pawfriends' ),
							'parent'  => $row_pt_spinner_animation_meta,
							'options' => array(
								''                      => esc_html__( 'Default', 'pawfriends' ),
								'pawfriends_spinner'    => esc_html__( 'Petfriends Spinner', 'pawfriends' ),
								'rotate_circles'        => esc_html__( 'Rotate Circles', 'pawfriends' ),
								'pulse'                 => esc_html__( 'Pulse', 'pawfriends' ),
								'double_pulse'          => esc_html__( 'Double Pulse', 'pawfriends' ),
								'cube'                  => esc_html__( 'Cube', 'pawfriends' ),
								'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'pawfriends' ),
								'stripes'               => esc_html__( 'Stripes', 'pawfriends' ),
								'wave'                  => esc_html__( 'Wave', 'pawfriends' ),
								'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'pawfriends' ),
								'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'pawfriends' ),
								'atom'                  => esc_html__( 'Atom', 'pawfriends' ),
								'clock'                 => esc_html__( 'Clock', 'pawfriends' ),
								'mitosis'               => esc_html__( 'Mitosis', 'pawfriends' ),
								'lines'                 => esc_html__( 'Lines', 'pawfriends' ),
								'fussion'               => esc_html__( 'Fussion', 'pawfriends' ),
								'wave_circles'          => esc_html__( 'Wave Circles', 'pawfriends' ),
								'pulse_circles'         => esc_html__( 'Pulse Circles', 'pawfriends' )
							)
						)
					);
					
					pawfriends_mikado_create_meta_box_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'mkdf_smooth_pt_spinner_color_meta',
							'label'  => esc_html__( 'Spinner Color', 'pawfriends' ),
							'parent' => $row_pt_spinner_animation_meta
						)
					);

					pawfriends_mikado_create_meta_box_field(
						array(
							'type'          => 'image',
							'name'          => 'mkdf_smooth_pt_spinner_image_meta',
							'label'         => esc_html__( 'Preloader Image', 'pawfriends' ),
							'parent'        => $row_pt_spinner_animation_meta,
							'dependency' => array(
								'show' => array(
									'mkdf_smooth_pt_spinner_type_meta' => 'pawfriends_spinner'
								)
							)
						)
					);

					pawfriends_mikado_create_meta_box_field(
						array(
							'type'          => 'text',
							'name'          => 'mkdf_smooth_pt_spinner_text_meta',
							'label'         => esc_html__( 'Preloader Subtitle', 'pawfriends' ),
							'parent'        => $row_pt_spinner_animation_meta,
							'dependency' => array(
								'show' => array(
									'mkdf_smooth_pt_spinner_type_meta' => 'pawfriends_spinner'
								)
							)
						)
					);
					
					pawfriends_mikado_create_meta_box_field(
						array(
							'name'        => 'mkdf_page_transition_fadeout_meta',
							'type'        => 'select',
							'label'       => esc_html__( 'Enable Fade Out Animation', 'pawfriends' ),
							'description' => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'pawfriends' ),
							'options'     => pawfriends_mikado_get_yes_no_select_array(),
							'parent'      => $page_transitions_container_meta
						
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		/***************** Comments Layout - begin **********************/
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_page_comments_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Show Comments', 'pawfriends' ),
				'description' => esc_html__( 'Enabling this option will show comments on your page', 'pawfriends' ),
				'parent'      => $general_meta_box,
				'options'     => pawfriends_mikado_get_yes_no_select_array()
			)
		);
		
		/***************** Comments Layout - end **********************/
	}
	
	add_action( 'pawfriends_mikado_action_meta_boxes_map', 'pawfriends_mikado_map_general_meta', 10 );
}

if ( ! function_exists( 'pawfriends_mikado_container_background_style' ) ) {
	/**
	 * Function that return container style
	 *
	 * @param $style
	 *
	 * @return string
	 */
	function pawfriends_mikado_container_background_style( $style ) {
		$page_id      = pawfriends_mikado_get_page_id();
		$class_prefix = pawfriends_mikado_get_unique_page_class( $page_id, true );
		
		$container_selector = array(
			$class_prefix . ' .mkdf-content'
		);
		
		$container_class        = array();
		$current_style = '';
		$page_background_color  = get_post_meta( $page_id, 'mkdf_page_background_color_meta', true );
		$page_background_image  = get_post_meta( $page_id, 'mkdf_page_background_image_meta', true );
		$page_background_repeat = get_post_meta( $page_id, 'mkdf_page_background_repeat_meta', true );
		
		if ( ! empty( $page_background_color ) ) {
			$container_class['background-color'] = $page_background_color;
		}
		
		if ( ! empty( $page_background_image ) ) {
			$container_class['background-image'] = 'url(' . esc_url( $page_background_image ) . ')';
			
			if ( $page_background_repeat === 'yes' ) {
				$container_class['background-repeat']   = 'repeat';
				$container_class['background-position'] = '0 0';
			} else {
				$container_class['background-repeat']   = 'no-repeat';
				$container_class['background-position'] = 'center 0';
				$container_class['background-size']     = 'cover';
			}
		}

		if(! empty( $container_class )) {
			$current_style = pawfriends_mikado_dynamic_css( $container_selector, $container_class );
		}

		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'pawfriends_mikado_filter_add_page_custom_style', 'pawfriends_mikado_container_background_style' );
}