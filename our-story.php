<?php
/*
Template Name: Our Story
*/
get_header(); ?>

<section class="our_story">

  <!-- Grab the Title and content from 'Who is Limberlost' -->
  <?php

    $args = array('pagename' => 'our-story');
    $query = new WP_Query($args);

    if($query->have_posts()) : 
      while($query->have_posts()) : 
        $query->the_post();

  ?>

        <div class="full-width">

          <div class="featured_image_container">

            <div class="row">
              <header class="single_article_header">
                <div class="small-12 small-centered column entry_meta">
                  <h1 class="entry-title"><?php the_title(); ?></h1>
                </div>
              </header>
            </div>

            <?php the_post_thumbnail(); ?>

          </div>

        </div>

  <div class="row">

    <div id="content" class="small-12 medium-10 small-centered column">

      <div class='intro-content'><?php the_content() ?></div>      

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

<hr />

</section>

<section class="who_is_limberlost">
  <!-- Grab the names, titles, and excerpts from people -->
  <?php

    $args = array('post_type' => 'page', 'post_parent' => 15, 'order' => 'ASC', 'orderby' => 'menu_order');
    $query = new WP_Query($args);

    if($query->have_posts()) : 
  ?>
  <div class="row">
  <h1 class="small-12 columns">Who is Limberlost?</h1>
  </div>

  <div class="row our_story_bios">

  <?php
      while($query->have_posts()) : 
        $query->the_post();

  ?>
    <div <?php post_class('small-12 medium-4 column employee_excerpt'); ?> >
      <div class="entry_content">
        <?php the_post_thumbnail(); ?>
        <div class='post-content'>
          <h2><?php the_title() ?></h2>
          <em><?php the_field('employee_title'); ?></em>
          <?php the_excerpt() ?>
        </div>
      </div>
    </div>
        
  <?php
      endwhile;
  ?>
  </div>
  <?php
      else: 
  ?>

      Oops, there are no posts.

  <?php
      endif;
    wp_reset_query();
  ?>

</section>

<?php get_footer(); ?>