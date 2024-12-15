<?php
/**
 * New Product Email Template.
 *
 * @var string $email_heading email heading.
 * @var string $product_name product name.
 * @var string $author_url author url.
 * @var string $edit_url edit url.
 * @var bool $update is update.
 */

defined( 'ABSPATH' ) || exit;
?>

<?php $action = $update ? 'updated' : 'created'; ?>

<?php wc_get_template( 'emails/email-header.php', array( 'email_heading' => $email_heading) ); ?>

    <h1><?= esc_html__("Product $action", 'wp-my-product-webspark'); ?></h1>
    <p><?= sprintf(esc_html__('Product: %s', 'wp-my-product-webspark'), esc_html($product_name)); ?></p>
    <p><a href="<?= esc_url($author_url); ?>"><?= esc_html__('Author profile', 'wp-my-product-webspark'); ?></a></p>
    <p><a href="<?= esc_url($edit_url); ?>"><?= esc_html__('Edit product', 'wp-my-product-webspark'); ?></a></p>

<?php wc_get_template( 'emails/email-footer.php', ['site_title' => get_bloginfo( 'name' )] ); ?>
