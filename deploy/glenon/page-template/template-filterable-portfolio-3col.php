<?php 
/* 
 * Template Name: Filterable Portfolio 3 Column
 * Description: A full-width template with no sidebar for Portfolio 3 Cols
 *
 * @package WordPress
 * @subpackage Glenon-WP
 */
global $term_list;

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

	<section id="maincontent">
		<div class="container">

			<div class="sixteen columns">
				<div class="gutter alpha omega">
					<section id="primary" class="portf three-columns">
						<div id="content">

							<?php the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
								<header class="title">
									<h1 class="contentheading"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
								</header><!-- .entry-header -->

								<div class="entry-content">
									<?php the_content(); ?>
									<?php wp_link_pages( 'before=<div class="page-link">' . __( 'Pages:', 'glenon_wp' ) . '&after=</div>' ); ?>
									<?php edit_post_link( __( 'Edit', 'themename' ), '<span class="edit-link">', '</span>' ); ?>
								</div><!-- .entry-content -->
							</article><!-- #post-<?php the_ID(); ?> -->
							
						</div><!-- #content -->
						<?php portf_layout(); ?>
					</section><!-- #primary -->
				</div><!-- .gutter .alpha .omega -->
			</div><!-- .sixteen .columns -->
			
		</div><!-- .container -->
	</section>

<?php get_footer(); ?>