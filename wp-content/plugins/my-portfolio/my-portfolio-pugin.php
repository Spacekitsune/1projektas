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