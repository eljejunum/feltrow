<?php 
	$settings = wpmobi_get_settings();
	
	ob_start();
	wp_dropdown_pages(); 
	$contents = ob_get_contents();
	ob_end_clean();
	
	$contents = str_replace( 'page_id', 'hipnews_latest_posts_page', $contents );
	$value_string = 'value="' . $settings->hipnews_latest_posts_page . '"';
	$contents = str_replace( $value_string, $value_string . ' selected', $contents );
	
	$is_custom = ( $settings->hipnews_latest_posts_page == 'none' ? ' selected' : '' );
	$contents = str_replace( '</select>', '<option class="level-0" value="none"' . $is_custom . '>' . __( "None (Use WordPress Settings)", "wpmobi-me" ) . '</option></select>', $contents );
	
	echo $contents;
	
?>
<label for="hipnews_latest_posts_page"><?php _e( "Custom latest posts page", "wpmobi-me" ); ?>

<a href="#" class="wpmobi-tooltip" title="<?php _e( 'This setting can be used to convert a regular WordPress page into a page that shows the latest posts.', 'wpmobi-me' ); ?>">&nbsp;</a>
</label>