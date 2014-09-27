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

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->

		<ul class="bullets">
		  <li class="bullet four-col-bullet">
		    <div class="bullet-icon bullet-icon-1">
		      <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/placeholder_logo_1.png
		" alt="">
		    </div>
		    <?php dynamic_sidebar( 'home-widget-1' ); ?>
		  </li>  
		  <li class="bullet four-col-bullet">
		    <div class="bullet-icon bullet-icon-2">
		      <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/placeholder_logo_2.png" alt="">
		    </div>
		    <?php dynamic_sidebar( 'home-widget-2' ); ?>
		  </li>
		  <li class="bullet four-col-bullet">
		    <div class="bullet-icon bullet-icon-3">
		      <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/placeholder_logo_3.png" alt="">
		    </div>
		    <?php dynamic_sidebar( 'home-widget-3' ); ?>
		  </li> 
		  <li class="bullet four-col-bullet">
		    <div class="bullet-icon bullet-icon-4">
		      <img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/placeholder_logo_4.png" alt="">
		    </div>
		    <?php dynamic_sidebar( 'home-widget-4' ); ?>
		  </li> 
		</ul>

	</div><!-- #primary -->

<?php get_footer(); ?>
