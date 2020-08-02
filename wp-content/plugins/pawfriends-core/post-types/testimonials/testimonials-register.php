<?php

namespace PawFriendsCore\CPT\Testimonials;

use PawFriendsCore\Lib;

/**
 * Class TestimonialsRegister
 * @package PawFriendsCore\CPT\Testimonials
 */
class TestimonialsRegister implements Lib\PostTypeInterface {
	private $base;
	
	public function __construct() {
		$this->base    = 'testimonials';
		$this->taxBase = 'testimonials-category';
	}
	
	/**
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}
	
	/**
	 * Registers custom post type with WordPress
	 */
	public function register() {
		$this->registerPostType();
		$this->registerTax();
	}
	
	/**
	 * Regsiters custom post type with WordPress
	 */
	private function registerPostType() {
		$menuPosition = 5;
		$menuIcon     = 'dashicons-format-quote';
		
		register_post_type( 'testimonials',
			array(
				'labels'        => array(
					'menu_name'     => esc_html__( 'PawFriends Testimonials', 'pawfriends-core' ),
					'name'          => esc_html__( 'Testimonials', 'pawfriends-core' ),
					'singular_name' => esc_html__( 'Testimonial', 'pawfriends-core' ),
					'add_item'      => esc_html__( 'New Testimonial', 'pawfriends-core' ),
					'add_new_item'  => esc_html__( 'Add New Testimonial', 'pawfriends-core' ),
					'edit_item'     => esc_html__( 'Edit Testimonial', 'pawfriends-core' )
				),
				'public'        => false,
				'show_in_menu'  => true,
				'rewrite'       => array( 'slug' => 'testimonials' ),
				'menu_position' => $menuPosition,
				'show_ui'       => true,
				'has_archive'   => false,
				'hierarchical'  => false,
				'supports'      => array( 'title', 'thumbnail' ),
				'menu_icon'     => $menuIcon
			)
		);
	}
	
	/**
	 * Registers custom taxonomy with WordPress
	 */
	private function registerTax() {
		$labels = array(
			'name'              => esc_html__( 'Testimonials Categories', 'pawfriends-core' ),
			'singular_name'     => esc_html__( 'Testimonial Category', 'pawfriends-core' ),
			'search_items'      => esc_html__( 'Search Testimonials Categories', 'pawfriends-core' ),
			'all_items'         => esc_html__( 'All Testimonials Categories', 'pawfriends-core' ),
			'parent_item'       => esc_html__( 'Parent Testimonial Category', 'pawfriends-core' ),
			'parent_item_colon' => esc_html__( 'Parent Testimonial Category:', 'pawfriends-core' ),
			'edit_item'         => esc_html__( 'Edit Testimonials Category', 'pawfriends-core' ),
			'update_item'       => esc_html__( 'Update Testimonials Category', 'pawfriends-core' ),
			'add_new_item'      => esc_html__( 'Add New Testimonials Category', 'pawfriends-core' ),
			'new_item_name'     => esc_html__( 'New Testimonials Category Name', 'pawfriends-core' ),
			'menu_name'         => esc_html__( 'Testimonials Categories', 'pawfriends-core' )
		);
		
		register_taxonomy( $this->taxBase, array( $this->base ), array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'query_var'         => true,
			'show_admin_column' => true,
			'rewrite'           => array( 'slug' => 'testimonials-category' )
		) );
	}
}