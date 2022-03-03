<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package    WordPress
 * @subpackage Parasoft
 * @since      parasoft 1.0
 */

get_header(); ?>
<?php if ( '' !== get_post()->post_content ) { ?>
<?php while ( have_posts() ) : the_post(); ?>
	<?php //the_content(); ?>
<?php endwhile; ?>
<?php }
 wp_reset_query();
 ?> 
<?php get_template_part( 'template-parts/content', 'flexible' ); ?>

<?php get_footer(); ?>
