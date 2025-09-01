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
        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_styles']);
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
            'dfine-vars',
            FOODDY_DIR_URI . '/assets/js/define-vars.js',
            array(),
            null,
            array(
            'in_footer' => true,
            'strategy'  => 'defer',
            )
        );
        wp_enqueue_script(
            'apline',
            FOODDY_DIR_URI . '/assets/js/alpine.js',
            ['jquery'],
            null,
            array(
            'in_footer' => true,
            'strategy'  => 'defer',
            )
        );

        wp_enqueue_script(
            'initialize',
            FOODDY_DIR_URI . '/assets/js/initialize.js',
            ['jquery'],
            null,
            array(
            'in_footer' => true,
            'strategy'  => 'defer',
            )
        );
        wp_enqueue_script(
            'alpine-js',
            'https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js',
            array(),
            null,
            array(
            'in_footer' => true,
            'strategy'  => 'defer',
            )
        );
    }

    public function enqueue_admin_styles($hook)
    {
        if ($hook == 'post.php' || $hook === 'post-new.php') {
            wp_enqueue_style('fooddy-admin-style', FOODDY_DIR_URI . '/assets/css/editor-style.css');
        }
    }
}
