<?php
/**
* Template Name: Demo Request
*
* @package WordPress
* 
*/
get_header();

?>
<section class="inner-banner demorequest-banner">
	<div class="inner-banner-wrap">
		<div class="container">
			<div class="row">
				<div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
					<div class="inner-banner-cont-wrap">
						<div class="inner-banner-cont">
							<span><?=get_field('banner')['heading']?></span>
							<?=get_field('banner')['subheading']?>
						</div>
					</div>
				</div>
				<?php $video = get_field('banner')['video']; if (!$video){ ?>
				<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
					<img src="<?=get_field('banner')['image']?>"/>
				</div>
				<?php } else { ?>
				<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
					<?=$video?>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>

<section class="demorequest-content">
    <div class="row">
		
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
            <div id="demorequest-form">
				
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
                    formId: "<?=get_field('form_id')?>"
                });
                </script>
				
            </div>
        </div>
		
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
			
            <div class="whattoexpect">
                <?=get_field('what_to_expect')?>
            </div>
			
			<div class="casestudy">
				<?=get_field('case_study')['content']?>
				<?php if(get_field('case_study')['link']){ ?>
					<a class="btn red-btn" href="<?=get_field('case_study')['link']['url']?>"><?=get_field('case_study')['link']['title']?></a>
				<?php } ?>
			<img src="<?=get_field('case_study')['image']?>"/>
				<blockquote><?=get_field('case_study')['quote']?></blockquote>
				<p class="name">&#8212; <?=get_field('case_study')['name']?></p>
			</div>
			
        </div>
    </div>
</section>

<section class="customers-carousel-block">
   <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="customers-carousel-wrap">
                    <?php foreach(get_field('customers') as $img) { ?>
                        <div class="logo">
                            <img src="<?=$img?>"/>
                        </div>
                    <?php } ?>
                </div>                      
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>