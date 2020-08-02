<<?php echo esc_attr( $title_tag ); ?> class="mkdf-custom-font-holder <?php echo esc_attr( $holder_classes ); ?>" <?php pawfriends_mikado_inline_style( $holder_styles ); ?> <?php echo pawfriends_mikado_get_inline_attrs( $holder_data ); ?>>
<?php if ( ! empty( $link ) ) { ?>
    <a itemprop="url" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>">
<?php } ?>
	<?php if ( $highlight_effect === 'yes') {
	    echo pawfriends_mikado_get_module_part( $title );
	} else {
        echo wp_kses_post($title);
    } ?>
<?php if ( ! empty( $link ) ) { ?>
    </a>
<?php } ?>
</<?php echo esc_attr( $title_tag ); ?>>