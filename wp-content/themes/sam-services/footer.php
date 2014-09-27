<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SAM Services (_s)
 */
?>

	</div><!-- #content -->

	<footer class="footer" role="contentinfo">
		<div class="footer-logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo">
				<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
			</a>
		</div>
		<div class="footer-links">
			<?php dynamic_sidebar( 'footer-widget-1' ); ?>
			<?php dynamic_sidebar( 'footer-widget-2' ); ?>
			<?php dynamic_sidebar( 'footer-widget-3' ); ?>
		</div>

		<hr>

		<?php dynamic_sidebar( 'copyleft-widget' ); ?>

	</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
