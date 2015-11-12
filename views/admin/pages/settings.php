<div class="wrap">

	<h2><?php _e( 'Theme Settings', 'DevTemplates' ) ?></h2>

	<form method="post" action="options.php">
		<?php settings_fields( 'dev-templates' ) ?>
		<?php do_settings_sections( 'dev-templates' ) ?>

		<table class="form-table">

			<tr valign="top">
				<th scope="row"><?php _e( 'Downloads page', 'DevTemplates' ) ?></th>
				<td>
					<?php wp_dropdown_pages( [
						'name' 		=> 'devt_page_downloads',
						'selected'	=> get_option( 'devt_page_downloads', 0 ) 
					] ) ?>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row"><?php _e( 'Add-ons page', 'DevTemplates' ) ?></th>
				<td>
					<?php wp_dropdown_pages( [
						'name' 		=> 'devt_page_addons',
						'selected'	=> get_option( 'devt_page_addons', 0 ) 
					] ) ?>
				</td>
			</tr>

		</table>

		<?php submit_button() ?>

	</form>

</div>