<?php

namespace Brocooly\Loaders;

use Brocooly\App;

class AssetsLoader
{

	private App $app;

	private string $publicFolder;

	private string $manifest = 'manifest.json';

	private array $assets = [];

	public function __construct( App $app ) {
		$this->app          = $app;
		$this->publicFolder = trailingslashit( config( 'assets.public' ) ) ?? 'public';
		$this->manifest     = untrailingslashit( config( 'assets.manifest' ) ) ?? 'manifest.json';
		$this->assets       = $this->getAssets();
	}

	public function call() {
		if ( config( 'assets.autoload', true ) ) {
			$this->registerStyles();
			$this->registerScripts();
		}
	}

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

	private function getAssetsFromManifest() {
		$manifest       = wp_normalize_path( BROCOOLY_THEME_PATH . $this->publicFolder . $this->manifest );

		$manifestAssets = (array) json_decode( file_get_contents( $manifest, true ) );

		return $manifestAssets;
	}

	private function getAssets() {
		$manifestAssets = $this->getAssetsFromManifest();
		$excluded       = $this->getExcludedAssets();

		$assets = collect( $manifestAssets )
			->filter( fn( $value, $key ) => ! in_array( $key, $excluded, true ) )->toArray();

		return $assets;
	}

	private function getExcludedAssets() {
		$excluded = array_merge( config( 'assets.excludeScripts' ), config( 'assets.excludeStyles' ) );
		return $excluded;
	}

	public function asset( $key ) {
		$manifestAssets = $this->getAssetsFromManifest();
		return $manifestAssets[ $key ];
	}

	private function getStylesOnly( array $assets ) {
		$styles = collect( $assets )
			->filter( fn( $asset ) => ( str_starts_with( $asset, 'css/' ) && str_ends_with( $asset, '.css' ) ) );

		return $styles;
	}

	private function getScriptsOnly( array $assets ) {
		$scripts = collect( $assets )
			->filter( fn( $asset ) => ( str_starts_with( $asset, 'js/' ) && str_ends_with( $asset, '.js' ) ) );

		return $scripts;
	}

	private function getFileUri( $file ) {
		$fileUri = wp_normalize_path( BROCOOLY_THEME_URI . $this->publicFolder . $file );
		return $fileUri;
	}

	private function getFilePath( $file ) {
		$filePath = wp_normalize_path( BROCOOLY_THEME_PATH . $this->publicFolder . $file );
		return $filePath;
	}

	private function getFileVersion( $file ) {
		$fileVersion = filemtime( $this->getFilePath( $file ) );
		return $fileVersion;
	}

}
