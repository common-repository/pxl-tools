<?php

//stop enumerate users
function pxl_stop_users_enumerate($redirect, $request)
{
    //permalink URL format
    if (preg_match('/\?author=([0-9]*)(\/*)/i', $request)) {
        die();
    } else {
        return $redirect;
    }
}

if (!is_admin()) {
    // default URL format
    $qs = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '';
    if (preg_match('/author=([0-9]*)/i', $qs)) {
        wp_redirect(get_option('home'), 302);
        exit;
    }
    add_filter('redirect_canonical', 'pxl_stop_users_enumerate', 10, 2);
}
