<?php

/******************************************************/
/************* Add Slug to Body Class *****************/
/******************************************************/

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


/******************************************************************/
/************* FEATURED IMAGE PREVIEW IN ADMIN ********************/
/******************************************************************/

// add_theme_support( 'post-thumbnails' ); // theme should support
function glocal_add_post_thumbnail_column( $cols ) { // add the thumb column
  // output feature thumb in the end
  //$cols['glocal_post_thumb'] = __( 'Featured image', 'glocal' );
  //return $cols;
  // output feature thumb in a different column position
  $cols_start = array_slice( $cols, 0, 2, true );
  $cols_end   = array_slice( $cols, 2, null, true );
  $custom_cols = array_merge(
    $cols_start,
    array( 'glocal_post_thumb' => __( 'Featured image', 'glocal' ) ),
    $cols_end
  );
  return $custom_cols;
}
add_filter( 'manage_posts_columns', 'glocal_add_post_thumbnail_column', 5 ); // add the thumb column to posts
// add_filter( 'manage_pages_columns', 'glocal_add_post_thumbnail_column', 5 ); // add the thumb column to pages
add_filter( 'manage_slides_columns', 'glocal_add_post_thumbnail_column', 5 ); // add the thumb column to pages

function glocal_display_post_thumbnail_column( $col, $id ) { // output featured image thumbnail
  switch( $col ){
    case 'glocal_post_thumb':
      if( function_exists( 'the_post_thumbnail' ) ) {
        echo the_post_thumbnail( 'thumbnail' );
      } else {
        echo __( 'Not supported in theme', 'glocal' );
      }
      break;
  }
}
add_action( 'manage_posts_custom_column', 'glocal_display_post_thumbnail_column', 5, 2 ); // add the thumb to posts
// add_action( 'manage_pages_custom_column', 'glocal_display_post_thumbnail_column', 5, 2 ); // add the thumb to pages
add_action( 'manage_slides_custom_column', 'glocal_display_post_thumbnail_column', 5, 2 ); // add the thumb to pages


?>