<input type="text" autocomplete="off" class="text" id="<?php wpmobi_the_tab_setting_name(); ?>" name="<?php wpmobi_the_tab_setting_name(); ?>" value="<?php wpmobi_the_tab_setting_value(); ?>" />
<label class="text" for="<?php wpmobi_the_tab_setting_name(); ?>">
	<?php wpmobi_the_tab_setting_desc(); ?>
</label>			
<?php if ( wpmobi_the_tab_setting_has_tooltip() ) { ?>
<a href="#" class="wpmobi-tooltip" title="<?php wpmobi_the_tab_setting_tooltip(); ?>">&nbsp;</a> 
<?php } ?>