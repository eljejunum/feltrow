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
	<ul class="dpe-flexible-posts portf-cols four-cols row">
	<?php while ( $flexible_posts->have_posts() ) : $flexible_posts->the_post(); ?>
		<li id="flex-post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="margin">
				<a href="<?php echo the_permalink(); ?>">
					<?php
						if( $thumbnail == true )
							the_post_thumbnail( $thumbsize );
					?>
					<span class="title"><?php the_title(); ?></span>
				</a>
			</div>
		</li>
	<?php endwhile; ?>
	</ul><!-- .dpe-flexible-posts.four-cols -->
<?php else: // We have no posts ?>
	<div class="dpe-flexible-posts no-posts">
		<p><?php _e('No post found', 'glenon_wp') ?></p>
	</div>
<?php	
endif; // End have_posts()
	
echo $after_widget;
?>