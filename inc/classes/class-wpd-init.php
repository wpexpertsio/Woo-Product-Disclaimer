<?php

/**
 * Class WPD_Init
 */
class WPD_Init {

    function __construct() {
        add_action('activated_plugin',array($this,'wpd_check_required_plugin_activation'),99);
    }

    // Check for Plugins Activation
    function wpd_check_required_plugin_activation() {

        // Check For Pro Activation
        if(is_plugin_active( 'woocommerce-disclaimer/woocommerce-disclaimer.php' )) {
            deactivate_plugins( 'woocommerce-product-disclaimer/woocommerce-product-disclaimer.php' ); // Deactivate the plugin
        }

        // Check For WooCommerce Activation
        if(!is_plugin_active( 'woocommerce/woocommerce.php' ) && is_plugin_active( 'woocommerce-product-disclaimer/woocommerce-product-disclaimer.php' )) { // When WooCommerce is not activated
            deactivate_plugins( 'woocommerce-product-disclaimer/woocommerce-product-disclaimer.php' ); // Deactivate the plugin
            wp_die( '<b>'.__('WooCommerce Product Disclaimer','wpd').'</b> '.__('requires you to install & activate','wpd').'<b> '.__('WooCommerce Plugin','wpd').'</b> '.__('before activating it!','wpd').'<br><br><a href="javascript:history.back()"><< '.__('Go Back To Plugins Page','wpd').'</a>' );
        }
    }

}