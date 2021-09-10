<?php
/**
 * Comments model.
 * Comments allow your website’s visitors to have a discussion with you and each other.
 * When you activate comments on a Page or post, WordPress inserts several text boxes after your content where users can submit their comments.
 * Once you approve a comment, it appears underneath your content.
 *
 * @package Brocooly
 * @since 0.12.2
 */

declare(strict_types=1);

namespace Theme\Models\WP;

use Brocooly\Support\Facades\Meta;
use Brocooly\Models\Comment as BaseComment;

class Comment extends BaseComment
{

}
