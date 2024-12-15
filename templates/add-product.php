<?php
/**
 * Template for adding a product.
 *
 * @var array $statuses List of available statuses.
 */

defined('ABSPATH') || exit;
?>

	<h2><?= esc_html__('Add New Product', 'wp-my-product-webspark'); ?></h2>

<?php if ( ! empty( $errors ) ) : ?>
    <div class="wmpw-error-messages">
		<?php foreach ( $errors as $error ) : ?>
            <p><?php echo esc_html( $error ); ?></p>
		<?php endforeach; ?>
    </div>
<?php endif; ?>
	<form method="post" class="wmpw-add-product-form">
		<?php wp_nonce_field('wmpw_add_product', 'wmpw_add_product_nonce'); ?>

		<p>
			<label for="product_name"><?= esc_html__('Product Name', 'wp-my-product-webspark'); ?></label>
			<input type="text" id="product_name" name="product_name">
		</p>

		<p>
			<label for="product_price"><?= esc_html__('Price', 'wp-my-product-webspark'); ?></label>
			<input type="number" id="product_price" name="product_price" step="0.01">
		</p>

		<p>
			<label for="product_quantity"><?= esc_html__('Quantity', 'wp-my-product-webspark'); ?></label>
			<input type="number" id="product_quantity" name="product_quantity">
		</p>

		<p>
			<button type="submit" class="button button-primary"><?= esc_html__('Add Product', 'wp-my-product-webspark'); ?></button>
		</p>
	</form>
<?php
