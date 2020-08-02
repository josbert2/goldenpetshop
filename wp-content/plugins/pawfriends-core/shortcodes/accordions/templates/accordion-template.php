<<?php echo esc_attr($title_tag); ?> class="mkdf-accordion-title">
	<span class="mkdf-tab-title"><?php echo esc_html($title); ?></span>
    <span class="mkdf-accordion-mark">
		<span class="mkdf_icon_plus">
            <?php echo pawfriends_core_accordion_plus_svg(); ?>
        </span>
		<span class="mkdf_icon_minus">
            <?php echo pawfriends_core_accordion_minus_svg(); ?>
        </span>
	</span>
</<?php echo esc_attr($title_tag); ?>>
<div class="mkdf-accordion-content">
	<div class="mkdf-accordion-content-inner">
		<?php echo do_shortcode($content); ?>
	</div>
</div>