<?php

if ( class_exists( 'PawFriendsCoreClassWidget' ) ) {
	class PawFriendsMikadoClassClassIconsGroupWidget extends PawFriendsCoreClassWidget {
		public function __construct() {
			parent::__construct(
				'mkdf_social_icons_group_widget',
				esc_html__( 'PawFriends Social Icons Group Widget', 'pawfriends' ),
				array( 'description' => esc_html__( 'Use this widget to add a group of up to 6 social icons to a widget area.', 'pawfriends' ) )
			);
			
			$this->setParams();
		}
		
		protected function setParams() {
			$this->params = array_merge(
				array(
					array(
						'type'  => 'textfield',
						'name'  => 'widget_title',
						'title' => esc_html__( 'Widget Title', 'pawfriends' )
					)
				),
				pawfriends_mikado_icon_collections()->getSocialIconWidgetMultipleParamsArray( 6 ),
				array(
					array(
						'type'    => 'dropdown',
						'name'    => 'layout',
						'title'   => esc_html__( 'Icons Layout', 'pawfriends' ),
						'options' => array(
							''             => esc_html__( 'Default', 'pawfriends' ),
                            'circle-icons' => esc_html__( 'Circle', 'pawfriends' ),
							'square-icons' => esc_html__( 'Square', 'pawfriends' ),
						)
					),
					array(
						'type'        => 'dropdown',
						'name'        => 'skin',
						'title'       => esc_html__( 'Icons Skin', 'pawfriends' ),
						'description' => esc_html__( 'Applies to the circle and square layouts', 'pawfriends' ),
						'options'     => array(
							''           => esc_html__( 'Dark Skin', 'pawfriends' ),
							'light-skin' => esc_html__( 'Light Skin', 'pawfriends' ),
						)
					),
					array(
						'type'    => 'dropdown',
						'name'    => 'alignment',
						'title'   => esc_html__( 'Text Alignment', 'pawfriends' ),
						'options' => array(
							'left'   => esc_html__( 'Left', 'pawfriends' ),
							'center' => esc_html__( 'Center', 'pawfriends' ),
							'right'  => esc_html__( 'Right', 'pawfriends' )
						)
					),
					array(
						'type'  => 'textfield',
						'name'  => 'icon_size',
                        'description' => esc_html__( 'Applies to the default and square layouts', 'pawfriends' ),
						'title' => esc_html__( 'Icons Size (px)', 'pawfriends' )
					),
					array(
						'type'  => 'colorpicker',
						'name'  => 'color',
						'title' => esc_html__( 'Color', 'pawfriends' )
					),
					array(
						'type'  => 'colorpicker',
						'name'  => 'hover_color',
						'title' => esc_html__( 'Hover Color', 'pawfriends' )
					),
					array(
						'type'        => 'textfield',
						'name'        => 'margin',
						'title'       => esc_html__( 'Margin', 'pawfriends' ),
						'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'pawfriends' )
					)
				)
			);
		}
		
		public function widget( $args, $instance ) {
			$icon_styles = array();
			$class       = array();

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
			
			if ( ! empty( $instance['skin'] ) ) {
				$class[] = 'mkdf-' . $instance['skin'];
			}
			
			if ( ! empty( $instance['layout'] ) ) {
				$class[] = 'mkdf-' . $instance['layout'];
			}
			
			if ( ! empty( $instance['alignment'] ) ) {
				$class[] = 'text-align-' . $instance['alignment'];
			}
			
			if ( ! empty( $instance['color'] ) ) {
				$icon_styles[] = 'color: ' . $instance['color'] . ';';
			}
			
			if ( ! empty( $instance['icon_size'] ) && ( $instance['layout'] !== 'circle-icons' ) ) {
				$icon_styles[] = 'font-size: ' . pawfriends_mikado_filter_px( $instance['icon_size'] ) . 'px';
			}
			
			if ( ! empty( $instance['margin'] ) ) {
				$icon_styles[] = 'margin: ' . $instance['margin'] . ';';
			}
			
			$hover_color = ! empty( $instance['hover_color'] ) ? $instance['hover_color'] : '';
			$class       = implode( ' ', $class );
			
			echo '<div class="widget mkdf-social-icons-group-widget ' . esc_attr( $class ) . '">';
			
			if ( ! empty( $instance['widget_title'] ) ) {
				echo wp_kses( $args['before_title'], $allowed_html ) . esc_html( $instance['widget_title'] ) . wp_kses( $args['after_title'], $allowed_html );
			}

            echo '<div class="mkdf-social-icon-group-holder">';
			
			for ( $n = 1; $n <= 6; $n ++ ) {
				$link   = ! empty( $instance[ 'link_' . $n ] ) ? $instance[ 'link_' . $n ] : '#';
				$target = ! empty( $instance[ 'target_' . $n ] ) ? $instance[ 'target_' . $n ] : '_self';
				
				$icon_holder_html = '';
				if ( ! empty( $instance['icon_pack'] ) ) {
					$icon_class = array( 'mkdf-social-icon-widget' );
					if ( ! empty( $instance[ 'fa_icon_' . $n ] ) && $instance['icon_pack'] === 'font_awesome' ) {
						$icon_class[] = $instance[ 'fa_icon_' . $n ];
					}
					
					if ( ! empty( $instance[ 'fe_icon_' . $n ] ) && $instance['icon_pack'] === 'font_elegant' ) {
						$icon_class[] = $instance[ 'fe_icon_' . $n ];
					}
					
					if ( ! empty( $instance[ 'ion_icon_' . $n ] ) && $instance['icon_pack'] === 'ion_icons' ) {
						$icon_class[] = $instance[ 'ion_icon_' . $n ];
					}
					
					if ( ! empty( $instance[ 'simple_line_icon_' . $n ] ) && $instance['icon_pack'] === 'simple_line_icons' ) {
						$icon_class[] = $instance[ 'simple_line_icon_' . $n ];
					}
					
					if ( ! empty( $icon_class ) && isset( $icon_class[1] ) && ! empty( $icon_class[1] ) ) {
						$icon_class       = implode( ' ', $icon_class );
						$icon_holder_html = '<span class="' . $icon_class . '"></span>';
					} else {
						$icon_holder_html = '';
					}
				}
				?>
				<?php if ( ! empty( $icon_holder_html ) ) { ?>
					<a class="mkdf-social-icon-widget-holder mkdf-icon-has-hover" <?php echo pawfriends_mikado_get_inline_attr( $hover_color, 'data-hover-color' ); ?> <?php pawfriends_mikado_inline_style( $icon_styles ) ?> href="<?php echo esc_url( $link ); ?>" target="<?php echo esc_attr( $target ); ?>">

                    <?php if ( $instance['layout'] === 'circle-icons' ) { ?>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31 29" class="mkdf-social">
                           <path d="M1 14C1 14 0 1 15 1c12.5 0 14.6 9 14.9 12 0.1 0.6 0 1.2-0.1 1.8C28.9 17.8 25.4 28 16 28 5 28 2 19 1 14z"/>
                        </svg>
                        <?php }
                        echo wp_kses_post( $icon_holder_html ); ?>
					</a>
				<?php }
			}
			echo '</div></div>';
		}
	}
}