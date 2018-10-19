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
    public function __construct() {
		add_shortcode('pcm', [ $this, 'build_shorcode' ]);

		// Extending the primary category to WP-API
		add_action('rest_api_init', function() {
			register_rest_field('post', PCM_TAXONOMY, [
				'get_callback' => [$this, 'extend_pcm_to_wp_api']
			]);
		});
    }

    /**
     * Build the shortcode
     *
     * @return string
     */
    public function build_shorcode($atts) {

        // Set the default attributes values and apply the client ones
        $atts = shortcode_atts([
            'category-id'   => '',
            'category-name' => ''
        ], $atts );

        // Filter by category Name or ID (Default search by ID)
        if (!empty($atts['category-name']) && empty($atts['category-id'])) {
            $cat = get_category_by_slug($atts['category-name']);
            if ($cat) {
                $atts['category-id'] = $cat->term_id;
            }
        }

        // Category Id still empty? Don't return anything
        if (empty($atts['category-id'])) {
            return;
        }

        $cat_id = intval($atts['category-id']);
        if ($cat_id) {

            // Query the posts
            $pcm_query = new \WP_Query([
                'meta_query'    => [
                    [
                        'key'     => PCM_TAXONOMY,
                        'value'   => $cat_id,
                        'compare' => '=',
                    ]
                ],
                'no_found_rows' => true,
                'post_status'   => 'publish',
				'post_type'     => 'any'
			]);

			ob_start();

			if ($pcm_query->have_posts()) :

				// Hook to developers implement whatever they want before the list
				do_action( 'pcm_before_list' );

                while ($pcm_query->have_posts()) :
					$pcm_query->the_post();
					require(PCM_PATH . '/templates/post-list.php');
				endwhile;

				// Hook to developers implement whatever they want after the list
				do_action( 'pcm_after_list' );

			endif;

			wp_reset_postdata();

			return ob_get_clean();
		}

        return;
	}

	/**
	 * Let's be nice with WP-API and send the primary category field for all posts.
	 *
	 * @return string
	 */
	function extend_pcm_to_wp_api($object, $field_name) {
		return get_post_meta($object['id'], $field_name, true);
	}
}