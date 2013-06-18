<?php 
/**
 * @package WordPress
 * @subpackage Glenon-WP
 */
?>

	<section id="header">  
		<div class="container">
			<div class="eight first columns"> 
				<header class="gutter alpha">
					<hgroup>
						<h1 class="logo">
						<?php if ( of_get_option('your-logo') ) : ?>
							<a href="<?php echo home_url(); //make logo a home link?>" class="no-bg">
								<img src="<?php echo of_get_option('your-logo-img'); ?>" />
							</a>
						<?php else : ?>
							<a href="<?php echo home_url(); //make logo a home link?>">
								<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" />
								<span class="logo"><?php echo get_bloginfo('name');?></span>
								<span class="desc"><?php echo get_bloginfo('description');?></span>
							</a> 	
						<?php endif; ?>
						</h1>
						<h5 id="site-desc">
							<?php echo of_get_option('your-desc'); ?>
						</h5>
					</hgroup>
				</header>
			</div> 

			<div class="eight second columns">
				<div class="gutter alpha omega">

				<!--  the Menu -->
				<?php wp_nav_menu( array( 
					'theme_location' => 'primary', 
					'container' => 'nav', 
					'container_id' => 'navigation', 
					'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'walker' => new Walker_Page_Custom ) ); ?>
				
				</div>
			</div>
			
		</div> <!--  container -->
	</section> <!--  End blog header -->
	
   