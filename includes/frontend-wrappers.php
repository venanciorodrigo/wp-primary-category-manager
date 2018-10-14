<?php
/**
 * Provides wrapper functions for frontend.
 *
 * @package PrimaryCategoryManager
 */

if ( ! defined( 'ABSPATH' ) ) {
    die;
}

/**
 * Wrapper to return the posts within the selected category
 *
 * @return string
 */
function pcm_get_primary_term_posts() {
    $pcm_frontend = PcmShortcode::get_instance();
    return $pcm_frontend->get_primary_category_posts();
}
