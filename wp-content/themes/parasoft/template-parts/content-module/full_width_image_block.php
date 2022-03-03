<?php
$full_width_image = get_sub_field('full_width_image');
$add_parallax = get_sub_field('add_parallax');
if($add_parallax == 1){
  $parallax = 'data-parallax';
  $parallaxclass = 'full-parallax';
}else{
  $parallax = '';	
  $parallaxclass = '';
}
if($full_width_image){
?>
<section class="full-width-image-block">
	<div class="full-width-image-block-bg" <?php echo $parallax; ?> style="background-image:url('<?php echo $full_width_image['url'];?>');"></div>
</section>

<?php } ?>
                