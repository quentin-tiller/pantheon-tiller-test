<?php
/**
* Template Name: Innovation & Awards
*
* @package WordPress
*
*/
get_header();

?>
<?php get_template_part( 'template-parts/content', 'innerheader' ); ?>

<section class="innovation-awards">
	<div class="container">
		<div class="row">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				<div class="awards-list-wrap">
					<div class="awards-heading">
						<h2>Awards</h2>
					</div>
					<div class="awards-list">
						<div class="accordion" id="accordionawards">
						<?php
						$args  = [
							'post_type'      => 'award',
							'post_status'    => 'publish',
							'posts_per_page' => -1,
						];

						$query = new Wp_Query( $args );
						if ( $query->have_posts() ) :
							$count = 1;
							while ( $query->have_posts() ) : $query->the_post();
								$id          = get_the_id();
								$title       = get_the_title();
								if($count == 1){
									$columnshow = 'show';
									$card = '';
								} else{
									$columnshow = '';
									$card = 'collapsed';
								}
								?>
							<div class="card">
								<div class="card-header accordion-active" id="heading<?php echo $count; ?>">
									<h2 class="mb-0">
										<div class="btn btn-link <?php echo $card; ?>" data-toggle="collapse" data-target="#collapse<?php echo $count; ?>" aria-expanded="true" aria-controls="collapse<?php echo $count; ?>">
											<?php the_title();?>
										</div>
									</h2>
								</div>
								<div id="collapse<?php echo $count; ?>" class="collapse <?php echo $columnshow;?>" aria-labelledby="heading<?php echo $count; ?>" data-parent="#accordionawards">
									<div class="card-body">
										<?php the_content(); ?>
									</div>
								</div>
							</div>
							<?php
							$count++;
							endwhile;
						endif;
						wp_reset_postdata();
						?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				<div class="patents-list-wrap">
					<div class="patents-heading">
						<h2>Patents</h2>
					</div>
					<div id="ajax-posts" class="patents-main">
					<?php
					$postsPerPage = -1;
					$args = [
						'post_type' => 'patent',
						'posts_per_page' => $postsPerPage,
					];

					$loop = new WP_Query($args);

					while ($loop->have_posts()) : $loop->the_post();
					?>
					<div class="patents-list">
						<h3><?php the_title(); ?></h3>
						<?php the_content(); ?>
					</div>
					<?php
					endwhile;
					wp_reset_postdata();
					?>
					</div>
					<div class="patents-btn">
						<a id="more_posts" href="javascript:void(0);" class="btn blue-btn" title="Load More">Load More</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_template_part( 'template-parts/content', 'flexible' ); ?>
<script>
	jQuery(document).ready(function() {
		var $patents = jQuery('.patents-main .patents-list'),
			$more_posts = jQuery('.patents-btn #more_posts'),
			size_li = $patents.length,
			x = 6;

		$patents.hide();

		( size_li <= 6 ) ? $more_posts.hide() : $more_posts.show();

		jQuery('.patents-main .patents-list:lt(' + x + ')').show();

		$more_posts.on('click', function () {
			x = (x + 6 <= size_li) ? x + 6 : size_li;
			jQuery('.patents-main .patents-list:lt(' + x + ')').show();

			if (x >= size_li) {
				$more_posts.hide();
			}
		});
	});
</script>
<?php get_footer(); ?>