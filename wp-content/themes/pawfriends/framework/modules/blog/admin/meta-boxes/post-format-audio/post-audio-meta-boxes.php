<?php

if ( ! function_exists( 'pawfriends_mikado_map_post_audio_meta' ) ) {
	function pawfriends_mikado_map_post_audio_meta() {
		$audio_post_format_meta_box = pawfriends_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Audio Post Format', 'pawfriends' ),
				'name'  => 'post_format_audio_meta'
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_audio_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Audio Type', 'pawfriends' ),
				'description'   => esc_html__( 'Choose audio type', 'pawfriends' ),
				'parent'        => $audio_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Audio Service', 'pawfriends' ),
					'self'            => esc_html__( 'Self Hosted', 'pawfriends' )
				)
			)
		);
		
		$mkdf_audio_embedded_container = pawfriends_mikado_add_admin_container(
			array(
				'parent' => $audio_post_format_meta_box,
				'name'   => 'mkdf_audio_embedded_container'
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio URL', 'pawfriends' ),
				'description' => esc_html__( 'Enter audio URL', 'pawfriends' ),
				'parent'      => $mkdf_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_audio_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		pawfriends_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_audio_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio Link', 'pawfriends' ),
				'description' => esc_html__( 'Enter audio link', 'pawfriends' ),
				'parent'      => $mkdf_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_audio_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'pawfriends_mikado_action_meta_boxes_map', 'pawfriends_mikado_map_post_audio_meta', 23 );
}