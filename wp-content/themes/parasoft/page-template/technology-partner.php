<?php
/**
 * Template Name: Technology Partner
 *
 * @package WordPress
 *
 */
get_header();
?>
<?php get_template_part( 'template-parts/content', 'innerheader' ); ?>

<section class="technology-partner">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="technology-partner-main">

					<h1>Services</h1>
					<?php $terms = get_terms( array( 
					    'taxonomy' => 'technology-partners-category',
					    'parent'   => 224
						) );
					foreach($terms as $i => $term){ //<?=$i==0 ? 'checked' : '' ?>
						<input type="checkbox" name="tech-partner-accordion" id="tech-partner-accordion-<?=$i?>">
						<label for="tech-partner-accordion-<?=$i?>" id="tech-partner-accordion-<?=$i?>-label">
							<h2><?=$term->name?></h2>
						</label>

						<div class="technology-partner-wrap" id="technology-partner-wrap-accordion-<?=$i?>">
							<?php
							$args = array(
								'post_type'      => 'technology_partners',
								'post_status'    => 'publish',
								'posts_per_page' => -1,
								'orderby'        => 'title',
								'order'          => 'ASC',
								'tax_query' => array(
							        array(
							            'taxonomy' => 'technology-partners-category',
							            'field'    => 'slug',
							            'terms'    => $term->slug,
							        ),
							    )
							);

							$query = new Wp_Query( $args );
							if ( $query->have_posts() ) :
								while ( $query->have_posts() ) : $query->the_post();
									$id        = get_the_id();
									$title     = get_the_title();
									$permalink = get_the_permalink();
									$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'thumbnail' );
									$page_link = get_field( 'technology_partners_link', $id );

									if ( $image_url[0] ) {
										$imageurl = $image_url[0];
									} else {
										$imageurl = get_template_directory_uri() . '/dist/assets/images/no-img-available.png';
									}
									$thumb_id = get_post_thumbnail_id();
									$alt      = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true ); ?>

									<div class="technology-partner-list">
										<div class="technology-logo logo-border">
											<a class="technology-modal" href="#technology-modal-<?php echo $id; ?>" title="<?php echo $title; ?>">
												<img src="<?php echo $imageurl; ?>" alt="<?php echo $alt; ?>">
												<div class="name"><?php echo $title; ?></div>
											</a>
											<div id="technology-modal-<?php echo $id; ?>"
											     class="white-popup-block mfp-hide technology-partner-popup">
												<button title="Close (Esc)" type="button" class="mfp-close" style="background-image:url('<?php echo get_template_directory_uri(); ?>/dist/assets/images/popup-close-icon.svg');"></button>
												<div class="technology-partner-wrap technology-partner-wrap-modal">
													<img src="<?php echo $imageurl; ?>" alt="<?php echo $alt; ?>">
													<div class="container">
														<h3><?php the_title(); ?></h3>
														<?php the_content(); ?>
														<?php if ( $page_link ) {
															$url     = esc_url( $page_link['url'] );
															$partner = $page_link['title'] ? $page_link['title'] : $title;
															?>
															<a href="<?php echo $page_link['url']; ?>" target="_blank" rel="noopener noreferrer nofollow"><?php echo $partner; ?> <i class="fa fa-external-link" aria-hidden="true"></i></a>
														<?php } ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php endwhile;
							endif;
							wp_reset_postdata();
							?>
						</div>
					<?php $n=count($terms);} ?>

					<h1>Technology</h1>
					<?php $terms = get_terms( array( 
					    'taxonomy' => 'technology-partners-category',
					    'parent'   => 225
						) );
					foreach($terms as $i => $term){ //<?=$i==0 ? 'checked' : '' ?>
						<input type="checkbox" name="tech-partner-accordion" id="tech-partner-accordion-<?=$i+$n?>">
						<label for="tech-partner-accordion-<?=$i+$n?>" id="tech-partner-accordion-<?=$i+$n?>-label">
							<h2><?=$term->name?></h2>
						</label>

						<div class="technology-partner-wrap" id="technology-partner-wrap-accordion-<?=$i+$n?>">
							<?php
							$args = array(
								'post_type'      => 'technology_partners',
								'post_status'    => 'publish',
								'posts_per_page' => -1,
								'orderby'        => 'title',
								'order'          => 'ASC',
								'tax_query' => array(
							        array(
							            'taxonomy' => 'technology-partners-category',
							            'field'    => 'slug',
							            'terms'    => $term->slug,
							        ),
							    )
							);

							$query = new Wp_Query( $args );
							if ( $query->have_posts() ) :
								while ( $query->have_posts() ) : $query->the_post();
									$id        = get_the_id();
									$title     = get_the_title();
									$permalink = get_the_permalink();
									$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'thumbnail' );
									$page_link = get_field( 'technology_partners_link', $id );

									if ( $image_url[0] ) {
										$imageurl = $image_url[0];
									} else {
										$imageurl = get_template_directory_uri() . '/dist/assets/images/no-img-available.png';
									}
									$thumb_id = get_post_thumbnail_id();
									$alt      = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true ); ?>

									<div class="technology-partner-list">
										<div class="technology-logo logo-border">
											<a class="technology-modal" href="#technology-modal-<?php echo $id; ?>" title="<?php echo $title; ?>">
												<img src="<?php echo $imageurl; ?>" alt="<?php echo $alt; ?>">
												<div class="name"><?php echo $title; ?></div>
											</a>
											<div id="technology-modal-<?php echo $id; ?>"
											     class="white-popup-block mfp-hide technology-partner-popup">
												<button title="Close (Esc)" type="button" class="mfp-close" style="background-image:url('<?php echo get_template_directory_uri(); ?>/dist/assets/images/popup-close-icon.svg');"></button>
												<div class="technology-partner-wrap technology-partner-wrap-modal">
													<img src="<?php echo $imageurl; ?>" alt="<?php echo $alt; ?>">
													<div class="container">
														<h3><?php the_title(); ?></h3>
														<?php the_content(); ?>
														<?php if ( $page_link ) {
															$url     = esc_url( $page_link['url'] );
															$partner = $page_link['title'] ? $page_link['title'] : $title;
															?>
															<a href="<?php echo $page_link['url']; ?>" target="_blank" rel="noopener noreferrer nofollow"><?php echo $partner; ?> <i class="fa fa-external-link" aria-hidden="true"></i></a>
														<?php } ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php endwhile;
							endif;
							wp_reset_postdata();
							?>
						</div>
					<?php } ?>

				</div>
			</div>
		</div>
	</div>
</section>

<?php get_template_part( 'template-parts/content', 'flexible' ); ?>

<?php get_footer(); ?>
