<?php
/**
 * parasoft functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link       https://codex.wordpress.org/Theme_Development
 * @link       https://developer.wordpress.org/themes/advanced-topics/child-themes/
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package    WordPress
 * @subpackage Parasoft
 * @since      parasoft 1.0
 */

/**
 * parasoft only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'parasoft_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * Create your own parasoft_setup() function to override in a child theme.
	 *
	 * @since parasoft 1.0
	 */
	function parasoft_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/parasoft
		 * If you're building a theme based on parasoft, use a find and replace
		 * to change 'parasoft' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'parasoft' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for custom logo.
		 *
		 *  @since parasoft 1.2
		 */ /*add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
                                'width'       => 250,
                                'flex-width'  => true,
                                'flex-height' => true,
			)
		);*/

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#post-thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'parasoft' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
			'chat',
		) );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style( array( 'css/editor-style.css', parasoft_fonts_url() ) );

		// Load regular editor styles into the new block-based editor.
		add_theme_support( 'editor-styles' );

		// Load default block styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom color scheme.
		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => __( 'Dark Gray', 'parasoft' ),
				'slug'  => 'dark-gray',
				'color' => '#1a1a1a',
			),
			array(
				'name'  => __( 'Medium Gray', 'parasoft' ),
				'slug'  => 'medium-gray',
				'color' => '#686868',
			),
			array(
				'name'  => __( 'Light Gray', 'parasoft' ),
				'slug'  => 'light-gray',
				'color' => '#e5e5e5',
			),
			array(
				'name'  => __( 'White', 'parasoft' ),
				'slug'  => 'white',
				'color' => '#fff',
			),
			array(
				'name'  => __( 'Blue Gray', 'parasoft' ),
				'slug'  => 'blue-gray',
				'color' => '#4d545c',
			),
			array(
				'name'  => __( 'Bright Blue', 'parasoft' ),
				'slug'  => 'bright-blue',
				'color' => '#007acc',
			),
			array(
				'name'  => __( 'Light Blue', 'parasoft' ),
				'slug'  => 'light-blue',
				'color' => '#9adffd',
			),
			array(
				'name'  => __( 'Dark Brown', 'parasoft' ),
				'slug'  => 'dark-brown',
				'color' => '#402b30',
			),
			array(
				'name'  => __( 'Medium Brown', 'parasoft' ),
				'slug'  => 'medium-brown',
				'color' => '#774e24',
			),
			array(
				'name'  => __( 'Dark Red', 'parasoft' ),
				'slug'  => 'dark-red',
				'color' => '#640c1f',
			),
			array(
				'name'  => __( 'Bright Red', 'parasoft' ),
				'slug'  => 'bright-red',
				'color' => '#ff675f',
			),
			array(
				'name'  => __( 'Yellow', 'parasoft' ),
				'slug'  => 'yellow',
				'color' => '#ffef8e',
			),
		) );

		// Indicate widget sidebars can use selective refresh in the Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif; // parasoft_setup
add_action( 'after_setup_theme', 'parasoft_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since parasoft 1.0
 */
function parasoft_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'parasoft_content_width', 840 );
}

add_action( 'after_setup_theme', 'parasoft_content_width', 0 );

/**
 * Add preconnect for Google Fonts.
 *
 * @param array  $urls          URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed.
 *
 * @return array $urls           URLs to print for resource hints.
 * @since parasoft 1.6
 *
 */
function parasoft_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'parasoft-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}

add_filter( 'wp_resource_hints', 'parasoft_resource_hints', 10, 2 );

/**
 * Registers a widget area.
 *
 * @link  https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since parasoft 1.0
 */
function parasoft_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'parasoft' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'parasoft' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'parasoft_widgets_init' );

if ( ! function_exists( 'parasoft_fonts_url' ) ) :
	/**
	 * Register Google fonts for parasoft.
	 *
	 * Create your own parasoft_fonts_url() function to override in a child theme.
	 *
	 * @return string Google fonts URL for the theme.
	 * @since parasoft 1.0
	 *
	 */
	function parasoft_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'parasoft' ) ) {
			$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
		}

		/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'parasoft' ) ) {
			$fonts[] = 'Montserrat:400,700';
		}

		/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'parasoft' ) ) {
			$fonts[] = 'Inconsolata:400';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since parasoft 1.0
 */
function parasoft_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}

add_action( 'wp_head', 'parasoft_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since parasoft 1.0
 */
function parasoft_scripts() {
	if (!defined('PARASOFT_THEME_VERSION')) {
		define('PARASOFT_THEME_VERSION', '1.1.0');
	}

	// Theme stylesheet.
	wp_enqueue_style( 'parasoft-style', get_stylesheet_uri() );

	// Theme block stylesheet.
	//wp_enqueue_style( 'parasoft-block-style', get_template_directory_uri() . '/dist/assets/css/blocks.css', array( 'parasoft-style' ), '20181230' );

	// Custom style
	wp_enqueue_style( 'parasoft-app-style', get_template_directory_uri() . '/dist/assets/css/app.css', array( 'parasoft-style' ), PARASOFT_THEME_VERSION );
	wp_enqueue_style( 'fontawesome4', get_template_directory_uri().'/dist/assets/css/fontawesome4.css' );

	// Tiller styles
	wp_enqueue_style( 'tiller-styles', get_template_directory_uri().'/dist/assets/css/tiller.css' );
	wp_enqueue_style( 'modules_v2', get_template_directory_uri().'/dist/assets/css/modules_v2.css' );
	wp_enqueue_style( 'flickity', get_template_directory_uri().'/dist/assets/css/flickity.css' );
	wp_enqueue_style( 'old-styles', get_template_directory_uri().'/dist/assets/css/oldapp.css' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/********** Add Custom js here ****************/
	wp_enqueue_script( 'parasoft-app-js', get_template_directory_uri() . '/dist/assets/js/app.js', array( 'jquery' ), PARASOFT_THEME_VERSION, true );
	wp_enqueue_script( 'parasoft-infographics-js', get_template_directory_uri() . '/dist/assets/js/infographics.js', array( 'jquery' ), PARASOFT_THEME_VERSION, true );
	wp_enqueue_script( 'fixes-js', get_template_directory_uri() . '/dist/assets/js/fixes.js', array( 'jquery' ), PARASOFT_THEME_VERSION, true );
	wp_enqueue_script( 'module-v2-js', get_template_directory_uri() . '/dist/assets/js/modules-v2.js', array( 'jquery' ), PARASOFT_THEME_VERSION, true );
	wp_enqueue_script( 'flickity', get_template_directory_uri() . '/src/assets/js/vendors/flickity.pkgd.min.js', array( 'jquery' ), PARASOFT_THEME_VERSION, true );
	wp_enqueue_script( 'flickity-fade', get_template_directory_uri() . '/src/assets/js/vendors/flickity-fade.js', array( 'jquery' ), PARASOFT_THEME_VERSION, true );
	/*********************************************/

	wp_localize_script( 'parasoft-script', 'ajax_custom_data', array(
		'ajaxurl'          => admin_url( 'admin-ajax.php' ),
		'siteurl'          => site_url(),
		'template_dir_uri' => get_template_directory_uri(),
	) );

	wp_localize_script( 'parasoft-script', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'parasoft' ),
		'collapse' => __( 'collapse child menu', 'parasoft' ),
	) );
}

add_action( 'wp_enqueue_scripts', 'parasoft_scripts' );

/**
 * Enqueue styles for the block-based editor.
 *
 * @since parasoft 1.6
 */
function parasoft_block_editor_styles() {
	// Add custom fonts.
	wp_enqueue_style( 'parasoft-fonts', parasoft_fonts_url(), array(), null );
}

add_action( 'enqueue_block_editor_assets', 'parasoft_block_editor_styles' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array (Maybe) filtered body classes.
 * @since parasoft 1.0
 *
 */
function parasoft_body_classes( $classes ) {
	// Add preload class to stop page transitions on first render
	$classes[] = 'preload';

	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( is_home() || is_front_page() ) {
		$classes[] = 'homepage';
	}

	if ( ! is_home() && is_front_page() ) {
		$classes[] = 'frontPage';
	}

	if ( ! is_home() && ! is_front_page() ) {
		$classes[] = 'innerpage';
	}
	if ( is_home() && ! is_front_page() ) {
		$classes[] = 'page_blog innerpage blogs';
	}

	if ( isset( $post ) ) {
		$classes[] = str_replace( '-', '_', 'page_' . $post->post_name );
	}

	return $classes;
}

add_filter( 'body_class', 'parasoft_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 *
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 * @since parasoft 1.0
 *
 */
function parasoft_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ) . substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ) . substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ) . substr( $color, 2, 1 ) );
	} elseif ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array(
		'red'   => $r,
		'green' => $g,
		'blue'  => $b,
	);
}

/**
 * Custom template tags for this theme.
 */
require_once( 'inc/template-tags.php' );

/**
 * Customizer additions.
 */
require_once( 'inc/customizer.php' );

/**
 * Custom functions.
 */
require_once( 'inc/theme-functions.php' );

/**
 * Parasoft MSDN activation module.
 */
require_once( 'inc/parasoft-msdn.php' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 *
 * @return string A source size value for use in a content image 'sizes' attribute.
 * @since parasoft 1.0
 *
 */
function parasoft_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 840 <= $width ) {
		$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';
	}

	if ( 'page' === get_post_type() ) {
		if ( 840 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	} else {
		if ( 840 > $width && 600 <= $width ) {
			$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		} elseif ( 600 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	}

	return $sizes;
}

add_filter( 'wp_calculate_image_sizes', 'parasoft_content_image_sizes_attr', 10, 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 *
 * @return array The filtered attributes for the image markup.
 * @since parasoft 1.0
 *
 */
function parasoft_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			$attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		} else {
			$attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
		}
	}

	return $attr;
}

add_filter( 'wp_get_attachment_image_attributes', 'parasoft_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @param array $args Arguments for tag cloud widget.
 *
 * @return array The filtered arguments for tag cloud widget.
 * @since parasoft 1.1
 *
 */
function parasoft_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';

	return $args;
}

add_filter( 'widget_tag_cloud_args', 'parasoft_widget_tag_cloud_args' );

function parasoft_remove_type_attr( $tag, $handle ) {
	return preg_replace( "/\stype=['\"]text\/(javascript|css)['\"]/", '', $tag );
}

add_filter( 'style_loader_tag', 'parasoft_remove_type_attr', 10, 2 );
add_filter( 'script_loader_tag', 'parasoft_remove_type_attr', 10, 2 );

add_filter( 'rank_math/opengraph/pre_set_content_image', function () {
	return true;
} );

// ******************** Crunchify Tips - Clean up WordPress Header START ********************** //
function crunchify_remove_version() {
	return '';
}

add_filter( 'the_generator', 'crunchify_remove_version' );

remove_action( 'wp_head', 'wp_resource_hints', 2 );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
remove_action( 'template_redirect', 'rest_output_link_header', 11 );

remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
// ******************** Clean up WordPress Header END ********************** //

//Remove JQuery migrate
function dequeue_jquery_migrate( $scripts ) {
	if ( ! is_admin() && ! empty( $scripts->registered['jquery'] ) ) {
		$scripts->registered['jquery']->deps = array_diff( $scripts->registered['jquery']->deps, [ 'jquery-migrate' ] );
	}
}

add_action( 'wp_default_scripts', 'dequeue_jquery_migrate' );

//Remove wp-embed.min.js
function my_deregister_scripts() {
	wp_dequeue_script( 'wp-embed' );
}

add_action( 'wp_footer', 'my_deregister_scripts' );

//* Enqueue scripts and styles
add_action( 'wp_enqueue_scripts', 'disable_loading_css_js', 9999 );

function disable_loading_css_js() {
	if ( is_front_page() && ! is_user_logged_in() ) {
		wp_dequeue_script( 'search-filter-plugin-build' );
		wp_dequeue_script( 'search-filter-plugin-chosen' );
		wp_dequeue_script( 'jquery-ui-datepicker' );
		wp_dequeue_script( 'addthis_widget' );

		wp_dequeue_style( 'search-filter-plugin-styles' );
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'addthis_all_pages' );
	}
}

function my_output_buffer_callback( $buffer, $phase ) {
	if ( is_user_logged_in() ) {
		return $buffer;
	}

	if ( $phase & PHP_OUTPUT_HANDLER_FINAL || $phase & PHP_OUTPUT_HANDLER_END ) {
		// Here you can manipulate the $buffer
		$home_url = get_home_url();

		$lazy_load_script = <<<'OPTIMIZE_SCRIPT'
<script id="optimization-script">
	function loadCss(filename) {
		var l = document.createElement('link');
		l.rel = 'stylesheet';
		l.href = filename;
		var h = document.getElementsByTagName('head')[0];
		h.parentNode.insertBefore(l, h);
	}

	loadCss('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,400;1,700&family=Poppins:ital,wght@0,400;0,700;1,400;1,700&family=Muli&display=swap');

	var script_loaded = false;

	function downloadJSAtOnload() {
		if (! script_loaded) {
			script_loaded = true;

			if (typeof load_hubspot_form !== 'undefined') {
				var script = document.getElementById('hsforms-v2-js');
				if (script) {
					script.addEventListener('load', function() {
						load_hubspot_form();
					});
				}
			}

			var static_script = document.getElementsByTagName('script');
			for (i = 0; i < static_script.length; i++) {
				if (static_script[i].getAttribute('data-src') !== null) {
					static_script[i].src = static_script[i].getAttribute('data-src');
					// var element = document.createElement('script');
					// element.src = static_script[i].getAttribute('data-src');
					// document.body.appendChild(element);
				}
			}

			setTimeout(function() {
				var $lazyVideos = document.querySelectorAll('.lazy-video');

				if ( $lazyVideos.length > 0 ) {
					for (var i = 0; i < $lazyVideos.length; i++) {
					    var $webmSource = $lazyVideos[i].getElementsByClassName('src-webm')[0],
							$mp4Source = $lazyVideos[i].getElementsByClassName('src-mp4')[0];

						if (!$webmSource && !$mp4Source) {
							return;
						}

						if ($webmSource) {
							$webmSource.src = $lazyVideos[i].dataset.srcWebm;
						}

						if ($mp4Source) {
							$mp4Source.src = $lazyVideos[i].dataset.srcMp4;
						}

						if (/mobile/i.test(navigator.userAgent)) {
							$lazyVideos[i].play();
						} else {
							$lazyVideos[i].load();
						}
					}
				}
			}, 300);

//			if (typeof loadGtm !== 'undefined'){
//				loadGtm();
//			}

			loadCss('/wp-content/themes/parasoft/dist/assets/css/fontawesome4.css');
		}
	}

	window.addEventListener('scroll', function() {
		downloadJSAtOnload();
	});

	window.addEventListener('mousemove', function() {
		downloadJSAtOnload();
	});

	window.addEventListener('touchstart', function() {
		downloadJSAtOnload();
	});

	if (window.addEventListener) {
		window.addEventListener('load', function() {
			setTimeout(downloadJSAtOnload, 4e3);
		}, false);
	} else if (window.attachEvent) {
		window.attachEvent('onload', function() {
			setTimeout(downloadJSAtOnload, 4e3);
		});
	} else {
		window.onload = function() {
			setTimeout(downloadJSAtOnload, 4e3);
		};
	}
</script>
OPTIMIZE_SCRIPT;

		$font_face_observer_code = file_get_contents( getcwd() . '/wp-content/themes/parasoft/dist/assets/js/fontfaceobserver.js' );
		$ffo_scripts = <<<FONT_FACE_OBSERVER
<script id="font-face-observer">{$font_face_observer_code}</script>
<script>
	var zeitungObserver = new FontFaceObserver('zeitung'),
		latoObserver = new FontFaceObserver('lato');

	zeitungObserver.load().then(function () {
		document.documentElement.classList.add('wf-zeitung-active');
	}).catch(function () {
		console.log('Zeitung failed to load.');
	});

	latoObserver.load().then(function () {
		document.documentElement.classList.add('wf-lato-active');
	}).catch(function () {
		console.log('Lato failed to load.');
	});
</script>
FONT_FACE_OBSERVER;

		$buffer = str_replace( '</body>', $lazy_load_script . "\n</body>", $buffer );
		$buffer = str_replace( '</body>', $ffo_scripts . "\n</body>", $buffer );

		$buffer = str_replace( 'window.lazySizesConfig.loadMode=1;', 'window.lazySizesConfig.loadMode=1;window.lazySizesConfig.expand=10;', $buffer );

		$jquery_code = file_get_contents( getcwd() . '/wp-includes/js/jquery/jquery.min.js' );
		$jquery_code = '<script id="jquery-inline">' . $jquery_code . '</script>';
		$buffer      = str_replace( "<script src='{$home_url}/wp-includes/js/jquery/jquery.min.js' id='jquery-core-js'></script>", $jquery_code, $buffer );

		$buffer = str_replace( '<i class="fa fa-search" aria-hidden="true"></i>', '<span class="dashicons dashicons-search" style="font-size: 26px;"></span>', $buffer );

		$buffer = str_replace( 'src="//cdn.iubenda.com/cs/iubenda_cs.js', 'data-src="//cdn.iubenda.com/cs/iubenda_cs.js', $buffer );

		if ( is_front_page() ) {
			$buffer = str_replace( 'src="https://www.bugherd.com/sidebarv2.js', 'data-src="https://www.bugherd.com/sidebarv2.js', $buffer );
		}

		return $buffer;
	}

	return $buffer;
}

ob_start( 'my_output_buffer_callback' );

add_filter( 'autoptimize_filter_imgopt_lazyload_placeholder', 'replaceholder' );
function replaceholder( $in ) {
	$my_own_placeholder = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkqAcAAIUAgUW0RjgAAAAASUVORK5CYII=';

	return $my_own_placeholder;
}




//BLOG MULTIPLE CTAs
function blog_cta_function($atts) {
	$i = $atts['index'] - 1;
	$style = get_field('blog_cta')[$i]['style'];

	if($style==1){
		$content = '<div class="blog-cta-1">'.get_field('blog_cta')[$i]['content'].'</div>';
	} else {
		$content = '<div class="blog-cta-2"><div class="blog-cta-container"><div class="blog-cta-content">';
		$content.= get_field('blog_cta')[$i]['content'].'</div>';
		$content.= '<div class="blog-cta-btn"><div class="blog-cta-btn-container"><a href="'.get_field('blog_cta')[$i]['link']['url'].'">'.get_field('blog_cta')[$i]['link']['title'].'</a></div></div></div></div>';
	}

 	return $content;
}

function blog_cta_init() {
    add_shortcode( 'blog_cta', 'blog_cta_function' );
}

add_action( 'init', 'blog_cta_init' );

function my_plugin_body_class($classes) {
	$current_lang = isset($_SERVER['HTTP_X_GT_LANG']) ? $_SERVER['HTTP_X_GT_LANG'] : '';
	$classes[] = $current_lang;
	return $classes;
}
add_filter('body_class', 'my_plugin_body_class');



// ALLOW SVGS
add_filter('upload_mimes', function($mimes){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
});


