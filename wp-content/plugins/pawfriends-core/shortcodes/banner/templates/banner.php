<div class="mkdf-banner-holder <?php echo esc_attr($holder_classes); ?>">
    <div class="mkdf-banner-image">
        <?php echo wp_get_attachment_image($background_image, 'full'); ?>
        <?php if (!empty ( $foreground_image ) ) { ?>
            <div class="mkdf-banner-foreground-image">
                <?php echo wp_get_attachment_image($foreground_image, 'full'); ?>
            </div>
        <?php } ?>
    </div>
    <div class="mkdf-banner-text-holder" <?php echo pawfriends_mikado_get_inline_style($overlay_styles); ?>>
	    <div class="mkdf-banner-text-outer">
		    <div class="mkdf-banner-text-inner">
		        <?php if(!empty($title)) { ?>
                    <?php if(!empty($link)) { ?>
                        <a itemprop="url" class="mkdf-banner-title-holder" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>">
                            <span class="mkdf-active-hover">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-left">
                                    <path d="M2 0C0.9 0 0 0.9 0 2l2 23.8c0 1.1 0.9 2 2 2h3.9V0H2z"/>
                                </svg>
                                <span class="mkdf-active-hover-middle"></span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-right">
                                   <path d="M5.9 0c1.1 0 2 0.9 2 2L5 25.8c-0.2 1.6-1.1 1.9-3 2H0V0H5.9"/>
                                </svg>
                            </span>
                        <?php } ?>
                            <<?php echo esc_attr($title_tag); ?> class="mkdf-banner-title" <?php echo pawfriends_mikado_get_inline_style($title_styles); ?>>
                                <?php esc_html_e( $title ) ?>
                            </<?php echo esc_attr($title_tag); ?>>
                        <?php if(!empty($link)) { ?>
                            </a>
                    <?php } ?>
		        <?php } ?>
                <?php if(!empty($text)) { ?>
                    <p class="mkdf-banner-text" <?php echo pawfriends_mikado_get_inline_style($text_styles); ?>>
                        <?php echo esc_html($text); ?>
                    </p>
                <?php } ?>
				<?php if(!empty($link) && !empty($link_text)) { ?>
                    <div class="mkdf-banner-link-holder" <?php echo pawfriends_mikado_get_inline_style($link_styles); ?> >
                        <?php echo pawfriends_mikado_get_button_html(array(
                            'link' => $link,
                            'target' => $target,
                            'text' => $link_text,
                            'type' => 'simple',
                            'size' => 'medium'
                        )); ?>
                    </div>
		        <?php } ?>
			</div>
		</div>
	</div>
	<?php if (!empty($link)) { ?>
        <a itemprop="url" class="mkdf-banner-link" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>"></a>
    <?php } ?>
</div>