
              </div><!-- Row End -->

      </div><!-- Container End -->

      <?php if( is_front_page() ) :?>
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

          <div class="small-12 medium-10 small-centered column">

            <h1><?php the_title() ?></h1>

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

      <?php endif; ?>

      <section class="stay_in_touch">

        <div class="mailing_signup">

          <?php get_template_part('content', 'mailing'); ?>

        </div>

        <div class="social_connect">

          <div class="row">
            <h2 class="small-12 small-centered columns">OR FIND US ELSEWHERE ON THE WEB:</h2>
          </div>

          <div class="row">

            <div class="small-12 small-centered columns">

              <ul>
                <li>
                  <a href="<?php the_field('facebook', 6); ?>" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/facebook.svg" />
                  </a>
                </li>

                <li>
                  <a href="<?php the_field('instagram', 6); ?>" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/instagram.svg" />
                  </a>
                </li>

                <li>
                  <a href="<?php the_field('tumblr', 6); ?>" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/tumblr.svg" />
                  </a>
                </li>

                <li>
                  <a href="<?php the_field('twitter', 6); ?>" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/twitter.svg" />
                  </a>
                </li>
              </ul>

            </div>

          </div>

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

          <div class="small-12 small-centered columns">

            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Sally forth!</p>

          </div>

        </div>

      </footer>

    </section><!-- closes out the off-canvas-menu -->

  </div><!-- .inner-wrap -->

</div><!-- .off-canvas-wrap -->


<?php wp_footer(); ?>

<script>
	(function($) {
		$(document).foundation();
	})(jQuery);
</script>
	
</body>
</html>
