<?php

namespace FOODDY_THEME\Inc;

use FOODDY_THEME\Inc\Traits\Singleton;

class Debug
{
	use Singleton;
	protected function __construct()
	{
		$this->setup_hooks();
	}

	protected function setup_hooks()
	{
		if (defined('WP_DEBUG') && WP_DEBUG) {
			add_action('after_setup_theme', [$this, 'register_helpers']);
		}
	}

	/**
	 * Register global helper function (optional).
	 */
	public function register_helpers()
	{
		if (! function_exists('mhd_debug')) {
			function mhd_debug($value)
			{
				Debug::get_instance()->dd($value);
			}
		}
	}

	/**
	 * Dump and die (pretty print + stop execution).
	 */
	public function dd($value)
	{
		echo '<pre style="background:#111;color:#0f0;padding:10px;font-size:13px;">';

		if (is_array($value) || is_object($value)) {
			print_r($value);
		} elseif (is_bool($value)) {
			echo $value ? 'true' : 'false';
		} else {
			print($value);
		}

		echo '</pre>';
		wp_die();
	}

	/**
	 * Dump without dying.
	 */
	public function dump($value)
	{
		echo '<pre style="background:#111;color:#0f0;padding:10px;font-size:13px;">';
		is_array($value) || is_object($value)
			? print_r($value)
			: print($value);
		echo '</pre>';
	}

	/**
	 * Log to debug.log (good for AJAX or background processes).
	 */
	public function log($value)
	{
		if (defined('WP_DEBUG_LOG') && WP_DEBUG_LOG) {
			if (is_array($value) || is_object($value)) {
				error_log(print_r($value, true));
			} else {
				error_log($value);
			}
		}
	}

	/**
	 * Show backtrace (where the function was called).
	 */
	public function backtrace()
	{
		echo '<pre style="background:#111;color:#f90;padding:10px;font-size:13px;">';
		debug_print_backtrace();
		echo '</pre>';
	}

	/**
	 * Timer start.
	 */
	private $timers = [];

	public function start_timer($name = 'default')
	{
		$this->timers[$name] = microtime(true);
	}

	/**
	 * Timer end.
	 */
	public function end_timer($name = 'default')
	{
		if (isset($this->timers[$name])) {
			$time = microtime(true) - $this->timers[$name];
			unset($this->timers[$name]);
			return $time;
		}
		return null;
	}
}
