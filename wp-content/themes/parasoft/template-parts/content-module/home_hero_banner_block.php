<?php
$sectionclass    = $linkdata = [];
$background_type = $add_overlay = $overlay_color = $color_picker = $background_image = $image_position = $parallax = $background_image_url = $background_video = $bg_video_mp4 = $background_video_webm = $bg_video_webm = '';
$custom_id       = $custom_css_class = $heading_color = $subhead_color = $font_color = $font_style_head = $font_style_subhead = $padding_top = $padding_top_val = $padding_bottom = $padding_bottom_val = $othercss = $postion_css = $add_pattern = '';
$othercss        = '';
$bg              = '';
$sectionclass[]  = 'home-banner';

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
			$sectionclass[]       = 'bgsecimg';
		endif;
	elseif ( $background_type == 'video' ):
		$sectionclass[]        = 'videobg';
		$background_video      = get_sub_field( 'background_video' );
		$background_video_webm = get_sub_field( 'background_video_webm' );

		if ( isset( $background_video ) && ! empty( $background_video['url'] ) ):
			$bg_video_mp4 = $background_video['url'];
		endif;

		if ( isset( $background_video_webm ) && ! empty( $background_video_webm['url'] ) ):
			$bg_video_webm = $background_video_webm['url'];
		endif;

		$poster     = get_sub_field( 'video_poster' );
		$poster_url = ( $poster['url'] ) ? $poster['url'] : get_theme_file_uri( '/dist/assets/images/home-hero-poster.jpg' );
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
	$sec_class = implode( ' ', $sectionclass );
endif;

?>
<section <?php echo ! empty( $custom_id ) ? ' id="' . $custom_id . '" ' : ''; ?> class="<?php echo $sec_class; ?>" style="background:#152737;<?php echo $bg . $othercss; ?>">
	<?php if ( $add_overlay == 1 ): ?>
		<div class="bgoverlay" style="background: <?php echo $overlay_color; ?>"></div>
	<?php endif; ?>

	<?php if ( $background_type == 'video' && ( ! empty( $bg_video_mp4 ) || ! empty( $bg_video_webm ) ) ):
		?>
		<div class="videobg_child">
			<video class="set-video lazy-video" id="vid" playsinline webkit-playsinline loop muted autoplay
				<?php if ( ! empty( $bg_video_webm ) ): ?>
					data-src-webm="<?php echo $bg_video_webm; ?>"
				<?php endif; ?>
				<?php if ( ! empty( $bg_video_mp4 ) ): ?>
					data-src-mp4="<?php echo $bg_video_mp4; ?>"
				<?php endif; ?>>
				<?php if ( ! empty( $bg_video_webm ) ): ?>
					<source class="src-webm" src="" type="video/webm">
				<?php endif; ?>
				<?php if ( ! empty( $bg_video_mp4 ) ): ?>
					<source class="src-mp4" src="" type="video/mp4">
				<?php endif; ?>
			</video>
		</div>
	<?php endif; ?>

	<?php
	$tagline    = get_sub_field( 'tagline' );
	$embedded   = get_sub_field( 'embedded' );
	$enterprise = get_sub_field( 'enterprise' );
	?>
	<div class="home-banner-wrap">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="home-banner-cont-wrap">
						<div class="home-banner-cont">
							<?php echo ! empty( $heading ) ? '<h1' . $font_style_head . '>' . $heading . '</h1>' : ''; ?>
							<?php echo ! empty( $tagline ) ? '<p' . $font_style_subhead . '>' . $tagline . '</p>' : ''; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="two-col-box-sec">
	<div class="container">
		<div class="row">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				<div class="two-col-box-wrap">
					<a href="<?php echo esc_url( $embedded['page_link']['url'] ); ?>" title="">
						<span></span>
						<div class="two-col-box-main">
							<div class="two-col-box-cont" style="background-color:rgba(142,199,63,0.85);">
								<h2><?php echo esc_html( $embedded['page_link']['title'] ); ?></h2>
								<p><?php echo esc_attr( $embedded['description'] ); ?></p>
							</div>
							<div class="two-col-box-logo">
								<?php
								$posts = $embedded['logos'];

								if ( $posts ): ?>
									<ul>
										<?php foreach ( $posts as $post ): ?>
											<?php setup_postdata( $post );
											$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
											?>
											<li>
												<img src="<?php echo $image_url[0]; ?>">
											</li>
										<?php endforeach; ?>
									</ul>
									<?php wp_reset_postdata(); ?>
								<?php endif; ?>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				<div class="two-col-box-wrap">
					<a href="<?php echo esc_url( $enterprise['page_link']['url'] ); ?>" title="">
						<span></span>
						<div class="two-col-box-main">
							<div class="two-col-box-cont" style="background-color:rgba(14,147,210,0.85);">
								<h2><?php echo esc_html( $enterprise['page_link']['title'] ); ?></h2>
								<p><?php echo esc_attr( $enterprise['description'] ); ?></p>
							</div>
							<div class="two-col-box-logo">
								<?php
								$posts = $enterprise['logos'];

								if ( $posts ): ?>
									<ul>
										<?php foreach ( $posts as $post ): ?>
											<?php setup_postdata( $post );
											$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
											?>
											<li>
												<img src="<?php echo $image_url[0]; ?>">
											</li>
										<?php endforeach; ?>
									</ul>
									<?php wp_reset_postdata(); ?>
								<?php endif; ?>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
