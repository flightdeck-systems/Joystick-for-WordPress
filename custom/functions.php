<?php
/**
 * Functions.php
 *
 * @package  Theme_Customizations
 * @author   Flightdeck Crew
 * @since    1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//Admin CSS and JS
function flightdeck_joystick(){
  wp_enqueue_style('admin-styles', plugin_dir_url(__FILE__) . 'admin.css');
  wp_enqueue_script('admin-styles', plugin_dir_url(__FILE__) . 'admin.js');
}
add_action('admin_enqueue_scripts', 'flightdeck_joystick');

/**
 * functions.php
 * Add PHP snippets here
 */
