<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="mkdf-post-content">
        <div class="mkdf-post-heading">
            <span class="mkdf-post-link-bg">
                <span class="mkdf-post-link-bg-left"></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="100%" preserveAspectRatio="none" viewBox="0 0 8 27.5" class="mkdf-post-link-bg-right">
                    <path d="M5.9 0c1.1 0 2 0.9 2 2L5 25.8c-0.2 1.6-1.1 1.9-3 2H0V0H5.9"/>
                </svg>
            </span>
            <?php pawfriends_mikado_get_module_template_part('templates/parts/post-type/link', 'blog', '', $part_params); ?>
        </div>
    </div>
</article>
