<div class="mkdf-sc-dropdown-button-holder">
	<a itemprop="url" href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="mkdf-sc-dropdown-button mkdf-btn mkdf-btn-medium mkdf-btn-simple">
        <span class="mkdf-btn-text"><?php esc_html_e( 'Cart', 'pawfriends' ); ?></span>
        <?php if( pawfriends_mikado_options()->getOptionValue( 'decorative_paw_background' ) === 'yes' ) { ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 22 21" class="mkdf-paw">
                <path class="mkdf-paw" d="M4.8 4.3c1 0.4 1.7 1.1 2.6 1.7 1.1 0.7 2.3 1.2 3.3 2 1 0.8 1.7 2.3 1 3.4 -0.2 0.4-0.5 0.7-0.9 1 -1.2 1.1-2.4 2.2-3.6 3.3C6 16.9 4 17.8 2.6 16.2c-1.1-1.2-0.4-3.1 0.1-4.3 0.3-0.8 0.5-1.8 0-2.5C2.4 9.2 2.2 9 1.9 8.8 -0.2 6.9 2.1 3.2 4.8 4.3z"/>
                <path class="mkdf-paw" d="M9 2.8C8.5 3.3 8.1 4 8.4 4.6 8.5 5 8.8 5.2 9.2 5.4c1.8 1 6.1 1.1 5.5-2C14.2 0.9 10.3 1.4 9 2.8z"/>
                <path class="mkdf-paw" d="M16.6 6.1c-0.9 0.3-1.7 1.1-1.8 2.1 0 0.2 0 0.4 0.1 0.5C15 9 15.3 9.2 15.5 9.3c0.9 0.5 2 0.8 3.1 0.7 0.7 0 1.3-0.2 1.8-0.6C20.9 9 21.2 8.3 21 7.6 20.4 6 18.1 5.7 16.6 6.1z"/>
                <path class="mkdf-paw" d="M17.9 11.2c-0.8-0.3-1.8-0.4-2.6-0.1 -0.8 0.3-1.5 1.2-1.3 2.1 0.1 0.8 0.8 1.3 1.4 1.7 0.8 0.6 1.7 1 2.7 1 1 0 2-0.7 2.1-1.7C20.4 12.6 19.4 11.8 17.9 11.2z"/>
                <path class="mkdf-paw" d="M10.9 15.4c-0.6 0-1.3 0.3-1.7 0.8 -1.4 2.1 2.2 3.6 3.7 3.5 1.9-0.1 2.5-2 1.2-3.3C13.4 15.6 12 15.3 10.9 15.4z"/>
            </svg>
        <?php } ?>
    </a>
    <a itemprop="url" href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="mkdf-sc-dropdown-button mkdf-btn mkdf-btn-medium mkdf-btn-simple">
        <span class="mkdf-btn-text"><?php esc_html_e( 'Checkout', 'pawfriends' ); ?></span>
        <?php if( pawfriends_mikado_options()->getOptionValue( 'decorative_paw_background' ) === 'yes' ) { ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 22 21" class="mkdf-paw">
                <path class="mkdf-paw" d="M4.8 4.3c1 0.4 1.7 1.1 2.6 1.7 1.1 0.7 2.3 1.2 3.3 2 1 0.8 1.7 2.3 1 3.4 -0.2 0.4-0.5 0.7-0.9 1 -1.2 1.1-2.4 2.2-3.6 3.3C6 16.9 4 17.8 2.6 16.2c-1.1-1.2-0.4-3.1 0.1-4.3 0.3-0.8 0.5-1.8 0-2.5C2.4 9.2 2.2 9 1.9 8.8 -0.2 6.9 2.1 3.2 4.8 4.3z"/>
                <path class="mkdf-paw" d="M9 2.8C8.5 3.3 8.1 4 8.4 4.6 8.5 5 8.8 5.2 9.2 5.4c1.8 1 6.1 1.1 5.5-2C14.2 0.9 10.3 1.4 9 2.8z"/>
                <path class="mkdf-paw" d="M16.6 6.1c-0.9 0.3-1.7 1.1-1.8 2.1 0 0.2 0 0.4 0.1 0.5C15 9 15.3 9.2 15.5 9.3c0.9 0.5 2 0.8 3.1 0.7 0.7 0 1.3-0.2 1.8-0.6C20.9 9 21.2 8.3 21 7.6 20.4 6 18.1 5.7 16.6 6.1z"/>
                <path class="mkdf-paw" d="M17.9 11.2c-0.8-0.3-1.8-0.4-2.6-0.1 -0.8 0.3-1.5 1.2-1.3 2.1 0.1 0.8 0.8 1.3 1.4 1.7 0.8 0.6 1.7 1 2.7 1 1 0 2-0.7 2.1-1.7C20.4 12.6 19.4 11.8 17.9 11.2z"/>
                <path class="mkdf-paw" d="M10.9 15.4c-0.6 0-1.3 0.3-1.7 0.8 -1.4 2.1 2.2 3.6 3.7 3.5 1.9-0.1 2.5-2 1.2-3.3C13.4 15.6 12 15.3 10.9 15.4z"/>
            </svg>
        <?php } ?>
    </a>
</div>