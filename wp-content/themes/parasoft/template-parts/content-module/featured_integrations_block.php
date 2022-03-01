<?php
$sectionclass = $linkdata = array();

$background_type = $add_overlay = $overlay_color = $color_picker = $background_image = $image_position = $parallax = $background_image_url = $background_video = $bg_video_mp4 = $background_video_webm = $bg_video_webm = "";
$custom_id = $custom_css_class = $heading_color = $subhead_color = $font_color = $font_style_head = $font_style_subhead = $padding_top = $padding_top_val = $padding_bottom = $padding_bottom_val = $othercss =
$postion_css = $add_pattern = "";
$othercss = '';
$parallaxdiv = '';
$bg = '';
$sectionclass[] = 'featured-integrations-block';

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
<section <?php echo ! empty( $custom_id ) ? ' id="' . $custom_id . '" ' : ''; ?>
	class="<?php echo $sec_class; ?>" <?php echo $parallaxdiv; ?> style="<?php echo $bg . $othercss; ?>">

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

	<?php
	// echo $integrations = get_sub_field('integrations');
	$button = get_sub_field( 'button_link' );
	?>

	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="heading text-center">
					<?php echo ! empty( $heading ) ? '<h2' . $font_style_head . '>' . $heading . '</h2>' : ''; ?>
					<?php echo ! empty( $content ) ? '<p' . $font_style_subhead . '>' . $content . '</p>' : ''; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<?php

			$post_object = get_sub_field( 'integrations' );

			if ( $post_object ):
				$count = 1;
				// override $post
				foreach ( $post_object as $post ):
					setup_postdata( $post );
					$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
					$post_type = get_post_type( $post->ID );
					$page_link = get_field( 'tool_integrations_link' );
					?>
					<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
						<div class="featured-integrations-logo">
							<a class="popup-modal" href="#integrations-modal-<?php echo $count; ?>" title="">
								<img src="<?php echo $image_url[0]; ?>" alt="">
							</a>
							<div id="integrations-modal-<?php echo $count; ?>" class="white-popup-block mfp-hide">
								<button title="Close (Esc)" type="button" class="mfp-close"
								        style="background-image:url('<?php echo get_template_directory_uri(); ?>/dist/assets/images/popup-close-icon.svg');"></button>
								<h3><?php echo get_the_title(); ?></h3>
								<?php the_content(); ?>
								<?php if ( $page_link ) { ?>
									<a href="<?php echo $page_link['url']; ?>"
									   target="<?php echo $page_link['target']; ?>"><?php echo $page_link['title']; ?></a>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php wp_reset_postdata();
					$count++;
				endforeach;
				?>
			<?php endif; ?>
		</div>

		<?php if ( $button ) { ?>
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="text-center">
						<a class="btn gray-btn" href="<?php echo $button['url']; ?>"
						   target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</section>
