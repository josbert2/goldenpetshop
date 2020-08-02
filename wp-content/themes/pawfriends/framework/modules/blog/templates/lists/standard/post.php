<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="mkdf-post-content">
        <div class="mkdf-post-heading">
            <?php pawfriends_mikado_get_module_template_part('templates/parts/media', 'blog', $post_format, $part_params); ?>
        </div>
        <div class="mkdf-post-text">
            <div class="mkdf-post-text-inner">
                <?php if( pawfriends_mikado_options()->getOptionValue( 'decorative_date_blog' ) === 'yes' ) { ?>
                    <div class="mkdf-post-single-date-holder">
                        <?php pawfriends_mikado_get_module_template_part('templates/parts/post-info/date-decorative', 'blog', '', $part_params); ?>
                    </div>
                <?php } ?>
                <div class="mkdf-post-info-top">
                    <?php pawfriends_mikado_get_module_template_part('templates/parts/post-info/author', 'blog', '', $part_params); ?>
                    <?php if( pawfriends_mikado_options()->getOptionValue( 'decorative_date_blog' ) === 'no' ) {
                        pawfriends_mikado_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params);
                    } ?>
                    <?php pawfriends_mikado_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
                    <?php pawfriends_mikado_get_module_template_part('templates/parts/post-info/like', 'blog', '', $part_params); ?>
                    <?php pawfriends_mikado_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
                    <?php pawfriends_mikado_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
                </div>
                <div class="mkdf-post-text-main">
                    <?php pawfriends_mikado_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
                    <?php pawfriends_mikado_get_module_template_part('templates/parts/excerpt', 'blog', '', $part_params); ?>
                    <?php pawfriends_mikado_get_module_template_part('templates/parts/post-info/read-more', 'blog', '', $part_params); ?>
                </div>
            </div>
        </div>
    </div>
</article>