# Tidewater Plumbing: design notes

Hand-off notes for the theme: what it is for, the tokens, each component and its states, and the reasons behind the main decisions.

## Brief

- **What:** the website of a small plumbing and gasfitting crew on Brisbane's bayside (fictional).
- **Who:** home owners and renters with a problem right now (a leak, a blocked drain, no hot water), plus people booking a non-urgent job.
- **One job:** get the visitor to call in an emergency, or book a visit when it can wait.
- **Mode:** Sell. **Size:** Light.
- **Trust in one line each:** we fix most jobs in one visit; we serve your suburb, with a typical arrival time; you get a fixed price before we start.

## Principles

1. The phone number is never more than a glance away: in the top bar, the hero, the mobile menu, the booking page and the footer.
2. Answer "when can you come?" before it is asked. The dispatch board shows the next free booking in Brisbane time.
3. Money up front. The callout fee and the "fixed price before we start" rule are stated plainly, not hidden in small print.
4. Instructions before sales in an emergency. "Leaking right now? Do this first" comes straight after the hero.
5. Talk like the plumber, not a call centre: short sentences, real suburbs, no superlatives, no invented reviews or numbers.

**Insight:** people arrive mid-problem and stressed. The look borrows from a dispatch board and a job ticket, the objects a trade business actually runs on, so the site feels like the business already has a plumber assigned.

## Direction

- **Material world:** the dispatch office: a graphite job board, yellow safety markings, job tickets on concrete.
- **Authored moment:** the next-free-booking slot flips in when the script fills it (0.24 s, once, only without a reduced-motion preference).
- **References (principles only, nothing copied):** ride-hailing ETA cards (one big answer, a small label, a few supporting rows), food-delivery order trackers (time-ordered steps with plain status words), local-services marketplaces (price and availability before the sales pitch).

## Tokens

All tokens live in `theme.json` and reach the CSS as `--wp--preset--*` and `--wp--custom--*` properties. `style.css` holds no raw colours, and its only raw lengths are 1 to 3 px hairlines, outline offsets and breakpoints.

### Colour

| Slug | Name | Hex | Use |
| --- | --- | --- | --- |
| `base` | Concrete | `#E9E7E2` | Page background |
| `surface` | White | `#FFFFFF` | Tickets, form, light sections |
| `line` | Line | `#CFCBC2` | Hairlines on light surfaces |
| `muted` | Slate | `#55585E` | Secondary text on light surfaces |
| `contrast` | Graphite | `#16181B` | Text, dark sections, focus ring on light |
| `graphite-2` | Graphite raised | `#22262B` | Dispatch board panel |
| `line-dark` | Line on graphite | `#3A3F46` | Hairlines on dark surfaces |
| `steel` | Steel | `#A9AEB5` | Secondary text on dark surfaces |
| `accent` | Safety yellow | `#F2C230` | Main buttons, the slot, focus ring on dark |
| `accent-light` | Yellow light | `#FFD24D` | Button hover |
| `accent-tint` | Yellow tint | `#F7E3A1` | The urgent "call instead" note |
| `alert` | Alert red | `#B3261E` | Reserved for error states |
| `field` | Field border | `#6B6F76` | Form field and chip borders |

Measured contrast (WCAG 2.2, `contrast.mjs`): graphite on concrete 14.39:1, slate on concrete 5.77:1, slate on white 7.13:1, white on graphite 17.79:1, steel on graphite 7.97:1, steel on graphite raised 6.82:1, yellow on graphite 10.62:1, yellow on graphite raised 9.08:1, graphite on yellow 10.62:1, graphite on yellow tint 13.94:1, alert red on white 6.54:1, field border on white 5.05:1 (UI minimum 3:1).

### Type

- **Display:** Barlow Condensed 600 and 700, uppercase for h1 and h2.
- **Body:** Barlow 400, 500 and 600, line height 1.6.
- **Scale (fluid, min to max):** small 0.875rem; base 1 to 1.125rem; medium 1.125 to 1.375rem; large 1.5 to 2rem; x-large 2.125 to 3.25rem; xx-large 2.75 to 4.5rem; display 3.25 to 6.5rem.
- Tabular numerals on the dispatch board, tables and time chips, so times line up.

### Space, layout, radius

- **Spacing:** 10 = 0.5rem, 20 = 0.75rem, 30 = 1rem, 40 = 1.5rem, 50 = clamp(2rem, 4vw, 3rem), 60 = clamp(3rem, 6vw, 5rem), 70 = clamp(4rem, 9vw, 7.5rem). Inside a group uses 10 to 30; between sections uses 60 to 70.
- **Widths:** content 44rem, wide 80rem.
- **Radius:** `--wp--custom--radius` = 2px everywhere. Square corners suit tickets and signage.

### Motion

| Token | Value | Use |
| --- | --- | --- |
| `--wp--custom--duration--fast` | 0.15s | Chip background and border |
| `--wp--custom--duration--base` | 0.2s | Buttons, link underline, FAQ plus sign |
| `--wp--custom--duration--flip` | 0.24s | The slot flip |
| `--wp--custom--ease--flip` | cubic-bezier(0.2, 0.7, 0.2, 1) | The slot flip |

With `prefers-reduced-motion: reduce`, smooth scrolling is off, the flip never runs, every transition is cut to 0.01ms and buttons no longer shift when pressed.

## Components

| Component | Where | States | When to use |
| --- | --- | --- | --- |
| Button (yellow fill) | Hero, header, page CTAs | Hover (lighter yellow), focus ring, pressed (moves down 1px) | The one main action of a section |
| Button (outline) | Next to the main button | Hover, focus ring, pressed; white on graphite, graphite on yellow | The second choice, such as "Book online" beside "Call" |
| Dispatch board | Home hero; mini version on Book | Without JS: "Call for times"; live: the slot flips in; reduced motion: no flip | Only where "when can you come?" is the question |
| Job ticket | Services grid | Static; optional "More about…" link with hover and focus | Lists of jobs or services |
| Step cards and numbered steps | Emergency band, How it works, Hot water checks | Static | Ordered instructions |
| Tick list | Hot water, the crew | Static; square markers, yellow on dark sections | Short lists of facts |
| Board table and light table | Service area; hot water swap times | Static; the last column never wraps | Two-column lookups (place and time, system and time) |
| FAQ | Questions | Closed, open (the plus turns into a cross), focus ring | Short answers people ask before calling |
| Form field | Booking form | Default, focus ring, required (native validation message) | Every text, phone, email, select and textarea input |
| Chip (radio) | Booking form | Default, hover, checked (yellow fill), keyboard focus (ring on the chip) | Picking one short option |
| Urgent note | Booking form | Hidden, then shown and announced when "leaking: yes" is picked | Redirecting an emergency away from the booking form |
| Form status | Booking form | Empty: visually hidden but kept for screen readers; after submit, a thank-you line announced by `role="status"` | Confirming the request |
| Header and mobile menu | Every page | Desktop: links with yellow underline on hover; mobile: full-screen menu with a yellow call link last | Site navigation |

## Decisions and reasons

- **Graphite and safety yellow,** not the usual plumber blue: it reads as "trade" at thumbnail size and gives the call button the strongest contrast on the page.
- **The board computes the slot in the browser,** so a cached page never shows a stale time. Brisbane has no daylight saving, and `Intl` handles the time zone.
- **The hero's call button comes before the booking button:** an emergency visitor should not have to choose.
- **The yellow "Book a plumber" button stays in the header down to 600 px.** From 600 to 781 px the "Service area" link gives way to it, so the header holds one line with a booking route at every width. Below 600 px the menu overlay carries both Book and Call.
- **The footer's four columns pair up two by two from 782 to 1279 px.** Below 1280 px a quarter of the row is narrower than the email address, so it would wrap; two by two keeps every link on one line.
- **The service-area table shows typical night and weekend arrival times with "not a promise",** honest framing a real business could stand behind.
- **No reviews, ratings, logos or counts:** none exist for a fictional business, and inventing them would undercut the trust the site is built on.

## Edge cases handled

- No JavaScript: the slot reads "Call for times" and the form still validates natively.
- A visitor in another time zone sees Brisbane times, with the current Brisbane time beside them.
- Sunday and after 1:30 pm (when the two-hour lead runs past 3:30 pm): the slot moves to the next working day at 7:30 am.
- Long suburb lists wrap inside the area column; arrival times never wrap.
- At 375 px nothing scrolls sideways; at 768 px the nav fits on one line.

## Post-launch plan

| Goal | Success metric | How to measure |
| --- | --- | --- |
| More emergency calls | Taps on `tel:` links per 100 visits | Analytics event on every `tel:` link, split by location (top bar, hero, menu, booking page, footer) |
| More booked visits | Booking form completion rate | Form plugin entries divided by visits to /book/ |
| Fewer wasted bookings | Share of form bookings that turn out to be emergencies | Dispatcher tags in the job system; the "leaking: yes" note should keep this low |
| Fewer "do you come to my suburb?" calls | Calls asking about coverage, per week | Dispatcher tally for two weeks before and after launch |

Review the numbers 2 weeks, 6 weeks and 3 months after launch. Change one thing at a time, such as the hero copy or the order of the call and book buttons.
