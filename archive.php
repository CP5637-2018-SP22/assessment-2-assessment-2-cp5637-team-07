<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Fourteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 *
 * @subpackage groupseven
 * @since      groupseven 1.0
 */
get_header(); ?>
	<section class="groupseven-contents">
		<?php if ( have_posts() ) {
			while ( have_posts() ) {
				the_post(); ?>
				<section id="groupseven-post-<?php the_ID(); ?>" <?php post_class( 'groupseven-post' ); ?>>
					<header class="page-header">
						<h2 class="groupseven-title">
							<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute( array( 'before' => __( 'Permalink to ', 'groupseven' ), 'after' => '' ) ); ?>"><?php the_title(); ?></a>
						</h2>
						<p class="groupseven-p-post-data">
							<span class="post-data"><?php _e( 'posted on', 'groupseven' ); ?> </span>
							<a href="<?php the_permalink(); ?>">
								<?php echo get_the_date(); ?>
							</a>
							<span class="post-data"> <?php _e( 'by', 'groupseven' ); ?> </span>
							<?php the_author_posts_link();
							if ( has_category() ) { ?>
								<span class="post-data"> <?php _e( 'in', 'groupseven' ); ?> </span>
								<?php the_category( ', ' );
							}
							edit_post_link( __( 'Edit', 'groupseven' ), '<span class="groupseven-edit-link">', '</span>' ); ?>
						</p>
					</header><!-- .page-header -->
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
			<?php } // while have_posts() ?>
			<nav class="groupseven-link">
				<div class="groupseven-previous-posts-link">
					<?php next_posts_link( __( 'Previous posts', 'groupseven' ) . ' ' ); ?>
				</div> <!-- groupseven-previous-posts-link -->
				<div class="groupseven-next-posts-link">
					<?php previous_posts_link( ' ' . __( 'Next posts', 'groupseven' ) ); ?>
				</div> <!-- groupseven-next-posts-link -->
			</nav> <!-- .groupseven-link -->
			<div class="groupseven-clear"></div>
		<?php } else { ?>
			<p><?php _e( 'The page you are looking for is not found. Maybe try a search?', 'groupseven' ); ?></p>
			<?php get_search_form(); ?>
			<div class="groupseven-clear"></div>
		<?php } // if have_posts() ?>
	</section> <!-- .groupseven-contents -->
<?php get_sidebar();
get_footer();
