<?php

if ( ! function_exists( 'pawfriends_mikado_map_post_video_meta' ) ) {
	function pawfriends_mikado_map_post_video_meta() {
		$video_post_format_meta_box = pawfriends_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Video Post Format', 'pawfriends' ),
				'name'  => 'post_format_video_meta'
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Video Type', 'pawfriends' ),
				'description'   => esc_html__( 'Choose video type', 'pawfriends' ),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Video Service', 'pawfriends' ),
					'self'            => esc_html__( 'Self Hosted', 'pawfriends' )
				)
			)
		);
		
		$mkdf_video_embedded_container = pawfriends_mikado_add_admin_container(
			array(
				'parent' => $video_post_format_meta_box,
				'name'   => 'mkdf_video_embedded_container'
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video URL', 'pawfriends' ),
				'description' => esc_html__( 'Enter Video URL', 'pawfriends' ),
				'parent'      => $mkdf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_video_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_video_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video MP4', 'pawfriends' ),
				'description' => esc_html__( 'Enter video URL for MP4 format', 'pawfriends' ),
				'parent'      => $mkdf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_video_type_meta' => 'self'
					)
				)
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_video_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Video Image', 'pawfriends' ),
				'description' => esc_html__( 'Enter video image', 'pawfriends' ),
				'parent'      => $mkdf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_video_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'pawfriends_mikado_action_meta_boxes_map', 'pawfriends_mikado_map_post_video_meta', 22 );
}