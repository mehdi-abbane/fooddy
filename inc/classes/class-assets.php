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
		wp_enqueue_style('tailwindcss', FOODDY_DIR_URI . '/assets/css/output.css');
		wp_enqueue_style('theme', FOODDY_DIR_URI . '/assets/css/theme.css');
		wp_enqueue_style('front-end', FOODDY_DIR_URI . '/assets/css/frontend.css');
	}

	/**
	 * Enqueue Scripts.
	 */
	public function enqueue_scripts()
	{

		wp_enqueue_script(
			'dfine-elements',
			FOODDY_DIR_URI . '/assets/js/define-elements.js',
			array(),
			null,
			array(
				'in_footer' => false,
				'strategy'  => 'defer',
			)

		);
		wp_enqueue_script(
			'apline',
			FOODDY_DIR_URI . '/assets/js/alpine.js',
			array(),
			null,
			array(
				'in_footer' => false,
				'strategy'  => 'defer',
			)

		);
		wp_enqueue_script(
			'alpine-js',
			'https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js',
			array(),
			null,
			array(
				'in_footer' => false,
				'strategy'  => 'defer',
			)
		);
	}
}
