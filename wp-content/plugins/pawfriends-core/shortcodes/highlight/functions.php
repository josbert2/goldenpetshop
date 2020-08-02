<?php

if ( ! function_exists( 'pawfriends_core_add_highlight_shortcodes' ) ) {
	function pawfriends_core_add_highlight_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'PawFriendsCore\CPT\Shortcodes\Highlight\Highlight'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'pawfriends_core_filter_add_vc_shortcode', 'pawfriends_core_add_highlight_shortcodes' );
}