<?php
/**
 * Plugin Name:  SAM Testimonials Widget
 * Plugin URI:   http://callsamtoday.com
 * Description:  Displays a custom post 'testimonials' in a widget as a blockquote. Requires that sam-testimonials-post-type be active.
 * Version:      0.1
 * Author:       Pea
 * Author URI:   http://patricia-lutz.com
 * Text Domain:  sam-testimonial-widget
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
 * @package    SAM_Testimonial_Widget
 * @since      0.1
 * @author     Pea
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) exit;


class sam_testimonial_plugin extends WP_Widget {

	// constructor
	function sam_testimonial_plugin() {
		parent::WP_Widget(false, $name = __('Testimonial Widget', 'sam-testimonial-widget') );
	}

	// widget form creation
	function form($instance) {

	// Check values
	if( $instance) {
		$title = esc_attr($instance['title']);
		$tcategory = esc_attr($instance['tcategory']);

	} else {
		$title = '';
		$tcategory = '';
	}
	?>

	<!-- Widget Title -->   
	<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'sam-testimonial-widget'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>

	<!-- Category Select Menu -->   
	<p>
		<select id="<?php echo $this->get_field_id('tcategory'); ?>" name="<?php echo $this->get_field_name('tcategory'); ?>" class="widefat" style="width:100%;">
			<option value="" selected>Select a Category</option>
		<?php foreach(get_terms('testimonial_cat','hide_empty=1') as $term) { ?>
			<option <?php selected( $instance['tcategory'], $term->term_id ); ?> value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
		<?php } ?>      
		</select>
	</p>
	<?php
	}

	// update widget
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		// Fields
		$instance['title'] = strip_tags($new_instance['title']);

		$instance['tcategory'] = strip_tags($new_instance['tcategory']);

	return $instance;
	}

	// Display the widget
	function widget($args, $instance) {
		extract( $args );
		// these are the widget options
		$title = apply_filters('widget_title', $instance['title']);
		$tcategory = esc_attr($instance['tcategory']);

	   echo $before_widget;

		// Check if title is set
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}

		$args = array( 
			'post_type' => 'testimonials', 
			'posts_per_page' => 1, 
			'orderby' => 'rand',
			);

		// If a category was selected, limit to that category
		if(!empty($tcategory)) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'testimonial_cat',
					'terms'    => $tcategory,
				),
			);
		}

		$postslist = get_posts( $args );

		foreach ( $postslist as $post ) :
		  setup_postdata( $post ); ?> 
			<blockquote>
				<?php the_content(); ?>
				<cite><?php echo get_post_meta( $post->ID, 'sam_client_name', true ); ?></cite>
			</blockquote>
		<?php
		endforeach; 
		wp_reset_postdata();

		echo $after_widget;
	}
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("sam_testimonial_plugin");'));


?>