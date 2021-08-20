<?php

declare(strict_types=1);

namespace Theme\Containers\BlogSection\Actions;

use Theme\Containers\BlogSection\Tasks\GetBlogTitleTask;
use Theme\Containers\BlogSection\Tasks\GetBlogArticleTask;
use Theme\Containers\BlogSection\Tasks\GetBlogPostsArchiveLinkTask;

class GetBlogArticleAction
{
	public function getPost() {
		return task( GetBlogArticleTask::class );
	}

	public function getPostAncestors() {
		$ancestors = [
			[
				'title' => task( GetBlogTitleTask::class ),
				'link'  => task( GetBlogPostsArchiveLinkTask::class ),
			],
		];
		return $ancestors;
	}
}
