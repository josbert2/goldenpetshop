<?php
$post_classes[] = 'mkdf-item-space';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="mkdf-post-content">
        <div class="mkdf-post-heading">
            <span class="mkdf-post-link-bg">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="21" preserveAspectRatio="none" viewBox="0 0 414 21" class="mkdf-post-link-bg-top">
                    <path d="M414 21V6c0-3.3-2.7-6-6-6L6 5c-3.3 0-6 2.7-6 6v10H414z"/>
                </svg>
                <span class="mkdf-post-link-bg-middle"></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="21" preserveAspectRatio="none" viewBox="0 0 414 21" class="mkdf-post-link-bg-bottom">
                    <path d="M0 0l0 15c0 3.3 2.7 6 6 6l402-5c3.3 0 6-2.7 6-6V0L0 0z"/></svg>
            </span>
            <?php pawfriends_mikado_get_module_template_part('templates/parts/post-type/link', 'blog', '', $part_params); ?>
        </div>
    </div>
</article>