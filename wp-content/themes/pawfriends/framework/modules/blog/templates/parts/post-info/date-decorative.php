<?php
$month = get_the_time('m');
$year = get_the_time('Y');
$title = get_the_title();
?>
<div itemprop="dateCreated" class="mkdf-post-info-date entry-date published updated">
    <?php if(empty($title) && pawfriends_mikado_blog_item_has_link()) { ?>
        <a itemprop="url" href="<?php the_permalink() ?>">
    <?php } else { ?>
        <a itemprop="url" href="<?php echo get_month_link($year, $month); ?>">
    <?php } ?>
            <span class="mkdf-svg-bg">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-left">
                    <path d="M2 0C0.9 0 0 0.9 0 2l2 23.8c0 1.1 0.9 2 2 2h3.9V0H2z"/>
                </svg>
                <span class="mkdf-active-hover-middle"></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-right">
                   <path d="M5.9 0c1.1 0 2 0.9 2 2L5 25.8c-0.2 1.6-1.1 1.9-3 2H0V0H5.9"/>
                </svg>
           </span>
           <span class="mkdf-post-date"><?php the_time(get_option('date_format')); ?></span>
        </a>
    <meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(pawfriends_mikado_get_page_id()); ?>"/>
</div>