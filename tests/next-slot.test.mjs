// Checks the "next free slot" rules in assets/js/site.js without a browser.
// Run: node tests/next-slot.test.mjs
import assert from 'node:assert/strict';
import { readFileSync } from 'node:fs';
import vm from 'node:vm';

const source = readFileSync( new URL( '../assets/js/site.js', import.meta.url ), 'utf8' );
const context = { document: { querySelectorAll: () => [], querySelector: () => null }, Intl };
vm.createContext( context );
vm.runInContext( source, context );
const { nextSlot } = context.tidewaterPlumbing;

const MON = 1;
const SAT = 6;
const SUN = 0;
const at = ( h, m = 0 ) => h * 60 + m;

const cases = [
	// [ label, day, minutes, expected ]
	[ 'weekday morning: two hours ahead, rounded up to the half hour', MON, at( 9, 10 ), 'Today, 11:30 am' ],
	[ 'exact half hour stays put', MON, at( 9, 30 ), 'Today, 11:30 am' ],
	[ 'before opening: first slot of the day', MON, at( 5, 0 ), 'Today, 7:30 am' ],
	[ 'last slot of the day is 3:30 pm', MON, at( 13, 30 ), 'Today, 3:30 pm' ],
	[ 'too late today: tomorrow morning', MON, at( 13, 31 ), 'Tomorrow, 7:30 am' ],
	[ 'Saturday afternoon skips Sunday', SAT, at( 15, 0 ), 'Monday, 7:30 am' ],
	[ 'Sunday: Monday morning', SUN, at( 10, 0 ), 'Tomorrow, 7:30 am' ],
	[ 'late night rolls over correctly', MON, at( 23, 50 ), 'Tomorrow, 7:30 am' ],
	[ 'noon reads as pm', MON, at( 10, 0 ), 'Today, 12:00 pm' ],
];

for ( const [ label, day, minutes, expected ] of cases ) {
	assert.equal( nextSlot( day, minutes ), expected, label );
}

// Brisbane is UTC+10 all year (Queensland has no daylight saving).
const { brisbaneNow } = context.tidewaterPlumbing;
const clock = [
	[ 'November, midnight UTC', '2026-11-11T00:00:00Z', { day: 3, minutes: 600 } ],
	[ 'January, when Sydney is on daylight time', '2026-01-15T22:30:00Z', { day: 5, minutes: 510 } ],
	[ 'just before midnight in Brisbane', '2026-11-14T13:59:00Z', { day: 6, minutes: 1439 } ],
];

for ( const [ label, iso, expected ] of clock ) {
	assert.deepEqual( { ...brisbaneNow( new Date( iso ) ) }, expected, label );
}

console.log( `next-slot: ${ cases.length + clock.length } cases passed` );
