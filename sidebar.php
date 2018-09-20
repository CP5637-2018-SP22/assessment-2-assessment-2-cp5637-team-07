<?php
/**
 * The Sidebar
 *
 * @subpackage groupseven
 * @since      groupseven 1.0
 */
?>
<aside class="groupseven-sidebar">
	<?php if ( is_active_sidebar( 'groupseven_right_sidebar' ) ) {
		dynamic_sidebar( 'groupseven_right_sidebar' );
	} else {
		$args = array(
			'before_widget' => '<aside class="widget wrap-widget">',
			'after_widget'  => '</aside>',
		);
		$instance = array();
		the_widget( 'WP_Widget_Recent_Posts', $instance, $args );
		the_widget( 'WP_Widget_Recent_Comments', $instance, $args );
		the_widget( 'WP_Widget_Archives', $instance, $args );
		the_widget( 'WP_Widget_Categories', $instance, $args );
	} ?>
	<div class="groupseven-clear"></div>
</aside> <!-- groupseven-sidebar -->
