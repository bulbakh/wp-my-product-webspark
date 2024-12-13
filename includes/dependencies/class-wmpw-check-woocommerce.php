<?php

namespace Wp_My_Product_Webspark\Dependencies;

defined( 'ABSPATH' ) || exit;

/**
 * Class to check if WooCommerce is installed and activated.
 *
 * @package WMPW
 */
class WMPW_Check_WooCommerce implements WMPW_Check_Interface {


	/**
	 * Check if WooCommerce is installed and activated.
	 *
	 * @return void
	 */
	public static function check(): void {
		if ( ! function_exists( 'is_plugin_active' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		if ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
			deactivate_plugins( plugin_basename( WMPW_PLUGIN_FILE ) );

			add_action(
				'admin_notices',
				function () {
					?>
					<div class="notice notice-error">
						<p>
							<?php
							printf(
							/* translators: %s: Plugin name. */
								esc_html__(
									'WooCommerce is not installed or activated. %s will not work. Please install and activate WooCommerce.',
									'wp-my-product-webspark'
								),
								esc_html( WMPW_PLUGIN_NAME )
							);
							?>
						</p>
					</div>
					<?php
				}
			);

			if ( isset( $_GET['activate'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification
				unset( $_GET['activate'] );
			}
		}
	}
}
