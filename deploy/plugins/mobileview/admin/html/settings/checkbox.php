<input type="checkbox" class="checkbox" name="<?php wpmobi_the_tab_setting_name(); ?>" id="<?php wpmobi_the_tab_setting_name(); ?>"<?php if ( wpmobi_the_tab_setting_is_checked() ) echo " checked"; ?> />	
<label class="checkbox" for="<?php wpmobi_the_tab_setting_name(); ?>">
	<?php wpmobi_the_tab_setting_desc(); ?>
	
	<?php if ( wpmobi_the_tab_setting_has_tooltip() ) { ?>
	<a href="#" class="wpmobi-tooltip" title="<?php wpmobi_the_tab_setting_tooltip(); ?>">&nbsp;</a>
	<?php } ?>
</label>			
<input type="hidden" name="<?php wpmobi_the_tab_setting_name(); ?>-hidden" />