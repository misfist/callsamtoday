<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package SAM Services (_s)
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

		<?php 
		$cat = get_category_by_slug( 'testimonials' );
		$cat_id = $cat->term_id;
		?>

		<?php
		// Don't include posts categorized as 'testimonials'
		$args = array( 'category__not_in' => $cat_id); ?>

		<?php $postlist = get_posts( $args ); ?>

		<?php foreach ( $postlist as $post ) : setup_postdata( $post ); ?>
		<?php
				/* Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );
			?>
		<?php endforeach; ?>

		<?php sam_services_paging_nav(); ?>

		<?php wp_reset_postdata();?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
