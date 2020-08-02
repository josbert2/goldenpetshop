<?php

if ( ! function_exists( 'pawfriends_core_register_widgets' ) ) {
	function pawfriends_core_register_widgets() {
		$widgets = apply_filters( 'pawfriends_core_filter_register_widgets', $widgets = array() );
		
		foreach ( $widgets as $widget ) {
			register_widget( $widget );
		}
	}
	
	add_action( 'widgets_init', 'pawfriends_core_register_widgets' );
}