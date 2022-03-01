<?php
$sectionclass = $linkdata = array();

$background_type = $add_overlay = $overlay_color = $color_picker = $background_image = $image_position =$parallax = $background_image_url = $background_video = $bg_video_mp4 = $background_video_webm = $bg_video_webm = "";
$custom_id = $custom_css_class = $heading_color = $subhead_color = $font_color = $font_style_head = $font_style_subhead = $padding_top = $padding_top_val = $padding_bottom = $padding_bottom_val = $othercss =
$postion_css = $add_pattern = "";
$othercss = '';
$parallaxdiv = '';
$bg = '';
$sectionclass[] = 'leaders-globe-parasoft';

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
     $button = get_sub_field('button');
	 $button_color = get_sub_field('button_color_picker');
    ?>
	
    <div class="container-fluid">
	  <div class="row no-gutters">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="heading text-center">
					<?php echo!empty($heading) ? '<h2' . $font_style_head . '>' . $heading . '</h2>' : ''; ?>
					<?php echo $content;?>
				</div>
			</div>
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="leaders-globe-parasoft-slider">
				<?php 
				if( have_rows('tabs_slider_list') ): ?>
					
					<div class="globe-category-slider">
					<?php 
					while( have_rows('tabs_slider_list') ): the_row(); ?>
						<div class="globe-slider-list">
							<span><?php the_sub_field('heading'); ?></span>
						</div>
						<?php endwhile; ?>
                    </div>
			     <?php endif;  ?>
					
					
					<div class="globe-slider">
					<?php 
					while( have_rows('tabs_slider_list') ): the_row(); 
					  //while( have_rows('full_slider') ): the_row();
					   $background_image = get_sub_field('background_image');
                       $logo = get_sub_field('logo');
					   $content = get_sub_field('content');
					   $sub_heading = get_sub_field('sub_heading');
					   $cta_button = get_sub_field('cta_button');
					?>
						<div class="globe-slider-list">
							<div class="globe-slider-bg" style="background-image:url('<?php echo $background_image['url']; ?>');">
								<div class="globe-slider-cont">
									<div class="logo">
										<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
									</div>
									<p><?php echo $content; ?></p>
									<span>—<?php echo $sub_heading; ?></span>
								<?php if($cta_button){?>	
									<a href="<?php echo $cta_button['url']; ?>" title="<?php echo $cta_button['title']; ?> journey"><?php echo $cta_button['title']; ?> »</a>
								<?php } ?>	
								</div>
							</div>
						</div>
						<?php //endwhile; 
						endwhile; ?>
					
					
					</div>
					<div class="slider-logo-wrap">
					<?php 
					while( have_rows('tabs_slider_list') ): the_row(); ?>
						<div class="slider-logo-main">
							<div class="slider-logo">
							<?php 
					          while( have_rows('logo_list') ): the_row(); 
							 $logo_image = get_sub_field('logo_image');
					         $logo_link = get_sub_field('logo_link');
							  ?>
								<div class="slider-logo-list">
								   <?php if($logo_link){ ?>
									<a href="<?php echo $logo_link;?>" title="" target="_blank"><img src="<?php echo $logo_image['url'];?>" alt="<?php echo $logo_image['alt'];?>"></a>
								   <?php } else {?>
                                     <img src="<?php echo $logo_image['url'];?>" alt="<?php echo $logo_image['alt'];?>">   
                                   <?php } ?>								   
								</div>
							<?php endwhile; ?>	
							</div>
						</div>
					<?php endwhile; ?>	
					
					</div>
				</div>
			</div>
		
	</div>
	<?php if($button){ ?>	
		<div class="row no-gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="leaders-globe-parasoft-btn text-center">
					<a class="btn gray-btn" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
				</div>
			</div>
		</div>
		<?php } ?>
  </div> 
</section>