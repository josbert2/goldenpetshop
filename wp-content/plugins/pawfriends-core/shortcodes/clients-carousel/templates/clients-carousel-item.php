<div class="mkdf-cc-item mkdf-item-space <?php echo esc_attr( $holder_classes ); ?>">
	<?php if(!empty($link)) { ?>
		<a itemprop="url" class="mkdf-cc-link mkdf-block-drag-link" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>">
	<?php } ?>
		<span class="mkdf-active-hover"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-left"><path d="M2 0C0.9 0 0 0.9 0 2l2 23.8c0 1.1 0.9 2 2 2h3.9V0H2z"></path></svg><span class="mkdf-active-hover-middle"></span><svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-right"><path d="M5.9 0c1.1 0 2 0.9 2 2L5 25.8c-0.2 1.6-1.1 1.9-3 2H0V0H5.9"></path></svg></span>
		<?php if(!empty($image)) { ?>
			<img itemprop="image" class="mkdf-cc-image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
		<?php } ?>
		<?php if(!empty($hover_image)) { ?>
			<img itemprop="image" class="mkdf-cc-hover-image" src="<?php echo esc_url($hover_image['url']); ?>" alt="<?php echo esc_attr($hover_image['alt']); ?>" />
		<?php } ?>
	<?php if(!empty($link)) { ?>
		</a>
	<?php } ?>
</div>