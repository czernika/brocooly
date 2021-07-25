<?php
/**
 *
 */

use function Env\env;

return [
	'domain' => env( 'THEME' ) ?? 'brocooly',

	'path'   => get_template_directory() . '/public/language',
];
