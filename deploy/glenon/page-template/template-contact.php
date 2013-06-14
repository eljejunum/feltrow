<?php
/**
 * Template Name: Contact Page
 * Description: A Contact Page template
 *
 * @package WordPress
 * @subpackage Glenon-WP
 */

get_header(); 
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

	<?php if ( is_active_sidebar( 'mapbar' ) ) : ?>
	<section id="bigmap" class="clearfix">
		<div class="container">
			<div class="sixteen columns">	
				<div class="gutter alpha omega">
					<?php dynamic_sidebar( 'mapbar' ); ?>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<section id="maincontent">
		<div class="container">		
			<div class="mainside column">
				<div class="gutter alpha">
					<section id="primary" class="main contact-form">
						<div class="main">

							<?php the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
								<h1 class="page-title"><?php the_title(); ?></h1><!-- .entry-header -->
							
								<div class="blog-thumb">
									<?php the_post_thumbnail( 'def-blog-thumb' ); ?>
								</div>

								<div class="entry-content">
									<?php the_content(); ?>
									<?php wp_link_pages( 'before=<div class="page-link">' . __( 'Pages:', 'glenon_wp' ) . '&after=</div>' ); ?>
									<?php edit_post_link( __( 'Edit', 'themename' ), '<span class="edit-link">', '</span>' ); ?>
								</div><!-- .entry-content -->
							</article><!-- #post-<?php the_ID(); ?> -->
						
							<?php comments_template( '', true ) ?>
							
						</div><!-- .main -->
				 
				  </section>  <!-- #primary -->
				</div>  <!-- .gutter .alpha -->
			</div>  <!-- .two-thirds .column --> 
				 
			<?php get_template_part( 'sidebar', 'index' ); //the Sidebar ?>
		</div><!--  .container -->
	</section>
                
<?php get_footer(); ?>