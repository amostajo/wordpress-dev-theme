<?php
/**
 * Navigation.
 *
 * @author Alejandor Mostajo
 * @license MIT
 * @package Amostajo\DevTemplates
 * @version 1.0.0
 */

use DevTemplates\Main as Configuration;
?>

<nav class="navbar navbar-default navbar-fixed-top <?php if ( is_front_page() ) { ?>cbp-af-header<?php } else { ?>cbp-af-header-shrink<?php }?>">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header page-scroll">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo get_site_url() ?>"><i class="fa fa-wordpress"></i> Dev Templates</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

			<?php if ( has_nav_menu( Configuration::MENU_HEADER ) ) { ?>

				<?php theme()->nav( Configuration::MENU_HEADER ) ?>

			<?php } ?>

		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>