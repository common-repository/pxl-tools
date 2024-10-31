<?php
//disable seo menu from non admin
function pxl_remove_wpseo_menus() {
    global $current_user;
    if(!current_user_can('administrator')) {
        remove_menu_page('wpseo_workouts');
		remove_menu_page('wpseo_dashboard');
		remove_submenu_page('wpseo_dashboard', 'wpseo_dashboard');
		remove_submenu_page('wpseo_dashboard', 'wpseo_titles');
		remove_submenu_page('wpseo_dashboard', 'wpseo_social');
		remove_submenu_page('wpseo_dashboard', 'wpseo_tools');
		remove_submenu_page('wpseo_dashboard', 'wpseo_licenses');
		remove_submenu_page('wpseo_dashboard', 'wpseo_workouts');
    }
}
//add_action('admin_init', 'remove_wpseo_menus');
add_action('admin_menu', 'pxl_remove_wpseo_menus', 11);

