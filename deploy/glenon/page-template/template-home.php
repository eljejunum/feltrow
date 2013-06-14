<?php
/**
 * Template Name: Home default
 * Description: Default home template
 *
 * @package WordPress
 * @subpackage Glenon-WP
 */
 ?>
<?php get_header();  //the Header
	get_template_part( 'menu', 'index' ); //the  menu + logo/site title
	get_template_part('includes/slider');
	get_template_part('includes/latest-blog');
	get_template_part('includes/project'); ?>	
			
	<section id="maincontent" class="sidebar-<?php echo of_get_option('home-sidebar-position') ?>">	
		<div class="container">	
			
			<section id="homepage" class="mainside columns">
				<div class="gutter alpha omega">
					<div class="main">
						
						<?php before_content(); //Sidebar Before Content
						
						if ( have_posts() && the_content() != '' ) : while ( have_posts() ) : the_post(); ?> <!--  the Loop -->
										
						<article id="post-<?php the_ID(); ?>">
							<?php if ( of_get_option('mas-home-title') ) : ?>
							<div class="title">            
								<h3 class="post-title"><span><?php the_title('', ''); ?><span></h3> 
							</div>
							<?php endif; ?>
							
							<?php the_content(); ?><!--The Content-->
						</article>
									
						<?php endwhile; endif; // End the Loop ?>
						
						<?php after_content(); //Sidebar After Content ?>
				 
					</div>  <!-- .main -->
				</div>  <!-- .gutter .alpha -->
			</section>  <!-- #homepage.mainside.column -->
		
			<?php get_template_part( 'sidebar', 'index' ); //the Sidebar ?>
				 
		</div><!-- .container -->
	</section><!--  #maincontent -->
	
<?php get_footer(); //the Footer ?>