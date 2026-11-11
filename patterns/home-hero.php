<?php
/**
 * Title: Home: hero
 * Slug: tidewater-plumbing/home-hero
 * Categories: tidewater-plumbing
 *
 * @package tidewater-plumbing
 */

?>
<!-- wp:group {"tagName":"section","align":"full","className":"tw-hero","backgroundColor":"contrast","textColor":"surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull tw-hero has-surface-color has-contrast-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"54%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:54%"><!-- wp:paragraph {"className":"tw-kicker","textColor":"steel","fontSize":"small"} -->
<p class="tw-kicker has-steel-color has-text-color has-small-font-size">Plumbers and gasfitters · Brisbane bayside</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Fixed today. Priced before we start.</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"tw-lead","fontSize":"medium"} -->
<p class="tw-lead has-medium-font-size">Licensed plumbers from Sandgate to Wellington Point. Call about a burst pipe at 2 am or book a dripping tap for Tuesday: either way, you get one fixed price before any work starts.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="tel:+61755500148">Call (07) 5550 0148</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/book/' ) ); ?>">Book online</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","className":"tw-hero-media"} -->
<div class="wp-block-column is-vertically-aligned-center tw-hero-media"><!-- wp:html -->
<div class="tw-dispatch">
	<p class="tw-dispatch-head"><span class="tw-dispatch-label">Dispatch</span> <span data-brisbane-now>Brisbane time</span></p>
	<p class="tw-dispatch-label">Next free booking</p>
	<p class="tw-dispatch-slot" data-next-slot>Call for times</p>
	<dl class="tw-dispatch-rows">
		<div><dt>Emergencies</dt><dd>24/7, every night</dd></div>
		<div><dt>Bookings</dt><dd>Mon–Sat, from 7:30 am</dd></div>
		<div><dt>Arrival</dt><dd>Two-hour window, by text</dd></div>
	</dl>
	<p class="tw-dispatch-link"><a href="<?php echo esc_url( home_url( '/book/' ) ); ?>">Book a visit</a></p>
</div>
<!-- /wp:html -->

<!-- wp:image {"aspectRatio":"4/5","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"tw-hero-image"} -->
<figure class="wp-block-image size-full tw-hero-image"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/hero.webp' ) ); ?>" alt="A plumber wearing a head torch checks a pipe fitting" style="aspect-ratio:4/5;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->
