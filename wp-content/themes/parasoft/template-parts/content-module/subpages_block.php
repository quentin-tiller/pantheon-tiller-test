<?php
$sectionclass = $linkdata = array();

$background_type = $add_overlay = $overlay_color = $color_picker = $background_image = $image_position =$parallax = $background_image_url = $background_video = $bg_video_mp4 = $background_video_webm = $bg_video_webm = "";
$custom_id = $custom_css_class = $heading_color = $subhead_color = $font_color = $font_style_head = $font_style_subhead = $padding_top = $padding_top_val = $padding_bottom = $padding_bottom_val = $othercss =
$postion_css = $add_pattern = "";
$othercss = '';
$parallaxdiv = '';
$bg = '';
$sectionclass[] = 'solutions-testing-sec';

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

$choose_gradient = get_sub_field('choose_gradient');
?>
<section <?php echo !empty($custom_id) ? ' id="' . $custom_id . '" ' : ''; ?> class="<?php echo $sec_class; ?>" <?php echo $parallaxdiv; ?> style="<?php echo $bg . $othercss; ?>">
    
    <?php if ($add_overlay == 1): ?>
        <div class="bgoverlay" style="background: <?php echo $overlay_color; ?>"></div>
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
     $parent_pages = get_sub_field('parent_pages');
    ?>
  <div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="solutions-testing-heading">
					<?php echo!empty($heading) ? '<h2' . $font_style_head . '>' . $heading . '</h2>' : ''; ?>
					<?php echo!empty($content) ? '<p' . $font_style_subhead . '>' . $content . '</p>' : ''; ?>
				</div>
			</div>
		</div>
		<div class="row justify-content-md-center animation-box">
		
		<?php if (have_rows('parent_pages')): ?>
                                <?php
                                $count = 1;
                                while (have_rows('parent_pages')): the_row();

                                    // vars
                                    $choose_page = get_sub_field('choose_page');
                                    $page_link = get_sub_field('page_link');
									$parent_page = get_sub_field('parent_page');
                                  
                                    ?>

                                    
						 <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 solutions-list animation bottom-up">
							<div class="solutions-testing-list">
								<h3><?php echo $parent_page; ?></h3>
                                           <?php 

										// check for rows (sub repeater)
										if( have_rows('sub_pages_list') ): ?>
											<ul>
											<?php 

											// loop through rows (sub repeater)
											while( have_rows('sub_pages_list') ): the_row();
                                       $sub_pages = get_sub_field('sub_pages');
												
												?>
                                                      <li><a href="<?php echo $sub_pages['url']; ?>" target="<?php echo $sub_pages['target']; ?>"><?php echo $sub_pages['title']; ?> <i></i></a></li>
                                                     <?php
                                                    endwhile;
                                                    endif;
                                                   
                                            ?>
                                           
                                          
                                        </ul>
										<?php if($page_link){ ?>	
											<a class="btn parrot-green-light" href="<?php echo $page_link['url']; ?>" target="<?php echo $page_link['target']; ?>"><?php echo $page_link['title']; ?> <i></i></a>
										<?php } ?>
										
                                    
                                    </div>
			                     </div>
                                    <?php
                                    wp_reset_postdata();
                                    $count++;
                                endwhile;
                                
                                ?>

                             

                       

                  <?php endif; ?>
		
		</div>
	</div>
   
</section>