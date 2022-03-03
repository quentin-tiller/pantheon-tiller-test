<?php
$menu_items = get_sub_field('menu_items');
$bg_color = get_sub_field('background_color');
?>

<section class="tertiary-nav <?php echo $bg_color; ?>">
	<div class="container">
		<div class="row">
			<?php foreach($menu_items as $item){ ?>
				<div class="item">
					<a href="#<?=$item['block_id']?>"><?=$item['menu_title']?></a>
				</div>
			<?php } ?>
		</div>
	</div>
</section>