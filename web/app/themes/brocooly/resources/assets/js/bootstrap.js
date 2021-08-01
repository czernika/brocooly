/**
 * --------------------------------------------------------------------------
 * Modernizr library
 * --------------------------------------------------------------------------
 */
import 'modernizr';

/**
 * --------------------------------------------------------------------------
 * Webfont-loader
 * --------------------------------------------------------------------------
 */
import '@js/icons.config';

/**
 * --------------------------------------------------------------------------
 * General code samples
 * --------------------------------------------------------------------------
 */
document.body.classList.remove('no-js');
const i = new Image();
i.onload = i.onerror = () => {
	document.body.classList.add(i.height === 1 ? 'webp' : 'no-webp');
};
i.src='data:image/webp;base64,UklGRhoAAABXRUJQVlA4TA0AAAAvAAAAEAcQERGIiP4HAA==';

document.documentElement.classList.replace('no-js', 'js');
