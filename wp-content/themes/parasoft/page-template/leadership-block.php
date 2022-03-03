<?php
/**
 * Template Name: Leadership Block
 *
 * @package WordPress
 *
 */
get_header();

?>
<?php get_template_part( 'template-parts/content', 'innerheader' ); ?>

<section class="leadership-block">
	<div class="container">
		<div class="row">
			<?php
			$count = 1;
			while ( have_rows( 'leaders' ) ) : the_row();
				$picture  = get_sub_field( 'picture' );
				$name     = get_sub_field( 'name' );
				$title    = get_sub_field( 'title' );
				$bio_info = get_sub_field( 'bio_info' );
				$linkedin = get_sub_field( 'linkedin' );
				$twitter  = get_sub_field( 'twitter' );
				?>
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 leadership-list">
					<div class="leadership-wrap">
						<div class="leadership-bg" style="background-image:url('<?php echo $picture['url']; ?>');">
							<div class="leadership-overlay">
								<a class="leadership-modal" href="#leadership-modal-<?php echo $count; ?>"
								   title="Read Bio">
									<span>Read Bio <i>»</i></span>
								</a>
							</div>
							<div id="leadership-modal-<?php echo $count; ?>"
							     class="white-popup-block leadership-modal-lead mfp-hide">
								<button title="Close (Esc)" type="button" class="mfp-close"
								        style="background-image:url('<?php echo get_template_directory_uri(); ?>/dist/assets/images/popup-close-icon.svg');"></button>
								<div class="leadership-modal-wrap">
									<div class="leadership-modal-bg"
									     style="background-image:url('<?php echo $picture['url']; ?>');"></div>
									<div class="leadership-modal-heading">
										<h3><?php echo $name; ?></h3>
										<p><?php echo $title; ?></p>
										<ul>
											<?php if ( $linkedin ) { ?>
												<li>
													<a href="<?php echo $linkedin; ?>" target="_blank" title="linkedin"><i
															class="fa fa-linkedin" aria-hidden="true"></i></a>
												</li>
											<?php } ?>
											<?php if ( $twitter ) { ?>
												<li>
													<a href="<?php echo $twitter; ?>" target="_blank" title="twitter"><i
															class="fa fa-twitter" aria-hidden="true"></i></a>
												</li>
											<?php } ?>
										</ul>
									</div>
								</div>
								<div class="leadership-cont">
									<?php echo $bio_info; ?>
								</div>
							</div>
						</div>
						<div class="leadership-cont">
							<h3><?php echo $name; ?></h3>
							<p><?php echo $title; ?></p>
						</div>
					</div>
				</div>
				<?php wp_reset_postdata();
				$count++;
			endwhile;
			?>

		</div>
	</div>
</section>

<?php get_template_part( 'template-parts/content', 'flexible' ); ?>
<?php get_footer(); ?>
