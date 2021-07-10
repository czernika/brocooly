<?php
/**
 * Handle assets enqueuing
 *
 * @package Brocooly
 * @since 0.1.0
 */

namespace Brocooly\Loaders;

use Brocooly\App;

class AssetsLoader
{

	/**
	 * Application instance
	 *
	 * @var instanceof Brocooly\App
	 */
	private App $app;

	/**
	 * Public folder name
	 *
	 * @var string
	 */
	private string $publicFolder;

	/**
	 * Manifest file name
	 *
	 * @var string
	 */
	private string $manifest = 'manifest.json';

	/**
	 * Assets array
	 *
	 * @var array
	 */
	private array $assets = [];

	public function __construct( App $app ) {
		$this->app          = $app;
		$this->publicFolder = trailingslashit( config( 'assets.public' ) ) ?? 'public';
		$this->manifest     = untrailingslashit( config( 'assets.manifest' ) ) ?? 'manifest.json';
		$this->assets       = $this->getAssets();
	}

	/**
	 * Enqueue scripts and styles
	 *
	 * @return void
	 */
	public function call() {
		if ( config( 'assets.autoload', true ) ) {
			$this->registerStyles();
			$this->registerScripts();
		}
	}

	/**
	 * Register styles to WordPress
	 */
	private function registerStyles() {
		$styles = $this->getStylesOnly( $this->assets );

		add_action(
			'wp_enqueue_scripts',
			function() use ( $styles ) {
				foreach ( $styles as $name => $style ) {
					if ( file_exists( $this->getFilePath( $style ) ) ) {
						wp_enqueue_style(
							'brocooly-' . substr( $name, 0, -4 ), // remove CSS extension.
							$this->getFileUri( $style ),
							[],
							$this->getFileVersion( $style ),
							'all',
						);
					}
				}
			}
		);
	}

	/**
	 * Register scripts to WordPress
	 */
	private function registerScripts() {
		$scripts = $this->getScriptsOnly( $this->assets );

		add_action(
			'wp_enqueue_scripts',
			function() use ( $scripts ) {
				foreach ( $scripts as $name => $script ) {
					if ( file_exists( $this->getFilePath( $script ) ) ) {
						wp_enqueue_script(
							'brocooly-' . substr( $name, 0, -3 ), // remove JS extension.
							$this->getFileUri( $script ),
							[],
							$this->getFileVersion( $script ),
							true,
						);
					}
				}
			}
		);
	}

	/**
	 * Get assets array from manifest file
	 *
	 * @return array
	 */
	private function getAssetsFromManifest() {
		$manifest       = wp_normalize_path( BROCOOLY_THEME_PATH . $this->publicFolder . $this->manifest );

		$manifestAssets = (array) json_decode( file_get_contents( $manifest, true ) );

		return $manifestAssets;
	}

	/**
	 * Get assets to register
	 *
	 * @return array
	 */
	private function getAssets() {
		$manifestAssets = $this->getAssetsFromManifest();
		$excluded       = $this->getExcludedAssets();

		$assets = collect( $manifestAssets )
			->filter( fn( $value, $key ) => ! in_array( $key, $excluded, true ) )->toArray();

		return $assets;
	}

	/**
	 * Get array of excluded assets
	 *
	 * @return array
	 */
	private function getExcludedAssets() {
		$excluded = array_merge(
			config( 'assets.excludeScripts' ),
			config( 'assets.excludeStyles' ),
		);

		return $excluded;
	}

	/**
	 * Get single asset
	 *
	 * @param string $key | file name according to manifest.
	 * @return string
	 */
	public function asset( string $key ) {
		$manifestAssets = $this->getAssetsFromManifest();
		return $manifestAssets[ $key ];
	}

	/**
	 * Get only CSS files
	 *
	 * @param array $assets | array of assets.
	 * @return array
	 */
	private function getStylesOnly( array $assets ) {
		$styles = collect( $assets )
			->filter( fn( $asset ) => ( str_starts_with( $asset, 'css/' ) && str_ends_with( $asset, '.css' ) ) );

		return $styles;
	}

	/**
	 * Get only JS files
	 *
	 * @param array $assets | array of assets.
	 * @return array
	 */
	private function getScriptsOnly( array $assets ) {
		$scripts = collect( $assets )
			->filter( fn( $asset ) => ( str_starts_with( $asset, 'js/' ) && str_ends_with( $asset, '.js' ) ) );

		return $scripts;
	}

	/**
	 * Get file URI
	 *
	 * @param string $file | filename.
	 * @return string
	 */
	private function getFileUri( string $file ) {
		$fileUri = wp_normalize_path( BROCOOLY_THEME_URI . $this->publicFolder . $file );
		return $fileUri;
	}

	/**
	 * Get file path
	 *
	 * @param string $file | filename.
	 * @return string
	 */
	private function getFilePath( string $file ) {
		$filePath = wp_normalize_path( BROCOOLY_THEME_PATH . $this->publicFolder . $file );
		return $filePath;
	}

	/**
	 * Get file version
	 *
	 * @param string $file | filename.
	 * @return string
	 */
	private function getFileVersion( string $file ) {
		$fileVersion = filemtime( $this->getFilePath( $file ) );
		return $fileVersion;
	}

}
