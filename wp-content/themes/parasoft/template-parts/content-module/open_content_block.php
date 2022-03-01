<?php
$sectionclass = $linkdata = array();

$background_type = $add_overlay = $overlay_color = $color_picker = $background_image = $image_position =$parallax = $background_image_url = $background_video = $bg_video_mp4 = $background_video_webm = $bg_video_webm = "";
$custom_id = $custom_css_class = $heading_color = $subhead_color = $font_color = $font_style_head = $font_style_subhead = $padding_top = $padding_top_val = $padding_bottom = $padding_bottom_val = $othercss =
$postion_css = $add_pattern = "";
$othercss = '';
$parallaxdiv = '';
$bg = '';
$sectionclass[] = 'open-content-block';

$heading = get_sub_field('heading');
$content = get_sub_field('content');
$content = !empty($content) ? apply_filters('the_content', $content) : '';
$content = get_sub_field('content');

while (have_rows('background_options')) : the_row();
    $background_type = get_sub_field('background_type');
    $top_deco = get_sub_field('top_deco');
    $bottom_deco = get_sub_field('bottom_deco');

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

    $new_design = get_sub_field('new_design');
	$heading_alignment = get_sub_field('heading_alignment');

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
$choose_gradient = get_sub_field('choose_gradient');
?>
<section <?php echo !empty($custom_id) ? ' id="' . $custom_id . '" ' : ''; ?> class="<?php echo $sec_class; ?> <?php echo ($new_design)? 'alt-v2' : '' ; ?>" <?php echo $parallaxdiv; ?> style="<?php echo $bg . $othercss; ?>">
    
    <?php if ($add_overlay == 1): ?>
    <div class="bgoverlay" style="background: <?php echo $overlay_color; ?>"></div>
    <?php endif; ?>

    <?php if ($top_deco == 1): ?>
        <div class="bg-deco-top"></div>
    <?php endif; ?>

    <?php if ($bottom_deco == 1): ?>
        <div class="bg-deco-bottom"></div>
    <?php endif; ?>
    
    <?php if($choose_gradient == 'top-bottom'){ ?>
	<div class="blue-gradient-top-bottom"></div>
    <?php }elseif($choose_gradient == 'bottom-top'){?>
	<div class="blue-gradient-bottom-top"></div>
    <?php } else {?>
	
<?php } ?>
      
    <?php if($background_type == 'video' && !empty($bg_video_mp4)): ?>
            <div class="videobg_child">
                <video class="set-video" id="vid" playsinline="" loop="" muted="" autoplay=""> 
                    <source src="<?php echo $bg_video_mp4; ?>" type="video/mp4"> 
                    <source src="<?php echo $bg_video_webm; ?>" type="video/webm">
                </video>
            </div>
    <?php endif; ?>

    <?php
     $content_width = get_sub_field('content_width');
	 $content_alignment = get_sub_field('content_alignment');
	 $button = get_sub_field('button');
	 $button2 = get_sub_field('button2');
	 $button_color = get_sub_field('button_color_picker');
	 $button_alignment = get_sub_field('button_alignment');
	 
	  if($content_width == '100'){
        $widthclass = 'col-xl-12 col-lg-12';
       }elseif($content_width == '75'){
        $widthclass = 'col-xl-9 col-lg-9';
       }else{
        $widthclass = 'col-xl-8 col-lg-8';
       }
	 if($content_alignment == 'left'){
         $alignwidth = 'left';
       }else{
         $alignwidth = 'center';
       }
       if($button_alignment == 'left'){
         $btnalignwidth = 'left';
       }else{
         $btnalignwidth = 'center';
       }
    ?>
  <div class="container">
		<div class="row">
			<div class="<?php echo $widthclass; ?> col-md-12 col-sm-12">
				<div class="open-content-cont text-<?php echo $alignwidth; ?>">
					
					<div class="heading 
					<?php if($heading_alignment == 'left'){
						echo 'text-left';
					} else {
						echo 'text-center';
					} ?>
				">
						<?php echo!empty($heading) ? '<h2' . $font_style_head . '>' . $heading . '</h2>' : ''; ?>
					</div>
					
					<?php echo $content; ?>
					
				</div>
				
				 <?php if($button){ ?>		
		          <div class="text-<?php echo $btnalignwidth; ?>">      
					<a class="btn <?php echo $button_color; ?>" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
					  
					<?php if($button2){ ?>		     
					<a class="btn <?php echo $button_color; ?>" href="<?php echo $button2['url']; ?>" target="<?php echo $button2['target']; ?>"><?php echo $button2['title']; ?></a>
					<?php } ?>
					  
				  </div>
		         <?php } ?>
			</div>
		</div>
	</div>
   
</section>