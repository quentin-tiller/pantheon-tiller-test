<?php

/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package    WordPress
 * @subpackage Parasoft
 * @since      parasoft 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-17079314-7"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());
		gtag('config', 'UA-17079314-7');
	</script>
	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-54CFTP5');
	</script>
	<!-- End Google Tag Manager -->

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-site-verification" content="3Ao6vgZ07pvfCZVRaAu2Avgs-5LXjRk60zwK-Mq8tek" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="alternate" href="https://www.parasoft.com<?php echo $_SERVER['REQUEST_URI']; ?>" hreflang="en-us" />
	<link rel="alternate" href="https://fr.parasoft.com<?php echo $_SERVER['REQUEST_URI']; ?>" hreflang="fr-fr" />
	<link rel="alternate" href="https://de.parasoft.com<?php echo $_SERVER['REQUEST_URI']; ?>" hreflang="de-de" />
	<link rel="alternate" href="https://es.parasoft.com<?php echo $_SERVER['REQUEST_URI']; ?>" hreflang="es-es" />
	<?php if (is_singular() && pings_open(get_queried_object())) : ?>
		<link rel="pingback" href="<?php echo esc_url(get_bloginfo('pingback_url')); ?>">
	<?php endif; ?>
	<!-- Zeitung Font Family -->
	<!--<link rel="stylesheet" href="https://use.typekit.net/ull7bcy.css">-->
	<!-- <style type="text/css">
		body.preload header .header-wrap {
			display: none !important;
		}
	</style> -->
	<?php if (is_page(11491) || is_page_template('page-template/demo-request.php')) { ?>
		<style type="text/css">
			.header-menu-main .header-menu-wrap {
				display: none;
			}
		</style>
	<?php } ?>
	<!-- Lato Font Family -->
	<!--	<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,400;1,700&display=swap" rel="stylesheet">-->
	<!-- Poppins Font Family -->
	<!--	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">-->
	<!-- Muli Font Family -->
	<!--	<link href="https://fonts.googleapis.com/css2?family=Muli&display=swap" rel="stylesheet">-->
	<?php wp_head(); ?>
	<?php if (isset($_ENV['PANTHEON_ENVIRONMENT']) && 'live' !== $_ENV['PANTHEON_ENVIRONMENT']) :
		$apiKey = ('test' !== $_ENV['PANTHEON_ENVIRONMENT']) ? 'mtnjaiwqjcn1nux6m9sluq' : 'eegwt2pgs5ohjep09bs0fw';
	?>
		<script type="text/javascript" src="https://www.bugherd.com/sidebarv2.js?apikey=<?php echo $apiKey; ?>>" async></script>
	<?php endif; ?>

	<!--ClearBit Tracking-->
	<script type="text/javascript">
		(function(d, u, h, s) {
			h = d.getElementsByTagName('head')[0];
			s = d.createElement('script');
			s.async = 1;
			s.src = u + new Date().getTime();
			h.appendChild(s);
		})(document, 'https://grow.clearbitjs.com/api/pixel.js?v=');
	</script>
	<!--END ClearBit Tracking-->
	
	<!-- Begin of Hushly Code -->
	<script type="text/javascript">
	  (function(win, doc, src, name, aid ) {
		win[name] = win[name] || function() { (win[name].queue = win[name].queue || []).push(arguments) }
		win['__hly_widget_object'] = {name:name}; win[name].accountId = aid; src += '?aid=' + aid;
		var hws = doc.createElement('script'); hws.type  = 'text/javascript'; hws.async = true;  hws.src = src;
		var node = doc.getElementsByTagName('script')[0];  node.parentNode.insertBefore(hws, node);
	  })(window, document, 'https://app.hushly.com/runtime/widget.js', 'hushly',  '10127');
	</script>
	<!-- End of Hushly Code -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<?php
header('Cache-Control: no-cache');
$current_lang = isset($_SERVER['HTTP_X_GT_LANG']) ? $_SERVER['HTTP_X_GT_LANG'] : '';
?>

<body <?php body_class(); ?>>
	<?php $header_class = (is_front_page()) ? 'home-header' : 'inner-header'; ?>
	<header class="<?php echo $header_class; ?>">
	<div class="header-wrap announcement-wrap">
        <div class="container">
            <div class="announcement">
				<?php $obj = get_field('announcement_bar', wp_get_nav_menu_object(269)); ?>
				<p class="alt-<?= $obj['alignment'] ?>">
					<?= $obj['announcement']; ?> <a href="<?= $obj['link']['url']; ?>"><?= $obj['link']['title']; ?></a>
				</p>
            </div>
            <div class="search-language">
				<?php if (class_exists('GTranslate')) : ?>
				<div class="gtranslate-wrap">
					<?php echo do_shortcode('[gtranslate]'); ?>
				</div>
				<?php endif; ?>
				<div class="support">
					<a href="/support/">Support GG</a>
				</div>
				<div class="search-main">
					<div class="search-toggles">
						<span class="dashicons dashicons-search"></span>
						<span class="dashicons dashicons-no-alt"></span>
						<!-- <div class="search-close">
							<span>X</span>
						</div> -->
					</div>
					<div class="search-bar">
						<?php echo get_search_form(); ?>
					</div>
				</div>
			</div>
        </div>
    </div>
	<div class="header-wrap navigation">
		<div class="container">
			<div class="home-logo">
				<?php $sticky_logo = get_field('sticky_logo', 'option');
				?>
				<?php if ($sticky_logo) { ?>
					<a href="<?php echo esc_url(home_url('/')); ?>" title="parasoft">
						<img src="<?php echo $sticky_logo['url']; ?>" alt="<?php echo $sticky_logo['alt']; ?>">
					</a>
				<?php } ?>
			</div>
			<div class="header-menu-main">
				<nav>
					<div class="mobile-menu-toggle"></div>
					<?php wp_nav_menu(); ?>
				</nav>
			</div>
		</div>
	</div>

	</header>