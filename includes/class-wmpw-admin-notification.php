<?php

namespace Wp_My_Product_Webspark;

use WC_Logger;
use WP_Post;

/** Class WMPW_Admin_Notification */
class WMPW_Admin_Notification {
	/**
	 * Adds a WooCommerce email notification setting.
	 *
	 * @param  array $settings  WooCommerce email settings.
	 * @return array Modified settings.
	 */
	public static function add_email_notification_setting( array $settings ): array {
		$settings[] = array(
			'title' => WMPW_PLUGIN_NAME,
			'type'  => 'title',
			'id'    => 'wmpw_email_settings',
		);

		$settings[] = array(
			'title'    => __( 'Enable Notifications', 'wp-my-product-webspark' ),
			'desc'     => __( 'Send an email to admin when a product is created or updated.', 'wp-my-product-webspark' ),
			'id'       => 'wmpw_enable_admin_email',
			'type'     => 'checkbox',
			'default'  => 'yes',
			'desc_tip' => false,
		);

		$settings[] = array(
			'type' => 'sectionend',
			'id'   => 'wmpw_email_settings',
		);

		return $settings;
	}

	/**
	 * Sends an email to the admin when a product is created or updated.
	 *
	 * @param  int     $post_id  Product ID.
	 * @param  WP_Post $post  Product object.
	 * @param  bool    $update  Whether it is an update.
	 */
	public static function send_admin_notification( int $post_id, WP_Post $post, bool $update ): void {
		if ( 'product' !== $post->post_type || wp_is_post_revision( $post_id ) ) {
			return;
		}

		if ( 'yes' !== get_option( 'wmpw_enable_admin_email', 'yes' ) ) {
			return;
		}

		$admin_email = get_option( 'admin_email' );

		$subject = __( 'Product notification', 'wp-my-product-webspark' );

		$email_heading = $subject;
		$product_name  = wc_get_product( $post_id )->get_name();
		$edit_url      = get_edit_post_link( $post_id );
		$author_url    = admin_url( 'user-edit.php?user_id=' . $post->post_author );

		$mailer = WC()->mailer();

		$content = wc_get_template_html(
			'save-product-email.php',
			array(
				'email_heading' => $email_heading,
				'product_name'  => $product_name,
				'author_url'    => $author_url,
				'edit_url'      => $edit_url,
				'update'        => $update,
			),
			'',
			WMPW_PLUGIN_DIR . '/templates/admin/'
		);

		$headers = "Content-Type: text/html\r\n";

		$mail_sent = $mailer->send( $admin_email, $subject, $content, $headers );

		if ( ! $mail_sent ) {
			if ( class_exists( 'WC_Logger' ) ) {
				$logger = new WC_Logger();
				$logger->log( 'error', 'Mail not sent to ' . $admin_email . '. Subject: ' . $subject );
			}
		}
	}
}
