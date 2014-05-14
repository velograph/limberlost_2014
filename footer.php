
              </div><!-- Row End -->

      </div><!-- Container End -->

      <?php if( is_front_page() ) : ?>

          <section class="employee_bios">
          <!-- Grab the names, titles, and excerpts from people -->
          <?php

            $args = array('post_type' => 'page', 'post_parent' => 15, 'order' => 'ASC', 'orderby' => 'menu_order');
            $query = new WP_Query($args);

            if($query->have_posts()) : 
          ?>
          <div class="row">

          <h1 class="small-12 medium-11 columns">We've Got This</h1>
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

      <?php if( is_front_page() ) : ?>

        <section class="stay_in_touch_large stay_in_touch">

            <?php get_template_part('content', 'mailing_home'); ?>

        </section>

      <?php else : ?>

        <section class="stay_in_touch_small stay_in_touch">

            <?php get_template_part('content', 'mailing_small'); ?>

        </section>

      <?php endif; ?>

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

        <div class="row sponsor_logos">

          <div class="small-12 medium-offset-2 medium-2 columns">

            <a href="http://doubledarn.com" target="_blank">
              <img src="<?php echo get_template_directory_uri(); ?>/img/double_darn_logo.svg" />
            </a>

          </div>

          <div class="small-12 medium-2 columns">

            <a href="http://velodirt.com" target="_blank">
              <img src="<?php echo get_template_directory_uri(); ?>/img/velodirt_logo.svg" />
            </a>

          </div>

          <div class="small-12 medium-2 columns">

            <a href="http://www.ruckuscomp.com/" target="_blank">
              <img src="<?php echo get_template_directory_uri(); ?>/img/ruckus_logo.svg" />
            </a>

          </div>

          <div class="small-12 medium-2 left columns">

            <a href="http://sellwoodcycle.com" target="_blank">
              <img src="<?php echo get_template_directory_uri(); ?>/img/sellwood_logo.svg" />
            </a>

          </div>

        </div>

        <div class="row">

          <div class="small-12 medium-offset-4 medium-4 columns">

            <ul>
              <li>
                <a href='m&#97;ilt&#111;&#58;h%65&#108;&#37;6C%6F&#64;l%&#54;&#57;mb&#101;&#114;&#37;6C%&#54;F&#37;73t&#46;&#37;&#54;3%6&#70;'>&#104;ello&#64;limberlos&#116;&#46;co</a>
              </li>
              <?php
                  wp_nav_menu( array(
                      'theme_location' => 'primary',
                      'container' => false,
                      'depth' => 0,
                      'fallback_cb' => 'reverie_menu_fallback', // workaround to show a message to set up a menu
                  ) );
              ?>
              <li>
                <span class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></span>
              </li>

<!--
Hold off on this for a bit
              <li>
                <a href="http://velograph.net" target="_blank" class="site_credit">Site by Velograph</a>
              </li>
-->

            </ul>

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
