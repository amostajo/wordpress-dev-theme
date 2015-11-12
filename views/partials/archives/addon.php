<div id="addon-<?php echo $addon->id ?>" class="col-md-3 col-sm-4">

	<div class="addon">

		<div class="header">

			<a href="<?php echo $addon->permalink ?>">

				<?php if ( $addon->search_image_url ) : ?>
					<img src="<?php echo $addon->search_image_url ?>"
						alt="<?php echo $addon->name ?>"
						class="img-responsive"
					/>
				<?php else : ?>

					<div class="fake-img"></div>

				<?php endif ?>

				<span class="name">
					<?php echo $addon->name ?>
				</span>
			</a>

		</div>

		<div class="description">
				<?php echo $addon->description ?>
		</div>

	</div>

</div>