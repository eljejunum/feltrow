<?php

// function: add_portfolio_category BEGIN
function add_portfolio_category() {

	register_taxonomy('portfolio_category', 'post', array(
		// Hierarchical taxonomy (like categories)
		'hierarchical' => true,
		// This array of options controls the labels displayed in the WordPress Admin UI
		'labels' => array(
			'name' => _x( 'Portfolio Category', 'taxonomy general name', 'glenon_wp' ),
			'singular_name' => _x( 'Portfolio Category', 'taxonomy singular name', 'glenon_wp' ),
			'search_items' =>  __( 'Search Portfolio Category', 'glenon_wp' ),
			'all_items' => __( 'All Portfolio Category', 'glenon_wp' ),
			'parent_item' => __( 'Parent Portfolio Category', 'glenon_wp' ),
			'parent_item_colon' => __( 'Parent Portfolio Category:', 'glenon_wp' ),
			'edit_item' => __( 'Edit Portfolio Category', 'glenon_wp' ),
			'update_item' => __( 'Update Portfolio Category', 'glenon_wp' ),
			'add_new_item' => __( 'Add New Portfolio Category', 'glenon_wp' ),
			'new_item_name' => __( 'New Portfolio Category Name', 'glenon_wp' ),
			'menu_name' => __( 'Portfolio Category', 'glenon_wp' ),
		),
		// Control the slugs used for this taxonomy
		'rewrite' => array(
			'slug' => 'portfolio-category', // This controls the base slug that will display before each term
			'with_front' => false, // Don't display the category base before "/locations/"
			'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
		),
	));
} // function: add_portfolio_category END

add_action( 'init', 'add_portfolio_category', 0 );

?>