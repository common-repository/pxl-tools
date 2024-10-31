<?php

namespace Pxl;

defined('ABSPATH') or die('Silence is golden.');

class Post
{

    /**
     * Get a featured post URL or a $default 
     *
     * @param  mixed $post_id WP post id
     * @param  string $default default URL if featured image dont found
     * @param  string $size image size
     * @return string
     */
    public static function image($post_id, $default = null, $size = 'single-post-thumbnail')
    {
        $image = wp_get_attachment_image_src(get_post_thumbnail_id((int)$post_id), $size);
        return $image[0] ?? $default;
    }

    /**
     * Get a featured post URL or a $default 
     *
     * @param  mixed $post_id WP post id
     * @param  string $default default URL if featured image dont found
     * @param  string $size image size
     * @return string
     */
    public static function attachment_image($image_id, $default = null, $size = 'single-post-thumbnail')
    {
        $image = wp_get_attachment_image_src(((int)$image_id), $size);
        return $image[0] ?? $default;
    }

    /**
     * Get post meta
     *
     * @param  mixed $post_id Wordpress post id
     * @param  mixed $key meta key
     * @param  mixed $single sigle value (bool)
     * @return mixed
     */
    public static function meta($post_id, $key, bool $single = true)
    {
        return get_post_meta($post_id, $key, $single);
    }

    /**
     * Get post permalink by slug
     *
     * @param  mixed $slug post slug
     * @return string
     */
    public static function permalink_by_slug($slug = '')
    {
        return get_permalink(get_page_by_path($slug));
    }

    /**
     * Get taxonomy name
     *
     * @param  mixed $post_id post id
     * @param  mixed $taxonomy taxonomy
     * @return void
     */
    public static function taxonomy_name($post_id, $taxonomy)
    {
        $terms = wp_get_post_terms($post_id, $taxonomy, ['fields' => 'names']);
        return $terms[0] ?? null;
    }

    /**
     * Get wordpress paginations links
     *
     * @param  array $args https://developer.wordpress.org/reference/functions/get_posts/ args
     * @param  int $per_page results per page
     * @param  array $paginate_args https://developer.wordpress.org/reference/functions/paginate_links/ args
     * @return array
     */
    public static function pagination($args = [], $per_page = 4, $paginate_args = [])
    {

        $args['posts_per_page'] = -1;
        unset($args['paged']);

        $query = new \WP_Query($args);
        $published_count = $query->found_posts;

        $big = 999999999;
        $total_posts = ceil($published_count / $per_page);

        $default_paginate_args = [
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $total_posts,
            'type' => 'array',
            'prev_text' => '<<',
            'next_text' => '>>',
        ];

        $paginate_links_args = array_merge($default_paginate_args, $paginate_args);

        $pagination = paginate_links($paginate_links_args);

        return is_array($pagination) ? $pagination : [];
    }


    /**
     * Map ID, slug, title and permalink posts list.
     *
     * use get_posts() to select posts https://developer.wordpress.org/reference/functions/get_posts/
     *
     * @param array $args to pass for get_posts() function
     *
     * @return array
     */
    public static function get_posts_keys($args = [])
    {
        $posts = get_posts($args);
        $list = array_map(function ($p) {
            $ID         = $p->ID;
            $slug       = $p->post_name;
            $title      = get_the_title($ID);
            $permalink  = get_the_permalink($ID);
            return compact('ID', 'slug', 'title', 'permalink');
        }, $posts);
        return $list;
    }
}
