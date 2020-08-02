<?php if( pawfriends_mikado_is_plugin_installed( 'core' ) && pawfriends_mikado_options()->getOptionValue( 'blog_likes' ) === 'yes' ) { ?>
    <div class="mkdf-blog-like">
        <?php if( function_exists('pawfriends_mikado_get_like') ) pawfriends_mikado_get_like(); ?>
    </div>
<?php } ?>