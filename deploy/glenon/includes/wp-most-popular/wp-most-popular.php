<?php
/*
	Plugin Name: WP Most Popular
	Plugin URI: http://mattgeri.com/projects/wordpress/wp-most-popular
	Description: Flexible plugin to show most popular posts based on views
	Version: 0.2
	Author: Matt Geri
	Author URI: http://mattgeri.com
	License: GPL2
	
	Copyright 2011 Matt Geri (email: mattgeri@gmail.com)
	
	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as 
	published by the Free Software Foundation.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
	
	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( phpversion() > 5 ) {
	// Setup our path
	define( 'WMP_PATH', dirname(__FILE__) . '/' );
	
	// Include our helpers
	get_template_part( '/includes/wp-most-popular/system/helpers' );
	get_template_part( '/includes/wp-most-popular/system/setup' );
	
	// Class for installation and uninstallation
	class WMP_system{
		public static function actions() {
			// Check for token
			if ( ! wp_verify_nonce( $_POST['token'], 'wmp_token' ) ) die();
			
			get_template_part( '/includes/wp-most-popular/system/track' );
			$track = new WMP_track( intval( $_POST['id'] ) );
		}
		
		public static function javascript() {
			global $wp_query;
			wp_reset_query();
			wp_print_scripts('jquery');
			$token = wp_create_nonce( 'wmp_token' );
			if ( ! is_front_page() && ( is_page() || is_single() ) ) {
				echo '<!-- WordPress Most Popular --><script type="text/javascript">/* <![CDATA[ */ jQuery.post("' . admin_url('admin-ajax.php') . '", { action: "wmp_update", id: ' . $wp_query->post->ID . ', token: "' . $token . '" }); /* ]]> */</script><!-- /WordPress Most Popular -->';
			}
		}
		
		public static function widget() {
			register_widget( 'WMP_Widget' );
		}
	}
	
	// Use ajax for tracking popular posts
	add_action( 'wp_head', 'WMP_system::javascript' );
	add_action( 'wp_ajax_wmp_update', 'WMP_system::actions' );
	// Comment out to stop logging stats for admin and logged in users
	add_action( 'wp_ajax_nopriv_wmp_update', 'WMP_system::actions' );
	
	// Widget
	get_template_part( '/includes/wp-most-popular/system/widget' );
	add_action( 'widgets_init', 'WMP_system::widget' );
}