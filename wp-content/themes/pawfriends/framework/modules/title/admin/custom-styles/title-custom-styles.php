<?php

foreach ( glob( MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/custom-styles/*.php' ) as $options_load ) {
	include_once $options_load;
}

if ( ! function_exists( 'pawfriends_mikado_title_area_typography_style' ) ) {
	function pawfriends_mikado_title_area_typography_style() {
		
		// title default/small style
		
		$item_styles = pawfriends_mikado_get_typography_styles( 'page_title' );
		
		$item_selector = array(
			'.mkdf-title-holder .mkdf-title-wrapper .mkdf-page-title'
		);
		
		echo pawfriends_mikado_dynamic_css( $item_selector, $item_styles );
		
		// subtitle style
		
		$item_styles = pawfriends_mikado_get_typography_styles( 'page_subtitle' );
		
		$item_selector = array(
			'.mkdf-title-holder .mkdf-title-wrapper .mkdf-page-subtitle'
		);
		
		echo pawfriends_mikado_dynamic_css( $item_selector, $item_styles );
	}
	
	add_action( 'pawfriends_mikado_action_style_dynamic', 'pawfriends_mikado_title_area_typography_style' );
}


if ( ! function_exists( 'pawfriends_mikado_page_title_area_mobile_style' ) ) {
	function pawfriends_mikado_page_title_area_mobile_style($style) {

		$current_style = '';
		$page_id       = pawfriends_mikado_get_page_id();
		$class_prefix  = pawfriends_mikado_get_unique_page_class( $page_id );

		$res_start = '@media only screen and (max-width: 1024px) {';
		$res_end   = '}';
		$item_styles   = array();

		$title_responsive_width = get_post_meta( $page_id, 'mkdf_title_area_height_mobile_meta', true );

		$item_selector = array(
			$class_prefix . ' .mkdf-title-holder',
			$class_prefix . ' .mkdf-title-holder .mkdf-title-wrapper'
		);

		if ( $title_responsive_width !== '' ) {
			$item_styles['height'] = pawfriends_mikado_filter_suffix( $title_responsive_width, 'px') . 'px !important' ;
		}

		if(!empty($item_styles)) {
			$current_style .= $res_start . pawfriends_mikado_dynamic_css( $item_selector, $item_styles ) . $res_end;
		}

		$current_style = $current_style . $style;

		return $current_style;
	}

	add_filter( 'pawfriends_mikado_filter_add_page_custom_style', 'pawfriends_mikado_page_title_area_mobile_style' );
}