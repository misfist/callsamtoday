<?php
/**
 * Plugin Name:  Testimonials Widget
 * Plugin URI:   http://callsamtoday.com
 * Description:  Displays a post categorized as "Testimonials" in a widget as a blockquote.
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
 * @package    Testimonials_Widget
 * @since      0.1
 * @author     Pea
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class testimonials_widget extends WP_Widget {

	function __construct() {
	parent::__construct(
	// Base ID of your widget
	'testimonials_widget', 

	// Widget name will appear in UI
	__('Testimonials', 'testimonials_widget_domain'), 

	// Widget description
	array( 
		'description' => __( 'Widget to display testimonials', 'testimonials_widget_domain' ), ) 
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title']; ?>

			<?php
			$cat = get_category_by_slug( 'testimonials' );
			$cat_id = $cat->term_id;
			$args = array( 'category' => $cat_id, 'posts_per_page' => 1, 'orderby' => 'rand' );
			$postslist = get_posts( $args );

			foreach ( $postslist as $post ) :
			  setup_postdata( $post ); ?> 
				<blockquote>
					<?php the_excerpt(); ?>
					<cite><?php echo $post->post_title; ?></cite>
				</blockquote>
			<?php
			endforeach; 
			wp_reset_postdata();
			?>

			<?php echo $args['after_widget'];
	}
			
	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( '', 'testimonials_widget_domain' );
		}
		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}
		
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
} // Class testimonials_widget ends here

// Register and load the widget
function testimonials_load_widget() {
	register_widget( 'testimonials_widget' );
}
add_action( 'widgets_init', 'testimonials_load_widget' );

?>