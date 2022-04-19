<?php
/**
 * Plugin Name:        ▶︎ Joystick
 * Description:       A handy little plugin to contain your theme/plugin customizations snippets and modifications.
 * Plugin URI:        http://github.com/flight-deck/Joystick-for-WordPress
 * Version:           1.0.0
 * Author:            Flightdeck Crew
 * Author URI:        https://flightdeck.systems/
 * Requires at least: 3.0.0
 * Tested up to:      4.4.2
 *
 * @package Theme_Customizations
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Theme_Customizations Class
 *
 * @class Theme_Customizations
 * @version	1.0.0
 * @since 1.0.0
 * @package	Theme_Customizations
 */
final class Theme_Customizations {

	/**
	 * Set up the plugin
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'theme_customizations_setup' ), -1 );
		require_once( 'custom/functions.php' );
	}

	/**
	 * Setup all the things
	 */
	public function theme_customizations_setup() {
		add_action( 'wp_enqueue_scripts', array( $this, 'theme_customizations_css' ), 999 );
		add_action( 'wp_enqueue_scripts', array( $this, 'theme_customizations_js' ) );
		add_filter( 'template_include',   array( $this, 'theme_customizations_template' ), 11 );
		add_filter( 'wc_get_template',    array( $this, 'theme_customizations_wc_get_template' ), 11, 5 );
	}

	/**
	 * Enqueue the CSS
	 *
	 * @return void
	 */
	public function theme_customizations_css() {
		wp_enqueue_style( 'custom-css', plugins_url( '/custom/styles.css', __FILE__ ) );
	}

	/**
	 * Enqueue the Javascript
	 *
	 * @return void
	 */
	public function theme_customizations_js() {
		wp_enqueue_script( 'custom-js', plugins_url( '/custom/scripts.js', __FILE__ ), array( 'jquery' ) );
	}

	/**
	 * Look in this plugin for template files first.
	 * This works for the top level templates (IE single.php, page.php etc). However, it doesn't work for
	 * template parts yet (content.php, header.php etc).
	 *
	 * Relevant trac ticket; https://core.trac.wordpress.org/ticket/13239
	 *
	 * @param  string $template template string.
	 * @return string $template new template string.
	 */
	public function theme_customizations_template( $template ) {
		if ( file_exists( untrailingslashit( plugin_dir_path( __FILE__ ) ) . '/custom/templates/' . basename( $template ) ) ) {
			$template = untrailingslashit( plugin_dir_path( __FILE__ ) ) . '/custom/templates/' . basename( $template );
		}

		return $template;
	}

	/**
	 * Look in this plugin for WooCommerce template overrides.
	 *
	 * For example, if you want to override woocommerce/templates/cart/cart.php, you
	 * can place the modified template in <plugindir>/custom/templates/woocommerce/cart/cart.php
	 *
	 * @param string $located is the currently located template, if any was found so far.
	 * @param string $template_name is the name of the template (ex: cart/cart.php).
	 * @return string $located is the newly located template if one was found, otherwise
	 *                         it is the previously found template.
	 */
	public function theme_customizations_wc_get_template( $located, $template_name, $args, $template_path, $default_path ) {
		$plugin_template_path = untrailingslashit( plugin_dir_path( __FILE__ ) ) . '/custom/templates/woocommerce/' . $template_name;

		if ( file_exists( $plugin_template_path ) ) {
			$located = $plugin_template_path;
		}

		return $located;
	}
} // End Class

/**
 * The 'main' function
 *
 * @return void
 */
function theme_customizations_main() {
	new Theme_Customizations();
}

/**
 * Initialise the plugin
 */
add_action( 'plugins_loaded', 'theme_customizations_main' );
