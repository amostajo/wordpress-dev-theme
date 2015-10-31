<?php
/**
 * Template Name: Sections Page
 * Description: Page template for sections
 *
 * @author Alejandor Mostajo
 * @license MIT
 * @package Amostajo\DevTemplates
 * @version 1.0.0
 */

use DevTemplates\Main as Configuration;
?>

<?php get_header() ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php if ( get_post_meta( get_the_ID(), 'section_head', true ) ) : ?>

		<?php theme()->section( get_the_ID() ) ?>

	<?php endif; ?>

	<section id="page" class="page-fix">

		<div class="container">

			<div class="row">

				<div class="col-md-12">

					<h1><?php the_title() ?></h1>

					<div class="wrapper">
				
						<?php the_content() ?>

					</div>
				
				</div>
			
			</div>

		</div>

	</section>

<?php endwhile; ?>

<?php endif; ?>

<?php get_footer() ?>