<?php
/**
 * @package WordPress
 * @subpackage Glenon-WP
 */

function portf_layout() { 

	wp_enqueue_script( 'quicksand' );

	global $wpdb;
	global $post;
	global $term_list;
	
	// if ( is_active_sidebar( 'be4-main-sidebar' )) : 
		if ( is_page_template('page-template/template-filterable-portfolio.php') || is_page_template('page-template/template-home3.php') ) { 
			$portf_col = 'four'; 
			$port_img = 'portf-4col-img'; }
		if ( is_page_template('page-template/template-filterable-portfolio-3col.php') || is_page_template('page-template/template-home2.php') ) { 
			$portf_col = 'one-third';
			$port_img = 'portf-3col-img'; }
		if ( is_page_template('page-template/template-filterable-portfolio-2col.php') ) { 
			$portf_col = 'eight';
			$port_img = 'big-proj-thumb'; }
	?>
		<!-- #content BEGIN  -->
		<div id="add-content" class="clearfix">
			<div class="minmargin clearfix">
		
				<ul class="filter clearfix"> 
					<li class="active"><a href="javascript:void(0)" class="all">All</a></li>
					
					<?php
						$use_portfolio_type = of_get_option('mas_portfolio_type');
						// Get the taxonomy
						if ( $use_portfolio_type == '' ) {
						$terms = get_terms('portfolio_category');
						} else {
						$terms = get_terms('portfolio_cat');
						}
						
						// set a count to the amount of categories in our taxonomy
						$count = count($terms); 
						
						// set a count value to 0
						$i=0;
						
						// test if the count has any categories
						if ($count > 0) {
							
							// break each of the categories into individual elements
							foreach ($terms as $term) {
								
								// increase the count by 1
								$i++;
								
								// rewrite the output for each category
								$term_list .= '<li><a href="javascript:void(0)" class="'. $term->slug .'">' . $term->name . '</a></li>';
								
								// if count is equal to i then output blank
								if ($count != $i) {
									$term_list .= '';
								} else {
									$term_list .= '';
								}
							}
							
							// print out each of the categories in our new format
							echo $term_list;
						}
					?>
				</ul>
				
				
				<ul class="filterable-grid clearfix">
			
					<?php 
						// Set the page to be pagination
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$number_of_posts = of_get_option('port-number-of-posts');
						$project_category = of_get_option('mas-port-category');
						$use_portfolio_type = of_get_option('mas_portfolio_type');
						
						// Query Out Database
						if ( $use_portfolio_type != '' ) {
						$wpbpe = new WP_Query(array( 'post_type' => 'portfolio', 'posts_per_page' => $number_of_posts, 'paged' => $paged, 'tax_query' => 'portfolio_cat' ) ); 
						} else {
						$wpbpe = new WP_Query(array( 'cat' => $project_category, 'posts_per_page' => $number_of_posts, 'paged' => $paged, 'tax_query' => 'portfolio_category' ) ); 
						}
					?>
					
					<?php
						// Begin The Loop
						if ($wpbpe->have_posts()) : while ($wpbpe->have_posts()) : $wpbpe->the_post(); 
					?>
					
					<?php 
						// Get The Taxonomy 'portfolio_category' Categories
						if ( $use_portfolio_type == '' ) {
						$terms = get_the_terms( $post->ID, 'portfolio_category' ); 
						} else {
						$terms = get_the_terms( $post->ID, 'portfolio_cat' );
						}
						
						if ( $terms && ! is_wp_error( $terms ) ) : 
					?>
					
					<?php 
					$large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' ); 
					$large_image = $large_image[0]; 
					?>
					
					<?php
						//Apply a data-id for unique indentity, 
						//and loop through the taxonomy and assign the terms to the portfolio item to a data-type,
						// which will be referenced when writing our Quicksand Script
						// Clasic and Hover Layout option
						$port_layout = of_get_option('mas-port-layout');
					?>
					<li data-id="id-<?php echo $count; ?>" data-type="<?php foreach ($terms as $term) { echo strtolower(preg_replace('/\s+/', '-', $term->slug)). ' '; } ?>" class="portfolio <?php echo $portf_col ?> columns">
						<div class="margin <?php echo $port_layout; ?>">
						<?php if ( $port_layout == 'classic' ) : ?>
							<?php 
								
								// Check if wordpress supports featured images, and if so output the thumbnail
								if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : 
							?>
								
								<?php // Output the featured image ?>
								<a rel="prettyPhoto[gallery]" href="<?php echo $large_image ?>" class="port-img" title="<?php the_title(); ?>"><?php the_post_thumbnail( $port_img ); ?></a>									
																	
							<?php endif; ?>	
							
							<?php // Output the title of each portfolio item ?>
							<h4 class="post-title"> 
								<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>" >
									<?php $short_title = substr(the_title('','',FALSE),0,19);
									echo $short_title; if (strlen($short_title) >18){ echo '...'; } ?>	
								</a>
							</h4>
							<div class="post-content">
								<p>
								<?php 
									$content = strip_shortcodes(get_the_content());
									$content = strip_tags($content);
									echo substr($content, 0, 104). '...';
								?>				
								</p>
							</div>
						<?php else : ?>
							
							<?php // Output the title of each portfolio item ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" >
								<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {
									the_post_thumbnail( $port_img ); } ?>	
								<span><?php the_title(); ?></span>
							</a>
						<?php endif; ?>
						</div>
					</li>

					<?php endif; ?>
					<?php $count++; // Increase the count by 1 ?>		
					<?php endwhile; ?>
					<?php endif; // END the Wordpress Loop ?>
					<?php wp_reset_postdata(); // Reset the Query Loop?>
			
				</ul>
			</div>
			<?php if ( is_page_template('page-template/template-filterable-portfolio.php')
						|| is_page_template('page-template/template-filterable-portfolio-3col.php')
						|| is_page_template('page-template/template-filterable-portfolio-3col.php') ) : ?>
			<nav id="nav-below">
				<?php
					$total = $wpbpe->max_num_pages;
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
			<?php endif; ?>
		</div><!-- #content END -->
	<?php // endif;
} ?>