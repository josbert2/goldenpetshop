<div <?php pawfriends_mikado_class_attribute($holder_classes); ?>>
	<div class="mkdf-iwt-content" <?php pawfriends_mikado_inline_style($content_styles); ?>>
		<?php if(!empty($title)) { ?>
			<<?php echo esc_attr($title_tag); ?> class="mkdf-iwt-title" <?php pawfriends_mikado_inline_style($title_styles); ?>>
				<?php if(!empty($link)) : ?>
					<a itemprop="url" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>">
				<?php endif; ?>
                <?php if(!empty($custom_hover_icon)) : ?>
                    <span class="mkdf-iwt-custom-icon-holder">
                <?php endif; ?>
					<span class="mkdf-iwt-icon">
						<?php if(!empty($custom_icon)) : ?>
                            <span class="mkdf-iwt-custom-icon">
							    <?php echo wp_get_attachment_image($custom_icon, 'full'); ?>
                            </span>
						<?php else: ?>
							<?php echo pawfriends_core_get_shortcode_module_template_part('templates/icon', 'icon-with-text', '', array('icon_parameters' => $icon_parameters)); ?>
						<?php endif; ?>
					</span>
                    <?php if(!empty($custom_hover_icon) && !empty($custom_icon) ) : ?>
                        <span class="mkdf-iwt-custom-hover-icon">
                            <?php echo wp_get_attachment_image($custom_hover_icon, 'full'); ?>
                        </span>
                    <?php endif; ?>
                    <?php if(!empty($custom_hover_icon)) : ?>
                </span>
                <?php endif; ?>
					<span class="mkdf-iwt-title-text"><?php echo esc_html($title); ?></span>
				<?php if(!empty($link)) : ?>
					</a>
				<?php endif; ?>
			</<?php echo esc_attr($title_tag); ?>>
		<?php } ?>
		<?php if(!empty($text)) { ?>
			<p class="mkdf-iwt-text" <?php pawfriends_mikado_inline_style($text_styles); ?>><?php echo esc_html($text); ?></p>
		<?php } ?>
        <?php if(!empty($link)) { ?>
            <?php echo pawfriends_mikado_get_button_html(array(
                'link' => $link,
                'target' => $target,
                'text' => $link_text,
                'type' => 'simple',
                'size' => 'medium'
            )); ?>
        <?php } ?>
	</div>
</div>