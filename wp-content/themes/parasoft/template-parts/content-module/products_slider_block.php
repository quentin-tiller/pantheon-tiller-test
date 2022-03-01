<?php
$sectionclass = $linkdata = array();

$background_type = $add_overlay = $overlay_color = $color_picker = $background_image = $image_position =$parallax = $background_image_url = $background_video = $bg_video_mp4 = $background_video_webm = $bg_video_webm = "";
$custom_id = $custom_css_class = $heading_color = $subhead_color = $font_color = $font_style_head = $font_style_subhead = $padding_top = $padding_top_val = $padding_bottom = $padding_bottom_val = $othercss =
$postion_css = $add_pattern = "";
$othercss = '';
$parallaxdiv = '';
$bg = '';
$sectionclass[] = 'demo-products';

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
     $tabs_slider_list = get_sub_field('tabs_slider_list');
    ?>

    <div class="container-fluid">
	  	<div class="row no-gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="demo-products-slider">
				<?php
				if( have_rows('tabs_slider_list') ): ?>

					<div class="globe-category-slider">
                        <div class="globe-slider-list">
                            <span>View All</span>
                        </div>
					<?php
					while( have_rows('tabs_slider_list') ): the_row(); ?>
						<div class="globe-slider-list">
							<span><?php the_sub_field('heading'); ?></span>
						</div>
						<?php endwhile; ?>
                    </div>
			     <?php endif;  ?>

					<div class="globe-slider" data-slick='{"adaptiveHeight": true}'>

                        <!--View All-->
                        <div class="globe-slider-list">
                            <div class="globe-slider-bg">
                                <div class="globe-slider-cont">
                                    <div class="product-columns">

                                    <?php
										//CREATE ARRAY OF ALL PRODUCTS
										$new_array =[];
										foreach($tabs_slider_list as $tab) {
											$products = $tab['repeater'];
											foreach($products as $product){
												array_push($new_array, $product);
											}
										}

										//REMOVE DUPLICATES
										$final_array  = [];
										foreach ($new_array as $current) {
											if ( ! in_array($current, $final_array)) {
												$final_array[] = $current;
											}
										}

										//OUTPUT EACH PRODUCT
										foreach($final_array as $new_product){?>

											<div class="product-column">
												<div class="product-container">
													<div class="product-title">
                                                        <?php if($new_product['url']){ ?>
                                                            <a href="<?=$new_product['url']?>"><?=$new_product['title']?></a>
                                                        <?php }else{ ?>
                                                            <?=$new_product['title']?>
                                                        <?php } ?>
                                                    </div>
													<div class="product-description"><?=$new_product['description']?></div>
													<div class="product-links"><?=$new_product['content']?></div>
													<a class="product-btn" href="<?=$new_product['button']['url']?>" target="<?=$new_product['button']['target']?>"><?=$new_product['button']['title']?></a>
												</div>
											</div>

                                    	<?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>

					<?php while( have_rows('tabs_slider_list') ): the_row();
					  //while( have_rows('full_slider') ): the_row();
					   $content = get_sub_field('content');
					   $sub_heading = get_sub_field('sub_heading');
					   $cta_button = get_sub_field('cta_button');
					   $rows = get_sub_field('repeater');
					?>
						<div class="globe-slider-list">
							<div class="globe-slider-bg">
								<div class="globe-slider-cont">
									<div class="product-columns">
									<?php foreach($rows as $row) { ?>
										<div class="product-column">
												<div class="product-container">
                                                   <div class="product-title">
                                                        <?php if($row['url']){ ?>
                                                            <a href="<?=$row['url']?>"><?=$row['title']?></a>
                                                        <?php }else{ ?>
                                                            <?=$row['title']?>
                                                        <?php } ?>
                                                    </div>
													<div class="product-description"><?=$row['description']?></div>
													<div class="product-links"><?=$row['content']?></div>
													<a class="product-btn" href="<?=$row['button']['url']?>" target="<?=$row['button']['target']?>"><?=$row['button']['title']?></a>
												</div>
											</div>
									<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<?php //endwhile;
						endwhile; ?>
					</div>

				</div>
			</div>
		</div>
  	</div>
</section>