<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?> > <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?> > <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?> "> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?> > <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">

	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

	<!-- Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width" />

	<!-- Favicon and Feed -->
	<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">

	<!--  iPhone Web App Home Screen Icon -->
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon-retina.png" />
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon.png" />

	<!-- Enable Startup Image for iOS Home Screen Web App -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/mobile-load.png" />

	<!-- Startup Image iPad Landscape (748x1024) -->
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load-ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)" />
	<!-- Startup Image iPad Portrait (768x1004) -->
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load-ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)" />
	<!-- Startup Image iPhone (320x460) -->
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load.png" media="screen and (max-device-width: 320px)" />

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/parallax.js"></script>

<?php wp_head(); ?>

</head>

<body <?php body_class('antialiased'); ?>>

<div class="off-canvas-wrap" data-offcanvas>

  <div class="inner-wrap">

    <aside class="left-off-canvas-menu">

      <div class="row off-canvas-logo">

        <div class="small-8 small-centered columns">
          <img src="<?php bloginfo('template_directory'); ?>/img/limberlost_logo_mobile.svg" />
        </div>

      </div>


      <?php
        wp_nav_menu( array(
          'theme_location' => 'primary',
          'container' => false,
          'depth' => 0,
          'items_wrap' => '<ul class="">%3$s</ul>',
          'fallback_cb' => 'reverie_menu_fallback', // workaround to show a message to set up a menu
        ) );
      ?>

      <div class="row off-canvas-monogram">

        <div class="small-4 small-centered columns">
              <img src="<?php bloginfo('template_directory'); ?>/img/limberlost_monogram.svg" />
        </div>

      </div>

    </aside>

    <section class="main-section">

      <header class="fixed contain-to-grid header">

          <div class="top_branding">
            <div class="row">

              <a class="show-for-small-only left-off-canvas-toggle menu-icon" href="#"><span></span></a>

              <div class="small-4 medium-2 small-centered columns">

                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                  <img src="<?php bloginfo('template_directory'); ?>/img/limberlost_logo.svg" />
                </a>

              </div>
            </div>
          </div>

          <nav class="show-for-medium-up medium-12 medium-centered columns top_navigation">

            <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'depth' => 0,
                    'items_wrap' => '<ul class="">%3$s</ul>',
                    'fallback_cb' => 'reverie_menu_fallback', // workaround to show a message to set up a menu
                ) );
            ?>

          </nav>
  </header>

  <!-- Start the main container -->
  <div class="container" role="document">

  <?php if( is_front_page() ) :?>
          <div class="full-width">
            <div class="home_featured_image">
              <?php

                $args = array('pagename' => 'home');
                $query = new WP_Query($args);

                if($query->have_posts()) : 
                  while($query->have_posts()) : 
                    $query->the_post();

              ?>

              <?php
                $target_post_id = '6';
                $src = wp_get_attachment_image_src( get_post_thumbnail_id($target_post_id), 'subpage-header', false, '' );
              ?>
              <div id="static_home_banner" class="show-for-medium-down">
                <?php the_post_thumbnail(); ?>
                <img class="overlay_script" src="<?php the_field('image_overlay_script'); ?>" />
              </div>

              </div>
              <!-- Show parallax for large screens -->
              <div class="show-for-large-up">
                <section id="parallax" data-speed="10" data-type="background" style="background: url(<?php echo $src[0]; ?> ) repeat 50% top fixed; background-size: cover;">

                  <div>
                    <img src="<?php the_field('image_overlay_script'); ?>" />
                  </div>

                </section>
              </div>
                    
              <?php
                  endwhile;
                  else: 
              ?>

                  Oops, there are no posts.

              <?php
                  endif;
                wp_reset_query();
              ?>
            </div>
          </div>
            

          <section class="our_story_home">

              <!-- Grab the Title and content from 'Who is Limberlost' -->
              <?php

                $args = array('pagename' => 'our-story');
                $query = new WP_Query($args);

                if($query->have_posts()) : 
                  while($query->have_posts()) : 
                    $query->the_post();

              ?>

              <div class="show-for-large-up">
                <?php the_post_thumbnail(); ?>
              </div>

              <div class="our_story_excerpt">

                <div class="row">

                  <div class="small-12 medium-8 small-centered column">

                    <h1><a href="/our-story"><?php the_field('excerpt_title'); ?></a></h1>

                    <div class='intro-content'><?php the_excerpt() ?></div>      

                  </div>

                </div>

              </div>
                    
              <?php
                  endwhile;
                  else: 
              ?>

                  Oops, there are no posts.

              <?php
                  endif;
                wp_reset_query();
              ?>

            </section>


      <?php endif; ?>
          <div class="follow_along main_container full-width">

          <?php if( is_front_page() ) :?>

            <div class="row">

              <div class="small-12 small-centered column">

                <h1><a href="/follow-along">FOLLOW ALONG</a></h1>
                <h3>Recent stories, trip reports, gear reviews, recipes and more from the road less traveled.</h3>

              </div>

            </div>

          <?php endif; ?>

