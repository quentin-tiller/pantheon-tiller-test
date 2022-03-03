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

<section class="blog-single-sec alt-webinar" style="padding-bottom: 0;">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="blog-single-wrap">
					<div class="blog-cont">
						<?php
						global $post;
						while ( have_posts() ) : the_post(); ?>
							<div class="blog-cont-heading">
								<span>WEBINAR</span>
								<h1><?php the_title(); ?></h1>
							</div>
							<div class="blog-cont-wrap" style="max-width: 720px; margin-top: 50px;">
								<?php the_content(); ?>
							</div>
						<?php
						endwhile;
						wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="resources-sec alt-v2" style="padding-top: 0;">
	<div class="resources-wrap">
		<div class="container">
			<div class="heading text-center">
				<h2>More Webinars</h2>
			</div>
			<div class="row">
				<?php $rows=get_field('related_webinars'); foreach($rows as $row){ ?>
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 resource-list">
					<div class="resources-list">
						<?php $post=$row['webinar']; setup_postdata($post); ?>
						<a href="<?=get_the_permalink()?>">
							<div class="resources-top">
								<div class="resources-image" style="background-image: url(<?=get_the_post_thumbnail_url()?>);"></div>
								<div class="content">
									
									<div class="resources-info">
										<span class="resource_type">Webinar</span>
										
										<?php if(get_field('watch_time')){ ?>
											<span class="rt">Watch Time: <?=get_field('watch_time')?> minutes</span>
										<?php } else { ?>
											<span class="rt"><?=get_field('alternative_text')?></span>
										<?php } ?>
									</div>
									
									<h3><?=get_the_title()?></h3>

								</div>
							</div>
						</a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
