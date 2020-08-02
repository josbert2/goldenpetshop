<?php

foreach ( glob( MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/blog/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'pawfriends_mikado_map_blog_meta' ) ) {
	function pawfriends_mikado_map_blog_meta() {
		$mkdf_blog_categories = array();
		$categories           = get_categories();
		foreach ( $categories as $category ) {
			$mkdf_blog_categories[ $category->slug ] = $category->name;
		}
		
		$blog_meta_box = pawfriends_mikado_create_meta_box(
			array(
				'scope' => array( 'page' ),
				'title' => esc_html__( 'Blog', 'pawfriends' ),
				'name'  => 'blog_meta'
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_category_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Blog Category', 'pawfriends' ),
				'description' => esc_html__( 'Choose category of posts to display (leave empty to display all categories)', 'pawfriends' ),
				'parent'      => $blog_meta_box,
				'options'     => $mkdf_blog_categories
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_show_posts_per_page_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Posts', 'pawfriends' ),
				'description' => esc_html__( 'Enter the number of posts to display', 'pawfriends' ),
				'parent'      => $blog_meta_box,
				'options'     => $mkdf_blog_categories,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_masonry_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Layout', 'pawfriends' ),
				'description' => esc_html__( 'Set masonry layout. Default is in grid.', 'pawfriends' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''           => esc_html__( 'Default', 'pawfriends' ),
					'in-grid'    => esc_html__( 'In Grid', 'pawfriends' ),
					'full-width' => esc_html__( 'Full Width', 'pawfriends' )
				)
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_masonry_number_of_columns_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Number of Columns', 'pawfriends' ),
				'description' => esc_html__( 'Set number of columns for your masonry blog lists', 'pawfriends' ),
				'parent'      => $blog_meta_box,
				'options'     => pawfriends_mikado_get_number_of_columns_array( true, array( 'one', 'six' ) )
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_masonry_space_between_items_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Space Between Items', 'pawfriends' ),
				'description' => esc_html__( 'Set space size between posts for your masonry blog lists', 'pawfriends' ),
				'options'     => pawfriends_mikado_get_space_between_items_array( true ),
				'parent'      => $blog_meta_box
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_list_featured_image_proportion_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'pawfriends' ),
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'pawfriends' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''         => esc_html__( 'Default', 'pawfriends' ),
					'fixed'    => esc_html__( 'Fixed', 'pawfriends' ),
					'original' => esc_html__( 'Original', 'pawfriends' )
				)
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_pagination_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'pawfriends' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'pawfriends' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''                => esc_html__( 'Default', 'pawfriends' ),
					'standard'        => esc_html__( 'Standard', 'pawfriends' ),
					'load-more'       => esc_html__( 'Load More', 'pawfriends' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'pawfriends' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'pawfriends' )
				)
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'type'          => 'text',
				'name'          => 'mkdf_number_of_chars_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'pawfriends' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'pawfriends' ),
				'parent'        => $blog_meta_box,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'pawfriends_mikado_action_meta_boxes_map', 'pawfriends_mikado_map_blog_meta', 30 );
}