<?php

if ( ! function_exists( 'pawfriends_core_map_portfolio_meta' ) ) {
	function pawfriends_core_map_portfolio_meta() {
		global $pawfriends_mikado_global_Framework;
		
		$pawfriends_pages = array();
		$pages      = get_pages();
		foreach ( $pages as $page ) {
			$pawfriends_pages[ $page->ID ] = $page->post_title;
		}
		
		//Portfolio Images
		
		$pawfriends_portfolio_images = new PawFriendsMikadoClassMetaBox( 'portfolio-item', esc_html__( 'Portfolio Images (multiple upload)', 'pawfriends-core' ), '', '', 'portfolio_images' );
		$pawfriends_mikado_global_Framework->mkdMetaBoxes->addMetaBox( 'portfolio_images', $pawfriends_portfolio_images );
		
		$pawfriends_portfolio_image_gallery = new PawFriendsMikadoClassMultipleImages( 'mkdf-portfolio-image-gallery', esc_html__( 'Portfolio Images', 'pawfriends-core' ), esc_html__( 'Choose your portfolio images', 'pawfriends-core' ) );
		$pawfriends_portfolio_images->addChild( 'mkdf-portfolio-image-gallery', $pawfriends_portfolio_image_gallery );
		
		//Portfolio Single Upload Images/Videos 
		
		$pawfriends_portfolio_images_videos = pawfriends_mikado_create_meta_box(
			array(
				'scope' => array( 'portfolio-item' ),
				'title' => esc_html__( 'Portfolio Images/Videos (single upload)', 'pawfriends-core' ),
				'name'  => 'mkdf_portfolio_images_videos'
			)
		);
		pawfriends_mikado_add_repeater_field(
			array(
				'name'        => 'mkdf_portfolio_single_upload',
				'parent'      => $pawfriends_portfolio_images_videos,
				'button_text' => esc_html__( 'Add Image/Video', 'pawfriends-core' ),
				'fields'      => array(
					array(
						'type'        => 'select',
						'name'        => 'file_type',
						'label'       => esc_html__( 'File Type', 'pawfriends-core' ),
						'options' => array(
							'image' => esc_html__('Image','pawfriends-core'),
							'video' => esc_html__('Video','pawfriends-core'),
						)
					),
					array(
						'type'        => 'image',
						'name'        => 'single_image',
						'label'       => esc_html__( 'Image', 'pawfriends-core' ),
						'dependency' => array(
							'show' => array(
								'file_type'  => 'image'
							)
						)
					),
					array(
						'type'        => 'select',
						'name'        => 'video_type',
						'label'       => esc_html__( 'Video Type', 'pawfriends-core' ),
						'options'	  => array(
							'youtube' => esc_html__('YouTube', 'pawfriends-core'),
							'vimeo' => esc_html__('Vimeo', 'pawfriends-core'),
							'self' => esc_html__('Self Hosted', 'pawfriends-core'),
						),
						'dependency' => array(
							'show' => array(
								'file_type'  => 'video'
							)
						)
					),
					array(
						'type'        => 'text',
						'name'        => 'video_id',
						'label'       => esc_html__( 'Video ID', 'pawfriends-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => array('youtube','vimeo')
							)
						)
					),
					array(
						'type'        => 'text',
						'name'        => 'video_mp4',
						'label'       => esc_html__( 'Video mp4', 'pawfriends-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => 'self'
							)
						)
					),
					array(
						'type'        => 'image',
						'name'        => 'video_cover_image',
						'label'       => esc_html__( 'Video Cover Image', 'pawfriends-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => 'self'
							)
						)
					)
				)
			)
		);
		
		//Portfolio Additional Sidebar Items
		
		$pawfriends_additional_sidebar_items = pawfriends_mikado_create_meta_box(
			array(
				'scope' => array( 'portfolio-item' ),
				'title' => esc_html__( 'Additional Portfolio Sidebar Items', 'pawfriends-core' ),
				'name'  => 'portfolio_properties'
			)
		);

		pawfriends_mikado_add_repeater_field(
			array(
				'name'        => 'mkdf_portfolio_properties',
				'parent'      => $pawfriends_additional_sidebar_items,
				'button_text' => esc_html__( 'Add New Item', 'pawfriends-core' ),
				'fields'      => array(
					array(
						'type'        => 'text',
						'name'        => 'item_title',
						'label'       => esc_html__( 'Item Title', 'pawfriends-core' ),
					),
					array(
						'type'        => 'text',
						'name'        => 'item_text',
						'label'       => esc_html__( 'Item Text', 'pawfriends-core' )
					),
					array(
						'type'        => 'text',
						'name'        => 'item_url',
						'label'       => esc_html__( 'Enter Full URL for Item Text Link', 'pawfriends-core' )
					)
				)
			)
		);
	}
	
	add_action( 'pawfriends_mikado_action_meta_boxes_map', 'pawfriends_core_map_portfolio_meta', 40 );
}