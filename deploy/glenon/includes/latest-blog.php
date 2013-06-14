<?php
/**
 * @package WordPress
 * @subpackage Glenon-WP
 */

if ( is_active_sidebar( 'latest-blog-bar' ) ) : //include Our Client
?>
	<section id="latest-blog">
		<div class="container">
			<div class="padding">
				<div class="sixteen columns">
					<div class="gutter alpha omega">
						<?php dynamic_sidebar( 'latest-blog-bar' ); ?>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</section>
<?php endif; ?>