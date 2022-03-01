<?php
$header_banner_image = get_field('header_banner_image');
$heading = get_field('hero_heading');
$content = get_field('hero_content');
?>
<section class="inner-banner" style="background-image:url('<?php echo $header_banner_image['url'];?>');">
	<div class="inner-banner-wrap">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="inner-banner-cont-wrap">
						<div class="inner-banner-cont">
							<span><?php echo get_the_title(); ?></span>
							<h1><?php echo $heading; ?></h1>
							<?php echo!empty($content) ? '<p>' . $content . '</p>' : ''; ?>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</section>