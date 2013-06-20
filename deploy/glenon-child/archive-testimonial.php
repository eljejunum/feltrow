<?php
/**
 * @package WordPress
 * @subpackage Glenon-WP
 */
 ?>
<?php 
	get_header();  //the Header
	get_template_part( 'menu', 'index' ); //the  menu + logo/site title ?>
	
	<section id="slider">
		<div class="container">
			<div class="breadcrumbs">
				<span><?php _e('You are Here:', 'glenon_wp') ?></span>
				<?php if(function_exists('bcn_display'))
				{
					bcn_display();
				}?>
			</div>
		</div>
	</section>
	
	<section id="maincontent" class="sidebar-<?php echo of_get_option('sidebar-position') ?>">
		<div class="container">	
			<?php get_template_part( 'loop', 'index' ); //the Loop ?> 
			<?php get_template_part( 'sidebar', 'index' ); //the Sidebar ?>
		</div>
	</section>
            
<?php get_footer(); //the Footer ?>
                        
           
