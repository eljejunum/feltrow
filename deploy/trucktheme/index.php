<?php get_header(); ?>
	<div class="content"><!-- Content Wrapper -->
		<?php while (have_posts()) : ?>
					<?php the_post(); ?>

				
					<?php the_content(); ?>
		<?php endwhile; ?>

	</div><!-- Content Wrapper end -->
</div><!-- Main Wrapper end -->
<?php get_footer(); ?>

