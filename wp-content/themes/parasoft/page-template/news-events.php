<?php
/**
 * Template Name: News & Events
 *
 * @package WordPress
 *
 */
get_header();

?>
<?php get_template_part( 'template-parts/content', 'innerheader' ); ?>

<section class="news-events-tab">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<ul class="nav nav-tabs md-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active show" id="news-event-1-ex" data-id="latest-news" data-toggle="tab" href="#news-event-1" role="tab" aria-controls="news-event-1" aria-selected="true">Latest News</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="news-event-2-ex" data-id="press-mentions" data-toggle="tab" href="#news-event-2" role="tab" aria-controls="news-event-2" aria-selected="false">Press Mentions</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="news-event-3-ex" data-id="webinars" data-toggle="tab" href="#news-event-3" role="tab" aria-controls="news-event-3" aria-selected="false">Webinars</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="news-event-4-ex" data-id="events" data-toggle="tab" href="#news-event-4" role="tab" aria-controls="news-event-4" aria-selected="false">Events</a>
					</li>
				</ul>
				<div class="tab-content pt-5" id="myTabContentEx">
					<div class="tab-pane fade active show" id="news-event-1" role="tabpanel" aria-labelledby="news-event-1-ex">
						<?php echo do_shortcode( '[searchandfilter id="1304" show="results"]' ); ?>
					</div>
					<div class="tab-pane fade" id="news-event-2" role="tabpanel" aria-labelledby="news-event-2-ex">
						<?php echo do_shortcode( '[searchandfilter id="1312" show="results"]' ); ?>
					</div>
					<div class="tab-pane fade" id="news-event-3" role="tabpanel" aria-labelledby="news-event-3-ex">
						<?php echo do_shortcode( '[searchandfilter id="1319" show="results"]' ); ?>
					</div>
					<div class="tab-pane fade" id="news-event-4" role="tabpanel" aria-labelledby="news-event-4-ex">

						<!--EVENTS-->
						<div class="resources-sec alt-v2 alt-news alt-press">

							<?php $heading = get_field( 'event_heading' );?>
							<?php echo ! empty( $heading ) ? '<h2>' . $heading . '</h2>' : ''; ?>

							<div class="resources-wrap">
								<div class="container">
									<div class="row">

										<?php while ( have_rows( 'events' ) ) : the_row();
											$logo        = get_sub_field( 'logo' );
											$event_title = get_sub_field( 'event_title' );
											$url         = get_sub_field( 'url' );
											$currendDate = date( "Y-m-d" );
											$dates = get_sub_field( 'dates' ); 

										?>
											<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 resource-list">
												<div class="resources-list">
													<a href="<?php echo $url; ?>" title="<?php echo $event_title; ?>" target="_blank" rel="noopener noreferrer">
														<div class="resources-top">
															<div class="resources-image" style="background-image:url('<?php echo $logo['url']; ?>');"></div>
															<div class="content">
																<div class="resources-info">
																	<span class="resource_type">Event</span>
																	<?php if ($dates){ foreach($dates as $date){
																	$startDate = $date['start_date'];
																	$endDate = $date['end_date'];
																	$startDateStr = date("M j, Y", strtotime( $startDate));
																	$endDateStr = date("M j, Y", strtotime( $endDate));
																	
																		if($startDate){?>
																		<span class="rt">
																			<?php if ( $startDate == $endDate ) { ?>
																				<?=$startDateStr?>
																			<?php }else { ?>
																				<?=$startDateStr?> - <?=$endDateStr?>
																			<?php } ?>
																		</span>
																		<?php }
								
																	} } ?>
																</div>
																<h3><?php echo $event_title; ?></h3>
															</div>
														</div>
													</a>
												</div>
											</div>
										<?php endwhile; wp_reset_postdata(); ?>

									</div>
								</div>
							</div>

						</div>
						<!--END EVENTS-->


						<!--SPEAKING ENGAGEMENTS-->
						<?php if ( have_rows( 'speaking_engagements_list' ) ): ?>
						<div class="resources-sec alt-v2 alt-news alt-speaker">

							<?php $speaking_heading = get_field( 'speaking_heading' ); ?>
							<?php echo ! empty( $speaking_heading ) ? '<h2>' . $speaking_heading . '</h2>' : ''; ?>

							<div class="resources-wrap">
								<div class="container">
									<div class="row">
										<?php while ( have_rows( 'speaking_engagements_list' ) ) : the_row();
											$presentation_title = get_sub_field( 'presentation_title' );
											$speaker_name       = get_sub_field( 'speaker_name' );
											$speaker_title      = get_sub_field( 'speaker_title' );
											$start_time         = get_sub_field( 'start_time' );
											$end_time           = get_sub_field( 'end_time' );
											$speaker_image      = get_sub_field( 'speaker_image' );
											$url                = get_sub_field( 'url' );
											$sDate              = get_sub_field( 'date' );
											$date               = $sDate ? date( "M j, Y", strtotime( $sDate ) ) : null;
											$time_zone          = get_sub_field( 'time_zone' );
											?>
											<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 resource-list">
												<div class="resources-list">
													<a href="<?php echo $url; ?>" title="<?php echo $presentation_title; ?>" target="_blank" rel="noopener noreferrer">
														<div class="resources-top">
															<?php if ( $speaker_image ) { ?>
																<div class="resources-image" style="background-image: url('<?php echo $speaker_image['url']; ?>');"></div>
															<?php } else { ?>
																<div class="resources-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/dist/assets/images/speaker-calnder.svg');"></div>
															<?php } ?>
															<div class="content">
																<h3><?php echo $presentation_title; ?></h3>
																<div class="event-date">
																	<span><?php echo $date; ?></span>
																	<?php if ( $start_time || $end_time ) { ?>
																		<span><?php echo $start_time; ?> - <?php echo $end_time; ?> <?php echo $time_zone; ?></span>
																	<?php } ?>
																</div>
																<div class="speaker-name">
																	<span><?php echo $speaker_name; ?>, <?php echo $speaker_title; ?></span>
																</div>
															</div>
														</div>
													</a>
												</div>
											</div>
										<?php endwhile; wp_reset_postdata();?>
									</div>
								</div>
							</div>
						</div>
						<?php endif; ?>
						<!--END SPEAKING ENGAGEMENTS-->
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_template_part( 'template-parts/content', 'flexible' ); ?>
<?php get_footer(); ?>
