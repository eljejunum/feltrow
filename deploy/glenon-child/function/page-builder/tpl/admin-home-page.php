<?php $settings = siteorigin_panels_setting(); ?>

<div class="wrap" id="panels-home-page">
	<form action="<?php echo add_query_arg('page', 'so_panels_home_page') ?>" class="hide-if-no-js" method="post">
		<div id="icon-index" class="icon32"><br></div>
		<h2>
			<?php esc_html_e('Custom Home Page', 'glenon_wp') ?>

			<div id="panels-toggle-switch" class="<?php echo (!get_option('siteorigin_panels_home_page_enabled', $settings['home-page-default'])) ? 'state-off' : 'state-on'; ?>">
				<div class="on-text"><?php _e('ON', 'glenon_wp') ?></div>
				<div class="off-text"><?php _e('OFF', 'glenon_wp') ?></div>
				<img src="<?php echo plugin_dir_url(SITEORIGIN_PANELS_BASE_FILE) ?>css/images/handle.png" class="handle" />
			</div>
		</h2>

		<?php if(isset($_POST['_sopanels_home_nonce']) && wp_verify_nonce($_POST['_sopanels_home_nonce'], 'save')) : ?>
			<div id="message" class="updated">
				<p><?php printf(__('Home page updated. <a href="%s">View page</a>', 'glenon_wp'), get_home_url()) ?></p>
			</div>
		<?php endif; ?>

		<div id="post-body-wrapper">
			<div id="post-body" class="metabox-holder columns-2">
				<div id="post-body-content" style="position: relative">
					<a href="#" class="preview button" id="post-preview"><?php _e('Preview Changes', 'glenon_wp') ?></a>

					<?php wp_editor('', 'content') ?>
					<?php do_meta_boxes('appearance_page_so_panels_home_page', 'advanced', false) ?>

					<p><input type="submit" class="button button-primary" value="<?php esc_attr_e('Save Home Page', 'glenon_wp') ?>" /></p>
				</div>
			</div>
		</div>

		<input type="hidden" id="panels-home-enabled" name="siteorigin_panels_home_enabled" value="<?php echo esc_attr( get_option('siteorigin_panels_home_page_enabled', $settings['home-page-default']) ? 'true' : 'false' ); ?>" />
		<?php wp_nonce_field('save', '_sopanels_home_nonce') ?>
	</form>
	<noscript><p><?php _e('This interface requires Javascript', 'glenon_wp') ?></p></noscript>
</div> 