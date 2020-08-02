<?php
//Change Quick View position
remove_action( 'woocommerce_after_shop_loop_item', array( YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 15 );
add_action( 'pawfriends_mikado_action_woo_pl_info_on_image_hover', array( YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 16 );
add_action( 'pawfriends_mikado_action_woo_pl_info_below_image', array( YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 5 );
add_action( 'pawfriends_mikado_action_product_list_shortcode', array( YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 4 );

//Override product title
remove_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_title', 5 );
add_action( 'yith_wcqv_product_summary', 'pawfriends_mikado_woocommerce_yith_template_single_title', 5 );

//Remove default actions for product image and add custom
remove_action( 'yith_wcqv_product_image', 'woocommerce_show_product_sale_flash', 10 );

//Remove product meta
remove_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_meta', 30 );

//Add wishlist button
add_action( 'yith_wcqv_product_summary', 'pawfriends_mikado_woocommerce_wishlist_shortcode', 31 );
