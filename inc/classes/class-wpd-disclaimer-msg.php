<?php

/**
 * Class to Handle Disclaimer
 */
class WPD_Disclaimer_Msg {

    function __construct() {
        add_action('woocommerce_after_shop_loop_item', array($this,'wpd_add_disclaimer'));
		add_action('woocommerce_after_single_product', array($this,'wpd_add_disclaimer'));
    }

    function wpd_add_disclaimer() {
        global $post, $product;

        $cat = null;
        $message = carbon_get_theme_option('wpd_general_disclaimer_message');
        $rejectURL = carbon_get_theme_option('wpd_general_reject_url');

        $html = '<input type="hidden" id="check' . $post->ID . '" value="yes">';
        $html .= '<input type="hidden" id="message' . $post->ID . '" value="' . $message . '">';
        $html .= '<input type="hidden" id="url' . $post->ID . '" value="' . $rejectURL . '">';

        // Localize the script with new data
        $disclaimer = array(
            'wpd_admin_ajax_url' => admin_url('admin-ajax.php'),
            'wpd_discl_general_activate' => carbon_get_theme_option('wpd_activate_general_disclaimer'),
            'wpd_add_cart_class' => carbon_get_theme_option('wpd_add_to_cart_class_list_page'),
            'wpd_general_discl_msg' => carbon_get_theme_option('wpd_general_disclaimer_message'),
            'wpd_general_reject_url' => carbon_get_theme_option('wpd_general_reject_url'),
            'wpd_discl_accept_btn' => carbon_get_theme_option('wpd_accept_button_label'),
            'wpd_discl_reject_btn' => carbon_get_theme_option('wpd_reject_button_label'),
            'wpd_cart_redirect_after_add' => get_option('woocommerce_cart_redirect_after_add'),
            'wpd_woo_cart_page_id' => get_option( 'woocommerce_cart_page_id' ),
            'wpd_message' => $message,
            'wpd_current_prod_id' => $post->ID,
            'wpd_site_url' => site_url(),
        );
        wp_localize_script( 'wpd_handle_localize', 'wpd_localize', $disclaimer );

        // Enqueued script with localized data.
        wp_enqueue_script( 'wpd_handle_localize' );

        echo $html;
    }
}