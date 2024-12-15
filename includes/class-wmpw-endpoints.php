<?php

namespace Wp_My_Product_Webspark;

defined( 'ABSPATH' ) || exit;

/**
 * Class WMPW_Endpoints
 * todo maybe remove?
 */
class WMPW_Endpoints {

	/**
	 * Register my products endpoint
	 */
	public function __invoke(): void {
		add_rewrite_endpoint( 'add-product', EP_ROOT | EP_PAGES );
		add_rewrite_endpoint( 'my-products', EP_ROOT | EP_PAGES );
		$this->wmpw_add_products_paginationrewrite_rule();

		flush_rewrite_rules();
	}

	/**
	 * Add my products rewrite rule for pagination
	 */
	private function wmpw_add_products_paginationrewrite_rule(): void {
		add_rewrite_rule(
			'my-account/my-products/page/([0-9]{1,})/?$',
			'index.php?pagename=my-account&my-products&paged=$matches[1]',
			'top'
		);
	}
}
