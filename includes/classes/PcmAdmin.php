<?php
/**
 * Admin Class to use methods that's only fired on the Admin side of WP
 *
 * @package PrimaryCategoryManager
 */

namespace PrimaryCategoryManager;

/**
 * PCM Admin Class - Methods to use on the admin
 *
 */
class PcmAdmin {

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct() { }

    /**
     * Save the primary category on Database
     * There's a Security Nonce check before insert into the Database
     * More Details: https://codex.wordpress.org/Glossary#Nonce
     *
     * @return void
     */
    public static function save_primary_category() {
        if (! empty( $_POST ) && check_admin_referer( 'save_primary_category', 'pcm_nonce_field' )) {
            $post_id = intval($_POST['post_ID']);
            if (isset($_POST['pcm_radio'])) {
                    update_post_meta($post_id, 'pcm_primary_category', absint($_POST['pcm_radio']));
            } else {
                    delete_post_meta($post_id, 'pcm_primary_category');
            }
        }
    }
}