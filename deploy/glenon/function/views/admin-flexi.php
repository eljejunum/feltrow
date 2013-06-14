<?php
/**
 * Flexible Posts Widget: Widget Admin Form 
 */

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');

?>
<div class="dpe-fp-widget">

	<div class="section title">
        <p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget title:', 'glenon_wp'); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
	</div>
    
    <div class="section getemby">
		<h4><?php _e('Get posts by', 'glenon_wp'); ?></h4>
		<div class="inside">
		
			<p>
				<label for="<?php echo $this->get_field_id('categories'); ?>"><?php _e( 'Filter by Category', 'glenon_wp' ) ?></label> 
				<?php wp_dropdown_categories(array('name' => $this->get_field_name('categories'), 'selected' => $instance['categories'], 'orderby' => 'Name' , 'hierarchical' => 1, 'show_option_all' => 'All Categories', 'hide_empty' => '0')); ?>
				<?php
					$post_types = get_post_types();
					unset($post_types['page'], $post_types['attachment'], $post_types['revision'], $post_types['nav_menu_item']);
				?>
			</p>
				
			<p>
				<label for="<?php echo $this->get_field_id('post_type'); ?>"><?php _e( 'Filter by Post Type', 'glenon_wp' ) ?></label> 
				<select id="<?php echo $this->get_field_id('post_type'); ?>" name="<?php echo $this->get_field_name('post_type'); ?>" style="width:100%;">
				<?php
						foreach ($post_types as $post_type ) { ?>
							<option value="<?php echo $post_type ?>" <?php if ($post_type == $instance['post_type']) echo 'selected="selected"'; ?>>
								<?php echo $post_type ?>
							</option>
						<?php } ?>
				</select>
			</p><!-- .pt.getemby -->
			
		</div><!-- .inside -->
	
	</div>
	
	<div class="section display">
		<h4><?php _e('Display options', 'glenon_wp'); ?></h4>
		<p class="cf">
          <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'glenon_wp'); ?></label> 
          <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" />
        </p>
		<p class="cf">
          <label for="<?php echo $this->get_field_id('offset'); ?>"><?php _e('Number of posts to skip:', 'glenon_wp'); ?></label> 
          <input id="<?php echo $this->get_field_id('offset'); ?>" name="<?php echo $this->get_field_name('offset'); ?>" type="text" value="<?php echo $offset; ?>" />
        </p>
   		<p class="cf">
			<label for="<?php echo $this->get_field_id('orderby'); ?>"><?php _e('Order posts by:', 'glenon_wp'); ?></label> 
			<select name="<?php echo $this->get_field_name('orderby'); ?>" id="<?php echo $this->get_field_id('orderby'); ?>">
				<?php
				foreach ( $this->orderbys as $key => $value ) {
					echo '<option value="' . $key . '" id="' . $this->get_field_id( $key ) . '"', $orderby == $key ? ' selected="selected"' : '', '>', $value, '</option>';
				}
				?>
			</select>		
		</p>
		<p class="cf">
			<label for="<?php echo $this->get_field_id('order'); ?>"><?php _e('Order:', 'glenon_wp'); ?></label> 
			<select name="<?php echo $this->get_field_name('order'); ?>" id="<?php echo $this->get_field_id('order'); ?>">
				<?php
				foreach ( $this->orders as $key => $value ) {
					echo '<option value="' . $key . '" id="' . $this->get_field_id( $key ) . '"', $order == $key ? ' selected="selected"' : '', '>', $value, '</option>';
				}
				?>
			</select>		
		</p>
	</div>
	
	<div class="section thumbnails">
		<p style="margin-top:1.33em;">
          <input class="dpe-fp-thumbnail" id="<?php echo $this->get_field_id('thumbnail'); ?>" name="<?php echo $this->get_field_name('thumbnail'); ?>" type="checkbox" value="1" <?php checked( '1', $thumbnail ); ?>/>
          <label style="font-weight:bold;" for="<?php echo $this->get_field_id('thumbnail'); ?>"><?php _e('Display thumbnails?', 'glenon_wp'); ?></label> 
        </p>
		<p <?php echo $thumbnail ? '' : 'style="display:none;"'?>  class="thumb-size">	
			<label for="<?php echo $this->get_field_id('thumbsize'); ?>"><?php _e('Select a thumbnail size to show:', 'glenon_wp'); ?></label> 
			<select class="widefat" name="<?php echo $this->get_field_name('thumbsize'); ?>" id="<?php echo $this->get_field_id('thumbsize'); ?>">
				<?php
				foreach ($this->thumbsizes as $option) {
					echo '<option value="' . $option . '" id="' . $this->get_field_id( $option ) . '"', $thumbsize == $option ? ' selected="selected"' : '', '>', $option, '</option>';
				}
				?>
			</select>		
		</p>
	</div>
	
	<div class="section template">
		<p style="margin:1.33em 0;">
			<label for="<?php echo $this->get_field_id('template') ?>"><?php _e('Template', 'glenon_wp') ?></label>
			<select id="<?php echo $this->get_field_id( 'template' ) ?>" name="<?php echo $this->get_field_name( 'template' ) ?>">
				<?php foreach($templates as $template) : ?>
					<option value="<?php echo esc_attr($template) ?>" <?php selected($instance['template'], $template) ?>><?php echo esc_html($template) ?></option>
				<?php endforeach; ?>
			</select>
		</p>
	</div>
	
</div><!-- .dpe-fp-widget -->
