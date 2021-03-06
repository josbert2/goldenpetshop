<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<form role="search" method="get" class="mkdf-searchform woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text"><?php esc_html_e( 'Search for:', 'pawfriends' ); ?></label>
	<div class="input-holder clearfix">
		<input type="search" class="search-field" placeholder="<?php esc_attr_e('Search Products...', 'pawfriends'); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php esc_attr_e('Search for:', 'pawfriends'); ?>"/>
		<button type="submit" class="mkdf-search-submit">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 30" width="26" height="30" class="search">
                <path d="M19.8 28.9c-0.3-0.1-0.6-0.3-0.8-0.5 -0.2-0.3-0.2-0.6-0.2-0.9 0.1-0.4 0.6-0.6 1.2-1 0.5-0.3 1.2-0.6 1.2-0.8 -0.1-0.6-4-6.3-5.2-8.1 -0.5-0.8-0.8-1.1-0.8-1.2 -0.1-0.1-0.5-0.1-1-0.1 -0.4 0.6-0.7 1.1-0.6 1.2 0.3 0.4 1.8 2.6 3.2 4.8 1 1.6 2.2 3.3 2.3 3.5 0.1 0.1 0.1 0.2 0.1 0.3 0 0.1-0.2 0.2-0.3 0.1 -0.1 0-0.1-0.1-2.5-3.7 -1.3-2.1-2.9-4.4-3.2-4.7 -0.3-0.3-0.1-0.8 0.4-1.5 -0.3 0-0.5 0.1-0.8 0.1C9.9 16.7 5 17.3 2.7 14c-1.7-2.4-2-5.2-0.8-7.8 1.3-2.9 4.3-5 7.4-5.2 3-0.2 5.7 1.2 7.6 4.1 2.5 3.7-0.4 7.9-2.2 10.4 -0.1 0.1-0.2 0.2-0.2 0.3 0.6 0 0.9 0.1 1.1 0.3 0.1 0.1 0.4 0.6 0.8 1.2 3.9 5.7 5.4 8 5.3 8.4 0 0.5-0.7 0.8-1.4 1.2 -0.4 0.2-1 0.5-1 0.7 0 0.2 0 0.4 0.1 0.5 0.1 0.2 0.3 0.3 0.5 0.4 0 0 0 0 0 0 0.5 0 3.1-1.7 3.2-2.3 0-0.3-0.1-0.6-0.2-0.7 -0.2-0.2-0.4-0.3-0.4-0.3 -0.1 0-0.2-0.1-0.2-0.2 0-0.1 0.1-0.2 0.2-0.2 0.2 0 0.5 0.2 0.7 0.4 0.2 0.2 0.4 0.6 0.3 1 0 0.1-0.1 0.5-1.2 1.4C21.7 28.1 20.4 28.9 19.8 28.9 19.8 28.9 19.8 28.9 19.8 28.9zM14.3 15.2c1.8-2.6 4.5-6.4 2.2-9.9 -1.8-2.7-4.4-4.1-7.2-3.9 -2.9 0.2-5.7 2.2-7 4.9C1.2 8.8 1.4 11.4 3 13.7c2.2 3.1 6.7 2.6 9.7 2.2 0.4 0 0.8-0.1 1.1-0.1C14 15.6 14.2 15.4 14.3 15.2z"/>
            </svg>
        </button>
		<input type="hidden" name="post_type" value="product"/>
	</div>
</form>