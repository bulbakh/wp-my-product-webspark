<?php

namespace Wp_My_Product_Webspark\Ui;

use WP_Query;

defined( 'ABSPATH' ) || exit;

/**
 * Class WMPW_Content_My_Products
 */
class WMPW_Content_My_Products extends WMPW_Content {

	/**
	 * Get products
	 *
	 * @param  int $paged  Paged.
	 * @param  int $posts_per_page  Posts per page.
	 * @return array
	 */
	public function get_products( int $paged = 1, int $posts_per_page = 10 ): array {
		$args  = array(
			'post_type'      => 'product',
			'posts_per_page' => $posts_per_page,
			'paged'          => $paged,
			'post_status'    => 'any',
		);
		$query = new WP_Query( $args );

		$products = array();
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				$product = wc_get_product( get_the_ID() );

				if ( $product ) {
					$products[] = array(
						'id'         => $product->get_id(),
						'name'       => $product->get_name(),
						'quantity'   => $product->get_stock_quantity() ?? 'N/A',
						'price'      => wc_price( $product->get_price() ),
						'status'     => ucfirst( $product->get_status() ),
						'edit_url'   => get_edit_post_link( $product->get_id() ),
						'delete_url' => wp_nonce_url(
							admin_url( 'admin-post.php?action=wmpw_delete_product&product_id=' . $product->get_id() ),
							'wmpw_delete_product'
						),
					);
				}
			}
			wp_reset_postdata();
		}

		return array(
			'products'   => $products,
			'pagination' => array(
				'total'   => $query->max_num_pages,
				'current' => $paged,
			),
		);
	}

	/**
	 * Render the template
	 */
	public function __invoke(): void {
		$paged = max( 1, get_query_var( 'paged', 1 ) );
		$data  = $this->get_products( $paged, $this->posts_per_page );

		$this->render_template( 'my-products.php', $data );
	}
}
