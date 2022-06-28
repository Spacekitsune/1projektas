<?php
/**
 * The template for displaying search forms in web-designer
 *
 * @package Web Designer
 */
?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_attr_x( 'Search for:', 'label', 'web-designer' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'SEARCH', 'placeholder','web-designer' ); ?>" value="<?php echo esc_attr( get_search_query()); ?>" name="s">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'SEARCH', 'submit button','web-designer' ); ?>">
</form>