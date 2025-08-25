<?php

/**
 * Theme Assets (CSS + JS enqueue).
 *
 * @package Fooddy
 */

namespace FOODDY_THEME\Inc;

use FOODDY_THEME\Inc\Traits\Singleton;

class Assets
{
	use Singleton;

	protected function __construct()
	{
		// Load class hooks.
		$this->setup_hooks();
	}

	protected function setup_hooks()
	{
		add_action('wp_enqueue_scripts', [$this, 'enqueue_styles']);
		add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
	}

	/**
	 * Enqueue Styles.
	 */
	public function enqueue_styles()
	{
		wp_enqueue_style('stylesheet', FOODDY_DIR_URI . '/style.css');
		wp_enqueue_style('tailwindcss-css', FOODDY_DIR_URI . '/assets/css/output.css');
		wp_enqueue_style('theme-css', FOODDY_DIR_URI . '/assets/css/theme.css');
		wp_enqueue_style('front-end-css', FOODDY_DIR_URI . '/assets/css/frontend.css');
	}

	/**
	 * Enqueue Scripts.
	 */
	public function enqueue_scripts()
	{
		wp_enqueue_script(
			'button-toggle',
			FOODDY_DIR_URI . '/assets/js/button_toggle.js',
			array(),
			filemtime(FOODDY_DIR_PATH . '/assets/js/button_toggle.js'),
			array(
				'in_footer' => true,
				'strategy'  => 'defer',
			)
		);
	}
}
