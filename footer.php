          </div><!-- Row End -->

	</div><!-- Row End -->

</div><!-- Container End -->

<section class="who_is_limberlost">

  <!-- Grab the Title and content from 'Who is Limberlost' -->
  <?php

    $args = array('page_id' => 15);
    $query = new WP_Query($args);

    if($query->have_posts()) : 
      while($query->have_posts()) : 
        $query->the_post();

  ?>

  <div class="row">
    <div class="small-12 column">
          <h1><?php the_title() ?></h1>
          <div class='post-content'><?php the_content() ?></div>      
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

  <!-- Grab the names, titles, and excerpts from people -->
  <?php

    $args = array('post_type' => 'page', 'post_parent' => 15, 'order' => 'ASC', 'orderby' => 'menu_order');
    $query = new WP_Query($args);

    if($query->have_posts()) : 
  ?>
  <div class="row">
  <?php
      while($query->have_posts()) : 
        $query->the_post();

  ?>
    <div class="small-12 medium-4 column employee_excerpt">
      <div class="entry_content">
        <?php the_post_thumbnail(); ?>
        <h3><?php the_title() ?></h3>
        <em><?php the_field('employee_title'); ?></em>
        <div class='post-content'><?php the_excerpt() ?></div>      
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

<section class="stay_in_touch">

  <!-- Grab the page with the signup -->
  <?php

    $args = array('page_id' => 50);
    $query = new WP_Query($args);

    if($query->have_posts()) : 
  ?>
  <div class="row">
  <?php
      while($query->have_posts()) : 
        $query->the_post();

  ?>
    <div class="small-12 column">
      <div class="entry_content">
        <?php the_post_thumbnail(); ?>
        <h3><?php the_title() ?></h3>
<?php the_field('sign_up_intro'); ?>
        <div class='post-content'><?php the_excerpt() ?></div>      
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

<div class="show-for-medium-up full-width footer_top">

  <div class="medium-4 column persimmon_footer">

    &nbsp;

  </div>

  <div class="medium-4 column baby_blue_footer">

    &nbsp;

  </div>

  <div class="medium-4 column mustard_footer">

    &nbsp;

  </div>

</div>

<footer class="full-width footer" role="contentinfo">
	<div class="row">
		<div class="large-12 columns">
			<?php wp_nav_menu(array('theme_location' => 'utility', 'container' => false, 'menu_class' => 'inline-list')); ?>
		</div>
	</div>
	<div class="row love-reverie">
		<div class="large-12 columns">
			<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('Made with Love in','reverie'); ?> <a href="http://themefortress.com/reverie/" rel="nofollow" title="Reverie Framework">Reverie</a>.</p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

<script>
	(function($) {
		$(document).foundation();
	})(jQuery);
</script>
	
</body>
</html>
