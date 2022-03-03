<?php
/**
 * Template Name: Tool Integrations
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
					<?php echo do_shortcode( '[searchandfilter id="1240"]' ); ?>
					<?php echo do_shortcode( '[searchandfilter id="1240" show="results"]' ); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_template_part( 'template-parts/content', 'flexible' ); ?>
<?php get_footer(); ?>
<script>
	$(document).on('sf:ajaxfinish', '.searchandfilter', function () {
		$('.technology-modal').magnificPopup({
			type: 'inline',
			preloader: false,
			focus: '#username',
			modal: true
		});
	});
</script>
