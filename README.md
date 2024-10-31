# Pxl

A Toolbelt for Wordpress development

## Namespace

    \Pxl

---

## Helpers

### Blade

Use a Blade template engine

#### instance()

Get a Blade instance

    $blade = \Pxl\Blade::instance($views_path = null, $cache_path = null);

- if **\$views_path** is null, the current dir is defined

- if **\$cache_path** is null, the fold with AUTH_KEY name in sys_get_temp_dir() is defined

### Post

#### image()

Return a post featured image URL if is set or \$defaultURL

    $image = \Pxl\Post::image($post_id, $default = null);

Return a post featured image by size URL if is set or \$defaultURL

    $image = \Pxl\Post::image($post_id, $default, 'custom-image-size');

- [add_image_size](https://developer.wordpress.org/reference/functions/add_image_size/)

#### meta()

Return a post meta value(s)

    $meta = \Pxl\Post::meta($post_id, $key, bool $single = true);

#### permalink_by_slug()

Return a permalink by slug

     $permalink = \Pxl\Post::permalink_by_slug($slug);

#### taxonomy_name()

Return a taxonomy name

    $taxonomy_name = \Pxl\Post::taxonomy_name($post_id, $taxonomy);

#### pagination()

Return a posts pagination

    $pagination = \Pxl\Post::pagination($args = [], $per_page = 6, $paginate_args = []);

- **\$args** see get_posts - https://developer.wordpress.org/reference/functions/get_posts/

- **\$args** array $paginate_args https://developer.wordpress.org/reference/functions/paginate_links/

#### get_posts_keys()

Get a list with posts keys (ID, slug, permalink, title)

    $posts_keys = get_posts_keys($args = []);

- **\$args** see get_posts - https://developer.wordpress.org/reference/functions/get_posts/

### Theme

#### uri()

Return theme uri. You can append string to return

    $url = \Pxl\Theme::uri();

    //http://localhost:8080/wp-content/themes/mytheme


    $jsfile = \Pxl\Theme::uri('/assets/js/script.js');

    //http://localhost:8080/wp-content/themes/mytheme/assets/js/script.js

### Recaptcha

#### get_posts_keys()

Validate token, return a boolean

    $valid = \Pxl\Recaptcha::validate($token);

#### scripts()

Print reCaptcha scripts

    \Pxl\Recaptcha::scripts($css_class = '.recaptcha_token')

- **\$css_class** class to recaptcha script populate after get token

Recaptcha Vars:

        $recaptcha_secret = carbon_get_theme_option('pxl_recaptcha_site_secret');

        $site_key = carbon_get_theme_option('pxl_recaptcha_site_key');

### WhatsApp

#### get_api_url()

Return a custom or default WhatsApp API URL

    $api_url = \Pxl\WhatsApp::get_api_url($message, $phone);


### Youtube

#### get_embeded_url()

Return embeded url from video url

    $embeded_url = \Pxl\Youtube::get_embed_url($url, $defaultUrl);



---

### Packages

- [Carbon Fields](https://carbonfields.net/)

* [Blade](https://github.com/duncan3dc/blade/)

* [php-form](https://github.com/rlanvin/php-form)

## Plugins

- [Adminimize](https://wordpress.org/plugins/adminimize/)

- [Advanced Custom Fields](https://www.advancedcustomfields.com/)

- [Carbon Fields](https://carbonfields.net/release-archive/)

- [Classic Editor](https://wordpress.org/plugins/classic-editor/)

- [Custom Post Type UI](https://github.com/WebDevStudios/custom-post-type-ui/)

- [MainWP Child](https://mainwp.com/)
