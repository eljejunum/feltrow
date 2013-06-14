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
							<div class="date-data">
								<div class="the-date">            
									<span class="date-only"><?php the_time('d'); ?></span><br>
									<span class="month-year"><?php the_time('M Y'); ?></span>
								</div>
								<ul class="post-data">
									<li class="for-title">           
										<h1 class="contentheading">
											<?php the_title('', ''); ?>
										</h1>  <!--Post titles-->
									</li>
									<li><?php _e('Writen by:', 'glenon_wp') ?> <?php the_author_posts_link(); ?></li>
								</ul>
								<div class="clear"> </div>
							</div>
							<div class="blog-thumb">
							<?php if ( ! is_attachment() ) : ?>
								<?php
								if ( has_post_thumbnail() ) { 
									$full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); ?>
									<a href="<?php echo $full_image_url[0] ?>" class="thumb-link">
										<?php 
											if ( of_get_option('sidebar-position') == 'none' ) {
												the_post_thumbnail( 'full' );
											} else {
												the_post_thumbnail( 'def-blog-thumb' );
											} ?>
									</a>
									<div class="wp-caption"><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></div>
								<?php } else {
									echo '<img src="' . get_template_directory_uri() . '/images/thumbnail-default.jpg" class="wp-post-image" />';
								}
								?>
							<?php endif; ?>
							</div>

							<div class="entry-content"><?php the_content(); ?></div> <!--The Content-->
							<?php if ( ! is_attachment() ) : ?>
							<div class="post-cats"><?php  _e('Published in: ', 'glenon_wp') ?><?php the_category(', '); ?></div>
							<div class="post-tags"><?php  _e('Tagged Under:', 'glenon_wp') ?><?php the_tags('' , ''); ?></div>
							<?php endif; ?>
							<?php social_sharing(); ?>
						</article><!-- #post-<?php the_ID(); ?> -->
						<div class="author-info">
							<div class="authorInfo">
								<?php echo get_avatar( get_the_author_meta('ID'), 106 ); ?>
								<h2><?php the_author_meta( 'display_name' ); ?> </h2>
								<p class="auth-desc"><?php the_author_meta( 'description' ); ?></p>
								<p class="auth-url"><span><?php _e('Website: ', 'glenon_wp'); ?></span>
									<a href="<?php the_author_meta( 'user_url' ); ?>"><?php echo str_replace('http://',' ',get_the_author_meta( 'user_url' )); ?></a></p>
							</div>
						</div>
									
						<?php endwhile; ?><!--  End the Loop -->
						
					<?php comments_template( '', true ) ?>
				 
				  </section>  <!-- #primary -->
				</div>  <!-- .gutter .alpha -->
			</div>  <!-- .two-thirds .column -->
				 
			<?php get_template_part( 'sidebar', 'index' ); //the Sidebar ?>
		</div><!--  .container -->
	</section><!--  #maincontent -->
    
<?php get_footer(); //the Footer ?>