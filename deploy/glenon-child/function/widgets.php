<?php

//widget support for a slider
register_sidebar(array(
  'name' => 'Slider Bar',
  'id' => 'sliderbar',
  'description' => __('Widgets in this area will be shown on the Slider Section.', 'glenon_wp'),
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget'  => '</div>',  
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>'
));

//widget support for a Latest Blog Bar
register_sidebar(array(
  'name' => 'Latest Blog Bar',
  'id' => 'latest-blog-bar',
  'description' => __('Widgets in this area will be shown on the Latest Blog Section.', 'glenon_wp'),
  'before_widget' => '<div id="%1$s" class="%2$s">',
  'after_widget'  => '</div>',  
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>'
));

//widget support for a Featured Project
register_sidebar(array(
  'name' => 'Featured Project',
  'id' => 'feat-proj',
  'description' => __('Widgets in this area will be shown on the Featured Project section on home page.', 'glenon_wp'),
  'before_widget' => '<div id="%1$s" class="%2$s">',
  'after_widget'  => '</div>',  
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>'
));

//widget support for a before main content sidebar
register_sidebar(array(
  'name' => 'Before Content SideBar',
  'id' => 'be4-main-sidebar',
  'description' => __('Widgets in this area will be shown before main content.', 'glenon_wp'),
  'before_widget' => '<div id="%1$s" class="%2$s"><div>',
  'after_widget'  => '</div></div>',
  'before_title' => '<h3 class="sidebar-title"><span>',
  'after_title' => '</span></h3>'
));

//widget support for a before main content sidebar
register_sidebar(array(
  'name' => 'After content SideBar',
  'id' => 'after-main-sidebar',
  'description' => __('Widgets in this area will be shown on the under main content.', 'glenon_wp'),
  'before_widget' => '<div id="%1$s" class="%2$s"><div>',
  'after_widget'  => '</div></div>', 
  'before_title' => '<h3 class="sidebar-title"><span>',
  'after_title' => '</span></h3>'
));

//widget support for a home sidebar
register_sidebar(array(
  'name' => 'Home SideBar',
  'id' => 'home-sidebar',
  'description' => __('Widgets in this area will be shown on home page.', 'glenon_wp'),
  'before_widget' => '<div id="%1$s" class="%2$s"><div>',
  'after_widget'  => '</div></div>',
  'before_title' => '<h3 class="sidebar-title"><span>',
  'after_title' => '</span></h3>'
));

//widget support for a blog sidebar
register_sidebar(array(
  'name' => 'Blog SideBar',
  'id' => 'blog-sidebar',
  'description' => __('Widgets in this area will be shown on blog page and single blog page.', 'glenon_wp'),
  'before_widget' => '<div id="%1$s" class="%2$s"><div>',
  'after_widget'  => '</div></div>',
  'before_title' => '<h3 class="sidebar-title"><span>',
  'after_title' => '</span></h3>'
));

//widget support for a blog sidebar
register_sidebar(array(
  'name' => 'Portfolio SideBar',
  'id' => 'portf-sidebar',
  'description' => __('Widgets in this area will be shown on single portfolio page.', 'glenon_wp'),
  'before_widget' => '<div id="%1$s" class="%2$s"><div>',
  'after_widget'  => '</div></div>',
  'before_title' => '<h3 class="sidebar-title"><span>',
  'after_title' => '</span></h3>'
));

//widget support for a blog sidebar
register_sidebar(array(
  'name' => 'Page SideBar',
  'id' => 'page-sidebar',
  'description' => __('Widgets in this area will be shown on single page.', 'glenon_wp'),
  'before_widget' => '<div id="%1$s" class="%2$s"><div>',
  'after_widget'  => '</div></div>',
  'before_title' => '<h3 class="sidebar-title"><span>',
  'after_title' => '</span></h3>'
));

//widget support for a contact sidebar
register_sidebar(array(
  'name' => 'Map Bar',
  'id' => 'mapbar',
  'description' => __('Widgets in this area will be shown on the above of contact form on contact page.', 'glenon_wp'),
  'before_widget' => '<div id="%1$s" class="%2$s">',
  'after_widget'  => '</div>',  
  'before_title' => '',
  'after_title' => ''
));

//widget support for a contact sidebar
register_sidebar(array(
  'name' => 'Contact SideBar',
  'id' => 'contact-sidebar',
  'description' => __('Widgets in this area will be shown on the right-hand side on contact page.', 'glenon_wp'),
  'before_widget' => '<div id="%1$s" class="%2$s"><div>',
  'after_widget'  => '</div></div>',
  'before_title' => '<h3 class="sidebar-title"><span>',
  'after_title' => '</span></h3>'
));

//widget support for a Featured Project
register_sidebar(array(
  'name' => 'Service Bar',
  'id' => 'service-bar',
  'description' => __('Widgets in this area will be shown on the Service section under the main contnent of home page.', 'glenon_wp'),
  'before_widget' => '<div id="%1$s" class="%2$s">',
  'after_widget'  => '</div>',  
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>'
));

//widget support for the Bottom sidebar
register_sidebar(array(
  'name' => 'Bottom SideBar #1',
  'id' => 'bottom-sidebar-1',
  'description' => __('Widgets in this area will be shown in the upper the footer.', 'glenon_wp'),
  'before_widget' => '<div id="%1$s" class="bottom-widget %2$s"><div>',
  'after_widget'  => '</div></div>',
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>'
));
register_sidebar(array(
  'name' => 'Bottom SideBar #2',
  'id' => 'bottom-sidebar-2',
  'description' => __('Widgets in this area will be shown in the upper the footer.', 'glenon_wp'),
  'before_widget' => '<div id="%1$s" class="bottom-widget %2$s"><div>',
  'after_widget'  => '</div></div>',
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>'
));
register_sidebar(array(
  'name' => 'Bottom SideBar #3',
  'id' => 'bottom-sidebar-3',
  'description' => __('Widgets in this area will be shown in the upper the footer.', 'glenon_wp'),
  'before_widget' => '<div id="%1$s" class="bottom-widget %2$s"><div>',
  'after_widget'  => '</div></div>',
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>'
));
register_sidebar(array(
  'name' => 'Bottom SideBar #4',
  'id' => 'bottom-sidebar-4',
  'description' => __('Widgets in this area will be shown in the upper the footer.', 'glenon_wp'),
  'before_widget' => '<div id="%1$s" class="bottom-widget %2$s"><div>',
  'after_widget'  => '</div></div>',
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>'
));

//widget support for a contact sidebar
register_sidebar(array(
  'name' => 'Footer Navigation',
  'id' => 'footnav',
  'description' => __('Widgets in this area will be shown on the right-hand side of footer.', 'glenon_wp'),
  'before_widget' => '<div id="%1$s">',
  'after_widget'  => '</div>',  
  'before_title' => '<h3>',
  'after_title' => '</h3>'
));

//Apply do_shortcode() to widgets so that shortcodes will be executed in widgets
add_filter('widget_text', 'do_shortcode');

/**
 * Add "first" and "last" CSS classes to dynamic sidebar widgets. Also adds numeric index class for each widget (widget-1, widget-2, etc.)
 */
function widget_first_last_classes($params) {

	global $my_widget_num; // Global a counter array
	$this_id = $params[0]['id']; // Get the id for the current sidebar we're processing
	$arr_registered_widgets = wp_get_sidebars_widgets(); // Get an array of ALL registered widgets

	if(!$my_widget_num) {// If the counter array doesn't exist, create it
		$my_widget_num = array();
	}

	if(!isset($arr_registered_widgets[$this_id]) || !is_array($arr_registered_widgets[$this_id])) { // Check if the current sidebar has no widgets
		return $params; // No widgets in this sidebar... bail early.
	}

	if(isset($my_widget_num[$this_id])) { // See if the counter array has an entry for this sidebar
		$my_widget_num[$this_id] ++;
	} else { // If not, create it starting with 1
		$my_widget_num[$this_id] = 1;
	}

	$class = 'class="widget-' . $my_widget_num[$this_id] . ' '; // Add a widget number class for additional styling options

	if($my_widget_num[$this_id] == 1) { // If this is the first widget
		$class .= 'widget-left ';
	} elseif($my_widget_num[$this_id] == count($arr_registered_widgets[$this_id])) { // If this is the last widget
		$class .= 'widget-right ';
	}

	$params[0]['before_widget'] = str_replace('class="', $class, $params[0]['before_widget']); // Insert our new classes into "before widget"

	return $params;

}
add_filter('dynamic_sidebar_params','widget_first_last_classes');