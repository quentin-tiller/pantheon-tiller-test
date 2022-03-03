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
<section class="resources-sec alt-v2" style="background-color:#fff;">
	<div class="resources-wrap">
	<div class="container">
	<div class="row">

		<?php
		global $post;
		if ($query->have_posts()):
			while ($query->have_posts()):
				$query->the_post();
				$id = $query->post->ID;
				$image_url = get_the_post_thumbnail_url($query->post,'full');
				$post_type = get_post_type($id);
				$typesterms = wp_get_post_terms( $id, 'types' );
				$resource_types = wp_get_post_terms( $id, 'resource_type' );
				$resource_short_heading = get_field('resource_short_heading');


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
	<?php endif; wp_reset_query(); ?>

	</div>
	</div>
	</div>
</section>