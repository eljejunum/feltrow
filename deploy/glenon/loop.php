<?php 
/**
 * @package WordPress
 * @subpackage Glenon-WP
 */
?>

			<div class="mainside columns">
				<section id="primary" class="main"> 
					<?php if ( is_author() ) : 
						$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
						$user_id = get_the_author_meta('ID'); ?>
						<div class="author-info">
							<div class="authorInfo">
								<?php echo get_avatar( $user_id, 106 ); ?>
								<h2><?php the_author_meta( 'display_name' ); ?> </h2>
								<p class="auth-desc"><?php the_author_meta( 'description' ); ?></p>
								<p><?php _e('Website URL: ', 'glenon_wp'); ?><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></p>
							</div>
						</div>
					<?php endif; ?>
								
					<?php while ( have_posts() ) : the_post(); ?> <!--  the Loop -->
					
					<?php if ( is_category() || is_tag() || is_archive() || is_search() || is_attachment() ) : ?>
					<article id="post-<?php the_ID(); ?>" class="blog-lay clearfix">
						<div class="blog-thumb">
						<?php if ( ! is_attachment() ) : ?>
							<?php
							if ( has_post_thumbnail() ) { ?>
								<a href="<?php the_permalink(); ?>" class="thumb-link"><?php the_post_thumbnail( 'def-blog-thumb' ); ?></a>
							<?php } else {
								echo '<img src="' . get_template_directory_uri() . '/images/thumbnail-default.jpg" class="wp-post-image" />';
							} ?>
						<?php endif; ?>
						</div>
						<div class="the-date">            
							<span class="date-only"><?php the_time('d'); ?></span><br>
							<span class="month-year"><?php the_time('M Y'); ?></span>
						</div>
						<ul class="post-data">
							<li class="for-title"><h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title('', ''); ?></a></h2>  <!--Post titles--></li>
							<li><?php _e( 'Category', 'glenon_wp' ); ?> <?php the_category(' '); ?></li>
							<li><?php _e( 'Writen by', 'glenon_wp' ); ?> <?php the_author_posts_link(); ?></li>
						</ul>
						<p><?php 
						global $more;    // Declare global $more (before the loop).
						$more = 0;       // Set (inside the loop) to display content above the more tag.
						echo preg_replace("/\[caption .+?\[\/caption\]|\< *[img][^\>]*[.]*\>/i","",get_the_content(''),1); ?></p>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="more-link"><span class="block"><?php _e('Read More', 'glenon_wp') ?></span></a>
						<?php if ( is_author() ) : ?>
						<div class="post-tags archv">
							<span><?php _e( 'Tagged under', 'glenon_wp' ); ?></span> <?php the_tags( '', '&nbsp;' ); ?>
						</div>
						<?php endif; ?>
					</article> <!--The Content-->
					<?php else : ?>
					<article id="post-<?php the_ID(); ?>">
						<div class="title">            
							<h2 class="post-title"><?php the_title('', ''); ?></h2>  <!--Post titles-->
						</div>
						
						<?php the_content( _e('Continue reading', 'glenon_wp'), the_title('', '', false)); ?><!--The Content-->
				 
						 <!--The Meta, Author, Date, Categories and Comments-->   
						<div class="meta"> 
								<?php _e('Date posted:', 'glenon_wp') ?> <?php echo get_the_date(); ?>
							  | <?php _e('Author:', 'glenon_wp') ?> <?php the_author_posts_link(); ?>
							  | <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
							<p><?php _e('Categories:', 'glenon_wp') ?> <?php the_category(' '); ?></p>
						</div>
					</article>
					<?php endif; ?>
								
					<?php endwhile; ?><!--  End the Loop -->

					<?php /* Display navigation to next/previous pages when applicable */ ?>
					<nav id="nav-below">
						<?php
							$total = $wp_query->max_num_pages;
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
				<?php /* Only load comments on single post/pages*/ ?>
				<?php /* if (is_page() : comments_template( '', true ); endif; */ ?>
			 
			  </section>  <!-- #primary -->
			</div>