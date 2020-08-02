<?php
$rand = rand(0, 1000);
?>
<div class="mkdf-video-button-holder <?php echo esc_attr($holder_classes); ?>">
	<div class="mkdf-video-button-image">
		<?php echo wp_get_attachment_image($video_image, 'full'); ?>
	</div>
    <a class="mkdf-video-button-play" href="<?php echo esc_url($video_link); ?>" data-rel="prettyPhoto[video_button_pretty_photo_<?php echo esc_attr($rand); ?>]">
        <span class="mkdf-video-button-play-inner" <?php echo pawfriends_mikado_get_inline_style($holder_styles); ?>>
            <svg class="mkdf-video-button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 66 62">
                <path class="mkdf-video-button-circle" d="M32.8 1.2c0.3 0 0.5 0 0.8 0 5.6 0.1 30.2 4.7 31.6 28 1 17.3-17 32-30.7 32 -5.5 0-30.5-4.2-33.2-30C-1.5 5.9 26.2 1.4 32.8 1.2z"/>
                <polygon class="mkdf-video-button-triangle" points="18.1 46.3 18.1 16.2 48.1 31.2 "/>
            </svg>
        </span>
    </a>
</div>