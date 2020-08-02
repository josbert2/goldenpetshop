<div class="mkdf-testimonials-holder clearfix <?php echo esc_attr($holder_classes); ?>">
    <div class="mkdf-testimonials mkdf-owl-slider" <?php echo pawfriends_mikado_get_inline_attrs( $data_attr ) ?>>

        <?php if ( $query_results->have_posts() ):
            while ( $query_results->have_posts() ) : $query_results->the_post();
                $title    = get_post_meta( get_the_ID(), 'mkdf_testimonial_title', true );
                $text     = get_post_meta( get_the_ID(), 'mkdf_testimonial_text', true );
                $author   = get_post_meta( get_the_ID(), 'mkdf_testimonial_author', true );
                $position = get_post_meta( get_the_ID(), 'mkdf_testimonial_author_position', true );

                $current_id = get_the_ID();
                ?>

                <div class="mkdf-testimonial-content mkdf-testimonials<?php echo esc_attr($current_id) ?>">
                    <div class="mkdf-testimonial-content-inner">
                        <div class="mkdf-testimonial-carousel-author">
                            <?php if ( $author_image == 'yes' && has_post_thumbnail() ) { ?>
                                <div class="mkdf-testimonial-image">
                                    <?php echo get_the_post_thumbnail( get_the_ID() ); ?>
                                </div>
                            <?php } ?>
                            <?php if ( ! empty( $author ) ) { ?>
                            <div class="mkdf-testimonial-author-holder">
                                    <div class="mkdf-testimonial-author">
                                        <span class="mkdf-active-hover">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-left">
                                                <path d="M2 0C0.9 0 0 0.9 0 2l2 23.8c0 1.1 0.9 2 2 2h3.9V0H2z"/>
                                            </svg>
                                            <span class="mkdf-active-hover-middle"></span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-right">
                                               <path d="M5.9 0c1.1 0 2 0.9 2 2L5 25.8c-0.2 1.6-1.1 1.9-3 2H0V0H5.9"/>
                                            </svg>
                                         </span>
                                        <h5 class="mkdf-testimonials-author-name"><?php echo esc_html( $author ); ?></h5>
                                    </div>
                                    <?php if ( $author_position == 'yes' && (! empty( $position ) ) ) { ?>
                                        <h6 class="mkdf-testimonials-author-job"><?php echo esc_html( $position ); ?></h6>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="mkdf-testimonial-text-holder">
                            <div class="mkdf-testimonial-text-inner">
                                <?php if ( ! empty( $text ) ) { ?>
                                    <span class="mkdf-active-hover">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-left">
                                            <path d="M2 0C0.9 0 0 0.9 0 2l2 23.8c0 1.1 0.9 2 2 2h3.9V0H2z"/>
                                        </svg>
                                        <span class="mkdf-active-hover-middle"></span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-right">
                                           <path d="M5.9 0c1.1 0 2 0.9 2 2L5 25.8c-0.2 1.6-1.1 1.9-3 2H0V0H5.9"/>
                                        </svg>
                                    </span>
                                    <p class="mkdf-testimonial-text"><?php echo esc_html( $text ); ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            endwhile;
        else:
            echo esc_html__( 'Sorry, no posts matched your criteria.', 'pawfriends-core' );
        endif;

        wp_reset_postdata();
        ?>

    </div>
</div>