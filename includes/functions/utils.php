<?php
/**
 * Utility functions
 *
 * @package PrimaryCategoryManager
 */

namespace PrimaryCategoryManager\Utils;

/**
 * Check if this is the post page.
 *
 * @return boolean
 */
function is_post_screen() {
    $screen = get_current_screen();
    if ($screen->base == "post") {
        return true;
    }

    return false;
}