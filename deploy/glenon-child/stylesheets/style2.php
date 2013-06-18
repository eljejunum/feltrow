<?php
/**
 * @package WordPress
 * @subpackage Glenon-WP
 */

function my_styles_method() {
	wp_enqueue_script( 'options', PARENT_URL . '/stylesheets/options.css'
	);
	
	$predefine_colors = of_get_option('predefine-colors');
	$hide_slider_caption = of_get_option('hide_slider_caption');
	$sidebar_width = of_get_option('sidebar-width');
	$home_sidebar_width = of_get_option('home-sidebar-width');
	$mainside_home_width = 100-$home_sidebar_width;
	$mainside_width = 100-$sidebar_width;
	$sidebar_position = of_get_option('sidebar-position');
	$portf_sidebar_position = of_get_option('portf-sidebar-position');
	$home_sidebar_position = of_get_option('home-sidebar-position');
	$default_font_color = of_get_option('default-font-color');
	$default_link_color = of_get_option('default-link-color');
	$default_main_menu_color = of_get_option('default-main-menu-color');
	$default_hover_color = of_get_option('default-hover-color');
	$body_bg_color = of_get_option('body-bg-color');
	$bg_color = of_get_option('bg-color');
	$page_header_color = of_get_option('page-header-color');
	$tb_bg_color = of_get_option('tb-bg-color');
	$but_hov_bg = of_get_option('but-hov-bg');
	$other_bottom_width = of_get_option('other-bottom-width');
	$special_bottom_width = of_get_option('special-bottom-width');
	$special_bottom_position = of_get_option('bottom-widget-position');
	$bottom_bg = get_stylesheet_template_uri . '/images/wood-bg.jpg';

	$custom_css = "
	/* Basic ========================================= */
	body {
		background: {$body_bg_color};
		font: 12px/20px 'Droid Sans', 'DroidSansRegular', Arial, Helvetica, sans-serif;
		color: {$default_font_color};
		border-top:7px solid #e3e3e3;
	}

	/* #Header
	================================================== */
	h1.logo { font: 42px/50px 'Droid Sans', 'DroidSansRegular', 'Trebuchet MS',Helvetica,sans-serif; }
	h1.logo span.logo:first-letter { font-size:130%; }
	h1.logo .desc { font:bold 11px/42px 'Trebuchet MS',Helvetica,sans-serif; }
	h1.logo a.no-bg { display:inline; background:none; width:auto; height:auto; }

	/* #Font
	================================================== */
	h1, h2, h3, h4, h5, h6, article.wide-blog .blog-title, #navigation ul.menu a, 
		.tabberlive li a { font-family:'Helvetica Neue', Helvetica, Arial, sans-serif; }
	#mask-carousel a.Car-PostTitle, .carousel-widget a.Car-PostTitle, h3.widget-title, .title a, .sidebar h3, .menu-desc, 
		.main a.more-link, .portf h1.page-title { font-family: 'RabioheadRegular'; }
	h5#site-desc, #mask-slider .info h2, #mask-slider .ui-tabs-nav-item .title, #promo .text, 
		#bottom h3, #respond #reply-title, #slider h3 { font-family: 'Droid Sans', 'DroidSansRegular'; }
	#mask-carousel .post-meta { font-family: 'Trebuchet MS',Helvetica,sans-serif; }
	#navigation a{ color:{$default_main_menu_color}; }
	h3.sidebar-title, h3.widget-title { font-size:20px; color:#666; font-weight:bold; }
	.main a.more-link, .portf header.title a, .portf h1.page-title, ul.filter > li.active {font-weight:bold;}
	h5#site-desc, ul.tabbernav li a, article h1.page-title, article h2.post-title a, article h2.post-title a:hover, ul.filter > li a,
		ul.filter > li a:hover { color: {$default_font_color}; }
	#mask-slider, #mask-slider  .ui-tabs-nav-item .title, #promo .bigbutton a, #topest, .widget_wysija_cont .wysija-submit:hover, 
		.container .button a, .container .button a:hover, .portfolio .hover a, .portfolio .hover a:hover,
		.sidebar .recent-posts-plus h3, #nav-below .button a:hover, #nav-below .wp-pagenavi a:hover, #commentform input[type='submit']:hover, 
		.wpcf7  input[type='submit']:hover, #newsletter a, #newsletter a:hover, 
		#slider .da-slide .da-link:hover, .container .fullblock a, .container .fullblock a:hover, .flexslider a, .flexslider a:hover,
		.accButton > span.number, .dpe-flexible-posts.portf-cols a span.title, .portf header.title a, .portf h1.page-title { color:#fff; }
	#bottom .menu li a:hover, h1.contentheading { color:#555; }
	a, #mask-carousel a, #promo .text .like, p.trigger a, p.trigger a:hover,p.trigger.active a:hover, ul.filter > li.active a,
	#navigation ul.menu > li.active > a, #navigation a:hover, .mainside h5 span, ul.tabbernav li.tabberactive a { color:{$default_link_color}; }
	a:hover, a:hover { color:{$default_hover_color}; }
	#mask-carousel a:hover { color:{$page_header_color}; }
	blockquote { font-family:Georgia, Times, serif; }

	/* Background */ 
	#navigation ul.sub-menu { background:#fff; }
	.button a, .wp-pagenavi span, .wp-pagenavi a, #newsletter, .portfolio .hover a span, #bottom input[type='submit'],
		input.submit, #newsletter .bigbutton a, .widget_wysija_cont .wysija-submit, #commentform input[type='submit'],
		#slider .da-slide .da-link, .wide-post span.blog-date, .wpcf7  input[type='submit'], .accButton > span.number,
		.dpe-flexible-posts.portf-cols li span.title, div.the-date, .portf header.title, .flex-control-paging li a:hover, 
		.flex-control-paging li a.flex-active { background:{$bg_color}; }
	#newsletter .bigbutton a:hover, .widget_wysija_cont .wysija-submit:hover { background:#000; }
	.button a:hover, #nav-below .wp-pagenavi a:hover, #commentform input[type='submit']:hover, #bottom input[type='submit']:hover,
		.wpcf7  input[type='submit']:hover, #promo .bigbutton a:hover, input.submit:hover,
		#slider .da-slide .da-link:hover, .accButton:hover > span.number, .wide-blog:hover .blog-date { background:{$but_hov_bg}; }
	#bottom, #footer, #mask-slider li.ui-tabs-nav-item a:hover { background-image: {$bottom_bg};}
	.latest-item img, .wp-caption, .entry-content p:first-child img, #commentsin, .portf a.port-img, .blog-thumb img.wp-post-image, 
		.widget_dpe_fp_widget img, .blog-image {}

	/* Border */
	/* #navigation ul.sub-menu li { border-top: 1px dotted #ccc; }
	#navigation ul.sub-menu li:first-child { border-top:none; }
	#promo, #maincontent.forhome .container, #service .container,  #project .container { border-bottom:1px dotted #d0d0d0; } */

	/* Width */
	.sidebar-b { width:{$sidebar_width}%; } 
	.mainside { width:{$mainside_width}%; }
	.sidebar-home { width:{$home_sidebar_width}%; }
	#homepage.mainside { width:{$mainside_home_width}%; }
	#bottom .b-sidebar { float:left; width:{$other_bottom_width}%; }
	#bottom .bs-{$special_bottom_position} { width:{$special_bottom_width}%; }

	/* Sidebar Position */
	/* .container .mainside.columns { float:{$sidebar_position}; }
	.container .mainside.columns.portf { float:{$portf_sidebar_position}; }
	.container #homepage.home.mainside.columns { float:{$home_sidebar_position}; }
	#maincontent.content-{$home_sidebar_position} #homepage { float:{$home_sidebar_position}; } */
	
	#latest-blog img.wp-post-image:hover, .blog-image img:hover, .blog-thumb img.wp-post-image:hover, .wp-caption img:hover {opacity:0.6}
	
	
	/* #Tablet (Portrait)
	================================================== */

		/* Note: Design for a width of 768px */

		@media only screen and (min-width: 768px) and (max-width: 959px) {
			
			#homepage.mainside, #maincontent.sidebar-left #homepage, .sidebar-home, .sidebar-home2 { width:100%; }
			.container .sidebar-home .gutter.sidebar, .container .sidebar-home2 .gutter.sidebar { margin-left:0; margin-right:0; }
			.sidebar ul.client-list li img { width:100%; }
			
		}

		
	/*  #Mobile (Portrait)
	================================================== */

		/* Note: Design for a width of 320px */

		@media only screen and (max-width: 767px) {
		
			#bottom .bs-{$special_bottom_position}, #bottom .b-sidebar, .container .be4-main-w, #homepage.home, .sidebar-home, 
			#homepage.home.mainside, #homepage.mainside, .sidebar-home2, #maincontent.sidebar-left #homepage { width:100%; }
			.container ul.client-list li img, #myclient ul li img { width:100%; }

		}


	/* #Mobile (Landscape)
	================================================== */

		/* Note: Design for a width of 480px */

		@media only screen and (min-width: 480px) and (max-width: 767px) {

		}
	";
	
        
        wp_add_inline_style('options',$custom_css);
}
add_action('wp_enqueue_scripts', 'my_styles_method');