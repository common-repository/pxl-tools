<?php

add_filter('rest_endpoints', 'pxl_api_disable_default_endpoints');

function pxl_api_disable_default_endpoints( $endpoints ) {

    //array keys
    $endpoints_to_remove = array_flip([
        '/oembed/1.0',
        '/oembed/1.0/proxy',
        '/wp/v2',
        '/wp/v2/media',
        '/wp/v2/types',
        '/wp/v2/statuses',
        '/wp/v2/taxonomies',
        '/wp/v2/tags',
        '/wp/v2/users',
        '/wp/v2/users/(?P<id>[\d]+)',
        '/wp/v2/users/(?P<user_id>(?:[\d]+|me))/application-passwords',
        '/wp/v2/comments',
        '/wp/v2/settings',
        '/wp/v2/themes',
        '/wp/v2/themes/(?P<stylesheet>[\w-]+)',
        '/wp/v2/blocks',
        '/wp/v2/block-types',
        '/wp/v2/block-types/(?P<namespace>[a-zA-Z0-9_-]+)',
        '/wp/v2/block-types/(?P<namespace>[a-zA-Z0-9_-]+)/(?P<name>[a-zA-Z0-9_-]+)',
        '/wp/v2/oembed',
        '/wp/v2/posts',
        '/wp/v2/posts/(?P<id>[\d]+)',
        '/wp/v2/posts/(?P<parent>[\d]+)/revisions',
        '/wp/v2/posts/(?P<parent>[\d]+)/revisions/(?P<id>[\d]+)',
        '/wp/v2/posts/(?P<id>[\d]+)/autosaves',
        '/wp/v2/pages',
        '/wp/v2/block-renderer',
        '/wp/v2/search',
        '/wp/v2/categories'
    ]);

    $allowed = array_diff_key($endpoints, $endpoints_to_remove);

    return $allowed;
}