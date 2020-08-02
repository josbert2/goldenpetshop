<?php
$product = pawfriends_mikado_return_woocommerce_global_variable();

if ( $product->is_on_sale() ) { ?>
	<span class="mkdf-<?php echo esc_attr( $class_name ); ?>-onsale"><span class="mkdf-onsale-svg">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-left">
                <path d="M2 0C0.9 0 0 0.9 0 2l2 23.8c0 1.1 0.9 2 2 2h3.9V0H2z"/>
                </svg>
                <span class="mkdf-active-hover-middle"></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-right">
                <path d="M5.9 0c1.1 0 2 0.9 2 2L5 25.8c-0.2 1.6-1.1 1.9-3 2H0V0H5.9"/>
                </svg>
                <span class="mkdf-onsale-text"><?php echo pawfriends_mikado_get_woocommerce_sale( $product ); ?></span></span></span>
<?php } ?>

<?php if ( ! $product->is_in_stock() ) { ?>
	<span class="mkdf-<?php echo esc_attr( $class_name ); ?>-out-of-stock"><span class="mkdf-sold-svg">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-left">
                <path d="M2 0C0.9 0 0 0.9 0 2l2 23.8c0 1.1 0.9 2 2 2h3.9V0H2z"/>
                </svg>
                <span class="mkdf-active-hover-middle"></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-right">
                <path d="M5.9 0c1.1 0 2 0.9 2 2L5 25.8c-0.2 1.6-1.1 1.9-3 2H0V0H5.9"/>
                </svg>
                <span class="mkdf-sold-text"><?php esc_html_e( 'Sold', 'pawfriends' ); ?></span></span></span>
<?php }

$new = get_post_meta( get_the_ID(), 'mkdf_show_new_sign_woo_meta', true );

if ( $new === 'yes' ) { ?>
	<span class="mkdf-<?php echo esc_attr( $class_name ); ?>-new-product"><span class="mkdf-new-svg">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-left">
                <path d="M2 0C0.9 0 0 0.9 0 2l2 23.8c0 1.1 0.9 2 2 2h3.9V0H2z"/>
                </svg>
                <span class="mkdf-active-hover-middle"></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-right">
                <path d="M5.9 0c1.1 0 2 0.9 2 2L5 25.8c-0.2 1.6-1.1 1.9-3 2H0V0H5.9"/>
                </svg>
                <span class="mkdf-new-text"><?php esc_html_e( 'New', 'pawfriends' ) ?></span></span></span>
<?php }

$product_image_size = 'woocommerce_single';
if ( $image_size === 'full' ) {
	$product_image_size = 'full';
} else if ( $image_size === 'square' ) {
	$product_image_size = 'pawfriends_mikado_image_square';
} else if ( $image_size === 'landscape' ) {
	$product_image_size = 'pawfriends_mikado_image_landscape';
} else if ( $image_size === 'portrait' ) {
	$product_image_size = 'pawfriends_mikado_image_portrait';
} else if ( $image_size === 'medium' ) {
	$product_image_size = 'medium';
} else if ( $image_size === 'large' ) {
	$product_image_size = 'large';
} else if ( $image_size === 'woocommerce_thumbnail' ) {
	$product_image_size = 'woocommerce_thumbnail';
}

$fixed_image_size_meta = get_post_meta( get_the_ID(), 'mkdf_product_featured_image_size', true );
if ( ! empty( $fixed_image_size_meta ) && isset( $type ) && $type === 'masonry' ) {
	if ( $fixed_image_size_meta === 'small' ) {
		$product_image_size = 'pawfriends_mikado_image_square';
	} else if ( $fixed_image_size_meta === 'large-width' ) {
		$product_image_size = 'pawfriends_mikado_image_landscape';
	} else if ( $fixed_image_size_meta === 'large-height' ) {
		$product_image_size = 'pawfriends_mikado_image_portrait';
	} else if ( $fixed_image_size_meta === 'large-width-height' ) {
		$product_image_size = 'pawfriends_mikado_image_huge';
	}
}

if ( has_post_thumbnail() ) {
	the_post_thumbnail( apply_filters( 'pawfriends_mikado_filter_product_list_image_size', $product_image_size ) );
}