<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package    WordPress
 * @subpackage Parasoft
 * @since      parasoft 1.0
 */

$address_heading       = get_field( 'address_heading', 'options' );
$location              = get_field( 'location', 'options' );
$quick_links_heading   = get_field( 'quick_links_heading', 'options' );
$global_office_heading = get_field( 'global_office_heading', 'options' );
$global_office_list    = get_field( 'global_office_list', 'options' );
$copyright_content     = get_field( 'copyright_content', 'options' );

$privacy      = get_field( 'privacy', 'options' );
$terms_of_use = get_field( 'terms_of_use', 'options' );
$social_media = get_field( 'social_media', 'options' );
?>
<footer>
	<div class="footer-main">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-12">
					<div class="footer-logo">
						<?php $logo = get_field( 'logo', 'option' );
						?>
						<?php if ( $logo ) { ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Parasoft Footer Logo">
								<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
							</a>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="row justify-content-between">
				<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
					<div class="footer-address">
						<h6><?php echo $address_heading; ?></h6>
						<address>
							<?php echo $location; ?>
						</address>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
					<div class="footer-menu">
						<h6><?php echo $quick_links_heading; ?></h6>
						<ul>
							<?php $defaults = array(
								'theme_location'  => '',
								'menu'            => 'Quick Links',
								'container'       => '',
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => 'menu',
								'menu_id'         => '',
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu',
								'before'          => '',
								'after'           => '',
								'link_before'     => '<i></i> &nbsp;',
								'link_after'      => '',
								'items_wrap'      => '%3$s',
								'depth'           => 0,
								'walker'          => '',
							);
							wp_nav_menu( $defaults ); ?>
						</ul>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
					<div class="footer-address">
						<h6><?php echo $global_office_heading; ?></h6>
						<div class="footer-menu global-office">
							<?php if ( have_rows( 'global_office_list', 'options' ) ): ?>
								<ul>
									<?php
									while ( have_rows( 'global_office_list', 'options' ) ): the_row();
										// vars
										$global_office_name = get_sub_field( 'global_office_name' );
										?>
										<li>
											<?php if ( $global_office_name ) { ?>
												<a class="button" href="<?php echo $global_office_name['url']; ?>" target="<?php echo $global_office_name['target']; ?>">
													<?php echo $global_office_name['title']; ?>
												</a>
											<?php } ?>
										</li>
										<?php
									endwhile;
									?>
								</ul>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row justify-content-between">
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 copyright-order">
					<div class="copyright">
						<p>&copy; <?php echo date( 'Y' ); ?> <?php echo $copyright_content; ?></p>
						<ul>
							<li>
								<a href="<?php echo $privacy['url']; ?>"
								   title="Privacy Policy"
								   target="<?php echo $privacy['target']; ?>"><?php echo $privacy['title']; ?></a>
							</li>
							<li>
								<a href="<?php echo $terms_of_use['url']; ?>"
								   title="Terms 0f Use"
								   target="<?php echo $terms_of_use['target']; ?>"><?php echo $terms_of_use['title']; ?></a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 socialicon-order">
					<div class="social-icon-wrap">
						<ul>
							<?php if ( $social_media['facebook'] ) { ?>
								<li>
									<a href="<?php echo $social_media['facebook']; ?>" title="facebook" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
								</li>
							<?php } ?>
							<?php if ( $social_media['linkedin'] ) { ?>
								<li>
									<a href="<?php echo $social_media['linkedin']; ?>" title="" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
								</li>
							<?php } ?>
							<?php if ( $social_media['twitter'] ) { ?>
								<li>
									<a href="<?php echo $social_media['twitter']; ?>" title="" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<?php /*
$selectedPages = get_field( 'request_a_demo_button', 'options' );

//Get the current page's ID
$myID = get_the_ID();
//Check if the current page's ID exists inside the selected fields array.
if ( in_array( $myID, $selectedPages ) ) {
	?>
<?php } else { ?>
	<div class="contact-fixed">
		<div class="contact-wrap">
			<a href="<?php echo esc_url( home_url( '/request-a-demo/' ) ); ?>" title="Try Parasoft">Try Parasoft</a>
		</div>
	</div>
<?php } */ ?>

<?php wp_footer(); ?>

<!--SEOScout Script-->
<script>var abr_id = 1917;</script>
<script async src="https://cdn.abrankings.com/js/client.js"></script>
<!--end SEOScout Script-->

<!-- DRIFT - load after waiting 5000 milliseconds, 5 seconds -->
<script>setTimeout(function(){ LoadDriftWidget(); }, 5000);</script>

</body>
</html>