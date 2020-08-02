<?php

/*************** YITH WISHLIST FILTERS - begin ***************/

//Add yith wishlist button shop archive pages
add_action( 'pawfriends_mikado_action_woo_pl_info_on_image_hover', 'pawfriends_mikado_woocommerce_wishlist_shortcode', 15 );
add_action( 'pawfriends_mikado_action_woo_pl_info_below_image', 'pawfriends_mikado_woocommerce_wishlist_shortcode', 4 );

//Add yith wishlist button product list shortcode
add_action('pawfriends_mikado_action_product_list_shortcode', 'pawfriends_mikado_woocommerce_wishlist_shortcode', 3);

/*************** YITH WISHLIST FILTERS - end ***************/