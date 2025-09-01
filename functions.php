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
require_once FOODDY_DIR_PATH . '/inc/helpers/debugger.php';
require_once FOODDY_DIR_PATH . '/inc/helpers/template-tags.php';

if (! function_exists('debugger')) {
    function debugger()
    {
        return \FOODDY_THEME\Inc\Debug::get_instance();
    }
}
function fooddy_get_theme_instace()
{
    \FOODDY_THEME\Inc\FOODDY_THEME::get_instance();
}
fooddy_get_theme_instace();
