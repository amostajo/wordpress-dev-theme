<?php
/**
 * Template for add-ons archive.
 *
 * @author Alejandor Mostajo
 * @license MIT
 * @package Amostajo\DevTemplates
 * @version 1.0.0
 */
?>

<?php get_header() ?>

	<section id="addons" class="page-fix">

		<div class="container">

			<div class="row">

				<div class="col-md-12">
			
					<div class="pull-left">

						<h1><?php _e( 'Add-ons', 'DevTemplates' ) ?></h1>
						
					</div>
				
					<div class="pull-right">

						<form class="form-inline"
							method="GET"
							action="<?php echo get_site_url() ?>/"
						>
							<input type="hidden" name="post_type" value="addon"/>

							<div class="form-group">
								<label class="sr-only" for="keyword"><?php _e( 'Search', 'DevTemplates' ) ?></label>
								<input type="text"
									class="form-control"
									id="keyword"
									name="s"
									placeholder="<?php _e( 'Search...', 'DevTemplates' ) ?>"
								/>
							</div>
						</form>
						
					</div>
				
				</div>

			</div>

			<div class="row">

				<?php theme()->addons() ?>

			</div>

		</div>

	</section>

<?php get_footer() ?>