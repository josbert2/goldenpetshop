<?php
get_header();
pawfriends_mikado_get_title();
do_action( 'pawfriends_mikado_action_before_main_content' ); ?>
<div class="mkdf-container mkdf-default-page-template">
	<?php do_action( 'pawfriends_mikado_action_after_container_open' ); ?>
	<div class="mkdf-container-inner clearfix">
		<?php
			$pawfriends_taxonomy_id   = get_queried_object_id();
			$pawfriends_taxonomy_type = is_tax( 'portfolio-tag' ) ? 'portfolio-tag' : 'portfolio-category';
			$pawfriends_taxonomy      = ! empty( $pawfriends_taxonomy_id ) ? get_term_by( 'id', $pawfriends_taxonomy_id, $pawfriends_taxonomy_type ) : '';
			$pawfriends_taxonomy_slug = ! empty( $pawfriends_taxonomy ) ? $pawfriends_taxonomy->slug : '';
			$pawfriends_taxonomy_name = ! empty( $pawfriends_taxonomy ) ? $pawfriends_taxonomy->taxonomy : '';
			
			pawfriends_core_get_archive_portfolio_list( $pawfriends_taxonomy_slug, $pawfriends_taxonomy_name );
		?>
	</div>
	<?php do_action( 'pawfriends_mikado_action_before_container_close' ); ?>
</div>
<?php get_footer(); ?>
