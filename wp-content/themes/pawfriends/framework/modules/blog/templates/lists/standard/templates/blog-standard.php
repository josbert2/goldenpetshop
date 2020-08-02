<?php
$mkdf_blog_type = 'standard';
pawfriends_mikado_include_blog_helper_functions('lists', $mkdf_blog_type);
$mkdf_holder_params = pawfriends_mikado_get_holder_params_blog();
?>
<?php get_header(); ?>
<?php pawfriends_mikado_get_title(); ?>
<?php get_template_part('slider'); ?>
<?php do_action('pawfriends_mikado_action_before_main_content'); ?>
    <div class="<?php echo esc_attr($mkdf_holder_params['holder']); ?>">
        <?php do_action('pawfriends_mikado_action_after_container_open'); ?>
        <div class="<?php echo esc_attr($mkdf_holder_params['inner']); ?>">
            <?php pawfriends_mikado_get_blog($mkdf_blog_type); ?>
        </div>
        <?php do_action('pawfriends_mikado_action_before_container_close'); ?>
    </div>
<?php do_action('pawfriends_mikado_action_blog_list_additional_tags'); ?>
<?php get_footer(); ?>