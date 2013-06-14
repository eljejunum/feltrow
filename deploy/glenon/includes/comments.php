<?php
/*
	Plugin Name:	Recent Comment Avatars
	Plugin URI:		http://www.sterling-adventures.co.uk/blog/2009/01/01/comments-with-avatars/
	Description:	Add avatars to your recent comments sidebar widget.
	Author:			Peter Sterling
	Version:		3.5
	Changes:		1.0 - Initial version.
					2.0 - Added option for showing a comment excerpt, thanks to Angelo Milanetti for the idea.
					2.1 - Convert smilies.
					3.3 - Fix printf of comment time.
					3.4 - Tidy up IP lookup.
					3.5 - Add option to exclude comments from scheduled posts.
	Author URI:		http://www.sterling-adventures.co.uk/
*/
class sa_comments extends WP_Widget {

	function sa_comments() {
		$widget_ops = array('classname' => 'widget_recent_comments', 'description' => __( 'Recent comments with configurable option to show avatars and more!', 'glenon_wp'));
		$this->WP_Widget('sa_comments', __('Recent Comments Widget', 'glenon_wp'), $widget_ops);
	}
	// Check widgets are activated.
	// if(!function_exists('register_sidebar_widget')) return;

	// Customised recent comments widget.
	function widget( $args, $instance ) {
		global $wpdb, $comments, $comment;
		extract( $args );
		extract( $instance );
				
		$title = apply_filters( 'widget_title', empty( $title ) ? '' : $title );

		if(!$comments = wp_cache_get('recent_comments', 'widget')) {
			$sql = "select * from $wpdb->comments where comment_approved = '1' order by comment_date_gmt DESC limit $number";
			$comments = $wpdb->get_results($sql);
			wp_cache_add('recent_comments', $comments, 'widget');
		}

		echo $before_widget;
		echo $before_title . $title . $after_title; ?>
			<ul id="recentcomments">
			<?php if($comments) : foreach((array)$comments as $comment) : ?>
				<li class="recentcomments">
				<?php

				$url = get_comment_author_url();
				$author = get_comment_author(); 
				
				if($instance['avatar'] == true) : ?>
					<a href="<?php echo get_comment_link($comment->comment_ID) ?>" class="avatar"><?php echo get_avatar( $comment, $avatar_size ); ?></a>
				<?php endif;

				if($instance['excerpt'] == true) {
					$exp = get_comment_excerpt();
					echo '<span>'.$exp.'</span>';
				}

				_e('Writen by ', 'glenon_wp');
				if(empty( $url ) || 'http://' == $url) echo $author;
				else printf("<a href='$url' rel='external nofollow' class='url'>$author</a>");
				printf(' on %s', '<a href="'. get_comment_link($comment->comment_ID) . '">' . get_the_title($comment->comment_post_ID) . '</a>');
			endforeach; endif; ?>
			</ul>
		<?php echo $after_widget; 
	}
	
	// Customised recent comments widget control form.
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags(stripslashes($new_instance['title']));
		$instance['number'] = (int)$new_instance['number'];
		$instance['avatar'] = (bool)$new_instance['avatar'];
		$instance['avatar_size'] = strip_tags(stripslashes($new_instance['avatar_size']));
		$instance['excerpt'] = (bool)$new_instance['excerpt'];
		return $instance;
	}

	function form( $instance ) {
		// Widget defaults
		$instance = wp_parse_args( (array) $instance, array(
			'title' => 'Recent Comments',
			'number' => 5,
			'avatar' => false,
			'avatar_size' => 25,
			'excerpt' => false));
		
		extract( $instance ); ?>
			
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'glenon_wp'); ?>&nbsp;
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
			</label></p>
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of comments to show:', 'glenon_wp'); ?>&nbsp;
			<input style="width: 40px; text-align: center;" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $instance['number']; ?>" />
			</label></p>
		<p>
			<label for="<?php echo $this->get_field_id('avatar'); ?>">
			<input class="checkbox" type="checkbox" id="<?php echo $this->get_field_id('avatar'); ?>" name="<?php echo $this->get_field_name('avatar'); ?>" value="1" <?php checked( '1', $avatar ); ?> /> show avatar?</label></p>
		<p>
			<label for="<?php echo $this->get_field_id('avatar_size'); ?>">Avatar size: 
			<input style="width: 40px; text-align: center;" id="<?php echo $this->get_field_id('avatar_size'); ?>" name="<?php echo $this->get_field_name('avatar_size'); ?>" type="text" value="<?php echo $avatar_size; ?>" /> px</label></p>
		<p>
			<label for="<?php echo $this->get_field_id('excerpt'); ?>">
			<input class="checkbox" type="checkbox" id="<?php echo $this->get_field_id('excerpt'); ?>" name="<?php echo $this->get_field_name('excerpt'); ?>" value="1" <?php checked( '1', $excerpt ); ?> /> show comment excerpt?</label></p>
		
	<?php }
	
	}
			// global $wpdb;
			// $found = false;
			// foreach($wpdb->get_col("show tables", 0) as $table) {
				// if($table == 'wp_iptocountry') {
					// $found = true;
					// break;
				// }
			// }

function sa_comments_widget_init() {
	register_widget('sa_comments');
}

add_action('widgets_init', 'sa_comments_widget_init');
?>