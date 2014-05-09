<?php get_header(); ?>

<!-- Row for main content area -->
	
	<?php if ( have_posts() ) : ?>
	
		<?php /* Start the Loop */ ?>
                <div class="row">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'index' ); ?>
		<?php endwhile; ?>
</div>
		
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		
	<?php endif; // end have_posts() check ?>
		
<?php get_footer(); ?>
