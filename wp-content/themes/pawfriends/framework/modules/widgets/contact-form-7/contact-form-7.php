<?php

if ( class_exists( 'PawFriendsCoreClassWidget' ) ) {
	class PawFriendsMikadoClassContactForm7Widget extends PawFriendsCoreClassWidget {
		public function __construct() {
			parent::__construct(
				'mkdf_contact_form_7_widget',
				esc_html__( 'PawFriends Contact Form 7 Widget', 'pawfriends' ),
				array( 'description' => esc_html__( 'Add contact form 7 to widget areas', 'pawfriends' ) )
			);
			
			$this->setParams();
		}
		
		protected function setParams() {
			$cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
			
			$contact_forms = array();
			if ( $cf7 ) {
				foreach ( $cf7 as $cform ) {
					$contact_forms[ $cform->ID ] = $cform->post_title;
				}
			} else {
				$contact_forms[0] = esc_html__( 'No contact forms found', 'pawfriends' );
			}
			
			$this->params = array(
				array(
					'type'  => 'textfield',
					'name'  => 'extra_class',
					'title' => esc_html__( 'Extra Class Name', 'pawfriends' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'widget_bottom_margin',
					'title' => esc_html__( 'Widget Bottom Margin (px)', 'pawfriends' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'widget_title',
					'title' => esc_html__( 'Widget Title', 'pawfriends' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'widget_title_bottom_margin',
					'title' => esc_html__( 'Widget Title Bottom Margin (px)', 'pawfriends' )
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'contact_form',
					'title'   => esc_html__( 'Select Contact Form 7', 'pawfriends' ),
					'options' => $contact_forms
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'contact_form_style',
					'title'   => esc_html__( 'Contact Form 7 Style', 'pawfriends' ),
					'options' => array(
						''                   => esc_html__( 'Default', 'pawfriends' ),
						'cf7_custom_style_1' => esc_html__( 'Custom Style 1', 'pawfriends' ),
						'cf7_custom_style_2' => esc_html__( 'Custom Style 2', 'pawfriends' ),
						'cf7_custom_style_3' => esc_html__( 'Custom Style 3', 'pawfriends' )
					)
				)
			);
		}
		
		public function widget( $args, $instance ) {
			$extra_class = ! empty( $instance['extra_class'] ) ? esc_attr( $instance['extra_class'] ) : '';
			
			$widget_styles = array();
			if ( isset( $instance['widget_bottom_margin'] ) && $instance['widget_bottom_margin'] !== '' ) {
				$widget_styles[] = 'margin-bottom: ' . pawfriends_mikado_filter_px( $instance['widget_bottom_margin'] ) . 'px';
			}
			
			$widget_title_styles = array();
			if ( isset( $instance['widget_title_bottom_margin'] ) && $instance['widget_title_bottom_margin'] !== '' ) {
				$widget_title_styles[] = 'margin-bottom: ' . pawfriends_mikado_filter_px( $instance['widget_title_bottom_margin'] ) . 'px';
			}
			?>
			<div class="widget mkdf-contact-form-7-widget <?php echo esc_attr( $extra_class ); ?>" <?php echo pawfriends_mikado_get_inline_style( $widget_styles ); ?>>
				<?php if ( ! empty( $instance['widget_title'] ) ) {
					if ( ! empty( $widget_title_styles ) ) {
						$args['before_title'] = pawfriends_mikado_widget_modified_before_title( $args['before_title'], $widget_title_styles );
					}
					
					echo pawfriends_mikado_get_module_part( $args['before_title'] ) . esc_html( $instance['widget_title'] ) . wp_kses_post( $args['after_title'] );
				} ?>
				<?php if ( ! empty( $instance['contact_form'] ) ) {
					echo do_shortcode( '[contact-form-7 id="' . esc_attr( $instance['contact_form'] ) . '" html_class="' . esc_attr( $instance['contact_form_style'] ) . '"]' );
				} ?>
			</div>
			<?php
		}
	}
}