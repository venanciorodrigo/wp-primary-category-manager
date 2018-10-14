<?php
/**
 * Plugin Name:  Primary Category Manager
 * Plugin URI:   http://rodrigovenancio.info
 * Description:  Gives you the ability to set a primary category on your posts.
 * Version:      1.0.0
 * Author:       Rodrigo Venancio
 * Author URI:   http://rodrigovenancio.info
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:  primary-category-manager
 * Domain Path:  /lang
 * License:      GPL2\
 *
 * @package PrimaryCategoryManager

 * Primary Category Manager is free software: you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation, either version 2 of the License, or
   any later version.

 * Primary Category Manager is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
   GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
   along with Primary Category Manager. If not, see {License URI}.
*/

/**
 * If this file is called directly, abort.
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Define the plugin path
 */
if ( ! defined( 'PCM_PATH' ) ) {
    define( 'PCM_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
}

/**
 * Define the plugin URL
 */
if ( ! defined( 'PCM_URL' ) ) {
    define( 'PCM_URL', trailingslashit( plugins_url( '', __FILE__ ) ) );
}

/**
 * Plugin Version
 *
 */
define( 'PRIMARY_CATEGORY_MANAGER_VERSION', '1.0.0' );

/**
 * Load the main admin class
 */
if ( is_admin() ) {
    require_once PCM_PATH . 'includes/pcm-admin.php';

    // Bootstrap
    PrimaryCategoryManager\PcmAdmin\setup();
}

require_once PCM_PATH . 'classes/pcm-frontend.php';
