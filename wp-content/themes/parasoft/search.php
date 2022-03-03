<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Parasoft
 * @since parasoft 1.0
 */

get_header(); ?>

	<section class="search-results-sec">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="search-heading">
						<h2 class="page-title"><?php printf( __( 'Search Results for: %s', 'parasoft' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>
					</div>
				</div>
			</div>
			<div class="row">
				<?php if ( have_posts() ) :
					// Start the loop.
					while ( have_posts() ) :
						the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );

						// End the loop.
					endwhile; ?>
					<div class="pagination-list">
						<div class="pagination-wrap">
							<?php // Previous/next page navigation.
							the_posts_pagination(
								array(
									'prev_text'          => __( 'Previous page', 'parasoft' ),
									'next_text'          => __( 'Next page', 'parasoft' ),
									//'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'parasoft' ) . ' </span>',
								)
							); ?>
						</div>
					</div>
					<?php // If no content, include the "No posts found" template.
					else :
						get_template_part( 'template-parts/content', 'none' );

					endif;
				?>
			</div>
		</div>
	</section><!-- .content-area -->
<?php get_footer(); ?>
