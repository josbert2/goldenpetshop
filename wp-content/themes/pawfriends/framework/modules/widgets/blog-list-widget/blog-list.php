<?php

if ( class_exists( 'PawFriendsCoreClassWidget' ) ) {
	class PawFriendsMikadoClassBlogListWidget extends PawFriendsCoreClassWidget {
		public function __construct() {
			parent::__construct(
				'mkdf_blog_list_widget',
				esc_html__( 'PawFriends Blog List Widget', 'pawfriends' ),
				array( 'description' => esc_html__( 'Display a list of your blog posts', 'pawfriends' ) )
			);
			
			$this->setParams();
		}
		
		protected function setParams() {
			$this->params = array(
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
					'type'    => 'dropdown',
					'name'    => 'type',
					'title'   => esc_html__( 'Type', 'pawfriends' ),
					'options' => array(
						'simple'  => esc_html__( 'Simple', 'pawfriends' ),
						'minimal' => esc_html__( 'Minimal', 'pawfriends' )
					)
				),
				array(
					'type'  => 'textfield',
					'name'  => 'number_of_posts',
					'title' => esc_html__( 'Number of Posts', 'pawfriends' )
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'space_between_items',
					'title'   => esc_html__( 'Space Between Items', 'pawfriends' ),
					'options' => pawfriends_mikado_get_space_between_items_array( true )
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'orderby',
					'title'   => esc_html__( 'Order By', 'pawfriends' ),
					'options' => pawfriends_mikado_get_query_order_by_array()
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'order',
					'title'   => esc_html__( 'Order', 'pawfriends' ),
					'options' => pawfriends_mikado_get_query_order_array()
				),
				array(
					'type'        => 'textfield',
					'name'        => 'category',
					'title'       => esc_html__( 'Category Slug', 'pawfriends' ),
					'description' => esc_html__( 'Leave empty for all or use comma for list', 'pawfriends' )
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'title_tag',
					'title'   => esc_html__( 'Title Tag', 'pawfriends' ),
					'options' => array_reverse( pawfriends_mikado_get_title_tag() )
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'title_transform',
					'title'   => esc_html__( 'Title Text Transform', 'pawfriends' ),
					'options' => pawfriends_mikado_get_text_transform_array( true )
				),
			);
		}
		
		public function widget( $args, $instance ) {
			if ( ! is_array( $instance ) ) {
				$instance = array();
			}
			
			$instance['image_size']        = 'thumbnail';
			$instance['post_info_section'] = 'yes';
			$instance['number_of_columns'] = 'one';
            $instance['date_decor']        = 'yes';
			
			// Filter out all empty params
			$instance         = array_filter( $instance, function ( $array_value ) {
				return trim( $array_value ) != '';
			} );
			$instance['type'] = ! empty( $instance['type'] ) ? $instance['type'] : 'simple';
			
			$params = '';
			//generate shortcode params
			foreach ( $instance as $key => $value ) {
				$params .= " $key='$value' ";
			}

            $allowed_html = array(
                'div' => array(
                    'class' => array(),
                ),
                'span' => array(
                    'class' => array(),
                ),
                'svg' => array(
                    'xmlns' => array(),
                    'width' => array(),
                    'height' => array(),
                    'preserveaspectratio' => array(),
                    'viewbox' => array(),
                    'class' => array(),
                ),
                'path' => array(
                    'd' => array(),
                ),
                'h5' => array(
                    'class' => array(),
                ),
            );

			$widget_styles = array();
			if ( isset( $instance['widget_bottom_margin'] ) && $instance['widget_bottom_margin'] !== '' ) {
				$widget_styles[] = 'margin-bottom: ' . pawfriends_mikado_filter_px( $instance['widget_bottom_margin'] ) . 'px';
			}
			
			echo '<div class="widget mkdf-blog-list-widget" ' . pawfriends_mikado_get_inline_style( $widget_styles ) . '>';
			if ( ! empty( $instance['widget_title'] ) ) {
				if ( ! empty( $widget_title_styles ) ) {
					$args['before_title'] = pawfriends_mikado_widget_modified_before_title( $args['before_title'], $widget_title_styles );
				}
				
				echo wp_kses( $args['before_title'], $allowed_html ) . esc_html( $instance['widget_title'] ) . wp_kses( $args['after_title'], $allowed_html );
			}
			
			echo do_shortcode( "[mkdf_blog_list $params]" ); // XSS OK
			echo '</div>';
		}
	}
}