<?php
	function social_sharing () { ?>
		<div class="socialSharing">
			<div class="your-tweet">
				<a href="http://twitter.com/share" class="twitter-share-button"
				  data-url="<?php the_permalink(); ?>"
				  data-text="<?php the_title(); ?>"
				  data-count="horizontal">Tweet</a>
				<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
			</div>
			<div class="your-fb">
				<div id="fb-root"></div>
				<div class="fb-like" data-href="<?php echo get_permalink(); ?>" data-send="false" data-layout="button_count" data-width="120" data-show-faces="false" data-font="arial"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&status=0";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
			</div>
			<div class="your-gplus">
				<div class="g-plusone" data-size="medium" data-href="<?php echo get_permalink(); ?>"></div>
				<script type="text/javascript">
				  (function() {
					var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
					po.src = 'https://apis.google.com/js/plusone.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
				  })();
				</script>
			</div>
			<div class="your-pint">
				<?php global $post;
					$pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
				<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($post->ID)); ?>&media=<?php echo $pinterestimage[0]; ?>&description=<?php the_title(); ?>" 
					class="pin-it-button" count-layout="horizontal" data-pin-do="buttonPin" data-pin-config="beside">Pin It</a>
				<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
			</div>
			<div class="clear"> </div>
		</div>
<?php } 
	//Adding the Open Graph in the Language Attributes
	// function add_opengraph_doctype( $output ) {
			// return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
		// }
	// add_filter('language_attributes', 'add_opengraph_doctype');

	//Lets add Open Graph Meta Info
	// function insert_fb_in_head() {
		// global $post;
		// if ( !is_singular()) //if it is not a post or a page
			// return;
			// echo '<meta property="fb:admins" content="YOUR USER ID"/>';
			// echo '<meta property="og:title" content="' . get_the_title() . '"/>';
			// echo '<meta property="og:type" content="article"/>';
			// echo '<meta property="og:url" content="' . get_permalink() . '"/>';
			// echo '<meta property="og:site_name" content="Your Site NAME Goes HERE"/>';
		// if(!has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image
			// $default_image="http://example.com/image.jpg"; //replace this with a default image on your server or an image in your media library
			// echo '<meta property="og:image" content="' . $default_image . '"/>';
		// }
		// else{
			// $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
			// echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
		// }
		// echo "
	// ";
	// }
	// add_action( 'wp_head', 'insert_fb_in_head', 5 );

	//Lets add Open Google +1 script
	// function add_googlepin() {
		// echo '<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>';
		// echo '<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>';
	// }
	// add_action('wp_footer', 'add_googlepin');
?>