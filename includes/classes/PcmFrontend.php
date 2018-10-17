<?php
/**
 * Frontend based functions for other plugins or themes to use.
 *
 * @package PrimaryCategoryManager
 */

namespace PrimaryCategoryManager;

/**
 * PCM Frontend Class - Methods to use on the frontend
 *
 */
class PcmFrontend {

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct() { }

    /**
     * Return the posts within the selected category
     *
     * @return string
     */
    public function get_primary_category_posts() {
        return "List of Posts";
    }

    /**
     * Build the shortcode
     *
     * @return string
     */
    public function build_shorcode() {
        return "Shortcode";
    }
}