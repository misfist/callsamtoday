<?php


if ( ! function_exists('sam_slide_post_type') ) {

	// Register Custom Post Type
	function sam_slide_post_type() {

		$labels = array(
			'name'                => _x( 'Slides', 'Post Type General Name', 'sam_slider' ),
			'singular_name'       => _x( 'Slide', 'Post Type Singular Name', 'sam_slider' ),
			'menu_name'           => __( 'Slides', 'sam_slider' ),
			'parent_item_colon'   => __( 'Parent Slide:', 'sam_slider' ),
			'all_items'           => __( 'All Slides', 'sam_slider' ),
			'view_item'           => __( 'View Slide', 'sam_slider' ),
			'add_new_item'        => __( 'Add New Slide', 'sam_slider' ),
			'add_new'             => __( 'Add New', 'sam_slider' ),
			'edit_item'           => __( 'Edit Slide', 'sam_slider' ),
			'update_item'         => __( 'Update Slide', 'sam_slider' ),
			'search_items'        => __( 'Search Slide', 'sam_slider' ),
			'not_found'           => __( 'Not found', 'sam_slider' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'sam_slider' ),
		);
		$args = array(
			'label'               => __( 'sam_slide', 'sam_slider' ),
			'description'         => __( 'Post type for slides.', 'sam_slider' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', ),
			'taxonomies'          => array( 'category', 'post_tag' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 10,
			'menu_icon'           => 'dashicons-slides',
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
		);
		register_post_type( 'sam_slide', $args );

	}

	// Hook into the 'init' action
	add_action( 'init', 'sam_slide_post_type', 0 );

}

if(function_exists("register_field_group")) {
	register_field_group(array(
		'id' => 'sam_slider',
		'title' => 'Slider',
		'fields' => array(
			array(
				'key' => 'sam_slide_button',
				'label' => __( 'Button', 'sam_slider' ),
				'name' => 'slide_button',
				'type' => 'text',
				'default_value' => __( 'Find Out More', 'sam_slider' ),
				'placeholder' => __( 'Button Text', 'sam_slider' ),
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array(
				'key' => 'sam_slide_button_link',
				'label' => __( 'Button Link', 'sam_slider' ),
				'name' => 'slide_button_link',
				'type' => 'page_link',
				'post_type' => array(
					0 => 'post',
					1 => 'page',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'sam_slide',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array(
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array(
				0 => 'custom_fields',
				1 => 'discussion',
				2 => 'comments',
				3 => 'revisions',
				4 => 'slug',
				5 => 'author',
				6 => 'format',
				7 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
}




/******************************************************/
/******************** Custom Fields *******************/
/******************************************************/



?>
