<?php
/**
 * Clear folder with all cached view files
 *
 * @package Brocooly
 * @since 0.10.1
 */

declare(strict_types=1);

namespace Brocooly\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ClearCache extends Command
{
	/**
	 * The name of the command
	 *
	 * @var string
	 */
	protected static $defaultName = 'cache:flush';

	/**
	 * Execute method
	 *
	 * @inheritDoc
	 */
	protected function execute( InputInterface $input, OutputInterface $output ) {
		$loader = new \Timber\Loader();
		$loader->clear_cache_twig();
		$loader->clear_cache_timber();

		$output->writeln( '<info>Cache has been successfully flushed!</info>' );
		return Command::SUCCESS;
	}

}
