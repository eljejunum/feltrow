<?php

add_action('init', 'testimonial_register');
 
function testimonial_register() {
 
	$labels = array(
		'name' => __('Testimonial', 'glenon_wp'),
		'singular_name' => __('testimonial Item', 'glenon_wp'),
		'add_new' => __('Add New', 'testimonial item', 'glenon_wp'),
		'add_new_item' => __('Add New testimonial Item', 'glenon_wp'),
		'edit_item' => __('Edit testimonial Item', 'glenon_wp'),
		'new_item' => __('New testimonial Item', 'glenon_wp'),
		'view_item' => __('View testimonial Item', 'glenon_wp'),
		'search_items' => __('Search testimonial', 'glenon_wp'),
		'not_found' =>  __('Nothing found', 'glenon_wp'),
		'not_found_in_trash' => __('Nothing found in Trash', 'glenon_wp'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'has_archive' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail')
	  ); 
 
	register_post_type( 'testimonial' , $args );
}

// function: post_type BEGIN
function portfolio_type() {

	$labels = array(
		'name' => __( 'Portfolio', 'glenon_wp'),
		'singular_name' => __('Portfolio', 'glenon_wp'),
		'rewrite' => 
			array(
				'slug' => __( 'portfolio', 'glenon_wp' ) 
			),
		'add_new' => _x('Add Item', 'portfolio', 'glenon_wp'), 
		'edit_item' => __('Edit Portfolio Item', 'glenon_wp'),
		'new_item' => __('New Portfolio Item', 'glenon_wp'),
		'view_item' => __('View Portfolio', 'glenon_wp'),
		'search_items' => __('Search Portfolio', 'glenon_wp'),
		'not_found' =>  __('No Portfolio Items Found', 'glenon_wp'),
		'not_found_in_trash' => __('No Portfolio Items Found In Trash', 'glenon_wp'),
		'parent_item_colon' => '' 
	);
	
	// Set Up The Arguements
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => 
			array(
				'title',
				'editor',
				'thumbnail'
			) 
	);
	
	register_post_type(__( 'portfolio', 'glenon_wp' ),$args);
	
} // function: post_type END

// function: portfolio_messages BEGIN
function portfolio_messages($messages) {
	global $post, $post_ID;
	$messages[__( 'portfolio', 'glenon_wp' )] = 
		array(
			0 => '',
			1 => sprintf(__('Portfolio Updated. <a href="%s">View portfolio</a>', 'glenon_wp'), esc_url(get_permalink($post_ID))),
			2 => __('Custom Field Updated.', 'glenon_wp'),
			3 => __('Custom Field Deleted.', 'glenon_wp'),
			4 => __('Portfolio Updated.', 'glenon_wp'),
			5 => isset($_GET['revision']) ? sprintf( __('Portfolio Restored To Revision From %s', 'glenon_wp'), wp_post_revision_title((int)$_GET['revision'],false)) : false,
			6 => sprintf(__('Portfolio Published. <a href="%s">View Portfolio</a>', 'glenon_wp'), esc_url(get_permalink($post_ID))),
			7 => __('Portfolio Saved.', 'glenon_wp'),
			8 => sprintf(__('Portfolio Submitted. <a target="_blank" href="%s">Preview Portfolio</a>', 'glenon_wp'), esc_url( add_query_arg('preview','true', get_permalink($post_ID)))),
			9 => sprintf(__('Portfolio Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Portfolio</a>', 'glenon_wp'), date_i18n( __( 'M j, Y @ G:i', 'glenon_wp' ),strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
			10 => sprintf(__('Portfolio Draft Updated. <a target="_blank" href="%s">Preview Portfolio</a>', 'glenon_wp'), esc_url( add_query_arg('preview','true',get_permalink($post_ID)))),
		);
	return $messages;	
	
} // function: portfolio_messages END

// function: portfolio_filter BEGIN
function portfolio_cate()
{
	// Register the Taxonomy
	register_taxonomy(__( "portfolio_cat", "glenon_wp" ), 
	
	// Assign the taxonomy to be part of the portfolio post type
	array(__( "portfolio", 'glenon_wp' )), 
	
	// Apply the settings for the taxonomy
	array(
		"hierarchical" => true, 
		"label" => __( "Portfolio Categories", 'glenon_wp' ), 
		"singular_label" => __( "Portfolio Category", 'glenon_wp' ), 
		"rewrite" => array(
				'slug' => 'portfolio-cat', 
				'hierarchical' => true
				)
		)
	); 
} // function: portfolio_filter END


add_action('init', 'portfolio_type');
add_action('init', 'portfolio_cate', 0 );
add_filter('post_updated_messages', 'portfolio_messages');