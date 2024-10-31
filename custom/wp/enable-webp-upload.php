<?php


// enable webp

//** *Enable upload for webp image files.*/
function pxl_webp_upload_mimes($existing_mimes)
{
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}
add_filter('mime_types', 'pxl_webp_upload_mimes');

//** * Enable preview / thumbnail for webp image files.*/
function pxl_webp_is_displayable($result, $path)
{
    if ($result === false) {
        $displayable_image_types = array(IMAGETYPE_WEBP);
        $info = @getimagesize($path);

        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }

    return $result;
}
add_filter('file_is_displayable_image', 'pxl_webp_is_displayable', 10, 2);
