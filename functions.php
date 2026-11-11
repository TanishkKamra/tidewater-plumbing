<?php
/**
 * Tidewater Plumbing theme functions.
 *
 * @package tidewater-plumbing
 */

defined( 'ABSPATH' ) || exit;

/**
 * Load the theme stylesheet in the editor too, so blocks look the same there.
 */
function tidewater_plumbing_setup() {
	add_editor_style( 'style.css' );
}
add_action( 'after_setup_theme', 'tidewater_plumbing_setup' );

/**
 * Front-end stylesheet and the small script behind the slot board and demo form.
 */
function tidewater_plumbing_assets() {
	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'tidewater-plumbing', get_stylesheet_uri(), array(), $version );
	wp_enqueue_script(
		'tidewater-plumbing',
		get_theme_file_uri( 'assets/js/site.js' ),
		array(),
		$version,
		array(
			'strategy'  => 'defer',
			'in_footer' => true,
		)
	);
}
add_action( 'wp_enqueue_scripts', 'tidewater_plumbing_assets' );

/**
 * Preload the headline face and the body text face: the hero headline is the
 * largest paint on the home page.
 */
function tidewater_plumbing_preload_fonts() {
	foreach ( array( 'barlow-condensed-700.woff2', 'barlow-400.woff2' ) as $font ) {
		printf(
			'<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin>' . "\n",
			esc_url( get_theme_file_uri( 'assets/fonts/' . $font ) )
		);
	}
}
add_action( 'wp_head', 'tidewater_plumbing_preload_fonts', 1 );

/**
 * Pattern category for the theme's section patterns.
 */
function tidewater_plumbing_pattern_category() {
	register_block_pattern_category(
		'tidewater-plumbing',
		array( 'label' => __( 'Tidewater Plumbing', 'tidewater-plumbing' ) )
	);
}
add_action( 'init', 'tidewater_plumbing_pattern_category' );

/**
 * Theme images are not in the media library, so WordPress cannot pick loading
 * hints for them. The hero loads first; every other image waits until needed.
 *
 * @param string $html  Rendered image block.
 * @param array  $block Parsed block.
 * @return string
 */
function tidewater_plumbing_image_loading( $html, $block ) {
	$tags = new WP_HTML_Tag_Processor( $html );
	if ( ! $tags->next_tag( 'img' ) ) {
		return $html;
	}

	// Leave media-library images to WordPress's own loading heuristics.
	$src = $tags->get_attribute( 'src' );
	if ( ! is_string( $src ) || 0 !== strpos( $src, get_theme_file_uri( 'assets/images/' ) ) ) {
		return $html;
	}

	$class_name = isset( $block['attrs']['className'] ) ? $block['attrs']['className'] : '';
	if ( false !== strpos( $class_name, 'tw-hero-image' ) ) {
		$tags->set_attribute( 'fetchpriority', 'high' );
	} else {
		$tags->set_attribute( 'loading', 'lazy' );
		$tags->set_attribute( 'decoding', 'async' );
	}

	return $tags->get_updated_html();
}
add_filter( 'render_block_core/image', 'tidewater_plumbing_image_loading', 10, 2 );

// No emoji polyfill: the site uses none, and it saves a script on every page.
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
