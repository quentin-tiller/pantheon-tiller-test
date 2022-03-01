<style>
	.map-parasoft-locations {
		height: 450px;
		background-color: #f4f4f4;
	}

	.hidden {
		display: none;
	}

	.view-offices-map .marker-links-filter > li.active .marker-links-filter-by-country {
		margin-top: 0.625rem;
		max-height: 100%;
		opacity: 1;
		-webkit-transition: all .5s .35s;
		-o-transition: all .5s .35s;
		transition: all .5s .35s;
	}

	.view-offices-map .marker-links-filter .marker-links-filter-by-country {
		max-height: 0;
		padding-left: 0;
		opacity: 0;
		-webkit-transition: all .35s;
		-o-transition: all .35s;
		transition: all .35s;
		overflow: hidden;
		will-change: transform;
	}
</style>
<?php
$sectionclass = $linkdata = array();

$background_type = $add_overlay = $overlay_color = $color_picker = $background_image = $image_position = $parallax = $background_image_url = $background_video = $bg_video_mp4 = $background_video_webm = $bg_video_webm = "";
$custom_id       = $custom_css_class = $heading_color = $subhead_color = $font_color = $font_style_head = $font_style_subhead = $padding_top = $padding_top_val = $padding_bottom = $padding_bottom_val = $othercss = $postion_css = $add_pattern = "";
$othercss        = '';
$parallaxdiv     = '';
$bg              = '';
$sectionclass[]  = 'contact-map-block global-offices-map-sec';

$heading = get_sub_field( 'heading' );
$content = get_sub_field( 'content' );
$content = ! empty( $content ) ? apply_filters( 'the_content', $content ) : '';
$content = get_sub_field( 'content' );

while ( have_rows( 'background_options' ) ) : the_row();
	$background_type = get_sub_field( 'background_type' );

	if ( $background_type != 'none' ):
		$add_overlay   = get_sub_field( 'add_overlay' );
		$overlay_color = current( get_sub_field( 'overlay_color' ) );

	endif;

	if ( $background_type == 'none' ):
		$bg = 'background:none;';

	elseif ( $background_type == 'color' ):
		$color_picker = current( get_sub_field( 'color' ) );
		if ( ! empty( $color_picker ) ):
			$bg = "background: $color_picker;";
		endif;
	elseif ( $background_type == 'image' ):
		$background_image = get_sub_field( 'background_image' );
		if ( ! empty( $background_image ) && isset( $background_image['sizes'] ) ):
			$image_position = current( get_sub_field( 'image_position' ) );
			$postion_css    = ' background-position: ' . $image_position;
			$parallax       = get_sub_field( 'parallax' );
			if ( $parallax == 1 ) {
				$parallaxdiv = 'data-parallax';
			}
			$background_image_url = $background_image['url'];
			$bg                   = 'background-image: url(' . $background_image_url . ');' . $postion_css . ';';

			$sectionclass[] = 'bgsecimg';
		endif;
	elseif ( $background_type == 'video' ):
		$sectionclass[] = 'videobg';

		$background_video = get_sub_field( 'background_video' );
		if ( isset( $background_video ) && ! empty( $background_video['url'] ) ):
			$bg_video_mp4 = $background_video['url'];
		endif;

		$background_video_webm = get_sub_field( 'background_video_webm' );
		if ( isset( $background_video_webm ) && ! empty( $background_video_webm['url'] ) ):
			$bg_video_webm = $background_video_webm['url'];
		else:
			$bg_video_webm = $bg_video_mp4;
		endif;
	endif;
endwhile;

while ( have_rows( 'other_options' ) ) : the_row();
	$custom_id        = get_sub_field( 'custom_id' );
	$custom_css_class = get_sub_field( 'custom_css_class' );

	$heading_color = current( get_sub_field( 'heading_color' ) );
	$subhead_color = current( get_sub_field( 'subhead_color' ) );

	$font_color = get_sub_field( 'font_color' );

	$padding_top    = get_sub_field( 'padding_top' );
	$padding_bottom = get_sub_field( 'padding_bottom' );

	$add_heading_accent = get_sub_field( 'add_heading_accent' );
	$accent_color       = get_sub_field( 'accent_color' );

	if ( ! empty( $custom_css_class ) ):
		$sectionclass[] = $custom_css_class;
	endif;

	if ( ! empty( $heading_color ) ):
		$font_style_head = ' style="color: ' . $heading_color . '"';
	endif;

	if ( ! empty( $subhead_color ) ):
		$font_style_subhead = ' style="color: ' . $subhead_color . '"';
	endif;

	if ( ! empty( $font_color ) ):
		$sectionclass[] = $font_color;
	endif;

	if ( $padding_top == 1 ):
		$padding_top_val = get_sub_field( 'padding_top_val' );
		$othercss        .= ' padding-top:' . $padding_top_val . 'px;';
	endif;

	if ( $padding_bottom == 1 ):
		$padding_bottom_val = get_sub_field( 'padding_bottom_val' );
		$othercss           .= ' padding-bottom:' . $padding_bottom_val . 'px;';
	endif;

endwhile;

if ( isset( $sectionclass ) && ! empty( $sectionclass ) ):
	$sec_class = implode( " ", $sectionclass );
endif;
?>
<section
	<?php echo ! empty( $custom_id ) ? ' id="' . $custom_id . '" ' : ''; ?>class="<?php echo $sec_class; ?>" <?php echo $parallaxdiv; ?>
	style="<?php echo $bg . $othercss; ?>">
	<?php if ( $add_overlay == 1 ): ?>
		<div class="bgoverlay" style="background: <?php echo $overlay_color; ?>"></div>
	<?php endif; ?>

	<?php if ( $background_type == 'video' && ! empty( $bg_video_mp4 ) ): ?>
		<div class="videobg_child">
			<video class="set-video" id="vid" playsinline="" loop="" muted="" autoplay="">
				<source src="<?php echo $bg_video_mp4; ?>" type="video/mp4">
				<source src="<?php echo $bg_video_webm; ?>" type="video/webm">
			</video>
		</div>
	<?php endif; ?>

	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="heading">
					<?php echo ! empty( $heading ) ? '<h2' . $font_style_head . '>' . $heading . '</h2>' : ''; ?>
					<?php echo $content; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
				<div class="block block-views block-views-blockpartners-block-3">
					<div class="content">
						<div class="views-element-container">
							<div
								class="view-offices-map view view-partners view-id-partners view-display-id-block_3 js-view-dom-id-bf804573c4fa2f1e834c9ac654b23929daac48f9e044c896939974fe50a1525f">
								<div class="view-header">
									<ul class="list-unstyled marker-links-filter">
										<li class=""><a href="#" data-map-category="all">See All</a></li>
									</ul>
									<div
										class="view-offices-map view view-partners-locations view-id-partners_locations view-display-id-block_1 js-view-dom-id-34efeecfbf535813d365efaee336dddb6b21623a913c5da722def0a998d54376">
										<div class="view-content row">
											<div class="col-12 hidden"></div>
										</div>
									</div>
									<div
										class="view-offices-map view view-partners-locations view-id-partners_locations view-display-id-block_5 js-view-dom-id-ed8a38cfad642a2d0816d844edd74a80371004aff3cf791c7a3d1b1ef915ccb0">
										<div class="view-content row">
											<div class="col-12 hidden"></div>
										</div>
									</div>
								</div>
								<div class="view-content row">
									<div class="col-12">
										<ul class="list-unstyled marker-links-filter marker-links-filter-categories">
											<li class="mb-3">
												<div class="marker-link-wrapper">
													<a href="#" class=""
													   data-marker-image="<?php echo get_template_directory_uri(); ?>/dist/assets/images/circle817.png?itok=VFGXoP2j"
													   data-map-category="266">
														<img src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/circle817.png" alt="Blue Circle">&nbsp;<span>Regional Service Providers</span></a>
													<ul class="list-unstyled marker-links-filter marker-links-filter-by-country marker-links-filter-sm marker-links-filter-two-column mb-0">
														<?php
														$args  = array(
															'post_type'      => array( 'business_partner' ),
															'orderby'        => 'title',
															'order'          => 'ASC',
															'posts_per_page' => -1,
															'tax_query'      => array(
																//'relation' => 'OR',
																array(
																	'taxonomy' => 'business_partner_category',
																	'field'    => 'id',
																	'terms'    => 13,
																),
															),
														);
														$query = new WP_Query( $args );
														while ( $query->have_posts() ):
															$query->the_post();
															$id = $query->post->ID;
															?>
															<li class="mb-2">
																<div class="marker-link-wrapper">
																	<a href="#" class=""
																	   data-map-filter="geocode"
																	   data-map-country="<?php echo $id; ?>"
																	   data-map-lat=""><span><?php echo get_the_title(); ?></span>
																	</a>
																	<div class="hidden marker-link-desc">
																		<?php the_content(); ?>

																		<div class="infowindow-link">
																			<a href="https://www.google.com/maps/search/?api=1&amp;query=<?=get_field('map_latitude')?>,<?=get_field('map_longitude')?>" target="_blank" rel="noopener noreferrer nofollow">Get Directions</a>
																		</div>
																	</div>
																</div>
															</li>
														<?php endwhile; ?>
														<?php wp_reset_postdata(); ?>
													</ul>
												</div>
											</li>
											<li class="mb-3">
												<div class="marker-link-wrapper">
													<a href="#" class=""
													   data-marker-image="<?php echo get_template_directory_uri(); ?>/dist/assets/images/path815.png"
													   data-map-category="271">
														<img src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/path815.png" alt="Pink Circle">&nbsp;<span>Regional Distributors</span>
													</a>
													<ul class="list-unstyled marker-links-filter marker-links-filter-by-country marker-links-filter-sm marker-links-filter-two-column mb-0">
														<?php
														$args  = array(
															'post_type'      => array( 'business_partner' ),
															'orderby'        => 'title',
															'order'          => 'ASC',
															'posts_per_page' => -1,
															'tax_query'      => array(
																//'relation' => 'OR',
																array(
																	'taxonomy' => 'business_partner_category',
																	'field'    => 'id',
																	'terms'    => 12,
																),
															),
														);
														$query = new WP_Query( $args );
														while ( $query->have_posts() ):
															$query->the_post();
															$id = $query->post->ID;
															?>
															<li class="mb-2">
																<div class="marker-link-wrapper">
																	<a href="#" class=""
																	   data-map-filter="geocode"
																	   data-map-country="<?php echo $id; ?>"
																	   data-map-lat=""><span><?php echo get_the_title(); ?></span>
																	</a>
																	<div class="hidden marker-link-desc">
																		<?php the_content(); ?>

																		<div class="infowindow-link">
																			<a href="https://www.google.com/maps/search/?api=1&amp;query=<?=get_field('map_latitude')?>,<?=get_field('map_longitude')?>" target="_blank" rel="noopener noreferrer nofollow">Get Directions</a>
																		</div>
																	</div>
																</div>
															</li>
														<?php endwhile; ?>
														<?php wp_reset_postdata(); ?>
													</ul>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<div class="view-footer">
									<div class="view-offices-map view view-partners view-id-partners view-display-id-block_4 js-view-dom-id-ba8a4cbae7ed9bb4ff124acf4f92c145e7ca56f8f25579986fad48d66334a755">
										<div class="view-content row">
											<div class="col-12 hidden">
												<ul class="list-unstyled marker-links-footer">
													<?php
													$args  = array(
														'post_type'      => [ 'business_partner' ],
														'orderby'        => 'date',
														'order'          => 'DESC',
														'post__not_in'   => [
															1557,
															1558,
															1559,
															1560,
															1562,
															1563,
															1564,
														],
														'posts_per_page' => -1,
													);
													$query = new WP_Query( $args );
													while ( $query->have_posts() ):
														$query->the_post();
														$id                              = $query->post->ID;
														$typesterms                      = wp_get_post_terms( $id, 'business_partner_category' );
														$map_latitude                    = get_field( 'map_latitude' );
														$map_longitude                   = get_field( 'map_longitude' );
														$info_window_link                = get_field( 'info_window_link' );
														$regional_distributors_icon      = get_field( 'regional_distributors_icon', 'option' );
														$regional_service_providers_icon = get_field( 'regional_service_providers_icon', 'option' );

														if ( $typesterms ) {
															$types_terms = array();
															foreach ( $typesterms as $term ) {
																$types_terms[] = $term->name;
															}
															$catename = implode( ', ', $types_terms );
														}

														if ( $catename == 'Regional Distributors' ) {
															$categoryid = '271';
															$iconimg    = get_template_directory_uri() . '/dist/assets/images/path815.png';
														} else {
															$categoryid = '266';
															$iconimg    = get_template_directory_uri() . '/dist/assets/images/circle817.png';
														}
														?>

														<li class="mb-3">
															<div class="marker-link-wrapper">
																<a href="#" class=""
																   data-map-category="<?php echo $categoryid; ?>"
																   data-map-country="<?php echo $id; ?>"
																   data-map-lat="<?php echo $map_latitude; ?>"
																   data-map-long="<?php echo $map_longitude; ?>"
																   data-marker-image="<?php echo $iconimg; ?>">
																	<img src="<?php echo $iconimg; ?>" alt="">
																	<span></span>
																</a>
																<div class="hidden marker-link-desc">
																	<?php the_content(); ?>

																	<div class="infowindow-link">
																		<a href="<?php echo $info_window_link; ?>" target="_blank" rel="noopener noreferrer nofollow">Get Directions</a>
																	</div>
																</div>
															</div>
														</li>
													<?php endwhile; ?>
													<?php wp_reset_postdata(); ?>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
				<div class="map-parasoft-locations"></div>
			</div>
		</div>
	</div>
	<script src="<?php echo get_template_directory_uri(); ?>/dist/assets/js/map-locations.js" defer></script>
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyA6PYvfeVLj0xsKMyRlJCdyxNKDzlnJ29A&amp;callback=initMap" defer></script>
</section>
