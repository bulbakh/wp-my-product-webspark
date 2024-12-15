<?php

namespace Wp_My_Product_Webspark\Ui;

use WC_Product_Simple;

defined( 'ABSPATH' ) || exit;

/**
 * Class WMPW_Content_Add_Product
 */
class WMPW_Content_Add_Product extends WMPW_Content {

	/**
	 * Array to store validation errors.
	 *
	 * @var string[]
	 */
	private array $errors = array();

	/**
	 * Processes the product addition form submission.*
	 */
	public function handle_submission(): void {
		if ( ! empty( $_SERVER['REQUEST_METHOD'] ) && 'POST' === $_SERVER['REQUEST_METHOD'] && isset( $_POST['wmpw_add_product_nonce'] ) ) {
			if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['wmpw_add_product_nonce'] ) ), 'wmpw_add_product' ) ) {
				wp_die( esc_html__( 'Invalid nonce. Please try again.', 'wp-my-product-webspark' ) );
			}

			$name  = sanitize_text_field( wp_unslash( $_POST['product_name'] ?? '' ) );
			$price = sanitize_text_field( wp_unslash( $_POST['product_price'] ?? '' ) );
			$qty   = floatval( sanitize_text_field( wp_unslash( $_POST['product_quantity'] ?? 0 ) ) );

			if ( empty( $name ) ) {
				$this->errors['product_name'] = __( 'Product name is required.', 'wp-my-product-webspark' );
				return;
			}

			$product = new WC_Product_Simple();
			$product->set_name( $name );
			$product->set_regular_price( $price );
			$product->set_manage_stock( true );
			$product->set_stock_quantity( $qty );
			$product->set_status( 'pending' );
			$product->save();

			wp_safe_redirect( wc_get_endpoint_url( 'my-products', '', wc_get_page_permalink( 'myaccount' ) ) );
			exit;
		}
	}

	/**
	 * Renders the "Add Product" page template.
	 */
	public function __invoke(): void {
		$this->handle_submission();

		$this->render_template(
			'add-product.php',
			array(
				'statuses' => array(
					'publish' => __( 'Published', 'wp-my-product-webspark' ),
					'draft'   => __( 'Draft', 'wp-my-product-webspark' ),
				),
				'errors'   => $this->errors,
			)
		);
	}
}
