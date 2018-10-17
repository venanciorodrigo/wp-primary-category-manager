<?php
/**
 * Main HTML for the plugin on the post page.
 *
 * @package PrimaryCategoryManager
 */

if ( ! defined( 'ABSPATH' ) ) {
    die;
}
?>

<script type="text/html" id="tmpl-pcm-nonce">
    <?php wp_nonce_field( 'save_primary_category', 'pcm_nonce_field' ); ?>
</script>

<script type="text/html" id="tmpl-pcm-radio-input">
    <input type="radio" name="pcm_radio" class="pcm-radio" value="{{data.category_id}}" {{ data.checked }}>
</script>

<script type="text/html" id="tmpl-pcm-message">
    <p class="pcm-message">
        <b><?php _e( 'Primary Category:', 'primary-category-manager' ); ?></b> <?php _e( 'To define the primary category for this post please select one option (Radio Button) above.', 'primary-category-manager' ); ?>
    </p>
</script>

<script type="text/html" id="tmpl-pcm-unset-primary-category">
    <p class="pcm-unset-primary">
        <a id="unset_primary_category" href="#" class="button button-large"><?php _e( 'Unset Primary Category', 'primary-category-manager' ); ?></a>
    </p>
</script>