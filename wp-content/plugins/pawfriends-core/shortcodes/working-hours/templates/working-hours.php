<div class="mkdf-wh-holder <?php echo esc_attr($holder_classes); ?>">
    <?php if ( ! empty( $working_hour_items ) ) { ?>
        <ul class="mkdf-wh">
            <?php foreach ( $working_hour_items as $item ): ?>
                <?php if (!empty ( $item['day'] ) && (!empty ( $item['hour'] ) ) ) { ?>
                    <li <?php echo pawfriends_mikado_get_inline_style($hours_bg_styles); ?>>
                        <span class="mkdf-wh-day"><?php esc_html_e($item['day']); ?></span>
                        <span class="mkdf-wh-dots"></span>
                        <span class="mkdf-wh-hours">
                            <span class="mkdf-active-hover">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-left">
                                    <path d="M2 0C0.9 0 0 0.9 0 2l2 23.8c0 1.1 0.9 2 2 2h3.9V0H2z"/>
                                </svg>
                                <span class="mkdf-active-hover-middle" <?php echo pawfriends_mikado_get_inline_style($hours_bg_color_styles); ?>></span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-right">
                                    <path d="M5.9 0c1.1 0 2 0.9 2 2L5 25.8c-0.2 1.6-1.1 1.9-3 2H0V0H5.9"/>
                                </svg>
                            </span>
                            <span class="mkdf-wh-hour-text" <?php echo pawfriends_mikado_get_inline_style($hours_styles); ?>><?php esc_html_e($item['hour']); ?></span>
                        </span>
                    </li>
                <?php } ?>
            <?php endforeach; ?>
        </ul>
    <?php } ?>
</div>