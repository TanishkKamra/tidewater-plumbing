<?php
/**
 * Demo setup for WordPress Playground. Not loaded by the theme.
 *
 * The blueprint runs this once: it names the site, turns on pretty permalinks,
 * removes the default sample content and creates the two inner pages.
 *
 * @package tidewater-plumbing
 */

defined( 'ABSPATH' ) || exit;

update_option( 'blogname', 'Tidewater Plumbing' );
update_option( 'blogdescription', 'Plumbers and gasfitters for Brisbane’s bayside' );

// Through $wp_rewrite, not update_option(), so the flush below builds rules for
// the new structure. Otherwise unknown URLs fall through to the home page, not 404.
global $wp_rewrite;
$wp_rewrite->set_permalink_structure( '/%postname%/' );

foreach ( array( 'hello-world' => 'post', 'sample-page' => 'page' ) as $tidewater_plumbing_slug => $tidewater_plumbing_type ) {
	$tidewater_plumbing_default = get_page_by_path( $tidewater_plumbing_slug, OBJECT, $tidewater_plumbing_type );
	if ( $tidewater_plumbing_default ) {
		wp_delete_post( $tidewater_plumbing_default->ID, true );
	}
}

$tidewater_plumbing_pages = array(
	'hot-water' => array( 'Hot water', 'tidewater-plumbing/page-hot-water' ),
	'book'      => array( 'Book a plumber', 'tidewater-plumbing/page-book' ),
);

foreach ( $tidewater_plumbing_pages as $tidewater_plumbing_slug => $tidewater_plumbing_page ) {
	if ( get_page_by_path( $tidewater_plumbing_slug ) ) {
		continue;
	}
	wp_insert_post(
		array(
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_name'    => $tidewater_plumbing_slug,
			'post_title'   => $tidewater_plumbing_page[0],
			'post_content' => '<!-- wp:pattern {"slug":"' . $tidewater_plumbing_page[1] . '"} /-->',
			'meta_input'   => array( '_wp_page_template' => 'page-landing' ),
		)
	);
}

flush_rewrite_rules();
