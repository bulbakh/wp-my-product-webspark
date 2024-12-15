<?php
/**
 * Template for displaying my products page.
 *
 * @var array $products Products.
 * @var array $pagination Pagination data.
 */

defined('ABSPATH') || exit;

if (empty($products)) : ?>
    <p><?= esc_html__('No products found.', 'wp-my-product-webspark'); ?></p>
    <?php
    return; endif; ?>

<h2><?= esc_html__('My products', 'wp-my-product-webspark'); ?></h2>

<table class="wmpw-products-table">
    <thead>
    <tr>
        <th><?= esc_html__('Product name', 'wp-my-product-webspark'); ?></th>
        <th><?= esc_html__('Quantity', 'wp-my-product-webspark'); ?></th>
        <th><?= esc_html__('Price', 'wp-my-product-webspark'); ?></th>
        <th><?= esc_html__('Status', 'wp-my-product-webspark'); ?></th>
        <th><?= esc_html__('Edit', 'wp-my-product-webspark'); ?></th>
        <th><?= esc_html__('Delete', 'wp-my-product-webspark'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($products as $product) : ?>
        <tr>
            <td><?= esc_html($product['name']); ?></td>
            <td><?= esc_html($product['quantity']); ?></td>
            <td><?= $product['price']; ?></td>
            <td><?= esc_html($product['status']); ?></td>
            <td>
                <a href="<?= esc_url($product['edit_url']); ?>"><?= esc_html__(
                            'Edit',
                            'wp-my-product-webspark'
                        ); ?></a>
            </td>
            <td>
                <button><a href="<?= esc_url($product['delete_url']); ?>" class="wmpw-delete-product"
                           onclick="return confirm('<?= esc_js(
                               __('Are you sure you want to delete this product?', 'wp-my-product-webspark')
                           ); ?>');">
                        <?= esc_html__('Delete', 'wp-my-product-webspark'); ?>
                    </a></button>
            </td>
        </tr>
    <?php
    endforeach; ?>
    </tbody>
</table>

<!-- Пагінація -->
<div class="wmpw-pagination">
    <?= paginate_links(array(
        'total' => $pagination['total'],
        'current' => $pagination['current'],
        'format' => '?paged=%#%',
        'prev_text' => __('« Previous', 'wp-my-product-webspark'),
        'next_text' => __('Next »', 'wp-my-product-webspark'),
    )); ?>
</div>
