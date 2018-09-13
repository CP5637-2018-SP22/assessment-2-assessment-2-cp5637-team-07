<?php /**
 * The template for displaying image attachments
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
							<span class="post-data"> <?php echo __( 'Size', 'groupseven' ) . ':' ?> </span>
							<a href="<?php echo esc_url( wp_get_attachment_url() ); ?>" target="_blank">
								<?php $metadata = wp_get_attachment_metadata();
								echo $metadata['width'] . ' &times;' . $metadata['height']; ?>
							</a>
							<span class="post-data"> <?php _e( 'in', 'groupseven' ); ?> </span>
							<a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>" title="<?php _e( 'Return to', 'groupseven' );
							echo ' ' . esc_attr( strip_tags( get_the_title( $post->post_parent ) ) ); ?>">
								<?php echo get_the_title( $post->post_parent ) . '. '; ?>
							</a>
							<?php edit_post_link( __( 'Edit', 'groupseven' ) ); ?>
						</p>
					</header><!-- .page-header -->
					<div class="entry">
						<article class="entry-attachment">
							<div class="attachment">
								<?php $attachments = array_values( get_children( array(
									'post_parent'    => $post->post_parent,
									'post_status'    => 'inherit',
									'post_type'      => 'attachment',
									'post_mime_type' => 'image',
									'order'          => 'ASC',
									'orderby'        => 'menu_order ID',
								) ) );
								foreach ( $attachments as $k => $attachment ) {
									if ( $attachment->ID == $post->ID ) {
										break;
									}
								}
								$k ++;
								if ( count( $attachments ) > 1 ) {
									if ( isset( $attachments[ $k ] ) ) {
										// get the URL of the next image attachment
										$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
									} else {
										// or get the URL of the first image attachment
										$next_attachment_url = get_attachment_link( $attachments[0]->ID );
									}
								} else {
									// or, if there's only 1 image, get the URL of the image
									$next_attachment_url = wp_get_attachment_url();
								} ?>
								<a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment">
									<?php $attachment_size = apply_filters( 'groupseven_attachment_size', array( 654, 99999 ) );
									echo wp_get_attachment_image( $post->ID, $attachment_size ); ?>
								</a>
								<?php if ( ! empty( $post->post_excerpt ) ) { ?>
									<div class="wp-caption-text">
										<?php the_excerpt(); ?>
									</div>
								<?php } ?>
							</div><!-- .attachment -->
						</article><!-- .entry-attachment -->
						<article class="entry-description">
							<?php the_content();
							wp_link_pages( array(
									'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages', 'groupseven' ) . ':' . '</span>',
									'after'       => '</div>',
									'link_before' => '<span>',
									'link_after'  => '</span>',
							) ); ?>
							<div class="groupseven-clear"></div>
							<?php wp_link_pages(); ?>
							<footer class="groupseven-tags">
								<?php if ( has_tag() ) {
									the_tags( '', ',&nbsp;', '' );
								} ?>
							</footer> <!-- .groupseven-tags -->
						</article><!-- .entry-description -->
					</div>  <!-- .entry -->
					<nav class="groupseven-link">
						<div class="groupseven-image-nav-prev alignleft"><?php previous_image_link( false, '&nbsp;' . __( 'Previous', 'groupseven' ) ); ?></div>
						<div class="groupseven-image-nav-next alignright"><?php next_image_link( false, __( 'Next', 'groupseven' ) . '&nbsp;' ); ?></div>
						<div class="groupseven-clear"></div>
					</nav><!-- .groupseven-link -->
				</section><!-- #groupseven-post -->
			<?php } // while have_posts()
		} // if have_posts()
		comments_template(); ?>
	</section><!-- .groupseven-contents -->
<?php get_sidebar();
get_footer();
