<?php
/**
 * [LDM Custom] - Divi-Child-LDM Theme Functions
 *
 * @author Lentini Design and Marketing {@link https://lentinidesign.com}
 *
 * @version 1.0
 * @since 1.0 
 * @package ldm_custom
 */

/** Call parent theme's style sheet */
function my_theme_enqueue_styles() { 
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	/** LDM uncoment on sites that use MOBILE paralax */
	//wp_enqueue_script( 'ldm_divi_mobile_paralax', get_stylesheet_directory_uri() . '/ldm_divi_mobile_paralax.js', array(), '1.0.0', true );
	/** LDM uncoment on sites that use colapable MOBILE Menus */
	//wp_enqueue_script( 'ldm_divi_mobile_colapse', get_stylesheet_directory_uri() . '/ldm_divi_mobile_colapse.js', array(), '1.0.0', true );
    //wp_enqueue_style( 'ldm_divi_mobile_colapse', get_stylesheet_directory_uri() . '/ldm_divi_mobile_colapse.css', array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


/** Add your own functions here. You can also copy some of the theme functions into this file. 
 *  Wordpress will use those functions instead of the original functions then.
 */


/**
 *  [LDM] - WP behavior customizations - non-theme specific...
 */

/**
 * [LDM] SHORTCODES
 */
/** Allow shortcode processing in WP Menus, widgets, and excerpts */
add_filter('wp_nav_menu_items', 'do_shortcode');
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');
add_filter( 'the_excerpt', 'shortcode_unautop');
add_filter( 'the_excerpt', 'do_shortcode');

/** [year] - Add shortcode for current Year (for copyright) */
add_shortcode('year', function ( ) { return date('Y'); } );

/** [bloginfo show="name|..." filter="display|raw"] - Add shortcode to display bloginfo values (params optional, default shown) */
add_shortcode( 'bloginfo', function ( $atts ) {
    $args = shortcode_atts( array(
        'show' => 'name',
        'filter' => 'display',
    ), $atts );
    return get_bloginfo( $args['show'], $args['filter'] );
} );

/** [ldm_menu menu="name|id|slug" ...] - Add shortcode to show a named menu (e.g. in a footer) */
add_shortcode("ldm_menu", function ($atts, $content = null) {
	extract(shortcode_atts(array(  
		'menu'            => '', 
		'container'       => 'div',
		'container_class' => '', 
		'container_id'    => '', 
		'menu_class'      => 'ldm_menu',
		'menu_id'         => '',
		'echo'            => true,
    //'items_wrap'      => '', //'<ul id="%1$s" class="%2$s">%3$s</ul>',
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'depth'           => 0,
		'walker'          => '',
		'theme_location'  => ''),
		$atts));
 
	return wp_nav_menu( array( 
		'menu'            => $menu, 
		'container'       => $container, 
		'container_class' => $container_class, 
		'container_id'    => $container_id, 
		'menu_class'      => $menu_class, 
		'menu_id'         => $menu_id,
		'echo'            => false,
    //'items_wrap'      => $items_wrap,
		'fallback_cb'     => $fallback_cb,
		'before'          => $before,
		'after'           => $after,
		'link_before'     => $link_before,
		'link_after'      => $link_after,
		'depth'           => $depth,
		'walker'          => $walker,
		'theme_location'  => $theme_location)); 
} );

// Disables the block editor from managing widgets in the Gutenberg plugin. add_filter( 'gutenberg_use_widgets_block_editor', '__return_false', 100 ); 
function example_theme_support() {
    remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'example_theme_support' );

/** Disable coments completely
// Close comments on the front-end
function df_disable_comments_status() {return false;}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
//add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// Hide existing comments
function df_disable_comments_hide_existing_comments($comments) {$comments = array();return $comments;}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);
*/



/**
 *  [LDM] - Add DIVI theme specific customization below...
 */

/** 
 * Enable shortcodes in DIVI footer credtis 
 */

if ( ! function_exists( 'et_get_footer_credits' ) ) :
function et_get_footer_credits() {
	$original_footer_credits = et_get_original_footer_credits();

	$disable_custom_credits = et_get_option( 'disable_custom_footer_credits', false );

	if ( $disable_custom_credits ) {
		return '';
	}

	$credits_format = '<%2$s id="footer-info">%1$s</%2$s>';

	$footer_credits = do_shortcode( et_get_option( 'custom_footer_credits', '' ) );

	if ( '' === trim( $footer_credits ) ) {
		return et_get_safe_localization( sprintf( $credits_format, $original_footer_credits, 'p' ) );
	}

  return sprintf( $credits_format, $footer_credits, 'div' );
}
endif;

/** [LDM] add do_shortcode to add global footer setions above Divi default footer
add_action( 'et_after_main_content', function()
{ 
  //echo do_shortcode('[et_pb_section global_module="'.$id.'"][/et_pb_section]');
}, 10, 2 );
*/

/**
 * Shortcode to show Divi Library Items
 * USAGE: [show_divi_lib_item id="378"]
 * Hover over item in Divi Library to get the (post) ID
 */
function showmodule_shortcode($moduleid) {
  extract(shortcode_atts(array('id' =>'*'),$moduleid)); 
  return do_shortcode('[et_pb_section global_module="'.$id.'"][/et_pb_section]');
}
add_shortcode('show_divi_lib_item', 'showmodule_shortcode');


/** ALter DIvie 400 x 250 deffault blog grid image cropping (9999=no cropping) */
//add_filter( 'et_pb_blog_image_height', function($height) {return '9999';} );
//add_filter( 'et_pb_blog_image_width', ($width) {return '9999';} );

/** Allow uploading custom fonts */
//define('ALLOW_UNFILTERED_UPLOADS', true);

