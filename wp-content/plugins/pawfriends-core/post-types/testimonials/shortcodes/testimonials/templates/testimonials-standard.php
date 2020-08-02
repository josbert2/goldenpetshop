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

            <div class="mkdf-testimonial-content" id="mkdf-testimonials-<?php echo esc_attr( $current_id ) ?>">
                <div class="mkdf-testimonial-text-holder">
                    <?php if ( ! empty( $title ) ) { ?>
                    <div class="mkdf-testimonial-title-holder">
                        <h2 itemprop="name" class="mkdf-testimonial-title entry-title"><?php echo esc_html( $title ); ?></h2>
                        <?php if ( $decorative_shape == 'yes' ) { ?>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 49 58" class="mkdf-fireworks">
                                <path class="st0" d="M23.5 1.4c-0.1-0.5-0.8-0.6-0.9 0 -0.1 2.3 0.3 4.5 0.2 6.8 -0.1 2.4-0.6 4.6-0.3 7 0.1 0.6 1 0.8 1.1 0.1 0.4-2.2 0.8-4.4 0.8-6.6C24.5 6.2 23.8 3.8 23.5 1.4z"/><path class="st0" d="M22.8 49.3c-0.2-2.3-0.1-4.6-0.5-6.8 -0.1-0.3-0.5-0.3-0.6 0 -0.9 4.4-0.8 9.7 0.2 14 0.1 0.6 1.2 0.7 1.3 0C23.6 54.1 22.9 51.7 22.8 49.3z"/><path class="st0" d="M47.7 27.2c-4.1-0.7-7.8 0.3-11.8 0.3 -2.1 0-4.7-0.6-6.3 1.1 -0.4 0.4 0.1 1 0.5 0.7 2-1.3 5.6 0 7.9-0.2 3.2-0.3 6.5-0.3 9.7-0.8C48.2 28.1 48.2 27.3 47.7 27.2z"/><path class="st0" d="M14.5 29.6c-1.4-1.2-3.1-1.2-4.8-1.1 -2.6 0.2-5.4 0.6-8 0 -0.4-0.1-0.7 0.5-0.3 0.7 3.6 2.2 8.5 0.5 12.5 1.4C14.4 30.8 15 30 14.5 29.6z"/><path class="st0" d="M33.4 11.2c-1.5 0.7-2.2 2.5-3.2 3.7 -1.2 1.4-2.1 2.9-3 4.5 -0.3 0.6 0.3 1.1 0.8 0.8 1.7-0.7 2.3-2.7 3.5-4 1.1-1.3 1.7-2.8 2.7-4.1C34.6 11.7 33.9 11 33.4 11.2z"/><path class="st0" d="M15.6 22.1c-1.1-1.3-2.3-2.1-3.1-3.6 -1-1.7-1.8-3.4-3.2-4.9 -0.5-0.5-1.3 0.1-1 0.7 1.1 2 1.9 4.3 3.2 6.2 0.8 1.1 2.1 3.2 3.8 2.8C15.9 23.1 16 22.5 15.6 22.1z"/><path class="st0" d="M15.5 35.8C15.5 35.8 15.5 35.8 15.5 35.8c-0.1-0.2-0.3-0.4-0.6-0.2 -1.7 1.1-2.1 3.8-3.3 5.4 -1.1 1.6-2.4 2.9-2.3 5 0 0.5 0.8 0.8 1.1 0.3 0.9-1.8 2.3-3.3 3.4-5.1C14.7 39.7 15.9 37.6 15.5 35.8z"/><path class="st0" d="M39 43.2c-1.7-1.3-3.4-2.4-5.3-3.3 -1-0.5-1.8-1.2-2.8-1.6 -1.2-0.5-2.4-0.6-3.6-1.1 -0.4-0.2-0.8 0.3-0.5 0.6 0.7 0.8 1.4 1.1 2.3 1.5 1.3 0.6 2.4 1.5 3.6 2.3 1.1 0.6 2.1 1.1 3.1 1.8 0.9 0.6 1.5 1.1 2.6 1.2C39.1 44.6 39.5 43.6 39 43.2z"/>
                            </svg>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <?php if ( ! empty( $text ) ) { ?>
                        <p class="mkdf-testimonial-text"><?php echo esc_html( $text ); ?></p>
                    <?php } ?>
                    <?php if ( ! empty( $author ) ) { ?>
                        <h4 class="mkdf-testimonial-author">
                            <span class="mkdf-active-hover">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-left">
                                    <path d="M2 0C0.9 0 0 0.9 0 2l2 23.8c0 1.1 0.9 2 2 2h3.9V0H2z"/>
                                </svg>
                                <span class="mkdf-active-hover-middle"></span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-right">
                                   <path d="M5.9 0c1.1 0 2 0.9 2 2L5 25.8c-0.2 1.6-1.1 1.9-3 2H0V0H5.9"/>
                                </svg>
                             </span>
                            <span class="mkdf-testimonials-author-name"><?php echo esc_html( $author ); ?></span>
                        </h4>
                    <?php } ?>
                    <?php if ( $author_position == 'yes' && (! empty( $position ) ) ) { ?>
                        <h4 class="mkdf-testimonial-author-job"><?php echo esc_html( $position ); ?></h4>
                    <?php } ?>
                </div>
                <?php if ( $author_image == 'yes' && has_post_thumbnail() ) { ?>
                    <div class="mkdf-testimonial-image">
                        <?php echo get_the_post_thumbnail( get_the_ID(), array( 66, 66 ) ); ?>
                    </div>
                <?php } ?>
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