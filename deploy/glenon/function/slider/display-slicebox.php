<?php
// Frontend View of Slider

// Enqueue Stylesheet and Script only where loaded
wp_enqueue_script( 'm-46884' );
wp_enqueue_script( 'slicebox-script' );
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
    <div class="notflexslider">
        <ul id="sb-slider" class="sb-slider slides">
            <?php
			if ($wpslide->have_posts()) : while ($wpslide->have_posts()) : $wpslide->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">
							<?php the_post_thumbnail( 'def-slider-image' ); ?>
						</a>
							
						<?php if($post_title == 'true' || $post_excerpt == 'true'): ?>
							<div class="sb-description">
								<?php if($post_title == 'true'): ?>
									<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title() ?></a></h3>
								<?php endif; 
								if($post_excerpt == 'true' && get_the_content() != '' ): ?>
									<p>
									<?php 
										$content = strip_shortcodes(get_the_content());
										$content = strip_tags($content);
										echo substr( $content, 0, $excerpt_length ). '...';
									?>
									</p>
								<?php endif; ?>
							</div>
						<?php endif; ?>
                    </li>
            <?php endwhile; endif; wp_reset_postdata(); ?>
        </ul>
		<div id="shadow" class="shadow"></div>
		<div id="nav-arrows" class="nav-arrows">
			<a href="#">Next</a>
			<a href="#">Previous</a>
		</div>
    </div>
</div>
       
<script type="text/javascript">
jQuery(function() {

	var Page = (function() {

		var $navArrows = jQuery( '#nav-arrows' ).hide(),
			$shadow = jQuery( '#shadow' ).hide(),
			slicebox = jQuery( '#sb-slider' ).slicebox( {
				onReady : function() {
				<?php if ($slider_navi == 'true') : ?>				
					$navArrows.show();
				<?php endif; ?>
					$shadow.show(); 
				},
				orientation : 'r',
				cuboidsRandom : true,
				disperseFactor : 30,
				autoplay : true,
				speed3d : <?php echo $slider_duration; ?>,
				speed : 600,
				interval : <?php echo $slider_pause; ?>
			} ),
			
			init = function() {

				initEvents();
				
			},
			initEvents = function() {

				// add navigation events
				$navArrows.children( ':first' ).on( 'click', function() {

					slicebox.next();
					return false;

				} );

				$navArrows.children( ':last' ).on( 'click', function() {
					
					slicebox.previous();
					return false;

				} );

			};

			return { init : init };

	})();

	Page.init();
	
});
</script>