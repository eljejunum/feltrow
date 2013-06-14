<?php
/**
 * @package WordPress
 * @subpackage Glenon-WP
 */
 
get_header();  //the Header ?>
<?php get_template_part( 'menu', 'index' ); //the  menu + logo/site title ?>

	<section id="slider">
		<div class="container">
			<div class="breadcrumbs">
				<span><?php _e('You are Here:', 'glenon_wp') ?></span>
				<?php if(function_exists('bcn_display'))
				{
					bcn_display();
				}?>
			</div>
		</div>
	</section>
			
	<section id="maincontent" class="sidebar-<?php echo of_get_option('sidebar-position') ?>">
		<div class="container">		
			<div class="mainside columns">
				<div class="gutter alpha">
					<section id="primary" class="main">
									
						<?php while ( have_posts() ) : the_post(); ?> <!--  the Loop -->
										
						<article id="post-<?php the_ID(); ?>" class="clearfix">
							<ul class="post-data">
								<li><?php echo get_the_date(); ?></li>
								<li><div class="title">            
										<h1 class="contentheading"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title('', ''); ?></a></h1>  <!--Post titles-->
									</div></li>
								<li><?php _e('Category:', 'glenon_wp') ?> <?php the_category(', '); ?></li>
								<li><?php _e('Writen by:', 'glenon_wp') ?> <?php the_author_posts_link(); ?></li>
							</ul>
							<div class="blog-thumb">
								<?php
								if ( has_post_thumbnail() ) { ?>
									<a href="<?php the_permalink(); ?>" class="thumb-link"><?php the_post_thumbnail( 'def-blog-thumb' ); ?></a>
								<?php } else {
									echo '<img src="' . get_template_directory_uri() . '/images/thumbnail-default.jpg" class="wp-post-image" />';
								}
								?>
							</div>

							<div class="entry-content"><?php the_content(); ?>
							<?php 
								$testiname = get_post_meta( $post->ID, '_glenon_testimonial_name', true );
								$testiaddr = get_post_meta( $post->ID, '_glenon_testimonial_desc', true );
								$testiemail = get_post_meta( $post->ID, '_glenon_testimonial_email', true );
								$testiurl = get_post_meta( $post->ID, '_glenon_testimonial_url', true );
							?>
								<?php if ($testiname != '') { ?><span class="strong"><?php echo $testiname ?></span><?php } ?>
								<?php if ($testiaddr != '') { ?><span><?php echo $testiaddr ?></span><?php } ?>
								<?php if ($testiemail != '') { ?><span><?php echo $testiemail ?></span><?php } ?>
								<?php if ($testiurl != '') { ?><a href="<?php echo $testiurl ?>" target="_blank" ><?php echo $testiurl ?></a><?php } ?>
							</div> <!--The Content-->
							
							<div class="post-tags"><?php the_tags('<span>'. _e('Tags:', 'glenon_wp') .'</span>' , ', '); ?></div>
							
						</article><!-- #post-<?php the_ID(); ?> -->
									
						<?php endwhile; ?><!--  End the Loop -->
						
					<?php comments_template( '', true ) ?>
				 
				  </section>  <!-- #primary -->
				</div>  <!-- .gutter .alpha -->
			</div>  <!-- .two-thirds .column -->
				 
			<?php get_template_part( 'sidebar', 'index' ); //the Sidebar ?>
		</div><!--  .container -->
	</section><!--  #maincontent -->
            
<?php get_footer(); //the Footer ?>