<?php

declare(strict_types=1);

namespace Theme\Models\WP;

use Brocooly\Facades\Meta;
use Brocooly\Models\Comment as BaseComment;

class Comment extends BaseComment
{
	/**
	 * Add meta to comment
	 * Call $this->createFields() inside
	 *
	 * @return void
	 */
	// public function fields() {}
}
