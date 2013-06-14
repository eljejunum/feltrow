<?php
/**
 * Flexible Posts Widget: Default widget template
 */
	
// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');

global $post_id;
global $post;

echo $before_widget;

if ( !empty($title) )
	echo $before_title . $title . $after_title;

$flexible_posts = new WP_Query( $args );

if( $flexible_posts->have_posts() ):
?>
	<ul class="dpe-flexible-posts">
	<?php while( $flexible_posts->have_posts() ) : $flexible_posts->the_post(); ?>
		<li id="flex-post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if( $thumbnail == true ) : ?>
			<p class="testi-content">
				<?php the_post_thumbnail( $thumbsize ); ?>
			</p>
			<?php endif; ?>
			<blockquote class="testimonial-quote"><?php the_content(); ?></blockquote>
			<p class="testi-content">
			<?php 
				$testiname = get_post_meta( $post->ID, '_glenon_testimonial_name', true );
				$testiaddr = get_post_meta( $post->ID, '_glenon_testimonial_desc', true );
				$testiemail = get_post_meta( $post->ID, '_glenon_testimonial_email', true );
				$testiurl = get_post_meta( $post->ID, '_glenon_testimonial_url', true );
			?>
				<?php if ($testiname != '') { ?><span class="strong"><?php echo $testiname ?></span><?php } ?>
				<?php if ($testiaddr != '') { ?><span><?php echo $testiaddr ?></span><?php } ?>
				<?php if ($testiemail != '') { ?><span><?php echo $testiemail ?></span><?php } ?>
				<?php if ($testiurl != '') { ?><a href="<?php echo $testiurl ?>" target="_blank" ><?php echo $testiurl ?></a><?php } ?>
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