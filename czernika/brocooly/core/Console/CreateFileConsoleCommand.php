<?php

declare(strict_types=1);

namespace Brocooly\Console;

use Illuminate\Support\Str;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\ConsoleOutputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class CreateFileConsoleCommand extends Command
{

	/**
	 * Stub file model
	 *
	 * @var string
	 */
	protected string $stubModelName;

	/**
	 * Stub file model path
	 *
	 * @var string
	 */
	private string $stubModelPath;

	/**
	 * Stub file view template
	 *
	 * @var string
	 */
	protected string $stubModelViewName = '';

	/**
	 * Stub file view template path
	 *
	 * @var string
	 */
	private string $stubModelViewPath;

	public function __construct() {
		parent::__construct();

		$this->stubModelPath = wp_normalize_path( dirname( CORE_PATH ) . '/stubs/' . $this->stubModelName );

		$this->stubModelViewPath = strlen( $this->stubModelViewName ) ? wp_normalize_path( dirname( CORE_PATH ) . '/stubs/' . $this->stubModelViewName ) : '';

	}

	/**
	 * Set arguments for `configure()` method
	 */
	abstract protected function setArguments();

	/**
	 * Set arguments for `execute()` method
	 */
	abstract protected function preexecute( InputInterface $input, OutputInterface $output );

	/**
	 * Get model file name
	 *
	 * @param string $outputFolder | output folder.
	 * @param string $modelName | model name.
	 * @param string $extension | file extension.
	 * @return string
	 */
	private function setFileModelName( string $outputFolder, string $modelName, string $extension = '.php' ) {
		return wp_normalize_path( get_template_directory() . $outputFolder . $modelName . $extension );
	}

	/**
	 * Replace content in a file
	 *
	 * @param string $ModelFile | model file.
	 * @param array $replaceContent | content to replace.
	 * @param array $replaceTo | replacement.
	 * @return void
	 */
	private function createFileContent( string $ModelFile, array $replaceContent, array $replaceTo ) {
		$newContent = str_replace(
			$replaceContent,
			$replaceTo,
			file_get_contents( $ModelFile )
		);
		file_put_contents( $ModelFile, $newContent );
	}

	/**
	 * Undocumented function
	 *
	 * @param OutputInterface $output | Symfony output
	 * @param string          $name | filename.
	 * @param string          $folder | folder to output.
	 * @param string          $extension | file postfix.
	 * @param string          $type | stub type.
	 * @param boolean         $kebab | write file in a kebab-case.
	 */
	protected function createFile( OutputInterface $output, string $name, string $folder, string $extension, string $type = 'model', bool $kebab = false ) {
		if ( ! $this->lettersOnly( $name ) ) {
			return $this->failure( $output, 'Only Latin letters allowed' );
		}

		if ( $kebab ) {
			$name = Str::kebab( $name );
		}
		$ModelFile = $this->setFileModelName( $folder, $name, $extension );

		$stub = $this->getStubByType( $type );

		if ( file_exists( $ModelFile ) ) {
			return $this->failure( $output, sprintf( 'Model file with %s name already exists', $name ) );
		}

		if ( ! file_exists( $stub ) || ! copy( $stub, $ModelFile ) ) {
			return $this->failure( $output, 'Unable to create model file' );
		}

		$this->createFileContent( $ModelFile, array_keys( $this->searchAndReplace( $name ) ), array_values( $this->searchAndReplace( $name ) ) );
	}

	/**
	 * Get stub file path by type
	 *
	 * @param string $type | stub type.
	 * @return string
	 */
	private function getStubByType( string $type ) {
		switch ( $type ) {
			case 'model':
				$stub = $this->stubModelPath;
				break;

			case 'view':
				$stub = $this->stubModelViewPath;
				break;

			default:
				$stub = $this->stubModelPath; // PHP model.
				break;
		}

		return $stub;
	}

	/**
	 * Replace variables inside stub file
	 *
	 * @param string $value | value to handle inside.
	 * @return array
	 */
	protected function searchAndReplace( string $value ) {
		return [];
	}

	/**
	 * Return success
	 */
	protected function success( $output, string $message ) {
		$output->writeln( '<info>' . $message . '</info>' );
		return Command::SUCCESS;
	}

	/**
	 * Return failure
	 */
	protected function failure( $output, string $message ) {
		$output->writeln( '<error>' . $message . '</error>' );
		return Command::FAILURE;
	}

	/**
	 * Check only letters were passed in a console
	 *
	 * @return bool
	 */
	private function lettersOnly( $check ) {
		return ! empty( $check ) && preg_match( '/^[a-zA-Z]+$/i', $check );
	}

	protected function configure(): void {
		$this->setArguments();
	}

	protected function execute( InputInterface $input, OutputInterface $output ) {
		$this->preexecute( $input, $output );
	}

}
