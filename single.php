<?php
/**
 * The Single
 *
 * @subpackage groupseven
 * @since      groupseven 1.0
 */
get_header(); ?>
	<section class="groupseven-contents">
		<?php if ( have_posts() ) {
			the_post(); ?>
			<section id="groupseven-post-<?php the_ID(); ?>" <?php post_class( 'groupseven-post' ); ?>>
				<header class="page-header">
					<h2 class="groupseven-title"><?php the_title(); ?></h2>
					<p class="groupseven-p-post-data">
						<span class="post-data"><?php _e( 'posted on', 'groupseven' ); ?> </span>
						<a href='<?php echo esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ); ?>'><?php echo get_the_date(); ?></a>
						<span class="post-data"> <?php _e( 'by', 'groupseven' ); ?> </span>
						<?php the_author_posts_link();
						if ( has_category() ) { ?>
							<span class="post-data"> <?php _e( 'in', 'groupseven' ); ?> </span>
							<?php the_category( ', ' );
						}
						edit_post_link( __( 'Edit', 'groupseven' ), '<span class="groupseven-edit-link">', '</span>' ); ?>
					</p>
				</header> <!-- .page-header -->
				<?php if ( has_post_thumbnail() ) { ?>
					<div class="groupseven-content-image">
						<?php the_post_thumbnail( 'groupseven_image_content_size' );
						do_action( 'groupseven_the_post_thumbnail_caption' ); ?>
					</div> <!-- content_image -->
				<?php } // has_post_thumbnail() ?>
				<article class="groupseven-content">
					<?php the_content();
					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages', 'groupseven' ) . ':' . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
					) ); ?>
					<footer class="groupseven-tags">
						<?php if ( has_tag() ) {
							the_tags( '', ', ', '' );
						} ?>
					</footer> <!-- .groupseven-tags -->
				</article> <!-- .groupseven-content -->
			</section> <!-- #groupseven-post -->
			<nav class="groupseven-link">
				<div class="groupseven-previous-posts-link">
					<?php previous_post_link( '%link', __( 'Older post', 'groupseven' ) ); ?>
				</div> <!-- .groupseven-previous-posts-link -->
				<div class="groupseven-next-posts-link">
					<?php next_post_link( '%link', __( 'Newer post', 'groupseven' ) ); ?>
				</div> <!-- .groupseven-next-posts-link -->
			</nav> <!-- .groupseven-link -->
			<div class="groupseven-clear"></div>
			<div class="comments">
				<?php comments_template(); ?>
			</div> <!-- .comments -->
		<?php } // if have_posts() ?>
	</section> <!-- .groupseven-contents -->
<?php get_sidebar();
get_footer();
