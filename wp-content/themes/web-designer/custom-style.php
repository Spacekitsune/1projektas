<?php

	$web_designer_custom_css= "";

	/*----------------------First highlight color-------------------*/

	$web_designer_first_color = get_theme_mod('web_designer_first_color');

	if($web_designer_first_color != false){
		$web_designer_custom_css .='#slider .carousel-control-next i:hover, #slider .carousel-control-prev i:hover, #slider .read-btn a, .view-all-btn a,.more-btn a,#comments input[type="submit"],#comments a.comment-reply-link,input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,nav.woocommerce-MyAccount-navigation ul li,.pro-button a, .woocommerce a.added_to_cart.wc-forward, #service-section .service-box:hover, #service-section .owl-nav button:hover i, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, #sidebar h3, .woocommerce span.onsale{';
			$web_designer_custom_css .='background-color: '.esc_attr($web_designer_first_color).';';
		$web_designer_custom_css .='}';
	}

	if($web_designer_first_color != false){
		$web_designer_custom_css .='a, p.site-title a, .logo h1 a, p.site-description, .main-navigation ul li a:hover, #slider .inner_carousel h1 a, #service-section strong, .copyright a:hover, .post-main-box:hover h2 a, #footer .textwidget a,#footer li a:hover,.post-main-box:hover h3 a,#sidebar ul li a:hover,.post-navigation a:hover .post-title, .post-navigation a:focus .post-title,.post-navigation a:hover,.post-navigation a:focus{';
			$web_designer_custom_css .='color: '.esc_attr($web_designer_first_color).';';
		$web_designer_custom_css .='}';
	}

	/*----------------------Second highlight color-------------------*/

	$web_designer_second_color = get_theme_mod('web_designer_second_color');

	if($web_designer_second_color != false){
		$web_designer_custom_css .='.more-btn a:hover,input[type="submit"]:hover,#comments input[type="submit"]:hover,#comments a.comment-reply-link:hover,.pagination .current,.pagination a:hover,#footer .tagcloud a:hover,#sidebar .tagcloud a:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.widget_product_search button:hover,nav.woocommerce-MyAccount-navigation ul li:hover, .talk-btn a, .main-navigation ul.sub-menu>li>a:before, #slider .read-btn a:hover, .view-all-btn a:hover, .more-btn a:hover, #comments input[type="submit"]:hover,#comments a.comment-reply-link:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.pro-button a:hover, #preloader, #footer-2, .scrollup i, .pagination span, .pagination a, .widget_product_search button, .toggle-nav button{';
			$web_designer_custom_css .='background-color: '.esc_attr($web_designer_second_color).';';
		$web_designer_custom_css .='}';
	}

	if($web_designer_second_color != false){
		$web_designer_custom_css .='.post-main-box:hover .post-info span a, .single-post .post-info:hover a, .middle-bar h6{';
			$web_designer_custom_css .='color: '.esc_attr($web_designer_second_color).';';
		$web_designer_custom_css .='}';
	}

	if($web_designer_second_color != false){
		$web_designer_custom_css .='{';
			$web_designer_custom_css .='border-color: '.esc_attr($web_designer_second_color).';';
		$web_designer_custom_css .='}';
	}

	if($web_designer_second_color != false){
		$web_designer_custom_css .='.main-header{';
			$web_designer_custom_css .='border-bottom-color: '.esc_attr($web_designer_second_color).';';
		$web_designer_custom_css .='}';
	}

	$web_designer_custom_css .='@media screen and (max-width:1000px) {';
		if($web_designer_second_color != false){
			$web_designer_custom_css .='.main-navigation a:hover{
			color:'.esc_attr($web_designer_second_color).'!important;
			}';
		}
	$web_designer_custom_css .='}';

	/*---------------------------Width Layout -------------------*/

	$web_designer_theme_lay = get_theme_mod( 'web_designer_width_option','Full Width');
    if($web_designer_theme_lay == 'Boxed'){
		$web_designer_custom_css .='body{';
			$web_designer_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$web_designer_custom_css .='}';
	}else if($web_designer_theme_lay == 'Wide Width'){
		$web_designer_custom_css .='body{';
			$web_designer_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$web_designer_custom_css .='}';
	}else if($web_designer_theme_lay == 'Full Width'){
		$web_designer_custom_css .='body{';
			$web_designer_custom_css .='max-width: 100%;';
		$web_designer_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$web_designer_resp_slider = get_theme_mod( 'web_designer_resp_slider_hide_show',false);
	if($web_designer_resp_slider == true && get_theme_mod( 'web_designer_slider_hide_show', false) == false){
    	$web_designer_custom_css .='#slider{';
			$web_designer_custom_css .='display:none;';
		$web_designer_custom_css .='} ';
	}
    if($web_designer_resp_slider == true){
    	$web_designer_custom_css .='@media screen and (max-width:575px) {';
		$web_designer_custom_css .='#slider{';
			$web_designer_custom_css .='display:block;';
		$web_designer_custom_css .='} }';
	}else if($web_designer_resp_slider == false){
		$web_designer_custom_css .='@media screen and (max-width:575px) {';
		$web_designer_custom_css .='#slider{';
			$web_designer_custom_css .='display:none;';
		$web_designer_custom_css .='} }';
		$web_designer_custom_css .='@media screen and (max-width:575px){';
		$web_designer_custom_css .='.page-template-custom-home-page.admin-bar .homepageheader{';
			$web_designer_custom_css .='margin-top: 45px;';
		$web_designer_custom_css .='} }';
	}

	$web_designer_resp_sidebar = get_theme_mod( 'web_designer_sidebar_hide_show',true);
    if($web_designer_resp_sidebar == true){
    	$web_designer_custom_css .='@media screen and (max-width:575px) {';
		$web_designer_custom_css .='#sidebar{';
			$web_designer_custom_css .='display:block;';
		$web_designer_custom_css .='} }';
	}else if($web_designer_resp_sidebar == false){
		$web_designer_custom_css .='@media screen and (max-width:575px) {';
		$web_designer_custom_css .='#sidebar{';
			$web_designer_custom_css .='display:none;';
		$web_designer_custom_css .='} }';
	}

	$web_designer_resp_scroll_top = get_theme_mod( 'web_designer_resp_scroll_top_hide_show',true);
	if($web_designer_resp_scroll_top == true && get_theme_mod( 'web_designer_hide_show_scroll',true) == false){
    	$web_designer_custom_css .='.scrollup i{';
			$web_designer_custom_css .='visibility:hidden !important;';
		$web_designer_custom_css .='} ';
	}
    if($web_designer_resp_scroll_top == true){
    	$web_designer_custom_css .='@media screen and (max-width:575px) {';
		$web_designer_custom_css .='.scrollup i{';
			$web_designer_custom_css .='visibility:visible !important;';
		$web_designer_custom_css .='} }';
	}else if($web_designer_resp_scroll_top == false){
		$web_designer_custom_css .='@media screen and (max-width:575px){';
		$web_designer_custom_css .='.scrollup i{';
			$web_designer_custom_css .='visibility:hidden !important;';
		$web_designer_custom_css .='} }';
	}
	
	/*---------------- Button Settings ------------------*/

	$web_designer_button_border_radius = get_theme_mod('web_designer_button_border_radius');
	if($web_designer_button_border_radius != false){
		$web_designer_custom_css .='.post-main-box .more-btn a{';
			$web_designer_custom_css .='border-radius: '.esc_attr($web_designer_button_border_radius).'px;';
		$web_designer_custom_css .='}';
	}

	/*---------------- Single Post Settings ------------------*/

	$web_designer_single_blog_comment_title = get_theme_mod('web_designer_single_blog_comment_title', 'Leave a Reply');
	if($web_designer_single_blog_comment_title == ''){
		$web_designer_custom_css .='#comments h2#reply-title {';
			$web_designer_custom_css .='display: none;';
		$web_designer_custom_css .='}';
	}

	$web_designer_single_blog_comment_button_text = get_theme_mod('web_designer_single_blog_comment_button_text', 'Post Comment');
	if($web_designer_single_blog_comment_button_text == ''){
		$web_designer_custom_css .='#comments p.form-submit {';
			$web_designer_custom_css .='display: none;';
		$web_designer_custom_css .='}';
	}

	$web_designer_comment_width = get_theme_mod('web_designer_single_blog_comment_width');
	if($web_designer_comment_width != false){
		$web_designer_custom_css .='#comments textarea{';
			$web_designer_custom_css .='width: '.esc_attr($web_designer_comment_width).';';
		$web_designer_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$web_designer_copyright_alingment = get_theme_mod('web_designer_copyright_alingment');
	if($web_designer_copyright_alingment != false){
		$web_designer_custom_css .='.copyright p{';
			$web_designer_custom_css .='text-align: '.esc_attr($web_designer_copyright_alingment).';';
		$web_designer_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	// Site title Font Size
	$web_designer_site_title_font_size = get_theme_mod('web_designer_site_title_font_size');
	if($web_designer_site_title_font_size != false){
		$web_designer_custom_css .='.logo h1, .logo p.site-title{';
			$web_designer_custom_css .='font-size: '.esc_attr($web_designer_site_title_font_size).';';
		$web_designer_custom_css .='}';
	}

	// Site tagline Font Size
	$web_designer_site_tagline_font_size = get_theme_mod('web_designer_site_tagline_font_size');
	if($web_designer_site_tagline_font_size != false){
		$web_designer_custom_css .='.logo p.site-description{';
			$web_designer_custom_css .='font-size: '.esc_attr($web_designer_site_tagline_font_size).';';
		$web_designer_custom_css .='}';
	}

	/*------------------ Preloader Background Color  -------------------*/

	$web_designer_preloader_bg_color = get_theme_mod('web_designer_preloader_bg_color');
	if($web_designer_preloader_bg_color != false){
		$web_designer_custom_css .='#preloader{';
			$web_designer_custom_css .='background-color: '.esc_attr($web_designer_preloader_bg_color).';';
		$web_designer_custom_css .='}';
	}

	$web_designer_preloader_border_color = get_theme_mod('web_designer_preloader_border_color');
	if($web_designer_preloader_border_color != false){
		$web_designer_custom_css .='.loader-line{';
			$web_designer_custom_css .='border-color: '.esc_attr($web_designer_preloader_border_color).'!important;';
		$web_designer_custom_css .='}';
	}

	/*------------------ Slider css  -------------------*/
	$web_designer_slider_hide_show = get_theme_mod('web_designer_slider_hide_show',false);
	if($web_designer_slider_hide_show == false){
		$web_designer_custom_css .='.quoute-text{';
			$web_designer_custom_css .=' position: static;';
		$web_designer_custom_css .='}';
	}

	$web_designer_resp_slider_hide_show = get_theme_mod('web_designer_resp_slider_hide_show',false);
	if($web_designer_resp_slider_hide_show == false){
		$web_designer_custom_css .='@media screen and (max-width: 575px) {
			.quoute-text{';
				$web_designer_custom_css .=' margin-top: 10px;';
		$web_designer_custom_css .='} }';
	}