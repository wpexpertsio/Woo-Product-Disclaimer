<?php
/**
 * Plugin Name: Woocommerce Product Disclaimer
 * Description: This plugin creates disclaimers for woocommerce products just before adding them to cart
 * Version: 1.0.3
 * Author: wpexperts.io
 * Author URI: https://wpexperts.io/
 * License: GPL
 * Text Domain: wpd_disclaimer
 */

define('WPD_DISCLAIMER_URL', plugin_dir_url( __FILE__ ) );

function wpd_scripts_styles() {
    wp_enqueue_style( 'wpd-alertify-css', WPD_DISCLAIMER_URL . 'css/alertify.bootstrp.css');
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'wpd-alertify-js', WPD_DISCLAIMER_URL . 'js/alertify.js');
    wp_register_script( 'wpd_handle_localize', WPD_DISCLAIMER_URL . 'js/wpd-shop-disclaimer.js' );
}
add_action( 'wp_enqueue_scripts', 'wpd_scripts_styles' );

include 'inc/carbon-fields/carbon-fields-plugin.php';

// Class Disclaimer Initialize
include 'inc/classes/class-wpd-init.php';
$wpd_init = new WPD_Init();
// WPD Setting Page
include 'inc/wpd-settings.php';
// Class Disclaimer Message
include 'inc/classes/class-wpd-disclaimer-msg.php';
$wpd_disclaimer_msg = new WPD_Disclaimer_Msg();