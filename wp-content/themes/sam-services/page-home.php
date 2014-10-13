<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package SAM Services (_s)
 */

get_header(); ?>

	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'home' ); ?>

		<?php endwhile; // end of the loop.  ?>
		
		</main><!-- #main -->

		<section class="home-promos">
			<ul class="bullets">
			  <li class="bullet four-col-bullet">
			    <div class="bullet-icon bullet-icon-1">
			      <img src="<?php echo get_template_directory_uri(); ?>/images/icon-service-support.png" alt="">
			    </div>
			    <?php dynamic_sidebar( 'home-widget-1' ); ?>
			  </li>  
			  <li class="bullet four-col-bullet">
			    <div class="bullet-icon bullet-icon-2">
			      <img src="<?php echo get_template_directory_uri(); ?>/images/icon-service-audio.png" alt="">
			    </div>
			    <?php dynamic_sidebar( 'home-widget-2' ); ?>
			  </li>
			  <li class="bullet four-col-bullet">
			    <div class="bullet-icon bullet-icon-3">
			      <img src="<?php echo get_template_directory_uri(); ?>/images/icon-service-video.png" alt="">
			    </div>
			    <?php dynamic_sidebar( 'home-widget-3' ); ?>
			  </li> 
			  <li class="bullet four-col-bullet">
			    <div class="bullet-icon bullet-icon-4">
			      <img src="<?php echo get_template_directory_uri(); ?>/images/icon-service-technology.png" alt="">
			    </div>
			    <?php dynamic_sidebar( 'home-widget-4' ); ?>
			  </li> 
			</ul>
		</section>

	</div><!-- #primary -->

<?php get_footer(); ?>
