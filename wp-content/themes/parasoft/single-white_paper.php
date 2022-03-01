<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package    WordPress
 * @subpackage Parasoft
 * @since      parasoft 1.0
 */

get_header();
?>

<section class="white-paper-single">
	<div class="white-paper-cont">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="content">
						<span>White paper</span>
						<?php
						while ( have_posts() ) : the_post();
							?>
							<h2><?php the_title(); ?></h2>
							<?php the_content(); ?>
						<?php
						endwhile;
						wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="white-paper-form-sec">
		<div class="container">
			<div class="row">
				<div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
					<div class="white-paper-img">
						<img
							src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/white-paper-form-bg.png"
							alt="">
					</div>
				</div>
				<div class="col-xl-7 col-lg-7 col-md-6 col-sm-12">
					<div class="white-paper-form">
						<script id="hsforms-v2-js" charset="utf-8" type="text/javascript" data-src="//js.hsforms.net/forms/v2.js" defer></script>
						<script type="text/javascript">
							<!--//--><![CDATA[// ><!--
							function load_hubspot_form() {
								hbspt.forms.create({
									portalId: '69806',
									cssClass: 'contact-form',
									submitButtonClass: 'btn btn-blue',
									formId: '62276041-998a-4cd9-beb6-1b88307c5cfe',
									redirectUrl: 'https://alm.parasoft.com/hubfs/Whitepaper%20The%20Business%20Value%20of%20Secure%20Software.pdf',
								});
							}
							//--><!]]>
						</script>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_template_part( 'template-parts/content', 'singleflexible' ); ?>
<?php get_footer(); ?>
