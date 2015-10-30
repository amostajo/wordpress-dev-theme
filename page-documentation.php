<?php
/**
 * Template Name: Documentation Page
 * Description: Page template for documentation
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

	<section id="documentation" class="page-fix">

		<div class="container">

			<div class="row">
			
				<div class="col-sm-3">
			
					<?php if ( has_nav_menu( Configuration::MENU_DOCUMENTATION ) ) { ?>
						
							<?php theme()->nav( Configuration::MENU_DOCUMENTATION ) ?>

					<?php } ?>
					
				</div>

				<div class="col-sm-9">

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