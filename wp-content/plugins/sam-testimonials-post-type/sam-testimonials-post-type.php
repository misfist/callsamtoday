<?php
/**
 * Plugin Name:  SAM Testimonial Post Type
 * Plugin URI:   http://callsamtoday.com
 * Description:  Creates a custom post type for testimonials. This is not the same as <a href="https://wordpress.org/plugins/testimonials-widget/" target="_blank">Testimonials by Aihrus</a>.
 * Version:      0.1
 * Author:       Pea
 * Author URI:   http://patricia-lutz.com
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
 * @package    SAM_Testimonial_Post_Type
 * @since      0.1
 * @author     Pea
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) exit;


/************* Add Custom Post Type for Testimonials *****************/

// // Flush rewrite rules for testimonial post types
// add_action( 'after_switch_theme', 'sam_flush_rewrite_rules' );

// // Flush your rewrite rules
// function sam_flush_rewrite_rules() {
// 	flush_rewrite_rules();
// }

// let's create the function for the testimonial type
// Register Custom Post Type
if ( ! function_exists('sam_register_testimonial_post_type') ) {

// Register Custom Post Type
function sam_register_testimonial_post_type() {

	$labels = array(
		'name'                => _x( 'Testimonials', 'Post Type General Name', 'testimonials_post_type' ),
		'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'testimonials_post_type' ),
		'menu_name'           => __( 'Testimonials', 'testimonials_post_type' ),
		'parent_item_colon'   => __( 'Parent Item:', 'testimonials_post_type' ),
		'all_items'           => __( 'All Testimonials', 'testimonials_post_type' ),
		'view_item'           => __( 'View Item', 'testimonials_post_type' ),
		'add_new_item'        => __( 'Add New Testimonial', 'testimonials_post_type' ),
		'add_new'             => __( 'Add New', 'testimonials_post_type' ),
		'edit_item'           => __( 'Edit Item', 'testimonials_post_type' ),
		'update_item'         => __( 'Update Item', 'testimonials_post_type' ),
		'search_items'        => __( 'Search Item', 'testimonials_post_type' ),
		'not_found'           => __( 'Not found', 'testimonials_post_type' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'testimonials_post_type' ),
	);
	$args = array(
		'label'               => __( 'testimonials', 'testimonials_post_type' ),
		'description'         => __( 'Post type for Testimonials', 'testimonials_post_type' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', ),
		'taxonomies'          => array( 'testimonial_cat', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-awards',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'testimonials', $args );

}

// Hook into the 'init' action
add_action( 'init', 'sam_register_testimonial_post_type', 0 );

}

/************* Register Taxonomy for Testimonials *****************/

if ( ! function_exists( 'sam_register_testimonial_taxonomy' ) ) {

// Register Custom Taxonomy
function sam_register_testimonial_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Categories', 'Taxonomy General Name', 'testimonials_widget' ),
		'singular_name'              => _x( 'Testimonial Category', 'Taxonomy Singular Name', 'testimonials_widget' ),
		'menu_name'                  => __( 'Testimonial Categories', 'testimonials_widget' ),
		'all_items'                  => __( 'All Categories', 'testimonials_widget' ),
		'parent_item'                => __( 'Parent Categories', 'testimonials_widget' ),
		'parent_item_colon'          => __( 'Parent Categories:', 'testimonials_widget' ),
		'new_item_name'              => __( 'New Category Name', 'testimonials_widget' ),
		'add_new_item'               => __( 'Add New Categories', 'testimonials_widget' ),
		'edit_item'                  => __( 'Edit Categories', 'testimonials_widget' ),
		'update_item'                => __( 'Update Categories', 'testimonials_widget' ),
		'separate_items_with_commas' => __( 'Separate categories with commas', 'testimonials_widget' ),
		'search_items'               => __( 'Search Categories', 'testimonials_widget' ),
		'add_or_remove_items'        => __( 'Add or remove categories', 'testimonials_widget' ),
		'choose_from_most_used'      => __( 'Choose from the most used categories', 'testimonials_widget' ),
		'not_found'                  => __( 'Not Found', 'testimonials_widget' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => false,
	);
	register_taxonomy( 'testimonial_cat', array( 'testimonials' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'sam_register_testimonial_taxonomy', 0 );

}

require plugin_dir_path( __FILE__ ) . '/metaboxes/metabox-functions.php';

?>