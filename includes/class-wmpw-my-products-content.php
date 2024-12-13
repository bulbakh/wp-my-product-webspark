<?php

namespace Wp_My_Product_Webspark;

use WP_Query;

defined('ABSPATH') || exit;

class WMPW__My_Products_Content
{
    public function __invoke(): void
    {
        if (!class_exists('WooCommerce')) {
            echo '<p>'.esc_html__('WooCommerce is not installed or activated.', 'wp-my-product-webspark').'</p>';
            return;
        }

        // Тут виводимо список продуктів (всі, або для конкретного користувача)
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1, // Вивести всі продукти
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            echo '<ul class="wmpw-products-list">';
            while ($query->have_posts()) {
                $query->the_post();
                echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
            }
            echo '</ul>';
            wp_reset_postdata();
        } else {
            echo '<p>'.esc_html__('No products found.', 'wp-my-product-webspark').'</p>';
        }
    }
}