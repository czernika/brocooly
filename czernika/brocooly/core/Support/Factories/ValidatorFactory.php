<?php
/**
 * Request validation based on Laravel Validation
 *
 * @package Brocooly
 * @since 0.9.1
 */

namespace Brocooly\Support\Factories;

use Illuminate\Validation;
use Illuminate\Translation;
use Illuminate\Filesystem\Filesystem;

class ValidatorFactory extends AbstractFactory
{

	/**
	 * Validation factory
	 *
	 * @var object
	 */
	private static $factory;

	/**
	 * Current locale
	 *
	 * @var string
	 */
	private string $currentLang = 'en_US';

	/**
	 * Validation translation directory
	 *
	 * @var string
	 */
	private string $langDir;

	public function __construct() {
		$this->langDir     = BROCOOLY_LANG_DIR . '/validation';
		$this->currentLang = get_locale();
		static::$factory   = new Validation\Factory( $this->loadTranslator() );
	}

	/**
	 * Load Laravel translator
	 *
	 * @return object
	 */
	protected function loadTranslator() {
		$filesystem = new FileSystem();
		$loader     = new Translation\FileLoader( $filesystem, $this->langDir );
		$loader->addNamespace( 'lang', $this->langDir );
		$loader->load( $this->currentLang, 'validation', 'lang' );

		return new Translation\Translator( $loader, $this->currentLang );
	}

	/**
	 * Call validator methods
	 *
	 * @param string $method | method name.
	 * @param array  $args | method arguments.
	 * @return void
	 */
	public static function create( string $method, array $args, $factory = null ) {
		return call_user_func_array( [ static::$factory, $method ], $args );
	}
}
