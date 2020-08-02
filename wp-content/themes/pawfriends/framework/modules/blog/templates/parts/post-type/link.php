<?php
$title_tag = isset($link_tag) ? $link_tag : 'h2';
$post_link_meta = get_post_meta(get_the_ID(), "mkdf_post_link_link_meta", true );

if(pawfriends_mikado_get_blog_module() == 'list') {
    $post_link = get_the_permalink();
} else {
    if(!empty($post_link_meta)) {
        $post_link = esc_html($post_link_meta);
    }
}
?>

<div class="mkdf-post-link-holder">
    <div class="mkdf-post-link-holder-inner">
        <<?php echo esc_attr($title_tag);?> itemprop="name" class="mkdf-link-title mkdf-post-title">
        <?php if(isset($post_link) && $post_link != '') { ?>
        <a itemprop="url" href="<?php echo esc_url($post_link); ?>" title="<?php the_title_attribute(); ?>" target="_blank">
            <?php } ?>
            <?php echo get_the_title(); ?>
            <?php if(isset($post_link) && $post_link != '') { ?>
        </a>
        <?php } ?>
        </<?php echo esc_attr($title_tag);?>>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 54 50" width="54" height="50" class="mkdf-post-link">
            <path d="M27.9 10c-1.2-0.1-1.3 1.1 1 2.5 2.7 2.1 15.4 17.5 16.8 20.6 2 3.7 2.5 9.7 0.7 11.3 -2.6 2.1-7.8 1-12.9-1.3 -3.2-2.7-6.6-5.4-15.5-16.3C3.6 10.5 3.1 9.9 7.6 6.2L10.2 4l6.1 4.7c4.3 4 7.4 7.9 13.3 14.9 4.2 5.1 7.9 9.6 7.2 10.2 0.5 0.7-1.3 1.1-2.9 0.3 -2.9 0.3-3.5-0.4-10.4-8.8 -4.9-4.6-8-8.5-8-8.5 -2 1.6-1.4 2.3 2.9 6.2l8.4 10.3c5.9 5.9 8.1 7.4 11.4 4.7 3.8-3.1 2.9-4.4-8.2-18 -8-9.5-11.2-12.1-15-15.5l-5-3.4 -2.6 2c-5 3-6.5 5.3-5 8.3 1.4 4.4 13 17.4 19.5 23.9 2.7 2.1 6.1 4.7 7.6 6.7 5.4 5.3 8.8 6.8 14.7 6.2 2.9-0.3 4.3-1.4 6.6-6.5 2.1-2.7-0.5-7.2-7.2-16.7C35.3 13.7 29.9 8.5 27.9 10z"/>
        </svg>
    </div>
</div>