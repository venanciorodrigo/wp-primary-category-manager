<?php
/**
 * Frontend based functions for other plugins or themes to use.
 *
 * @package PrimaryCategoryManager
 */

// namespace PrimaryCategoryManager\PcmShortcode;

if ( ! class_exists( 'PcmShortcode' ) ) {

    /**
     * PCM Frontend Class - Methods to use on the frontend
     *
     */
    class PcmShortcode {

        /**
         * Instance of the class
         *
         */
        protected static $instance = null;

        /**
         * Require the Frontend Wrapper
         *
         * @return void
         */
        public function __construct() {
            require_once PCM_PATH . 'includes/frontend-wrappers.php';
        }

        /**
         * Returns the current instance of the class
         *
         * @return self
         */
        public static function get_instance() {

            if ( null === self::$instance ) {
                self::$instance = new self();
            }

            return self::$instance;
        }

        /**
         * Return the posts within the selected category
         *
         * @return string
         */
        public function get_primary_category_posts() {
            return "1234";
        }
    }

    PcmShortcode::get_instance();
}