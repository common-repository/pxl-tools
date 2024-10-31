<?php


//Carbon fields - core custom

function pxl_crb_values_are_available()
{

	//core customizations
	$custom_core_options = carbon_get_theme_option('pxl_custom_core');
	foreach ((array)$custom_core_options as $custom) {
		$custom_path = PXL_PLUGIN_DIR . '/custom/' . $custom;
		if (is_file($custom_path)) {
			require_once $custom_path;
		}
	}
}

add_action('carbon_fields_fields_registered', 'pxl_crb_values_are_available', 500);

add_filter('carbon_fields_theme_options_container_admin_only_access', '__return_false');
