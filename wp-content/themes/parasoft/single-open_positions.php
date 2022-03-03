<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package    WordPress
 * @subpackage Parasoft
 * @since      parasoft 1.0
 */
get_header();

$open_positions_heading      = get_field( 'open_positions_heading', 'option' );
$open_positions_banner_image = get_field( 'open_positions_banner_image', 'option' );
$job_openings_link           = get_field( 'job_openings_link' );
$job_openings_text           = get_field( 'job_openings_text' );
?>
<section class="inner-banner" style="background-image:url('<?php echo $open_positions_banner_image['url']; ?>');">
	<div class="inner-banner-wrap">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="inner-banner-cont-wrap">
						<div class="inner-banner-cont">
							<span>CAREERS</span>
							<h1><?php echo $open_positions_heading; ?></h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="careers-single-sec alt-open-positions">
	<div class="container">
		<div class="row">
			<div class="col-xl-7 col-lg-7 col-md-6 col-sm-12">
				<div class="careers-single-cont">
					<?php
					global $post;
					$typesterms = wp_get_post_terms( get_the_ID(), 'location' );
					if ( $typesterms ) {
						$types_terms = array();
						foreach ( $typesterms as $term ) {
							$types_terms[] = $term->name;
						}
						$catename = implode( ', ', $types_terms );
					}
					while ( have_posts() ) : the_post(); ?>
						<h2><?php the_title(); ?> - <?php echo $catename; ?></h2>
						<?php the_content(); ?>
					<?php
					endwhile;
					wp_reset_postdata();
					?>

					<?php if ( $job_openings_link ) { ?>
						<div class="job-openings-btn">
							<a class="btn" href="<?php echo $job_openings_link; ?>" title="See all job openings"><?php echo $job_openings_text; ?> »</a>
						</div>
					<?php } else { ?>
						<div class="job-openings-btn">
							<a class="btn" href="<?php echo get_permalink( 1289 ); ?>" title="See all job openings">See all job openings »</a>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 careers-form-inherit">
				<h3 class="apply-heading">Apply Today</h3>
				<script id="hsforms-v2-js" charset="utf-8" type="text/javascript" data-src="//js.hsforms.net/forms/v2.js" defer></script>
				<script type="text/javascript">
					<!--//--><![CDATA[// ><!--
					function load_hubspot_form() {
						hbspt.forms.create({
							cssClass: 'contact-form',
							submitButtonClass: 'btn btn-blue',
							portalId: '69806',
							formId: '871ec069-c729-402f-8e1a-9b84fb43edc2',
							onFormReady: function ($form) {
								var jobTitle = jQuery('.node--type-job.node--view-mode-full .field--name-node-title > h2').text().trim();
								$form.find('input[name="job_opportunity"]').val(jobTitle).change();
							}
						});
					}
					//--><!]]>
				</script>
			</div>
		</div>
	</div>
</section>


<?php get_template_part( 'template-parts/content', 'singleflexible' ); ?>

<?php get_footer(); ?>
