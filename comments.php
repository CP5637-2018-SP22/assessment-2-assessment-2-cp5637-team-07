<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @subpackage groupseven
 * @since      groupseven 1.0
 */
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
} ?>
<article id="comments" class="comments-area">
	<?php if ( have_comments() ) { ?>
		<h2 class="comments-title">
			<?php printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'groupseven' ), number_format_i18n( get_comments_number() ), get_the_title() ); ?>
		</h2>
		<ol class="comment-list">
			<?php wp_list_comments( array(
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 74,
			) ); ?>
		</ol><!-- .comment-list -->
		<?php // Are there comments to navigate through?
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
			<nav class="groupseven-link" role="navigation">
				<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'groupseven' ); ?></h1>
				<div class="groupseven-nav-previous"><?php previous_comments_link( __( 'Older Comments', 'groupseven' ) ); ?></div>
				<div class="groupseven-nav-next"><?php next_comments_link( __( 'Newer Comments', 'groupseven' ) ); ?></div>
				<div class="groupseven-clear"></div>
			</nav><!-- .comment-navigation -->
		<?php } // Check for comment navigation
		if ( ! comments_open() && get_comments_number() ) { ?>
			<p class="no-comments"><?php _e( 'Comments are closed.', 'groupseven' ); ?></p>
		<?php } //comments_open() && get_comments_number()
	} // have_comments()
	comment_form(); ?>
</article><!-- #comments -->