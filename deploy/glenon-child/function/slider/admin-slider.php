<p>
    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title', 'glenon_wp' ) ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" type="text" />
</p>

<p>
	<label for="<?php echo $this->get_field_id('slider_type') ?>"><?php _e('Slider Type', 'glenon_wp') ?></label>
	<select id="<?php echo $this->get_field_id( 'slider_type' ) ?>" name="<?php echo $this->get_field_name( 'slider_type' ) ?>">
		<?php foreach($slider_types as $slider_type) : ?>
			<option value="<?php echo esc_attr($slider_type) ?>" <?php selected($instance['slider_type'], $slider_type) ?>><?php echo esc_html($slider_type) ?></option>
		<?php endforeach; ?>
	</select>
</p>

<p>
    <label for="<?php echo $this->get_field_id('categories'); ?>"><?php _e( 'Filter by Category', 'glenon_wp' ) ?></label> 
    <?php wp_dropdown_categories(array('name' => $this->get_field_name('categories'), 'selected' => $instance['categories'], 'orderby' => 'Name' , 'hierarchical' => 1, 'show_option_all' => 'All Categories', 'hide_empty' => '0')); ?>
    <?php
    $post_types = get_post_types();
    unset($post_types['page'], $post_types['attachment'], $post_types['revision'], $post_types['nav_menu_item']);
    ?>
</p>

<p>
    <label for="<?php echo $this->get_field_id('categories'); ?>"><?php _e( 'Filter by Post Type', 'glenon_wp' ) ?></label> 
    <select id="<?php echo $this->get_field_id('post_type'); ?>" name="<?php echo $this->get_field_name('post_type'); ?>" style="width:100%;">
    <?php
            foreach ($post_types as $post_type ) { ?>
                <option value="<?php echo $post_type ?>" <?php if ($post_type == $instance['post_type']) echo 'selected="selected"'; ?>>
                    <?php echo $post_type ?>
                </option>
            <?php } ?>
    </select>
</p>
        
<p>
    <label for="<?php echo $this->get_field_id('slider_duration'); ?>"><?php _e( 'Slider Duration - Length of time to change slides <em>(In milliseconds)</em>', 'glenon_wp' ) ?></label>
    <input style="width: 40px;" id="<?php echo $this->get_field_id('slider_duration'); ?>" name="<?php echo $this->get_field_name('slider_duration'); ?>" value="<?php echo $instance['slider_duration']; ?>" type="text" />
</p>

<p>
    <label for="<?php echo $this->get_field_id('slider_pause'); ?>"><?php _e( 'Slider Pause - Length of time to pause on a slide <em>(In milliseconds)</em>', 'glenon_wp' ) ?></label>
    <input style="width: 40px;" id="<?php echo $this->get_field_id('slider_pause'); ?>" name="<?php echo $this->get_field_name('slider_pause'); ?>" value="<?php echo $instance['slider_pause']; ?>" type="text" />
</p>

<p>
    <label for="<?php echo $this->get_field_id('slider_count'); ?>"><?php _e( 'Number of slides to display', 'glenon_wp' ) ?></label>
    <input style="width: 40px;" id="<?php echo $this->get_field_id('slider_count'); ?>" name="<?php echo $this->get_field_name('slider_count'); ?>" value="<?php echo $instance['slider_count']; ?>" type="text" />
</p>

<!--p>
    <label for="<?php echo $this->get_field_id('slider_height'); ?>"><?php _e( 'Slider Height <em>(In pixels)</em>', 'glenon_wp' ) ?></label>
    <input style="width: 40px;" id="<?php echo $this->get_field_id('slider_height'); ?>" name="<?php echo $this->get_field_name('slider_height'); ?>" value="<?php echo $instance['slider_height']; ?>" type="text" />
</p-->
	
<p>
    <input class="checkbox" type="checkbox" <?php checked($instance['slider_navi'], 'on'); ?> id="<?php echo $this->get_field_id('slider_navi'); ?>" name="<?php echo $this->get_field_name('slider_navi'); ?>" /> 
    <label for="<?php echo $this->get_field_id('slider_navi'); ?>"><?php _e( 'Show Navigation Arrow', 'glenon_wp' ) ?></label>
</p>
	
<p>
    <input class="checkbox" type="checkbox" <?php checked($instance['post_title'], 'on'); ?> id="<?php echo $this->get_field_id('post_title'); ?>" name="<?php echo $this->get_field_name('post_title'); ?>" /> 
    <label for="<?php echo $this->get_field_id('post_title'); ?>"><?php _e( 'Show Post Title', 'glenon_wp' ) ?></label>
</p>
	
<p>
    <input class="checkbox" type="checkbox" <?php checked($instance['post_excerpt'], 'on'); ?> id="<?php echo $this->get_field_id('post_excerpt'); ?>" name="<?php echo $this->get_field_name('post_excerpt'); ?>" /> 
    <label for="<?php echo $this->get_field_id('post_excerpt'); ?>"><?php _e( 'Post Excerpt &nbsp;&nbsp;&nbsp; Length<em>(char)</em>:', 'glenon_wp' ) ?></label>
    <input style="width: 40px;" id="<?php echo $this->get_field_id('excerpt_length'); ?>" name="<?php echo $this->get_field_name('excerpt_length'); ?>" value="<?php echo $instance['excerpt_length']; ?>" type="text" />
</p>