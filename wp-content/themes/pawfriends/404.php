<?php get_header(); ?>
				<div class="mkdf-page-not-found">
					<?php
					$mkdf_title_image_404 = pawfriends_mikado_options()->getOptionValue( '404_page_title_image' );
					$mkdf_title_404       = pawfriends_mikado_options()->getOptionValue( '404_title' );
                    $mkdf_highlight_title = pawfriends_mikado_options()->getOptionValue( '404_highlight_title' );
					$mkdf_subtitle_404    = pawfriends_mikado_options()->getOptionValue( '404_subtitle' );
					$mkdf_text_404        = pawfriends_mikado_options()->getOptionValue( '404_text' );
					$mkdf_404_search      = pawfriends_mikado_options()->getOptionValue( '404_search' );
					$mkdf_404_button      = pawfriends_mikado_options()->getOptionValue( '404_button' );
					$mkdf_button_label    = pawfriends_mikado_options()->getOptionValue( '404_back_to_home' );
					$mkdf_button_style    = pawfriends_mikado_options()->getOptionValue( '404_button_style' );
					
					if ( ! empty( $mkdf_title_image_404 ) ) { ?>
						<div class="mkdf-404-title-image">
							<img src="<?php echo esc_url( $mkdf_title_image_404 ); ?>" alt="<?php esc_attr_e( '404 Title Image', 'pawfriends' ); ?>" />
						</div>
					<?php } ?>
					
					<h1 class="mkdf-404-title">
						<?php if ( ! empty( $mkdf_title_404 ) ) {
                            if ($mkdf_highlight_title === 'yes') {
                                echo '<span class="mkdf-404-highlight-title-holder">
                                    <span class="mkdf-404-highlight-title">' . esc_html($mkdf_title_404) . '</span>
                                        <span class="mkdf-404-highlight">
                                            ' . pawfriends_mikado_highlight_left_svg() . '
                                        <span class="mkdf-active-hover-middle"></span>
                                            ' . pawfriends_mikado_highlight_right_svg() . '
                                    </span>
                                </span>';
                            } else {
                                echo esc_html($mkdf_title_404);
                            }
						} else {
                            if ($mkdf_highlight_title === 'yes') {
                                echo '<span class="mkdf-404-highlight-title-holder">
                                        <span class="mkdf-404-highlight-title">' . esc_html__( '404', 'pawfriends' ) . '</span>
                                            <span class="mkdf-404-highlight">
                                                ' . pawfriends_mikado_highlight_left_svg() . '
                                            <span class="mkdf-active-hover-middle"></span>
                                                ' . pawfriends_mikado_highlight_right_svg() . '
                                        </span>
                                    </span>';
                            } else {
                                esc_html_e( '404', 'pawfriends' );
                            }
						} ?>
					</h1>
					
					<h3 class="mkdf-404-subtitle">
						<?php if ( ! empty( $mkdf_subtitle_404 ) ) {
							echo esc_html( $mkdf_subtitle_404 );
						} else {
							esc_html_e( '', 'pawfriends' );
						} ?>
					</h3>
					
					<p class="mkdf-404-text">
						<?php if ( ! empty( $mkdf_text_404 ) ) {
							echo esc_html( $mkdf_text_404 );
						} else {
							esc_html_e( 'Sorry, the page You are looking for is not found. Try the searchbox once more.', 'pawfriends' );
						} ?>
					</p>

                    <?php if ( $mkdf_404_search === 'yes' ) { ?>
                        <div class="mkdf-404-search">
                            <?php get_search_form(); ?>
                        </div>
                    <?php } ?>
					
					<?php if ( $mkdf_404_button === 'yes' ) {
                        $button_params = array(
                            'link' => esc_url(home_url('/')),
                            'text' => !empty($mkdf_button_label) ? $mkdf_button_label : esc_html__('Back to home', 'pawfriends')
                        );

                        if ($mkdf_button_style == 'light-style') {
                            $button_params['custom_class'] = 'mkdf-btn-light-style';
                        }

                        echo pawfriends_mikado_return_button_html($button_params);
                    } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>