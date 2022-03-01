<?php
/*********************************************/
/* Admin backend CSS & js */
/*********************************************/

function my_custom_fonts() {
	echo '<link rel="stylesheet" href="' . get_stylesheet_directory_uri() . '/assets/css/admin.css" type="text/css" media="all" />';
}

//add_action('admin_head', 'my_custom_fonts');

function admin_customize() {
	wp_enqueue_script( 'themedev-cus-admin', get_template_directory_uri() . '/js/admin.js', array(), '0.1' );
}

//add_action( 'admin_footer','admin_customize');

/*********************************************/
/* Admin backend customization for logo */
/*********************************************/

function my_login_logo() {
	$logo     = get_option_value( 'admin_logo' );
	$logo_url = ( ! empty( $logo ) ) ? $logo : get_stylesheet_directory_uri() . '/dist/assets/images/parasoft-white.svg';
	?>
	<style type="text/css">
		body.login {
			background: #004877;
		}

		.login #backtoblog a, .login #nav a {
			color: #fff !important;
		}

		.login h1 a {
			background-image: url('<?php echo $logo_url; ?>') !important;
			padding-bottom: 10px !important;
			background-size: auto !important;
			width: 100% !important;
			height: 100px !important;
		}
	</style>
<?php }

add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
	return home_url();
}

add_filter( 'login_headerurl', 'my_login_logo_url' );

/************************************************************************************************************/
/* ACF Menu Hide Based on User Role*/
/************************************************************************************************************/

function my_acf_show_admin( $show ) {
	return current_user_can( 'manage_options' );
}

add_filter( 'acf/settings/show_admin', 'my_acf_show_admin' );

/************************************************************************************************************/
/*Default Image options for ACF field */
/************************************************************************************************************/

function add_default_value_to_image_field( $field ) {
	acf_render_field_setting( $field, array(
		'label'        => __( 'Default Image ID', 'parasoft' ),
		'instructions' => __( 'Appears when creating a new post', 'parasoft' ),
		'type'         => 'image',
		'name'         => 'default_value',
	) );
}

add_action( 'acf/render_field_settings/type=image', 'add_default_value_to_image_field', 20 );

/************************************************************************************************************/
/* Theme options */
/************************************************************************************************************/

if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( array(
		'page_title' => 'Theme General Settings',
		'menu_title' => 'Theme Options',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect'   => true,
//		'icon_url' => 'dashicons-menu',
		'position'   => 60,
	) );

	acf_add_options_sub_page( array(
		'page_title'  => 'Theme Header Settings',
		'menu_title'  => 'Header',
		'parent_slug' => 'theme-general-settings',
	) );

	acf_add_options_sub_page( array(
		'page_title'  => 'Theme Footer Settings',
		'menu_title'  => 'Footer',
		'parent_slug' => 'theme-general-settings',
	) );

	acf_add_options_sub_page( array(
		'page_title'  => 'Theme Icons',
		'menu_title'  => 'Theme Icons',
		'parent_slug' => 'theme-general-settings',
	) );

	acf_add_options_sub_page( array(
		'page_title'  => 'Theme Global Settings',
		'menu_title'  => 'Global Settings',
		'parent_slug' => 'theme-general-settings',
	) );
}

/************************************************************************************************************/
/* Get theme options value*/
/************************************************************************************************************/

function get_option_value( $id ) {
	if ( function_exists( 'get_field' ) ):
		$val = get_field( $id, 'option' );
	endif;

	return $val;
}

/************************************************************************************************************/
/* Removed a custom theme options */
/************************************************************************************************************/

function parasoft_theme_customize_register( $wp_customize ) {
	$wp_customize->remove_section( "colors" );
	$wp_customize->remove_section( "background_image" );
	$wp_customize->remove_section( "header_image" );
}

add_action( 'customize_register', 'parasoft_theme_customize_register' );

function remove_unnecessary_wordpress_menus() {
	global $submenu;

	if ( isset( $submenu['themes.php'] ) ):
		foreach ( $submenu['themes.php'] as $menu_index => $theme_menu ) {
			if ( $theme_menu[0] == 'Header' || $theme_menu[0] == 'Background' ) {
				unset( $submenu['themes.php'][ $menu_index ] );
			}
		}
	endif;
}

add_action( 'admin_menu', 'remove_unnecessary_wordpress_menus', 999 );

/************************************************************************************************************/
/* Filter For when shortcode which is not work on widget_text */
/************************************************************************************************************/

add_filter( 'widget_text', 'do_shortcode', 11 );

/************************************************************************************************************/
/* Active class for menu listing */
/************************************************************************************************************/

function special_nav_class( $menu ) {
	global $post;

	if ( get_post_type( $post ) == 'white_paper' ) {
		$menu = str_replace( 'current_page_item', '', $menu ); // remove all current_page_parent classes
		$menu = str_replace( 'menu-item-240', 'menu-item-240 current_page_item', $menu ); // add the current_page_parent class to the page you want
	}

	return $menu;
}

add_filter( 'nav_menu_css_class', 'special_nav_class', 10, 2 );

/************************************************************************************************************/
/* Add image class on post content */
/************************************************************************************************************/

function add_image_class( $class ) {
	$class .= ' img-responsive';

	return $class;
}

add_filter( 'get_image_tag_class', 'add_image_class' );

/************************************************************************************************************/
/* Add class on menu */
/************************************************************************************************************/

function wpb_first_and_last_menu_class( $items ) {
	$items[1]->classes[] = 'menu-item-first';

	$item_count = count( $items );

	for ( $i = $item_count; $i >= 0; $i-- ) {
		if ( $items[ $i ]->menu_item_parent == 0 ) {
			$items[ $i ]->classes[] = 'menu-item-last';
			break;
		}
	}

	return $items;
}

//add_filter('wp_nav_menu_objects', 'wpb_first_and_last_menu_class');

/************************************************************************************************************/
/* Attach our function to the wp_pagenavi html filter */
/************************************************************************************************************/

//add_filter('wp_pagenavi', 'ik_pagination', 10, 2);

function ik_pagination( $html ) {
	$out = '';
	$out = str_replace( "<div", "", $html );
	$out = str_replace( " class='wp-pagenavi' role='navigation'>", "", $out );
	$out = str_replace( "<a", "<li><a", $out );
	$out = str_replace( "</a>", "</a></li>", $out );
	$out = str_replace( "<span", "<li><span", $out );
	$out = str_replace( "</span>", "</span></li>", $out );
	$out = str_replace( "</div>", "", $out );

	return '<nav aria-label="Page navigation"><ul class="pagination">' . $out . '</ul></nav>';
}

/************************************************************************************************************/
/* Excerpt Content length */
/************************************************************************************************************/

function custom_excerpt_length( $length ) {
	return 35;
}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/************************************************************************************************************/
/* Word / Character / Paragraph  limit */
/************************************************************************************************************/

function string_limit_words( $string, $word_limit ) {
	$words = explode( ' ', $string, ( $word_limit + 1 ) );

	if ( count( $words ) > $word_limit ) {
		array_pop( $words );
	}

	return implode( ' ', $words );
}

if ( ! function_exists( 'string_limit_character' ) ) {
	function string_limit_character( $string, $limit ) {
		$title_length = strlen( $string );

		if ( $title_length > $limit && ( $title_length + 2 ) > $limit ):
			/*new code for get string with word*/ $s = substr( $string, 0, $limit );

			$string = substr( $s, 0, strrpos( $s, ' ' ) );
			//$string = substr($string, 0, $limit - 1);
			$string = rtrim( $string ) . '...';
		endif;

		return $string;
	}
}

function get_content_paragraphs( $content, $number = 1 ) {
	//$text = $content;
	if ( ! empty( $content ) ) {
		$text = "";

		$data = explode( '</p>', $content );

		if ( isset( $data ) && ! empty( $data ) ):
			if ( ! empty( $number ) ) {
				for ( $i = 0; $i < $number; $i++ ) {
					$text .= $data[ $i ];
				}
			}
		endif;
	}

	return wpautop( strip_shortcodes( $text ) );
}

/************************************************************************************************************/
/* Get IDs Based on template name */
/************************************************************************************************************/

function get_page_template_ids( $templatename ) {
	$ids  = array();
	$args = array(
		'post_type'  => 'page',
		'meta_query' => array(
			array(
				'key'     => '_wp_page_template',
				'value'   => $templatename,
				'compare' => '=',
			),
		),
	);

	$pages = get_posts( $args );

	if ( isset( $pages ) ):
		foreach ( $pages as $p ): setup_postdata( $p );
			$ids[] = $p->ID;
		endforeach;
	endif;

	return $ids;
}

/************************************************************************************************************/
/* Replaces the excerpt "Read More" text by a link */
/************************************************************************************************************/

function new_excerpt_more( $more ) {
	return '...';
}

add_filter( 'excerpt_more', 'new_excerpt_more' );

function remove_max_srcset_image_width( $max_width ) {
	return true;
}

add_filter( 'max_srcset_image_width', 'remove_max_srcset_image_width' );

add_filter( 'wp_get_attachment_image_attributes', function ( $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		unset( $attr['sizes'] );
	}

	if ( isset( $attr['srcset'] ) ) {
		unset( $attr['srcset'] );
	}

	if ( isset( $attr['class'] ) ):
		$attr['class'] .= ' img-responsive';
	endif;

	return $attr;
}, PHP_INT_MAX );

add_filter( 'wp_calculate_image_sizes', '__return_false', PHP_INT_MAX );
add_filter( 'wp_calculate_image_srcset', '__return_false', PHP_INT_MAX );

remove_filter( 'the_content', 'wp_make_content_images_responsive' );

/************************************************************************************************************/
/* Set Menu Title When title attribute is empty*/
/************************************************************************************************************/

function title_wp_setup_nav_menu_item( $menu_item ) {
	if ( empty( $menu_item->attr_title ) ):
		$menu_item->attr_title = $menu_item->title;
	endif;

	return $menu_item;
}

add_filter( 'wp_setup_nav_menu_item', 'title_wp_setup_nav_menu_item' );

/************************************************************************************************************/
/* Filter the_content replace b tag to strong tag in html view */
/************************************************************************************************************/

function change_b_to_strong( $content ) {
	$content1 = str_replace( '<b>', '<strong>', $content );
	$content  = str_replace( '</b>', '</strong>', $content1 );

	return $content;
}

add_filter( 'the_content', 'change_b_to_strong', 20 );

/************************************************************************************************************/
/* Archive List Limit
/************************************************************************************************************/

function widget_limit_archives( $args ) {
	$args['limit'] = 6;

	return $args;
}

//add_filter('widget_archives_args', 'widget_limit_archives');

/************************************************************************************************************/
/* Add Favicons to header using custom paths */
/************************************************************************************************************/
add_filter( 'get_site_icon_url', 'custom_get_site_icon_url', 10, 3 );
function custom_get_site_icon_url( $url, $size, $blog_id ) {
	$favicon_icon = get_field( 'favicon_icon', 'option' );
	if ( isset( $favicon_icon ) && ! empty( $favicon_icon ) ):
		$url = esc_url( $favicon_icon );
	endif;

	return apply_filters( 'custom_get_site_icon_url', $url, $size, $blog_id );
}

/************************************************************************************************************/
/* Speed Optimization move js to footer */
/************************************************************************************************************/

function remove_head_scripts() {
	remove_action( 'wp_head', 'wp_print_scripts' );
	remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
	remove_action( 'wp_head', 'wp_enqueue_scripts', 1 );
	add_action( 'wp_footer', 'wp_print_scripts', 5 );
	add_action( 'wp_footer', 'wp_enqueue_scripts', 5 );
	add_action( 'wp_footer', 'wp_print_head_scripts', 5 );

}

//add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );

/************************************************************************************************************/
/* Remove JS/CSS version for Speed Optimization */
/************************************************************************************************************/

function _remove_script_version( $src ) {
	$parts = explode( '?ver', $src );

	return $parts[0];
}

add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

/*************************************************************************************************************/
/***************************** Custom theme related functions ************************************************/
/*************************************************************************************************************/

function seotitletag( $title ) {
	$tag = '';

	if ( ! empty( $title ) ):
		$string = preg_replace( '/<' . $tag . '[^>]*>/i', '', $title );
		$string = preg_replace( '/<\/' . $tag . '>/i', '', $title );
		$string = html_entity_decode( $string, ENT_COMPAT, 'UTF-8' );

		$title = sanitize_textarea_field( ucwords( $string ) );
	endif;

	return $title;
}

function seoalttag( $title ) {
	$tag = '';

	if ( ! empty( $title ) ):
		$string = preg_replace( '/<' . $tag . '[^>]*>/i', '', $title );
		$string = preg_replace( '/<\/' . $tag . '>/i', '', $title );
		$string = html_entity_decode( $string, ENT_COMPAT, 'UTF-8' );

		$title = sanitize_title( $string );
	endif;

	return $title;
}

/* Get Menu Title form backend using menu location */
function getmenu_name_bt_location( $menu_location ) {
	$locations = get_nav_menu_locations();
	$menu_id   = $locations[ $menu_location ];
	$menu_data = wp_get_nav_menu_object( $menu_id );

	return $menu_data->name;
}

/* Get text without image */

function custom_strip_image( $text ) {
	$text = preg_replace( "/<img[^>]+\>/i", "", $text );

	return $text;
}

function remove_p_tags( $string ) {
	return preg_replace( '#<p>\s*+(<br\s*/*>)?\s*</p>#i', ' ', $string );
}

function get_image_name( $image ) {
	$info       = pathinfo( $image );
	$image_name = basename( $image, '.' . $info['extension'] );

	return $image_name;
}

function partition( $list, $columns ) {
	$partition = array_chunk( $list, ceil( count( $list ) / $columns ) );

	return $partition;
}

function ifexists( $varname ) {
	return ( isset( $$varname ) ? $varname : null );
}

function debug( $varname ) {
	echo '<pre>';

	print_r( $varname );

	echo '</pre>';
}

function remove_http( $url ) {
	$disallowed = array( 'http://', 'https://' );

	foreach ( $disallowed as $d ) {
		if ( strpos( $url, $d ) === 0 ) {
			return str_replace( $d, '', $url );
		}
	}

	return $url;
}

/* Exclude current post from widget list */

function parasoft_exclude_current_post_from_widget( $args ) {
	if ( is_singular() && ! isset( $args['post__in'] ) ) {
		$args['post__not_in'] = array( get_the_ID() );
	}

	return $args;
}

add_filter( 'widget_posts_args', 'parasoft_exclude_current_post_from_widget' );

function parasoft_load_scripts() {
	$google_maps_api_key = get_option_value( 'google_maps_api_key' );

	if ( ! empty( $google_maps_api_key ) ):
		wp_dequeue_script( 'googlemapsplace' );
		wp_register_script( 'googlemaps', 'https://maps.googleapis.com/maps/api/js?key=' . $google_maps_api_key, null, null, true );
		wp_enqueue_script( 'googlemaps' );
	endif;
}

add_action( 'wp_enqueue_scripts', 'parasoft_load_scripts' );

function my_acf_init() {
	$google_maps_api_key = get_option_value( 'google_maps_api_key' );

	acf_update_setting( 'google_api_key', $google_maps_api_key );
}

add_action( 'acf/init', 'my_acf_init' );

/************************************************************************************************************/
/* Support add svg image in media */
/************************************************************************************************************/

function add_svg_to_upload_mimes( $upload_mimes ) {
	$upload_mimes['svg']  = 'image/svg+xml';
	$upload_mimes['svgz'] = 'image/svg+xml';

	return $upload_mimes;
}

add_filter( 'upload_mimes', 'add_svg_to_upload_mimes', 10, 1 );

/************************************************************************************************************/
/* Shortcode for add page / post thumbnail in content section */
/************************************************************************************************************/

function insert_post_thumbnail_into_content( $atts ) {
	extract( shortcode_atts( array(
		'size'           => 'post-thumbnail', // any of the possible post thumbnail sizes - defaults to 'thumbnail'
		'align'          => 'none', // any of the alignments 'left', 'right', 'center', 'none' - defaults to 'none'
		'class'          => '',
		'size_attribute' => 1,
	), $atts ) );

	global $post;

	if ( ! get_post_thumbnail_id( $post->ID ) ) {
		return false;
	} //no thumbnail found

	//alignment check
	if ( ! in_array( $align, array( 'left', 'right', 'center', 'none' ) ) ) {
		$align = 'none';
	}

	$align = 'align' . $align;

	if ( empty( $size ) ):
		$size = 'post-thumbnail';
	endif;

	//thumbnail size check
	if ( ! ( preg_match( '|array\((([ 0-9])+,([ 0-9])+)\)|', $size ) === 1 ) && ! in_array( $size, get_intermediate_image_sizes() ) ) {
		$size = $size;
	}

	if ( preg_match( '|array\((([ 0-9])+,([ 0-9])+)\)|', $size, $match ) === 1 ) {
		$sizewh = explode( ',', $match[1] );

		$size = array( trim( $sizewh[0] ), trim( $sizewh[1] ) );
	}

	//get the post thumbnail
	$thumbnail = get_the_post_thumbnail( $post->ID, $size, array(
		'title' => seotitletag( get_the_title( $post->ID ) ),
		'alt'   => seoalttag( get_the_title( $post->ID ) ),
		'class' => 'img-responsive',
	) );

	//integrate the alignment class
	$thumbnail = str_replace( 'class="', 'class="' . $align . ' ' . $class . ' ', $thumbnail ); //add alignment class

	if ( $size_attribute == 0 ) {
		$thumbnail = preg_replace( '/(width|height)="\d*"/', '', $thumbnail );
	}

	return $thumbnail;
}

add_shortcode( 'thumbnail', 'insert_post_thumbnail_into_content' );

function save_category_data( $post_id, $post, $update ) {
	$post_type = get_post_type( $post_id );
}

add_action( 'save_post', 'save_category_data', 10, 3 );

function phone_number_format( $number ) {
	// Allow only Digits, remove all other characters.
	$number = preg_replace( "/[^\d]/", "", $number );

	// get number length.
	$length = strlen( $number );

	// if number = 10
	if ( $length == 10 ) {
		$number = preg_replace( "/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $number );
	}

	return $number;
}

function get_link_data( $button_link ) {
	$linkdata = array();

	if ( isset( $button_link ) && ! empty( $button_link ) ):
		$linkdata['title']  = ! empty( $button_link['title'] ) ? $button_link['title'] : '';
		$linkdata['url']    = ! empty( $button_link['url'] ) ? $button_link['url'] : '#';
		$linkdata['target'] = ! empty( $button_link['target'] ) ? $button_link['target'] : '_self';
	else:
		$linkdata['title']  = '';
		$linkdata['url']    = '#';
		$linkdata['target'] = '_self';
	endif;

	return $linkdata;
}

function parasoft_theme_additional_body_classes( $classes ) {
	if ( is_user_logged_in() ):
		$classes[] = 'login_user';
	endif;

	return $classes;
}

//add_filter( 'body_class', 'parasoft_theme_additional_body_classes' );

function additional_active_item_classes( $classes = array(), $menu_item = false, $args ) {
	if ( 'primary' === $args->theme_location ) {
		if ( $menu_item->title == 'Recipes' && is_singular( 'recipes' ) ) {
			$classes[] = 'current-menu-item active';
		}

		if ( $menu_item->title == 'Our Values' && ( is_page( 'contact-us' ) || is_page( 'news' ) ) ) {
			$classes[] = 'current-menu-item active';
		}
	}

	return $classes;
}

//add_filter( 'nav_menu_css_class', 'additional_active_item_classes', 10, 4 );

/************************************************************************************************************/
/* Category based Template */
/************************************************************************************************************/

add_filter( 'single_template', function ( $t ) {
	foreach ( (array) get_the_category() as $cat ) {
		if ( file_exists( get_template_directory() . "/single-cat-{$cat->slug}.php" ) ) {
			return get_template_directory() . "/single-cat-{$cat->slug}.php";
		}
	}

	return $t;
} );

add_action( 'template_redirect', 'se219663_template_redirect' );

function se219663_template_redirect() {
	global $wp_rewrite;

	if ( is_search() && ! empty ( $_GET['s'] ) ) {
		//$location .= user_trailingslashit( urlencode( $s ) );
		//$location  = home_url( $location );

		//wp_safe_redirect( $location, 301 );

		//exit;
	}
}

/* [cbtn label="" class="" url =""] */

function cbtn_shortcode( $atts ) {
	extract( shortcode_atts( array(
		'label'  => null,
		'class'  => 'csbutton',
		'id'     => '',
		'url'    => null,
		'target' => '',
	), $atts ) );

	ob_start();

	?><?php if ( ! empty( $label ) ): ?><a
		title="<?php echo seotitletag( $label ); ?>" <?php echo ! empty( $id ) ? 'id="' . $id . '"' : ''; ?>
		class="<?php echo $class; ?>" href="<?php echo esc_url( $url ); ?>"<?php echo ! empty( $target ) ? ' target="' . $target . '"' : ''; ?>><?php echo $label; ?></a><?php endif; ?>

	<?php return ob_get_clean();
}

add_shortcode( 'cbtn', 'cbtn_shortcode' );

/* Admin button code */

function enqueue_plugin_scripts( $plugin_array ) {
	if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
		$plugin_array['listbuttons_button_plugin'] = get_template_directory_uri() . '/js/buttons.js';

		return $plugin_array;
	}
}

//add_filter("mce_external_plugins", "enqueue_plugin_scripts");

function register_buttons_editor( $buttons ) {
	array_push( $buttons, 'listbuttons' );

	return $buttons;
}

add_filter( "mce_buttons", "register_buttons_editor" );

function shortcode_button_script() {
	if ( wp_script_is( 'quicktags' ) ) {
		?>
		<script type="text/javascript">
			QTags.addButton('list_buttons_shortcode', 'Add Button', callback);

			function callback() {
				QTags.insertContent('[cbtn label="Example button" class="button" url ="#" target="_blank"]');
			}
		</script>
		<?php
	}
}

add_action( "admin_print_footer_scripts", "shortcode_button_script" );

/*remove admin bar*/

//add_filter('show_admin_bar', '__return_false');

/*Color Picker Custom color list*/

function my_acf_input_admin_footer() {
	?>
	<script type="text/javascript">
		(function ($) {
			acf.add_filter('color_picker_args', function (args, $field) {
				args.palettes = ['#cd5257', '#f47b50', '#fcc062', '#82bd47', '#34a86a', '#06bffc', '#338dc9', '#8356a8', '#dd437b'];

				return args;
			});
		})(jQuery);
	</script>
	<?php
}

add_action( 'acf/input/admin_footer', 'my_acf_input_admin_footer' );

add_filter( 'tiny_mce_before_init', 'custom_mce_before_init' );

function custom_mce_before_init( $settings ) {
	$style_formats = array(
		array(
			'title'    => 'Button',
			'selector' => 'a',
			'classes'  => 'button',
		),
	);

	$settings['style_formats'] = json_encode( $style_formats );

	return $settings;
}

// Callback function to insert 'styleselect' into the $buttons array

function my_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );

	return $buttons;
}

add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

function parasoft_excerpt_label( $translation, $original ) {
	if ( false !== strpos( $original, 'Excerpts are optional hand-crafted summaries of your' ) ) {
		return __( 'This will replace the summary text in the listings.' );
	}

	return $translation;

}

add_filter( 'gettext', 'parasoft_excerpt_label', 10, 2 );

/*Fix wordpress post create when not enter title & content*/

add_filter( 'pre_post_title', 'wpse28021_mask_empty' );
add_filter( 'pre_post_content', 'wpse28021_mask_empty' );

function wpse28021_mask_empty( $value ) {
	if ( empty( $value ) ) {
		return ' ';
	}

	return $value;
}

add_filter( 'wp_insert_post_data', 'wpse28021_unmask_empty' );

function wpse28021_unmask_empty( $data ) {
	if ( ' ' == $data['post_title'] ) {
		$data['post_title'] = '';
	}

	if ( ' ' == $data['post_content'] ) {
		$data['post_content'] = '';
	}

	return $data;
}

function filter_function_name( $query_args, $sfid ) {
	if ( $sfid == 22332 ) {
		$query_args['s'] = get_search_query();
	}

	return $query_args;
}

//add_filter( 'sf_edit_query_args', 'filter_function_name', 20, 2 );

add_filter( 'oembed_dataparse', 'youtube_force_rel', 10, 3 );

function youtube_force_rel( $return, $data, $url ) {
	if ( $data->provider_name == 'YouTube' ) {
		return str_replace( 'feature=oembed', 'feature=oembed&rel=0&modestbranding=1&autohide=1&showinfo=0&controls=1', $return );
	} else {
		return $return;
	}
}

function custom_scripts() {
	wp_localize_script( 'foundation', 'ajax_custom_data', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'siteurl' => site_url(),
	) );
}

add_action( 'wp_enqueue_scripts', 'custom_scripts' );

/*modify the path to the icons directory */

add_filter( 'acf_icon_path_suffix', function ( $path_suffix ) {
	return '/dist/assets/images/icons/'; // After assets folder you can define folder structure
} );

// modify the URL to the icons directory to display on the page

add_filter( 'acf_icon_url', function ( $path_suffix ) {
	return get_stylesheet_directory_uri();
} );

function get_the_svg( $filename ) {
	if ( ! empty( $filename ) ):
		$path = get_template_directory_uri() . '/dist/assets/images/icons/' . $filename . '.svg';

		return $path;
	endif;
}

/* Remove current item from breadcrumb */

add_action( 'bcn_after_fill', 'bcnext_remove_current_item' );

function bcnext_remove_current_item( $trail ) {
	if ( is_singular( array( 'post' ) ) ):
		if ( isset( $trail->breadcrumbs[0] ) && $trail->breadcrumbs[0] instanceof bcn_breadcrumb ) {
			$types = $trail->breadcrumbs[0]->get_types();

			//Make sure we have a type and it is a current-item
			if ( is_array( $types ) && in_array( 'current-item', $types ) ) {
				//Shift the current item off the front
				array_shift( $trail->breadcrumbs );
			}
		}
	endif;
}

/* Related Services */
function my_relationship_query( $args, $field, $post_id ) {
	$page = get_page_by_path( 'services' );

	if ( isset( $page ) && ! empty( $page ) ):
		$args['post_parent'] = $page->ID;
	endif;

	return $args;
}

add_filter( 'acf/fields/relationship/query/name=related_services', 'my_relationship_query', 10, 3 );

function change_page_menu_classes( $menu ) {
	global $post;

	if ( get_post_type( $post ) == 'destinations' ) {
		$menu = str_replace( 'current-menu-item', '', $menu ); // remove all current_page_parent classes
		$menu = str_replace( 'menu-item-27', 'menu-item-27 current-menu-item', $menu ); // add the current_page_parent class to the page you want
	}

	if ( get_post_type( $post ) == 'case_study' ) {
		$menu = str_replace( 'current-menu-item', '', $menu ); // remove all current_page_parent classes
		$menu = str_replace( 'menu-item-24', 'menu-item-24 current-menu-item', $menu ); // add the current_page_parent class to the page you want
	}

	if ( get_post_type( $post ) == 'team' ) {
		$menu = str_replace( 'current-menu-item', '', $menu ); // remove all current_page_parent classes
		$menu = str_replace( 'menu-item-22', 'menu-item-22 current-menu-item', $menu ); // add the current_page_parent class to the page you want
		$menu = str_replace( 'menu-item-1058', 'menu-item-1058 current-menu-item', $menu ); // add the current_page_parent class to the page you want
	}

	if ( get_post_type( $post ) == 'open_position' ) {
		$menu = str_replace( 'current-menu-item', '', $menu ); // remove all current_page_parent classes
		$menu = str_replace( 'menu-item-22', 'menu-item-22 current-menu-item', $menu ); // add the current_page_parent class to the page you want
	}

	if ( get_post_type( $post ) == 'news' ) {
		$menu = str_replace( 'current-menu-item', '', $menu ); // remove all current_page_parent classes
		$menu = str_replace( 'menu-item-22', 'menu-item-22 current-menu-item', $menu ); // add the current_page_parent class to the page you want
	}

	if ( get_post_type( $post ) == 'post' ) {
		$menu = str_replace( 'current-menu-item', '', $menu ); // remove all current_page_parent classes
		$menu = str_replace( 'menu-item-23', 'menu-item-23 current-menu-item', $menu ); // add the current_page_parent class to the page you want
	}

	return $menu;
}

add_filter( 'nav_menu_css_class', 'change_page_menu_classes', 10, 2 );

function print_menu_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array( 'name' => null, 'class' => null ), $atts ) );
	ob_start();
	//return wp_nav_menu( array( 'menu' => $name, 'menu_class' => 'myclass', 'echo' => false ) );
	global $wp_query, $post;

	$topcurrentpage = $post->ID;
	$level          = count( get_post_ancestors( $post->ID ) ) + 1;

	switch ( $level ) {
		case 1:
			$currentpage = $post->ID;
			break;
		case 2:
			$currentpage = $post->ID;
			break;
		case 3:
			$currentpage = $post->post_parent;
			break;
		case 4:
			$grandparent = get_post_ancestors( $topcurrentpage );

			$currentpage = $grandparent[1];
			break;
	}

	$currentpage;
	?>

	<ul>
		<?php
		if ( is_singular( 'case_study' ) ) {
			$currentpage = get_field( 'select_case_study_footer' );
			?>
			<li class="desination-active">
				<a href="<?php echo get_the_permalink( $currentpage ); ?>"><?php echo get_the_title( $currentpage ); ?></a>
			</li>
			<?php
		} elseif ( is_singular( 'team' ) ) {
			$currentpage = get_field( 'select_team_destination_footer' );
			?>
			<li class="desination-active">
				<a href="<?php echo get_the_permalink( $currentpage ); ?>"><?php echo get_the_title( $currentpage ); ?></a>
			</li>
		<?php } else { ?>
			<li class="desination-active">
				<a href="<?php echo get_the_permalink( $currentpage ); ?>"><?php echo get_the_title( $currentpage ); ?></a>
			</li>
		<?php } ?>

		<?php $defaults = array(
			'theme_location'  => '',
			'menu'            => $name,
			'container'       => '',
			'container_class' => '',
			'container_id'    => '',
			'menu_class'      => 'menu',
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '%3$s',
			'depth'           => 0,
			'walker'          => '',
		);
		wp_nav_menu( $defaults ); ?>
	</ul>

	<?php
	$out = ob_get_contents();
	if ( ob_get_contents() ) {
		ob_end_clean();
	}

	wp_reset_query();
	wp_reset_postdata();

	return $out;

}

add_shortcode( 'menu', 'print_menu_shortcode' );

/*----- Button shortcode ----*/
function fn_Button( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'href'   => '',
		'target' => 'self',
	), $atts ) );
	ob_start();

	$output .= '<div class="button-box button-shortcode"><a href="' . $href . '" class="btn green-btn" target="_' . $target . '">';
	$output .= do_shortcode( $content );
	$output .= '</a></div>';
	$out    = ob_get_contents();

	if ( ob_get_contents() ) {
		ob_end_clean();
	}

	return $output;
}

add_shortcode( 'SC_Button', 'fn_Button' );

function more_post_ajax() {
	$ppp  = ( isset( $_POST['ppp'] ) ) ? $_POST['ppp'] : 6;
	$page = ( isset( $_POST['pageNumber'] ) ) ? $_POST['pageNumber'] : 0;

	header( "Content-Type: text/html" );

	$args = array(
		'suppress_filters' => true,
		'post_type'        => 'patent',
		'posts_per_page'   => $ppp,
		'paged'            => $page,
	);

	$loop = new WP_Query( $args );

	$out = '';

	if ( $loop->have_posts() ) :
		while ( $loop->have_posts() ) : $loop->the_post();
			$out .= '<div class="patents-list">
                <h3>' . get_the_title() . '</h3>
                <p>' . get_the_content() . '</p>
         </div>';
		endwhile;
	endif;
	wp_reset_postdata();
	die( $out );
}

add_action( 'wp_ajax_nopriv_more_post_ajax', 'more_post_ajax' );
add_action( 'wp_ajax_more_post_ajax', 'more_post_ajax' );

/**
 * Move Yoast settings panel to bottom of page
 */

function yoast_to_bottom() {
	return 'low';
}

add_filter( 'wpseo_metabox_prio', 'yoast_to_bottom', 10, 1 );
