<?php do_action('pawfriends_mikado_action_before_page_title'); ?>

<div class="mkdf-title-holder <?php echo esc_attr($holder_classes); ?>" <?php pawfriends_mikado_inline_style($holder_styles); ?> <?php echo pawfriends_mikado_get_inline_attrs($holder_data); ?>>
	<?php if(!empty($title_image)) { ?>
		<div class="mkdf-title-image">
			<img itemprop="image" src="<?php echo esc_url($title_image['src']); ?>" alt="<?php echo esc_attr($title_image['alt']); ?>" />
		</div>
	<?php } ?>
	<div class="mkdf-title-wrapper" <?php pawfriends_mikado_inline_style($wrapper_styles); ?>>
		<div class="mkdf-title-inner">
			<div class="mkdf-grid">
				<?php if(!empty($title)) { ?>
                    <?php if($title_box == 'yes') { ?>
                        <div class="mkdf-title-text-holder">
                        <?php echo pawfriends_mikado_title_svg(); ?>
                    <?php } ?>
					<<?php echo esc_attr($title_tag); ?> class="mkdf-page-title entry-title" <?php pawfriends_mikado_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
                    <?php if($title_box == 'yes') { ?>
                        </div>
                    <?php } ?>
                <?php } ?>
				<?php if(!empty($subtitle)){ ?>
					<<?php echo esc_attr($subtitle_tag); ?> class="mkdf-page-subtitle" <?php pawfriends_mikado_inline_style($subtitle_styles); ?>><?php echo esc_html($subtitle); ?></<?php echo esc_attr($subtitle_tag); ?>>
				<?php } ?>
			</div>
	    </div>
	</div>
</div>

<?php do_action('pawfriends_mikado_action_after_page_title'); ?>