<?php

if ( class_exists( 'PawFriendsCoreClassWidget' ) ) {
	class PawFriendsMikadoClassWoocommerceDropdownCart extends PawFriendsCoreClassWidget {
		public function __construct() {
			parent::__construct(
				'mkdf_woocommerce_dropdown_cart',
				esc_html__('PawFriends WooCommerce Dropdown Cart', 'pawfriends'),
				array('description' => esc_html__('Display a shop cart icon with a dropdown that shows products that are in the cart', 'pawfriends'),)
			);
			
			$this->setParams();
		}
		
		protected function setParams() {
			$this->params = array(
				array(
					'type'        => 'textfield',
					'name'        => 'woocommerce_dropdown_cart_margin',
					'title'       => esc_html__('Icon Margin', 'pawfriends'),
					'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'pawfriends')
				)
			);
		}
		
		public function widget( $args, $instance ) {
			$icon_styles = array();
			
			if ( $instance['woocommerce_dropdown_cart_margin'] !== '' ) {
				$icon_styles[] = 'margin: ' . $instance['woocommerce_dropdown_cart_margin'];
			}
			?>
			<div class="mkdf-shopping-cart-holder" <?php pawfriends_mikado_inline_style( $icon_styles ) ?>>
				<div class="mkdf-shopping-cart-inner">
					<?php pawfriends_mikado_get_module_template_part( 'widgets/woocommerce-dropdown-cart/templates/content', 'woocommerce' ); ?>
				</div>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'pawfriends_mikado_woocommerce_header_add_to_cart_fragment' ) ) {
	function pawfriends_mikado_woocommerce_header_add_to_cart_fragment( $fragments ) {
		ob_start();
		?>
		<div class="mkdf-shopping-cart-inner">
			<?php pawfriends_mikado_get_module_template_part( 'widgets/woocommerce-dropdown-cart/templates/content', 'woocommerce' ); ?>
		</div>
		
		<?php
		$fragments['div.mkdf-shopping-cart-inner'] = ob_get_clean();
		
		return $fragments;
	}
	
	add_filter( 'woocommerce_add_to_cart_fragments', 'pawfriends_mikado_woocommerce_header_add_to_cart_fragment' );
}
?>