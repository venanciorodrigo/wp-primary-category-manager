<?php
/**
 * Main class to manage the plugin on WP-ADMIN
 *
 * @package PrimaryCategoryManager
 */

namespace PrimaryCategoryManager\PcmCore;

use PrimaryCategoryManager\PcmAdmin;
use PrimaryCategoryManager\Utils;

/**
 * Default setup routine
 *
 * @return void
 */
function setup() {
    $n = function( $function ) {
        return __NAMESPACE__ . "\\$function";
    };

    add_action( 'init', $n( 'i18n' ) );
    add_action( 'init', $n( 'init' ) );
    add_action( 'admin_enqueue_scripts', $n( 'enqueue_scripts' ) );
    add_action( 'admin_enqueue_scripts', $n( 'enqueue_styles' ) );
    add_action( 'admin_footer', $n('admin_footer'));
    add_action( 'save_post', function() {
        PcmAdmin::save_primary_category();
    });
}

/**
 * Registers the default textdomain.
 *
 * @return void
 */
function i18n() {
    $locale = apply_filters( 'plugin_locale', get_locale(), 'primary-category-manager' );
    load_textdomain( 'primary-category-manager', WP_LANG_DIR . '/primary-category-manager/primary-category-manager-' . $locale . '.mo' );
    load_plugin_textdomain( 'primary-category-manager', false, plugin_basename( PCM_PATH ) . '/lang/' );
}

/**
 * Initializes the plugin and fires an action other plugins can hook into.
 *
 * @return void
 */
function init() {
    do_action( 'pcm_init' );
}

/**
 * Activate the plugin
 *
 * @return void
 */
function activate() {
    init();
}

/**
 * Enqueues all scripts.
 *
 * @return void
 *
 */
function enqueue_scripts() {
    if (Utils\is_post_screen()) {
        wp_register_script( 'pcm-category-box', PCM_URL . 'assets/js/category-box.min.js', ['jquery'], PRIMARY_CATEGORY_MANAGER_VERSION, true );
        wp_enqueue_script( 'pcm-category-box' );

        $category_selected = [];

        // Has primary category set? Then send it to the JS
        if (isset($_GET['post'])) {
            $category_selected = get_post_meta($_GET['post'], PCM_TAXONOMY);
        }

        wp_localize_script( 'pcm-category-box', 'primaryCategorySelected', $category_selected );
    }
}

/**
 * Enqueue all styles.
 *
 * @return void
 *
 */
function enqueue_styles() {
    if (Utils\is_post_screen()) {
        wp_register_style( 'pcm-category-box', PCM_URL . 'assets/css/category-box.min.css', [], PRIMARY_CATEGORY_MANAGER_VERSION );
        wp_enqueue_style( 'pcm-category-box' );
    }
}

/**
 * Add Templates to the footer.
 *
 * @return void
 */
function admin_footer() {
    // Include the plugin template
    if (Utils\is_post_screen()) {
        include_once PCM_PATH . 'templates/category-box.php';
    }
}

