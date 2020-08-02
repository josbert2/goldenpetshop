<?php
$item_classes           = $this_object->getItemClasses( $params );
$shader_styles          = $this_object->getShaderStyles( $params );
$params['title_styles'] = $this_object->getTitleStyles( $params );
?>
<div class="mkdf-pli mkdf-item-space <?php echo esc_attr( $item_classes ); ?>">
	<div class="mkdf-pli-inner">
		<div class="mkdf-pli-image">
			<?php pawfriends_mikado_get_module_template_part( 'templates/parts/image', 'woocommerce', '', $params ); ?>
		</div>
		<div class="mkdf-pli-text" <?php echo pawfriends_mikado_get_inline_style( $shader_styles ); ?>>

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 254 254" class="mkdf-pl"><path d="M1.5 110.2c0 0 0.7-37.7 30.8-68.3s50-39.2 73.5-40.2 37.7-0.8 65 8.7 45.7 24.2 45.7 24.2 17 11.3 23 21.2 10.7 28 11.7 36.5c1 8.5 3.7 24.5-1.7 53.8s-12.3 45.2-12.3 45.2 -8.8 25.5-24 35.5c-15.2 10-44.7 19.8-54.8 22 -10.2 2.2-40.8 7.7-66.8 0 -26-7.7-46-18.8-54-29.5 -8-10.7-12.5-16.7-19.2-29.3S-0.3 138.7 1.5 110.2z"/></svg>

            <div class="mkdf-pli-text-outer">
				<div class="mkdf-pli-text-inner">
					<?php pawfriends_mikado_get_module_template_part( 'templates/parts/title', 'woocommerce', '', $params ); ?>
					
					<?php pawfriends_mikado_get_module_template_part( 'templates/parts/category', 'woocommerce', '', $params ); ?>
					
					<?php pawfriends_mikado_get_module_template_part( 'templates/parts/excerpt', 'woocommerce', '', $params ); ?>
					
					<?php pawfriends_mikado_get_module_template_part( 'templates/parts/rating', 'woocommerce', '', $params ); ?>
					
					<?php pawfriends_mikado_get_module_template_part( 'templates/parts/price', 'woocommerce', '', $params ); ?>
					
					<?php pawfriends_mikado_get_module_template_part( 'templates/parts/add-to-cart', 'woocommerce', '', $params ); ?>

                    <?php if ( $display_yith_buttons == 'yes' ) : ?>
                        <div class="mkdf-pl-yith-wrapper">
                            <?php do_action('pawfriends_mikado_action_product_list_shortcode'); ?>
                        </div>
                    <?php endif; ?>
				</div>
			</div>
		</div>
		<a class="mkdf-pli-link" itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
	</div>
</div>