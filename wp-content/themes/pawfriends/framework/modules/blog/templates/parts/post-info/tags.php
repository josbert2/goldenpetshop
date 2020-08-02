<?php
$tags = get_the_tags();
?>
<?php if( $tags && pawfriends_mikado_options()->getOptionValue( 'show_tags_area_blog' ) === 'yes' ) { ?>
<div class="mkdf-tags-holder">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 36" class="mkdf-tags">
        <path d="M15.7 24c-1.3 0-4.2 1.7-4.2 2.1 0 0.4 0 0.4 0.4 0.4 0.4 0 1.7-0.4 2.5-0.8C15.7 25.2 16.5 24 15.7 24z"/>
        <path d="M14.8 27.3c2.1-0.8 2.5-1.7 0.8-1.2 -2.1 0.4-3.3 0.8-3.3 1.2C12.3 28.1 12.3 28.1 14.8 27.3z"/>
        <path d="M20.2 26.4c-0.4 0-0.8 0-1.7 0.8 -1.3 0.8-6.7 4.5-7.1 4.5 -0.4 0-1.3-2.1-2.1-4.5 -1.3-2.5-2.5-5.4-2.9-6.6 -1.3-2.1-1.3-2.5-0.8-4.1 0.8-1.7 0.8-1.7 1.7-1.7 0.4 0 1.3 0 1.7 0.8 0.4 0.8 2.1 0.8 2.5 0C12.7 14 10.7 12 9 12.8c-0.8 0.4-2.1 0.8-2.1 0.4 0 0 0-0.8 0.4-2.1C8.1 9.5 8.1 9.5 9 9.9c0.8 0.4 2.5 0.8 3.8 1.2 1.7 0 2.9 0.8 3.3 1.2 0.4 0.4 1.7 3.3 2.5 6.2 1.7 5.4 2.9 8.3 3.8 8.3 0.4 0 0.4-0.8 0-2.1 -0.8-0.8-4.6-12.4-4.6-13.6 0-0.4-1.3-0.8-2.9-0.8 -0.4-0.4-1.7-0.4-2.5-0.8 -1.3 0-1.3-0.4-1.3-1.7 0.4-1.7-0.4-2.1-2.1-2.1s-2.1 0-3.8 2.1C4.4 8.7 3.1 9.9 3.1 9.9c-0.4 0-0.8-0.8-1.3-1.2 -0.8-0.8-0.8-1.2 0-3.3 0.8-2.5 1.7-3.3 2.9-3.3 0.8 0 1.3-0.4 1.3-0.8 0-0.8-1.7-0.8-2.9 0.4C1.9 2.5 0.6 5.8 0.6 7.4c0 1.2 1.3 3.3 2.5 3.3 0.8 0 0.8 0 0.8 0.8 -0.4 0.4 0 0.8 0.4 1.7 0.8 0.4 0.8 0.8 0.4 2.9 -1.3 4.1-1.3 5-0.4 4.5 0.8-0.4 1.3 0.4 2.5 4.1 0.8 1.7 1.7 4.1 2.5 5.4 0.8 2.1 0.8 2.5 0.4 2.9 -0.4 0.4-0.8 0.8-0.4 0.8 0 0.4 0.4 0.8 0.4 0.8 0.4 0 2.9-1.7 3.3-2.5 0-0.4 6.7-4.1 7.5-4.5C21.5 27.3 21.5 26.8 20.2 26.4zM10.7 14.5c0.4 0 0.4 0 0.4 0.4 0 0.8-1.3 0.8-1.3 0C9.8 14.5 9.8 14.5 10.7 14.5zM8.1 7C9 6.2 9.8 6.6 9.8 7.9c0.4 1.2 0 1.2-1.7 0.4C7.3 7.4 7.3 7 8.1 7zM6.1 8.7l0.8-0.8L6.5 9.1c0 0.4-0.4 1.2-0.4 2.1 -0.4 2.1-0.8 1.7-0.8 0C5.2 10.3 5.2 9.5 6.1 8.7z"/>
        <path d="M16.5 17.8c-0.8 0-5.8 2.1-7.1 3.3C9 21.5 9 21.9 9 22.3c0 0.4 0 0.4 1.7-0.8 1.3-1.2 5-2.9 5-2.5 0 0 0 0 0.8 0C17.3 18.2 17.3 17.8 16.5 17.8z"/>
        <path d="M14.8 21.5c-0.4 0-0.4 0 0.4-0.4 0.8-0.8 1.3-1.2 1.3-1.2 -0.4-0.4-6.7 2.5-6.7 3.3 -0.4 0.4 0.8 0.4 2.5-0.8 1.3-0.4 1.3-0.4 1.3 0 -0.4 0.4-1.3 0.8-2.1 1.2 -0.4 0-0.8 0.4-0.8 0.8 0 0.4 0.8 0.4 3.3-1.2C17.7 21.5 18.2 20.2 14.8 21.5z"/>
    </svg>
    <span><?php the_tags('', ', ', ''); ?></span>
</div>
<?php } ?>