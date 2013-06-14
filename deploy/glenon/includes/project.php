<?php
/**
 * @package WordPress
 * @subpackage Glenon-WP
 */

if ( is_active_sidebar( 'feat-proj' ) ) : //include Featured Project
?>
	<section id="project">
		<div class="container">
			<div class="sixteen columns">
				<div class="gutter alpha omega">
					<div class="this-project">
						<?php dynamic_sidebar( 'feat-proj' ); ?>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</section>
<?php endif; ?>