<?php

use FOODDY_THEME\Inc\Assets;
use FOODDY_THEME\Inc\Traits\Singleton;

class FOODDY_THEME
{
	use Singleton;
	protected function __construct()
	{
		$this->setup_hooks();
		Assets::get_instance();
	}
	protected function setup_hooks()
	{

		add_action('wp_enqueue_scripts', [$this, 'enqueue_styles']);
		add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
	}
}
