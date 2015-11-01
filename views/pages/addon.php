<section id="addon-head" class="success">

	<div class="container">

		<div class="row">
		
			<div class="col-sm-8">
		
				<h1>
					<?php echo $addon->name ?> 
					<small class="hint"><?php _e( '(addon)', 'DevTemplates' ) ?></small>
				</h1>

				<?php if ( $addon->download_url ) : ?>
					<div class="download">
						<a class="btn btn-outline btn-download"
							href="<?php echo $addon->download_url ?>"
						>
							<i class="fa fa-download"></i> Download 
							<?php if ( $addon->version ) : ?>
								<span class="version">v<?php echo $addon->version ?></span>
							<?php endif ?>
						</a>
					</div>
				<?php endif ?>

				<?php if ( $addon->url ) : ?>
					<div class="extra-link url">
						<a href="<?php echo $addon->url ?>">
							<i class="fa fa-globe"></i> <?php _e( 'Visit website', 'DevTemplates' ) ?>
						</a>
					</div>
				<?php endif ?>

				<?php if ( $addon->github ) : ?>
					<div class="extra-link github">
						<a href="<?php echo $addon->github ?>">
							<i class="fa fa-github"></i> <?php _e( 'Visit on GitHub', 'DevTemplates' ) ?>
						</a>
					</div>
				<?php endif ?>
				
			</div>

			<div class="col-sm-4 image">
			
				<?php if ( $addon->thumb_image_url ) : ?>
					<a href="<?php echo $addon->image_url ?>"
						data-lightbox="addon-<?php echo $addon->ID ?>"
					>
						<img src="<?php echo $addon->thumb_image_url ?>"
							alt="<?php echo $addon->name ?>"
							class="img-responsive"
						>
						<p class="text-center enlarge-image">
							<small><i class="fa fa-search-plus"></i> Click to enlarge</small>
						</p>
					</a>
				<?php endif ?>
			
			</div>

		</div>
	
	</div>

</section>

<section id="addon">

	<div class="container">

		<div class="row">

			<div class="col-md-8">

				<div class="wrapper">
			
					<?php the_content() ?>

				</div>
			
			</div>

			<div class="col-md-4">
			
				<?php if ( $addon->github ) : ?>
					<div class="github-card"
						data-user="<?php echo $addon->github_username ?>"
						data-repo="<?php echo $addon->github_repo ?>"
						data-width="100%"
						data-theme="medium"
					></div>
				<?php endif ?>
			
			</div>
		
		</div>

	</div>

</section>