<?php

declare(strict_types=1);

namespace App\Providers;

use Brain\Monkey;
use PHPUnit\Framework\TestCase;

class BlockServiceProviderTest extends TestCase
{
	public function test_blocks_blocks_config_should_be_an_array() {
		$this->assertIsArray( config( 'blocks.blocks' ) );
	}

	public function test_blocks_use_gutenberg_config_should_be_boolean() {
		$this->assertIsBool( app( 'use_gutenberg' ) );
	}
}
