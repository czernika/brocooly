<?php
/**
 * Mailer configuration
 *
 * @package Brocooly
 * @since 0.15.0
 */

use Timber\Site;

use function Env\env;

return [

	/**
	 * -------------------------------------------------------------------------
	 * Default mailer
	 * -------------------------------------------------------------------------
	 *
	 * Define mailer to send emails
	 */
	'default' => env( 'MAIL_MAILER' ) ?? 'wordpress',

	/**
	 * -------------------------------------------------------------------------
	 * List of all available mailers
	 * -------------------------------------------------------------------------
	 *
	 * Currently only WordPress default and SMTP supported
	 */
	'mailers' => [

		'wordpress' => [
			'transport' => 'wordpress',
		],

		'smtp'      => [
			'transport'  => 'smtp',
			'host'       => env( 'MAIL_HOST' ),
			'port'       => env( 'MAIL_PORT' ),
			'username'   => env( 'MAIL_USERNAME' ),
			'password'   => env( 'MAIL_PASSWORD' ),
			'encryption' => env( 'MAIL_ENCRYPTION' ),
		],

	],

	/**
	 * -------------------------------------------------------------------------
	 * Specify sender information
	 * -------------------------------------------------------------------------
	 *
	 * Like name and email address (like <no-reply>)
	 */
	'from'    => [
		'name'    => env( 'MAIL_FROM_NAME' ) ?? app( Site::class )->name,
		'address' => env( 'MAIL_FROM_ADDRESS' ) ?? get_option( 'admin_email' ),
	],

];
