<?php
/**
 * Post Category model
 * Categories provide a helpful way to group related posts together.
 *
 * @package Brocooly
 * @since 0.2.1
 */

declare(strict_types=1);

namespace Theme\Models\WP;

use Brocooly\Models\Taxonomy;
use Brocooly\Support\Facades\Meta;

class Category extends Taxonomy
{

}
