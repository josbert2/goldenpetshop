<div class="mkdf-team-holder <?php echo esc_attr($holder_classes); ?>">
	<div class="mkdf-team-inner">
		<?php if ($team_image !== '') { ?>
			<div class="mkdf-team-image">
                <?php echo wp_get_attachment_image($team_image, 'full'); ?>
				<div class="mkdf-team-social-wrapper">
					<div class="mkdf-team-social-outer">
						<div class="mkdf-team-social-inner">
                            <?php if (!empty($team_social_icons)) { ?>
                                <div class="mkdf-team-social-holder">
                                    <div class="mkdf-team-social-opener">
                                        <i class="mkdf-icon-dripicons dripicon dripicons-rocket mkdf-icon-element social-holder"></i>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 51.3" class="mkdf-social">
                                            <path d="M44.3 26.7L44.3 26.7c-1-1.4-1.7-3-2.1-4.8 -0.4-1.7-0.6-3.4-0.4-5l0 0c0.6-6.8-3.5-13.1-9.9-14.7 -6.4-1.6-13 1.9-15.7 8.2l0 0c-0.7 1.5-1.6 3-2.8 4.2 -1.3 1.4-2.6 2.4-4.2 3.2l0 0c-3.5 1.8-6.4 5.2-7.5 9.5 -2 7.7 2.3 15.4 9.5 17.2 1.7 0.4 3.3 0.5 5 0.2l0 0c1.6-0.2 3.2-0.1 4.8 0.3 1.7 0.4 3.2 1.1 4.6 2.1l0 0c1.3 0.9 2.7 1.6 4.3 2 7.2 1.8 14.6-2.9 16.6-10.5C47.4 34.3 46.5 30 44.3 26.7z"/>
                                        </svg>
                                    </div>
                                <?php $i = 0; ?>
                                <?php foreach( $team_social_icons as $team_social_icon ) { ?>
                                    <div class="mkdf-team-icon-holder">
                                        <a href="<?php esc_attr_e($team_social_icon_links[$i][0])?>" target="<?php esc_attr_e($team_social_icon_links[$i][1])?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31 29" class="mkdf-social-icon">
                                                <path d="M1 14C1 14 0 1 15 1c12.5 0 14.6 9 14.9 12 0.1 0.6 0 1.2-0.1 1.8C28.9 17.8 25.4 28 16 28 5 28 2 19 1 14z"/>
                                            </svg>
                                            <?php echo wp_kses_post($team_social_icon); ?>
                                        </a>
                                    </div>
                                    <?php $i++ ?>
                                <?php } ?>
                            </div>
                            <?php } ?>
                            <?php if ($team_position !== "") { ?>
                                <div class="mkdf-team-position-holder">
                                    <div class="mkdf-team-position">
                                        <span class="mkdf-active-hover">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-left">
                                                <path d="M2 0C0.9 0 0 0.9 0 2l2 23.8c0 1.1 0.9 2 2 2h3.9V0H2z"/>
                                            </svg>
                                            <span class="mkdf-active-hover-middle"></span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-right">
                                                <path d="M5.9 0c1.1 0 2 0.9 2 2L5 25.8c-0.2 1.6-1.1 1.9-3 2H0V0H5.9"/>
                                            </svg>
                                        </span>
                                        <h6 class="mkdf-team-position-text"><?php echo esc_html($team_position); ?></h6>
                                    </div>
                                </div>
                            <?php } ?>
							<?php if ($team_name !== '') { ?>
                                <div class="mkdf-team-name-holder">
                                    <div class="mkdf-team-name">
                                        <span class="mkdf-active-hover">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-left">
                                                <path d="M2 0C0.9 0 0 0.9 0 2l2 23.8c0 1.1 0.9 2 2 2h3.9V0H2z"/>
                                            </svg>
                                            <span class="mkdf-active-hover-middle"></span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-right">
                                                <path d="M5.9 0c1.1 0 2 0.9 2 2L5 25.8c-0.2 1.6-1.1 1.9-3 2H0V0H5.9"/>
                                            </svg>
                                        </span>
                                        <<?php echo esc_attr($team_name_tag); ?> class="mkdf-team-name-text"><?php echo esc_html($team_name); ?></<?php echo esc_attr($team_name_tag); ?>>
                                    </div>
                                </div>
							<?php } ?>
                            <?php if ($team_link !== '') { ?>
                                <a class="mkdf-team-link" href="<?php echo esc_url($team_link) ?>" target="<?php echo esc_attr($team_target) ?>" ></a>
                            <?php } ?>
						</div>
					</div>
				</div>
			</div>

		<?php } ?>
	</div>
</div>