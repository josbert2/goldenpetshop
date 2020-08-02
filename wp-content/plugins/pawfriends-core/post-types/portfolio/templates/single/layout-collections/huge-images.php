<div class="mkdf-grid-row">
    <div class="mkdf-grid-col-9">
        <div class="mkdf-ps-image-holder">
            <div class="mkdf-ps-image-inner">
                <?php
                $media = pawfriends_core_get_portfolio_single_media();
                
                if(is_array($media) && count($media)) : ?>
                    <?php foreach($media as $single_media) : ?>
                        <div class="mkdf-ps-image">
                            <?php pawfriends_core_get_portfolio_single_media_html($single_media); ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="mkdf-grid-col-3">
        <div class="mkdf-ps-info-holder mkdf-ps-info-sticky-holder">
            <?php
            //get portfolio content section
            pawfriends_core_get_cpt_single_module_template_part('templates/single/parts/content', 'portfolio', $item_layout);
            
            //get portfolio custom fields section
            pawfriends_core_get_cpt_single_module_template_part('templates/single/parts/custom-fields', 'portfolio', $item_layout);

			//get portfolio date section
			pawfriends_core_get_cpt_single_module_template_part('templates/single/parts/date', 'portfolio', $item_layout);
            
            //get portfolio categories section
            pawfriends_core_get_cpt_single_module_template_part('templates/single/parts/categories', 'portfolio', $item_layout);
            
            //get portfolio tags section
            pawfriends_core_get_cpt_single_module_template_part('templates/single/parts/tags', 'portfolio', $item_layout);
            
            //get portfolio share section
            pawfriends_core_get_cpt_single_module_template_part('templates/single/parts/social', 'portfolio', $item_layout);
            ?>
        </div>
    </div>
</div>