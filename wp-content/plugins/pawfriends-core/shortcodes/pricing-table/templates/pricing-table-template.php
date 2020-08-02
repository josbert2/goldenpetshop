<div class="mkdf-price-table mkdf-item-space <?php echo esc_attr($holder_classes); ?>">
	<div class="mkdf-pt-inner">
    <?php if ( isset( $image['image_id'] ) ) : ?>
        <div class="mkdf-pt-image">
            <?php echo wp_get_attachment_image( $image['image_id'], 'full' ); ?>
        </div>
    <?php endif; ?>
        <div class="mkdf-pt-content">
            <div class="mkdf-pt-col-1">
                <div class="mkdf-pl-price-holder" <?php echo pawfriends_mikado_inline_style( $price_color ); ?>>
                    <span class="mkdf-active-hover">
                       <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-left">
                           <path d="M2 0C0.9 0 0 0.9 0 2l2 23.8c0 1.1 0.9 2 2 2h3.9V0H2z"/>
                       </svg>
                       <span class="mkdf-active-hover-middle" <?php echo pawfriends_mikado_get_inline_style($price_styles); ?>></span>
                       <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-right">
                           <path d="M5.9 0c1.1 0 2 0.9 2 2L5 25.8c-0.2 1.6-1.1 1.9-3 2H0V0H5.9"/>
                       </svg>
                    </span>
                    <sup class="mkdf-pt-value"><?php esc_html_e($currency); ?></sup>
                    <span class="mkdf-pt-price"><?php esc_html_e($price); ?></span>
                </div>
                <h6 class="mkdf-pt-mark"><?php esc_html_e($price_period); ?></h6>
            </div>
            <div class="mkdf-pt-col-2">
                <ul>
                    <li class="mkdf-pt-title-holder">
                        <span class="mkdf-pt-title" <?php echo pawfriends_mikado_get_inline_style($title_styles); ?>><?php esc_html_e($title); ?></span>
                        <?php if (!empty ( $subtitle ) ) { ?>
                            <span class="mkdf-pt-subtitle"><?php esc_html_e($subtitle); ?></span>
                        <?php } ?>
                    </li>
                    <li class="mkdf-pt-content">
                        <?php echo do_shortcode($content); ?>
                    </li>
                    <?php
                    if(!empty($button_text)) { ?>
                        <li class="mkdf-pt-button">
                            <?php if ( function_exists('pawfriends_mikado_options') && pawfriends_mikado_options()->getOptionValue( 'decorative_paw_background' ) === 'yes' ) { ?>
                            <?php echo pawfriends_mikado_get_button_html(array(
                                'link' => $link,
                                'target' => $target,
                                'text' => $button_text,
                                'type' => $button_type,
                                'size' => 'medium',
                                'paw_background' => 'yes',
                            ));
                            } else {
                                echo pawfriends_mikado_get_button_html(array(
                                    'link' => $link,
                                    'target' => $target,
                                    'text' => $button_text,
                                    'type' => $button_type,
                                    'size' => 'medium'
                                ));
                            } ?>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
	</div>
</div>