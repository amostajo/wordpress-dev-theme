<?php
/**
 * Main index template.
 *
 * @author Alejandor Mostajo
 * @license MIT
 * @package Amostajo\DevTemplates
 * @version 1.0.0
 */
?>

<?php get_header() ?>

	<header>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="intro-text">
						<img class="img-responsive" src="<?php echo get_template_directory_uri() ?>/img/logo.png" alt="">
						<h1 class="name">Wordpress Development Templates</h1>
						<hr class="star-light">
						<span class="skills">A powerful framework for custom themes and plugins</span>
					</div>
				</div>
			</div>
		</div>
	</header>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<?php the_content() ?>

		<?php endwhile; ?>

	<?php endif; ?>

<?php get_footer() ?>