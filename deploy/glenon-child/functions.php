<?php 
/**
* Modified functions.php for Glenon-child theme
*/
 
/*-----------------------------------------------------------------------------------*/
/** Set Proper Parent/Child theme paths for inclusion **/

@define( 'PARENT_DIR', get_template_directory() );
@define( 'CHILD_DIR', get_stylesheet_directory() );

@define( 'PARENT_URL', get_template_directory_uri()  );
@define( 'CHILD_URL', get_stylesheet_directory_uri() ); 
 
 
/*-----------------------------------------------------------------------------------*/
/** REMOVE FUNCTIONS **/
function unhook_glenon_defaults(){
 	//Template - remove_action('hook_name','function_name',postitionnumber,numberofargs);
 };
add_action('init','unhook_glenon_defaults');



/*-----------------------------------------------------------------------------------*/
/** ADDITIONAL FUNCTIONS **/

/*function allfunction_init(){
	define( 'FUNCTION_URL', PARENT_URL . '/function/' );
	define( 'FUNCTION_DIR', PARENT_DIR . '/function/' );
	require_once (get_stylesheet_directory() . '/function/flexible-posts-widget.php');
	require_once (get_stylesheet_directory() . '/function/recent-posts-slider.php');
}

allfunction_init();
 */


/*-----------------------------------------------------------------------------------*/
/** ENQUING FUNCTIONS **/
?>


