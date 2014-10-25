<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category SAM
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

// add_filter( 'cmb_meta_boxes', 'cmb_sam_slides_metaboxes' );
// /**
//  * Define the metabox and field configurations.
//  *
//  * @param  array $meta_boxes
//  * @return array
//  */
// function cmb_sam_slides_metaboxes( array $meta_boxes ) {

// 	$prefix = 'sam';

// 	/**
// 	 * Metabox for Press posts
// 	 */

// 	$meta_boxes['customer_metabox'] = array(
// 		'id'         => 'client_metabox',
// 		'title'      => __( 'Client Information', 'sam-slider' ),
// 		'pages'      => array( 'testimonials', ), // Post type
// 		'context'    => 'normal',
// 		'priority'   => 'core',
// 		'show_names' => true, // Show field names on the left
// 		'fields'     => array(
// 			array(
// 				'name' => __( 'Client Name', 'sam-slider' ),
// 				'desc' => __( '', 'sam-slider' ),
// 				'id'   => $prefix . '_client_name',
// 				'type' => 'text',
// 			),
// 			array(
// 				'name' => __( 'Client URL', 'sam-slider' ),
// 				'desc' => __( '', 'sam-slider' ),
// 				'id'   => $prefix . '_client_url',
// 				'type' => 'text_url',
// 			),
// 		)
// 	);

// 	// Add other metaboxes as needed

// 	return $meta_boxes;
// }

// add_action( 'init', 'cmb_initialize_sam_slides_meta_boxes', 9999 );
// /**
//  * Initialize the metabox class.
//  */
// function cmb_initialize_sam_slides_meta_boxes() {

// 	if ( ! class_exists( 'cmb_Meta_Box' ) )
// 		require_once 'init.php';

// }
