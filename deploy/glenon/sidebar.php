<?php
/**
 * @package WordPress
 * @subpackage Glenon-WP
 */
?>
		<?php if ( is_page_template('page-template/template-home3.php') ) : ?>
			<?php if ( is_active_sidebar( 'home-sidebar' ) && of_get_option ( 'home-sidebar-width' ) != 0 ) : ?>
			<div class="sidebar-home columns" id="side">
				<aside class="gutter sidebar"><!--  the Sidebar -->
				<?php dynamic_sidebar( 'home-sidebar' ); ?>
				</aside>
			</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'home-sidebar2' ) && of_get_option ( 'home-sidebar2-width' ) != 0 ) : ?>
			<div class="sidebar-home2 columns" id="side">
				<aside class="gutter sidebar"><!--  the Sidebar -->
				<?php dynamic_sidebar( 'home-sidebar2' ); ?>
				</aside>
			</div>
			<?php endif; ?>
		<?php endif; ?>
		
		<?php if ( is_page_template('page-template/template-home.php') || is_page_template('page-template/template-home1.php') || is_page_template('page-template/template-home2.php') ) : ?>
			<?php if ( is_active_sidebar( 'home-sidebar' ) && of_get_option ( 'home-sidebar-width' ) != 0 ) : ?>
			<div class="sidebar-home columns" id="side">
				<aside class="gutter sidebar"><!--  the Sidebar -->
				<?php dynamic_sidebar( 'home-sidebar' ); ?>
				</aside>
			</div>
			<?php endif; ?>
		<?php endif; ?>
		
		<?php if ( of_get_option ( 'sidebar-width' ) != 0 && ! is_front_page () && !  is_page_template('page-template/template-home.php') && ! is_page_template('page-template/template-home1.php') && ! is_page_template('page-template/template-home2.php') && ! is_page_template('page-template/template-home3.php') && ! is_singular('portfolio') ) : ?>
		<div class="sidebar-b columns" id="side">
			<aside class="gutter sidebar"><!--  the Sidebar -->
			<?php if ( is_home () || is_single () || is_tag() || is_tax() || is_archive()  ) : ?>
				<?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?> <?php dynamic_sidebar( 'blog-sidebar' ); ?>
				<?php endif; ?>
			<?php endif; ?>
			<?php if ( is_page_template('page-template/template-contact.php') ) : ?>
				<?php if ( is_active_sidebar( 'contact-sidebar' ) ) : ?> <?php dynamic_sidebar( 'contact-sidebar' ); ?>
				<?php endif; ?>
			<?php endif; ?>
			<?php if ( is_page () && ! is_front_page () && !  is_page_template('page-template/template-home.php') && ! is_page_template('page-template/template-home1.php') && ! is_page_template('page-template/template-home2.php') && ! is_page_template('page-template/template-home3.php') && ! is_page_template('page-template/template-contact.php') ) : ?>
				<?php if ( is_active_sidebar( 'page-sidebar' ) ) : ?> <?php dynamic_sidebar( 'page-sidebar' ); ?>
				<?php endif; ?>
			<?php endif; ?>
			</aside>
		</div>
		<?php endif; ?>
