<?php
/**
 * @package WordPress
 * @subpackage Glenon-WP
 */

get_header(); 
get_template_part( 'menu', 'index' ); //the  menu + logo/site title ?>

	<section id="maincontent" class="content-left">
		<div class="container">

			<div class="sixteen columns">
				<div class="gutter alpha omega">
					<section id="content">

						<article id="post-0" class="error404">
							<header class="entry-header">
								<h1 class="entry-title"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'glenon_wp' ); ?></h1>
							</header>

							<div class="not-entry-content">
								<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.', 'glenon_wp' ); ?></p>
								<div class="four columns">
									<div class="gutter alpha">
										<?php get_search_form(); ?>
									</div>
								</div>
								<div class="four columns">
									<div class="gutter">
										<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
									</div>
								</div>
								<div class="four columns">
									<div class="gutter">
										<h2 class="widgettitle"><?php _e( 'Most Used Categories', 'glenon_wp' ); ?></h2>
										<ul>
										<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 'TRUE', 'title_li' => '', 'number' => '10' ) ); ?>
										</ul>
									</div>
								</div>
								<div class="four columns">
									<div class="gutter omega">
									<?php
									$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'glenon_wp' ), convert_smilies( ':)' ) ) . '</p>';
									the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
									?>
									</div>
								</div>
							</div><!-- .entry-content -->
						</article><!-- #post-0 -->
					</section><!-- #content -->
				</div><!-- .gutter .alpha .omega -->
			</div><!-- .sixteen .columns -->
			
		</div>
	</section>

<?php get_footer(); ?>