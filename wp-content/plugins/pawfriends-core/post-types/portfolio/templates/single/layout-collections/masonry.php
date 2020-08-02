<?php
$masonry_classes   = '';
$number_of_columns = pawfriends_mikado_get_meta_field_intersect( 'portfolio_single_masonry_columns_number' );
if ( ! empty( $number_of_columns ) ) {
	$masonry_classes .= ' mkdf-' . $number_of_columns . '-columns';
}
$space_between_items = pawfriends_mikado_get_meta_field_intersect( 'portfolio_single_masonry_space_between_items' );
if ( ! empty( $space_between_items ) ) {
	$masonry_classes .= ' mkdf-' . $space_between_items . '-space';
}
?>
<div class="mkdf-ps-image-holder mkdf-grid-list mkdf-grid-masonry-list mkdf-fixed-masonry-items mkdf-disable-bottom-space <?php echo esc_attr( $masonry_classes ); ?>">
	<div class="mkdf-ps-image-inner mkdf-outer-space mkdf-masonry-list-wrapper">
		<div class="mkdf-masonry-grid-sizer"></div>
		<div class="mkdf-masonry-grid-gutter"></div>
		<?php
		$media = pawfriends_core_get_portfolio_single_media(true);
		
		if ( is_array( $media ) && count( $media ) ) : ?>
			<?php foreach ( $media as $single_media ) : ?>
				<div class="mkdf-ps-image mkdf-item-space <?php echo esc_attr( $single_media['holder_classes'] ); ?>">
					<?php pawfriends_core_get_portfolio_single_media_html( $single_media ); ?>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>
<div class="mkdf-grid-row">
	<div class="mkdf-grid-col-9">
		<?php pawfriends_core_get_cpt_single_module_template_part('templates/single/parts/content', 'portfolio', $item_layout); ?>
	</div>
	<div class="mkdf-grid-col-3">
		<div class="mkdf-ps-info-holder">
			<?php
			//get portfolio custom fields section
			pawfriends_core_get_cpt_single_module_template_part('templates/single/parts/custom-fields', 'portfolio', $item_layout);

			//get portfolio date section
			pawfriends_core_get_cpt_single_module_template_part('templates/single/parts/date', 'portfolio', $item_layout);
			
			//get portfolio categories section
			pawfriends_core_get_cpt_single_module_template_part('templates/single/parts/categories', 'portfolio', $item_layout);
			
			//get portfolio tags section
			pawfriends_core_get_cpt_single_module_template_part('templates/single/parts/tags', 'portfolio', $item_layout);
			
			//get portfolio share section
			pawfriends_core_get_cpt_single_module_template_part('templates/single/parts/social', 'portfolio', $item_layout);
			?>
		</div>
	</div>
</div>