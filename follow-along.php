<?php
/*
Template Name: Follow Along
*/
get_header(); ?>

            <?php

              $args = array('post_type' => 'post');
              $query = new WP_Query($args);

              if($query->have_posts()) :  ?>
                <div class="row">
<?php
                while($query->have_posts()) : 
                  $query->the_post();

            ?>

<div class="small-12 column">
          <?php the_post_thumbnail(); ?>
<?php the_title(); ?>
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
          </div>
        </div>

<?php get_footer(); ?>
