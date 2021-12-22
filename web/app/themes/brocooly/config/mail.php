<?php
/**
 * Mailer configuration
 *
 * @package Brocooly
 * @since 0.15.0
 */

use Timber\Site;
use Brocooly\Support\Facades\Option;

use function Env\env;

return [

	/**
	 * -------------------------------------------------------------------------
	 * Default mailer
	 * -------------------------------------------------------------------------
	 *
	 * Your application will use this default mailer to send emails
	 */
	'default' => env( 'MAIL_MAILER' ) ?? 'mailhog',

	/**
	 * -------------------------------------------------------------------------
	 * List of all available mailers
	 * -------------------------------------------------------------------------
	 *
	 * Here you may specify all of the mailers used by application.
	 * WordPress by default includes PHPMailer library so we're use it via 'phpmailer_init' hook.
	 */
	'mailers' => [

		'wordpress' => [
			'transport' => 'wordpress',
		],

		/**
		 * Mailhog for Dev environment
		 * WebUI will be available under http://localhost:8025
		 */
		'mailhog'   => [
			'transport' => 'mailhog',
			'host'      => '127.0.0.1',
			'port'      => 1025,
		],

		/**
		 * SMTP
		 */
		'mailtrap'    => [
			'transport'  => 'smtp',
			'host'       => env( 'MAIL_HOST' ) ?? 'smtp.mailtrap.io',
			'port'       => env( 'MAIL_PORT' ) ?? 2525,
			'username'   => env( 'MAIL_USERNAME' ),
			'password'   => env( 'MAIL_PASSWORD' ),
			'encryption' => env( 'MAIL_ENCRYPTION' ) ?? 'tls',
		],

		'google'    => [
			'transport'  => 'smtp',
			'host'       => env( 'MAIL_HOST' ) ?? 'smtp.googlemail.com',
			'port'       => env( 'MAIL_PORT' ) ?? 465,
			'username'   => env( 'MAIL_USERNAME' ),
			'password'   => env( 'MAIL_PASSWORD' ),
			'encryption' => env( 'MAIL_ENCRYPTION' ) ?? 'tls',
		],

		'yandex'    => [
			'transport'  => 'smtp',
			'host'       => env( 'MAIL_HOST' ) ?? 'smtp.yandex.ru',
			'port'       => env( 'MAIL_PORT' ) ?? 587,
			'username'   => env( 'MAIL_USERNAME' ),
			'password'   => env( 'MAIL_PASSWORD' ),
			'encryption' => env( 'MAIL_ENCRYPTION' ) ?? 'ssl',
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
		'address' => env( 'MAIL_FROM_ADDRESS' ) ?? Option::get( 'admin_email' ),
	],

	/**
	 * -------------------------------------------------------------------------
	 * Mail content type
	 * -------------------------------------------------------------------------
	 *
	 * Default to "text/html" as it is most common use
	 * Alternatively set "text/plain" to pass text only
	 */
	'type'    => 'text/html',

];
