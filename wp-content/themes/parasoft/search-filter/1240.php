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
 * just an encapsulation of the your results loop which should
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
/*798 - blog*/
?>

<div class="technology-partner-wrap">
	<?php
	global $post;
	if ( $query->have_posts() ): ?>
		<?php
		$count = 1;

		while ( $query->have_posts() ):
			$query->the_post();
			$id        = get_the_id();
			$title     = get_the_title();
			$permalink = get_the_permalink();
			$image_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
			$page_link = get_field( 'tool_integrations_link' );
			$image_url = ( $image_src[0] ) ? $image_src[0] : get_template_directory_uri() . '/dist/assets/images/no-img-available.png';

			$thumb_id = get_post_thumbnail_id();
			$alt      = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );
			?>
			<div class="technology-partner-list">
				<div class="technology-logo logo-border">
					<a class="technology-modal" href="#technology-modal-<?php echo $count; ?>" title="">
						<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo $alt; ?>">
					</a>
					<div id="technology-modal-<?php echo $count; ?>" class="white-popup-block mfp-hide">
						<button title="Close (Esc)" type="button" class="mfp-close" style="background-image:url('<?php echo get_template_directory_uri(); ?>/dist/assets/images/popup-close-icon.svg');"></button>
						<div class="technology-partner-wrap">
							<h3><?php the_title(); ?></h3>
							<?php the_content(); ?>
							<?php if ( $page_link ) { ?>
								<a href="<?php echo $page_link['url']; ?>" target="<?php echo $page_link['target']; ?>"><?php echo $page_link['title']; ?></a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<?php
			$count++;
		endwhile; ?>

		<?php if ( $query->max_num_pages > 1 ): ?>
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
	<?php wp_reset_postdata(); ?>
	<?php else: ?>
		<div class="col-12 text-center">
			<p><?php echo "No Results Found"; ?></p>
		</div>
	<?php endif; ?>
</div>
