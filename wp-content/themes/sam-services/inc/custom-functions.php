<?php

/******************************************************/
/***************** CUSTOM FUNCTIONS *******************/
/******************************************************/



/************* Add Slug to Body Class *****************/

// Add specific CSS class by filter
function sam_network_class_names($classes) {
	// add 'class-name' to the $classes array
	global $post; 
	$post_slug_class = $post->post_name; 
	if(!is_front_page()) $classes[] = 'not-home ' . $post_slug_class . ' page-' . $post_slug_class;
	// return the $classes array
	return $classes;
}
add_filter('body_class','sam_network_class_names');

// remove_filter( 'the_content', 'wpautop' );

/************* Add .not-home to Body Class of All Pages Except Home *****************/

// function sam_not_home_class($classes) {
//     global $post;
//     if(!is_front_page()) $classes [] = 'not-home';
//     return $classes;
//     }
// add_filter('body_class', 'sam_not_home_class');

?>