<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @subpackage groupseven
 * @since      groupseven 1.0
 */
get_header(); ?>
	<article class="groupseven-contents">
		<div id="content" class="site-content" role="main">
			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Not Found', 'groupseven' ); ?></h1>
			</header>
			<div class="page-wrapper">
				<div class="page-content">
					<h1><?php _e( 'Error 404', 'groupseven' ); ?></h1>
					<h2><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'groupseven' ); ?></h2>
					<p><?php _e( 'The page you are looking for is not found. Maybe try a search?', 'groupseven' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</div><!-- .page-wrapper -->
		</div><!-- #content -->
	</article><!-- .groupseven-contents -->
<?php get_sidebar();
get_footer();
