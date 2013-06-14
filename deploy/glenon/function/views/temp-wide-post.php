<?php
/**
 * Flexible Posts Widget: Recent Post Wide Mode template
 */

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');

echo $before_widget;

if ( !empty($title) )
	echo $before_title . $title . $after_title;

$flexible_posts = new WP_Query( $args );

if( $flexible_posts->have_posts() ):

?>
	<div class="wide-post margin">
		<?php while ( $flexible_posts->have_posts()) : $flexible_posts->the_post(); ?> <!--  the Loop -->
		<article id="mblog-<?php the_ID(); ?>" class="wide-blog">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'wide-img' );
				} else {
					echo '<img src="' . get_template_directory_uri() . '/images/thumbnail-default.jpg" class="wp-post-image" />';
				} ?>
			</a>
			<span class="blog-date"><?php echo get_the_date( 'd M Y' ); ?></span>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="blog-title"><?php the_title('', ''); ?></a>  <!--Post titles-->
			<p><?php 
				$content = strip_shortcodes(get_the_content());
				$content = strip_tags($content);
				echo substr($content, 0, 84). '...';
			?></p> <!--The Content-->	
		</article>
		<?php endwhile; ?><!--  End the Loop -->
	</div>
<?php else: // We have no posts ?>
	<div class="dpe-flexible-posts no-posts">
		<p><?php _e('No post found', 'glenon_wp') ?></p>
	</div>
<?php	
endif; // End have_posts()
	
echo $after_widget;
?>