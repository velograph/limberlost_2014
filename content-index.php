<?php
/**
 * The template for displaying the home page blog feed.
 *
 * @subpackage Reverie
 * @since Reverie 4.0
 */
?>

  <div class="small-12 medium-3 columns" role="main">
    <article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
            <div class="entry-content">
              <a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) {the_post_thumbnail('large'); } ?></a>
            </div>
            <header class="small-12 column">
              <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
            </header>
    </article>
  </div>
