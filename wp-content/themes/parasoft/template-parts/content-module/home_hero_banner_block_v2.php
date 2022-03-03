<?php
$post_id = is_home() ? get_option( 'page_for_posts' ) : get_the_ID();

$heading = get_sub_field( 'heading', $post_id );
$bgs = get_sub_field( 'background_images', $post_id );

?>
<section class="inner-banner alt-home alt-v2">

	<div class="carousel">
		<?php foreach($bgs as $bg){ ?>
			<div class="carousel-cell" style="background-image:url(<?php echo $bg['url']; ?>)">
			</div>
		<?php } ?>
	</div>

	<div class="inner-banner-wrap">
		<div class="container">
			<div class="row">
				<div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
					<div class="inner-banner-cont-wrap">
						<div class="inner-banner-cont">
							<?php echo $heading; ?>
							<?php if ( have_rows( 'buttons' ) ): ?>
								<div class="inner-banner-btn">
									<?php
									$count = 1;
									while ( have_rows( 'buttons' ) ): the_row();
										// vars
										$button              = get_sub_field( 'button' );
										$button_color_option = get_sub_field( 'button_color_option' );
										if ( $button_color_option == 'transparent' ) {
											$buttoncolor = 'transparent-btn alt-arrow';
										} else {
											$buttoncolor = 'red-btn';
										}
										?>
										<?php if ( $button ) { ?>
											<div class="btn-list">
												<a class="btn <?php echo $buttoncolor; ?>"
												   href="<?php echo $button['url']; ?>"
												   title="<?php echo $button['title']; ?>"><?php echo $button['title']; ?></a>
											</div>
										<?php } ?>


										<?php
										wp_reset_postdata();
										$count++;
									endwhile; ?>
								</div>
							<?php endif; ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
