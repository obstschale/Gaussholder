<?php
/**
 * Plugin Name: Gaussholder
 * Plugin URI: http://hmn.md/
 * Description: Quick and beautiful image placeholders using Gaussian blur.
 * Version: 0.1
 * Author: Human Made Limited
 * Author URI: http://hmn.md/
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Network: true
 */

namespace Gaussholder;

use WP_CLI;

define( __NAMESPACE__ . '\\PLUGIN_DIR', __DIR__ );

require_once __DIR__ . '/inc/class-plugin.php';
require_once __DIR__ . '/inc/frontend/namespace.php';
require_once __DIR__ . '/inc/jpeg/namespace.php';

if ( defined( 'WP_CLI' ) && WP_CLI ) {
	require_once __DIR__  . '/inc/class-wp-cli-command.php';
	WP_CLI::add_command( 'gaussholder', 'Gaussholder\\CLI_Command' );
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\\Frontend\\bootstrap' );
add_filter( 'wp_generate_attachment_metadata', __NAMESPACE__ .  '\\generate_placeholders_on_save', 10, 2 );

