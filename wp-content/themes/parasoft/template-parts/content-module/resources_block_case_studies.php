<?php
	$heading = get_sub_field('heading');
	$button = get_sub_field('button');
	// $product = $_GET['product'] ?: null;
	// $product_query = null;
	$industry = $_GET['industry'] ?: null;
	$industry_query = null;
?>

<style>
	.resources-sec.alt-case-studies.alt-v2 #case_study_results {margin-top:-120px; border-top:120px solid transparent;}
	.resources-sec.alt-case-studies.alt-v2 form {margin-bottom:40px;}
	.resources-sec.alt-case-studies.alt-v2 .featured-news-btn .btn {border:1px solid currentColor;}
	.resources-sec.alt-case-studies.alt-v2 #case_study_results + .row:empty::before {
		content: "No Case Studies could be found. Please try another combination.";
		padding: 15px;
		color: #54565A;
	}
</style>


<section class="resources-sec alt-case-studies alt-v2">
	<div class="resources-wrap">
		<div class="container">
			<?php echo!empty($heading) ? '<h2>' . $heading . '</h2>' : ''; ?>

			<div class="filter" id="case_study_results">
				<form action="#case_study_results">
					<?php /* $terms = get_terms(['taxonomy' => 'products']); if($terms){ ?>
						<select name="product" data-select-filter>
							<option value="">Products</option>
							<?php foreach($terms as $option){ ?>
								<option value="<?=$option->term_id?>" <?=$product == $option->term_id ? 'selected' : '' ?>><?=$option->name?></option>
							<?php } ?>
						</select>
					<?php } */ ?>

					<?php $terms = get_terms(['taxonomy' => 'topic']); if($terms){ ?>
						<select name="industry" data-select-filter>
							<option value="">Topic</option>
							<?php foreach($terms as $option){ ?>
								<option value="<?=$option->term_id?>" <?=$industry == $option->term_id ? 'selected' : '' ?>><?=$option->name?></option>
							<?php } ?>
						</select>
					<?php } ?>
				</form>
			</div>

			<div class="row"><?php
				/* if($product){
					$product_query = [
						'taxonomy' => 'products',
						'field'    => 'id',
						'terms'    => $product,
					];
				} */

				if($industry){
					$industry_query = [
						'taxonomy' => 'topic',
						'field'    => 'id',
						'terms'    => $industry,
					];
				}

				$args = array(
					'post_type' => array('case_studies'),
					'orderby' => 'date',
					'order' => 'DESC',
					'posts_per_page' => 6,

					'tax_query' => array(
						'relation' => 'AND',
						// $product_query,
						$industry_query,
					)
				);

				$query = new WP_Query( $args );

				while ($query->have_posts()){
					$query->the_post();
					?><div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 resource-list">
						<div class="resources-list">
							<a href="<?=get_the_permalink()?>">
								<div class="resources-top">
									<div class="resources-image" style="background-image: url(<?=get_the_post_thumbnail_url()?>);"></div>
									<div class="content">
										<div class="resources-info">
											<span class="resource_type">Case Study</span>
											<?php if(get_post_type()=='post'){ ?>
												<span class="rt">Reading time: <?=do_shortcode('[rt_reading_time]')?> minutes</span>
											<?php } else if(get_post_type()=='case_studies') { ?>
												<span class="rt">Reading time: <?=get_field('reading_time')?> minutes</span>
											<?php } else if(get_post_type()=='webinar') { ?>
												<span class="rt">Watch time: <?=get_field('watch_time')?> minutes</span>
											<?php } ?>
										</div>
										<h3><?=get_the_title()?></h3>
									</div>
								</div>
							</a>
						</div>
					</div><?php
				}
				wp_reset_postdata();
			?></div>

			<?php if($button){ ?>
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
						<div class="featured-news-btn">
							<a class="btn" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>