<?php
/**
 * Title: Home: questions
 * Slug: tidewater-plumbing/home-faq
 * Categories: tidewater-plumbing
 *
 * @package tidewater-plumbing
 */

$tidewater_plumbing_questions = array(
	array( 'How much is the callout fee?', '$95 during business hours, and it comes off the bill if you go ahead with the work. At night, on Sundays and on public holidays it’s $180.' ),
	array( 'Will I know the price before you start?', 'Yes. The plumber gives you one fixed price for the whole job after looking at it. If something unexpected turns up halfway, we stop and talk to you before doing anything extra.' ),
	array( 'Are your plumbers licensed?', 'Every plumber on the crew holds a QBCC licence for plumbing and drainage, and gas work is done by licensed gasfitters. Ask to see a licence card at the door; we’re happy to show it.' ),
	array( 'Do you work weekends?', 'Bookings run Monday to Saturday. Emergencies are covered every night, on Sundays and on public holidays, at the after-hours rate.' ),
	array( 'Which hot water brands do you fit?', 'Most major brands of electric, gas, heat pump and solar systems. We’ll recommend the one that suits your house and budget, and tell you why.' ),
);
?>
<!-- wp:group {"tagName":"section","anchor":"questions","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<section id="questions" class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"36%"} -->
<div class="wp-block-column" style="flex-basis:36%"><!-- wp:heading -->
<h2 class="wp-block-heading">Questions people ask</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"muted"} -->
<p class="has-muted-color has-text-color">Something else? Call <a href="tel:+61755500148">(07) 5550 0148</a> or email <a href="mailto:jobs@tidewater.example">jobs@tidewater.example</a>.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"tw-faq"} -->
<div class="wp-block-column tw-faq"><?php foreach ( $tidewater_plumbing_questions as $tidewater_plumbing_qa ) : ?><!-- wp:details -->
<details class="wp-block-details"><summary><?php echo esc_html( $tidewater_plumbing_qa[0] ); ?></summary><!-- wp:paragraph -->
<p><?php echo esc_html( $tidewater_plumbing_qa[1] ); ?></p>
<!-- /wp:paragraph --></details>
<!-- /wp:details --><?php endforeach; ?></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->
