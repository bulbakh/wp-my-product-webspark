<?php
/**
 * Plugin Name: Wp My Product Webspark
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
define( 'WMPW_PLUGIN_DIR', plugin_dir_path(WMPW_PLUGIN_FILE));
define( 'WMPW_PLUGIN_URL', plugin_dir_url(WMPW_PLUGIN_FILE));
define( 'WMPW_PLUGIN_NAME', 'Wp My Product Webspark' );
define( 'WMPW_PLUGIN_VERSION', '1.0.0' );

require __DIR__ . '/vendor/autoload.php';

add_action( 'plugins_loaded', array( 'Wp_My_Product_Webspark\WMPW', 'instance' ) );