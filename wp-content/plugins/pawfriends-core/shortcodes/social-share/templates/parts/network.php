<li class="mkdf-<?php echo esc_html( $name ) ?>-share">
	<a itemprop="url" class="mkdf-share-link" href="#" onclick="<?php echo esc_attr( $link ); ?>">
	 	<?php if ($type == 'text') { ?>
	 	    <span class="mkdf-social-network-text"><?php echo esc_html($text); ?></span>
		<?php } elseif ( $custom_icon !== '' ) { ?>
			<img itemprop="image" src="<?php echo esc_url( $custom_icon ); ?>" alt="<?php echo esc_attr( $name ); ?>"/>
		<?php } else { ?>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31 29" class="mkdf-social">
                <path d="M1 14C1 14 0 1 15 1c12.5 0 14.6 9 14.9 12 0.1 0.6 0 1.2-0.1 1.8C28.9 17.8 25.4 28 16 28 5 28 2 19 1 14z"/>
            </svg>
			<span class="mkdf-social-network-icon <?php echo esc_attr( $icon ); ?>"></span>
		<?php } ?>
	</a>
</li>