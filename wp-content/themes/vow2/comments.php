<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to vow_comment() which is
 * located in the functions.php file.
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div class="blog-container-comment"> <!-- blog container comments -->
	

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h3>
			<?php
				printf( _n( 'One comment', '%1$s comments', get_comments_number(), 'vow' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h3>
		<div class="row spacer10"></div>
		
		<?php wp_list_comments( array( 'callback' => 'vow_comment', 'style' => 'div' ) ); ?>
			
			

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'vow' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'vow' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'vow' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'vow' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php 
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " " : '' );
	$args = array(
	'id_form' => 'form-main',
	'id_submit' => 'submit',
	'title_reply' => __( 'Leave a Reply', 'vow' ),
	'title_reply_to' => __( 'Leave a Reply to %s', 'vow' ),
	'cancel_reply_link' => __( 'Cancel Reply', 'vow' ),
	'label_submit' => __( 'Post Comment', 'vow' ),
	'comment_field' => '<textarea id="comment" name="comment" class="form-control" placeholder="Message *"></textarea>',
	'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'vow' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
	'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'vow' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
	'comment_notes_before' => '',
	'comment_notes_after' => '',
	'fields' => apply_filters( 'comment_form_default_fields', array(
		'author' => '<input id="author" class="form-control" name="author" type="text" value="' .
                esc_attr( $commenter['comment_author'] ) . '" size="30" tabindex="1" placeholder="Name *"' . $aria_req . ' />',
		'email' => '<input id="email" class="form-control" name="email" type="text" placeholder="E-mail *" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" tabindex="2"' . $aria_req . ' />',
		'url' => '' ) ) );
	?>
</div> <!-- blog container comments -->
	<?php comment_form($args); ?>
	<div class="space80"></div>
