<?php
/**
 * @package WordPress
 * @subpackage Glenon-WP
 */
	$bottom1_active = is_active_sidebar('bottom-sidebar-1');
	$bottom2_active = is_active_sidebar('bottom-sidebar-2');
	$bottom3_active = is_active_sidebar('bottom-sidebar-3');
	$bottom4_active = is_active_sidebar('bottom-sidebar-4');
	
	if( $bottom1_active || $bottom2_active || $bottom3_active || $bottom4_active ) :
?>
    <section id="bottom">
		<div class="padding">
			<div class="container">
				<div class="sixteen columns">
					<div class="gutter alpha omega">
					
					<?php if( $bottom1_active && !$bottom2_active && !$bottom3_active && !$bottom4_active ) : ?>
						<div class="b-sidebar bs-left"><?php dynamic_sidebar( 'bottom-sidebar-1' ); ?></div>
					<?php endif; ?>
					
					<?php if( $bottom1_active && $bottom2_active && !$bottom3_active && !$bottom4_active ) : ?>
						<div class="b-sidebar bs-left"><?php dynamic_sidebar( 'bottom-sidebar-1' ); ?></div>
						<div class="b-sidebar bs-right"><?php dynamic_sidebar( 'bottom-sidebar-2' ); ?></div>
					<?php endif; ?>
						
					<?php if( $bottom1_active && $bottom2_active && $bottom3_active && !$bottom4_active ) : ?>
						<div class="b-sidebar bs-left"><?php dynamic_sidebar( 'bottom-sidebar-1' ); ?></div>
						<div class="b-sidebar bs-center"><?php dynamic_sidebar( 'bottom-sidebar-2' ); ?></div>
						<div class="b-sidebar bs-right"><?php dynamic_sidebar( 'bottom-sidebar-3' ); ?></div>
					<?php endif; ?>
					
					<?php if( $bottom1_active && $bottom2_active && $bottom3_active && $bottom4_active ) : ?>
						<div class="b-sidebar bs-left"><?php dynamic_sidebar( 'bottom-sidebar-1' ); ?></div>
						<div class="b-sidebar bs-center"><?php dynamic_sidebar( 'bottom-sidebar-2' ); ?></div>
						<div class="b-sidebar bs-center"><?php dynamic_sidebar( 'bottom-sidebar-3' ); ?></div>
						<div class="b-sidebar bs-right"><?php dynamic_sidebar( 'bottom-sidebar-4' ); ?></div>
					<?php endif; ?>
						
					</div><!-- .gutter .alpha .omega -->
				</div><!-- .sixteen .columns -->
			</div><!-- .container -->
		</div><!-- .padding -->
    </section><!-- #bottom -->
<?php endif; ?>
	<section id="footer">
		<div class="container">
			<div class="padding clearfix">
				<div class="eight columns">
					<div class="gutter alpha">
						<div class="copyright">
						<?php if (of_get_option('use_custom_copy')) : ?>
							<?php echo (of_get_option('custom_copy_text')) ?>
						<?php else : ?>
							Copyright &#169; 2012 Glenon Demo Site. All Rights Reserved. <br />
							Powered by <a href="http://wordpress.org/" title="wordpress.org">Wordpress</a>.
							Designed by <a href="http://themesoul.com/" title="ThemeSoul.com">ThemeSoul.com</a>
						</div>
						<?php endif; ?>
					</div><!-- .gutter .alpha .omega -->
				</div><!-- .eight .columns -->
				<div class="eight columns">
					<div class="gutter omega">
						<?php if( is_active_sidebar('footnav') ) : ?><?php dynamic_sidebar( 'footnav' ); ?>
						<?php endif; ?>
						
					</div><!-- .gutter .alpha .omega -->
				</div><!-- .eight .columns -->
			</div><!-- .container -->
		</div><!-- .padding -->
    </section><!-- #footer -->
	<div id="toTop">Back to Top</div>
            
</div><!-- .wrapper -->
<?php wp_footer(); ?>
   
</body>
</html>