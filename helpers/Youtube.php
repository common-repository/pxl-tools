<?php

namespace Pxl;

defined('ABSPATH') or die('Silence is golden.');

class Youtube
{

    /**
     * Get a embeded url 
     *
     * @param  string $url url of video on youtube     
     */
    public static function get_embed_url($url = null, $default = null)
    {
        parse_str(parse_url($url, PHP_URL_QUERY), $params);
        $video_id = isset($params['v']) ? $params['v'] : null;
        if ($video_id) {
            return '//www.youtube.com/embed/' . $video_id;
        }

        if (strpos($url, 'embed')) {
            return $url;
        }

        return $default;
    }
}
