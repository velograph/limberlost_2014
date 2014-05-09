<?php get_header(); ?>

  <?php /* Start loop */ ?>

    <?php while (have_posts()) : ?>

      <?php the_post(); ?>

        <div class="full-width">

          <div class="featured_image_container">

            <div class="row">
              <header class="single_article_header">
                <div class="small-12 small-centered column entry_meta">
                  <em><?php the_date(); ?></em>
                  <h1 class="entry-title"><?php the_title(); ?></h1>
                </div>
              </header>
            </div>

            <?php the_post_thumbnail(); ?>

          </div>

        </div>

        <div class="row">

          <div class="small-12 medium-8 small-centered columns" id="content" role="main">

            <article <?php post_class() ?> id="post-<?php the_ID(); ?>">

              <div class="entry-content">

                <?php the_content(); ?>

              </div>

              <footer>

                <hr />

                <?php reverie_entry_meta(); ?> | <?php the_category(); ?>

                <?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
                <p class="entry-tags"><?php the_tags(); ?></p>
                <?php edit_post_link('Edit this Post'); ?>

              </footer>

            </article>

            <div class="entry-author panel">
              <div class="row">
                <div class="large-3 columns">
                  <?php echo get_avatar( get_the_author_meta('user_email'), 95 ); ?>
                </div>
                <div class="large-9 columns">
                  <h4><?php the_author_posts_link(); ?></h4>
                  <p class="cover-description"><?php the_author_meta('description'); ?></p>
                </div>
              </div>
            </div>

            <?php comments_template(); ?>

            <?php endwhile; // End the loop ?>

          </div>
      </div>
		
<?php get_footer(); ?>
