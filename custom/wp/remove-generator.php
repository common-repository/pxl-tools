<?php 

remove_action('wp_head', 'wp_generator');


function pxl_core_remove_version() {
    return '';
}
add_filter('the_generator', 'pxl_core_remove_version');