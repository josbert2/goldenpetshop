<<?php echo esc_attr( $text_tag ); ?> class="mkdf-underline-text-holder <?php echo esc_attr( $holder_classes ); ?>" <?php echo pawfriends_mikado_get_inline_style( $holder_styles ); ?>>
<?php echo wp_kses_post( $text ); ?>
</<?php echo esc_attr( $text_tag ); ?> >