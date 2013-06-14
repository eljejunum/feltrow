<?php
 
if ( !function_exists( 'mas_registerstyles' ) ) {
	function mas_registerstyles() {
		$theme  = wp_get_theme();
		$version = $theme['Version'];
		$stylesheets = wp_enqueue_style('theme', PARENT_URL.'/style.css', 'theme', $version, 'screen, projection');
		$stylesheets .= wp_enqueue_style('base', PARENT_URL .'/stylesheets/base.css', 'theme', $version, 'screen, projection');
		$stylesheets .= wp_enqueue_style('skeleton', PARENT_URL .'/stylesheets/skeleton.css', 'theme', $version, 'screen, projection');
		$stylesheets .= wp_enqueue_style('prettyPhoto', PARENT_URL .'/stylesheets/prettyPhoto.css', 'theme', $version, 'screen, projection');
		// $stylesheets .= wp_enqueue_style('superfish', PARENT_URL .'/stylesheets/superfish.css', 'theme', $version, 'screen, projection');
		$stylesheets .= wp_enqueue_style('options', PARENT_URL .'/stylesheets/options.css', 'theme', $version, 'screen, projection');
		$stylesheets .= wp_enqueue_style('custom', PARENT_URL .'/custom.css', 'theme', $version, 'screen, projection');
		if ( of_get_option('predefine-colors') ) {
			$stylesheets .= wp_enqueue_style('color', PARENT_URL .'/stylesheets/color-'. of_get_option('predefine-color') .'.css', false, $version, 'screen, projection');
		}
	}
	add_action('get_header', 'mas_registerstyles');
}

if ( !function_exists( 'mas_header_scripts' ) ) {
function mas_header_scripts() {
	wp_register_script( 'mobilemenu', PARENT_URL  . '/javascripts/jquery.mobilemenu.js', array('jquery'), '1.0', true );
	wp_register_script( 'prettyPhoto_script', PARENT_URL  . '/javascripts/jquery.prettyPhoto.js', array('jquery'), '3.1.4', true );
	wp_register_script('superfish',PARENT_URL  . '/javascripts/superfish.js', array('jquery'),'1.2.3', true);
	wp_register_script('quicksand',PARENT_URL  . '/javascripts/jquery.quicksand.js', array('jquery'),'1.2.2', true);
	wp_register_script('easing',PARENT_URL  . '/javascripts/jquery.easing.1.3.js', array('jquery'),'1.3', true);
	wp_register_script('formalize',PARENT_URL  . '/javascripts/jquery.formalize.min.js', array('jquery'),'1.2.3', true);
	wp_register_script('jcarousellite', PARENT_URL  . '/javascripts/jcarousellite_1.0.1.min.js', array('jquery'), '1.0.1', true);
	wp_register_script('template', PARENT_URL  . '/javascripts/template.js', array('jquery'), '2.3.1', true);
	
	wp_enqueue_script( 'mobilemenu' );
	wp_enqueue_script( 'prettyPhoto_script' );
	wp_enqueue_script( 'superfish' );
	wp_enqueue_script( 'easing' );
	wp_enqueue_script( 'formalize' );
	wp_enqueue_script( 'jcarousellite' );
	wp_enqueue_script( 'template' );
	
	// if ( is_page_template('page-template/template-filterable-portfolio.php') 
		// || is_page_template('page-template/template-filterable-portfolio-3col.php') 
		// || is_page_template('page-template/template-filterable-portfolio-2col.php') 
		// || is_page_template('page-template/template-home3.php')
		// || is_page_template('page-template/template-home2.php') ) {
	// wp_enqueue_script( 'quicksand' );	
	// }
}
add_action('wp_enqueue_scripts', 'mas_header_scripts');
}

require_once (PARENT_DIR . '/stylesheets/style2.php');


//Lets add Open Google Analytics script
if ( of_get_option('analytics_code') != '' ) {
	function add_google_analytics() {
		$analytics_code = of_get_option('analytics_code');
		echo "<script type='text/javascript'>\n"; 
		echo $analytics_code;
		echo "\n</script>\n";
	}
	add_action('wp_footer', 'add_google_analytics');
}