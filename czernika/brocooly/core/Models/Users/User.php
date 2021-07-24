<?php
/**
 * User instance
 *
 * @package Brocooly
 * @since 0.8.0
 */

declare(strict_types=1);

namespace Brocooly\Models\Users;

use Carbon_Fields\Container;
use Timber\User as TimberUser;

abstract class User extends TimberUser
{
	/**
	 * Create metabox container for post types
	 *
	 * @param string $id | container id.
	 * @param string $label | container label.
	 * @param array  $fields | array of custom fields.
	 * @return void
	 */
	protected function createFields( string $id, string $label, array $fields ) {
		$this->setContainer( $id, $label )
			->add_fields( $fields );
	}

	/**
	 * Set metabox container
	 *
	 * @param string $id | container id.
	 * @param string $label | container label.
	 * @return object
	 */
	protected function setContainer( string $id, string $label ) {
		$container = Container::make( 'user_meta', $id, $label );
		return $container;
	}
}
