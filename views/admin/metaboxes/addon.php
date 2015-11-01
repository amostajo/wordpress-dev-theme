<div class="addon-extra">

	<table class="form-table">

		<tr>
			<th>
				<label for="url"><?php _e( 'Addon URL', 'DevTemplates' ) ?></label>
			</th>
			<td>
				<input type="text"
					id="url"
					name="url"
					value="<?php echo $addon->url ?>"
					placeholder="i.e. https://github.com/amostajo/wordpress-dev-theme"
				/>
			</td>
		</tr>

		<tr>
			<th>
				<label for="download_url"><?php _e( 'Download URL', 'DevTemplates' ) ?></label>
			</th>
			<td>
				<input type="text"
					id="download_url"
					name="download_url"
					value="<?php echo $addon->download_url ?>"
					placeholder="i.e. https://domain.com/wordpress-dev-theme.zip"
				/>
			</td>
		</tr>

		<tr>
			<th>
				<label for="version"><?php _e( 'Package version', 'DevTemplates' ) ?></label>
			</th>
			<td>
				<input type="text"
					id="version"
					name="version"
					value="<?php echo $addon->version ?>"
					placeholder="i.e. 1.0.0"
				/>
			</td>
		</tr>

		<tr>
			<th>
				<label for="supported_version"><?php _e( 'WDT version', 'DevTemplates' ) ?></label>
			</th>
			<td>
				<input type="text"
					id="supported_version"
					name="supported_version"
					value="<?php echo $addon->supported_version ?>"
					placeholder="i.e. 1.0.0"
				/>
			</td>
		</tr>

		<tr>
			<th>
				<label for="github_username"><?php _e( 'GitHub user', 'DevTemplates' ) ?></label>
			</th>
			<td>
				<input type="text"
					id="github_username"
					name="github_username"
					value="<?php echo $addon->github_username ?>"
					placeholder="i.e. amostajo"
				/>
			</td>
		</tr>

		<tr>
			<th>
				<label for="github_repo"><?php _e( 'GitHub repo', 'DevTemplates' ) ?></label>
			</th>
			<td>
				<input type="text"
					id="github_repo"
					name="github_repo"
					value="<?php echo $addon->github_repo ?>"
					placeholder="i.e. wordpress-theme"
				/>
			</td>
		</tr>

	</table>

</div>