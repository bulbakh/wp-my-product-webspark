<?php

namespace Wp_My_Product_Webspark;

use JetBrains\PhpStorm\NoReturn;

defined( 'ABSPATH' ) || exit;

/**
 * Class WMPW_Admin_Actions
 * Handles admin actions for the plugin.
 */
class WMPW_Admin_Actions {


	/**
	 * Handles the deletion of a product.
	 *
	 * @return void
	 */
	public function handle_delete_product(): void {
		if ( ! isset( $_GET['_wpnonce'] ) || ! wp_verify_nonce(
			sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ),
			'wmpw_delete_product'
		) ) {
			wp_die( esc_html__( 'Invalid request.', 'wp-my-product-webspark' ) );
		}

		$product_id = isset( $_GET['product_id'] ) ? absint( $_GET['product_id'] ) : 0;
		if ( ! $product_id ) {
			wp_die( esc_html__( 'Invalid product ID.', 'wp-my-product-webspark' ) );
		}

		if ( wp_trash_post( $product_id ) ) {
			wp_safe_redirect( wp_get_referer() );
			exit;
		} else {
			wp_die( esc_html__( 'Failed to delete product.', 'wp-my-product-webspark' ) );
		}
	}
}
