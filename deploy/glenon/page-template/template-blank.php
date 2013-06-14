<?php
/**
 * Template Name: Blank Template
 * Description: Blank template for page builder
 *
 * @package WordPress
 * @subpackage Glenon-WP
 */
 ?>
<?php get_header();  //the Header ?>
<?php get_template_part( 'menu', 'index' ); //the  menu + logo/site title ?>
			
	<section id="blankTemp" class="content">	
		<div class="container">	
			
			<section class="sixteen columns">
				<div class="gutter alpha omega">
					<div class="main"> 
						<?php while ( have_posts() ) : the_post(); ?> <!--  the Loop -->
										
						<article id="post-<?php the_ID(); ?>">
							<?php the_content(); ?><!--The Content-->
						</article>
									
						<?php endwhile; ?><!--  End the Loop -->
				 
					</div>  <!-- .main -->
				</div>  <!-- .gutter .alpha -->
			</section>  <!-- #blankTemp.sixteen.columns -->
				 
		</div><!-- .container -->
	</section><!--  #maincontent -->
            
<?php get_footer(); //the Footer ?>