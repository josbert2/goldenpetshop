<?php
if ( post_password_required() ) {
	return;
}

if ( comments_open() || get_comments_number() ) { ?>
	<div class="mkdf-comment-holder clearfix" id="comments">
		<?php if ( have_comments() ) { ?>
			<div class="mkdf-comment-holder-inner">
				<h4 class="mkdf-comments-title"><?php esc_html_e( 'Comments', 'pawfriends' ); ?></h4>
				<div class="mkdf-comments">
					<ul class="mkdf-comment-list">
						<?php wp_list_comments( array_unique( array_merge( array( 'callback' => 'pawfriends_mikado_comment' ), apply_filters( 'pawfriends_mikado_filter_comments_callback', array() ) ) ) ); ?>
					</ul>
				</div>
			</div>
		<?php } ?>
		<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) { ?>
			<p><?php esc_html_e( 'Sorry, the comment form is closed at this time.', 'pawfriends' ); ?></p>
		<?php } ?>
	</div>
	<?php
		$mkdf_commenter = wp_get_current_commenter();
		$mkdf_req       = get_option( 'require_name_email' );
		$mkdf_aria_req  = ( $mkdf_req ? " aria-required='true'" : '' );
	    $mkdf_consent   = empty( $mkdf_commenter['comment_author_email'] ) ? '' : ' checked="checked"';
	    $mkdf_btn_paws_class = ( pawfriends_mikado_options()->getOptionValue( 'decorative_paw_background' ) === "yes" ? 'mkdf-btn-paws' : '' );
        $mkdf_btn_paws = '';
	    if ( $mkdf_btn_paws_class === 'mkdf-btn-paws' ) {
	        $mkdf_btn_paws = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 425 140" class="mkdf-paws"> ' .
                             '<path stroke="rgba(0,0,0,<?php echo esc_attr($paw_opacity) ?>)" d="m 73.8,96.3 c -0.2,0.4 -0.5,0.7 -0.9,0.8 -0.9,0.5 -2,0.5 -2.9,0.1 -0.9,-0.4 -1.4,-1.6 -0.6,-2.3 1,-0.9 5.5,-0.7 4.4,1.4 z m -1,-6.7 c -0.5,0.1 -1,0.3 -1.4,0.6 -0.4,0.3 -0.7,0.8 -0.7,1.3 0,0.6 0.5,1.2 1,1.5 0.6,0.3 1.2,0.3 1.8,0.1 1,-0.2 2.5,-1.1 1.9,-2.4 -0.4,-1.1 -1.6,-1.3 -2.6,-1.1 z m -3.7,-2.3 c -0.1,0.5 -0.1,1.2 0.4,1.4 0.1,0.1 0.3,0.1 0.5,0.1 0.7,0.1 1.5,0.1 2.1,-0.2 0.7,-0.3 1.2,-0.9 1.3,-1.6 0.2,-1.1 -0.9,-2 -2,-2 -1.1,0.1 -2.1,1.3 -2.3,2.3 z m -5.4,0.3 c 0.1,0.2 0.3,0.3 0.5,0.4 0.2,0.1 0.5,0 0.7,0 0.8,-0.2 1.4,-0.7 1.8,-1.4 0.1,-0.2 0.2,-0.4 0.3,-0.6 0.1,-0.2 0.1,-0.3 0.2,-0.5 0.2,-1.4 -1.5,-2.1 -2.5,-1.5 -1,0.7 -1.8,2.5 -1,3.6 z M 59,92.3 c -0.7,-1.1 0,-2.9 1.3,-3.2 0.3,-0.1 0.6,-0.1 0.9,-0.1 1.1,0 2.2,0 3.3,0 0.9,0 1.8,0 2.7,0.2 0.8,0.2 1.6,0.5 2,1.2 0.5,0.9 0.1,2.1 -0.3,3.1 -0.4,1 -0.8,1.9 -1.2,2.9 -0.4,0.9 -0.7,1.8 -1.5,2.3 -0.7,0.6 -1.9,0.7 -2.5,-0.1 C 63.2,97.9 63.4,97 63.3,96.1 62.9,93.7 60.2,94 59,92.3 Z" />
                             <path stroke="rgba(0,0,0,<?php echo esc_attr($paw_opacity) ?>)" d="M 92.7,98.6 C 92.3,99 92,99.5 92,100 c 0.1,2.1 3.2,1.3 4.2,0.5 1.2,-1 0.6,-2.6 -0.9,-2.8 -0.8,-0.2 -1.9,0.3 -2.6,0.9 z m 2.6,-6.3 c -0.7,0.2 -1.4,0.6 -1.8,1.3 -0.4,0.6 -0.4,1.5 0.2,2 0.5,0.4 1.2,0.5 1.8,0.5 0.8,0 1.7,-0.2 2.3,-0.7 0.6,-0.5 1,-1.5 0.6,-2.2 -0.7,-1.3 -1.8,-1.3 -3.1,-0.9 z m -3.4,-2.8 c -0.5,0.7 -0.6,1.6 -0.1,2.3 0.1,0.1 0.2,0.2 0.3,0.3 0.2,0.1 0.5,0.1 0.7,0.1 0.9,-0.1 1.8,-0.5 2.4,-1.1 0.4,-0.4 0.8,-0.8 0.9,-1.4 0.1,-0.5 -0.1,-1.2 -0.5,-1.5 -1.3,-0.7 -2.9,0.2 -3.7,1.3 z m -6.8,1.6 c -0.1,0.6 0,1.2 0.5,1.5 0.3,0.2 0.6,0.2 1,0.1 1.7,-0.2 4.6,-2.3 2.6,-4.1 -1.5,-1.4 -3.9,0.9 -4.1,2.5 z m -2,3.1 c 0.8,-0.2 1.7,-0.1 2.6,-0.2 1.1,-0.1 2.2,-0.4 3.2,-0.3 1.1,0.1 2.3,0.7 2.4,1.8 0.1,0.4 0,0.7 -0.1,1.1 -0.3,1.4 -0.5,2.7 -0.8,4.1 -0.3,1.5 -1.1,3 -2.9,2.7 -1.3,-0.2 -1.8,-1.9 -2.1,-3 -0.2,-0.7 -0.6,-1.5 -1.3,-1.6 -0.3,-0.1 -0.5,0 -0.8,-0.1 -2.3,-0.2 -2.6,-3.8 -0.2,-4.5 z" />
                             <path stroke="rgba(0,0,0,<?php echo esc_attr($paw_opacity) ?>)" d="m 108.3,73.3 c -0.2,0.4 -0.5,0.7 -0.8,0.9 -0.8,0.5 -2,0.7 -2.9,0.3 -0.9,-0.3 -1.5,-1.5 -0.8,-2.3 0.9,-1 5.4,-1.1 4.5,1.1 z m -1.6,-6.6 c -0.5,0.1 -0.9,0.4 -1.3,0.7 -0.4,0.3 -0.6,0.8 -0.6,1.3 0.1,0.6 0.6,1.2 1.1,1.4 0.6,0.2 1.2,0.2 1.8,0 1,-0.3 2.4,-1.3 1.7,-2.5 -0.4,-1.1 -1.7,-1.2 -2.7,-0.9 z m -3.8,-2 c -0.1,0.5 0,1.2 0.5,1.4 0.1,0.1 0.3,0.1 0.5,0.1 0.7,0.1 1.5,0 2.1,-0.4 0.6,-0.4 1.1,-1 1.1,-1.7 0.1,-1.1 -1,-2 -2.1,-1.8 -1.1,0.1 -2,1.4 -2.1,2.4 z m -5.3,0.8 c 0.2,0.2 0.4,0.3 0.6,0.4 0.2,0.1 0.5,0 0.7,-0.1 0.7,-0.3 1.4,-0.8 1.7,-1.6 0.1,-0.2 0.2,-0.4 0.2,-0.6 0.1,-0.2 0.1,-0.3 0.1,-0.5 0.1,-1.4 -1.7,-2 -2.7,-1.3 -1,0.8 -1.6,2.6 -0.6,3.7 z m -4.4,5.1 c -0.8,-1.1 -0.3,-2.9 1,-3.3 0.3,-0.1 0.6,-0.1 0.9,-0.1 1.1,-0.1 2.2,-0.2 3.3,-0.2 0.9,-0.1 1.8,-0.1 2.7,0 0.8,0.1 1.6,0.4 2.1,1.1 0.6,0.9 0.3,2.1 0,3.1 -0.3,1 -0.6,2 -0.9,3 -0.3,0.9 -0.6,1.8 -1.3,2.4 -0.7,0.6 -1.9,0.8 -2.5,0.1 -0.6,-0.6 -0.5,-1.6 -0.6,-2.5 -0.6,-2.6 -3.4,-2 -4.7,-3.6 z" />
                             <path stroke="rgba(0,0,0,<?php echo esc_attr($paw_opacity) ?>)" d="m 124.5,81.6 c -0.5,0.1 -1,0.4 -1.3,0.9 -0.8,1.9 2.3,2.6 3.6,2.3 1.5,-0.4 1.7,-2 0.5,-2.9 -0.8,-0.5 -2,-0.5 -2.8,-0.3 z m 5.1,-4.5 c -0.7,-0.1 -1.5,-0.1 -2.1,0.3 -0.6,0.4 -1,1.2 -0.8,1.9 0.2,0.6 0.8,1 1.4,1.2 0.7,0.3 1.6,0.6 2.4,0.4 0.8,-0.2 1.6,-0.9 1.5,-1.7 -0.2,-1.4 -1.1,-1.9 -2.4,-2.1 z m -1.9,-4 c -0.7,0.4 -1.3,1.2 -1.1,2 0,0.1 0.1,0.3 0.2,0.4 0.1,0.2 0.4,0.3 0.6,0.4 0.8,0.3 1.8,0.4 2.7,0.1 0.5,-0.1 1.1,-0.4 1.4,-0.8 0.3,-0.4 0.5,-1.1 0.2,-1.5 -0.9,-1.4 -2.8,-1.3 -4,-0.6 z M 121,71.4 c -0.3,0.5 -0.5,1.1 -0.2,1.6 0.2,0.3 0.5,0.5 0.8,0.6 1.6,0.6 5.2,0 4.2,-2.5 -0.8,-2 -3.9,-1 -4.8,0.3 z m -3.2,1.9 c 0.8,0.2 1.6,0.7 2.4,1 1,0.4 2.1,0.6 3,1.1 0.9,0.5 1.7,1.7 1.4,2.7 -0.1,0.4 -0.3,0.7 -0.6,1 -0.8,1.1 -1.7,2.2 -2.5,3.3 -0.9,1.2 -2.4,2.2 -3.8,1.1 -1.1,-0.8 -0.8,-2.5 -0.6,-3.6 0.1,-0.7 0.1,-1.6 -0.4,-2 -0.2,-0.2 -0.5,-0.3 -0.7,-0.4 -2,-1.3 -0.6,-4.7 1.8,-4.2 z" />
                             <path stroke="rgba(0,0,0,<?php echo esc_attr($paw_opacity) ?>)" d="m 149.6,65.9 c -0.3,0.3 -0.7,0.4 -1.1,0.5 -1,0.1 -2.1,-0.3 -2.7,-1 -0.6,-0.7 -0.7,-2 0.3,-2.4 1.2,-0.5 5.3,1.3 3.5,2.9 z m 1.6,-6.6 c -0.5,-0.1 -1,-0.1 -1.5,0 -0.5,0.1 -0.9,0.5 -1.1,0.9 -0.2,0.6 0,1.3 0.4,1.7 0.4,0.5 1,0.7 1.7,0.8 1,0.2 2.7,-0.1 2.7,-1.5 -0.1,-1 -1.2,-1.7 -2.2,-1.9 z m -2.6,-3.5 c -0.3,0.4 -0.5,1.1 -0.2,1.5 0.1,0.1 0.2,0.2 0.4,0.3 0.6,0.4 1.3,0.6 2.1,0.6 0.8,0 1.4,-0.4 1.8,-1 0.6,-1 -0.1,-2.2 -1.1,-2.6 -1.1,-0.4 -2.4,0.4 -3,1.2 z m -5.1,-1.7 c 0.1,0.2 0.2,0.4 0.4,0.6 0.2,0.2 0.4,0.2 0.7,0.3 0.8,0.1 1.6,-0.1 2.2,-0.6 0.2,-0.1 0.3,-0.3 0.5,-0.4 0.1,-0.1 0.2,-0.2 0.3,-0.4 0.7,-1.2 -0.6,-2.5 -1.8,-2.3 -1.3,0.1 -2.7,1.4 -2.3,2.8 z m -6.1,2.6 c -0.3,-1.3 1,-2.7 2.4,-2.5 0.3,0.1 0.6,0.2 0.9,0.3 1,0.4 2,0.8 3,1.2 0.8,0.3 1.7,0.7 2.4,1.2 0.7,0.4 1.3,1.1 1.4,1.9 0.1,1.1 -0.7,2 -1.4,2.8 -0.7,0.7 -1.4,1.5 -2.1,2.2 -0.6,0.7 -1.3,1.4 -2.2,1.6 -0.9,0.3 -2,-0.1 -2.3,-1 -0.2,-0.8 0.3,-1.6 0.5,-2.5 0.5,-2.4 -2.2,-3.1 -2.6,-5.2 z" />' .
                             '</svg>';
        }
		
		$mkdf_args = array(
			'id_form'              => 'commentform',
			'id_submit'            => 'submit_comment',
			'title_reply'          => esc_html__( 'Post a Comment', 'pawfriends' ),
			'title_reply_before'   => '<h4 id="reply-title" class="comment-reply-title">',
			'title_reply_after'    => '</h4>',
			'title_reply_to'       => esc_html__( 'Post a Reply to %s', 'pawfriends' ),
			'cancel_reply_link'    => esc_html__( 'cancel reply', 'pawfriends' ),
			'label_submit'         => esc_html__( 'Post Comment', 'pawfriends' ),
			'comment_field'        => apply_filters( 'pawfriends_mikado_filter_comment_form_textarea_field', '<textarea id="comment" placeholder="' . esc_attr__( 'Your comment', 'pawfriends' ) . '" name="comment" cols="45" rows="3" aria-required="true"></textarea>' ),
			'comment_notes_before' => '',
			'comment_notes_after'  => '',
			'fields'               => apply_filters( 'pawfriends_mikado_filter_comment_form_default_fields', array(
				'author' => '<input id="author" name="author" placeholder="' . esc_attr__( 'Your Name', 'pawfriends' ) . '" type="text" value="' . esc_attr( $mkdf_commenter['comment_author'] ) . '" ' . $mkdf_aria_req . ' />',
				'email'  => '<input id="email" name="email" placeholder="' . esc_attr__( 'Your Email', 'pawfriends' ) . '" type="text" value="' . esc_attr( $mkdf_commenter['comment_author_email'] ) . '" ' . $mkdf_aria_req . ' />',
				'cookies' => '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" ' . $mkdf_consent . ' />' .
					'<label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'pawfriends' ) . '</label></p>',
			) ),
            'submit_button'         => '<button name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s"><span class="mkdf-btn-text">%4$s</span>' . $mkdf_btn_paws . '</button>',
            'class_submit'          => "mkdf-btn mkdf-btn-large mkdf-btn-solid $mkdf_btn_paws_class"
		);

	$mkdf_args = apply_filters( 'pawfriends_mikado_filter_comment_form_final_fields', $mkdf_args );
		
	if ( get_comment_pages_count() > 1 ) { ?>
		<div class="mkdf-comment-pager">
			<p><?php paginate_comments_links(); ?></p>
		</div>
	<?php } ?>

    <?php
    $mkdf_show_comment_form = apply_filters('pawfriends_mikado_filter_show_comment_form_filter', true);
    if($mkdf_show_comment_form) {
    ?>
        <div class="mkdf-comment-form">
            <?php comment_form( $mkdf_args ); ?>
        </div>
    <?php } ?>
<?php } ?>	