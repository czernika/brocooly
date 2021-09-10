<?php

declare(strict_types=1);

namespace Theme\Containers\BlogSection\Tasks;

class GetBlogPostsArchiveLinkTask
{
	public function run() {
		return get_post_type_archive_link( 'post' );
	}
}
