<?php
/**
* Template Name: Thank You
*
* @package WordPress
* 
*/
get_header();
?>

<section class="thank-you-page">
	<div class="container">
		<div class="content">
			<?=the_content()?>

			<?php if(get_field('button')){ ?>
				<a class="btn red-btn" href="<?=get_field('button')['url']?>"><?=get_field('button')['title']?></a>
			<?php } ?>
			
		</div>
	</div>
</section>

<section class="resources-sec alt-v2 alt-thank">
	<div class="resources-wrap">
		<div class="container">
			<h2>Related Posts &plus; Resources</h2>
			<div class="row">
				<?php $rows=get_field('resources'); foreach($rows as $row){ ?>
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 resource-list">
					<div class="resources-list">
						<?php $alt_link=$row['alternate_link'];
						$post=$row['resource'];
						setup_postdata($post); ?>

						<?php if($alt_link){ ?>
						<a href="<?=$alt_link;?>">
						<?php } else { ?>
						<a href="<?=get_the_permalink()?>">
						<?php } ?>

							<div class="resources-top">
								<div class="resources-image" style="background-image: url(<?=get_the_post_thumbnail_url()?>);"></div>
								<div class="content">
									<div class="resources-info">
										<?php if(get_post_type()=='post'){ ?>
											<span class="resource_type">Blog</span>
										<?php } else if(get_post_type()=='case_studies') { ?>
											<span class="resource_type">Case Study</span>
										<?php } else { ?>
											<span class="resource_type"><?=str_replace('_', ' ', get_post_type())?></span>
										<?php } ?>
										
										<?php if(get_post_type()=='post'){ ?>
											<span class="rt">Reading time: <?=do_shortcode('[rt_reading_time]')?> minutes</span>
										<?php } else if(get_post_type()=='case_studies') { ?>
											<span class="rt">Reading time: <?=get_field('reading_time')?> minutes</span>
										<?php } else if(get_post_type()=='webinar') { ?>
											<span class="rt">Watch time: <?=get_field('watch_time')?> minutes</span>
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