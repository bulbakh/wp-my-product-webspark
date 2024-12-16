<?php

namespace Wp_My_Product_Webspark;

defined( 'ABSPATH' ) || exit;
/**
 * Class WMPW_Activator
 */
class WMPW_Activator {

	/**
	 * Run activation checks.
	 */
	public static function check_dependencies(): void {
		$dependencies_dir = WMPW_PLUGIN_DIR . 'includes/dependencies';

		$files = glob( $dependencies_dir . '/*check*.php' );

		foreach ( $files as $file ) {
			require_once $file;

			$class_name = basename( $file, '.php' );
			$class_name = ucfirst( basename( $file, '.php' ) );
			$class_name = self::convert_file_to_class_name( basename( $file, '.php' ) );

			if ( class_exists( $class_name ) ) {
				call_user_func( array( $class_name, 'check' ) );
			}
		}
	}

	/**
	 * Convert file name to class name in CamelCase format
	 *
	 * @param  string $file_name  File name.
	 *
	 * @return string
	 */
	private static function convert_file_to_class_name( string $file_name ): string {
		$file_name_array = explode( '-', $file_name );
		unset( $file_name_array[0] );
        // phpcs:ignore Squiz.PHP.DisallowMultipleAssignments.Found
		array_walk( $file_name_array, fn( &$item ) => $item = ucfirst( $item ) );

		return 'Wp_My_Product_Webspark\\Dependencies\\' . implode( '_', $file_name_array );
	}
}
