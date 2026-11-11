/**
 * Tidewater Plumbing front-end script.
 *
 * 1. The "next free slot" board: works out the earliest bookable visit from
 *    the current time in Brisbane, whatever time zone the visitor is in.
 * 2. The demo booking form: this is a design sample, so nothing is sent.
 */

( () => {
	// Bookable visits start on the half hour from 7:30 am to 3:30 pm, Monday to
	// Saturday, at least two hours from now so a plumber can finish the job before.
	const SLOT_FIRST = 7 * 60 + 30;
	const SLOT_LAST = 15 * 60 + 30;
	const SLOT_LEAD = 120;
	const SLOT_STEP = 30;
	const DAY_NAMES = [ 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday' ];

	function formatTime( minutes ) {
		const hours = Math.floor( minutes / 60 ) % 24;
		const suffix = hours >= 12 ? 'pm' : 'am';
		return `${ hours % 12 || 12 }:${ String( minutes % 60 ).padStart( 2, '0' ) } ${ suffix }`;
	}

	/**
	 * @param {number} day     Day of the week in Brisbane, 0 = Sunday.
	 * @param {number} minutes Minutes since midnight in Brisbane.
	 * @return {string} For example "Today, 11:30 am" or "Monday, 7:30 am".
	 */
	function nextSlot( day, minutes ) {
		let start = Math.max( SLOT_FIRST, Math.ceil( ( minutes + SLOT_LEAD ) / SLOT_STEP ) * SLOT_STEP );
		let offset = 0;

		while ( ( day + offset ) % 7 === 0 || start > SLOT_LAST ) {
			offset += 1;
			start = SLOT_FIRST;
		}

		let label = DAY_NAMES[ ( day + offset ) % 7 ];
		if ( offset === 0 ) {
			label = 'Today';
		} else if ( offset === 1 ) {
			label = 'Tomorrow';
		}

		return `${ label }, ${ formatTime( start ) }`;
	}

	function brisbaneNow( date ) {
		const parts = new Intl.DateTimeFormat( 'en-US', {
			timeZone: 'Australia/Brisbane',
			weekday: 'short',
			hour: '2-digit',
			minute: '2-digit',
			hourCycle: 'h23',
		} ).formatToParts( date );
		const part = ( type ) => parts.find( ( item ) => item.type === type ).value;

		return {
			day: [ 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat' ].indexOf( part( 'weekday' ) ),
			minutes: Number( part( 'hour' ) ) * 60 + Number( part( 'minute' ) ),
		};
	}

	const slotTargets = document.querySelectorAll( '[data-next-slot]' );
	const clockTargets = document.querySelectorAll( '[data-brisbane-now]' );

	if ( slotTargets.length || clockTargets.length ) {
		const now = brisbaneNow( new Date() );
		slotTargets.forEach( ( target ) => {
			target.textContent = nextSlot( now.day, now.minutes );
			target.classList.add( 'is-live' );
		} );
		clockTargets.forEach( ( target ) => {
			target.textContent = `${ formatTime( now.minutes ) } in Brisbane now`;
		} );
	}

	/*
	 * Demo booking form. The browser's own validation runs first, so submit only
	 * fires on valid input. "Leaking right now?" reveals the call-us note.
	 */
	document.querySelectorAll( 'form[data-demo-form]' ).forEach( ( form ) => {
		const status = form.querySelector( '[role="status"]' );
		const urgentNote = form.querySelector( '[data-urgent-note]' );

		// Browsers can restore "yes" on reload or Back without firing change,
		// so the note follows the checked radio, not the last event.
		const syncUrgentNote = () => {
			if ( urgentNote ) {
				urgentNote.hidden = ! form.querySelector( 'input[name="leaking"][value="yes"]:checked' );
			}
		};

		syncUrgentNote();
		window.addEventListener( 'pageshow', syncUrgentNote );
		form.addEventListener( 'change', ( event ) => {
			if ( event.target.name === 'leaking' ) {
				syncUrgentNote();
			}
		} );

		form.addEventListener( 'submit', ( event ) => {
			event.preventDefault();

			const fullName = String( new FormData( form ).get( 'name' ) || '' ).trim();
			const firstName = fullName.split( /\s+/ )[ 0 ];

			if ( status ) {
				status.textContent =
					`Thanks${ firstName ? `, ${ firstName }` : '' }. This is a design sample, so nothing was sent. ` +
					'On a live site, the dispatcher would text you a two-hour arrival window.';
			}
			form.reset();
			syncUrgentNote();
		} );
	} );

	// Exposed only so tests/next-slot.test.mjs can check the slot rules.
	globalThis.tidewaterPlumbing = { nextSlot, brisbaneNow };
} )();
