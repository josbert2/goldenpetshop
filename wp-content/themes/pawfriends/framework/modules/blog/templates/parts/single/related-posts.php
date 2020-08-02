<?php
$show_related = pawfriends_mikado_options()->getOptionValue('blog_single_related_posts') == 'yes';
$related_post_number = pawfriends_mikado_sidebar_layout() === 'no-sidebar' ? 4 : 3;
$related_posts_options = array(
    'posts_per_page' => $related_post_number
);
$related_posts = pawfriends_mikado_get_blog_related_post_type(get_the_ID(), $related_posts_options);
$related_posts_image_size = isset($related_posts_image_size) ? $related_posts_image_size : 'full';
?>
<?php if($show_related) { ?>
    <div class="mkdf-related-posts-holder clearfix">
        <?php if ( $related_posts && $related_posts->have_posts() ) : ?>
            <h4 class="mkdf-related-posts-title"><?php esc_html_e('Related Posts', 'pawfriends' ); ?></h4>
            <div class="mkdf-related-posts-inner clearfix">
                <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
                    <div class="mkdf-related-post">
                        <div class="mkdf-related-post-inner">
		                    <?php if (has_post_thumbnail()) { ?>
                            <div class="mkdf-related-post-image">
                                <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                     <?php the_post_thumbnail($related_posts_image_size); ?>
                                </a>
                            </div>
		                    <?php }	?>
                            <div class="mkdf-post-info">
                                <?php pawfriends_mikado_get_module_template_part('templates/parts/post-info/category', 'blog', '', $params); ?>
                            </div>
                            <h4 itemprop="name" class="entry-title mkdf-post-title"><a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif;
        wp_reset_postdata();
        ?>
    </div>
<?php } ?>