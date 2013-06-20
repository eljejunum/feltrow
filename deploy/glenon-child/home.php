<?php
/**
 * @package WordPress
 * @subpackage Glenon-WP
 */
 ?>

    <?php get_header();  //the Header ?>
        
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
			
	<section id="maincontent" class="content-<?php echo of_get_option('sidebar-position') ?>">
		<div class="container">
			<section id="blogpage" class="mainside columns">
				<div class="gutter alpha">
					<div class="main"> 
						<?php if (of_get_option('mas-blog-title')) : ?>
						<h2 class="page-title"><?php echo of_get_option('mas-blog-cat-title') ?></h2>
						<?php endif; ?>
							
						<?php 
							// Set the page to be pagination
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							$cat = of_get_option('mas-blog-category');
							
							// Query Out Database
							$wpblog = new WP_Query(array( 'cat' => $cat, 'paged' => $paged ) ); 
						?>
						<?php if ($wpblog->have_posts()) : while ($wpblog->have_posts()) : $wpblog->the_post(); ?> <!--  the Loop -->
										
						<article id="post-<?php the_ID(); ?>" class="clearfix">
							<div class="">
								<?php
								if ( has_post_thumbnail() ) { ?>
									<a href="<?php the_permalink(); ?>" class="thumb-link"><?php the_post_thumbnail( 'def-blog-thumb' ); ?></a>
								<?php } else {
									/*echo '<img src="' . get_template_directory_uri() . '/images/thumbnail-default.jpg" class="wp-post-image" />';*/
								}
								?>
							</div>
							<div class="the-date">            
								<span class="date-only"><?php the_time('d'); ?></span><br>
								<span class="month-year"><?php the_time('M Y'); ?></span>
							</div>
							<ul class="post-data">
								<li class="for-title"><h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title('', ''); ?></a></h2>  <!--Post titles--></li>
								<li><?php _e( 'Category:', 'mas_wp_theme' ); ?> <?php the_category(' '); ?></li>
								<?php if( has_tag() ) { ?>
									<li><?php _e( 'Tagged:', 'mas_wp_theme' ); ?> <?php the_tags('', ', ', ''); ?></li>
								<?php } ?>
							</ul>
							<p><?php 
							global $more;    // Declare global $more (before the loop).
							$more = 0;       // Set (inside the loop) to display content above the more tag.
							echo preg_replace("/\[caption .+?\[\/caption\]|\< *[img][^\>]*[.]*\>/i","",get_the_excerpt(''),1); ?></p>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="more-link"><span class="block"><?php _e('Read More...', 'glenon_wp') ?></span></a>
						</article> <!--The Content-->			
						<?php endwhile; endif; ?><!--  End the Loop -->

						<?php /* Display navigation to next/previous pages when applicable */ ?>
						<nav id="nav-below">
							<?php
								$total = $wpblog->max_num_pages;
								// only bother with the rest if we have more than 1 page!
								if ( $total > 1 )  {
									// get the current page
									if ( !$current_page = get_query_var('paged') )
										$current_page = 1;
									// structure of "format" depends on whether we're using pretty permalinks
									$format = get_option('permalink_structure') ? 'page/%#%/' : '&paged=%#%';
									echo paginate_links(array(
										'base' => get_pagenum_link(1) . '%_%',
										'format' => $format,
										'current' => $current_page,
										'total' => $total,
										'mid_size' => 4,
										'prev_text' => __('&laquo; Prev', 'glenon_wp'),
										'next_text' => __('Next &raquo;', 'glenon_wp'),
										'type' => 'list'
									 ));
								} ?>
						</nav><!-- #nav-below -->
						
					<?php wp_reset_postdata(); ?>
				 
				  </div>  <!-- .main -->
				</div>  <!-- .gutter .alpha -->
			</section>  <!-- #homepage .two-thirds .column -->
				 
			<?php get_template_part( 'sidebar', 'index' ); //the Sidebar ?>
		</div><!--  .container -->
	</section><!--  #maincontent -->
    
	<?php //include Newsletter
		if ( is_active_sidebar( 'newsletter' ) ) {
		get_template_part('includes/newsletter'); 
		} 
	?>	
            
    <?php get_footer(); //the Footer ?>