<?php
/**
 * Footer.
 *
 * @author Alejandor Mostajo
 * @license MIT
 * @package Amostajo\DevTemplates
 * @version 1.0.0
 */

use DevTemplates\Main as Configuration;
?>
		<footer class="text-center">
			<div class="footer-above">
				<div class="container">
					<div class="row">
						<div class="footer-col col-md-6">
							<h3>View on Github</h3>
							<ul class="list-inline">
								<li>
									<a href="https://github.com/amostajo/wordpress-dev-theme" class="btn-social btn-outline">
										<i class="fa fa-fw fa-github"></i>
									</a>
								</li>
							</ul>
						</div>
						<?php if ( has_nav_menu( Configuration::MENU_FOOTER ) ) { ?>
							<div class="footer-col col-md-6">
								<h3>Links</h3>
								<?php theme()->nav( Configuration::MENU_FOOTER ) ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="footer-below">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<span><?php echo date( 'Y' ) ?> </span>
							<span>Code licensed under <a href="http://opensource.org/licenses/mit-license.html">MIT License</a>. </span>
							<span>Documentation licensed under <a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>.</span>
							<div>Template by <a href="http://startbootstrap.com/template-overviews/freelancer/">Start Bootstrap </a></div>
						</div>
					</div>
				</div>
			</div>
		</footer>

		<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
		<div class="scroll-top page-scroll visible-xs visible-sm">
			<a class="btn btn-primary" href="#page-top">
				<i class="fa fa-chevron-up"></i>
			</a>
		</div>

		<?php wp_footer() ?>

	</body>

</html>