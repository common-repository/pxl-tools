<?php
//disable seo menu from non admin
function pxl_remove_cookie_consent_banner_plugin_menus()
{
    global $current_user;
    if (!current_user_can('administrator')) {
        remove_menu_page('cncb_options');
    }
}
//add_action('admin_init', 'remove_wpseo_menus');
add_action('admin_menu', 'pxl_remove_cookie_consent_banner_plugin_menus', 11);
