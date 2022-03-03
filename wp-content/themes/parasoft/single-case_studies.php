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
<?php
$featured_img_url     = get_the_post_thumbnail_url( get_the_ID(), 'full' );
?>
<section class="blog-single-sec">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="blog-single-wrap">
					<div class="blog-cont">
						<?php
						global $post;
						while ( have_posts() ) : the_post(); ?>
							<div class="blog-cont-heading">
								<span>CASE STUDIES</span>
								<h1><?php the_title(); ?></h1>
							</div>
							<div class="blog-cont-meta">
								<p><?php echo do_shortcode('[rt_reading_time label="Reading Time:" postfix="minutes" postfix_singular="minute"]'); ?></p>
								<?php $button = get_field('link_to_pdf'); if($button){ ?>
									<p><a class="download-btn" href="<?=$button['url']?>" target="_blank"><span><?=$button['title'] ?: 'Download PDF' ?> »</span></a></p>
								<?php } ?>
							</div>
							<div class="blog-cont-wrap case-study-cont-wrap">
								<img src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>">

								<?php $stats = get_field('cs_stats'); if($stats){ ?>
									<div class="case-study-stats">
										<?php foreach($stats as $stat){ ?>
											<div class="case-study-stat">
												<?=$stat['stat']?>
											</div>
										<?php } ?>
									</div>
								<?php } ?>

								<?php $overview = get_field('cs_overview'); if($overview){ ?>
									<div class="case-study-overview">
										<?=$overview?>
									</div>
								<?php } ?>

								<?php the_content(); ?>
							</div>
						<?php
						endwhile;
						wp_reset_postdata();
						?>
					</div>

					<div class="next-prev">
						<div class="resources-link">
							<a href="/case-studies/" class="prev-link">View All Case Studies</a>
						</div>
						<div class="next-post-link">
							<?php if ( strlen( get_next_post()->post_title ) > 0 ) { ?>
								<?php next_post_link( '%link', 'Read Next Post "%title"' ) ?>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<?php $posts = get_field('related_case_studies'); if($posts){ ?>
	<section class="resources-sec alt-v2 alt-featured" style="background-color:#e0e4e5;">
		<div class="resources-wrap">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="heading text-center">
							<h2>Related Case Studies</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<?php foreach ( $posts as $post ): // variable must be called $post (IMPORTANT) ?>
	                    <?php setup_postdata( $post );
	                    $id = get_the_ID();
	                    $imageurl = get_the_post_thumbnail_url($id,'full');
						?>

					   	<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 resource-list">
							<div class="resources-list">
								<a href="<?=get_the_permalink()?>">
									<div class="resources-top">
										<div class="resources-image" style="background-image: url(<?=get_the_post_thumbnail_url()?>);"></div>
										<div class="content">

											<div class="resources-info">
												<span class="resource_type">Case Study</span>
												<span class="rt">Reading Time: <?=get_field('reading_time')?> minutes</span>
											</div>

											<h3><?=get_the_title()?></h3>

										</div>
									</div>
								</a>
							</div>
						</div>

					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
<?php wp_reset_postdata(); } ?>




<?php get_template_part( 'template-parts/content', 'singleflexible' ); ?>
<?php get_footer(); ?>
