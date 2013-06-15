<?php
// Frontend View of Slider

// Enqueue Stylesheet and Script only where loaded
wp_enqueue_script( 'recent-posts-flexslider-script' );
?>

<h3 class="flexslider-title"><?php if ( !empty( $title ) ) { echo $title; }; ?></h3>

<?php
$wpslide = new WP_Query(array(
					'cat' => $categories,
					'post_status' => 'publish',
					'post_type' => $post_type_array,
					'showposts' => $slider_count
				));
?>

<div id="slider-wrap">
    <div class="flexslider">
        <ul class="slides">
            <?php
			if ($wpslide->have_posts()) : while ($wpslide->have_posts()) : $wpslide->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">
							<?php the_post_thumbnail( 'def-slider-image' ); ?>
						</a>
							
						<?php if($post_title == 'true' || $post_excerpt == 'true'): ?>
							<div class="flexslider-caption"><div class="flexslider-caption-inner">
								<?php if($post_title == 'true'): ?>
									<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title() ?></a></h3>
								<?php endif;
								if($post_excerpt == 'true' && get_the_content() != ''): ?>
									<p>
									<?php 
										$content = strip_shortcodes(get_the_content());
										$content = strip_tags($content);
										echo substr( $content, 0, $excerpt_length ). '...';
									?>
									</p>
								<?php endif; ?>
							</div></div>
						<?php endif; ?>
                    </li>
            <?php endwhile; endif; wp_reset_postdata(); ?>
        </ul>
    </div>
</div>
        
<script type="text/javascript">
(function ($) {
	"use strict";
	$(function () {
      $('.flexslider').flexslider({
        animation: "fade",
        slideshowSpeed: <?php echo $slider_pause; ?>,		//Integer: Set the speed of the slideshow cycling, in milliseconds
        animationSpeed: <?php echo $slider_duration; ?>,	//Integer: Set the speed of animations, in milliseconds
		directionNav: <?php echo $slider_navi; ?>
      });
	});
}(jQuery));
</script>