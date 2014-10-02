<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package SAM Services (_s)
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'sam-services' ); ?></a>

	<header id="masthead" class="site-header navigation" role="banner">

		<div class="navigation-wrapper">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo">
				<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
			</a>
			<a href="" class="navigation-menu-button" id="js-mobile-menu">MENU</a>

			<script>

			jQuery(document).ready(function() {
			  var menu = jQuery('#navigation-menu');
			  var menuToggle = jQuery('#js-mobile-menu');
			  var signUp = jQuery('.contact');

			  jQuery(menuToggle).on('click', function(e) {
			    e.preventDefault();
			    menu.slideToggle(function(){
			      if(menu.is(':hidden')) {
			        menu.removeAttr('style');
			      }
			    });
			  });

			  // underline under the active nav item
			  jQuery(".nav .menu-item").click(function() {
			    jQuery(".nav .menu-item").each(function() {
			      jQuery(this).removeClass("active-nav-item");
			    });
			    jQuery(this).addClass("current-menu-item");
			    jQuery(".nav .menu-item-has-children").removeClass("current-menu-item");
			  });
			});
			</script>

			<?php

			$defaults = array(
			'theme_location'  => 'primary',
			'menu'            => '',
			'container'       => 'div',
			'container_class' => 'nav',
			'container_id'    => '',
			'menu_class'      => 'menu',
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="navigation-menu" class="%2$s">%3$s</ul>',
			'depth'           => 0,
			'walker'          => ''
			);

			wp_nav_menu( $defaults );

			?>

			<div class="navigation-tools">
				<?php dynamic_sidebar( 'header-widget' ); ?>

			<!--  <div class="search-bar">
			<div class="search-and-submit">
			<input type="search" placeholder="Enter Search" />
			<button type="submit">
			<img src="https://raw.githubusercontent.com/thoughtbot/refills/master/source/images/search-icon.png" alt="Search Icon">
			</button>
			</div>
			</div> -->
			<a href="/contact" class="contact">Contact</a>
			<!-- <a href="javascript:void(0)" class="sign-up">Sign Up</a> -->
			</div>
		</div>


	</header><!-- #masthead -->

	<div id="content" class="site-content">
