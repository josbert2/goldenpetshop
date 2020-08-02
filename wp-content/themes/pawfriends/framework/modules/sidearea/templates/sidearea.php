<section class="mkdf-side-menu">
	<a <?php pawfriends_mikado_class_attribute( $close_icon_classes ); ?> href="#">
		<?php echo pawfriends_mikado_get_icon_sources_html( 'side_area', true ); ?>
	</a>
    <div class="mkdf-side-menu-top">
        <?php if ( is_active_sidebar( 'sidearea' ) ) {
            dynamic_sidebar( 'sidearea' );
        } ?>
    </div>
    <div class="mkdf-side-menu-bottom">
        <?php if ( is_active_sidebar( 'sidearea-bottom' ) ) {
            dynamic_sidebar( 'sidearea-bottom' );
        } ?>
    </div>
</section>