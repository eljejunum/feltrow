<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'glenon_wp'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$special_width_position = array(
		'none' => __('None', 'glenon_wp'),
		'left' => __('Left', 'glenon_wp'),
		'right' => __('Right', 'glenon_wp')
	);
	$sidebar_position = array(
		'none' => __('No Sidebar', 'glenon_wp'),
		'right' => __('Right', 'glenon_wp'),
		'left' => __('Left', 'glenon_wp')
	);
	$number_array = array(
		'one' => __('One', 'glenon_wp'),
		'two' => __('Two', 'glenon_wp'),
		'three' => __('Three', 'glenon_wp'),
		'four' => __('Four', 'glenon_wp')
	);
	$color_array = array(
		'default' => __('Default', 'glenon_wp'),
		'orange' => __('Orange', 'glenon_wp'),
		'pink' => __('Pink', 'glenon_wp'),
		'moonstone-blue' => __('Moonstone Blue', 'glenon_wp'),
		'yellow' => __('Yellow', 'glenon_wp'),
		'red' => __('Red', 'glenon_wp'),
		'green' => __('Green', 'glenon_wp'),
		'teal' => __('Teal', 'glenon_wp')
	);
	
	$proj_col_array = array(
		'three' => __('Three', 'glenon_wp'),
		'four' => __('Four', 'glenon_wp')
	);
	
	$proj_item_layout = array(
		'hover' => __('Hover', 'glenon_wp'),
		'classic' => __('Classic', 'glenon_wp')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );
		
	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array( 'show_option_all' => 'All' );
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all the categories into an array
	$options_terms = array( 'show_option_all' => 'All' );
	$options_terms_obj = get_terms('portfolio_category');
	foreach ($options_terms_obj as $term) {
		$options_terms[$term->term_id] = $term->name;
	}
	
	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/theme-options/images/';

	$options = array();

	$options[] = array(
		'name' => __('Main Layout', 'glenon_wp'),
		'type' => 'heading');
						
	$options[] = array( 
		'name' => __('Your Own logo', 'glenon_wp'),
		'desc' => __('Display Your Own logo, default logo will be removed', 'glenon_wp'),
		'id' => 'your-logo',
		'std' => '',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Upload Your Logo', 'glenon_wp'),
		'desc' => __('Upload your logo image here, or specify the image address of your online logo.', 'glenon_wp'),
		'id' => 'your-logo-img',
		'class' => 'hidden',
		'type' => 'upload');
						
	$options[] = array( 
		'name' => __('Your Own Favicon', 'glenon_wp'),
		'desc' => __('Display Your Own Favicon, default Favicon will be removed', 'glenon_wp'),
		'id' => 'your-favicon',
		'std' => '',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Upload Your Favicon', 'glenon_wp'),
		'desc' => __('Upload your Favicon image here, or specify the image address of your online Favicon.', 'glenon_wp'),
		'id' => 'your-favicon-img',
		'class' => 'hidden',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Site Description', 'glenon_wp'),
		'desc' => __('Display Site Description.', 'glenon_wp'),
		'id' => 'your-desc',
		'std' => 'My name is Glenon, I&lsquo;m a Lazy Graphics and Web Designer. You can also find me on <a href="#" title="Aha, follow me on twitter">Twitter</a>, 
					<a href="#" title="Be my friend on facebook">Facebook </a>and in 
					<a href="http://maps.google.com/maps?q=-7.191313,113.253227&amp;hl=en&amp;ll=-7.191313,113.253227&amp;spn=0.281013,0.528374&amp;sll=-7.191313,113.253227&amp;sspn=0.281013,0.528374&amp;hnear=Sampang,+East+Java,+Indonesia&amp;t=m&amp;z=12" target="_blank" title="My City on Map">Sampang</a>.',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Sidebar Width', 'glenon_wp'),
		'desc' => __('Set the Sidebar Width.', 'glenon_wp'),
		'id' => 'sidebar-width',
		'std' => '33',
		'class' => 'mini',
		'type' => 'text');
						
	$options[] = array( 
		'name' => __('Sidebar Position', 'glenon_wp'),
		'desc' => __('Assign the Sidebar position.', 'glenon_wp'),
		'id' => 'sidebar-position',
		'std' => 'right',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $sidebar_position);
						
	$options[] = array( 
		'name' => __('Portfolio Sidebar Position', 'glenon_wp'),
		'desc' => __('Assign the Portfolio Sidebar position.', 'glenon_wp'),
		'id' => 'portf-sidebar-position',
		'std' => 'right',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $sidebar_position);
						
	$options[] = array( 
		'name' => __('Bottom Special Width', 'glenon_wp'),
		'desc' => __('Assign the bottom widget special width position.', 'glenon_wp'),
		'id' => 'bottom-widget-position',
		'std' => 'none',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $special_width_position);

	$options[] = array(
		'name' => __('Bottom Widget Special Width', 'glenon_wp'),
		'desc' => __('Set Bottom Widget Special Width.', 'glenon_wp'),
		'id' => 'special-bottom-width',
		'std' => '40',
		'class' => 'mini hidden',
		'type' => 'text');

	$options[] = array(
		'name' => __('Other Widget Bottom Width', 'glenon_wp'),
		'desc' => __('Other Special Widget Bottom Width, Please Make sure the total width with special bottom width is 100%.', 'glenon_wp'),
		'id' => 'other-bottom-width',
		'std' => '25',
		'class' => 'mini',
		'type' => 'text');
						
	$options[] = array( 
		'name' => __('Your Copyright', 'glenon_wp'),
		'desc' => __('Display your own copyright, default copyright will be removed.', 'glenon_wp'),
		'id' => 'use_custom_copy',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Your Copyright Text', 'glenon_wp'),
		'desc' => __('Display your own copyright text.', 'glenon_wp'),
		'id' => 'custom_copy_text',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Your Analytics Code', 'glenon_wp'),
		'desc' => __('Please paste all google analytics script ini here.', 'glenon_wp'),
		'id' => 'analytics_code',
		'std' => '',
		'type' => 'textarea');
		

	$options[] = array(
		'name' => __('Home Settings', 'glenon_wp'),
		'type' => 'heading');
						
	$options[] = array( 
		'name' => __('Show Home Page Title', 'glenon_wp'),
		'desc' => __('Display Home Page Title.', 'glenon_wp'),
		'id' => 'mas-home-title',
		'std' => '0',
		'type' => 'checkbox');
						
	$options[] = array( 
		'name' => __('Home Sidebar Position', 'glenon_wp'),
		'desc' => __('Assign the Home Sidebar position.', 'glenon_wp'),
		'id' => 'home-sidebar-position',
		'std' => 'right',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $sidebar_position);

	$options[] = array(
		'name' => __('Home Sidebar Width', 'glenon_wp'),
		'desc' => __('Set the Home Sidebar Width.', 'glenon_wp'),
		'id' => 'home-sidebar-width',
		'std' => '33',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Blog Page Settings', 'glenon_wp'),
		'type' => 'heading');
						
	$options[] = array( 
		'name' => __('Show Blog Page Title', 'glenon_wp'),
		'desc' => __('Display Blog Page Title.', 'glenon_wp'),
		'id' => 'mas-blog-title',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Blog Page Title', 'glenon_wp'),
		'desc' => __('Shown Blog Page Title.', 'glenon_wp'),
		'id' => 'mas-blog-cat-title',
		'std' => 'Glenon Blog',
		'type' => 'text');

	$options[] = array(
		'name' => __('Select a Blog Category', 'glenon_wp'),
		'desc' => __('Select the category for the Blog Page. Select <strong>All</strong> to show latest posts.', 'glenon_wp'),
		'id' => 'mas-blog-category',
		'std' => '',
		'type' => 'select',
		'options' => $options_categories);


	$options[] = array(
		'name' => __('Additional Page Settings', 'glenon_wp'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Portfolio Page Title', 'glenon_wp'),
		'desc' => __('Shown Portfolio Page Title.', 'glenon_wp'),
		'id' => 'mas-port-cat-title',
		'std' => 'Portfolio',
		'type' => 'text');
						
	$options[] = array( 
		'name' => __('Portfolio Type', 'glenon_wp'),
		'desc' => __('Check this if you use Portfolio post type as portfolio not the original WordPress post.', 'glenon_wp'),
		'id' => 'mas_portfolio_type',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Select a Portfolio Category', 'glenon_wp'),
		'desc' => __('Select the category for the Portfolio Page. If you use original WordPress post.', 'glenon_wp'),
		'id' => 'mas-port-category',
		'std' => '',
		'type' => 'select',
		'options' => $options_categories);

	$options[] = array(
		'name' => __('Number of posts', 'glenon_wp'),
		'desc' => __('How many post will be shown on Portfolio Page, add -1 if you want to show all.', 'glenon_wp'),
		'id' => 'port-number-of-posts',
		'std' => '8',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Portfolio item layout', 'glenon_wp'),
		'desc' => __('Select portfolio item layout.', 'glenon_wp'),
		'id' => 'mas-port-layout',
		'std' => 'hover',
		'type' => 'select',
		'options' => $proj_item_layout);
	
	
	
	$options[] = array(
		'name' => __('Colors Settings', 'glenon_wp'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Show Predefine Colors', 'glenon_wp'),
		'desc' => __('Check this if you want to use the others Predefine Colors.', 'glenon_wp'),
		'std' => '1',
		'id' => 'predefine-colors',
		'type' => 'checkbox');
		
	$options[] = array(
		'name' => __('Choose Predefine color', 'glenon_wp'),
		'desc' => __('Choose one of Predefine Color.', 'glenon_wp'),
		'id' => 'predefine-color',
		'std' => 'default',
		'class' => 'hidden',
		'type' => 'select',
		'options' => $color_array);

	$options[] = array(
		'name' => __('Default Body Background Color', 'glenon_wp'),
		'desc' => __('Edit it as you wish.', 'glenon_wp'),
		'id' => 'body-bg-color',
		'std' => '#f8f8f8',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Default Background Color', 'glenon_wp'),
		'desc' => __('Edit it as you wish.', 'glenon_wp'),
		'id' => 'bg-color',
		'std' => '#04a6d4',
		'type' => 'color');

	$options[] = array(
		'name' => __('Page Header Color', 'glenon_wp'),
		'desc' => __('Edit it as you wish.', 'glenon_wp'),
		'id' => 'page-header-color',
		'std' => '#ababab',
		'type' => 'color');

	$options[] = array(
		'name' => __('Top and Bottom Background Color', 'glenon_wp'),
		'desc' => __('Edit it as you wish.', 'glenon_wp'),
		'id' => 'tb-bg-color',
		'std' => '#f3f3f3',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Button Hover Background', 'glenon_wp'),
		'desc' => __('Display button, readmore on hover. Edit it as you wish.', 'glenon_wp'),
		'id' => 'but-hov-bg',
		'std' => '#0599c3',
		'type' => 'color');

	$options[] = array(
		'name' => __('Default Font Color', 'glenon_wp'),
		'desc' => __('Edit it as you wish.', 'glenon_wp'),
		'id' => 'default-font-color',
		'std' => '#707070',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Default Link Color', 'glenon_wp'),
		'desc' => __('Edit it as you wish.', 'glenon_wp'),
		'id' => 'default-link-color',
		'std' => '#04a6d4',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Default Main Menu Color', 'glenon_wp'),
		'desc' => __('Edit it as you wish.', 'glenon_wp'),
		'id' => 'default-main-menu-color',
		'std' => '#808080',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Default Hover Color', 'glenon_wp'),
		'desc' => __('Edit it as you wish.', 'glenon_wp'),
		'id' => 'default-hover-color',
		'std' => '#0585a9',
		'type' => 'color' );

	return $options;
}

/*
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function($) {

	$('#predefine-colors').click(function() {
  		$('#section-predefine-color').fadeToggle(400);
	});

	if ($('#predefine-colors:checked').val() !== undefined) {
		$('#section-predefine-color').show();
	}

	$('#your-logo').click(function() {
  		$('#section-your-logo-img').fadeToggle(400);
	});

	$('#your-favicon').click(function() {
  		$('#section-your-favicon-img').fadeToggle(400);
	});

	if ($('#your-logo:checked').val() !== undefined) {
		$('#section-your-logo-img').show();
	}
	
	$("#bottom-widget-position").change(function(){
    if ($("#bottom-widget-position").val() == "none") {
       $('#section-special-bottom-width').fadeOut(400);
    } else {
       $('#section-special-bottom-width').fadeIn(400);
    }

	if ($('#bottom-widget-position').val() !== "none") {
		$('#section-special-bottom-width').show();
	}
});

});
</script>

<?php
}
?>