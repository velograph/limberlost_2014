<?php
/*
Template Name: Follow Along
*/
get_header(); ?>

<section class="article_archive">

  <div class="row">
    <div class="small-12 columns">
      <h1>Follow Along on some of our most recent Adventures</h1>
    </div>
  </div>

<?php
$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

$args = array(
  'posts_per_page' => 5,
  'post_type' => 'post',
  'paged' => $paged,
);

$the_query = new WP_Query( $args );
?>
<!-- the loop etc.. -->
<?php
    if($the_query->have_posts()) :  ?>

      <?php while($the_query->have_posts()) : ?>

        <div class="row article_portal">

          <?php $the_query->the_post(); ?>
          <div class="small-12 column">

            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

          </div>

          <div class="small-12 medium-6 column">
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail(); ?>
            </a>

          </div>

          <div class="small-12 medium-6 column">

            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>">Read More...</a>
            <hr />
            <?php reverie_entry_meta(); ?>
            <hr />
            <?php the_category(); ?> 
            
          </div>

        </div><!-- Row End -->

      <?php endwhile; ?>

    <?php else: ?>

    Oops, there are no posts.

    <?php endif; 
        wp_reset_query();
  ?>

<div class="row">
<hr />
  <div class="small-12 small-centered columns pagination">
    <?php $big = 999999999; // need an unlikely integer

      echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $the_query->max_num_pages
      ) );
    ?>
  </div>

</div>


</section>

<?php get_footer(); ?>
