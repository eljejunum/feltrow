<?php
/**
 * Template Name: Home3
 * Description: Default home template
 *
 * @package WordPress
 * @subpackage Glenon-WP
 */
 ?>
<?php 
	get_header();  //the Header 
	get_template_part( 'menu', 'index' ); //the  menu + logo/site title ?>

	<?php // if ( ! is_front_page() ) : ?>
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
	<?php // endif; ?>

	<section id="maincontent">
		<div class="container">

			<div class="sixteen columns">
				<div class="gutter alpha omega">
					<section id="primary" class="portf four-columns home3">
						<div id="content">

							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
								<header class="title">
									<h1 class="contentheading"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php _e( 'Portfolio', 'glenon_wp' ) ?></a></h1>
								</header><!-- .entry-header -->

								<div class="entry-content">
									<?php the_content(); ?>
								</div><!-- .entry-content -->
							</article><!-- #post-<?php the_ID(); ?> -->
							
							<?php endwhile; endif; ?>
							
						</div><!-- #content -->
						<?php portf_layout(); ?>
					</section><!-- #primary -->
				</div><!-- .gutter .alpha .omega -->
			</div><!-- .sixteen .columns -->
			
			<section id="homepage" class="mainside columns">
				<div class="gutter alpha omega">
					<div class="main">
						
						<?php 
							before_content(); //Sidebar Before Content
							after_content(); //Sidebar After Content ?>
				 
					</div>  <!-- .main -->
				</div>  <!-- .gutter .alpha -->
			</section>  <!-- #homepage.mainside.column -->
		
			<?php get_template_part( 'sidebar', 'index' ); //the Sidebar ?>
			
		</div><!-- .container -->
	</section>
	
<?php get_footer(); //the Footer ?>