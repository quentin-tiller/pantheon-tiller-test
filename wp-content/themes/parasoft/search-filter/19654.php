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
<section class="partners-directory">
	<div class="container">

	<?php
	global $post;
	if ($query->have_posts()):
		while ($query->have_posts()):
			$query->the_post();
			$id = $query->post->ID;
			$image_url = get_the_post_thumbnail_url($query->post,'full');
			$region = wp_get_post_terms( $id, 'technology_partners_region' );
			$type = wp_get_post_terms( $id, 'technology-partners-category' );
			$country = wp_get_post_terms( $id, 'technology_partners_country' );
	?>
				<div class="partner">
					<div class="row">
						<div class="col-xl-2 col-lg-2 col-md-2">
							<img src="<?php echo $image_url; ?>"/>
						</div>
						<div class="col-xl-7 col-lg-7 col-md-7">
							<h4><?php the_title(); ?></h4>
							<div class="categories">
								<p>
								<?php
								if($type){
									if($region || $country){
										echo $type[0]->name . ', ';
									} else {
										echo $type[0]->name;
									}
								}

								if($region){
									if($region[0]->name == 'Global'){
										echo 'Global';
									} else {
										echo $region[0]->name .', ';
									}
								}

								echo $country[0]->name;

								?>
								</p>
							</div>
							<div class="info">
								<?php the_content(); ?>
							</div>
							<p class="site"><a href="<?php echo get_field('technology_partners_link')['url'];?>"><?php echo get_field('technology_partners_link')['title'];?>
								<svg width="15px" height="15px" viewBox="0 0 15 15">
								    <g id="UI" stroke="none" stroke-width="1.5" fill="none" fill-rule="evenodd" stroke-linecap="round">
								        <g id="Partnership-directory-UI" transform="translate(-789.000000, -1114.000000)">
								            <g id="Group-10" transform="translate(790.000000, 1115.376608)">
								                <polyline id="Path-9" stroke-linejoin="round" points="5.69261969 0 0 0 0 12.3 12.6368491 12.3 12.6368491 6.82613174"></polyline>
								                <line x1="4.03740957" y1="8.59943956" x2="12.6368491" y2="0" id="Path-10"></line>
								                <polyline id="Path-11" points="8.87870188 0 12.6368491 0 12.6368491 3.57073105"></polyline>
								            </g>
								        </g>
								    </g>
								</svg>
							</a></p>

							<?php if( get_field('technology_partners_address') ){ ?>
							<div class="row contact">
								<div class="col-11">
									<?php echo get_field('technology_partners_address');?>
								</div>
							</div>
							<?php } ?>
							
						</div>
						<div class="col-xl-3 col-lg-3 col-md-3 tools">
							<p class="title">Specialty</p>
							<?php echo get_field('technology_partners_tools');?>
						</div>
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
		<div class="text-center">
			<p><?php echo "No Results Found"; ?></p>
		</div>
	<?php endif; wp_reset_query(); ?>

	</div>
</section>