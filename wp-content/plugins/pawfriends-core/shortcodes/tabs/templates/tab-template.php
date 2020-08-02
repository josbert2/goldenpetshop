<div class="mkdf-tabs <?php echo esc_attr($holder_classes); ?>">
    <ul class="mkdf-tabs-nav clearfix">
        <?php
        $i=0;
        foreach ($tabs_titles as $tab_title) { ?>

            <?php if ( $type == 'vertical' ) { ?>

                <li <?php echo isset( $tabs_titles_color[$i] ) && ! empty( $tabs_titles_color[$i] ) ? pawfriends_mikado_get_inline_style( array( 'background-color:' . $tabs_titles_color[$i] ) ) : ''; ?>>

            <?php } else { ?>

                <li>

            <?php } ?>

                <?php if(!empty($tab_title)) { ?>
                    <a href="#tab-<?php echo sanitize_title($tab_title)?>"><span class="mkdf-tab-title"><?php echo esc_html($tab_title); ?></span></a>
                <?php } ?>
            </li>
        <?php
        $i++;
        } ?>
    </ul>
    <?php echo do_shortcode($content); ?>
</div>
