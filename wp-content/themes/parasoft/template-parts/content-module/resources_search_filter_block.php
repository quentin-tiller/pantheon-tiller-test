<?php
$search_form_shortcode = get_sub_field('search_form_shortcode');
$search_results_shortcode = get_sub_field('search_results_shortcode');
?>
<section class="resources-form">
	<div class="resources-search">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<?php echo do_shortcode($search_form_shortcode); ?>
				</div>
            </div>
		</div>
	</div>
</section>

		
<?php echo do_shortcode($search_results_shortcode); ?>
		
	