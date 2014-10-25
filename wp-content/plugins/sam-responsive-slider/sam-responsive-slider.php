<?php
/**
 * Plugin Name:  SAM Responsive Slider
 * Plugin URI:   http://callsamtoday.com
 * Description:  Creates a responsive slider.
 * Version:      0.1
 * Author:       Pea
 * Author URI:   http://patricia-lutz.com
 * Text Domain:  sam-responsive-slider
 *
 * Usage: 
 * 	- Shortcode: Insert shortcode [sam-slides] where you'd like to display the slider
 *  - Template: Insert sam_get_slides() in the template where it should display.
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
 * General Public License as published by the Free Software Foundation; either version 2 of the License, 
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * You should have received a copy of the GNU General Public License along with this program; if not, write 
 * to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 *
 * @package    SAM_Responsive_Slider
 * @since      0.1
 * @author     Pea
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 */


if ( ! defined( 'ABSPATH' ) ) exit;


/************* Add Custom Post Type for Slides *****************/

// // Flush rewrite rules for slide post types
add_action( 'after_switch_theme', 'sam_slide_flush_rewrite_rules' );

// // Flush your rewrite rules
function sam_slide_flush_rewrite_rules() {
	flush_rewrite_rules();
}

// let's create the function for the slide type
// Register Custom Post Type
if ( ! function_exists('sam_register_slide_post_type') ) {

	// Register Custom Post Type
	function sam_register_slide_post_type() {

		$labels = array(
			'name'                => _x( 'Slides', 'Post Type General Name', 'sam-slider' ),
			'singular_name'       => _x( 'Slide', 'Post Type Singular Name', 'sam-slider' ),
			'menu_name'           => __( 'Slides', 'sam-slider' ),
			'parent_item_colon'   => __( 'Parent Item:', 'sam-slider' ),
			'all_items'           => __( 'All Slides', 'sam-slider' ),
			'view_item'           => __( 'View Item', 'sam-slider' ),
			'add_new_item'        => __( 'Add New Slide', 'sam-slider' ),
			'add_new'             => __( 'Add New', 'sam-slider' ),
			'edit_item'           => __( 'Edit Item', 'sam-slider' ),
			'update_item'         => __( 'Update Item', 'sam-slider' ),
			'search_items'        => __( 'Search Item', 'sam-slider' ),
			'not_found'           => __( 'Not found', 'sam-slider' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'sam-slider' ),
		);
		$args = array(
			'label'               => __( 'slides', 'sam-slider' ),
			'description'         => __( 'Post type for Slides', 'sam-slider' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', ),
			'taxonomies'          => array( 'post_tag' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-slides',
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		register_post_type( 'slides', $args ); // New post type is slides

	}

	// Hook into the 'init' action
	add_action( 'init', 'sam_register_slide_post_type', 0 );

}

/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
add_filter( 'sam_meta_boxes', 'sam_slides_metaboxes' );

function sam_slides_metaboxes( array $meta_boxes ) {

	$prefix = 'sam';

	/**
	 * Metabox for Slides posts
	 */

	$meta_boxes['cta_metabox'] = array(
		'id'         => 'sam_cta_metabox',
		'title'      => __( 'Button Information', 'sam-slider' ),
		'pages'      => array( 'slides', ), // Post type
		'context'    => 'normal',
		'priority'   => 'core',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => __( 'Button Label', 'sam-slider' ),
				'desc' => __( '', 'sam-slider' ),
				'id'   => $prefix . '_button_label',
				'type' => 'text',
			),
			array(
				'name' => __( 'Button Link', 'sam-slider' ),
				'desc' => __( '', 'sam-slider' ),
				'id'   => $prefix . '_button_link',
				'type' => 'text_url',
			),
		)
	);

	// Add other metaboxes as needed

	return $meta_boxes;
}

/**
 * Initialize the metabox class.
 */

add_action( 'init', 'sam_initialize_slides_meta_boxes', 9999 );

function sam_initialize_slides_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'metaboxes/init.php';

}

/**
 * Display slides
 * Usage: 
 * 	- Shortcode: Insert shortcode [sam-slides] where you'd like to display the slider
 *  - Template: Insert sam_get_slides() in the template where it should display.
 */

function sam_get_slides() {

	echo "<script>";
	echo "jQuery(document).ready(function(){";
	echo "	jQuery('.bxslider').bxSlider({";
	echo "		mode: 'fade',";
	echo "		captions: true,";
	echo "		pager: false,";
	echo "		adaptiveHeight: true,";
	echo "	});";
	echo "});";
	echo "</script>";

	echo '<ul id="sam-slider" class="bxslider">';

		$args = array(
			'post_type'	=> 'slides',
		);
		$slides = get_posts($args);

		foreach($slides as $slide) {
			setup_postdata( $slide );
			$slide_image = wp_get_attachment_url( get_post_thumbnail_id($slide->ID) );

		?>

			<li id="slide-<?php echo $slide->post_name; ?>" class="slide">
				<img src="<?php echo $slide_image ?>" class="slide-image">
				<div class="slide-caption">
					<h2 class="slide-header"><?php echo $slide->post_title; ?></h2>
					<h3 class="slide-text"><?php echo $slide->post_content; ?></h3>
					<?php if(get_post_meta( $slide->ID, 'sam_button_label', true )) { ?>
						<a href="<?php echo get_post_meta( $slide->ID, 'sam_button_link', true ); ?>" class="button slide-button"><?php echo get_post_meta( $slide->ID, 'sam_button_label', true ); ?></a>
					<?php } ?>
				</div>
			</li>

		<?php 
			wp_reset_postdata();
		}

	echo '</ul>';

}

add_shortcode( 'sam-slides', 'sam_get_slides' );


/**
 * Enqueue styles and scripts
 */

function sam_enqueue_script_style() {
	wp_enqueue_script( 'sam-services-responsive-slider', plugins_url( '/bxslider/jquery.bxslider.min.js' , __FILE__ ), array('jquery'), true );
	wp_enqueue_style( 'sam-services-responsive-slider-styles', plugins_url( '/bxslider/jquery.bxslider.css' , __FILE__ ));
	wp_enqueue_style( 'sam-slider-base-styles', plugins_url( '/style.css' , __FILE__ ));
}
add_action( 'wp_enqueue_scripts', 'sam_enqueue_script_style' );


?>