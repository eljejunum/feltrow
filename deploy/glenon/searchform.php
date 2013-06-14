<?php
/**
 * @package WordPress
 * @subpackage Glenon-WP
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" class="field inputbox" name="s" id="s" placeholder="<?php esc_attr_e( 'Search...', 'glenon_wp' ); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'go', 'glenon_wp' ); ?>" />
	</form>
