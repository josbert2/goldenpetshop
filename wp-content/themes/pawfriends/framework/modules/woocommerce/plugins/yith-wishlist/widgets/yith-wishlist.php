<?php

class PawFriendsMikadoClassYithWishlist extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'mkdf_woocommerce_yith_wishlist',
			esc_html__('PawFriends WooCommerce Wishlist', 'pawfriends'),
			array( 'description' => esc_html__( 'Display a wishlist icon', 'pawfriends' ) )
		);
	}

    /**
     * @param array $new_instance
     * @param array $old_instance
     *
     * @return array
     */
    public function update($new_instance, $old_instance) {
        $instance = array();
        foreach($this->params as $param) {
            $param_name = $param['name'];

            $instance[$param_name] = sanitize_text_field($new_instance[$param_name]);
        }

        return $instance;
    }

	public function widget( $args, $instance ) {
		extract( $args );
		
		global $yith_wcwl;
		$unique_id = rand( 1000, 9999 );
		?>
		<div class="mkdf-wishlist-widget-holder">
            <a href="<?php echo esc_url($yith_wcwl->get_wishlist_url()); ?>" class="mkdf-wishlist-widget-link">
                <span class="mkdf-widget-text"><?php esc_html_e( 'Wishlist', 'pawfriends' ); ?></span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 33 30" width="33" height="30" class="mkdf-wishlist">
                    <path d="M16.6 28.8c-0.1 0-0.2 0-0.2-0.1 -0.3-0.4-0.5-0.8-0.4-1.3 0-0.3 0.1-0.6 0.2-0.9 -0.8-1.4-2.9-2.9-5.2-4.6 -4.3-3.3-9.8-7.3-9.7-12.4 0-2.6 0.9-5 2.5-6.5C5.1 1.6 7 1 9.2 1.1c2.8 0.1 6.2 1.8 7.3 5.3 0.1 0.2 0 0.3-0.2 0.4 -0.2 0.1-0.3 0-0.4-0.2 -1.1-3.2-4.2-4.8-6.8-4.9 -2.1-0.1-3.8 0.5-5 1.7C2.7 4.8 1.9 7.1 1.9 9.5c0 4.8 5.3 8.8 9.5 11.9 2.2 1.7 4.2 3.1 5.2 4.5 1.2-1.9 4.1-4.1 7.2-6.5 3.2-2.5 6.4-5 7.2-6.8C32 10.1 32 7.1 31 4.9c-0.7-1.6-2-2.7-3.6-3.1 -4.2-1.3-7.3 0.5-8.8 5C18.6 6.9 18.4 7 18.3 7c-0.2-0.1-0.2-0.2-0.2-0.4 1.6-4.7 5-6.7 9.5-5.4 1.8 0.5 3.1 1.7 3.9 3.5 1.1 2.3 1 5.5-0.1 8.2 -0.8 1.9-4 4.4-7.4 7 -3 2.4-6.2 4.8-7.2 6.6 0.4 0.7 0.4 1.5 0 2.2C16.8 28.7 16.8 28.8 16.6 28.8 16.7 28.8 16.6 28.8 16.6 28.8z"/>
                </svg>
            </a>
			<?php wp_nonce_field( 'pawfriends_mikado_product_wishlist_nonce_' . $unique_id, 'pawfriends_mikado_product_wishlist_nonce_' . $unique_id ); ?>
		</div>
		<?php
	}
}
