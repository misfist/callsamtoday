<?php

/******************************************************/
/***************** CUSTOM FUNCTIONS *******************/
/******************************************************/



/************* Add Slug to Body Class *****************/

// Add specific CSS class by filter
add_filter('body_class','glocal_network_class_names');
function glocal_network_class_names($classes) {
	// add 'class-name' to the $classes array
	global $post; 
	$post_slug_class = $post->post_name; 
	$classes[] = $post_slug_class . ' page-' . $post_slug_class;
	// return the $classes array
	return $classes;
}

// remove_filter( 'the_content', 'wpautop' );

?>