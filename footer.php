<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @subpackage groupseven
 * @since      groupseven 1.0
 */
?>
<div class="groupseven-clear"></div><!-- clear -->
</div> <!-- home -->
<div id="groupseven_footer">
	<?php get_sidebar( 'footer' ); ?>
	<div class="groupseven-footer-logo">
		<div class="groupseven-footer-logo-content">
			<div class="groupseven-footer-logo-content-home">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
			</div> <!-- groupseven-footer-logo-content-home -->
			<footer class="groupseven-footer-logo-content-by">
				<p><?php echo __( 'Designed with love by', 'groupseven' ) . '&nbsp;'; ?>
					<a href="<?php echo esc_url( wp_get_theme()->get( 'AuthorURI' ) ); ?>" target="_blank">groupseven</a> <?php _e( 'and', 'groupseven' ); ?>
					<a href="<?php echo esc_url( 'http://wordpress.org/' ); ?>" target="_blank">WordPress</a>&nbsp;&copy;&nbsp;<?php echo date_i18n( 'Y' ) . '&nbsp;' . get_bloginfo( 'name' ); ?>
				</p>
			</footer> <!-- groupseven-footer-logo-content-by -->
		</div> <!-- groupseven-footer-logo_content -->
		<div class="groupseven-clear"></div>
	</div>
   <!-- groupseven-footer-logo -->
</div> 
<!-- #groupseven_footer -->
</div>
 <!-- wrapper -->
<?php wp_footer(); ?>
</body>
</html>

