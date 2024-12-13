<?php

namespace Wp_My_Product_Webspark;

defined( 'ABSPATH' ) || exit;

/**
 * Class Wp_My_Product_Webspark\WMPW
 */
class WMPW {

	/**
	 * The single instance of the class.
	 *
	 * @var WMPW
	 */
	private static WMPW $instance;

	/**
	 *  Ensures only one instance of class is loaded or can be loaded.
	 */
	private function __construct() {}
	/**
	 *  Ensures only one instance of class is loaded or can be loaded.
	 */
	private function __clone() {}
	/**
	 *  Ensures only one instance of class is loaded or can be loaded.
	 */
	private function __wakeup() {}

	/**
	 *  Ensures only one instance of class is loaded or can be loaded.
	 *
	 * @return WMPW
	 */
	public static function instance(): WMPW {
		if ( empty( self::$instance ) ) {
			self::$instance = new self();

			self::$instance->base_hooks();
		}
		do_action( 'wpmyprod_plugin_loaded' );

		return self::$instance;
	}

	/**
	 * Add base hooks for the core functionality
	 *
	 * @return void
	 */
	private function base_hooks(): void {
		add_action( 'admin_init', array( 'Wp_My_Product_Webspark\WMPW_Activator', 'check_dependencies' ) );
		add_action( 'init', new WMPW_Endpoints() );
		add_filter( 'woocommerce_account_menu_items', new WMPW_My_Account_Menu() );
        add_action('woocommerce_account_my-products_endpoint', new WMPW__My_Products_Content());
        add_action('woocommerce_account_add-product_endpoint', new WMPW__My_Products_Content());

    }
}
