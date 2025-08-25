<?php


if (! defined('ABSPATH')) {
	exit;
}
if (!defined('FOODDY_DIR_PATH')) {
	define('FOODDY_DIR_PATH', untrailingslashit(get_template_directory()));
}
if (!defined('FOODDY_DIR_URI')) {
	define('FOODDY_DIR_URI', untrailingslashit(get_template_directory_uri()));
}
require_once FOODDY_DIR_PATH . '/inc/helpers/autoloader.php';
function fooddy_get_theme_instace()
{
	\FOODDY_THEME\Inc\Assets::get_instance();
}
fooddy_get_theme_instace();
