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
			<section id="blogpage" class="mainside columns">
				<div class="gutter alpha">
					<div class="main"> 
						<?php if (of_get_option('mas-blog-title')) : ?>
						<h2 class="page-title"><?php echo of_get_option('mas-blog-cat-title') ?></h2>
						<?php endif; ?>
						
						<?php 
							$args = array(
								'post_type'			=> 'testimonial',
								'post_status'		=> array('publish', 'inherit'),
								'posts_per_page'	=> '25',
								'order'				=> 'DESC',
							);	
							$wpblog = new WP_Query( $args );
							if( $wpblog->have_posts() ):
						?>
								<ul class="dpe-flexible-posts">
								
								<?php while( $wpblog->have_posts() ) : $wpblog->the_post(); ?>
								
									<li id="flex-post-<?php the_ID(); ?>" <?php post_class(); ?>>
										
										<?php if( $thumbnail == true ) : ?>
										<p class="testi-content">
											<?php the_post_thumbnail( $thumbsize ); ?>
										</p>
										<?php endif; ?>
										<ul class="post-data">
											<li class="for-title"><h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title('', ''); ?></a></h2>  <!--Post titles--></li>
										</ul>
										<blockquote class="testimonial-quote"><?php the_content(); ?></blockquote>
										<p class="testi-content">
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
										</p>
									</li>
								<?php endwhile; ?>
								</ul><!-- .dpe-flexible-posts -->
							<?php else: // We have no posts ?>
								<div class="dpe-flexible-posts no-posts">
									<p><?php _e('No post found', 'glenon_wp') ?></p>
								</div>
						<?php endif; ?>
						
					<?php wp_reset_postdata(); ?>
				 
				  </div>  <!-- .main -->
				</div>  <!-- .gutter .alpha -->
			</section>  <!-- #homepage .two-thirds .column -->
			
			
			
			
			<!--SIDEBAR-->
			<?php get_template_part( 'sidebar', 'index' ); //the Sidebar ?>
		</div>
	</section>
            
<?php get_footer(); //the Footer ?>
    