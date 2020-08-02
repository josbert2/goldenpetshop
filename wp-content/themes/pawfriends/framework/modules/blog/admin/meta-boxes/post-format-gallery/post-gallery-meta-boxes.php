<?php

if ( ! function_exists( 'pawfriends_mikado_map_post_gallery_meta' ) ) {
	
	function pawfriends_mikado_map_post_gallery_meta() {
		$gallery_post_format_meta_box = pawfriends_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'pawfriends' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		pawfriends_mikado_add_multiple_images_field(
			array(
				'name'        => 'mkdf_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'pawfriends' ),
				'description' => esc_html__( 'Choose your gallery images', 'pawfriends' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'pawfriends_mikado_action_meta_boxes_map', 'pawfriends_mikado_map_post_gallery_meta', 21 );
}
