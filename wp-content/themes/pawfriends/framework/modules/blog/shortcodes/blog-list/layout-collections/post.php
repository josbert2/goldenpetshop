<li class="mkdf-bl-item mkdf-item-space">
	<div class="mkdf-bli-inner">
		<?php if ( $post_info_image == 'yes' ) {
			pawfriends_mikado_get_module_template_part( 'templates/parts/media', 'blog', '', $params );
		} ?>
        <div class="mkdf-bli-content">
            <?php if ( $post_info_section == 'yes' ) { ?>
                <?php if( pawfriends_mikado_options()->getOptionValue( 'decorative_date_blog' ) == 'yes' && $post_info_date == 'yes' ) { ?>
                    <div class="mkdf-post-date-holder">
                        <?php pawfriends_mikado_get_module_template_part('templates/parts/post-info/date-decorative', 'blog', '', $params); ?>
                    </div>
                <?php } ?>
                <div class="mkdf-bli-info">
	                <?php
                        if ( $post_info_author == 'yes' ) {
                            pawfriends_mikado_get_module_template_part( 'templates/parts/post-info/author', 'blog', '', $params );
                        }
                        if ( pawfriends_mikado_options()->getOptionValue( 'decorative_date_blog' ) == 'no' && $post_info_date == 'yes' ) {
                            pawfriends_mikado_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $params );
                        }
                        if ( $post_info_comments == 'yes' ) {
                            pawfriends_mikado_get_module_template_part( 'templates/parts/post-info/comments', 'blog', '', $params );
                        }
                        if ( $post_info_like == 'yes' ) {
                            pawfriends_mikado_get_module_template_part( 'templates/parts/post-info/like', 'blog', '', $params );
                        }
		                if ( $post_info_category == 'yes' ) {
			                pawfriends_mikado_get_module_template_part( 'templates/parts/post-info/category', 'blog', '', $params );
		                }
		                if ( $post_info_share == 'yes' ) {
			                pawfriends_mikado_get_module_template_part( 'templates/parts/post-info/share', 'blog', '', $params );
		                }
	                ?>
                </div>
            <?php } ?>
	
	        <?php pawfriends_mikado_get_module_template_part( 'templates/parts/title', 'blog', '', $params ); ?>
	
	        <div class="mkdf-bli-excerpt">
		        <?php pawfriends_mikado_get_module_template_part( 'templates/parts/excerpt', 'blog', '', $params ); ?>
		        <?php pawfriends_mikado_get_module_template_part( 'templates/parts/post-info/read-more', 'blog', '', $params ); ?>
	        </div>
        </div>
	</div>
</li>