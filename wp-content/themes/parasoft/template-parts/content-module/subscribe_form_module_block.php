<?php
$sectionclass = $linkdata = [];

$background_type = $add_overlay = $overlay_color = $color_picker = $background_image = $image_position = $parallax = $background_image_url = $background_video = $bg_video_mp4 = $background_video_webm = $bg_video_webm = '';
$custom_id       = $custom_css_class = $heading_color = $subhead_color = $font_color = $font_style_head = $font_style_subhead = $padding_top = $padding_top_val = $padding_bottom = $padding_bottom_val = $othercss = $postion_css = $add_pattern = '';
$othercss        = '';
$parallaxdiv     = '';
$bg              = '';
$sectionclass[]  = 'subscribe-form';
$post_id         = is_home() ? get_option( 'page_for_posts' ) : get_the_ID();

while ( have_rows( 'cta_subscribe_block', 'option' ) ) : the_row();
	$heading = get_sub_field( 'heading', $post_id );
	$content = get_sub_field( 'content', $post_id );
	$content = ! empty( $content ) ? apply_filters( 'the_content', $content ) : '';
	$content = get_sub_field( 'content', $post_id );
	$form    = get_sub_field( 'form_id', $post_id );

	while ( have_rows( 'background_options' ) ) : the_row();
		$background_type = get_sub_field( 'background_type', $post_id );

		if ( $background_type != 'none' ):
			$add_overlay   = get_sub_field( 'add_overlay', $post_id );
			$overlay_color = current( get_sub_field( 'overlay_color', $post_id ) );
		endif;

		if ( $background_type == 'none' ):
			$bg = 'background:none;';
		elseif ( $background_type == 'color' ):
			$color_picker = current( get_sub_field( 'color', $post_id ) );
			if ( ! empty( $color_picker ) ):
				$bg = "background: $color_picker;";
			endif;
		elseif ( $background_type == 'image' ):
			$background_image = get_sub_field( 'background_image', $post_id );
			if ( ! empty( $background_image ) && isset( $background_image['sizes'] ) ):
				$image_position = current( get_sub_field( 'image_position', $post_id ) );
				$postion_css    = ' background-position: ' . $image_position;
				$parallax       = get_sub_field( 'parallax', $post_id );
				if ( $parallax == 1 ) {
					$parallaxdiv = 'data-parallax';
				}
				$background_image_url = $background_image['url'];
				$bg                   = 'background-image: url(' . $background_image_url . ');' . $postion_css . ';';

				$sectionclass[] = 'bgsecimg';
			endif;
		elseif ( $background_type == 'video' ):
			$sectionclass[] = 'videobg';

			$background_video = get_sub_field( 'background_video', $post_id );
			if ( isset( $background_video ) && ! empty( $background_video['url'] ) ):
				$bg_video_mp4 = $background_video['url'];
			endif;

			$background_video_webm = get_sub_field( 'background_video_webm', $post_id );
			if ( isset( $background_video_webm ) && ! empty( $background_video_webm['url'] ) ):
				$bg_video_webm = $background_video_webm['url'];
			else:
				$bg_video_webm = $bg_video_mp4;
			endif;
		endif;
	endwhile;

	while ( have_rows( 'other_options' ) ) : the_row();
		$custom_id        = get_sub_field( 'custom_id', $post_id );
		$custom_css_class = get_sub_field( 'custom_css_class', $post_id );

		$heading_color = current( get_sub_field( 'heading_color', $post_id ) );
		$subhead_color = current( get_sub_field( 'subhead_color', $post_id ) );

		$font_color = get_sub_field( 'font_color', $post_id );

		$padding_top    = get_sub_field( 'padding_top', $post_id );
		$padding_bottom = get_sub_field( 'padding_bottom', $post_id );

		$add_heading_accent = get_sub_field( 'add_heading_accent', $post_id );
		$accent_color       = get_sub_field( 'accent_color', $post_id );

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
			$padding_top_val = get_sub_field( 'padding_top_val', $post_id );
			$othercss        .= ' padding-top:' . $padding_top_val . 'px;';
		endif;

		if ( $padding_bottom == 1 ):
			$padding_bottom_val = get_sub_field( 'padding_bottom_val', $post_id );
			$othercss           .= ' padding-bottom:' . $padding_bottom_val . 'px;';
		endif;
	endwhile;
endwhile;

if ( isset( $sectionclass ) && ! empty( $sectionclass ) ):
	$sec_class = implode( ' ', $sectionclass );
endif;

?>
<section <?php echo ! empty( $custom_id ) ? ' id="' . $custom_id . '" ' : ''; ?> class="<?php echo $sec_class; ?>" style="<?php echo $bg . $othercss; ?>">
	<?php if ( $background_type == 'video' && ! empty( $bg_video_mp4 ) ): ?>
		<div class="videobg_child">
			<video class="set-video" id="vid" playsinline="" loop="" muted="" autoplay="">
				<source src="<?php echo $bg_video_webm; ?>" type="video/webm">
				<source src="<?php echo $bg_video_mp4; ?>" type="video/mp4">
			</video>
		</div>
	<?php endif; ?>

	<div class="container">
		<div class="row justify-content-center text-center">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="form-block-wrap">
					<div class="form-block-cont">
						<?php echo ! empty( $heading ) ? '<h4>' . $heading . '</h4>' : ''; ?>
						<?php echo ! empty( $content ) ? '<p' . $font_style_subhead . '>' . $content . '</p>' : ''; ?>
					</div>
					<div class="form-wrap">
						<script id="hsforms-v2-js" charset="utf-8" type="text/javascript" data-src="//js.hsforms.net/forms/v2.js" defer></script>
						<script type="text/javascript">
							<!--//--><![CDATA[// ><!--
							function load_hubspot_form() {
								hbspt.forms.create({
									portalId: '69806',
									cssClass: 'contact-form',
									submitButtonClass: 'btn red-btn',
									formId: '<?php echo $form; ?>'
								});
							}
							//--><!]]>
						</script>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
