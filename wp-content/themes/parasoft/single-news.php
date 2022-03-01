<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package    WordPress
 * @subpackage Parasoft
 * @since      parasoft 1.0
 */
get_header();
//get_template_part("template-parts/content-module/" . 'hero_banner_block_single');

$featured_img_url             = get_the_post_thumbnail_url( get_the_ID(), 'full' );
$single_header_banner_image   = get_field( 'single_header_banner_image' );
$single_choose_banner_pattern = get_field( 'single_choose_banner_pattern' );
$single_sub_heading           = get_field( 'single_sub_heading' );

if ( $single_header_banner_image ) {
	$single_banner_image = get_field( 'single_header_banner_image' );
} else {
	$single_banner_image = get_field( 'single_news_header_banner', 'options' );
}
?>
<section class="hero-banner-block small-banner" style="background-image:url('<?php echo $single_banner_image['url']; ?>');">

	<?php if ( $single_choose_banner_pattern == 1 ): ?>
		<div class="home-banner-sharp"
		     style="background-image:url('<?php echo get_template_directory_uri(); ?>/dist/assets/images/news-banner-shap-left.svg');"></div>
	<?php endif; ?>

	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="inner-banner-cont">
					<p class="banner-sub-title">News</p>
					<h1><?php echo get_the_title(); ?></h1>
					<?php if ( $single_sub_heading ) { ?>
						<span><?php echo $single_sub_heading; ?></span>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
$news_day        = get_the_date( 'd' );
$news_month      = get_the_date( 'm' );
$news_year       = get_the_date( 'Y' );
?>
<section class="news-single-sec">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="news-date-cat">
					<div class="single-date">
						<span><?php echo $news_month . '.' . $news_day . '.' . $news_year ?></span>
					</div>

				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="news-single-cont">
					<?php
					global $post;
					while ( have_posts() ) : the_post(); ?>
						<div class="news-cont">
							<?php the_content(); ?>
						</div>
					<?php endwhile;
					wp_reset_query(); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="single-pagination">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="nav-links">
					<div class="nav-previous">
						<?php previous_post_link( '%link', 'Previous' ) ?>
					</div>
					<div class="backto-page">
						<a href="<?php echo get_the_permalink(1293); ?>">Back to News</a>
					</div>
					<div class="nav-next">
						<?php next_post_link( '%link', 'Next' ) ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_template_part( 'template-parts/content', 'singleflexible' ); ?>
<?php get_footer(); ?>
