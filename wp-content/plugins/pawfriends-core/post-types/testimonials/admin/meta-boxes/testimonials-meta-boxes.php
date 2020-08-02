<?php

if ( ! function_exists( 'pawfriends_core_map_testimonials_meta' ) ) {
	function pawfriends_core_map_testimonials_meta() {
		$testimonial_meta_box = pawfriends_mikado_create_meta_box(
			array(
				'scope' => array( 'testimonials' ),
				'title' => esc_html__( 'Testimonial', 'pawfriends-core' ),
				'name'  => 'testimonial_meta'
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_testimonial_title',
				'type'        => 'text',
				'label'       => esc_html__( 'Title', 'pawfriends-core' ),
				'description' => esc_html__( 'Enter testimonial title', 'pawfriends-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_testimonial_text',
				'type'        => 'text',
				'label'       => esc_html__( 'Text', 'pawfriends-core' ),
				'description' => esc_html__( 'Enter testimonial text', 'pawfriends-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_testimonial_author',
				'type'        => 'text',
				'label'       => esc_html__( 'Author', 'pawfriends-core' ),
				'description' => esc_html__( 'Enter author name', 'pawfriends-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_testimonial_author_position',
				'type'        => 'text',
				'label'       => esc_html__( 'Author Position', 'pawfriends-core' ),
				'description' => esc_html__( 'Enter author job position', 'pawfriends-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
	}
	
	add_action( 'pawfriends_mikado_action_meta_boxes_map', 'pawfriends_core_map_testimonials_meta', 95 );
}