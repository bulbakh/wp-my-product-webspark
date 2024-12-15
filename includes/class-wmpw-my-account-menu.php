<?php
namespace Wp_My_Product_Webspark;

defined( 'ABSPATH' ) || exit;
/**
 * Class WMPW_My_Account_Menu
 */
class WMPW_My_Account_Menu {

	/**
	 * Add my products link to the account menu
	 *
	 * @param array $menu_links Array of menu links.
	 */
	public function __invoke( array $menu_links ): array {
		$menu_links['my-products'] = __( 'My Products', 'wp-my-product-webspark' );
		$new_items                 = array(
			'add-product' => __( 'Add product', 'wp-my-product-webspark' ),
			'my-products' => __( 'My products', 'wp-my-product-webspark' ),
		);

		return array( reset( $menu_links ) ) + $new_items + array_slice( $menu_links, 1, null, true );
	}
}
