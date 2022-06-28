<?php
/*
Plugin Name: My Portfolio Plugin
Plugin URI: https://spacekitsune.github.com/my-portfolio
Description: Porfolio plugin
Version 1.0.0
Author: Alex
License: GPL2
Licence URI: https://www.gnu.org/licenses/gpl-2.0.html_entity_decode
Text Domain: my-portfolio-plugin
*/

//funkcijos būtinai turi turėti prefix'ą kaip failo pavadinimas
//
function my_portfolio_create_post_type_works() {
	register_post_type('works', array(
	'labels' => array (
		'name' => __('Works'),
		'singular_name' =>__('Work')
		//kviečia teksto iregistravimo į sistemą funkciją
		),
		'public' => true,
		'has_arhive'=>true, //leidžia kurti musų post type kategorijas
		'rewrite'=> array('slug'=>'works'), //post type sukuria nuorodą /works
		'show_in_rest' => true
	));
}
//prikabinam sukurtą funkciją prie sistemos
//setting>permalinks>save changes
//galima pasitvarkyti su additional fields
add_action('init', 'my_portfolio_create_post_type_works');

//per $wp_customize yra pasiekiami visi apparence nustatymai
function my_portfolio_customize_background_color($wp_customize) {
    //$wp_customize - visi Customize sekcijoje esantys nustatymai

    $wp_customize->add_section('my_portfolio_my_colors', array(
        'title' => __('My colors'),
        'priority' => 100
    ));

    //Kad cia yra sukuriamas tekstinis laukas
    $wp_customize->add_setting('my_portofolio_background_color', array(
        'default' => 'red',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'my_portofolio_background_color', array(
        'label' => __("Background color"),
        'description' => __("Enter background color"),
        'section' => 'my_portfolio_my_colors',
        'type' => 'text',
        'priority' => 10
    )));
	
	$wp_customize->add_setting('my_portfolio_second_background_color', array(
        'default' => '#FFFFFF',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'my_portfolio_second_background_color', array(
        'label' => 'Second background color',
        'section' => 'my_portfolio_my_colors',
        'settings' => 'my_portfolio_second_background_color'
    )));

    //Kuriame nuotraukos iterpimo lauka

    $wp_customize->add_setting('my_portfolio_custom_image', array(
        'default' => '',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'my_portfolio_custom_image', array(
        'label'=>'Custom Image',
        'description' => 'Select your image',
        'section' => 'my_portfolio_my_colors'
    )));
}

add_action('customize_register', 'my_portfolio_customize_background_color');

function my_portfolio_customizer_header_section($wp_customize) {

    $wp_customize->add_section('my_portfolio_header_settings', array(
        'title' => __('Header settings', 'my-portfolio'),
        'priority' => 101
    ));

    //Logo 

    $wp_customize->add_setting('my_portfolio_logo_text', array(
        'default' => 'Logo',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'my_portfolio_logo_text', array(
        'label' => 'Logo text',
        'description' => 'Change default logo',
        'section' => 'my_portfolio_header_settings',
        'type' => 'text',
        'priority' => 10,
    )));

    //Header copyright text before

    $wp_customize->add_setting('my_portfolio_copyright_text_before_date', array(
        'default' => 'Copyright',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'my_portfolio_copyright_text_before_date', array(
        'label' => 'Copyright text before date',
        'description' => 'Change copyright text',
        'section' => 'my_portfolio_header_settings',
        'type' => 'text',
        'priority' => 11,
    )));

    //Header copyright text after

    $wp_customize->add_setting('my_portfolio_copyright_text_after_date', array(
        'default' => 'All rights reserved | This template is made with ',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'my_portfolio_copyright_text_after_date', array(
        'label' => 'Copyright text',
        'description' => 'Change copyright text after date',
        'section' => 'my_portfolio_header_settings',
        'type' => 'text',
        'priority' => 12,
    )));

    //Link target

    $wp_customize->add_setting('my_portfolio_header_links_target', array(
        'default' => true,
        'sanitize_callback' => ''
    ));
    
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'my_portfolio_header_links_target', array(
        'label' => 'Open in the new tab?',
        'description' => 'Choose how social links open same page/new page',
        'section' => 'my_portfolio_header_settings',
        'type' => 'checkbox',
        'priority' => 12,
    )));


    //Facebook

    $wp_customize->add_setting('my_portfolio_item_facebook', array(
        'default' => '',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'my_portfolio_item_facebook', array(
        'label' => 'Facebook url',
        'description' => 'Facebook url',
        'section' => 'my_portfolio_header_settings',
        'type' => 'text',
        'priority' => 12,
    )));

    //Twitter

    $wp_customize->add_setting('my_portfolio_item_twitter', array(
        'default' => '',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'my_portfolio_item_twitter', array(
        'label' => 'Twitter url',
        'description' => 'Twitter url',
        'section' => 'my_portfolio_header_settings',
        'type' => 'text',
        'priority' => 12,
    )));

    //Instagram

    $wp_customize->add_setting('my_portfolio_item_instagram', array(
        'default' => '',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'my_portfolio_item_instagram', array(
        'label' => 'Instagram url',
        'description' => 'Instagram url',
        'section' => 'my_portfolio_header_settings',
        'type' => 'text',
        'priority' => 12,
    )));
    //Linkedin

    $wp_customize->add_setting('my_portfolio_item_linkedin', array(
        'default' => '',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'my_portfolio_item_linkedin', array(
        'label' => 'Linkedin url',
        'description' => 'Linkedin url',
        'section' => 'my_portfolio_header_settings',
        'type' => 'text',
        'priority' => 12,
    )));

}


function my_portfolio_customizer_footer_section($wp_customize) {

    $wp_customize->add_section('my_portfolio_footer_settings', array(
        'title' => __('Footer settings', 'my-portfolio'),
        'priority' => 102
    ));

 //Menu #1 title 

        $wp_customize->add_setting('my_portfolio_footer_menu_first_title', array(
            'default' => 'Category',
            'sanitize_callback' => ''
        ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'my_portfolio_footer_menu_first_title', array(
        'label' => 'Menu #1 title',
        'description' => 'Menu #1 title',
        'section' => 'my_portfolio_footer_settings',
        'type' => 'text',
        'priority' => 10,
    )));

 //Menu #2 title 

    $wp_customize->add_setting('my_portfolio_footer_menu_second_title', array(
        'default' => 'Archives',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'my_portfolio_footer_menu_second_title', array(
        'label' => 'Menu #2 title',
        'description' => 'Menu #2 title',
        'section' => 'my_portfolio_footer_settings',
        'type' => 'text',
        'priority' => 10,
    )));

// Contact title

    $wp_customize->add_setting('my_portfolio_footer_contact_title', array(
        'default' => 'Have a question?',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'my_portfolio_footer_contact_title', array(
        'label' => 'Contact title',
        'description' => 'Contact title',
        'section' => 'my_portfolio_footer_settings',
        'type' => 'text',
        'priority' => 10,
    )));



    //Contact address

    $wp_customize->add_setting('my_portfolio_footer_contact_address', array(
        'default' => 'Have a question?',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'my_portfolio_footer_contact_address', array(
        'label' => 'Contact address',
        'description' => 'Contact address',
        'section' => 'my_portfolio_footer_settings',
        'type' => 'text',
        'priority' => 10,
    )));

    //Contact phone
    $wp_customize->add_setting('my_portfolio_footer_contact_phone', array(
        'default' => 'Have a question?',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'my_portfolio_footer_contact_phone', array(
        'label' => 'Contact phone',
        'description' => 'Contact phone',
        'section' => 'my_portfolio_footer_settings',
        'type' => 'text',
        'priority' => 10,
    )));
    //Contact email

    $wp_customize->add_setting('my_portfolio_footer_contact_email', array(
        'default' => 'Have a question?',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'my_portfolio_footer_contact_email', array(
        'label' => 'Contact email',
        'description' => 'Contact email',
        'section' => 'my_portfolio_footer_settings',
        'type' => 'text',
        'priority' => 10,
    )));


    //Copyright text before date
    $wp_customize->add_setting('my_portfolio_footer_copyright_before', array(
        'default' => 'Have a question?',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'my_portfolio_footer_copyright_before', array(
        'label' => 'Copyright before',
        'description' => 'Copyright before',
        'section' => 'my_portfolio_footer_settings',
        'type' => 'text',
        'priority' => 10,
    )));



    //Copyright text after date

    //Copyright text before date
    $wp_customize->add_setting('my_portfolio_footer_copyright_after', array(
        'default' => 'Have a question?',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'my_portfolio_footer_copyright_after', array(
        'label' => 'Copyright after',
        'description' => 'Copyright after',
        'section' => 'my_portfolio_footer_settings',
        'type' => 'text',
        'priority' => 10,
    )));
}

function my_portfolio_customizer_404_section($wp_customize) {
    $wp_customize->add_section('my_portfolio_404_settings', array(
        'title' => __('404 settings', 'my-portfolio'),
        'priority' => 102
    ));

    //404 Page title
     

    $wp_customize->add_setting('my_portfolio_404_page_title', array(
        'default' => '404',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'my_portfolio_404_page_title', array(
        'label' => '404 page title',
        'description' => 'Change 404 page title',
        'section' => 'my_portfolio_404_settings',
        'type' => 'text',
        'priority' => 10,
    )));

    //404 Page Description
    $wp_customize->add_setting('my_portfolio_404_page_description', array(
        'default' => 'Something went wrong, page not found',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'my_portfolio_404_page_description', array(
        'label' => '404 page description',
        'description' => 'Change 404 page description',
        'section' => 'my_portfolio_404_settings',
        'type' => 'text',
        'priority' => 10,
    )));

    //404 Page Link Text
    $wp_customize->add_setting('my_portfolio_404_page_link_text', array(
        'default' => 'Go back to Home',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'my_portfolio_404_page_link_text', array(
        'label' => '404 page link text',
        'description' => 'Change 404 page link text',
        'section' => 'my_portfolio_404_settings',
        'type' => 'text',
        'priority' => 10,
    )));

    //404 Page background image

    $wp_customize->add_setting('my_portfolio_404_background_image', array(
        'default' => '',
        'sanitize_callback' => ''
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'my_portfolio_404_background_image', array(
        'label' => 'Backround Image',
        'description' => 'Choose 404 background image',
        'section' => 'my_portfolio_404_settings'
    )));

}



add_action('customize_register', 'my_portfolio_customizer_header_section');
add_action('customize_register', 'my_portfolio_customizer_footer_section');
add_action('customize_register', 'my_portfolio_customizer_404_section');