<?php

function pxl_hide_permalinks($return)
{
    return '';
}

add_filter('get_sample_permalink_html', 'pxl_hide_permalinks');
