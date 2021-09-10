<?php

declare(strict_types=1);

namespace Theme\Containers\BlogSection\Tasks;

class IsActiveSidebarTask
{
	public function run( string $sidebar ) {
		return is_active_sidebar( $sidebar );
	}
}
