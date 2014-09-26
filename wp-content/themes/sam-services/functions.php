<?php

/************* Add Slug to Body Class *****************/

// Add specific CSS class by filter
add_filter('body_class','sam_services_class_names');
function sam_services_class_names($classes) {
	// add 'class-name' to the $classes array
	global $post; 
	$post_slug_class = $post->post_name; 
	$classes[] = $post_slug_class . ' page-' . $post_slug_class;
	// return the $classes array
	return $classes;
}

/************* Sidebars *****************/

function sam_services_remove_widgets(){

	// Unregister some sidebars
	unregister_sidebar( 'gallery-widget' );
	unregister_sidebar( 'colophon-widget' );
	unregister_sidebar( 'left-sidebar-half' );
	unregister_sidebar( 'right-sidebar-half' );
	unregister_sidebar( 'left-sidebar' );
	unregister_sidebar( 'main-sidebar' );

}
add_action( 'widgets_init', 'sam_services_remove_widgets', 11 );



function sam_services_add_widgets() {

	// register some sidebars

	register_sidebar( array(
		'name'          => __( 'Home Widget 4', 'sam-services' ),
		'description'   => __( '4th widget on homepage', 'sam-services' ),
		'id'            => 'home-widget-4',
		'before_title'  => '<div class="widget-title"><h3>',
		'after_title'   => '</h3></div>',
		'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
		'after_widget'  => '</div>'
	) );

}
add_action( 'widgets_init', 'sam_services_add_widgets' );

?>