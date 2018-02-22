<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('theme_options', __('Disclaimer Settings','wpd_disclaimer'))
    ->set_icon('dashicons-warning')
    ->add_tab(__('Disclaimer','wpd_disclaimer'), array(
        Field::make("checkbox", "wpd_activate_general_disclaimer",__( "Activate General Disclaimer","wpd_disclaimer"))
            ->set_option_value('yes'),
        Field::make("textarea", "wpd_general_disclaimer_message", __("General Disclaimer Message","wpd_disclaimer"))
            ->set_rows(4),
        Field::make('text', 'wpd_general_reject_url', __("General Reject URL","wpd_disclaimer")),
        Field::make("html", "wpd_information_text_two")
            ->set_html('<b>Note:</b> This disclaimer will be applied to all products if the general disclaimer is activated.'),
    ))




    ->add_tab(__('Buttons Labels','wpd_disclaimer'), array(
        Field::make('text', 'wpd_accept_button_label',__("Accept Button Label","wpd_disclaimer"))->set_default_value( 'Accept' ),
        Field::make('text', 'wpd_reject_button_label',__("Reject Button Label","wpd_disclaimer"))->set_default_value( 'Reject' ),
    ))

    ->add_tab(__('Add to Cart Classes','wpd_disclaimer'), array(
        Field::make('text', 'wpd_add_to_cart_class_list_page',__("Add to Cart Class (List Page)","wpd_disclaimer"))->set_default_value( 'add_to_cart_button' ),
        Field::make('text', 'wpd_add_to_cart_class_single_page',__("Add to Cart Class (Single Page)","wpd_disclaimer"))->set_default_value( 'single_add_to_cart_button' ),
        Field::make("html", "wpd_information_text_three")
            ->set_html('<b>Note:</b> Do not change these values unless you override the default classes of add to cart buttons (add_to_cart_button - single_add_to_cart_button).'),
    ))

    ->add_tab(__('Disclaimer Style <span class="pro-text">PRO</span>'), array(
        Field::make("html", "wpd_disclaimer_style")
        ->set_html('<h2>What Disclaimer Styles I Get In Pro?</h2>
                    <ul class="wpd-list-features">
                        <li>Option to Change Font Family</li>
                        <li>Option to Change Font Size</li>
                        <li>Option to Change Background Color</li>
                        <li>Option to Change Message Color</li>
                        <li>Option to Change Border Color</li>
                        <li>Option to Change Buttons Background Color</li>
                        <li>Option to Change Accept Button Color</li>
                        <li>Option to Change Accept Text Color</li>
                        <li>Option to Change Reject Button Color</li>
                        <li>Option to Change Reject Text Color</li>
                    </ul>

                    <p class="wpd-doc-link"><a href="https://goo.gl/pMqY6J">want to know more features about PRO?</a></p>
                    <p class="wpd-pro-link"><a href="https://goo.gl/pMqY6J">GET PRO NOW</a></p>'

        ),));