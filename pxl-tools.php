<?php

/**
 * Plugin Name: Pxl Tools
 * Plugin URI:  https://gitlab.com/communicatti/pxl-tools
 * Text Domain: pxl-tools
 * Description: A Toolbelt for Wordpress development
 * Author:      Communicatti
 * Author URI:  http://communicatti.com
 * License:     GPL-2.0
 * License URI: https://opensource.org/licenses/GPL-2.0
 * Version:     1.1.26
 *
 *
 * @package pxl-tools
 * @author  Communicatti  <dev@communicatti.com>
 * @version 2023-12-21
 */

// CONSTANTS
define('PXL_PLUGIN_DIR', __DIR__);

// AUTOLOAD
require_once __DIR__ . '/vendor/autoload.php';

// HELPERS
require __DIR__ . '/helpers/Post.php';
require __DIR__ . '/helpers/Recaptcha.php';
require __DIR__ . '/helpers/Blade.php';
require __DIR__ . '/helpers/WhatsApp.php';
require __DIR__ . '/helpers/Theme.php';
require __DIR__ . '/helpers/Youtube.php';

// BOOTSTRAP/configs
require __DIR__ . '/bootstrap.php';

// PAGES
require __DIR__ . '/pages/admin.php';



//read custom dir/ and list options
function pxl_get_custom_options()
{
	//customizations_options
	$custom_path = PXL_PLUGIN_DIR . '/custom/';
	$custom_list = glob($custom_path . '**/*.php');
	$custom_options = array_map(function ($custom) use ($custom_path) {
		$option = str_replace($custom_path, '', $custom);
		return $option;
	}, $custom_list);
	return $custom_options;
}

//activate action on plugin activate
function pxl_plugin_activation_actions()
{
	do_action('pxl_plugin_extension_activation');
}
register_activation_hook(__FILE__, 'pxl_plugin_activation_actions');


// Set default values
function pxl_plugin_default_options()
{
	$custom = pxl_get_custom_options();
	update_option('pxl_custom_core', $custom);
}
add_action('pxl_plugin_extension_activation', 'pxl_plugin_default_options');


//deactivate actions
function pxl_plugin_deactivate()
{
	delete_option('pxl_custom_core');
	//flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'pxl_plugin_deactivate');
