<div class="mkdf-image-with-text-holder <?php echo esc_attr($holder_classes); ?>">
    <div class="mkdf-iwt-image">
        <?php if ($image_behavior === 'lightbox') { ?>
            <a itemprop="image" href="<?php echo esc_url($image['url']); ?>" data-rel="prettyPhoto[iwt_pretty_photo]" title="<?php echo esc_attr($image['alt']); ?>">
        <?php } else if ($image_behavior === 'custom-link' && !empty($custom_link)) { ?>
	            <a itemprop="url" href="<?php echo esc_url($custom_link); ?>" target="<?php echo esc_attr($custom_link_target); ?>">
        <?php } ?>
            <?php if(is_array($image_size) && count($image_size)) : ?>
                <?php echo pawfriends_mikado_generate_thumbnail($image['image_id'], null, $image_size[0], $image_size[1]); ?>
            <?php else: ?>
                <?php echo wp_get_attachment_image($image['image_id'], $image_size); ?>
            <?php endif; ?>
        <?php if ($image_behavior === 'lightbox' || $image_behavior === 'custom-link') { ?>
            </a>
        <?php } ?>
    </div>
    <div class="mkdf-iwt-text-holder">
        <?php if(!empty($title)) { ?>
            <?php if ($image_behavior === 'lightbox') { ?>
                <a itemprop="image" href="<?php echo esc_url($image['url']); ?>" data-rel="prettyPhoto[iwt_pretty_photo]" title="<?php echo esc_attr($image['alt']); ?>">
                    <?php } else if ($image_behavior === 'custom-link' && !empty($custom_link)) { ?>
                <a itemprop="url" href="<?php echo esc_url($custom_link); ?>" target="<?php echo esc_attr($custom_link_target); ?>">
            <?php } ?>
            <div class="mkdf-iwt-title-holder" <?php echo pawfriends_mikado_get_inline_style($title_holder_styles); ?>>
            <?php if ($image_behavior === 'lightbox' || $image_behavior === 'custom-link') { ?>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46 40" class="mkdf-iwt-paw">
                    <path d="M23.8 12.6c4.7 0.7 6.5-3.6 6.8-5 0.2-1.4 0-5.8-5.9-6.5 -5.4-1-6.1 4.6-6.1 4.6C18.6 7.6 19 11.9 23.8 12.6z"/>
                    <path d="M39.3 12.9c-5.6-1-6.3 4.6-6.3 4.6 0 0.5 0 1.2 0.2 1.9 -2-3.4-5.6-6.7-13.5-6.7C6.9 12.9 7.5 25.3 7.5 25.3 8 29.9 10.7 39.2 21.3 39s13.3-10.3 13.3-13.9c0-0.7-0.2-1.9-0.5-3.1 0.7 1.2 2 2.2 4.1 2.4 4.7 0.7 6.5-3.6 6.8-5C45.2 17.7 44.9 13.6 39.3 12.9z"/>
                    <path d="M10.9 5.9C9.8 4.9 6.4 3 2.6 7.6S3 15.7 3 15.7c1.6 1.2 5.2 2.9 8.3-1S12.1 7.1 10.9 5.9z"/>
                </svg>
            <?php } ?>
            <?php if($title_highlight === 'yes') { ?>
                <span class="mkdf-active-hover">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-left">
                        <path d="M2 0C0.9 0 0 0.9 0 2l2 23.8c0 1.1 0.9 2 2 2h3.9V0H2z"/>
                    </svg>
                    <span class="mkdf-active-hover-middle"></span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-right">
                        <path d="M5.9 0c1.1 0 2 0.9 2 2L5 25.8c-0.2 1.6-1.1 1.9-3 2H0V0H5.9"/>
                    </svg>
               </span>
            <?php } ?>
                <<?php echo esc_attr($title_tag); ?> class="mkdf-iwt-title <?php esc_attr_e($title_predefined)?>" <?php echo pawfriends_mikado_get_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
                <?php if ($image_behavior === 'lightbox' || $image_behavior === 'custom-link') { ?>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 228 147" class="mkdf-iwt-paws">
                        <path d="m 14.2,140.5 c 0,0.3 -0.1,0.6 -0.3,0.9 -0.4,0.6 -1.2,1.1 -2,1.1 -0.7,0 -1.5,-0.6 -1.2,-1.4 0.3,-1.1 3.5,-2.5 3.5,-0.6 z m -3.1,-4.4 c -0.3,0.2 -0.6,0.5 -0.7,0.9 -0.2,0.4 -0.2,0.8 0,1.1 0.2,0.4 0.7,0.7 1.2,0.7 0.5,0 1,-0.3 1.3,-0.6 0.6,-0.5 1.4,-1.7 0.5,-2.4 -0.7,-0.5 -1.7,-0.2 -2.3,0.3 z m -3.4,-0.3 c 0.1,0.4 0.4,0.8 0.8,0.9 0.1,0 0.2,0 0.4,-0.1 0.5,-0.2 1.1,-0.5 1.4,-0.9 0.3,-0.4 0.5,-1.1 0.3,-1.6 -0.3,-0.8 -1.3,-1.1 -2.1,-0.7 -0.7,0.4 -0.9,1.6 -0.8,2.4 z m -3.6,2.1 c 0.2,0.1 0.3,0.1 0.5,0.1 0.2,0 0.4,-0.2 0.5,-0.3 0.5,-0.4 0.8,-1 0.8,-1.6 0,-0.2 0,-0.3 0,-0.5 0,-0.1 0,-0.3 -0.1,-0.4 -0.3,-1 -1.8,-1 -2.3,-0.1 -0.5,0.8 -0.4,2.4 0.6,2.8 z m -1.7,5 c -0.9,-0.5 -1,-2 -0.2,-2.7 0.2,-0.1 0.4,-0.3 0.6,-0.4 0.8,-0.4 1.5,-0.8 2.3,-1.1 0.6,-0.3 1.3,-0.6 2,-0.8 0.6,-0.2 1.3,-0.2 1.8,0.1 0.7,0.5 0.8,1.4 0.9,2.3 0.1,0.8 0.1,1.6 0.2,2.4 0.1,0.7 0.1,1.5 -0.2,2.1 -0.3,0.7 -1.1,1.1 -1.8,0.8 -0.6,-0.3 -0.8,-1 -1.2,-1.6 -1.1,-1.5 -2.9,-0.3 -4.4,-1.1 z" />
                        <path d="m 28.4,141.7 c -0.3,0.2 -0.6,0.6 -0.6,1.1 0,1.6 2.5,1.2 3.3,0.6 1,-0.7 0.7,-2 -0.5,-2.2 -0.7,-0.2 -1.6,0.1 -2.2,0.5 z m 2.4,-4.7 c -0.6,0.1 -1.1,0.4 -1.5,0.9 -0.3,0.5 -0.4,1.2 0,1.6 0.3,0.4 0.9,0.5 1.4,0.5 0.6,0 1.3,0 1.9,-0.4 0.5,-0.4 0.9,-1.1 0.6,-1.7 -0.5,-1.1 -1.3,-1.2 -2.4,-0.9 z m -2.5,-2.4 c -0.4,0.5 -0.6,1.2 -0.2,1.8 0.1,0.1 0.1,0.2 0.2,0.3 0.2,0.1 0.3,0.1 0.5,0.1 0.7,0 1.4,-0.3 2,-0.7 0.4,-0.3 0.7,-0.6 0.8,-1 0.1,-0.4 0,-0.9 -0.3,-1.2 -0.9,-0.8 -2.3,-0.1 -3,0.7 z m -5.4,0.8 c -0.1,0.4 -0.1,1 0.3,1.2 0.2,0.2 0.5,0.2 0.8,0.2 1.3,0 3.8,-1.5 2.3,-3 -1.2,-1.3 -3.1,0.3 -3.4,1.6 z m -1.8,2.3 c 0.7,-0.1 1.4,0 2,0 0.9,0 1.7,-0.2 2.6,-0.1 0.8,0.1 1.7,0.7 1.8,1.5 0,0.3 -0.1,0.6 -0.1,0.9 -0.3,1 -0.6,2.1 -0.8,3.1 -0.3,1.1 -1.1,2.3 -2.4,1.9 -1,-0.3 -1.3,-1.6 -1.5,-2.5 -0.1,-0.6 -0.3,-1.2 -0.9,-1.4 -0.2,-0.1 -0.4,-0.1 -0.6,-0.1 -2,-0.1 -2,-3 -0.1,-3.3 z"/>
                        <path d="m 42.2,122.9 c -0.1,0.3 -0.4,0.5 -0.7,0.7 -0.7,0.4 -1.6,0.4 -2.3,0.1 -0.7,-0.3 -1.1,-1.2 -0.5,-1.8 0.8,-0.8 4.4,-0.6 3.5,1 z m -0.8,-5.2 c -0.4,0.1 -0.8,0.2 -1.1,0.5 -0.3,0.2 -0.5,0.6 -0.5,1 0,0.5 0.4,0.9 0.8,1.1 0.4,0.2 1,0.2 1.5,0.1 0.8,-0.2 2,-0.9 1.5,-1.9 -0.4,-0.8 -1.4,-1 -2.2,-0.8 z m -2.9,-1.8 c -0.1,0.4 0,0.9 0.3,1.1 0.1,0.1 0.2,0.1 0.4,0.1 0.6,0.1 1.2,0.1 1.7,-0.2 0.5,-0.2 0.9,-0.7 1,-1.3 0.1,-0.9 -0.7,-1.6 -1.6,-1.5 -0.9,0 -1.6,1 -1.8,1.8 z m -4.2,0.3 c 0.1,0.1 0.3,0.3 0.4,0.3 0.2,0.1 0.4,0 0.6,0 0.6,-0.2 1.1,-0.6 1.4,-1.1 0.1,-0.1 0.2,-0.3 0.2,-0.5 0,-0.1 0.1,-0.2 0.1,-0.4 0.2,-1.1 -1.2,-1.7 -2,-1.2 -0.8,0.6 -1.4,2 -0.7,2.9 z m -3.7,3.6 c -0.6,-0.9 0,-2.3 1,-2.5 0.2,0 0.5,0 0.7,0 0.9,0 1.7,0 2.6,0 0.7,0 1.4,0 2.1,0.1 0.6,0.1 1.3,0.4 1.6,1 0.4,0.7 0.1,1.6 -0.2,2.4 -0.3,0.7 -0.6,1.5 -0.9,2.2 -0.3,0.7 -0.6,1.4 -1.1,1.8 -0.6,0.5 -1.5,0.5 -2,0 -0.4,-0.5 -0.3,-1.3 -0.4,-2 -0.3,-1.9 -2.5,-1.6 -3.4,-3 z" />
                        <path d="m 55.2,134.1 c -0.4,0.1 -0.8,0.3 -1,0.7 -0.8,1.4 1.7,2.2 2.7,2 1.2,-0.2 1.5,-1.5 0.5,-2.2 -0.5,-0.5 -1.5,-0.6 -2.2,-0.5 z m 4.3,-3.2 c -0.6,-0.1 -1.2,-0.1 -1.7,0.1 -0.5,0.2 -0.9,0.9 -0.7,1.4 0.1,0.5 0.6,0.8 1,1 0.6,0.3 1.2,0.6 1.8,0.5 0.6,-0.1 1.3,-0.6 1.3,-1.2 0,-1.1 -0.6,-1.5 -1.7,-1.8 z m -1.2,-3.2 c -0.6,0.3 -1.1,0.9 -1,1.5 0,0.1 0,0.2 0.1,0.3 0.1,0.2 0.3,0.3 0.4,0.3 0.6,0.3 1.4,0.4 2.1,0.3 0.4,-0.1 0.9,-0.2 1.2,-0.6 0.3,-0.3 0.4,-0.8 0.2,-1.2 -0.5,-1 -2,-1.1 -3,-0.6 z M 53.1,126 c -0.3,0.4 -0.5,0.8 -0.3,1.2 0.1,0.2 0.4,0.4 0.6,0.5 1.2,0.6 4.1,0.3 3.4,-1.7 -0.4,-1.6 -2.9,-1 -3.7,0 z m -2.6,1.3 c 0.7,0.2 1.2,0.6 1.8,0.9 0.8,0.4 1.6,0.6 2.3,1.1 0.7,0.5 1.2,1.4 0.9,2.2 -0.1,0.3 -0.3,0.5 -0.5,0.7 -0.7,0.8 -1.4,1.6 -2.1,2.4 -0.8,0.9 -2,1.6 -3,0.6 -0.8,-0.7 -0.5,-2 -0.2,-2.8 0.2,-0.5 0.2,-1.2 -0.2,-1.6 -0.1,-0.2 -0.3,-0.2 -0.5,-0.4 -1.6,-1.1 -0.4,-3.7 1.5,-3.1 z"/>
                        <path d="m 75.9,123.4 c -0.3,0.2 -0.6,0.3 -0.9,0.3 -0.8,0 -1.6,-0.3 -2.1,-0.9 -0.5,-0.6 -0.4,-1.6 0.4,-1.8 1,-0.5 4.1,1.2 2.6,2.4 z m 1.6,-5.1 c -0.4,-0.1 -0.8,-0.1 -1.2,-0.1 -0.4,0.1 -0.7,0.3 -0.9,0.7 -0.2,0.4 -0.1,1 0.2,1.4 0.3,0.4 0.8,0.6 1.3,0.7 0.8,0.2 2.2,0.1 2.2,-1 0,-0.9 -0.8,-1.5 -1.6,-1.7 z m -1.8,-2.9 c -0.3,0.3 -0.4,0.8 -0.2,1.1 0.1,0.1 0.2,0.2 0.3,0.3 0.5,0.3 1,0.6 1.6,0.6 0.6,0 1.2,-0.2 1.5,-0.7 0.5,-0.7 0.1,-1.7 -0.7,-2.1 -0.9,-0.3 -2,0.2 -2.5,0.8 z m -3.9,-1.6 c 0,0.2 0.1,0.3 0.3,0.5 0.1,0.1 0.3,0.2 0.5,0.2 0.6,0.1 1.3,0 1.8,-0.4 0.1,-0.1 0.3,-0.2 0.4,-0.3 0.1,-0.1 0.2,-0.2 0.3,-0.3 0.6,-0.9 -0.3,-2 -1.3,-1.9 -1,0.1 -2.2,1.1 -2,2.2 z m -5,1.7 c -0.1,-1 1,-2 2,-1.8 0.2,0.1 0.4,0.2 0.7,0.3 0.8,0.4 1.5,0.8 2.3,1.2 0.6,0.3 1.3,0.6 1.8,1.1 0.5,0.4 1,0.9 1,1.6 0,0.8 -0.6,1.5 -1.3,2.1 -0.6,0.5 -1.2,1.1 -1.8,1.6 -0.5,0.5 -1.1,1 -1.8,1.1 -0.7,0.1 -1.6,-0.2 -1.7,-0.9 -0.1,-0.7 0.3,-1.3 0.5,-1.9 0.6,-2.1 -1.4,-2.8 -1.7,-4.4 z"/>
                        <path d="m 91,133.1 c -0.4,0.2 -0.7,0.5 -0.8,1 -0.3,1.6 2.3,1.6 3.2,1.1 1.1,-0.6 0.9,-1.8 -0.2,-2.3 -0.6,-0.4 -1.5,-0.2 -2.2,0.2 z m 3.1,-4.4 c -0.6,0.1 -1.2,0.2 -1.6,0.7 -0.4,0.4 -0.5,1.1 -0.2,1.6 0.3,0.4 0.8,0.6 1.3,0.7 0.6,0.1 1.3,0.2 1.9,-0.1 0.6,-0.3 1,-1 0.8,-1.6 -0.3,-1.2 -1.1,-1.4 -2.2,-1.3 z M 91.9,126 c -0.5,0.4 -0.7,1.2 -0.5,1.8 0,0.1 0.1,0.2 0.2,0.3 0.1,0.1 0.3,0.2 0.5,0.2 0.7,0.1 1.4,-0.1 2.1,-0.4 0.4,-0.2 0.7,-0.5 0.9,-0.9 0.2,-0.4 0.1,-0.9 -0.2,-1.2 -0.8,-1 -2.2,-0.5 -3,0.2 z m -5.4,0 c -0.1,0.4 -0.2,0.9 0.1,1.3 0.2,0.2 0.5,0.3 0.7,0.3 1.3,0.1 3.9,-1 2.7,-2.7 -0.9,-1.4 -3.1,-0.1 -3.5,1.1 z m -2.1,2.1 c 0.7,0 1.3,0.2 2,0.3 0.8,0.1 1.7,0.1 2.5,0.3 0.8,0.2 1.6,0.9 1.6,1.8 0,0.3 -0.1,0.6 -0.2,0.8 -0.4,1 -0.8,2 -1.3,3 -0.5,1.1 -1.4,2.1 -2.7,1.6 -1,-0.4 -1.1,-1.7 -1.1,-2.6 0,-0.6 -0.2,-1.2 -0.7,-1.5 -0.2,-0.1 -0.4,-0.1 -0.6,-0.2 -1.8,-0.6 -1.5,-3.4 0.5,-3.5 z" />
                        <path d="m 107.3,116.4 c -0.2,0.3 -0.5,0.5 -0.8,0.6 -0.7,0.3 -1.6,0.2 -2.3,-0.2 -0.6,-0.4 -0.9,-1.4 -0.2,-1.9 0.9,-0.7 4.4,-0.1 3.3,1.5 z m -0.1,-5.4 c -0.4,0 -0.8,0.1 -1.1,0.3 -0.3,0.2 -0.6,0.5 -0.7,0.9 -0.1,0.5 0.2,1 0.6,1.2 0.4,0.3 0.9,0.3 1.4,0.3 0.8,0 2.1,-0.6 1.8,-1.7 -0.2,-0.7 -1.2,-1 -2,-1 z m -2.6,-2.1 c -0.2,0.4 -0.2,0.9 0.2,1.2 0.1,0.1 0.2,0.1 0.3,0.2 0.5,0.2 1.1,0.2 1.7,0 0.5,-0.2 1,-0.6 1.2,-1.1 0.2,-0.9 -0.5,-1.7 -1.3,-1.7 -1,-0.2 -1.8,0.6 -2.1,1.4 z m -4.3,-0.3 c 0.1,0.2 0.2,0.3 0.4,0.4 0.2,0.1 0.4,0.1 0.6,0.1 0.6,-0.1 1.2,-0.4 1.6,-0.9 0.1,-0.1 0.2,-0.3 0.3,-0.4 0.1,-0.1 0.1,-0.2 0.2,-0.4 0.3,-1 -0.9,-1.8 -1.8,-1.4 -1,0.3 -1.8,1.6 -1.3,2.6 z m -4.1,3.1 c -0.5,-0.9 0.3,-2.2 1.3,-2.3 0.2,0 0.5,0 0.7,0 0.9,0.1 1.7,0.2 2.6,0.4 0.7,0.1 1.4,0.2 2.1,0.4 0.6,0.2 1.2,0.6 1.4,1.2 0.3,0.8 -0.1,1.6 -0.5,2.4 -0.4,0.7 -0.8,1.4 -1.2,2.1 -0.4,0.6 -0.8,1.3 -1.4,1.7 -0.6,0.4 -1.6,0.3 -1.9,-0.3 -0.3,-0.6 -0.1,-1.3 -0.1,-2 -0.1,-2.1 -2.3,-2.1 -3,-3.6 z"/>
                        <path d="m 125.1,118.2 c -0.3,0.3 -0.4,0.8 -0.3,1.2 0.5,1.6 2.7,0.4 3.3,-0.4 0.7,-1 0,-2.1 -1.2,-2 -0.7,0 -1.4,0.6 -1.8,1.2 z m 0.8,-5.3 c -0.5,0.3 -0.9,0.7 -1.1,1.3 -0.2,0.6 0,1.2 0.5,1.5 0.4,0.3 1,0.2 1.5,0 0.6,-0.2 1.3,-0.4 1.7,-0.9 0.4,-0.5 0.5,-1.3 0,-1.8 -0.9,-0.8 -1.7,-0.6 -2.6,-0.1 z m -3.2,-1.5 c -0.2,0.6 -0.1,1.4 0.3,1.8 0.1,0.1 0.2,0.1 0.3,0.2 0.2,0 0.4,0 0.5,-0.1 0.7,-0.2 1.2,-0.7 1.7,-1.3 0.3,-0.4 0.4,-0.8 0.4,-1.2 0,-0.4 -0.3,-0.9 -0.7,-1 -1,-0.3 -2.1,0.7 -2.5,1.6 z m -4.9,2.5 c 0.1,0.4 0.2,0.9 0.7,1.1 0.2,0.1 0.5,0 0.8,-0.1 1.3,-0.5 3.1,-2.6 1.3,-3.6 -1.5,-0.8 -2.9,1.3 -2.8,2.6 z m -0.9,2.8 c 0.6,-0.3 1.3,-0.4 1.9,-0.6 0.8,-0.3 1.6,-0.7 2.4,-0.9 0.8,-0.2 1.9,0.1 2.2,0.9 0.1,0.3 0.1,0.6 0.1,0.9 0.1,1.1 0.1,2.2 0.2,3.2 0.1,1.2 -0.3,2.5 -1.7,2.6 -1,0.1 -1.7,-1.1 -2.2,-1.9 -0.3,-0.5 -0.7,-1 -1.3,-1 -0.2,0 -0.4,0.1 -0.6,0.1 -1.8,0.3 -2.7,-2.4 -1,-3.3 z"/>
                        <path d="m 132.2,96.1 c -0.1,0.3 -0.2,0.6 -0.5,0.9 -0.5,0.6 -1.4,0.9 -2.1,0.8 -0.7,-0.1 -1.4,-0.8 -1,-1.6 0.5,-1.1 3.9,-2 3.6,-0.1 z m -2.4,-4.8 c -0.3,0.2 -0.7,0.4 -0.9,0.8 -0.2,0.3 -0.3,0.7 -0.2,1.1 0.2,0.5 0.6,0.8 1.1,0.8 0.5,0.1 1,-0.1 1.4,-0.4 0.7,-0.4 1.6,-1.5 0.8,-2.3 -0.5,-0.6 -1.5,-0.4 -2.2,0 z m -3.3,-0.8 c 0,0.4 0.2,0.9 0.6,1 0.1,0 0.3,0 0.4,0 0.6,-0.1 1.1,-0.3 1.5,-0.7 0.4,-0.4 0.7,-1 0.6,-1.5 -0.2,-0.9 -1.2,-1.3 -2,-1 -0.7,0.3 -1.2,1.4 -1.1,2.2 z m -3.9,1.6 c 0.2,0.1 0.3,0.2 0.5,0.2 0.2,0 0.4,-0.1 0.5,-0.2 0.5,-0.3 0.9,-0.9 1,-1.5 0,-0.2 0.1,-0.3 0.1,-0.5 0,-0.1 0,-0.3 0,-0.4 -0.2,-1.1 -1.6,-1.2 -2.3,-0.5 -0.6,0.7 -0.7,2.3 0.2,2.9 z m -2.4,4.7 c -0.8,-0.6 -0.7,-2.1 0.2,-2.7 0.2,-0.1 0.4,-0.2 0.7,-0.3 0.8,-0.3 1.6,-0.5 2.5,-0.8 0.7,-0.2 1.3,-0.4 2.1,-0.5 0.6,-0.1 1.3,0 1.8,0.4 0.6,0.6 0.6,1.5 0.6,2.4 -0.1,0.8 -0.1,1.6 -0.2,2.4 0,0.7 -0.1,1.5 -0.5,2.1 -0.4,0.6 -1.3,1 -1.9,0.6 -0.6,-0.4 -0.6,-1.1 -0.9,-1.7 -1.1,-1.9 -3.1,-0.9 -4.4,-1.9 z"/>
                        <path d="m 148.8,91.2 c -0.1,0.4 -0.1,0.9 0.2,1.2 1,1.3 2.7,-0.6 3,-1.5 0.3,-1.2 -0.7,-2 -1.8,-1.5 -0.7,0.4 -1.2,1.2 -1.4,1.8 z m -1,-5.2 c -0.4,0.5 -0.6,1 -0.6,1.6 0,0.6 0.4,1.2 1,1.3 0.5,0.1 1,-0.2 1.4,-0.5 0.5,-0.4 1,-0.8 1.2,-1.5 0.2,-0.6 0,-1.4 -0.6,-1.7 -1,-0.5 -1.7,0 -2.4,0.8 z m -3.5,-0.3 c 0,0.6 0.3,1.3 0.9,1.6 0.1,0 0.2,0.1 0.3,0.1 0.2,0 0.3,-0.1 0.5,-0.2 0.5,-0.5 0.9,-1.1 1.1,-1.8 0.1,-0.4 0.2,-0.9 0,-1.3 -0.2,-0.4 -0.5,-0.7 -1,-0.7 -1.1,-0.1 -1.7,1.2 -1.8,2.3 z m -3.7,3.9 c 0.2,0.4 0.5,0.8 1,0.8 0.3,0 0.5,-0.2 0.7,-0.3 1,-0.9 2,-3.5 0,-3.8 -1.7,-0.3 -2.3,2.2 -1.7,3.3 z m 0,3 c 0.5,-0.5 1.1,-0.8 1.6,-1.2 0.7,-0.5 1.2,-1.2 2,-1.6 0.7,-0.4 1.8,-0.5 2.4,0.1 0.2,0.2 0.3,0.5 0.4,0.8 0.4,1 0.8,2 1.3,3 0.5,1.1 0.6,2.5 -0.7,3 -1,0.4 -2,-0.4 -2.7,-1 -0.4,-0.4 -1,-0.7 -1.5,-0.5 -0.2,0.1 -0.4,0.2 -0.6,0.3 -1.7,0.8 -3.5,-1.5 -2.2,-2.9 z" />
                        <path d="m 148.1,68 c 0.1,0.3 0,0.7 -0.1,1 -0.3,0.7 -1,1.3 -1.8,1.5 -0.7,0.2 -1.6,-0.3 -1.5,-1.2 0.1,-1.1 3,-3.2 3.4,-1.3 z m -3.9,-3.7 c -0.2,0.3 -0.5,0.6 -0.6,1 -0.1,0.4 0,0.8 0.2,1.1 0.3,0.4 0.9,0.5 1.3,0.4 0.5,-0.1 0.9,-0.4 1.2,-0.8 0.5,-0.6 1,-1.9 0,-2.4 -0.7,-0.4 -1.6,0.1 -2.1,0.7 z m -3.4,0.4 c 0.2,0.4 0.5,0.7 0.9,0.7 0.1,0 0.2,-0.1 0.3,-0.1 0.5,-0.3 0.9,-0.7 1.2,-1.2 0.3,-0.5 0.3,-1.1 0,-1.6 -0.4,-0.8 -1.5,-0.8 -2.2,-0.3 -0.5,0.5 -0.5,1.8 -0.2,2.5 z m -3.1,2.8 c 0.2,0 0.4,0 0.5,0 0.2,-0.1 0.3,-0.2 0.4,-0.4 0.4,-0.5 0.5,-1.1 0.4,-1.8 0,-0.2 -0.1,-0.3 -0.1,-0.5 0,-0.1 -0.1,-0.3 -0.1,-0.4 -0.5,-1 -2,-0.6 -2.3,0.3 -0.3,1 0.1,2.6 1.2,2.8 z m -0.7,5.2 c -1,-0.3 -1.4,-1.8 -0.7,-2.6 0.2,-0.2 0.3,-0.3 0.5,-0.5 0.7,-0.5 1.4,-1.1 2,-1.6 0.6,-0.4 1.1,-0.9 1.8,-1.2 0.6,-0.3 1.2,-0.5 1.8,-0.2 0.8,0.3 1.1,1.2 1.3,2 0.2,0.8 0.4,1.6 0.7,2.3 0.2,0.7 0.4,1.4 0.2,2.1 -0.2,0.7 -0.9,1.3 -1.6,1.2 -0.7,-0.2 -1,-0.9 -1.5,-1.3 -1.4,-1.3 -2.9,0.3 -4.5,-0.2 z" />
                        <path d="m 162.4,63.1 c -0.2,0.4 -0.2,0.9 0,1.2 0.8,1.4 2.7,-0.2 3.2,-1.1 0.5,-1.1 -0.4,-2 -1.5,-1.7 -0.8,0.2 -1.4,0.9 -1.7,1.6 z m -0.2,-5.3 c -0.4,0.4 -0.8,0.9 -0.8,1.5 -0.1,0.6 0.2,1.2 0.8,1.4 0.5,0.2 1,0 1.4,-0.3 0.6,-0.3 1.1,-0.7 1.4,-1.3 0.3,-0.6 0.2,-1.4 -0.3,-1.7 -1,-0.7 -1.8,-0.4 -2.5,0.4 z m -3.4,-0.9 c -0.1,0.6 0.1,1.4 0.7,1.7 0.1,0.1 0.2,0.1 0.3,0.1 0.2,0 0.4,-0.1 0.5,-0.2 0.6,-0.4 1.1,-0.9 1.4,-1.6 0.2,-0.4 0.3,-0.8 0.2,-1.3 -0.1,-0.4 -0.4,-0.8 -0.9,-0.9 -1.2,0 -2,1.2 -2.2,2.2 z m -4.3,3.4 c 0.1,0.4 0.4,0.9 0.9,0.9 0.3,0 0.5,-0.1 0.7,-0.2 1.1,-0.7 2.5,-3.2 0.5,-3.8 -1.6,-0.5 -2.5,1.9 -2.1,3.1 z m -0.4,2.9 c 0.5,-0.4 1.2,-0.7 1.8,-1 0.7,-0.4 1.4,-1 2.2,-1.3 0.8,-0.3 1.8,-0.3 2.3,0.5 0.2,0.2 0.2,0.5 0.3,0.8 0.3,1 0.6,2.1 0.8,3.1 0.3,1.1 0.2,2.5 -1.2,2.9 -1,0.3 -1.9,-0.7 -2.5,-1.4 -0.4,-0.4 -0.9,-0.8 -1.4,-0.7 -0.2,0 -0.4,0.2 -0.6,0.2 -1.7,0.6 -3.2,-1.8 -1.7,-3.1 z"/>
                        <path d="m 165,39.9 c 0,0.3 -0.1,0.7 -0.3,0.9 -0.4,0.7 -1.2,1.2 -1.9,1.2 -0.7,0.1 -1.5,-0.5 -1.3,-1.4 0.3,-0.9 3.4,-2.5 3.5,-0.7 z m -3.3,-4.1 c -0.3,0.3 -0.5,0.6 -0.7,0.9 -0.1,0.4 -0.2,0.8 0,1.1 0.2,0.4 0.8,0.6 1.3,0.6 0.5,0 0.9,-0.3 1.3,-0.6 0.6,-0.5 1.3,-1.8 0.4,-2.4 -0.8,-0.5 -1.7,-0.2 -2.3,0.4 z m -3.4,-0.1 c 0.1,0.4 0.4,0.8 0.8,0.8 0.1,0 0.2,0 0.4,-0.1 0.5,-0.2 1,-0.5 1.4,-1 0.3,-0.5 0.4,-1.1 0.2,-1.6 -0.3,-0.8 -1.4,-1 -2.1,-0.6 -0.8,0.5 -0.9,1.7 -0.7,2.5 z m -3.5,2.3 c 0.2,0.1 0.4,0.1 0.5,0.1 0.2,0 0.4,-0.2 0.5,-0.3 0.4,-0.4 0.7,-1.1 0.7,-1.7 0,-0.2 0,-0.3 0,-0.5 0,-0.1 0,-0.3 -0.1,-0.4 -0.4,-1 -1.9,-0.9 -2.3,0 -0.5,0.9 -0.4,2.4 0.7,2.8 z m -1.4,5.1 c -0.9,-0.5 -1.2,-1.9 -0.4,-2.7 0.2,-0.2 0.4,-0.3 0.6,-0.4 0.7,-0.4 1.5,-0.9 2.2,-1.3 0.6,-0.3 1.2,-0.7 1.9,-0.9 0.6,-0.2 1.3,-0.3 1.8,0 0.7,0.4 0.9,1.4 1,2.2 0.1,0.8 0.2,1.6 0.3,2.4 0.1,0.7 0.2,1.5 -0.1,2.2 -0.3,0.7 -1,1.2 -1.7,0.9 -0.6,-0.2 -0.9,-1 -1.3,-1.5 -1.1,-1.6 -2.8,-0.2 -4.3,-0.9 z"/>
                        <path d="m 179.4,41 c -0.3,0.2 -0.6,0.6 -0.6,1.1 0,1.6 2.5,1.2 3.3,0.6 1,-0.7 0.7,-2 -0.5,-2.2 -0.7,-0.2 -1.6,0.1 -2.2,0.5 z m 2.4,-4.7 c -0.6,0.1 -1.1,0.4 -1.5,0.9 -0.3,0.5 -0.4,1.2 0,1.6 0.3,0.4 0.9,0.5 1.4,0.5 0.6,0 1.3,0 1.9,-0.4 0.5,-0.4 0.9,-1.1 0.6,-1.7 -0.5,-1.1 -1.3,-1.2 -2.4,-0.9 z m -2.5,-2.4 c -0.4,0.5 -0.6,1.2 -0.2,1.8 0.1,0.1 0.1,0.2 0.2,0.3 0.2,0.1 0.3,0.1 0.5,0.1 0.7,0 1.4,-0.3 2,-0.7 0.4,-0.3 0.7,-0.6 0.8,-1 0.1,-0.4 0,-0.9 -0.3,-1.2 -0.9,-0.7 -2.3,-0.1 -3,0.7 z m -5.4,0.8 c -0.1,0.4 -0.1,1 0.3,1.2 0.2,0.2 0.5,0.2 0.8,0.2 1.3,0 3.8,-1.5 2.3,-3 -1.2,-1.3 -3.1,0.3 -3.4,1.6 z m -1.8,2.3 c 0.7,-0.1 1.4,0 2,0 0.9,0 1.7,-0.2 2.6,-0.1 0.8,0.1 1.7,0.7 1.8,1.5 0,0.3 -0.1,0.6 -0.1,0.9 -0.3,1 -0.6,2.1 -0.8,3.1 -0.3,1.1 -1.1,2.3 -2.4,1.9 -1,-0.3 -1.3,-1.6 -1.5,-2.4 -0.1,-0.6 -0.4,-1.2 -0.9,-1.4 -0.2,-0.1 -0.4,-0.1 -0.6,-0.1 -2,-0.2 -2,-3 -0.1,-3.4 z" />
                        <path d="m 193.2,22.3 c -0.1,0.3 -0.4,0.5 -0.7,0.7 -0.7,0.4 -1.6,0.4 -2.3,0.1 -0.7,-0.3 -1.1,-1.2 -0.5,-1.8 0.8,-0.9 4.4,-0.7 3.5,1 z M 192.4,17 c -0.4,0.1 -0.8,0.2 -1.1,0.5 -0.3,0.2 -0.5,0.6 -0.5,1 0,0.5 0.4,0.9 0.8,1.1 0.4,0.2 1,0.2 1.5,0.1 0.8,-0.2 2,-0.9 1.5,-1.9 -0.4,-0.8 -1.4,-1 -2.2,-0.8 z m -2.9,-1.8 c -0.1,0.4 0,0.9 0.3,1.1 0.1,0.1 0.2,0.1 0.4,0.1 0.6,0.1 1.2,0.1 1.7,-0.2 0.5,-0.2 0.9,-0.7 1,-1.3 0.1,-0.9 -0.7,-1.6 -1.6,-1.5 -0.9,0 -1.6,1 -1.8,1.8 z m -4.2,0.3 c 0.1,0.1 0.3,0.3 0.4,0.3 0.2,0.1 0.4,0 0.6,0 0.6,-0.2 1.1,-0.6 1.4,-1.1 0.1,-0.1 0.2,-0.3 0.2,-0.5 0,-0.1 0.1,-0.2 0.1,-0.4 0.2,-1.1 -1.2,-1.7 -2,-1.2 -0.8,0.6 -1.4,2 -0.7,2.9 z m -3.7,3.7 c -0.6,-0.9 0,-2.3 1,-2.5 0.2,0 0.5,0 0.7,0 0.9,0 1.7,0 2.6,0 0.7,0 1.4,0 2.1,0.1 0.6,0.1 1.3,0.4 1.6,1 0.4,0.7 0.1,1.6 -0.2,2.4 -0.3,0.7 -0.6,1.5 -0.9,2.2 -0.3,0.7 -0.6,1.4 -1.1,1.8 -0.6,0.5 -1.5,0.5 -2,0 -0.4,-0.5 -0.3,-1.3 -0.4,-2 -0.3,-2 -2.5,-1.7 -3.4,-3 z" />
                        <path d="m 207.8,29.1 c -0.4,0.2 -0.7,0.5 -0.8,0.9 -0.3,1.6 2.2,1.7 3.1,1.2 1.1,-0.5 1,-1.8 -0.1,-2.3 -0.6,-0.3 -1.5,-0.1 -2.2,0.2 z m 3.3,-4.3 c -0.6,0 -1.2,0.2 -1.6,0.6 -0.4,0.4 -0.6,1.1 -0.3,1.6 0.3,0.4 0.8,0.6 1.3,0.7 0.6,0.1 1.3,0.2 1.9,0 0.6,-0.3 1.1,-0.9 0.9,-1.5 -0.4,-1.2 -1.2,-1.4 -2.2,-1.4 z M 209,22 c -0.5,0.4 -0.8,1.1 -0.6,1.7 0,0.1 0.1,0.2 0.2,0.3 0.1,0.1 0.3,0.2 0.5,0.2 0.7,0.1 1.4,0 2.1,-0.3 0.4,-0.2 0.8,-0.5 1,-0.8 0.2,-0.4 0.2,-0.9 -0.1,-1.2 -0.8,-0.9 -2.3,-0.6 -3.1,0.1 z m -5.4,-0.2 c -0.2,0.4 -0.2,0.9 0.1,1.3 0.2,0.2 0.4,0.3 0.7,0.3 1.3,0.2 4,-0.8 2.8,-2.6 -0.9,-1.4 -3.2,-0.1 -3.6,1 z m -2.2,2 c 0.7,0 1.3,0.3 2,0.4 0.8,0.2 1.7,0.1 2.5,0.4 0.8,0.3 1.6,1 1.5,1.8 0,0.3 -0.2,0.6 -0.3,0.8 -0.5,1 -0.9,2 -1.4,2.9 -0.5,1.1 -1.5,2.1 -2.8,1.5 -0.9,-0.5 -1,-1.8 -1,-2.7 0,-0.6 -0.1,-1.2 -0.6,-1.5 -0.2,-0.1 -0.4,-0.1 -0.6,-0.2 -1.8,-0.6 -1.2,-3.4 0.7,-3.4 z"/>
                        <path d="m 224.8,13.1 c -0.2,0.3 -0.5,0.4 -0.8,0.5 -0.7,0.2 -1.6,0.1 -2.3,-0.3 -0.6,-0.4 -0.8,-1.4 -0.1,-1.9 0.9,-0.6 4.3,0.2 3.2,1.7 z m 0.1,-5.3 c -0.4,0 -0.8,0.1 -1.1,0.3 -0.3,0.2 -0.6,0.5 -0.7,0.9 -0.1,0.5 0.2,1 0.6,1.3 0.4,0.3 0.9,0.4 1.4,0.4 0.8,0 2.1,-0.5 1.8,-1.6 -0.2,-1 -1.2,-1.4 -2,-1.3 z m -2.5,-2.3 c -0.2,0.4 -0.2,0.9 0.1,1.2 0.1,0.1 0.2,0.1 0.3,0.2 0.5,0.2 1.1,0.3 1.7,0.1 0.5,-0.1 1,-0.5 1.2,-1.1 0.3,-0.8 -0.4,-1.7 -1.3,-1.8 -0.8,-0.2 -1.7,0.7 -2,1.4 z M 218.2,5 c 0.1,0.2 0.2,0.3 0.4,0.4 0.2,0.1 0.4,0.1 0.6,0.1 0.6,-0.1 1.2,-0.4 1.6,-0.8 0.1,-0.1 0.2,-0.3 0.3,-0.4 0.1,-0.1 0.1,-0.2 0.2,-0.4 0.4,-1 -0.9,-1.9 -1.8,-1.5 -0.9,0.3 -1.8,1.6 -1.3,2.6 z m -4.3,2.9 c -0.4,-1 0.4,-2.2 1.4,-2.3 0.2,0 0.5,0 0.7,0.1 0.8,0.2 1.7,0.3 2.5,0.5 0.7,0.1 1.4,0.3 2.1,0.5 0.6,0.2 1.2,0.6 1.4,1.2 0.3,0.8 -0.2,1.6 -0.6,2.3 -0.4,0.7 -0.9,1.4 -1.3,2 -0.4,0.6 -0.8,1.3 -1.5,1.6 -0.6,0.3 -1.6,0.2 -1.9,-0.4 -0.3,-0.6 0,-1.3 0,-2 0,-1.8 -2.1,-1.9 -2.8,-3.5 z" />
                    </svg>
                <?php } ?>
            </div>
            <?php if ($image_behavior === 'lightbox' || $image_behavior === 'custom-link') { ?>
                </a>
            <?php } ?>
        <?php } ?>
		<?php if(!empty($text)) { ?>
            <p class="mkdf-iwt-text" <?php echo pawfriends_mikado_get_inline_style($text_styles); ?>><?php echo esc_html($text); ?></p>
        <?php } ?>
    </div>
</div>