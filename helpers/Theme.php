<?php

namespace Pxl;

defined('ABSPATH') or die('Silence is golden.');

class Theme
{

    /**
     * Get a theme option. Setted in settings.php
     *
     * @param  string $option WP post id
     * @return mixed
     */
    public static function option($option)
    {
        return carbon_get_theme_option($option);
    }


    /**
     * Get a theme uri.
     *
     * @param  string $append string to append uri
     * @return string
     */
    public static function uri($append = '')
    {
        return get_template_directory_uri() . $append;
    }
}
