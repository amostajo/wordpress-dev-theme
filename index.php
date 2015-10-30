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
						<span class="name">Start Bootstrap</span>
						<hr class="star-light">
						<span class="skills">Web Developer - Graphic Artist - User Experience Designer</span>
					</div>
				</div>
			</div>
		</div>
	</header>

	<section id="content">
        <div class="container">
            <div class="row">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

						<?php the_content() ?>

					<?php endwhile; ?>

				<?php endif; ?>

			</div>
		</div>

	</section>

<?php get_footer() ?>