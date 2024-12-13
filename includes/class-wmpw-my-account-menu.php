<?php
namespace Wp_My_Product_Webspark;

defined( 'ABSPATH' ) || exit;
/**
 * Class WMPW_My_Account_Menu
 */
class WMPW_My_Account_Menu {

	/**
	 * Add my products link to the account menu
	 */
	public function __invoke( array$menu_links ): array
    {
		$menu_links['my-products'] = __( 'My Products', 'wp-my-product-webspark' );
        $new_items = array(
            'my-products' => __('My Products', 'wp-my-product-webspark'),
            'add-product' => __('Add Product', 'wp-my-product-webspark'),
        );

        return [reset($menu_links)] + $new_items + array_slice($menu_links, 1, null, true);
	}
}
