<a itemprop="url" <?php pawfriends_mikado_class_attribute( pawfriends_mikado_get_dropdown_cart_icon_class() ); ?> href="<?php echo esc_url( wc_get_cart_url() ); ?>">
    <span class="mkdf-dropdown-cart-text"><?php esc_html_e( 'Cart', 'pawfriends' )?></span>
    <span class="mkdf-sc-opener-icon"><?php echo pawfriends_mikado_get_icon_sources_html( 'dropdown_cart', false, array( 'dropdown_cart' => 'yes' ) ); ?>
        <span class="mkdf-sc-opener-count-holder">
            <span class="mkdf-sc-opener-count"><?php echo WC()->cart->cart_contents_count; ?></span>
        </span>
    </span>
</a>