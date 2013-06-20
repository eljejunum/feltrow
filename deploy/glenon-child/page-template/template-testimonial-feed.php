<?php
/**
 * Template Name: Testimonial Feed
 * Template Description: Shows a page feed of Testimonial posts
 * @package WordPress
 * @subpackage Glenon-WP
 */
 ?>
<?php 
	get_header();  //the Header
	get_template_part( 'menu', 'index' ); //the  menu + logo/site title ?>
	
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
				<!--THE LOOP-->
				<?php while ( have_posts() ) : the_post(); ?> <!--  the Loop -->
					<article id="post-<?php the_ID(); ?>" class="blog-lay clearfix">
						<div class="">
							<?php if ( has_post_thumbnail() ) { ?>
								<a href="<?php the_permalink(); ?>" class="thumb-link"><?php the_post_thumbnail( 'def-blog-thumb' ); ?></a>
							<?php } ?>
						</div>
						<div class="the-date">            
							<span class="date-only"><?php the_time('d'); ?></span><br>
							<span class="month-year"><?php the_time('M Y'); ?></span>
						</div>
							<ul class="post-data">
								<li class="for-title"><h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title('', ''); ?></a></h2>  <!--Post titles--></li>
							</ul>
						<p><?php 
						global $more;    // Declare global $more (before the loop).
						$more = 0;       // Set (inside the loop) to display content above the more tag.
						echo preg_replace("/\[caption .+?\[\/caption\]|\< *[img][^\>]*[.]*\>/i","",get_the_excerpt(''),1); ?></p>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="more-link"><span class="block"><?php _e('Read More', 'glenon_wp') ?></span></a>
					</article> <!--The Content-->
				<?php endwhile; ?><!--  End the Loop -->
			</div>
			
			
			
			
			<!--SIDEBAR-->
			<?php get_template_part( 'sidebar', 'index' ); //the Sidebar ?>
		</div>
	</section>
            
<?php get_footer(); //the Footer ?>
                        
           
