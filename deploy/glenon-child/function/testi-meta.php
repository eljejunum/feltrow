<?php

function testimonial_meta_box_cb( $post )
{
	$testiname = get_post_meta( $post->ID, '_glenon_testimonial_name', true );
	$testiaddr = get_post_meta( $post->ID, '_glenon_testimonial_desc', true );
	$testiemail = get_post_meta( $post->ID, '_glenon_testimonial_email', true );
	$testiurl = get_post_meta( $post->ID, '_glenon_testimonial_url', true );
	wp_nonce_field( 'testimonial_meta_box_nonce', 'meta_box_nonce' );
	?>
	<p>
		<label for="_glenon_testimonial_name"><?php _e('Name', 'glenon_wp') ?></label>
		<input type="text" name="_glenon_testimonial_name" id="_glenon_testimonial_name" value="<?php echo $testiname; ?>" />
	</p>
	<p>
		<label for="_glenon_testimonial_desc"><?php _e('Position', 'glenon_wp') ?></label>
		<input type="text" name="_glenon_testimonial_desc" id="_glenon_testimonial_desc" value="<?php echo $testiaddr; ?>" />
	</p>
	<p>
		<label for="_glenon_testimonial_email"><?php _e('Email', 'glenon_wp') ?></label>
		<input type="text" name="_glenon_testimonial_email" id="_glenon_testimonial_email" value="<?php echo $testiemail; ?>" />
	</p>
	<p>
		<label for="_glenon_testimonial_url"><?php _e('Link', 'glenon_wp') ?></label>
		<input type="text" name="_glenon_testimonial_url" id="_glenon_testimonial_url" value="<?php echo $testiurl; ?>" />
	</p>
	<?php	
}

add_action( 'save_post', 'testimonial_meta_box_save' );
function testimonial_meta_box_save( $post_id )
{
	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	
	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'testimonial_meta_box_nonce' ) ) return;
	
	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_post' ) ) return;
	
	// now we can actually save the data
	$allowed = array( 
		'@' => array (),
		'a' => array( // on allow a tags
			'href' => array() // and those anchords can only have href attribute
		)
	);
	
	// Probably a good idea to make sure your data is set
	if( isset( $_POST['_glenon_testimonial_name'] ) )
		update_post_meta( $post_id, '_glenon_testimonial_name', wp_kses( $_POST['_glenon_testimonial_name'], $allowed ) );
		
	if( isset( $_POST['_glenon_testimonial_desc'] ) )
		update_post_meta( $post_id, '_glenon_testimonial_desc', wp_kses( $_POST['_glenon_testimonial_desc'], $allowed ) );
		
	if( isset( $_POST['_glenon_testimonial_email'] ) )
		update_post_meta( $post_id, '_glenon_testimonial_email', wp_kses( $_POST['_glenon_testimonial_email'], $allowed ) );
		
	if( isset( $_POST['_glenon_testimonial_url'] ) )
		update_post_meta( $post_id, '_glenon_testimonial_url', wp_kses( $_POST['_glenon_testimonial_url'], $allowed ) );
}

// Post Meta Box for testimonial
function testimonial_meta_box() {
	add_meta_box( 
		'test-meta-box-id', 
		'Testimonial Meta Box', 
		'testimonial_meta_box_cb', 
		'testimonial', 
		'normal', 
		'high' 
	);
}
add_action( 'add_meta_boxes', 'testimonial_meta_box' );

?>