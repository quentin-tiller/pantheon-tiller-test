<?php
/**
* Template Name: Contact Page
*
* @package WordPress
* 
*/
get_header();

?>

<!--Clearbit-->
<script>
!function(e){var o=document.getElementsByTagName("script")[0];if("object"==typeof e.ClearbitForHubspot)return console.log("Clearbit For HubSpot included more than once"),!1;e.ClearbitForHubspot={},e.ClearbitForHubspot.forms=[],e.ClearbitForHubspot.addForm=function(o){var t=o[0];"function"==typeof e.ClearbitForHubspot.onFormReady?e.ClearbitForHubspot.onFormReady(t):e.ClearbitForHubspot.forms.push(t)};var t=document.createElement("script");t.async=!0,t.src="https://hubspot.clearbit.com/v1/forms/pk_ecff71973e676a5a61dc1059889cfe36/forms.js",o.parentNode.insertBefore(t,o),e.addEventListener("message",function(o){if("hsFormCallback"===o.data.type&&"onFormReady"===o.data.eventName)if(document.querySelectorAll('form[data-form-id="'+o.data.id+'"]').length>0)e.ClearbitForHubspot.addForm(document.querySelectorAll('form[data-form-id="'+o.data.id+'"]'));else if(document.querySelectorAll("iframe.hs-form-iframe").length>0){document.querySelectorAll("iframe.hs-form-iframe").forEach(function(t){t.contentWindow.document.querySelectorAll('form[data-form-id="'+o.data.id+'"]').length>0&&e.ClearbitForHubspot.addForm(t.contentWindow.document.querySelectorAll('form[data-form-id="'+o.data.id+'"]'))})}})}(window);
</script>


<?php get_template_part( 'template-parts/content', 'contactflexible' ); ?>

<?php get_footer(); ?>