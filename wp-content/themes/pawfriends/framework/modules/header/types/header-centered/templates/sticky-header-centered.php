<?php do_action('pawfriends_mikado_action_after_sticky_header'); ?>

    <div class="mkdf-sticky-header">
        <?php do_action('pawfriends_mikado_action_after_sticky_menu_html_open'); ?>
        <div class="mkdf-sticky-holder">
        <?php if ($sticky_header_in_grid) : ?>
            <div class="mkdf-grid">
        <?php endif; ?>
                <div class=" mkdf-vertical-align-containers">
                    <div class="mkdf-position-left"><!--
                     --><div class="mkdf-position-left-inner">
                            <?php if (!$hide_logo) {
                                pawfriends_mikado_get_logo('sticky');
                            } ?>
                        </div>
                    </div>
                    <div class="mkdf-position-right"><!--
                     --><div class="mkdf-position-right-inner">
                            <?php pawfriends_mikado_get_sticky_menu('mkdf-sticky-nav'); ?>
                        </div>
                    </div>
                </div>
        <?php if ($sticky_header_in_grid) : ?>
            </div>
        <?php endif; ?>
        </div>
    </div>

<?php do_action('pawfriends_mikado_action_after_sticky_header'); ?>