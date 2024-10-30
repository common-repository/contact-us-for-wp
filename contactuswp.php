<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://contactuswp.com
 * @since             1.0.0
 * @package           Contactuswp
 *
 * @wordpress-plugin
 * Plugin Name:       Contact Us for WP
 * Plugin URI:        https://contactuswp.com
 * Description:       A button to reach us anywhere. Contact us form with floating icon on all pages.
 * Version:           2.3.3
 * Author:            Sparkodes
 * Author URI:        https://sparkodes.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       contactuswp
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CONTACTUSWP_VERSION', '2.3.3' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-contactuswp-activator.php
 */
function activate_contactuswp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-contactuswp-activator.php';
	Contactuswp_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-contactuswp-deactivator.php
 */
function deactivate_contactuswp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-contactuswp-deactivator.php';
	Contactuswp_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_contactuswp' );
register_deactivation_hook( __FILE__, 'deactivate_contactuswp' );

add_filter( 'plugin_row_meta', 'contactuswp_plugin_row_meta', 10, 2 );
 
function contactuswp_plugin_row_meta( $links, $file ) {    
    if ( plugin_basename( __FILE__ ) == $file ) {
        $row_meta = array(
          'feedback'    => '<a href="' . esc_url( 'https://awebsitetosparkle.typeform.com/to/ERHpjV' ) . '" target="_blank" aria-label="' . esc_attr__( 'Contact Us for WP', 'domain' ) . '" style="color:blue;">' . esc_html__( 'Feedback', 'domain' ) . '</a>'
        );
 
        return array_merge( $links, $row_meta );
    }
    return (array) $links;
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-contactuswp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_contactuswp() {

	$plugin = new Contactuswp();
	$plugin->run();

}
run_contactuswp();
