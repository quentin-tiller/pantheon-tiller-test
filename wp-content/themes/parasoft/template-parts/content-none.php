<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @package WordPress
 * @subpackage Parasoft
 * @since Microconstants 1.0
 */
?>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
	<section class="no-results not-found">
		<div class="page-content">
			<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

				<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'microconstants' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

			<?php elseif ( is_search() ) : ?>

				<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'microconstants' ); ?></p>
				<?php //get_search_form(); ?>

			<?php else : ?>

				<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'microconstants' ); ?></p>
				<?php //get_search_form(); ?>

			<?php endif; ?>
		</div><!-- .page-content -->
	</section><!-- .no-results -->
</div>