<?php

namespace FOODDY_THEME\Inc;

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
		add_action('after_setup_theme', [$this, 'setup_theme']);
	}
	public function setup_theme()
	{

		add_theme_support('title-tag');
		add_theme_support('custom-logo', [
			'header-text' => ['site-title', 'site-description'],
			'height' => 100,
			'width' => 400,
			'flex-height' => true,
			'flex-width' => true,
		]);
	}
}
