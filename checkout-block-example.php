<?php
/**
 * Plugin Name: Custom fields for checkout block
 * Plugin URI: https://www.tychesoftwares.com/store/premium-plugins/order-delivery-date-for-woocommerce-pro-21/
 * Description: This plugin allows customers to choose their preferred Order Delivery Date during checkout.
 * Author: Tyche Softwares
 * Version: 1.0.0
 * Author URI: https://www.tychesoftwares.com/
 * Contributor: Tyche Softwares, https://www.tychesoftwares.com/
 * Text Domain: order-delivery-date
 * Requires PHP: 5.6
 * WC requires at least: 3.0.0
 * WC tested up to: 7.1.0
 *
 * @package  Order-Delivery-Date-Lite-for-WooCommerce
 */


 require_once 'checkout-blocks-initialize.php';

class Checkout_Block_Example {

    public function __construct() {
        add_action( 'woocommerce_store_api_checkout_update_order_from_request', array( $this, 'orddd_update_block_order_meta_delivery_date' ), 10, 2 );
        add_action( 'woocommerce_admin_order_data_after_order_details', array( $this, 'display_delivery_date_on_admin_order_details' ) );
        add_action( 'woocommerce_order_details_after_order_table_items', array( $this, 'display_delivery_date_on_thankyou_page' ) );
    }

    public function orddd_update_block_order_meta_delivery_date( $order, $request ) {
        $data = isset( $request['extensions']['checkout-block-example'] ) ? $request['extensions']['checkout-block-example'] : array();

        // Update the order meta with the delivery date from the request
        if ( isset( $data['delivery_date'] ) ) {
            $order->update_meta_data( 'Delivery Date', $data['delivery_date'] );
            $order->save(); // Save the order to persist changes
        }
    }

    public function display_delivery_date_on_admin_order_details( $order ) {
        $delivery_date = $order->get_meta( 'Delivery Date', true );

        if ( $delivery_date ) {
            echo '<div class="delivery-date">';
            echo '<p><strong>' . esc_html__( 'Delivery Date:', 'checkout-block-example' ) . '</strong> ' . esc_html( $delivery_date ) . '</p>';
            echo '</div>';
        }
    }

    public function display_delivery_date_on_thankyou_page( $order_id ) {
        $order = wc_get_order( $order_id );
        $delivery_date = $order->get_meta( 'Delivery Date', true );

        if ( $delivery_date ) {
            echo '<p>' . esc_html__( 'Delivery Date:', 'checkout-block-example' ) . ' ' . esc_html( $delivery_date ) . '</p>';
        }
    }
}

$checkout_block_example = new Checkout_Block_Example();
