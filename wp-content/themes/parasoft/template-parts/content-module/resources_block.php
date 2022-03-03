<?php
$sectionclass = $linkdata = array();

$background_type = $add_overlay = $overlay_color = $color_picker = $background_image = $image_position =$parallax = $background_image_url = $background_video = $bg_video_mp4 = $background_video_webm = $bg_video_webm = "";
$custom_id = $custom_css_class = $heading_color = $subhead_color = $font_color = $font_style_head = $font_style_subhead = $padding_top = $padding_top_val = $padding_bottom = $padding_bottom_val = $othercss =
$postion_css = $add_pattern = "";
$othercss = '';
$parallaxdiv = '';
$bg = '';
$sectionclass[] = 'resources-sec alt-v2';

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

    $heading_alignment = get_sub_field('heading_alignment');
    
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

    <?php if ($top_deco == 1): ?>
        <div class="bg-deco-top"></div>
    <?php endif; ?>

    <?php if ($bottom_deco == 1): ?>
        <div class="bg-deco-bottom"></div>
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
     $display_order = get_sub_field('display_order');
	 $posts = get_sub_field('resources');
	 $industry_type = get_sub_field('industry_type');
	 $industry_topic = get_sub_field('industry_topic');
	 $product_category = get_sub_field('product_category');
	 $number_of_resources = get_sub_field('number_of_resources');
	 $button = get_sub_field('button');
	 $button_color = get_sub_field('button_color_picker');
    ?>
	
	<div class="resources-wrap <?php echo $boxcolor; ?>">
    	<div class="container">

	   		<div class="heading text-<?php echo $heading_alignment?>">
	   			<?php echo!empty($heading) ? '<h2' . $font_style_head . '>' . $heading . '</h2>' : ''; ?>
				<?php echo!empty($content) ? '<p' . $font_style_subhead . '>' . $content . '</p>' : ''; ?>
	        </div>

            <div class="row">
		
        <?php 
        if ($display_order == 'auto'){

			if($industry_type || $industry_topic || $product_category){
			   $args = array(
				   'post_type' => array('white_paper','video','webinar','post','case_studies','data_sheet', 'analyst_research', 'infographic', 'ebook'),
	               'orderby' => 'date',
				   'order' => 'DESC',
				   'posts_per_page' => $number_of_resources,
				   'tax_query' => array(
				        'relation' => 'OR',
				    	array(
							'taxonomy' => 'types',
							'field' => 'id',
							'terms' =>  $industry_type,
	                       ),
						array(
							'taxonomy' => 'topic',
							'field'    => 'id',
							'terms'    => $industry_topic,
						),
						array(
							'taxonomy' => 'products',
							'field'    => 'id',
							'terms'    => $product_category,
						),
					)
				);
			} else {
				$args = array(
				   'post_type' => array('white_paper','video','webinar','post','case_studies','data_sheet', 'analyst_research', 'infographic', 'ebook'),
	               'orderby' => 'date',
				   'order' => 'DESC',
				   'posts_per_page' => $number_of_resources,
				);
			}

			// The Query
			$query = new WP_Query( $args );
            while ($query->have_posts()){
                $query->the_post();
                $id = $query->post->ID;
				$image_url = get_the_post_thumbnail_url($query->post,'full');
                $post_type = get_post_type($id);
				$typesterms = wp_get_post_terms( $id, 'types' );
			
				/* Get All Post Type Name Start */ 
			
				if($post_type == 'post'){
				 $postname = 'Blog';
				}elseif($post_type == 'webinar'){
				 $postname = 'Webinar';					 
				}elseif($post_type == 'video'){
				 $postname = 'Video';
				}elseif($post_type == 'white_paper'){
				 $postname = 'Whitepaper';
				}elseif($post_type == 'data_sheet'){
				 $postname = 'Datasheet';
				}elseif($post_type == 'case_studies'){
				 $postname = 'Case Study';
				}elseif($post_type == 'analyst_research'){
				 $postname = 'Analyst Research';
				}elseif($post_type == 'infographic'){
					$postname = 'Infographic';
				}elseif($post_type == 'ebook'){
					$postname = 'Ebook';
				}
			?>

			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 resource-list">
				<div class="resources-list">
					<a href="<?=get_the_permalink()?>">
						<div class="resources-top">
							<div class="resources-image" style="background-image: url(<?=get_the_post_thumbnail_url()?>);"></div>
							<div class="content">
								
								<div class="resources-info">
									<span class="resource_type"><?=$postname?></span>
									
									<?php if(get_post_type()=='post'){ ?>
										<span class="rt">Reading Time: <?=do_shortcode('[rt_reading_time]')?> minutes</span>
									<?php } else if(get_post_type()=='case_studies') { ?>
										<span class="rt">Reading Time: <?=get_field('reading_time')?> minutes</span>
									<?php } else if(get_post_type()=='webinar') {
										if(get_field('watch_time')){ ?>
											<span class="rt">Watch Time: <?=get_field('watch_time')?> minutes</span>
										<?php } else { ?>
											<span class="rt"><?=get_field('alternative_text')?></span>
										<?php } ?>
									<?php } else if(get_post_type()=='video') {
										if(get_field('watch_time')){ ?>
											<span class="rt">Watch Time: <?=get_field('watch_time')?> minutes</span>
										<?php } ?>
									<?php } ?>
								</div>
								
								<h3><?=get_the_title()?></h3>

							</div>
						</div>
					</a>
				</div>
			</div>

        <?php } wp_reset_postdata(); ?>
           
		<?php } else {

                global $post;

                if ($posts){
                	foreach ( $posts as $post ){
                		setup_postdata( $post );
                        $id         = get_the_ID();
                        $image_url = get_the_post_thumbnail_url($id,'full');
		                $post_type = get_post_type($id);
						$typesterms = wp_get_post_terms( $id, 'types' );
			
						/* Get All Post Type Name Start */ 
				
					 	if($post_type == 'post'){
						 $postname = 'Blog';
						}elseif($post_type == 'webinar'){
						 $postname = 'Webinar';					 
						}elseif($post_type == 'video'){
						 $postname = 'Video';
						}elseif($post_type == 'white_paper'){
						 $postname = 'Whitepaper';
						}elseif($post_type == 'data_sheet'){
						 $postname = 'Datasheet';
						}elseif($post_type == 'case_studies'){
						 $postname = 'Case Study'; 
						}elseif($post_type == 'analyst_research'){
						 $postname = 'Analyst Research';
						}elseif($post_type == 'infographic'){
							$postname = 'Infographic';
						}elseif($post_type == 'ebook'){
							$postname = 'Ebook';
						}
         		?>
				
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 resource-list">
					<div class="resources-list">
						<a href="<?=get_the_permalink()?>">
							<div class="resources-top">
								<div class="resources-image" style="background-image: url(<?=get_the_post_thumbnail_url()?>);"></div>
								<div class="content">
									
									<div class="resources-info">
										<span class="resource_type"><?=$postname?></span>
										
										<?php if(get_post_type()=='post'){ ?>
											<span class="rt">Reading Time: <?=do_shortcode('[rt_reading_time]')?> minutes</span>
										<?php } else if(get_post_type()=='case_studies') { ?>
											<span class="rt">Reading Time: <?=get_field('reading_time')?> minutes</span>
										<?php } else if(get_post_type()=='webinar') {
											if(get_field('watch_time')){ ?>
												<span class="rt">Watch Time: <?=get_field('watch_time')?> minutes</span>
											<?php } else { ?>
												<span class="rt"><?=get_field('alternative_text')?></span>
											<?php } ?>
										<?php } else if(get_post_type()=='video') {
											if(get_field('watch_time')){ ?>
												<span class="rt">Watch Time: <?=get_field('watch_time')?> minutes</span>
											<?php } ?>
										<?php } ?>
									</div>
									
									<h3><?=get_the_title()?></h3>

								</div>
							</div>
						</a>
					</div>
				</div>
				
				<?php } wp_reset_postdata();?>
            <?php } ?>
		<?php } ?>

        </div>

		<?php if($button){ ?>		
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="featured-news-btn">
					<a class="btn <?php echo $button_color; ?>" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
				</div>
			</div>
		</div>
		<?php } ?>

    </div>
  </div>
  
   
</section>