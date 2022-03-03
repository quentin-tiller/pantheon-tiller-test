<?php
	/* Template Name: Tourial */
	get_header();
?>



<section class="inner-banner demorequest-banner tourial-banner ">
	<div class="inner-banner-wrap">
		<div class="container">
			<div class="row">
				<div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
					<div class="inner-banner-cont-wrap">
						<div class="inner-banner-cont">
							<span><?=get_field('banner')['heading']?></span>
							<?=get_field('banner')['subheading']?>
						</div>
					</div>
				</div>
				<?php $video = get_field('banner')['video']; if($video){ ?>
					<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
						<?=$video?>
					</div>
				<?php }else{ ?>
					<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
						<img src="<?=get_field('banner')['image']?>"/>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>



<?php $field = get_field('tourial_url'); if($field){ ?>
	<section class="tourial-section">
		<div class="tourial-wrapper">
			<iframe src="<?=$field?>" loading="lazy"></iframe>
		</div>
	</section>
<?php } ?>



<?php $group = get_field('bottom_cta'); if($group){ ?>
	<section class="footer-contact-sec bgsecimg" style="background-image: url(/wp-content/uploads/2020/05/footer-contact-bg.jpg); background-position: center center;">
		<div class="footer-contact-sharp"></div>
		<div class="container">
			<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
					<div class="tuorial-cta-cont">
						<?=$group['content_1']?>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
					<div class="tuorial-cta-cont">
						<?=$group['content_2']?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } ?>



<?php get_footer(); ?>