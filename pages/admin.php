<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;


function pxl_crb_attach_theme_options()
{
    $custom_options = pxl_get_custom_options();
    $core_customs = array_combine($custom_options, $custom_options);

    Container::make('theme_options', __('Pxl'))
        ->where('current_user_role', 'IN', array('administrator'))
        ->set_icon('dashicons-screenoptions')
        ->set_page_menu_position(100)
        ->add_fields(array(
            Field::make('separator', 'pxl_separator_core', 'Core'),
            Field::make('multiselect', 'pxl_custom_core', 'Customizações')
                ->add_options($core_customs)
        ));
}

add_action('carbon_fields_register_fields', 'pxl_crb_attach_theme_options', 100);
