<?php

namespace Wp_My_Product_Webspark;

use Wp_My_Product_Webspark\Ui\WMPW_Content_My_Products;
use Wp_My_Product_Webspark\Ui\WMPW_Content_Add_Product;

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

			self::$instance->hooks();
		}
		do_action( 'wmpw_plugin_loaded' );

		return self::$instance;
	}

	/**
	 * Add hooks for the core functionality
	 *
	 * @return void
	 */
	private function hooks(): void {
		add_action( 'admin_init', array( 'Wp_My_Product_Webspark\WMPW_Activator', 'check_dependencies' ) );
		add_action( 'init', new WMPW_Endpoints() );
		add_filter( 'woocommerce_account_menu_items', new WMPW_My_Account_Menu() );
		add_action( 'woocommerce_account_my-products_endpoint', new WMPW_Content_My_Products() );
		add_action( 'woocommerce_account_add-product_endpoint', new WMPW_Content_Add_Product() );
		add_action( 'admin_post_wmpw_delete_product', array( 'Wp_My_Product_Webspark\WMPW_Admin_Actions', 'handle_delete_product' ) );
		add_filter( 'woocommerce_email_settings', array( 'Wp_My_Product_Webspark\WMPW_Admin_Notification', 'add_email_notification_setting' ) );
		add_action( 'save_post_product', array( 'Wp_My_Product_Webspark\WMPW_Admin_Notification', 'send_admin_notification' ), 10, 3 );
	}
}
