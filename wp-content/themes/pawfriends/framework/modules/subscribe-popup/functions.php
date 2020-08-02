<?php

if ( ! function_exists( 'pawfriends_mikado_get_subscribe_popup' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function pawfriends_mikado_get_subscribe_popup() {
		
		if ( pawfriends_mikado_options()->getOptionValue( 'enable_subscribe_popup' ) === 'yes' && ( pawfriends_mikado_options()->getOptionValue( 'subscribe_popup_contact_form' ) !== '' || pawfriends_mikado_options()->getOptionValue( 'subscribe_popup_title' ) !== '' ) ) {
			pawfriends_mikado_load_subscribe_popup_template();
		}
	}
	
	//Get subscribe popup HTML
	add_action( 'pawfriends_mikado_action_before_page_header', 'pawfriends_mikado_get_subscribe_popup' );
}

if ( ! function_exists( 'pawfriends_mikado_load_subscribe_popup_template' ) ) {
	/**
	 * Loads HTML template with parameters
	 */
	function pawfriends_mikado_load_subscribe_popup_template() {
		$parameters                       = array();
		$parameters['title']              = pawfriends_mikado_options()->getOptionValue( 'subscribe_popup_title' );
		$parameters['subtitle']           = pawfriends_mikado_options()->getOptionValue( 'subscribe_popup_subtitle' );
		$background_image_meta            = pawfriends_mikado_options()->getOptionValue( 'subscribe_popup_background_image' );
		$parameters['background_styles']  = ! empty( $background_image_meta ) ? 'background-image: url(' . esc_url( $background_image_meta ) . ')' : '';
		$parameters['contact_form']       = pawfriends_mikado_options()->getOptionValue( 'subscribe_popup_contact_form' );
		$parameters['contact_form_style'] = pawfriends_mikado_options()->getOptionValue( 'subscribe_popup_contact_form_style' );
		$parameters['enable_prevent']     = pawfriends_mikado_options()->getOptionValue( 'enable_subscribe_popup_prevent' );
		$parameters['prevent_behavior']   = pawfriends_mikado_options()->getOptionValue( 'subscribe_popup_prevent_behavior' );
		
		$holder_classes   = array();
		$holder_classes[] = $parameters['enable_prevent'] === 'yes' ? 'mkdf-prevent-enable' : 'mkdf-prevent-disable';
		$holder_classes[] = ! empty( $parameters['prevent_behavior'] ) ? 'mkdf-prevent-' . $parameters['prevent_behavior'] : 'mkdf-prevent-session';
		$holder_classes[] = ! empty( $background_image_meta ) ? 'mkdf-sp-has-image' : '';
		
		$parameters['holder_classes'] = implode( ' ', $holder_classes );
		
		pawfriends_mikado_get_module_template_part( 'templates/subscribe-popup', 'subscribe-popup', '', $parameters );
	}
}