<?php
/**
 *  Web Designer: Block Patterns
 *
 * @package  Web Designer
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'web-designer',
		array( 'label' => __( 'Web Designer', 'web-designer' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'web-designer/banner-section',
		array(
			'title'      => __( 'Banner Section', 'web-designer' ),
			'categories' => array( 'web-designer' ),
			'content'    => "<!-- wp:columns {\"className\":\"banner-section  \"} -->\n<div class=\"wp-block-columns banner-section\"><!-- wp:column {\"width\":\"33.33%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:33.33%\"><!-- wp:image {\"id\":1503,\"width\":464,\"height\":458,\"sizeSlug\":\"full\",\"linkDestination\":\"none\",\"className\":\"banner-section1 \"} -->\n<figure class=\"wp-block-image size-full is-resized banner-section1\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner-circle.png\" alt=\"\" class=\"wp-image-1503\" width=\"464\" height=\"458\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"66.66%\",\"className\":\"banner-section2    ps-lg-5 mx-lg-5 \"} -->\n<div class=\"wp-block-column banner-section2  ps-lg-5 mx-lg-5\" style=\"flex-basis:66.66%\"><!-- wp:heading {\"level\":1,\"style\":{\"color\":{\"text\":\"#ff4f6e\"}}} -->\n<h1 class=\"has-text-color\" style=\"color:#ff4f6e\">Let’s Start Something  Big Together</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#acacac\"},\"typography\":{\"fontSize\":\"15px\"}}} -->\n<p class=\"has-text-color\" style=\"color:#acacac;font-size:15px\">Loream ipsum&nbsp;is simply dummy text of the printing and . Lorem Ipsum has been the industry's standard dummy text</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:columns {\"className\":\"ratings-section\"} -->\n<div class=\"wp-block-columns ratings-section\"><!-- wp:column {\"className\":\"number-section1\"} -->\n<div class=\"wp-block-column number-section1\"><!-- wp:paragraph -->\n<p><strong>1500+</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#acacac\"},\"typography\":{\"fontSize\":\"15px\"}}} -->\n<p class=\"has-text-color\" style=\"color:#acacac;font-size:15px\">Completed Projects</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"number-section2  \"} -->\n<div class=\"wp-block-column number-section2\"><!-- wp:paragraph -->\n<p><strong>6+</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#acacac\"},\"typography\":{\"fontSize\":\"15px\"}}} -->\n<p class=\"has-text-color\" style=\"color:#acacac;font-size:15px\">Experts Team</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"number-section3 \"} -->\n<div class=\"wp-block-column number-section3\"><!-- wp:paragraph -->\n<p><strong>12K</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#acacac\"},\"typography\":{\"fontSize\":\"15px\"}}} -->\n<p class=\"has-text-color\" style=\"color:#acacac;font-size:15px\">Global Customers</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:buttons {\"className\":\"button1\",\"layout\":{\"type\":\"flex\",\"justifyContent\":\"space-between\",\"orientation\":\"horizontal\"}} -->\n<div class=\"wp-block-buttons button1\"><!-- wp:button {\"textColor\":\"white\",\"style\":{\"color\":{\"background\":\"#ff4f6e\"}},\"fontSize\":\"small\"} -->\n<div class=\"wp-block-button has-custom-font-size has-small-font-size\"><a class=\"wp-block-button__link has-white-color has-text-color has-background\" style=\"background-color:#ff4f6e\">Get In Touch</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
		)
	);

	register_block_pattern(
		'web-designer/services-section',
		array(
			'title'      => __( 'Services Section', 'web-designer' ),
			'categories' => array( 'web-designer' ),
			'content'    => "<!-- wp:columns {\"className\":\"service-section\"} -->\n<div class=\"wp-block-columns service-section\"><!-- wp:column {\"className\":\"service-section1\"} -->\n<div class=\"wp-block-column service-section1\"><!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#ff4f6e\"}}} -->\n<p class=\"has-text-color\" style=\"color:#ff4f6e\"><strong>Services</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading -->\n<h2>We Provided Wide Range Of Digital Services</h2>\n<!-- /wp:heading --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"service-section2 text-center\"} -->\n<div class=\"wp-block-column service-section2 text-center\"><!-- wp:image {\"align\":\"center\",\"id\":1562,\"width\":57,\"height\":57,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter size-full is-resized\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/icon1.png\" alt=\"\" class=\"wp-image-1562\" width=\"57\" height=\"57\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"level\":3,\"fontSize\":\"medium\"} -->\n<h3 class=\"has-medium-font-size\">UI/UX Designing</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>simply dummy text of the printing and typesetting industry.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\",\"className\":\"service-section3  text-center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center service-section3  text-center\"><!-- wp:image {\"align\":\"center\",\"id\":1572,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter size-full\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/icon2.png\" alt=\"\" class=\"wp-image-1572\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"fontSize\":\"medium\"} -->\n<h3 class=\"has-text-align-center has-medium-font-size\">Web Designing</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>simply dummy text of the printing and typesetting industry.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"service-section4  text-center\"} -->\n<div class=\"wp-block-column service-section4  text-center\"><!-- wp:image {\"align\":\"center\",\"id\":1573,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter size-full\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/icon3.png\" alt=\"\" class=\"wp-image-1573\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"level\":3,\"fontSize\":\"medium\"} -->\n<h3 class=\"has-medium-font-size\">Digital Designing</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>simply dummy text of the printing and typesetting industry.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
		)
	);
}