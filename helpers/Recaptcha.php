<?php

namespace Pxl;

defined('ABSPATH') or die('Silence is golden.');

class Recaptcha
{

    /**
     * Validate recaptcha token
     *
     * @param  mixed $token token to validate
     * @return void
     */
    static function validate($token)
    {

        // Build POST request:
        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
        $recaptcha_secret = carbon_get_theme_option('pxl_recaptcha_site_secret');
        $recaptcha_response = $token;

        // Make and decode GET request:
        $response = wp_remote_get($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
        $body = wp_remote_retrieve_body($response);
        $recaptcha = json_decode($body);

        // Take action based on the score returned:
        if (isset($recaptcha->success) && $recaptcha->success) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * Print reCaptcha html elements
     *
     * @param  mixed $css_class
     * @return void
     */
    static function scripts($css_class = '.recaptcha_token')
    {
        $site_key = carbon_get_theme_option('pxl_recaptcha_site_key');
?>
        <script src="https://www.google.com/recaptcha/api.js?render=<?php echo esc_attr($site_key) ?>"></script>
        <script>
            function pxl_recaptcha_get_token() {
                grecaptcha.ready(function() {
                    grecaptcha.execute('<?php echo esc_attr($site_key) ?>', {
                        action: 'submit'
                    }).then(function(token) {
                        console.log('pxl_recaptcha_get_token()');
                        //console.log(token);
                        $('<?php echo esc_attr($css_class) ?>').val(token);
                    });
                });
            }
            pxl_recaptcha_get_token();
        </script>
<?php
    }
}
