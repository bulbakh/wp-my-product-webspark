<?php

namespace Wp_My_Product_Webspark\Ui;

defined( 'ABSPATH' ) || exit;

/**
 * Class WMPW_Content
 */
abstract class WMPW_Content {

	/**
	 *  Posts per page
	 *
	 * @var int
	 */
	protected int $posts_per_page = 3;

	/**
	 *  Render template
	 *
	 * @param string $template_name Template name.
	 * @param array  $data Data.
	 */
	protected function render_template( string $template_name, array $data ): void {
		add_action( 'wp_enqueue_scripts', array( $this, 'wmpw_enqueue_styles' ) );

		foreach ( $data as $key => $value ) {
			$$key = $value; // instead extract().
		}

		$template_path = WMPW_PLUGIN_DIR . 'templates/' . $template_name;
		if ( file_exists( $template_path ) ) {
			include $template_path;
		} else {
			echo '<p>' . esc_html__( 'Template not found.', 'wp-my-product-webspark' ) . '</p>';
		}
	}

	/**
	 * Enqueue styles
	 */
	public function wmpw_enqueue_styles(): void {
		wp_enqueue_style( 'wmpw-my-products', WMPW_PLUGIN_URL . '/css/style.css', array(), WMPW_PLUGIN_VERSION );
	}
}
