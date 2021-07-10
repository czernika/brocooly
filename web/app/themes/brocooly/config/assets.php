<?php

use function Env\env;

return [

	'autoload' => true,

	'public' => env( 'PUBLIC_FOLDER' ) ?? 'public',

	'manifest' => 'manifest.json',

	'excludeStyles' => [],

	'excludeScripts' => [],

];
