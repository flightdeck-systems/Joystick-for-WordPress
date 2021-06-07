<?php
/**
 * Functions.php
 *
 * @package  Theme_Customizations
 * @author   RainyDayMedia
 * @since    1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//Admin CSS and JS
function flightdeck_launchpad(){
  wp_enqueue_style('admin-styles', plugin_dir_url(__FILE__) . 'custom-admin.css');
  wp_enqueue_script('admin-styles', plugin_dir_url(__FILE__) . 'custom-admin.js');
}
add_action('admin_enqueue_scripts', 'flightdeck_Launchpad');

/**
 * functions.php
 * Add PHP snippets here
 */
