<?php
/**
 * The Footer Sidebar
 *
 * @subpackage groupseven
 * @since groupseven 1.0
 */
if ( is_active_sidebar( 'groupseven_footer_sidebar' ) ) { ?>
	<aside id="groupseven_footer_sidebar">
		<div class="groupseven-footer-sidebar-content">
			<?php dynamic_sidebar( 'groupseven_footer_sidebar' ); ?>
			<div class="groupseven-clear"></div>
		</div> <!-- groupseven-footer-sidebar-content -->
	</aside> <!-- footer_sidebar -->
<?php }
