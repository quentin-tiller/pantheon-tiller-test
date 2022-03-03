<?php
/**
 * Search & Filter Pro 
 *
 * Sample Results Template
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      http://www.designsandcode.com/
 * @copyright 2015 Designs & Code
 * 
 * Note: these templates are not full page templates, rather 
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think 
 * of it as a template part
 * 
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs 
 * and using template tags - 
 * 
 * http://codex.wordpress.org/Template_Tags
 *
 */
?>
<section class="resources-sec" style="background-color:#fff;">
	<div class="resources-wrap">
   <div class="container">
            <div class="row">
        <?php 
		global $post;
        if ($query->have_posts()): ?>
        <?php
            while ($query->have_posts()):
                $query->the_post();
                $id = $query->post->ID;
				$image_url = get_the_post_thumbnail_url($query->post,'full');
                $post_type = get_post_type($id);
				$typesterms = wp_get_post_terms( $id, 'types' );
                $resource_short_heading = get_field('resource_short_heading');
				$change_register_button_text = get_field('change_register_button_text');
				$webinar_icon = get_field( 'webinar_icon', 'option' );
				$blog_icon = get_field( 'blog_icon', 'option' );
				$video_icon = get_field( 'video_icon', 'option' );
				
				$webinar_green_icon = get_field( 'webinar_green_icon', 'option' );
				$blog_green_icon = get_field( 'blog_green_icon', 'option' );
				$video_green_icon = get_field( 'video_green_icon', 'option' );
				
				$webinar_blue_icon = get_field( 'webinar_blue_icon', 'option' );
				$blog_blue_icon = get_field( 'blog_blue_icon', 'option' );
				$video_blue_icon = get_field( 'video_blue_icon', 'option' );
				
			/* Case Study */   	
				$case_study_gray_icon = get_field( 'case_study_gray_icon', 'option' );
				$case_study_green_icon = get_field( 'case_study_green_icon', 'option' );
				$case_study_blue_icon = get_field( 'case_study_blue_icon', 'option' );
				
				/* whitepaper */   	
				$whitepaper_gray_icon = get_field( 'whitepaper_gray_icon', 'option' );
				$whitepaper_green_icon = get_field( 'whitepaper_green_icon', 'option' );
				$white_paper_blue_icon = get_field( 'white_paper_blue_icon', 'option' );
				
				/* datasheet */   	
				$datasheet_gray_icon = get_field( 'datasheet_gray_icon', 'option' );
				$datasheet_green_icon = get_field( 'datasheet_green_icon', 'option' );
				$datasheet_blue_icon = get_field( 'datasheet_blue_icon', 'option' );
				
				/* Analyst Research */   	
				$analystresearch_gray_icon = get_field( 'analystresearch_gray_icon', 'option' );
				$analystresearch_green_icon = get_field( 'analystresearch_green_icon', 'option' );
				$analystresearch_blue_icon = get_field( 'analystresearch_blue_icon', 'option' );
				
				
			  /* Type Taxonomy Category Start */            
				$catename ='';
				if( $typesterms ) {
				  $types_terms = array();
				  foreach( $typesterms as $term ) {
				   $types_terms[] = $term->name;
				  }
				 $catename = implode(', ', $types_terms); 
                }
			/* Type Taxonomy Category End */ 
			
			/* Get All Post Type Name Start */ 
			
				  if($post_type == 'post'){
					 $postname = 'blog';
					 $linktext = 'Read';
					 //$iocnimage = $blog_icon['url'];
					}elseif($post_type == 'webinar'){
					 $postname = 'webinar';
					 if($change_register_button_text){
                      $linktext = $change_register_button_text;
					 }else{
					
                     $linktext = 'Watch Now';					 
					 }
                     //$iocnimage = $webinar_icon['url'];					 
					}elseif($post_type == 'video'){
					 $postname = 'video';  	
					 $linktext = 'Watch';
					 //$iocnimage = $video_icon['url'];
					}elseif($post_type == 'white_paper'){
					 $postname = 'Whitepaper';  	
					 $linktext = 'Download';
					}
					elseif($post_type == 'data_sheet'){
					 $postname = 'Datasheet';  	
					 $linktext = 'Download';
					}
					elseif($post_type == 'case_studies'){
					 $postname = 'Case Study';  	
					 $linktext = 'Download';
					}
					elseif($post_type == 'analyst_research'){
					 $postname = 'Analyst Research';  	
					 $linktext = 'Download';
					}
					

			/* Get All Post Type Name End */ 	
			
				if($catename == 'Enterprise'){
                  $colorclass = 'blue-enterprise';
				}elseif($catename == 'Embedded'){
				  $colorclass = 'green-embedded';		
				}else{
				  $colorclass = 'gray-all';		
				}
				
				if($catename == 'Enterprise'){
				    
				    	
					if($post_type == 'post'){
					$iocnimage = $blog_blue_icon['url'];
					}elseif($post_type == 'webinar'){
					$iocnimage = $webinar_blue_icon['url'];	
					}elseif($post_type == 'video'){
					 $iocnimage = $video_blue_icon['url'];	
					}elseif($post_type == 'case_studies'){
					 $iocnimage = $case_study_blue_icon['url'];	
					}elseif($post_type == 'white_paper'){
					 $iocnimage = $white_paper_blue_icon['url'];	
					}elseif($post_type == 'data_sheet'){
					 $iocnimage = $datasheet_blue_icon['url'];	
					}elseif($post_type == 'analyst_research'){
					 $iocnimage = $analystresearch_blue_icon['url'];	
					}
					
				
				}elseif($catename == 'Embedded'){
				
						if($post_type == 'post'){
					$iocnimage = $blog_green_icon['url'];
					}elseif($post_type == 'webinar'){
					$iocnimage = $webinar_green_icon['url'];	
					}elseif($post_type == 'video'){
					 $iocnimage = $video_green_icon['url'];	
					}elseif($post_type == 'case_studies'){
					 $iocnimage = $case_study_green_icon['url'];	
					}elseif($post_type == 'white_paper'){
					 $iocnimage = $whitepaper_green_icon['url'];	
					}elseif($post_type == 'data_sheet'){
					 $iocnimage = $datasheet_green_icon['url'];	
					}elseif($post_type == 'analyst_research'){
					 $iocnimage = $analystresearch_green_icon['url'];	
					}
					
				}else{
					
					
					if($post_type == 'post'){
					$iocnimage = $blog_icon['url'];
					}elseif($post_type == 'webinar'){
					$iocnimage = $webinar_icon['url'];	
					}elseif($post_type == 'video'){
					 $iocnimage = $video_icon['url'];	
					}elseif($post_type == 'case_studies'){
					 $iocnimage = $case_study_gray_icon['url'];	
					}elseif($post_type == 'white_paper'){
					 $iocnimage = $whitepaper_gray_icon['url'];	
					}elseif($post_type == 'data_sheet'){
					 $iocnimage = $datasheet_gray_icon['url'];	
					}elseif($post_type == 'analyst_research'){
					 $iocnimage = $analystresearch_gray_icon['url'];	
					}
					
				}
            ?>
             <?php if($post_type == 'white_paper'){
             	$choose_featured_white_paper = get_field( 'choose_featured_white_paper');
             	
             	if($choose_featured_white_paper == '1'){
             ?>
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 resource-list">
					<div class="resources-list FEATURED WHITE PAPER-list <?php echo $colorclass; ?>">
						<a href="<?php echo get_permalink($id); ?>" title="<?php echo get_the_title(); ?>">
							<div class="resources-top">
								<span>FEATURED WHITE PAPER</span>
								<h2><?php echo wp_trim_words( get_the_title(), 7, '...' ); ?></h2>
							</div>
							<div class="resources-bottom">
							  
									<div class="resources-date">
									    <?php if($resource_short_heading){ ?>
									  	  <span><?php echo $resource_short_heading; ?></span>
										 <?php } ?>
									</div>
							 
							  <div class="white-paper-bg">
								<img src="<?php echo $image_url;?>">
							  </div>
								<div class="resources-btn">
									<span>Download »</span>
								</div>
							</div>
						</a>
					</div>
				</div>
				<?php } else{ ?>
				
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 resource-list">
					<div class="resources-list <?php echo $postname; ?>-list <?php echo $colorclass; ?>">
						<a href="<?php echo get_permalink($id); ?>" title="<?php echo get_the_title(); ?>">
							<div class="resources-top">
								<div class="resources-logo">
									<img src="<?php echo $iocnimage; ?>" alt="">
								</div>
								<span><?php echo $postname; ?></span>
								<h2><?php echo get_the_title(); ?></h2>
							</div>
							<div class="resources-bottom">
							   <div class="resources-date">
									<?php if($resource_short_heading){ ?>
										<span><?php echo $resource_short_heading; ?></span>
									<?php } ?>	
								</div>	
								<div class="resources-btn">
									<span><?php echo $linktext; ?> »</span>
								</div>
							</div>
						</a>
					</div>
				</div>
				
				<?php } ?>
				
			 <?php } else {?>
			 
			 <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 resource-list">
					<div class="resources-list <?php echo $postname; ?>-list <?php echo $colorclass; ?>">
						<a href="<?php echo get_permalink($id); ?>" title="<?php echo get_the_title(); ?>">
							<div class="resources-top">
								<div class="resources-logo">
									<img src="<?php echo $iocnimage; ?>" alt="">
								</div>
								<span><?php echo $postname; ?></span>
								<h2><?php echo get_the_title(); ?></h2>
							</div>
							<div class="resources-bottom">
							   <div class="resources-date">
									<?php if($resource_short_heading){ ?>
										<span><?php echo $resource_short_heading; ?></span>
									<?php } ?>	
								</div>	
								<div class="resources-btn">
									<span><?php echo $linktext; ?> »</span>
								</div>
							</div>
						</a>
					</div>
				</div>

             <?php } ?>			 
           
        <?php endwhile; ?>
            <?php if($query->max_num_pages > 1): ?>    
			<div class="pagination-list">
					<div class="pagination-wrap">
						<?php 
							echo paginate_links( array(
								'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
								'total'        => $query->max_num_pages,
								'current'      => max( 1, get_query_var( 'paged' ) ),
								'format'       => '?paged=%#%',
								'show_all'     => false,
								'type'         => 'plain',
								'end_size'     => 2,
								'mid_size'     => 1,
								'prev_next'    => true,
								'prev_text'    => sprintf( '<i></i> %1$s', __( 'Newer Posts', 'text-domain' ) ),
								'next_text'    => sprintf( '%1$s <i></i>', __( 'Older Posts', 'text-domain' ) ),
								'add_args'     => false,
								'add_fragment' => '',
							) );
						?>
					</div>
			 </div>
		<?php endif; ?>
    <?php else: ?>
        <div class="col-12 text-center">
            <p><?php echo "No Results Found"; ?></p>
        </div>
    <?php endif; 
    wp_reset_query();
    ?>

        </div>
    </div>
  </div>
</section>