<?php if ( $query_results->max_num_pages > 1 ) { ?>
	<div class="mkdf-pl-loading">
		<div class="mkdf-pl-loading-bounce1"></div>
		<div class="mkdf-pl-loading-bounce2"></div>
		<div class="mkdf-pl-loading-bounce3"></div>
	</div>
	<?php
	$pages = $query_results->max_num_pages;
	$paged = $query_results->query['paged'];
	
	if ( $pages > 1 ) { ?>
		<div class="mkdf-pl-standard-pagination">
			<ul>
				<li class="mkdf-pag-prev">
					<a href="#" data-paged="1"><</a>
				</li>
				<?php for ( $i = 1; $i <= $pages; $i ++ ) { ?>
					<?php
					$link_classes = '';
					if ( $paged == $i ) {
						$link_classes = 'mkdf-pag-active';
					}
					?>
					<li class="mkdf-pag-number <?php echo esc_attr( $link_classes ); ?>">
                        <a href="#" data-paged="<?php echo esc_attr( $i ); ?>">
                            <span class="mkdf-active-hover">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-left">
                                    <path d="M2 0C0.9 0 0 0.9 0 2l2 23.8c0 1.1 0.9 2 2 2h3.9V0H2z"/>
                                </svg>
                                <span class="mkdf-active-hover-middle"></span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-right">
                                    <path d="M5.9 0c1.1 0 2 0.9 2 2L5 25.8c-0.2 1.6-1.1 1.9-3 2H0V0H5.9"/>
                                </svg>
                            </span>
                            <span class="mkdf-active-digit">
                                <?php echo esc_html( $i ); ?>
                            </span>
                        </a>
					</li>
				<?php } ?>
				<li class="mkdf-pag-next">
					<a href="#" data-paged="2">></a>
				</li>
			</ul>
		</div>
	<?php }
} ?>
