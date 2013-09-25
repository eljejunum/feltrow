<?php
/**
 * Template Name: Page - No Breadcrumbs
 * Description: Standard page with breadcrumbs removed.
 * @package WordPress
 * @subpackage Glenon-WP
 */
 ?>

    <?php get_header();  //the Header ?>
        
    <?php 
    	get_template_part( 'menu', 'index' ); //the  menu + logo/site title 
    	get_template_part('includes/slider');
    ?>
	
	<section id="maincontent" class="content-<?php echo of_get_option('sidebar-position') ?>">
		<div class="container">		
			<div class="mainside columns">
				<div class="gutter alpha">
					<section id="primary" class="main">
						<div id="content">

							<?php the_post(); ?>

							<article id="page-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
								<header class="title">
									<h1 class="contentheading"><?php the_title(); ?></h1>
								</header><!-- .entry-header -->
							
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
							
						</div><!-- #content -->
				 
				  </section>  <!-- #primary -->
				</div>  <!-- .gutter .alpha -->
			</div>  <!-- .two-thirds .column --> 
				 
			<?php get_template_part( 'sidebar', 'index' ); //the Sidebar ?>
		</div><!--  .container -->
	</section>
    
	<?php //include Newsletter
		if ( is_active_sidebar( 'newsletter' ) ) {
		get_template_part('includes/newsletter'); 
		} 
	?>	
            
    <?php get_footer(); //the Footer ?>
                        
           
