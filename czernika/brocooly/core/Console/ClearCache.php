<?php
/**
 *
 */

declare(strict_types=1);

namespace Brocooly\Console;

use Illuminate\Support\Str;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\ConsoleOutputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ClearCache extends Command
{
	/**
	 * The name of the command
	 */
	protected static $defaultName = 'cache:flush';

	protected function execute( InputInterface $input, OutputInterface $output ) {
		$loader = new \Timber\Loader();
		$loader->clear_cache_twig();
		$loader->clear_cache_timber();

		$output->writeln( '<info>Cache successfully flushed!</info>' );
		return Command::SUCCESS;
	}

}
