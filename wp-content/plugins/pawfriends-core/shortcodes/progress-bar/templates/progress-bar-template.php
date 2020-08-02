<div class="mkdf-progress-bar <?php echo esc_attr($holder_classes); ?>">
	<<?php echo esc_attr($title_tag); ?> class="mkdf-pb-title-holder" <?php echo pawfriends_mikado_inline_style($title_styles); ?>>
		<span class="mkdf-pb-title"><?php echo esc_html($title); ?></span>
        <span class="mkdf-pb-percent-holder">
            <span class="mkdf-active-hover" <?php echo pawfriends_mikado_inline_style( $percentage_color ); ?>>
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-left">
                    <path d="M2 0C0.9 0 0 0.9 0 2l2 23.8c0 1.1 0.9 2 2 2h3.9V0H2z"/>
                </svg>
                <span class="mkdf-active-hover-middle" <?php echo pawfriends_mikado_inline_style( $svg_bg_color ); ?>></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-right">
                    <path d="M5.9 0c1.1 0 2 0.9 2 2L5 25.8c-0.2 1.6-1.1 1.9-3 2H0V0H5.9"/>
                </svg>
            </span>
		    <span class="mkdf-pb-percent">0</span>
        </span>
	</<?php echo esc_attr($title_tag); ?>>
	<div class="mkdf-pb-content-holder" <?php echo pawfriends_mikado_inline_style($inactive_bar_style); ?>>
		<div data-percentage=<?php echo esc_attr($percent); ?> class="mkdf-pb-content" <?php echo pawfriends_mikado_inline_style($active_bar_style); ?>></div>
	</div>
</div>