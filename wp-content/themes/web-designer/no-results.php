<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package Web Designer
 */
?>

<h2 class="entry-title"><?php esc_html_e( 'Nothing Found', 'web-designer' ); ?></h2>

<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
	<p><?php printf( esc_html__( 'Ready to publish your first post? Get started here.', 'web-designer' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
	<?php elseif ( is_search() ) : ?>
	<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'web-designer' ); ?></p><br />
		<?php get_search_form(); ?>
	<?php else : ?>
	<p><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'web-designer' ); ?></p><br />
	<div class="more-btn mt-4 mb-4">
		<a class="p-3" href="<?php echo esc_url(home_url() ); ?>"><?php esc_html_e( 'Go Back', 'web-designer' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Go Back', 'web-designer' ); ?></span></a>
	</div>
<?php endif; ?>