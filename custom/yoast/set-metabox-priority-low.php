<?php

// Move Yoast metabox to bottom
function pxl_yoast_set_metabox_priority_low()
{
    return 'low';
}
add_filter('wpseo_metabox_prio', 'pxl_yoast_set_metabox_priority_low');
