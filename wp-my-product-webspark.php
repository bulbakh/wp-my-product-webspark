<?php
/**
 * Plugin Name: WpMyProductWebspark
 * Plugin URI: https://github.com/bulbakh/wp-my-product-webspark
 * Description: The perfect extension to woocommerce for next-level ecommerce. More beautifully than ever.
 * Version: 1.0.0
 * Author: Bulbakh
 * Author URI: https://github.com/bulbakh
 * Text Domain: wp-my-product-webspark
 * Domain Path: /i18n/languages/
 * Requires at least: 6.5
 * Requires PHP: 7.4
 *
 * @package WooCommerce
 */

defined( 'ABSPATH' ) || exit;

define( 'WMPW_PLUGIN_FILE', __FILE__ );
define( 'WMPW_PLUGIN_NAME', 'WpMyProductWebspark' );

require __DIR__ . '/vendor/autoload.php';

add_action( 'plugins_loaded', array( 'Wp_My_Product_Webspark\WMPW', 'instance' ) );



// 4. Додавання стилів (за потреби)
function wmpw_enqueue_styles() {
    wp_enqueue_style( 'wmpw-my-products', plugin_dir_url( __FILE__ ) . 'css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'wmpw_enqueue_styles' );
