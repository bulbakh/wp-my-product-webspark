<?php

namespace Wp_My_Product_Webspark\Dependencies;

interface WMPW_Check_Interface {

	/**
	 * Check if WooCommerce is installed and activated.
	 */
	public static function check(): void;
}
