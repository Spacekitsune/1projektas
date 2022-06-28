<?php
/**
 * @package Web Designer
 * Setup the WordPress core custom header feature.
 *
 * @uses web_designer_header_style()
*/
function web_designer_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'web_designer_custom_header_args', array(
		'header-text' 			 =>	false,
		'width'                  => 1000,
		'height'                 => 80,
		'flex-width'    		 => true,
		'flex-height'    		 => true,
		'wp-head-callback'       => 'web_designer_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'web_designer_custom_header_setup' );

if ( ! function_exists( 'web_designer_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see web_designer_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'web_designer_header_style' );

function web_designer_header_style() {
	if ( get_header_image() ) :
	$custom_css = "
        .main-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		    background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'web-designer-basic-style', $custom_css );
	endif;
}
endif;