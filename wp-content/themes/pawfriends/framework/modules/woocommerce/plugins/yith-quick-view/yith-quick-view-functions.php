<?php
if ( ! function_exists( 'pawfriends_mikado_woocommerce_yith_template_single_title' ) ) {
    /**
     * Function for overriding product title template in YITH Quick View plugin template
     */
    function pawfriends_mikado_woocommerce_yith_template_single_title() {
        the_title( '<h2  itemprop="name" class="mkdf-yith-product-title entry-title">', '</h2>' );
    }
}