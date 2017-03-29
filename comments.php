<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package highriser
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
    <div id="comments" class="comments-area">
		<h2 class="comments-title">
			<?php
				$comments_number = get_comments_number();
				if ( '1' === $comments_number ) {
					/* translators: %s: post title */
					printf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'highriser' ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s thought on &ldquo;%2$s&rdquo;',
							'%1$s thoughts on &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							'highriser'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
//                    'callback'   => 'halcyon_theme_comment',
                    'avatar_size'=> 85,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'highriser' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'highriser' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'highriser' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.
        ?>
    </div><!-- #comments -->
	<?php
    endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'highriser' ); ?></p>
	<?php
	endif;

	?>



<div class="comment-form">
    <div class="comments-area form">
    <?php 
    
    //https://codex.wordpress.org/Function_Reference/comment_form
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    
    $fields =  array(
        'author' =>
            '<p class="comment-form-author"><input id="author" name="author" type="text" placeholder="Name*" value="' . esc_attr( $commenter['comment_author'] ) .
            '" size="30"' . $aria_req . ' /></p>',
        'email' =>
            '<p class="comment-form-email"><input id="email" name="email" type="text" placeholder="Email*" value="' . esc_attr(  $commenter['comment_author_email'] ) .
            '" size="30"' . $aria_req . ' /></p>',
        'url' =>
            '<p class="comment-form-url"><input id="url" name="url" type="text" placeholder="Website" value="' . esc_attr( $commenter['comment_author_url'] ) .
            '" size="30" /></p>',
    );
        
    $comment_arg = array(
        'id_form'           => 'commentform',
        'id_submit'         => 'submit',
        'class_submit'      => 'submit',
        'name_submit'       => 'submit',
        'title_reply'       => esc_html__( 'Send a Comment', 'highriser' ),
        'title_reply_to'    => esc_html__( 'Send a Comment to %s', 'highriser' ),
        'cancel_reply_link' => esc_html__( 'Cancel Reply', 'highriser' ),
        'label_submit'      => esc_html__( 'Post Comment', 'highriser' ),
        'format'            => 'xhtml',

        'comment_field' =>  '<p class="comment-form-comment"><textarea id="comment" name="comment" placeholder="Comment" cols="45" rows="8" aria-required="true">' .
            '</textarea></p>',

        'must_log_in' => '<p class="must-log-in">' .
        sprintf(
        __( 'You must be <a href="%s">logged in</a> to post a comment.', 'highriser' ),
        wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
        ) . '</p>',

        'logged_in_as' => '<p class="logged-in-as">' .
        sprintf(
        __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'highriser' ),
        admin_url( 'profile.php' ),
        $user_identity,
        wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
        ) . '</p>',            
        
        'comment_notes_before' => __( '<p class="comment-notes"><span>Your email address will not be published.</span></p>', 'highriser' ),
        'comment_notes_after' => '',

        'fields' => apply_filters( 'comment_form_default_fields', $fields ),
    );
    
    comment_form( $comment_arg );?>
    </div>
</div>