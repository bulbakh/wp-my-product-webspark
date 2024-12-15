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
		flush_rewrite_rules();
	}
}
