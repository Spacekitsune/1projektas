<?php
/**
 * Web Designer Theme Customizer
 *
 * @package Web Designer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function web_designer_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'web_designer_custom_controls' );

function web_designer_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'web_designer_Customize_partial_blogname',
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'web_designer_Customize_partial_blogdescription',
	));

	// add home page setting pannel
	$wp_customize->add_panel( 'web_designer_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'web-designer' ),
		'priority' => 10,
	));

	// Layout
	$wp_customize->add_section( 'web_designer_left_right', array(
    	'title' => esc_html__( 'General Settings', 'web-designer' ),
		'panel' => 'web_designer_panel_id'
	) );

	$wp_customize->add_setting('web_designer_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'web_designer_sanitize_choices'
	));
	$wp_customize->add_control(new Web_Designer_Image_Radio_Control($wp_customize, 'web_designer_width_option', array(
        'type' => 'select',
        'label' => esc_html__('Width Layouts','web-designer'),
        'description' => esc_html__('Here you can change the width layout of Website.','web-designer'),
        'section' => 'web_designer_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('web_designer_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'web_designer_sanitize_choices'
	));
	$wp_customize->add_control('web_designer_theme_options',array(
        'type' => 'select',
        'label' => esc_html__('Post Sidebar Layout','web-designer'),
        'description' => esc_html__('Here you can change the sidebar layout for posts. ','web-designer'),
        'section' => 'web_designer_left_right',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','web-designer'),
            'Right Sidebar' => esc_html__('Right Sidebar','web-designer'),
            'One Column' => esc_html__('One Column','web-designer'),
            'Grid Layout' => esc_html__('Grid Layout','web-designer')
        ),
	) );

	$wp_customize->add_setting('web_designer_page_layout',array(
        'default' => 'One_Column',
        'sanitize_callback' => 'web_designer_sanitize_choices'
	));
	$wp_customize->add_control('web_designer_page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Page Sidebar Layout','web-designer'),
        'description' => esc_html__('Here you can change the sidebar layout for pages. ','web-designer'),
        'section' => 'web_designer_left_right',
        'choices' => array(
            'Left_Sidebar' => esc_html__('Left Sidebar','web-designer'),
            'Right_Sidebar' => esc_html__('Right Sidebar','web-designer'),
            'One_Column' => esc_html__('One Column','web-designer')
        ),
	) );

	// Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'web_designer_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar', 
		'render_callback' => 'web_designer_customize_partial_web_designer_woocommerce_shop_page_sidebar', ) );

    // Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'web_designer_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'web_designer_switch_sanitization'
    ) );
    $wp_customize->add_control( new Web_Designer_Toggle_Switch_Custom_Control( $wp_customize, 'web_designer_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','web-designer' ),
		'section' => 'web_designer_left_right'
    )));

    // Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'web_designer_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar', 
		'render_callback' => 'web_designer_customize_partial_web_designer_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'web_designer_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'web_designer_switch_sanitization'
    ) );
    $wp_customize->add_control( new Web_Designer_Toggle_Switch_Custom_Control( $wp_customize, 'web_designer_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','web-designer' ),
		'section' => 'web_designer_left_right'
    )));

    // Pre-Loader
	$wp_customize->add_setting( 'web_designer_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'web_designer_switch_sanitization'
    ) );
    $wp_customize->add_control( new Web_Designer_Toggle_Switch_Custom_Control( $wp_customize, 'web_designer_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','web-designer' ),
        'section' => 'web_designer_left_right'
    )));

	$wp_customize->add_setting('web_designer_preloader_bg_color', array(
		'default'           => '#009DAE',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'web_designer_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'web-designer'),
		'section'  => 'web_designer_left_right',
	)));

	$wp_customize->add_setting('web_designer_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'web_designer_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'web-designer'),
		'section'  => 'web_designer_left_right',
	)));

	// Top Bar
	$wp_customize->add_section( 'web_designer_header' , array(
    	'title' => esc_html__( 'Header', 'web-designer' ),
		'panel' => 'web_designer_panel_id'
	) );

	$wp_customize->add_setting('web_designer_talk_btn_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('web_designer_talk_btn_text',array(
		'label'	=> esc_html__('Add Button Text','web-designer'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Lets Talk', 'web-designer' ),
        ),
		'section'=> 'web_designer_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('web_designer_talk_btn_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('web_designer_talk_btn_url',array(
		'label'	=> esc_html__('Add Button URL','web-designer'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'www.example.com', 'web-designer' ),
        ),
		'section'=> 'web_designer_header',
		'type'=> 'url'
	));

	//Slider
	$wp_customize->add_section( 'web_designer_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'web-designer' ),
		'panel' => 'web_designer_panel_id'
	) );

	$wp_customize->add_setting( 'web_designer_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'web_designer_switch_sanitization'
    ));  
    $wp_customize->add_control( new Web_Designer_Toggle_Switch_Custom_Control( $wp_customize, 'web_designer_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','web-designer' ),
      'section' => 'web_designer_slidersettings'
    )));

     //Selective Refresh
    $wp_customize->selective_refresh->add_partial('web_designer_slider_hide_show',array(
		'selector'        => '.slider-btn a',
		'render_callback' => 'web_designer_customize_partial_web_designer_slider_hide_show',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'web_designer_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'web_designer_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'web_designer_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'web-designer' ),
			'description' => __('Slider image size (400 x 400)','web-designer'),
			'section'  => 'web_designer_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting( 'web_designer_slider_content_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'web_designer_switch_sanitization'
    ));  
    $wp_customize->add_control( new web_designer_Toggle_Switch_Custom_Control( $wp_customize, 'web_designer_slider_content_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider Content','web-designer' ),
		'section' => 'web_designer_slidersettings'
    )));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting('web_designer_counter_no'.$count,array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('web_designer_counter_no'.$count,array(
			'label'	=> esc_html__('Add Counter Number','web-designer').$count,
			'input_attrs' => array(
	            'placeholder' => esc_html__( '600+', 'web-designer' ),
	        ),
			'section'=> 'web_designer_slidersettings',
			'type'=> 'text'
		));

		$wp_customize->add_setting('web_designer_counter_text'.$count,array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('web_designer_counter_text'.$count,array(
			'label'	=> esc_html__('Add Counter Text','web-designer').$count,
			'input_attrs' => array(
	            'placeholder' => esc_html__( 'Completed Pojects', 'web-designer' ),
	        ),
			'section'=> 'web_designer_slidersettings',
			'type'=> 'text'
		));
	}

    //Slider excerpt
	$wp_customize->add_setting( 'web_designer_slider_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'web_designer_sanitize_number_range'
	) );
	$wp_customize->add_control( 'web_designer_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','web-designer' ),
		'section'     => 'web_designer_slidersettings',
		'type'        => 'range',
		'settings'    => 'web_designer_slider_excerpt_number',
		'input_attrs' => array(
			'step' => 5,
			'min'  => 0,
			'max'  => 50,
		),
	) );

	$wp_customize->add_setting( 'web_designer_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'web_designer_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','web-designer'),
		'section' => 'web_designer_slidersettings',
		'type'  => 'text',
	) );

	// Services Section
	$wp_customize->add_section('web_designer_service_section',array(
		'title'	=> __('Service Section','web-designer'),
		'description' => __('Add section title and Select the Category to display for services.','web-designer'),
		'panel' => 'web_designer_panel_id',
	));

	$wp_customize->add_setting( 'web_designer_section_small_title', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'web_designer_section_small_title', array(
		'label'    => __( 'Add Section Small Title', 'web-designer' ),
		'input_attrs' => array(
            'placeholder' => __( 'Services', 'web-designer' ),
        ),
		'section'  => 'web_designer_service_section',
		'type'     => 'text'
	) );

	$wp_customize->add_setting( 'web_designer_section_title', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'web_designer_section_title', array(
		'label'    => __( 'Add Section Title', 'web-designer' ),
		'input_attrs' => array(
            'placeholder' => __( 'We Provide Wide Range Of Digital Services', 'web-designer' ),
        ),
		'section'  => 'web_designer_service_section',
		'type'     => 'text'
	) );

	$categories = get_categories();
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('web_designer_service_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'web_designer_sanitize_choices',
	));
	$wp_customize->add_control('web_designer_service_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Service Category','web-designer'),
		'section' => 'web_designer_service_section',
	));

	//Blog Post
	$wp_customize->add_panel( 'web_designer_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'web-designer' ),
		'panel' => 'web_designer_panel_id',
		'priority' => 20,
	));

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'web_designer_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'web-designer' ),
		'panel' => 'web_designer_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('web_designer_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'web_designer_Customize_partial_web_designer_toggle_postdate', 
	));

	$wp_customize->add_setting( 'web_designer_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'web_designer_switch_sanitization'
    ) );
    $wp_customize->add_control( new Web_Designer_Toggle_Switch_Custom_Control( $wp_customize, 'web_designer_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','web-designer' ),
        'section' => 'web_designer_post_settings'
    )));

    $wp_customize->add_setting( 'web_designer_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'web_designer_switch_sanitization'
    ) );
    $wp_customize->add_control( new Web_Designer_Toggle_Switch_Custom_Control( $wp_customize, 'web_designer_toggle_author',array(
		'label' => esc_html__( 'Author','web-designer' ),
		'section' => 'web_designer_post_settings'
    )));

    $wp_customize->add_setting( 'web_designer_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'web_designer_switch_sanitization'
    ) );
    $wp_customize->add_control( new Web_Designer_Toggle_Switch_Custom_Control( $wp_customize, 'web_designer_toggle_comments',array(
		'label' => esc_html__( 'Comments','web-designer' ),
		'section' => 'web_designer_post_settings'
    )));

    $wp_customize->add_setting( 'web_designer_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'web_designer_switch_sanitization'
    ) );
    $wp_customize->add_control( new Web_Designer_Toggle_Switch_Custom_Control( $wp_customize, 'web_designer_toggle_time',array(
		'label' => esc_html__( 'Time','web-designer' ),
		'section' => 'web_designer_post_settings'
    )));

    $wp_customize->add_setting( 'web_designer_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'web_designer_switch_sanitization'
	));
    $wp_customize->add_control( new Web_Designer_Toggle_Switch_Custom_Control( $wp_customize, 'web_designer_featured_image_hide_show', array(
		'label' => esc_html__( 'Featured Image','web-designer' ),
		'section' => 'web_designer_post_settings'
    )));

    $wp_customize->add_setting( 'web_designer_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'web_designer_switch_sanitization'
	));
    $wp_customize->add_control( new Web_Designer_Toggle_Switch_Custom_Control( $wp_customize, 'web_designer_toggle_tags', array(
		'label' => esc_html__( 'Tags','web-designer' ),
		'section' => 'web_designer_post_settings'
    )));

    $wp_customize->add_setting( 'web_designer_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'web_designer_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'web_designer_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','web-designer' ),
		'section'     => 'web_designer_post_settings',
		'type'        => 'range',
		'settings'    => 'web_designer_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('web_designer_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('web_designer_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','web-designer'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','web-designer'),
		'section'=> 'web_designer_post_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('web_designer_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'web_designer_sanitize_choices'
	));
	$wp_customize->add_control('web_designer_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Post Content','web-designer'),
        'section' => 'web_designer_post_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','web-designer'),
            'Excerpt' => esc_html__('Excerpt','web-designer'),
            'No Content' => esc_html__('No Content','web-designer')
        ),
	) );

    // Button Settings
	$wp_customize->add_section( 'web_designer_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'web-designer' ),
		'panel' => 'web_designer_blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'web_designer_button_border_radius', array(
		'default'              => 5,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'web_designer_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'web_designer_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','web-designer' ),
		'section'     => 'web_designer_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('web_designer_button_text', array( 
		'selector' => '.post-main-box .more-btn a', 
		'render_callback' => 'web_designer_Customize_partial_web_designer_button_text', 
	));

    $wp_customize->add_setting('web_designer_button_text',array(
		'default'=> esc_html__('Read More','web-designer'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('web_designer_button_text',array(
		'label'	=> esc_html__('Add Button Text','web-designer'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read More', 'web-designer' ),
        ),
		'section'=> 'web_designer_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'web_designer_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'web-designer' ),
		'panel' => 'web_designer_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('web_designer_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'web_designer_Customize_partial_web_designer_related_post_title', 
	));

    $wp_customize->add_setting( 'web_designer_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'web_designer_switch_sanitization'
    ) );
    $wp_customize->add_control( new Web_Designer_Toggle_Switch_Custom_Control( $wp_customize, 'web_designer_related_post',array(
		'label' => esc_html__( 'Related Post','web-designer' ),
		'section' => 'web_designer_related_posts_settings'
    )));

    $wp_customize->add_setting('web_designer_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('web_designer_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','web-designer'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Related Post', 'web-designer' ),
        ),
		'section'=> 'web_designer_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('web_designer_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'web_designer_sanitize_number_absint'
	));
	$wp_customize->add_control('web_designer_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','web-designer'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '3', 'web-designer' ),
        ),
		'section'=> 'web_designer_related_posts_settings',
		'type'=> 'number'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'web_designer_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'web-designer' ),
		'panel' => 'web_designer_blog_post_parent_panel',
	));

	$wp_customize->add_setting('web_designer_single_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('web_designer_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','web-designer'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','web-designer'),
		'section'=> 'web_designer_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('web_designer_single_blog_comment_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('web_designer_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','web-designer'),
		'input_attrs' => array(
            'placeholder' => __( 'Leave a Reply', 'web-designer' ),
        ),
		'section'=> 'web_designer_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('web_designer_single_blog_comment_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('web_designer_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','web-designer'),
		'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'web-designer' ),
        ),
		'section'=> 'web_designer_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('web_designer_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('web_designer_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','web-designer'),
		'description'	=> __('Enter a value in %. Example:50%','web-designer'),
		'input_attrs' => array(
            'placeholder' => __( '100%', 'web-designer' ),
        ),
		'section'=> 'web_designer_single_blog_settings',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('web_designer_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','web-designer'),
		'panel' => 'web_designer_panel_id',
	));

    $wp_customize->add_setting( 'web_designer_resp_slider_hide_show',array(
      	'default' => 0,
     	'transport' => 'refresh',
      	'sanitize_callback' => 'web_designer_switch_sanitization'
    ));  
    $wp_customize->add_control( new Web_Designer_Toggle_Switch_Custom_Control( $wp_customize, 'web_designer_resp_slider_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Slider','web-designer' ),
      	'section' => 'web_designer_responsive_media'
    )));

    $wp_customize->add_setting( 'web_designer_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'web_designer_switch_sanitization'
    ));  
    $wp_customize->add_control( new Web_Designer_Toggle_Switch_Custom_Control( $wp_customize, 'web_designer_sidebar_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Sidebar','web-designer' ),
      	'section' => 'web_designer_responsive_media'
    )));

    $wp_customize->add_setting( 'web_designer_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'web_designer_switch_sanitization'
    ));  
    $wp_customize->add_control( new Web_Designer_Toggle_Switch_Custom_Control( $wp_customize, 'web_designer_resp_scroll_top_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','web-designer' ),
      	'section' => 'web_designer_responsive_media'
    )));

	//Footer Text
	$wp_customize->add_section('web_designer_footer',array(
		'title'	=> esc_html__('Footer Settings','web-designer'),
		'panel' => 'web_designer_panel_id',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('web_designer_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'web_designer_Customize_partial_web_designer_footer_text', 
	));
	
	$wp_customize->add_setting('web_designer_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('web_designer_footer_text',array(
		'label'	=> esc_html__('Copyright Text','web-designer'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Copyright 2021, .....', 'web-designer' ),
        ),
		'section'=> 'web_designer_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('web_designer_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'web_designer_sanitize_choices'
	));
	$wp_customize->add_control(new Web_Designer_Image_Radio_Control($wp_customize, 'web_designer_copyright_alingment', array(
        'type' => 'select',
        'label' => esc_html__('Copyright Alignment','web-designer'),
        'section' => 'web_designer_footer',
        'settings' => 'web_designer_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting( 'web_designer_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'web_designer_switch_sanitization'
    ));  
    $wp_customize->add_control( new Web_Designer_Toggle_Switch_Custom_Control( $wp_customize, 'web_designer_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','web-designer' ),
      	'section' => 'web_designer_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('web_designer_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'web_designer_Customize_partial_web_designer_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('web_designer_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'web_designer_sanitize_choices'
	));
	$wp_customize->add_control(new Web_Designer_Image_Radio_Control($wp_customize, 'web_designer_scroll_top_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Scroll To Top','web-designer'),
        'section' => 'web_designer_footer',
        'settings' => 'web_designer_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));
}

add_action( 'customize_register', 'web_designer_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Web_Designer_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Web_Designer_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Web_Designer_Customize_Section_Pro( $manager,'web_designer_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'WEB DESIGNER PRO', 'web-designer' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'web-designer' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/web-design-agency-wordpress-theme/'),
		) )	);

		// Register sections.
		$manager->add_section(new Web_Designer_Customize_Section_Pro($manager,'web_designer_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'web-designer' ),
			'pro_text' => esc_html__( 'DOCS', 'web-designer' ),
			'pro_url'  => admin_url('themes.php?page=web_designer_guide'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'web-designer-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'web-designer-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Web_Designer_Customize::get_instance();