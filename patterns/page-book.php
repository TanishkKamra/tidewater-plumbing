<?php
/**
 * Title: Page: book a plumber
 * Slug: tidewater-plumbing/page-book
 * Categories: tidewater-plumbing
 * Post Types: page
 *
 * @package tidewater-plumbing
 */

?>
<!-- wp:group {"tagName":"section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"40%"} -->
<div class="wp-block-column" style="flex-basis:40%"><!-- wp:heading {"level":1,"fontSize":"xx-large"} -->
<h1 class="wp-block-heading has-xx-large-font-size">Book a plumber</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"tw-lead","fontSize":"medium"} -->
<p class="tw-lead has-medium-font-size">Pick a time of day that suits you. The dispatcher texts back to confirm a two-hour arrival window, usually within 15 minutes in business hours.</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<div class="tw-dispatch tw-dispatch--mini">
	<p class="tw-dispatch-head"><span class="tw-dispatch-label">Next free booking</span> <span data-brisbane-now>Brisbane time</span></p>
	<p class="tw-dispatch-slot" data-next-slot>Call for times</p>
</div>
<!-- /wp:html -->

<!-- wp:group {"className":"tw-aside","layout":{"type":"default"}} -->
<div class="wp-block-group tw-aside"><!-- wp:paragraph -->
<p><strong>Water or gas leaking now?</strong> Don’t book here. Call <a href="tel:+61755500148">(07) 5550 0148</a>, any hour.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"muted"} -->
<p class="has-muted-color has-text-color">Photos help: text them to <a href="sms:+61491570156">0491 570 156</a> after you book, and the plumber will bring the right parts.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:html -->
<form class="tw-form" method="post" data-demo-form aria-describedby="tw-form-note">
	<div class="tw-field-row">
		<p class="tw-field"><label for="tw-name">Your name</label><input id="tw-name" name="name" type="text" autocomplete="name" required></p>
		<p class="tw-field"><label for="tw-phone">Mobile</label><input id="tw-phone" name="phone" type="tel" autocomplete="tel" required></p>
	</div>
	<div class="tw-field-row">
		<p class="tw-field"><label for="tw-suburb">Suburb</label><input id="tw-suburb" name="suburb" type="text" autocomplete="address-level2" required></p>
		<p class="tw-field"><label for="tw-email">Email <span class="tw-optional">(optional)</span></label><input id="tw-email" name="email" type="email" autocomplete="email"></p>
	</div>
	<p class="tw-field"><label for="tw-job">What’s the job?</label><select id="tw-job" name="job"><option>Leak or burst pipe</option><option>Blocked drain</option><option>Hot water</option><option>Gas fitting</option><option>Toilet or tap</option><option>Roof or stormwater</option><option>Something else</option></select></p>
	<fieldset class="tw-field">
		<legend>Is water or gas leaking right now?</legend>
		<div class="tw-chips">
			<label class="tw-chip"><input type="radio" name="leaking" value="no" checked> No</label>
			<label class="tw-chip"><input type="radio" name="leaking" value="yes"> Yes</label>
		</div>
	</fieldset>
	<div aria-live="polite">
		<p class="tw-urgent" data-urgent-note hidden><strong>Please call instead: <a href="tel:+61755500148">(07) 5550 0148</a>.</strong> A leak needs a plumber now, not a booking. If it’s water, turn it off at the meter while you wait.</p>
	</div>
	<fieldset class="tw-field">
		<legend>When suits you?</legend>
		<div class="tw-chips">
			<label class="tw-chip"><input type="radio" name="window" value="any" checked> Any time</label>
			<label class="tw-chip"><input type="radio" name="window" value="morning"> Morning <span>7:30–10:30</span></label>
			<label class="tw-chip"><input type="radio" name="window" value="midday"> Midday <span>10:30–1:30</span></label>
			<label class="tw-chip"><input type="radio" name="window" value="afternoon"> Afternoon <span>1:30–3:30</span></label>
		</div>
	</fieldset>
	<p class="tw-field"><label for="tw-notes">What’s happening? <span class="tw-optional">(optional)</span></label><textarea id="tw-notes" name="notes" rows="4"></textarea></p>
	<p><button type="submit" class="wp-element-button">Request a booking</button></p>
	<p class="tw-form-note" id="tw-form-note">This is a design sample, so the form doesn’t send anything.</p>
	<p class="tw-form-status" role="status"></p>
</form>
<!-- /wp:html --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->
