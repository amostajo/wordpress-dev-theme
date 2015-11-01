<?php
/**
 * Template for posts type "addon".
 *
 * @author Alejandor Mostajo
 * @license MIT
 * @package Amostajo\DevTemplates
 * @version 1.0.0
 */
?>

<?php get_header() ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<?php $theme->addon( $post ) ?>

		<?php endwhile; ?>

	<?php endif; ?>

<?php get_footer() ?>