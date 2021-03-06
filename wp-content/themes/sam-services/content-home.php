<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package SAM Services (_s)
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('intro-text'); ?>>
	<div class="intro-text">

		<div id="home-text">

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'sam-services' ),
				'after'  => '</div>',
			) );
		?>

		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'sam-services' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
