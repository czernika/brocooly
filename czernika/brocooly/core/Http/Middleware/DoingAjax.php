<?php

declare(strict_types=1);

namespace Brocooly\Http\Middleware;

class DoingAjax extends AbstractMiddleware
{
	public function handle() {
		if ( ! wp_doing_ajax() ) {
			return;
		}
	}
}
