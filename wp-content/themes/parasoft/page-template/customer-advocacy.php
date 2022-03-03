<?php
/**
* Template Name: Customer Advocacy
*
* @package WordPress
* 
*/
get_header();

?>

<section class="inner-banner customer-advocacy-banner" style="background-image: url(<?=get_field('banner')['image']?>);">
	<div class="bgoverlay" ></div>
	<div class="inner-banner-wrap">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="inner-banner-cont-wrap">
						<div class="inner-banner-cont">
							<span><?=get_field('banner')['heading']?></span>
							<h2><?=get_field('banner')['subheading']?></h2>
							<?php $btn=get_field('banner')['link']?>
							<a class="btn red-btn" href="<?=$btn['url']?>"><?=$btn['title']?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="customer-advocacy">
	<div class="container">
		<h2><?=get_field('blocks')['heading']?></h2>
		<div class="row blocks">
			<?php $rows=get_field('blocks')['repeater']; foreach($rows as $row){?>
				<div class="column col-xl-3 col-lg-3 col-md-6 col-sm-12">
					<div class="box">
						<div class="image" style="background-image:url(<?=$row['image']['url']?>);"></div>
						<div class="text"><h4><?=$row['text']?></h4></div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section> 

<section class="customer-advocacy-form">
	<div class="container">
	    <div class="row">
			<div class="column col-xl-6 col-lg-6 col-md-12 col-sm-12">
				<div class="blocks2">
					<?php $rows=get_field('blocks2')['repeater']; foreach($rows as $row){?>
						<div class="content"><?=$row['text']?></div>
					<?php } ?>
				</div>
			</div>
	        <div class="column col-xl-6 col-lg-6 col-md-12 col-sm-12">
				<div class="form-container">
					<div class="heading"><?=get_field('form')['heading']?></div>
					<div id="form">
						
						<!--Clearbit-->
				<script>
!function(e){var o=document.getElementsByTagName("script")[0];if("object"==typeof e.ClearbitForHubspot)return console.log("Clearbit For HubSpot included more than once"),!1;e.ClearbitForHubspot={},e.ClearbitForHubspot.forms=[],e.ClearbitForHubspot.addForm=function(o){var t=o[0];"function"==typeof e.ClearbitForHubspot.onFormReady?e.ClearbitForHubspot.onFormReady(t):e.ClearbitForHubspot.forms.push(t)};var t=document.createElement("script");t.async=!0,t.src="https://hubspot.clearbit.com/v1/forms/pk_ecff71973e676a5a61dc1059889cfe36/forms.js",o.parentNode.insertBefore(t,o),e.addEventListener("message",function(o){if("hsFormCallback"===o.data.type&&"onFormReady"===o.data.eventName)if(document.querySelectorAll('form[data-form-id="'+o.data.id+'"]').length>0)e.ClearbitForHubspot.addForm(document.querySelectorAll('form[data-form-id="'+o.data.id+'"]'));else if(document.querySelectorAll("iframe.hs-form-iframe").length>0){document.querySelectorAll("iframe.hs-form-iframe").forEach(function(t){t.contentWindow.document.querySelectorAll('form[data-form-id="'+o.data.id+'"]').length>0&&e.ClearbitForHubspot.addForm(t.contentWindow.document.querySelectorAll('form[data-form-id="'+o.data.id+'"]'))})}})}(window);
</script>
						<!--HubSpot-->
						<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
						<script>
						  hbspt.forms.create({
							region: "na1",
							portalId: "69806",
							formId: "<?=get_field('form')['id']?>"
						});
						</script>
						
					</div>
				</div>
	        </div>
	    </div>
	</div>
</section>

<?php get_footer(); ?>