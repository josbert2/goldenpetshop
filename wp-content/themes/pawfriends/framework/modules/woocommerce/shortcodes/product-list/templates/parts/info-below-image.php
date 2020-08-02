<?php
$item_classes           = $this_object->getItemClasses( $params );
$shader_styles          = $this_object->getShaderStyles( $params );
$text_wrapper_styles    = $this_object->getTextWrapperStyles( $params );
$params['title_styles'] = $this_object->getTitleStyles( $params );
?>
<div class="mkdf-pli mkdf-item-space <?php echo esc_attr( $item_classes ); ?>">
	<div class="mkdf-pli-inner">
		<div class="mkdf-pli-image">
			<?php pawfriends_mikado_get_module_template_part( 'templates/parts/image', 'woocommerce', '', $params ); ?>
		</div>
		<div class="mkdf-pli-text">
			<div class="mkdf-pli-text-outer">
				<div class="mkdf-pli-text-inner">
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
	<div class="mkdf-pli-text-wrapper" <?php echo pawfriends_mikado_get_inline_style( $text_wrapper_styles ); ?>>
		<?php pawfriends_mikado_get_module_template_part( 'templates/parts/title', 'woocommerce', '', $params ); ?>
		
		<?php pawfriends_mikado_get_module_template_part( 'templates/parts/category', 'woocommerce', '', $params ); ?>
		
		<?php pawfriends_mikado_get_module_template_part( 'templates/parts/excerpt', 'woocommerce', '', $params ); ?>
		
		<?php pawfriends_mikado_get_module_template_part( 'templates/parts/rating', 'woocommerce', '', $params ); ?>
		
		<?php pawfriends_mikado_get_module_template_part( 'templates/parts/price', 'woocommerce', '', $params ); ?>
	</div>
</div>