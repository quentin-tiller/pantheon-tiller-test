<?php
$sectionclass = $linkdata = array();

$background_type = $add_overlay = $overlay_color = $color_picker = $background_image = $image_position =$parallax = $background_image_url = $background_video = $bg_video_mp4 = $background_video_webm = $bg_video_webm = "";
$custom_id = $custom_css_class = $heading_color = $subhead_color = $font_color = $font_style_head = $font_style_subhead = $padding_top = $padding_top_val = $padding_bottom = $padding_bottom_val = $othercss =
$postion_css = $add_pattern = "";
$othercss = '';
$parallaxdiv = '';
$bg = '';
$sectionclass[] = 'press-mentions-block';

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
     $number_of_resources = get_sub_field('number_of_resources');
	 $display_order = get_sub_field('display_order');
	 $posts = get_sub_field('press');
     $button = get_sub_field('button');
	 $button_color = get_sub_field('button_color_picker');
    ?>
	
    <div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="heading text-center">
					<?php echo !empty($heading) ? '<h2>' . $heading . '</h2>' : ''; ?>
					<?php echo!empty($content) ? '<p' . $font_style_subhead . '>' . $content . '</p>' : ''; ?>
				</div>
			</div>
		</div>
		<div class="row">
		<?php 
        if ($display_order == 'auto'){
          $args = array(
			   'post_type' => 'press_mention',
               'orderby' => 'date',
			   'order' => 'DESC',
			   'posts_per_page' => $number_of_resources,
	
			);
			$query = new WP_Query( $args );
            while ($query->have_posts()):
                $query->the_post();
				$id = $query->post->ID;
                //$image_url = get_the_post_thumbnail_url($query->post,'large');
				$typesterms = wp_get_post_terms( $id, 'press_mentions_category' );
				if( $typesterms ) {
				  $types_terms = array();
				  foreach( $typesterms as $term ) {
				   $types_terms[] = $term->name;
				  }
				 $catename = implode(', ', $types_terms); 
                }
				$terms = get_the_terms( get_the_ID(), 'press_mentions_category' );
				$image_id = get_field('press_mentions_category_image', $term, false);
				$image = wp_get_attachment_image_src($image_id, $size);
                $date = date('m.d.Y', strtotime(get_the_date())) ;
		?>
		
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 press-mentions-list">
				<div class="press-mentions-wrap">
					<a href="<?php echo get_permalink($id); ?>" title="">
						<div class="press-mentions-logo">
							<img src="<?php echo $image[0]; ?>" alt="">
						</div>
						<div class="press-mentions-cont">
							<div class="date">
								<span><?php echo $date; ?></span>
							</div>
							<h3><?php echo $catename; ?></h3>
										<p><?php echo get_the_title(); ?></p>
						</div>
						<div class="press-mentions-btn">
							<span>View <i>»</i></span>
						</div>
					</a>
				</div>
			</div>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>	
		<?php } else { ?>
			 <?php
                    global $post;

                    if ( $posts ): ?>
                        <?php foreach ( $posts as $post ): ?>
                            <?php setup_postdata( $post );
                            $id         = get_the_ID();
                           $typesterms = wp_get_post_terms( $id, 'press_mentions_category' );
				if( $typesterms ) {
				  $types_terms = array();
				  foreach( $typesterms as $term ) {
				   $types_terms[] = $term->name;
				  }
				 $catename = implode(', ', $types_terms); 
                }
				$terms = get_the_terms( get_the_ID(), 'press_mentions_category' );
				$image_id = get_field('press_mentions_category_image', $term, false);
				$image = wp_get_attachment_image_src($image_id, $size);
                $date = date('m.d.Y', strtotime(get_the_date())) ;
						   ?>
						   
						   <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 press-mentions-list">
				<div class="press-mentions-wrap">
					<a href="<?php echo get_permalink($id); ?>" title="">
						<div class="press-mentions-logo">
							<img src="<?php echo $image[0]; ?>" alt="">
						</div>
						<div class="press-mentions-cont">
							<div class="date">
								<span><?php echo $date; ?></span>
							</div>
							<h3><?php echo $catename; ?></h3>
										<p><?php echo get_the_title(); ?></p>
						</div>
						<div class="press-mentions-btn">
							<span>View <i>»</i></span>
						</div>
					</a>
				</div>
			</div>
			
			<?php endforeach; ?>
                        <?php wp_reset_postdata();?>
                    <?php endif; ?>
		<?php } ?>
		</div>
		<?php if($button){ ?>	
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="press-mentions-btn">
					<a class="btn <?php echo $button_color; ?>" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
   
</section>