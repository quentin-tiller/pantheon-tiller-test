<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package    WordPress
 * @subpackage Parasoft
 * @since      parasoft 1.0
 */
get_header();
?>
<?php
$featured_img_url     = get_the_post_thumbnail_url( get_the_ID(), 'full' );
$author_image         = get_field( 'author_image' );
$author_name          = get_field( 'author_name' );
$author_designation   = get_field( 'author_designation' );
$select_author_option = get_field( 'select_author_option' );
?>
<section class="blog-single-sec alt-blog">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="blog-single-wrap">
					<div class="blog-cont">
						<?php
						global $post;
						while ( have_posts() ) : the_post(); ?>
							<div class="blog-cont-heading">
								<span>BLOG</span>
								<h1><?php the_title(); ?></h1>
								<ul>
									<li><span class="post-date"><?php echo get_the_date(); ?></span></li>
									<?php if ( $author_name ) { ?>
										<li><span class="post-author"><?php echo $author_name; ?></span></li>
									<?php } elseif ( $select_author_option ) {
										$mypost  = get_post( $select_author_option );

										$mytitle = $mypost->post_title;
										?>
										<li><span class="post-author"><?php echo $mytitle; ?></span></li>
									<?php } else { ?>
										<li><span class="post-author"><?php echo get_the_author(); ?></span></li>
									<?php } ?>
								</ul>
							</div>
							<div class="blog-cont-wrap">
								<img src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>">
								<?php the_content(); ?>
							</div>
						<?php
						endwhile;
						wp_reset_postdata();
						?>
					</div>

					<?php if ( $select_author_option ) {
						$my_post = get_post( $select_author_option );

						$my_post_content = $my_post->post_content;
						$my_post_title   = $my_post->post_title;
						$imageurl        = wp_get_attachment_image_src( get_post_thumbnail_id( $select_author_option ), 'full' );
						?>
						<div class="blog-written-sec">
							<div class="blog-written-wrap">
								<div class="blog-written-bg">
									<div class="bg" style="background-image:url('<?php echo $imageurl[0]; ?>');"></div>
								</div>
								<div class="blog-written-cont">
									<span>Written by</span>
									<h2><?php echo $my_post_title; ?></h2>
									<p><?php echo $my_post_content; ?></p>
								</div>
							</div>
						</div>
					<?php } else { ?>
						<div class="blog-written-sec">
							<div class="blog-written-wrap">
								<div class="blog-written-bg">
									<div class="bg" style="background-image:url('<?php echo $author_image['url']; ?>');"></div>
								</div>
								<div class="blog-written-cont">
									<?php if ( $author_name ) { ?>
										<span>Written by</span>
										<h2><?php echo $author_name; ?></h2>
									<?php } ?>
									<p><?php echo $author_designation; ?></p>
								</div>
							</div>
						</div>
					<?php } ?>
					<div class="next-prev">
						<div class="resources-link">
							<a href="<?php echo get_permalink( 23 ); ?>" class="prev-link">View All Resources</a>
						</div>
						<div class="next-post-link">
							<?php if ( strlen( get_next_post()->post_title ) > 0 ) { ?>
								<?php next_post_link( '%link', 'Read Next Post "%title"' ) ?>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="resources-sec alt-v2" style="background: #f3f3f3;">
	<?php
	$heading              = get_field( 'heading' );
	$display_order        = get_field( 'display_order' );
	$posts                = get_field( 'resources' );
	$industry_type        = get_field( 'industry_type' );
	$number_of_resources  = get_field( 'number_of_resources' );
	$button               = get_field( 'button' );
	$button_color         = get_field( 'button_color_picker' );
	$currentID            = get_the_ID();
	?>

	<div class="resources-wrap">
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
	
</section>

<?php
while ( have_rows( 'cta_subscribe_block', 'option' ) ) : the_row();
	$heading = get_sub_field( 'heading' );
	$content = get_sub_field( 'content' );
	$content = ! empty( $content ) ? apply_filters( 'the_content', $content ) : '';
	$content = get_sub_field( 'content' );
	$form    = get_sub_field( 'form_id' );
endwhile;
?>
<section class="subscribe-form single-subscribe alt-blog">
	<div class="container">
		<div class="row justify-content-center text-center">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="form-block-wrap">
					<div class="form-block-cont">
						<?php echo ! empty( $heading ) ? '<h4>' . $heading . '</h4>' : ''; ?>
						<?php echo ! empty( $content ) ? '<p>' . $content . '</p>' : ''; ?>
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

<?php get_template_part( 'template-parts/content', 'singleflexible' ); ?>
<?php get_footer(); ?>
