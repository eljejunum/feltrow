<?php
/**
 * @package WordPress
 * @subpackage Glenon-WP
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if gte IE 9 ]><html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<html <?php language_attributes(); ?>> 
    
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
    
    <title><?php wp_title('|',true,'right'); ?><?php bloginfo('name'); ?></title>
        
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Favicons
  ================================================== -->
    
	<?php if ( of_get_option('your-favicon') ) : //include Featured Project ?>
	<link rel="shortcut icon" href="<?php echo of_get_option('your-favicon-img') ?>/favicon.ico"> 
	<?php else : ?>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico">
	<?php endif ?>
	<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/logo57.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/images/logo72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/images/logo114.png">

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	
<?php wp_head(); ?>       
</head>

<body <?php body_class(); ?>><!-- the Body  -->

<div class="wrapper clearfix"><!-- Will be ended on footer.php  -->