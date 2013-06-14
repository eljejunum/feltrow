<?php
/**
 * Flexible Posts Widget: Default widget template
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
	<ul class="dpe-flexible-posts widget-type">
	<?php while( $flexible_posts->have_posts() ) : $flexible_posts->the_post(); ?>
		<li id="flex-post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<a href="<?php echo the_permalink(); ?>">
				<?php
					if( $thumbnail == true )
						the_post_thumbnail( $thumbsize );
				?></a>
			<h4><a href="<?php echo the_permalink(); ?>" class="title">
				<?php the_title(); ?></a></h4>
			<p>
			<?php 
				$content = get_the_content();
				$content = strip_tags($content);
				echo substr($content, 0, 100). '...';
			?>				
			</p>
		</li>
	<?php endwhile; ?>
	</ul><!-- .dpe-flexible-posts -->
<?php else: // We have no posts ?>
	<div class="dpe-flexible-posts no-posts">
		<p><?php _e('No post found', 'glenon_wp') ?></p>
	</div>
<?php	
endif; // End have_posts()
	
echo $after_widget;
?>