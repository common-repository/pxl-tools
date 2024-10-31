<?php


function pxl_remove_quick_edit_links( $actions ) {
    //quick edit
    unset($actions['inline hide-if-no-js']);
    //view
    unset($actions['view']);
    return $actions;
}

add_filter('post_row_actions','pxl_remove_quick_edit_links',10,1);
