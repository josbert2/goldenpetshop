<?php
$content_styles = $this_object->getStandardContentStyles($params);

echo pawfriends_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'parts/image', $item_style, $params); ?>

<?php if ( $params['enable_title'] === 'yes' || $params['enable_category'] === 'yes' || $params['enable_count_images'] === 'yes' || $params['enable_excerpt'] === 'yes' ) { ?>
    <div class="mkdf-pli-text-holder" <?php pawfriends_mikado_inline_style($content_styles); ?>>
        <div class="mkdf-pli-text-wrapper">
            <div class="mkdf-pli-text">
                <?php echo pawfriends_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'parts/title', $item_style, $params); ?>

                <?php echo pawfriends_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'parts/category', $item_style, $params); ?>

                <?php echo pawfriends_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'parts/images-count', $item_style, $params); ?>

                <?php echo pawfriends_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'parts/excerpt', $item_style, $params); ?>
            </div>
        </div>
    </div>
<?php } ?>
