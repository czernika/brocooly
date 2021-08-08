<?php

declare(strict_types=1);

namespace Brocooly\Console;

use Illuminate\Support\Str;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
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
	 * Stub file view template
	 *
	 * @var string
	 */
	protected string $stubModelViewName = '';

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
	private function setFileModelName( string $outputFolder, string $modelName, string $extension ) {
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
	 * Create file from stubs
	 *
	 * @param OutputInterface $output | Symfony output
	 * @param string          $name | filename.
	 * @param string          $folder | folder to output.
	 * @param string          $extension | file postfix.
	 * @param string          $type | stub type.
	 * @param boolean         $kebab | write file in a kebab-case.
	 */
	protected function createFile( OutputInterface $output, string $name, string $folder, string $extension = '.php', string $type = 'model', bool $kebab = false ) {
		if ( ! $this->lettersOnly( $name ) ) {
			$this->failure( $output, 'Only Latin letters allowed' );
			die();
		}

		if ( $kebab ) {
			$name = Str::kebab( $name );
		}
		$ModelFile = $this->setFileModelName( $folder, $name, $extension );

		$stub = $this->getStubByType( $type );

		if ( file_exists( $ModelFile ) ) {
			/* translators: 1 - file name. */
			$this->failure( $output, sprintf( 'File %s already exists', $ModelFile ) );
			die();
		}

		if ( ! file_exists( $stub ) || ! copy( $stub, $ModelFile ) ) {
			/* translators: 1 - file name. */
			$this->failure( $output, sprintf( 'Unable to create file %s', $ModelFile ) );
			die();
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
		$stubModelPath     = wp_normalize_path( dirname( CORE_PATH ) . '/stubs/' . $this->stubModelName );
		$stubModelViewPath = strlen( $this->stubModelViewName ) ? wp_normalize_path( dirname( CORE_PATH ) . '/stubs/' . $this->stubModelViewName ) : '';

		switch ( $type ) {
			case 'model':
				$stub = $stubModelPath;
				break;

			case 'view':
				$stub = $stubModelViewPath;
				break;

			default:
				$stub = $stubModelPath; // PHP model.
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
	 *
	 * @param OutputInterface $output | Symfony output
	 * @param string          $message | message to output.
	 * @return int
	 */
	protected function success( OutputInterface $output, string $message ) {
		$output->writeln( '<info>' . $message . '</info>' );
		return Command::SUCCESS;
	}

	/**
	 * Return failure
	 *
	 * @param OutputInterface $output | Symfony output
	 * @param string          $message | message to output.
	 * @return int
	 */
	protected function failure( OutputInterface $output, string $message ) {
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
