<div class="mkdf-sc-dropdown-items">
	<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
		$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
		
		if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
			$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
			?>
			<div class="mkdf-sc-dropdown-item">
				<div class="mkdf-sc-dropdown-item-image">
					<?php
					$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
					
					if ( ! $product_permalink ) {
						echo wp_kses_post( $thumbnail );
					} else {
						printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), wp_kses_post( $thumbnail ) );
					}?>
				</div>
				<div class="mkdf-sc-dropdown-item-content">
					<h5 itemprop="name" class="mkdf-sc-dropdown-item-title entry-title">
						<?php if ( ! $product_permalink ) {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
						} else {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
						} ?>
					</h5>
					<p class="mkdf-sc-dropdown-item-quantity"><?php echo sprintf( esc_html__( 'QTY: %s', 'pawfriends' ), esc_attr( $cart_item['quantity'] ) ); ?></p>
                    <p class="mkdf-sc-dropdown-item-price"><?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); ?></p>
					<?php echo sprintf( '<a href="%s" class="mkdf-sc-dropdown-item-remove remove" title="%s">%s</a>', esc_url( wc_get_cart_remove_url( $cart_item_key ) ), esc_attr__( 'Remove this item', 'pawfriends' ), '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31 34" class="mkdf-dropdown-remove"><path d="M28.6 4.1c1-0.5 1-0.5-0.5-2 -1-1.5-1-1.5-1.5-0.5 -0.5 0.5-1 1.5-1.5 1.5 -0.5 0.5-0.5 1-0.5 1.5 0 0-1.5 1.5-3.1 3 -1.5 1.5-3.6 3-4.6 4 -1 1-2.1 2-2.1 2 -0.5 0-2.6-2.5-4.6-4.9C8.1 6.1 5.5 3.6 5 3.6 4 2.6 3 3.1 3.5 4.1c0.5 0.5 0 1 0 0.5 -0.5 0-1 0-1.5 0.5 -1 1-1 1 0 1.5 1.5 1 6.7 5.4 8.7 7.9l1.5 1.5 -2.1 2.5c-1 1-2.6 3-3.6 4.4 -2.6 2.5-6.7 8.4-6.2 8.9 0 0 0.5 0.5 1.5 0.5 1.5 1 1.5 1 2.1-0.5 0.5-1 3.1-4 5.6-6.4l5.1-4.9 2.6 2.5c1.5 1.5 3.6 4 5.1 5.4l3.1 2.5 0.5-1c1-1.5 1-2 0-3 -0.5-0.5-1.5-2-2.6-3 -2.1-3-5.1-6.9-5.6-6.9 0-0.5 1.5-3 5.6-7.9C24.5 7.6 27.1 5.1 28.6 4.1zM19.9 20.9c1 1.5 2.1 3 2.6 3.5 0.5 0.5 0.5 1.5 0.5 2v0.5c0-0.5-1.5-2-3.1-3.5 -3.6-3.5-3.6-3.5-3.1-4.4C17.4 18.4 17.9 18.9 19.9 20.9zM17.9 14.5c-1 1-1.5 2-1.5 2.5s-3.1 3.5-6.7 6.9c-3.6 3.5-6.2 6.4-6.2 6.9 0 0-0.5 0.5-1 0.5 -1 0-1-0.5 1.5-3.5 2.1-3.5 6.2-8.4 8.2-9.9l2.1-1.5 -1.5-2L7.1 9C5 7.1 4 5.1 4 5.1c0.5 0 2.1 1 3.6 3 1.5 2 4.1 4.4 5.1 5.4l2.1 2.5 3.6-4.4c2.1-2 4.1-3.5 4.1-3.5C23 8.1 19.9 12 17.9 14.5z"/></svg>' ); ?>
				</div>
			</div>
		<?php }
	} ?>
</div>