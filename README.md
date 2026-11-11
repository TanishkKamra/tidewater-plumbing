# Tidewater Plumbing: a custom WordPress block theme

A block theme for Tidewater Plumbing, a fictional plumbing and gasfitting business on Brisbane's bayside. It is a design sample by [Tanishk Kamra](https://tanishk.is-a.dev): the brief was a site for people who have a problem right now, so the phone number, the next free booking and the price of a callout are never more than a glance away.

**[Open the live demo in WordPress Playground](https://playground.wordpress.net/?blueprint-url=https://raw.githubusercontent.com/TanishkKamra/tidewater-plumbing/main/playground/blueprint.json)**. It runs a real WordPress site in your browser, with nothing to install. You are logged in as admin, so you can open the Site Editor and change anything.

## What is in the theme

- **Design system in `theme.json`.** Thirteen named colours, a fluid type scale, a seven-step spacing scale, radius and motion tokens, and two self-hosted font families (Barlow and Barlow Condensed). Default palettes and font sizes are switched off, so editors pick from the brand only.
- **A live dispatch board.** The hero shows the next free booking, worked out in Brisbane time whatever the visitor's time zone: on the half hour from 7:30 am to 3:30 pm, Monday to Saturday, at least two hours ahead. Without JavaScript it reads "Call for times".
- **Nine section patterns.** Hero, leaking right now, services, how it works, hot water, service area, the crew, questions and a call to action, plus two page patterns, a header, a footer and a back-to-home button. Each one opens in the editor as ordinary blocks with no validation warnings.
- **Templates.** Front page, a no-title landing page template, singular, index and 404, with header and footer template parts.
- **Two inner pages.** A hot water page with checks to try before calling, and a booking page with a demo form. The form uses native validation; answering "yes" to "Is water or gas leaking right now?" shows a "please call instead" note. On a live site it would post to the client's form plugin or a small REST endpoint.
- **Accessibility.** Landmarks and a skip link, a logical heading order, visible focus styles, labelled form fields with large tap targets, and motion that respects `prefers-reduced-motion`. axe finds no serious or critical issues.
- **Performance.** Seven WebP photos between 24 and 136 KB, the two most-used font files preloaded, the hero image fetched first and the rest lazy-loaded, one 4 KB script, and no jQuery or emoji script.

## Run it locally

You need Node.js (tested with Node 24).

```bash
npx @wp-playground/cli@latest server --login \
  --mount-dir . /wordpress/wp-content/themes/tidewater-plumbing \
  --blueprint=playground/blueprint.local.json
```

Then open http://127.0.0.1:9400. The blueprint activates the theme and runs `playground/setup.php`, which turns on pretty permalinks and creates the Hot water and Book a plumber pages.

## Test the booking rules

The next-free-booking logic in `assets/js/site.js` has its own check, with no browser needed:

```bash
node tests/next-slot.test.mjs
```

## Use it on a normal WordPress site

1. Copy this folder to `wp-content/themes/tidewater-plumbing` (WordPress 6.6 or later).
2. Activate it under Appearance, Themes.
3. Create pages with the slugs `hot-water` and `book`, choose the "Landing page (no title)" template, and insert the "Page: hot water" and "Page: book a plumber" patterns.

The booking form sits in a Custom HTML block. WordPress strips form fields from that block when a user without the `unfiltered_html` capability saves the page, which includes everyone except Super Admins on multisite. On those sites, have a Super Admin save the Book page, or swap the demo form for the client's form plugin.

## Structure

```
style.css          Theme header and the CSS that theme.json cannot express
theme.json         Colours, type, spacing, radius and motion tokens, block styles
functions.php      Assets, font preloads, pattern category, image loading hints
templates/         front-page, page-landing, singular, index, 404
parts/             header, footer
patterns/          Section and page patterns (PHP, so links follow the site URL)
assets/            Fonts, WebP images, the dispatch board and demo form script
tests/             Checks for the next-free-booking rules
playground/        Blueprints and the demo setup script
DESIGN.md          Design decisions, tokens, components and the post-launch plan
```

## Credits

Photos from Unsplash and fonts under the SIL Open Font License. See [CREDITS.md](CREDITS.md).

The business, the owner's name, the prices, the phone numbers and the suburbs' arrival times are all made up.
