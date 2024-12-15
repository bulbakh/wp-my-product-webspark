<?php
/**
 * Template for adding a product.
 *
 * @var array $statuses List of available statuses.
 */

defined('ABSPATH') || exit;
?>

<h2><?= esc_html__('Add new product', 'wp-my-product-webspark'); ?></h2>

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
        <label for="product_name"><?= esc_html__('Product name', 'wp-my-product-webspark'); ?></label>
        <input type="text" id="product_name" name="product_name" required>
    </p>

    <p>
        <label for="product_price"><?= esc_html__('Price', 'wp-my-product-webspark'); ?></label>
        <input type="number" id="product_price" name="product_price" step="0.01" min="0">
    </p>

    <p>
        <label for="product_quantity"><?= esc_html__('Quantity', 'wp-my-product-webspark'); ?></label>
        <input type="number" id="product_quantity" name="product_quantity" min="0">
    </p>

    <p>
        <label for="product_description"><?= esc_html__('Description', 'wp-my-product-webspark'); ?></label>
		<?php
		wp_editor(
			'',
			'product_description',
			array(
				'textarea_name' => 'product_description',
				'textarea_rows' => 5,
				'media_buttons' => false,
			)
		);
		?>
    </p>

    <p>
        <label for="product_image"><?= esc_html__('Product image', 'wp-my-product-webspark'); ?></label>
        <button type="button" id="product_image_button" class="button">
			<?= esc_html__('Select image', 'wp-my-product-webspark'); ?>
        </button>
        <input type="hidden" id="product_image" name="product_image">
    <div id="product_image_preview"></div>
    </p>

    <p>
        <button type="submit" class="button button-primary"><?= esc_html__('Add Product', 'wp-my-product-webspark'); ?></button>
    </p>
</form>
