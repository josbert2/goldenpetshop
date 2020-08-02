<?php
$author_info_box       = esc_attr( pawfriends_mikado_options()->getOptionValue( 'blog_author_info' ) );
$author_info_email     = esc_attr( pawfriends_mikado_options()->getOptionValue( 'blog_author_info_email' ) );
$author_id             = esc_attr( get_the_author_meta( 'ID' ) );
$social_networks       = pawfriends_mikado_is_plugin_installed( 'core' ) ? pawfriends_mikado_get_user_custom_fields() : false;
$display_author_social = pawfriends_mikado_options()->getOptionValue( 'blog_single_author_social' ) === 'no' ? false : true;
?>
<?php if ( $author_info_box === 'yes' && get_the_author_meta( 'description' ) !== "" ) { ?>
	<div class="mkdf-author-description">
		<div class="mkdf-author-description-image">
			<a itemprop="url" href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>" title="<?php the_title_attribute(); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 153 156" width="153" height="156">
                    <defs>
                        <clipPath id="mkdf-post-author-img">
                            <path d="M144 155H7c-3.3 0-6-2.7-6-6V10c0-3.3 2.7-6 6-6l139-3c3.3 0 6 2.7 6 6l-2 142C150 152.3 147.3 155 144 155z"/>
                        </clipPath>
                    </defs>
                <image class="clipped" width="156" height="156" href="<?php echo get_avatar_url( get_the_author_meta( 'ID' ), $arg = array('size' => 156) ) ?>" clip-path="url(#mkdf-post-author-img)" />
                </svg>
                <?php echo pawfriends_mikado_kses_img( get_avatar( get_the_author_meta( 'ID' ), 156 ) ); ?>
			</a>
		</div>
		<div class="mkdf-author-description-content">
			<h4 class="mkdf-author-name vcard author">
				<a itemprop="url" href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>" title="<?php the_title_attribute(); ?>">
					<span class="fn">
						<?php
						if ( get_the_author_meta( 'first_name' ) != "" || get_the_author_meta( 'last_name' ) != "" ) {
							echo esc_html( get_the_author_meta( 'first_name' ) ) . " " . esc_html( get_the_author_meta( 'last_name' ) );
						} else {
							echo esc_html( get_the_author_meta( 'display_name' ) );
						}
						?>
					</span>
				</a>
			</h4>
			<?php if ( $author_info_email === 'yes' && is_email( get_the_author_meta( 'email' ) ) ) { ?>
				<p itemprop="email" class="mkdf-author-email"><?php echo sanitize_email( get_the_author_meta( 'email' ) ); ?></p>
			<?php } ?>
			<?php if ( get_the_author_meta( 'description' ) != "" ) { ?>
				<p itemprop="description" class="mkdf-author-text"><?php echo wp_kses_post( get_the_author_meta( 'description' ) ); ?></p>
			<?php } ?>
			<?php if ( $display_author_social ) { ?>
				<?php if ( is_array( $social_networks ) && count( $social_networks ) ) { ?>
					<div class="mkdf-author-social-icons clearfix">
						<?php foreach ( $social_networks as $network ) { ?>
							<a itemprop="url" href="<?php echo esc_attr( $network['link'] ) ?>" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31 29" class="mkdf-social">
                                    <path d="M1 14C1 14 0 1 15 1c12.5 0 14.6 9 14.9 12 0.1 0.6 0 1.2-0.1 1.8C28.9 17.8 25.4 28 16 28 5 28 2 19 1 14z"/>
                                </svg>
								<?php echo pawfriends_mikado_icon_collections()->renderIcon( $network['class'], 'font_awesome' ); ?>
							</a>
						<?php } ?>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
<?php } ?>