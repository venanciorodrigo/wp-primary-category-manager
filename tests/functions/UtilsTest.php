<?php
/**
 * Class UtilsTest
 *
 * @package PrimaryCategoryManager
 */

use PrimaryCategoryManager\Utils;

class UtilsTest extends \WP_Mock\Tools\TestCase {

	public function setUp() {
		\WP_Mock::setUp();
	}

	public function tearDown() {
		\WP_Mock::tearDown();
	}

	/**
	 * Test to evaluate PrimaryCategoryManager\Utils\the is_post_screen() function
	 *
	 */
	public function test_current_screen() {

		\WP_Mock::userFunction('get_current_screen', [
			'times' => 1,
			'return' => (object) ['base' => 'post']
		]);

		$this->assertTrue(Utils\is_post_screen());
	}
}
