/**
 * --------------------------------------------------------------------------
 * Lazy load images
 * --------------------------------------------------------------------------
 *
 * We will use lozad.js library for lazy loading
 *
 * @see https://github.com/ApoorvSaxena/lozad.js
 */

import lozad from 'lozad';

const imgSelector = 'img'; // this is the default selector.

lozad(imgSelector, {
	load: (el) => {
		el.src = el.dataset.src;
		el.onload = () => {
			el.classList.remove('blur');
		}
	}
}).observe();
