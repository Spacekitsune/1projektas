<?php
//i wordpress sistema iregistruoti
//stilius
//javascript failus
// viska kas susije su tema

function bit_portfolio_enqueue () {

    //Style
    wp_enqueue_style( 'bit-portfolio-bootsrap', get_template_directory_uri() . "/css/bootstrap.min.css" );
    wp_enqueue_style( 'bit-portfolio-iconic', get_template_directory_uri() . "/css/open-iconic-bootstrap.min.css" );
    wp_enqueue_style( 'bit-portfolio-animate', get_template_directory_uri() . "/css/animate.css" );
    wp_enqueue_style( 'bit-portfolio-carousel', get_template_directory_uri() . "/css/owl.carousel.min.css" );
    wp_enqueue_style( 'bit-portfolio-theme-default', get_template_directory_uri() . "/css/owl.theme.default.min.css" );
    wp_enqueue_style( 'bit-portfolio-magnific-popup', get_template_directory_uri() . "/css/magnific-popup.css" );
    wp_enqueue_style( 'bit-portfolio-aos', get_template_directory_uri() . "/css/aos.css" );
    wp_enqueue_style( 'bit-portfolio-ionicons', get_template_directory_uri() . "/css/ionicons.min.css" );
    wp_enqueue_style( 'bit-portfolio-datepicker', get_template_directory_uri() . "/css/bootstrap-datepicker.css" );
    wp_enqueue_style( 'bit-portfolio-timepicker', get_template_directory_uri() . "/css/jquery.timepicker.css" );
    wp_enqueue_style( 'bit-portfolio-flaticon', get_template_directory_uri() . "/css/flaticon.css" );
    wp_enqueue_style( 'bit-portfolio-icomoon', get_template_directory_uri() . "/css/icomoon.css" );
    wp_enqueue_style( 'bit-portfolio-style', get_template_directory_uri() . "/css/style.css" );
    //fonts VISADA turi buti style.css dokumente
    
    //Script

    wp_enqueue_script('bit-portfolio-jquery', get_template_directory_uri() . "/js/jquery.min.js" );
    wp_enqueue_script('bit-portfolio-jquery-migrate', get_template_directory_uri() . "/js/jquery-migrate-3.0.1.min.js" );
    wp_enqueue_script('bit-portfolio-popper', get_template_directory_uri() . "/js/popper.min.js" );
    wp_enqueue_script('bit-portfolio-bootstrap', get_template_directory_uri() . "/js/bootstrap.min.js" );
    wp_enqueue_script('bit-portfolio-easing', get_template_directory_uri() . "/js/jquery.easing.1.3.js" );

    wp_enqueue_script('bit-portfolio-waypoints', get_template_directory_uri() . "/js/jquery.waypoints.min.js" );

    wp_enqueue_script('bit-portfolio-stellar', get_template_directory_uri() . "/js/jquery.stellar.min.js" );
    wp_enqueue_script('bit-portfolio-carousel', get_template_directory_uri() . "/js/owl.carousel.min.js" );
    wp_enqueue_script('bit-portfolio-magnific', get_template_directory_uri() . "/js/jquery.magnific-popup.min.js" );

    wp_enqueue_script('bit-portfolio-aos', get_template_directory_uri() . "/js/aos.js" );
    wp_enqueue_script('bit-portfolio-animateNumber', get_template_directory_uri() . "/js/jquery.animateNumber.min.js" );
    wp_enqueue_script('bit-portfolio-datepicker', get_template_directory_uri() . "/js/bootstrap-datepicker.js" );
    // wp_enqueue_script('bit-portfolio-timepicker', get_template_directory_uri() . "/js/jquery.timepicker.min.js" );

    wp_enqueue_script('bit-portfolio-scrollax', get_template_directory_uri() . "/js/scrollax.min.js" );
    // wp_enqueue_script('bit-portfolio-google-maps', get_template_directory_uri() . "/js/google-map.js" );
    wp_enqueue_script('bit-portfolio-main', get_template_directory_uri() . "/js/main.js" );
}

add_action("wp_enqueue_scripts", "bit_portfolio_enqueue" );

register_nav_menus(array(
    "menu-1" => __("Primary Header Menu", 'bit-portfolio')
));

function bit_portfolio_move_to_footer_scripts() {
    remove_action('wp_head', 'wp_print_scripts'); //nespausdink man scriptu head'e
    remove_action('wp_head', 'wp_print_head_scripts', 9 );
    remove_action('wp_head', 'wp_enqueue_scripts', 1); //scriptai yra nespausdinami apskirtai

    //script atspausdinimo reikia footeryje

    add_action('wp_footer','wp_print_scripts', 5);
    add_action('wp_footer','wp_enqueue_scripts', 5);
    add_action('wp_footer','wp_print_head_scripts', 5);
}

add_action('wp_enqueue_scripts', 'bit_portfolio_move_to_footer_scripts');

