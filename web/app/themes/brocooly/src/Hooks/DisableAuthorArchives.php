<?php

declare(strict_types=1);

namespace Theme\Hooks;

class DisableAuthorArchives
{
	public function load() {
		if( ! is_admin() ){
			add_action( 'pre_handle_404', [ $this, 'removeAuthorPagesPage' ] );
			add_action( 'author_link', [ $this, 'removeAuthorPagesLink' ] );
		}
	}

	public function removeAuthorPagesPage( $false ) {
		if ( is_author() ) {
			global $wp_query;
			$wp_query->set_404();
			status_header( 404 );
			nocache_headers();

			return true;
		}

		return $false;
	}

	public function removeAuthorPagesLink( $content ) {
		return home_url();
	}
}

