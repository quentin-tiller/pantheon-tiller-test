<?php
$heading = get_sub_field('heading');
$choose_blog_section = get_sub_field('choose_blog_section');
$posts = get_sub_field('choose_blog_post');
?>
<section class="resources-sec alt-v2 alt-featured" style="background-color:#e0e4e5;">
	<div class="resources-wrap">
		<div class="container">
			<div class="row">
			<?php 
	        if ($choose_blog_section == 'featured'){ 
				$args  = array(
					'post_type'      => 'post',
					'post_status'    => 'publish',
					'posts_per_page' => 3,
					'meta_key'      => 'add_featured_blog',
	                'meta_value'    => 1,
					'orderby'   => 'date',
	                'order' => 'DESC',
				
				);

				$query = new Wp_Query( $args );

				if ( $query->have_posts() ) :
					while ( $query->have_posts() ) : $query->the_post();
						$image_url   = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
						if ( $image_url ) {
							$imageurl = $image_url[0];
						} else {
							$imageurl = get_template_directory_uri() . '/images/no-img-available.png';
						}

						$post_type = get_post_type($post->ID);
					
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
							$postname = 'ebook';
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
					<?php
					endwhile;
				endif;
				wp_reset_postdata();
				?>
				
							   
			<?php } else { ?>
	        <?php global $post;

	            if ( $posts ): ?>
	                <?php foreach ( $posts as $post ): // variable must be called $post (IMPORTANT) ?>
	                    <?php setup_postdata( $post );
	                    $id         = get_the_ID();
	                    $imageurl = get_the_post_thumbnail_url($id,'full');
						$post_type = get_post_type($id);
					
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
							$postname = 'ebook';
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

					<?php endforeach; ?>
	                <?php wp_reset_postdata(); ?>
	        	<?php endif; 
	     	} ?>
		
			</div>
		</div>
	</div>
</section>

                