<?php
/*
Template Name: Join Us
*/
get_header(); ?>

<section class="join_us">

  <!-- Grab the Title and content from 'Who is Limberlost' -->
  <?php

    $args = array('pagename' => 'join-us');
    $query = new WP_Query($args);

    if($query->have_posts()) : 
      while($query->have_posts()) : 
        $query->the_post();

  ?>

  <div class="row">

    <div id="content" class="small-12 medium-11 small-centered column">

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

</section>

<section class="trip_teasers">
  <?php

    $args = array('post_type' => 'page', 'post_parent' => 56, 'order' => 'ASC', 'orderby' => 'menu_order');
    $query = new WP_Query($args);

    if($query->have_posts()) : 
  ?>


  <?php
      while($query->have_posts()) : 
        $query->the_post();

  ?>
<?php global $post;
$post_slug = $post->post_name; ?>
    <div class="<?php echo $post_slug; ?> trip">
      <div class="entry_content">
        <div class="row">
          <div class="small-12 columns">
          <?php the_post_thumbnail('featured_image'); ?>
          </div>
        </div>
        <div class='row post-content'>
          <?php the_content() ?>
        </div>
      </div>
    </div>
        
  <?php
      endwhile;
  ?>

  <?php
      endif;
    wp_reset_query();
  ?>

</section>

<?php get_footer(); ?>
