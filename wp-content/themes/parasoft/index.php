<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Parasoft
 * @since parasoft 1.0
 */
get_header(); ?>

<section class="blog-listing">
	<div class="container">
		<div class="row">
			<?php if ( have_posts() ) : ?>
				<?php
				// Start the loop.
				while ( have_posts() ) :
					the_post();
					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );

					// End the loop.
				endwhile;
				// Previous/next page navigation.
				the_posts_pagination(
					array(
						'prev_text'          => __( 'Previous page', 'parasoft' ),
						'next_text'          => __( 'Next page', 'parasoft' ),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'parasoft' ) . ' </span>',
					)
				);

				// If no content, include the "No posts found" template.
				else :
					get_template_part( 'template-parts/content', 'none' );

				endif;
			?>
		</div>
	</div>
</section>

<?php get_template_part( 'template-parts/content', 'flexible' ); ?>
<?php get_footer(); ?>
