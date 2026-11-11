<?php
/**
 * Title: Header
 * Slug: tidewater-plumbing/header
 * Categories: header
 * Block Types: core/template-part/header
 * Inserter: no
 *
 * @package tidewater-plumbing
 */

?>
<!-- wp:group {"align":"full","className":"tw-header","backgroundColor":"contrast","textColor":"surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull tw-header has-surface-color has-contrast-background-color has-text-color has-background"><!-- wp:group {"align":"wide","className":"tw-topbar","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}}},"fontSize":"small","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide tw-topbar has-small-font-size" style="padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10)"><!-- wp:paragraph {"className":"tw-hide-sm tw-live"} -->
<p class="tw-hide-sm tw-live">Emergency plumber on call tonight: burst pipes, gas leaks, no hot water</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"tw-topbar-call"} -->
<p class="tw-topbar-call"><a href="tel:+61755500148">24/7: (07) 5550 0148</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","className":"tw-masthead","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide tw-masthead" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:site-title {"level":0} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:navigation {"overlayMenu":"mobile","overlayBackgroundColor":"contrast","overlayTextColor":"surface","className":"tw-nav","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","justifyContent":"right"}} -->
<!-- wp:navigation-link {"label":"Services","url":"<?php echo esc_url( home_url( '/#services' ) ); ?>","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Hot water","url":"<?php echo esc_url( home_url( '/hot-water/' ) ); ?>","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Service area","url":"<?php echo esc_url( home_url( '/#service-area' ) ); ?>","kind":"custom","isTopLevelLink":true,"className":"tw-hide-md"} /-->

<!-- wp:navigation-link {"label":"Book a plumber","url":"<?php echo esc_url( home_url( '/book/' ) ); ?>","kind":"custom","className":"tw-nav-mobile","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Call (07) 5550 0148","url":"tel:+61755500148","kind":"custom","className":"tw-nav-mobile tw-nav-call","isTopLevelLink":true} /-->
<!-- /wp:navigation -->

<!-- wp:buttons {"className":"tw-header-cta"} -->
<div class="wp-block-buttons tw-header-cta"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/book/' ) ); ?>">Book a plumber</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
