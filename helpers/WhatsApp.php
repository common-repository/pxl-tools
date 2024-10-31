<?php 

namespace Pxl;

defined( 'ABSPATH' ) or die( 'Silence is golden.' );

class WhatsApp{
    
    /**
     * Get a custom or default theme WhatsApp API URL 
     *
     * @param  string $message custom message or default theme WhatsApp Message 
     * @param  string $phone custom phone number or default theme WhatsApp Number 
     * @return string $url WhatsApp API URL
     */
    public static function get_api_url($message = null, $phone = null){
        
        $number = ($phone) ?? carbon_get_theme_option('pxl_data_whatsapp_number');
        $number = trim(preg_replace("/[^0-9]/", "",$number));

        $text = ($message) ?? carbon_get_theme_option('pxl_data_whatsapp_message');

        $url = "https://api.whatsapp.com/send?phone=" . $number;
        $url .= "&text=" . urlencode($text);

        return $url;
    }
    
}