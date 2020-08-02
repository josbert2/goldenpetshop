<?php
if($max_num_pages > 1) {
	$number_of_pages = $max_num_pages;
	$current_page    = $paged;
	$range           = 3;
	?>
	
	<div class="mkdf-blog-pagination">
		<ul>
			<?php if($current_page > 2 && $current_page > $range && $range < $number_of_pages) { ?>
				<li class="mkdf-pag-first">
					<a itemprop="url" href="<?php echo esc_url(get_pagenum_link(1)); ?>">
						<<
					</a>
				</li>
			<?php } ?>
			<?php if ($current_page > 1) { ?>
				<li class="mkdf-pag-prev">
					<a itemprop="url" href="<?php echo esc_url(get_pagenum_link($current_page - 1)); ?>">
						<
					</a>
				</li>
			<?php } ?>
			<?php for ($i=1; $i <= $number_of_pages; $i++) { ?>
				<?php if (!($i >= $current_page + $range+1 || $i <= $current_page - $range-1) || $number_of_pages <= $range ) { ?>
					<?php if($current_page == $i) { ?>
						<li class="mkdf-pag-number mkdf-pag-active">
							<a href="#">
                                <span class="mkdf-active-hover">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-left">
                                        <path d="M2 0C0.9 0 0 0.9 0 2l2 23.8c0 1.1 0.9 2 2 2h3.9V0H2z"/>
                                    </svg>
                                    <span class="mkdf-active-hover-middle"></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-right">
                                        <path d="M5.9 0c1.1 0 2 0.9 2 2L5 25.8c-0.2 1.6-1.1 1.9-3 2H0V0H5.9"/>
                                    </svg>
                                </span>
                                <span class="mkdf-active-digit"><?php echo esc_attr($i); ?></span>
                            </a>
						</li>
					<?php } else { ?>
						<li class="mkdf-pag-number">
							<a itemprop="url" href="<?php echo get_pagenum_link($i); ?>"><?php echo esc_attr($i); ?></a>
						</li>
					<?php } ?>
				<?php } ?>
			<?php } ?>
			<?php if ($current_page < $number_of_pages) { ?>
				<li class="mkdf-pag-next">
					<a itemprop="url" href="<?php echo esc_url(get_pagenum_link($current_page + 1)); ?>">
                        >
					</a>
				</li>
			<?php } ?>
			<?php if ($current_page + 1 < $number_of_pages && $current_page + $range-1 < $number_of_pages && $range < $number_of_pages) { ?>
				<li class="mkdf-pag-last">
					<a itemprop="url" href="<?php echo esc_url(get_pagenum_link($number_of_pages)); ?>">
                        >>
					</a>
				</li>
			<?php } ?>
		</ul>
	</div>
	
	<div class="mkdf-blog-pagination-wp">
		<?php echo get_the_posts_pagination(); ?>
	</div>
	
	<?php
}