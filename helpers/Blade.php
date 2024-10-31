<?php 


/**
* 
* defined( 'ABSPATH' ) or die( 'Silence is golden.' );
* 
* $data = [];
* 
* $blade = \Pxl\Blade::instance(__DIR__.'/views');
* echo $blade->render("index", $data);
*/

namespace Pxl;

defined( 'ABSPATH' ) or die( 'Silence is golden.' );

class Blade{
    
    /**
     * Return a Blade template instance
     *
     * @param  mixed $views_path
     * @param  mixed $cache_path
     * @return void
     */
    public static function instance($views_path = null, $cache_path = null){
        $views_path = $views_path ?? './';
        $cache_path = $cache_path ?? sys_get_temp_dir().'/pxl-blade-'.md5(AUTH_KEY);
        return new \duncan3dc\Laravel\BladeInstance($views_path, $cache_path);
    }
}
