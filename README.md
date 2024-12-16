# WpMyProductWebspark

WpMyProductWebspark is a plugin for WooCommerce that allows adding new products via a custom form in the
Mу account area.

## Requirements

- WordPress 6.5 or higher
- PHP 7.4 or higher
- WooCommerce (latest stable version recommended)

## Installation

1. Download the plugin:
    - Download or clone the plugin repository to your server:
      ```bash
      git clone https://github.com/bulbakh/wp-my-product-webspark.git wp-my-product-webspark
      ```
    - Alternatively, upload the plugin through the WordPress admin panel (Plugins → Add New → Upload Plugin).

2. Activate the plugin in the WordPress admin panel.
   **Important:** This plugin requires WooCommerce to function properly. It will not activate if WooCommerce is not
   installed or enabled, and it will be deactivated automatically if WooCommerce is disabled.

3. Once activated, the plugin will appear in the admin panel. Make sure WooCommerce is active, as this plugin depends on
   WooCommerce to manage product data.

## Usage

Once the plugin is activated, users can add new products through a custom form available in the "My Account" page.
Users can also view the products they have added through their "My Account" page.

### Image Uploads

To upload product images, the user must have the `upload_files` capability. This permission is granted to the following
user roles:

- Administrator
- Editor
- Author
- Shop Manager

Make sure that users who need to upload product images have the necessary permissions to do so.

## Notes

- The plugin integrates with the default WooCommerce product management system, adding  features for a
  more streamlined product addition process.
- Image uploads are restricted to only those images that the user has uploaded to the media library.

## Troubleshooting

If you encounter any issues, please check the following:

- Ensure that you have the correct user permissions for uploading files.
- If the media library is not working correctly, try re-enabling media-related WordPress settings or clearing your
  browser cache.

For additional support, feel free to reach out to the plugin author.

## Changelog

### 1.0.0

- Initial release.
