<?php
/**
 * @package WordPress
 * @subpackage Eatoreh-WP
 */
function before_content() { 
	
	if ( is_active_sidebar( 'be4-main-sidebar' )) : ?>
		<div class="sidebar be4-main-sidebar" id="sideb4"><!--  the Sidebar -->
			<?php dynamic_sidebar( 'be4-main-sidebar' ); ?>
		</div>
	<?php endif;

	}

function after_content() { 

	if ( is_active_sidebar( 'after-main-sidebar' )) : ?>
		<div class="sidebar be4-main-sidebar" id="sideaf"><!--  the Sidebar -->
			<?php dynamic_sidebar( 'after-main-sidebar' ); ?>
		</div>
	<?php endif; 

	} ?>