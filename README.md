# Joystick for WordPress

A handy little plugin to contain all your theme/plugin customizations, snippets, and modifications.

Think of this plugin as an alternative to adding code snippets to the `functions.php`, or `style.css` file in your child theme.

### Why?

This plugin keeps all of your project changes in one location, independent of the other components that make up your Wordpress website. That means you can **safely perform theme and/or plugin updates** without the fear of losing your modifications as well as easily deactivating your customizations to check for conflicts.

_Note:_

> This plugin doesn't actually do anything on its own. It is purely a convenient place for you to store your own theme/plugin customizations.

### Installation

1. Upload `flightdeck-joystick` to the `/wp-content/plugins/` directory
1. **OR** zip the `flightdeck-joystick` directory and upload using the WordPress uploader
1. Add your customizations to the plugin either locally or via `Plugins > Editor` in the Dashboard
1. Activate the plugin through the `Plugins` menu in WordPress
1. Done!

### Usage

- Add any CSS snippets to `custom/style.css`. This file is found in this plugin - only affects frontend.
- Add any PHP snippets to `custom/functions.php`. This file is found in this plugin.
- Add any jQuery snippets to `custom/custom.js`. This file is found in this plugin - only affects frontend.
- Add custom top level template files (page.php, single.php, etc) to `custom/templates/`. _You will need to create the templates folder_.
- Add any WooCommerce template files to `custom/templates/woocommerce`. You will need to create the templates and WooCommerce folders.
- Activate the plugin.

If you would like to add CSS/JS to the dashboard you can either add the below in two locations, `theme-customizations.php` or `functions.php`, ideally it should be added to the `functions.php`

```php
// Admin CSS
function fd_joystick_admin_mods() {
  wp_enqueue_style('admin-styles', plugin_dir_url( __FILE__ ) . '../admin.css'); // enqueue CSS
  wp_enqueue_script( 'admin-styles', plugin_dir_url( __FILE__ ) . '../admin.js' ); // enqueue JS
}
add_action('admin_enqueue_scripts', 'fd_joystick_admin_mods');
```

Customize the login screen only

```php
// Login CSS
function fd_joystick_login_style(){
    wp_enqueue_style( 'login_style', plugin_dir_url( __FILE__ ) . '../login.css' ); // enqueue CSS
}
add_action('login_enqueue_scripts','fd_joystick_login_style')
```

### Frequently Asked Questions

> Isn't this what child themes are for?

Well, kind of. Sure, you can put your modifications in a child theme, but there are many places (including woothemes.com and wordpress.org) to download and use child themes. If you decide to use a child theme built by a third party and make modifications there, you would lose them when performing updates. Also if you make all your modifications in your own custom child theme then realise that you want to use a child theme from your favorite theme vendor, you'll have to move all of your modifications somewhere else. To avoid that hassle, use this plugin.

> What templates can I override via this plugin?

As you know, to override a parent themes template file via child theme you can just copy/paste it into your child theme. This is the one drawback of using this plugin - you can only override top level templates - not template partials. This means that you could add a `page.php` template file to the `/custom/templates/` directory of this plugin and it would work fine. You could not however add a `header.php` or `footer.php` template file. Those would not work.

> Should I put all my customizations in this single plugin?

That's entirely up to you. There's nothing to stop you from duplicating this plugin and changing the name. That way you could theoretically keep each of your customizations in their own individual plugins. This can be very handy when debugging, or if you want to quickly enable/disable a specific customizations temporarily. _This is what we do here at Rainy Day Media_.
