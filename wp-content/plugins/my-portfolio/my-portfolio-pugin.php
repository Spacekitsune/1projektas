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