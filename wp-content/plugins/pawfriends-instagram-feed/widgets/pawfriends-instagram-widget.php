<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PawFriendsInstagramWidget extends WP_Widget {
	protected $params;
	
	public function __construct() {
		parent::__construct(
			'mkdf_instagram_widget',
			esc_html__( 'PawFriends Instagram Widget', 'pawfriends-instagram-feed' ),
			array(
				'description' => esc_html__( 'Display your Instagram feed', 'pawfriends-instagram-feed' )
			)
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'name'  => 'title',
				'type'  => 'textfield',
				'title' => esc_html__( 'Title', 'pawfriends-instagram-feed' )
			),
			array(
				'name'    => 'type',
				'type'    => 'dropdown',
				'title'   => esc_html__( 'Type', 'pawfriends-instagram-feed' ),
				'options' => array(
					'gallery'  => esc_html__( 'Gallery', 'pawfriends-instagram-feed' ),
					'carousel' => esc_html__( 'Carousel', 'pawfriends-instagram-feed' )
				)
			),
			array(
				'name'    => 'number_of_cols',
				'type'    => 'dropdown',
				'title'   => esc_html__( 'Number of Columns', 'pawfriends-instagram-feed' ),
				'options' => array(
					'2' => esc_html__( 'Two', 'pawfriends-instagram-feed' ),
					'3' => esc_html__( 'Three', 'pawfriends-instagram-feed' ),
					'4' => esc_html__( 'Four', 'pawfriends-instagram-feed' ),
					'6' => esc_html__( 'Six', 'pawfriends-instagram-feed' ),
					'9' => esc_html__( 'Nine', 'pawfriends-instagram-feed' )
				)
			),
			array(
				'name'  => 'number_of_photos',
				'type'  => 'textfield',
				'title' => esc_html__( 'Number of Photos', 'pawfriends-instagram-feed' )
			),
			array(
				'name'    => 'image_size',
				'type'    => 'dropdown',
				'title'   => esc_html__( 'Image Size', 'pawfriends-instagram-feed' ),
				'options' => array(
					'thumbnail'           => esc_html__( 'Small', 'pawfriends-instagram-feed' ),
					'low_resolution'      => esc_html__( 'Medium', 'pawfriends-instagram-feed' ),
					'standard_resolution' => esc_html__( 'Large', 'pawfriends-instagram-feed' )
				)
			),
			array(
				'name'    => 'space_between_items',
				'type'    => 'dropdown',
				'title'   => esc_html__( 'Space Between Items', 'pawfriends-instagram-feed' ),
				'options' => array(
                    'normal' => esc_html__( 'Normal (15)', 'pawfriends-instagram-feed' ),
                    'small'  => esc_html__( 'Small (10)', 'pawfriends-instagram-feed' ),
                    'tiny'   => esc_html__( 'Tiny (3)', 'pawfriends-instagram-feed' ),
                    'no'     => esc_html__( 'No (0)', 'pawfriends-instagram-feed' ),
                )
			),
			array(
				'name'    => 'show_instagram_icon',
				'type'    => 'dropdown',
				'title'   => esc_html__( 'Show Instagram Icon', 'pawfriends-instagram-feed' ),
				'options' => pawfriends_mikado_get_yes_no_select_array( false, true )
			),
			array(
				'name'  => 'transient_time',
				'type'  => 'textfield',
				'title' => esc_html__( 'Images Cache Time', 'pawfriends-instagram-feed' )
			)
		);
	}
	
	public function getParams() {
		return $this->params;
	}
	
	public function widget( $args, $instance ) {
		extract( $instance );

		echo pawfriends_mikado_get_module_part($args['before_widget']);
		if ( ! empty( $title ) ) {
			echo pawfriends_mikado_get_module_part($args['before_title'] . $title . $args['after_title']);
		}
		
		$number_of_photos = isset( $number_of_photos ) ? $number_of_photos : '6';
		
		$instagram_api = PawFriendsInstagramApi::getInstance();
		$images_array  = $instagram_api->getImages( $number_of_photos, array(
			'use_transients' => true,
			'transient_name' => $args['widget_id'],
			'transient_time' => $transient_time
		) );
		
		$type                = ! empty( $type ) ? $type : 'gallery';
		$number_of_cols      = $number_of_cols == '' ? 3 : $number_of_cols;
		$space_between_items = ! empty( $space_between_items ) ? $space_between_items : 'normal';
		$show_instagram_icon = ! empty( $show_instagram_icon ) ? $show_instagram_icon : 'yes';

		$widget_class = '';
		$slider_data  = array();
		
		if ( $type === 'carousel' ) {
			$widget_class = 'mkdf-instagram-carousel mkdf-owl-slider';
			
			$slider_margin = 0;
			if ( $space_between_items === 'normal' ) {
				$slider_margin = 30;
			} else if ( $space_between_items === 'small' ) {
				$slider_margin = 20;
			} else if ( $space_between_items === 'tiny' ) {
				$slider_margin = 10;
			} else if ( $space_between_items === 'no' ) {
				$slider_margin = 0;
			}
			
			$slider_data['data-number-of-items']   = esc_attr( $number_of_cols );
			$slider_data['data-slider-margin']     = esc_attr( $slider_margin );
			$slider_data['data-enable-navigation'] = 'no';
			$slider_data['data-enable-pagination'] = 'no';
		} else if ( $type == 'gallery' ) {
			$widget_class = 'mkdf-instagram-gallery mkdf-' . esc_attr( $space_between_items ) . '-space';
		}
		
		if ( is_array( $images_array ) && count( $images_array ) ) { ?>
			<ul class="mkdf-instagram-feed clearfix mkdf-col-<?php echo esc_attr( $number_of_cols ); ?> <?php echo esc_attr( $widget_class ); ?>" <?php echo pawfriends_mikado_get_inline_attrs( $slider_data ); ?>>
				<?php
				foreach ( $images_array as $image ) { ?>
					<li>
						<a href="<?php echo esc_url( $instagram_api->getHelper()->getImageLink( $image ) ); ?>" target="_blank">
							<?php if ( $show_instagram_icon == 'yes' ) { ?>
                                <span class="mkdf-instagram-icon"><i class="social_instagram"></i></span>
							<?php } ?>
							<?php echo pawfriends_mikado_kses_img( $instagram_api->getHelper()->getImageHTML( $image, $image_size ) ); ?>
						</a>
					</li>
				<?php } ?>
			</ul>
		<?php }

		echo pawfriends_mikado_get_module_part($args['after_widget']);
	}
	
	public function form( $instance ) {
		foreach ( $this->params as $param_array ) {
			$param_name    = $param_array['name'];
			${$param_name} = isset( $instance[ $param_name ] ) ? esc_attr( $instance[ $param_name ] ) : '';
		}
		
		$instagram_api = PawFriendsInstagramApi::getInstance();
		
		//user has connected with instagram. Show form
		if ( $instagram_api->hasUserConnected() ) {
			foreach ( $this->params as $param ) {
				switch ( $param['type'] ) {
					case 'textfield':
						?>
						<p>
							<label for="<?php echo esc_attr( $this->get_field_id( $param['name'] ) ); ?>"><?php echo esc_html( $param['title'] ); ?></label>
							<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( $param['name'] ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $param['name'] ) ); ?>" type="text" value="<?php echo esc_attr( ${$param['name']} ); ?>"/>
						</p>
						<?php
						break;
					case 'dropdown':
						?>
						<p>
							<label for="<?php echo esc_attr( $this->get_field_id( $param['name'] ) ); ?>"><?php echo esc_html( $param['title'] ); ?></label>
							<?php if ( isset( $param['options'] ) && is_array( $param['options'] ) && count( $param['options'] ) ) { ?>
								<select class="widefat" name="<?php echo esc_attr( $this->get_field_name( $param['name'] ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( $param['name'] ) ); ?>">
									<?php foreach ( $param['options'] as $param_option_key => $param_option_val ) {
										$option_selected = '';
										if ( ${$param['name']} == $param_option_key ) {
											$option_selected = 'selected';
										}
										?>
										<option <?php echo esc_attr( $option_selected ); ?> value="<?php echo esc_attr( $param_option_key ); ?>"><?php echo esc_attr( $param_option_val ); ?></option>
									<?php } ?>
								</select>
							<?php } ?>
						</p>
						
						<?php
						break;
				}
			}
		}
	}
}

if ( ! function_exists( 'pawfriends_instagram_feed_widget_load' ) ) {
	function pawfriends_instagram_feed_widget_load() {
		if ( pawfriends_instagram_theme_installed() ) {
			register_widget( 'PawFriendsInstagramWidget' );
		}
	}
	
	add_action( 'widgets_init', 'pawfriends_instagram_feed_widget_load' );
}