<?php 
/**
* Modified functions.php for Glenon-child theme
*/
 
/** REMOVE FUNCTIONS **/
function unhook_glenon_defaults(){
 	//Template - remove_action('hook_name','function_name',postitionnumber,numberofargs);
 };
add_action('init','unhook_glenon_defaults');



 
/** ADDITIONAL FUNCTIONS **/
 
 
 
?>