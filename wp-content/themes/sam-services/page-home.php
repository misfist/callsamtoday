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

			<!-- Slider -->

			<script>

			jQuery('#news-demo').slippry({
				// general elements & wrapper
				slippryWrapper: '<div class="sy-box news-slider" />', // wrapper to wrap everything, including pager
				elements: 'article', // elments cointaining slide content

				// options
				adaptiveHeight: false, // height of the sliders adapts to current 
				captions: false,

				// pager
				pagerClass: 'news-pager',

				// transitions
				transition: 'horizontal', // fade, horizontal, kenburns, false
				speed: 1200,
				pause: 8000,

				// slideshow
				autoDirection: 'prev'
			});
						
			</script>

			<section id="news-demo">
				<article>
					<div class="text-content">
						<h2>Boats by the bay</h2>
						<p>This summer there were, surprise surprise, boats on the bay! Often the sun will shine and when it's partially cloudy we get the 'God' or 'Holy Light' effect. It's pretty cool huh? I wonder what it's pointing to... treasure? Bitcoins?</p>
						<a href="#!" class="button-link read-more">read more</a>
					</div>
					<div class="image-content"><img src="/assets/img/image-1.jpg" alt="demo1_1"></div>
				</article>
				<article>
					<div class="text-content">
						<h2>The winter is coming</h2>
						<p>And isn't it pretty? It's strange, people who live through heavy winters seem to want to get out of it as soon as possible, yet those who live in more temperate climates see snow and a 'real' winter as an amazing thing that must be experienced.</p>
						<a href="#!" class="button-link read-more">read more</a>
					</div>
					<div class="image-content"><img src="/assets/img/image-2.jpg" alt="demo1_1"></div>
				</article>
				<article>
					<div class="text-content">
						<h2>In front of Versailles</h2>
						<p>The Palace of Versailles is pretty amazing, not just inside, but also the outside garden, where you'll find gardens like these sporting amazing ranges of flora.</p>
						<a href="#!" class="button-link read-more">read more</a>
					</div>
					<div class="image-content"><img src="/assets/img/image-3.jpg" alt="demo1_1"></div>
				</article>
			</section>

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
