<?php
$sectionclass = $linkdata = array();

$background_type = $add_overlay = $overlay_color = $color_picker = $background_image = $image_position =$parallax = $background_image_url = $background_video = $bg_video_mp4 = $background_video_webm = $bg_video_webm = "";
$custom_id = $custom_css_class = $heading_color = $subhead_color = $font_color = $font_style_head = $font_style_subhead = $padding_top = $padding_top_val = $padding_bottom = $padding_bottom_val = $othercss =
$postion_css = $add_pattern = "";
$othercss = '';
$parallaxdiv = '';
$bg = '';
$sectionclass[] = 'product-description-block';

$heading = get_sub_field('heading');
$content = get_sub_field('content');
$content = !empty($content) ? apply_filters('the_content', $content) : '';
$content = get_sub_field('content');

while (have_rows('background_options')) : the_row();
	$background_type = get_sub_field('background_type');

	if ($background_type != 'none'):
	$add_overlay = get_sub_field('add_overlay');
	$overlay_color = current(get_sub_field('overlay_color'));


	endif;

	if ($background_type == 'none'):
		$bg = 'background:none;';

	elseif ($background_type == 'color'):
		$color_picker = current(get_sub_field('color'));
		if (!empty($color_picker)):
			$bg = "background: $color_picker;";
		endif;
	elseif ($background_type == 'image'):
		$background_image = get_sub_field('background_image');
		if (!empty($background_image) && isset($background_image['sizes'])):
			$image_position = current(get_sub_field('image_position'));
			$postion_css = ' background-position: ' . $image_position;
			$parallax = get_sub_field('parallax');
			if($parallax == 1){
				$parallaxdiv = 'data-parallax';
			}
			$background_image_url = $background_image['url'];
			$bg = 'background-image: url(' . $background_image_url . ');'.$postion_css.';';

			$sectionclass[] = 'bgsecimg';
		endif;
	elseif ($background_type == 'video'):
		$sectionclass[] = 'videobg';

		$background_video = get_sub_field('background_video');
		if (isset($background_video) && !empty($background_video['url'])):
			$bg_video_mp4 = $background_video['url'];
		endif;

		$background_video_webm = get_sub_field('background_video_webm');
		if (isset($background_video_webm) && !empty($background_video_webm['url'])):
			$bg_video_webm = $background_video_webm['url'];
		else:
			$bg_video_webm = $bg_video_mp4;
		endif;
	endif;
endwhile;

while (have_rows('other_options')) : the_row();
	$custom_id = get_sub_field('custom_id');
	$custom_css_class = get_sub_field('custom_css_class');

	$heading_color = current(get_sub_field('heading_color'));
	$subhead_color = current(get_sub_field('subhead_color'));

	$font_color = get_sub_field('font_color');

	$padding_top = get_sub_field('padding_top');
	$padding_bottom = get_sub_field('padding_bottom');

	 $add_heading_accent = get_sub_field('add_heading_accent');
	 $accent_color = get_sub_field('accent_color');

	if (!empty($custom_css_class)):
		$sectionclass[] = $custom_css_class;
	endif;

	if (!empty($heading_color)):
		$font_style_head = ' style="color: ' . $heading_color . '"';
	endif;

	if (!empty($subhead_color)):
		$font_style_subhead = ' style="color: ' . $subhead_color . '"';
	endif;

	if (!empty($font_color)):
		$sectionclass[] = $font_color;
	endif;


	if ($padding_top == 1):
		$padding_top_val = get_sub_field('padding_top_val');
		$othercss .= ' padding-top:' . $padding_top_val.'px;';
	endif;

	if ($padding_bottom == 1):
		$padding_bottom_val = get_sub_field('padding_bottom_val');
		$othercss .= ' padding-bottom:' . $padding_bottom_val.'px;';
	endif;

endwhile;

if (isset($sectionclass) && !empty($sectionclass)):
	$sec_class = implode(" ", $sectionclass);
endif;

?>
<section <?php echo !empty($custom_id) ? ' id="' . $custom_id . '" ' : ''; ?> class="<?php echo $sec_class; ?>" <?php echo $parallaxdiv; ?> style="<?php echo $bg . $othercss; ?>">

	<?php if ($add_overlay == 1): ?>
		<div class="bgoverlay" style="background: <?php echo $overlay_color; ?>"></div>
	<?php endif; ?>

	<?php if($background_type == 'video' && !empty($bg_video_mp4)): ?>
			<div class="videobg_child">
				<video class="set-video" id="vid" playsinline="" loop="" muted="" autoplay="">
					<source src="<?php echo $bg_video_mp4; ?>" type="video/mp4">
					<source src="<?php echo $bg_video_webm; ?>" type="video/webm">
				</video>
			</div>
	<?php endif; ?>

	<?php
	 //$product_video = get_sub_field('product_video');
	 $product_image = get_sub_field('product_image');
	 $product_popup_image = get_sub_field('product_popup_image');
	 $product_popup_iframe = get_sub_field('product_popup_iframe');
	 $product_video = get_sub_field('product_video', false, false);
	 $choose_product_subpages = get_sub_field('choose_product_subpages');
	 $product_subpages_list = get_sub_field('product_subpages_list');
	 if($product_image){
		  $proimage = '';
	 }else{
		  $proimage = 'no-above-image';
	 }
	?>
  <div class="container">
		<div class="row">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				<div class="product-description-cont">
					<?php echo!empty($heading) ? '<h2' . $font_style_head . '>' . $heading . '</h2>' : ''; ?>
					<?php echo!empty($content) ? '<p' . $font_style_subhead . '>' . $content . '</p>' : ''; ?>
					<?php if($product_video){ ?>
						<div class="video-btn">
							<?php if( strpos($product_video, 'https://parasoft.tourial.com/') !== false){ ?>
								<a class="btn red-btn" href="<?php echo $product_video;?>" title="Take a self-guided tour">Take a Self-Guided Tour</a>
							<?php }else{ ?>
								<a class="wista-video btn red-btn" href="<?php echo $product_video;?>?autoplay=1&mute=1" title="Watch Video">Watch Video</a>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				<div class="product-description-wrap">
				<?php if($product_image || $product_popup_image){ ?>
					<div class="product-description-img">
						<img src="<?php echo $product_image['url'];?>" alt="<?php echo $product_image['alt'];?>">
						<?php if($product_popup_image){ ?>
							<a href="<?php echo $product_popup_image['url'];?>" class="product-description-click"></a>
						<?php } else if($product_popup_iframe){ ?>
							<a href="<?php echo $product_popup_iframe;?>" class="product-description-click"></a>
						<?php } else { ?>
							<a href="<?php echo $product_image['url'];?>" class="product-description-click"></a>
						<?php } ?>
					</div>
				<?php } ?>
					<div class="product-description-list <?php echo $proimage; ?>">
					<?php if($choose_product_subpages == 'auto'){ ?>
						<ul>
						<?php
						$postid = $post->ID;
											 global $post;

													$args = array(
														'post_parent' => $postid,
														'post__not_in'=> array($postid),
														'posts_per_page' => -1,
														'post_type' => 'page',
														'orderby' => 'menu_order',
														'order' => 'DESC'
														);

													$the_query = new WP_Query( $args );

													if ( $the_query->have_posts() ) :
													while ( $the_query->have_posts() ) : $the_query->the_post();
													 ?>

													  <li>
														<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?> <em></em></a>
													</li>
													 <?php
													endwhile;
													endif;
													// Reset Post Data
													wp_reset_postdata();
											?>

						</ul>
					<?php } else {?>
					 <?php

										// check for rows (sub repeater)
										if( have_rows('product_subpages_list') ): ?>
											<ul>
											<?php

											// loop through rows (sub repeater)
											while( have_rows('product_subpages_list') ): the_row();
									   $sub_pages = get_sub_field('product_sub_pages');

												?>
													  <li><a href="<?php echo $sub_pages['url']; ?>" target="<?php echo $sub_pages['target']; ?>"><?php echo $sub_pages['title']; ?> <em></em></a></li>
													 <?php
													endwhile;
													endif;

											?>


										</ul>
					<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>