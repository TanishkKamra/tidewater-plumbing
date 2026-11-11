<?php
/**
 * Title: Home: services
 * Slug: tidewater-plumbing/home-services
 * Categories: tidewater-plumbing
 *
 * @package tidewater-plumbing
 */

$tidewater_plumbing_jobs = array(
	array( 'Burst pipes and leaks', 'Copper, poly or PVC, in the wall or under the slab. We find the leak, stop it, and show you photos of what failed.', '' ),
	array( 'Blocked drains', 'Sinks, showers, toilets and sewer lines. We clear the blockage, then run a camera down the line so you know why it happened.', '' ),
	array( 'Hot water systems', 'No hot water, a leaking tank or a tripping switch. Most faults are fixed on the spot, and most electric and gas units can be swapped the same day.', '/hot-water/' ),
	array( 'Gas fitting', 'Leak checks, cooktops, heaters and bayonet points, done by licensed gasfitters with the paperwork Queensland requires.', '' ),
	array( 'Toilets and taps', 'Running cisterns, dripping taps, leaking mixers and new toilet suites. No job is too small to book.', '' ),
	array( 'Roof and stormwater', 'Gutters, downpipes and stormwater drains that overflow in a storm. Worth a look before the wet season starts.', '' ),
);
?>
<!-- wp:group {"tagName":"section","anchor":"services","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<section id="services" class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:group {"align":"wide","className":"tw-section-head","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group alignwide tw-section-head"><!-- wp:heading -->
<h2 class="wp-block-heading">Most jobs, one visit.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"tw-section-intro","textColor":"muted"} -->
<p class="tw-section-intro has-muted-color has-text-color">The vans carry the common parts, so most repairs are finished the first time. If we do need to order something, you’ll know before we leave, with a date.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"var:preset|spacing|50"}}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"17rem"}} -->
<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--50)"><?php foreach ( $tidewater_plumbing_jobs as $tidewater_plumbing_index => $tidewater_plumbing_job ) : ?><!-- wp:group {"className":"tw-ticket","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
<div class="wp-block-group tw-ticket"><!-- wp:paragraph {"className":"tw-ticket-no"} -->
<p class="tw-ticket-no"><?php echo esc_html( sprintf( 'Job %02d', $tidewater_plumbing_index + 1 ) ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php echo esc_html( $tidewater_plumbing_job[0] ); ?></h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php echo esc_html( $tidewater_plumbing_job[1] ); ?></p>
<!-- /wp:paragraph --><?php if ( $tidewater_plumbing_job[2] ) : ?>

<!-- wp:paragraph {"className":"tw-more"} -->
<p class="tw-more"><a href="<?php echo esc_url( home_url( $tidewater_plumbing_job[2] ) ); ?>">More about hot water</a></p>
<!-- /wp:paragraph --><?php endif; ?></div>
<!-- /wp:group --><?php endforeach; ?></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
