<?php

/**
 * Register Menus.
 * 
 * @package Fooddy
 */

namespace FOODDY_THEME\Inc;

use FOODDY_THEME\Inc\Traits\Singleton;

class Menus
{
    use Singleton;

    protected function __construct()
    {
        // Load class hooks.
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        add_action('init', [$this, 'register_menus']);
    }

    public function register_menus()
    {
        register_nav_menus(
            [
            'fooddy-header-menu' => esc_html__('Header Menu', 'fooddy'),
            'fooddy-footer-menu' => esc_html__('Footer Menu', 'fooddy')
            ]
        );
    }
    public function get_menu_id($location)
    {
        $locations = get_nav_menu_locations();
        $menu_id = $locations[$location];
        return !empty($menu_id) ? $menu_id : '';
    }
    public function get_child_menu_items($menu_array, $parent_id)
    {
        $child_menus = [];
        if (!empty($menu_array) && is_array($menu_array)) {
            foreach ($menu_array as $menu) {
                if (intval($menu->menu_item_parent) === $parent_id) {
                    array_push($child_menus, $menu);
                }
            }
        }
        return $child_menus;
    }

    /**
     * Recursively render a nested WordPress navigation menu as a dropdown.
     *
     * Starts at the top-level menu items (parent_id = 0).
     * Each level increases indentation and nesting depth.
     *
     * Example usage:
     *   $menu_id = $menu_class->get_menu_id('foo-header-menu');
     *   $items = wp_get_nav_menu_items($menu_id);
     *   echo '<ul>';
     *   render_menu_items($items);
     *   echo '</ul>';
     *
     * @param WP_Post[] $menu_items Menu items from wp_get_nav_menu_items().
     * @param int       $parent_id  Parent item ID (0 for top-level).
     * @param bool      $is_sub     Whether this level is a submenu.
     * @param int       $level      Current nesting level.
     * 
     * @return void Outputs HTML directly.
     */
    public function render_menu_items(array $menu_items, int $parent_id = 0, bool $is_sub = false, int $level = 0)
    {
        foreach ($menu_items as $menu_item) {
            if (intval($menu_item->menu_item_parent) !== $parent_id) {
                continue;
            }

            $child_items = array_filter(
                $menu_items,
                function ($item) use ($menu_item) {
                    return intval($item->menu_item_parent) === intval($menu_item->ID);
                }
            );

            $has_children = !empty($child_items);

            /*
                 * @var int $mobile_indent_px mobile indentation in px
                 */
            $mobile_indent_px = min($level * 10, 60); // 10px per level, max 60px
            ?>

<li class="w-full menu-nav-item transition-all border-b-2 border-[transparent] hover:border-[var(--color-accent)] duration-150 <?php echo esc_attr($is_sub ? 'sub-menu-item-li px-2 py-1' : '') ?>  relative"
    x-data="{ open: false }" @click.outside="open = false" @mouseleave="if (is_win_large) { open = false }">
    <div class="flex items-center w-full p-1 <?php echo esc_attr($is_sub ? 'sub-menu-item-div' : '') ?>">
        <a href="<?php echo esc_url($menu_item->url); ?>" class="a-items-in-menus block transition-colors
        w-full" data-indent="<?php echo esc_attr($mobile_indent_px) ?>" style="padding-left: 0;">
            <?php echo str_replace(' ', '&nbsp;', esc_html($menu_item->title)) ?>
        </a>

            <?php if ($has_children) : ?>
        <button @click=" open = !open " :aria-expanded="open.toString()"
            @mouseenter="if (is_win_large) { open = true }"
            class="ml-1 p-1 flex items-center justify-center transition-transform duration-150"
            :class="{ '-rotate-90': open }">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 9l-7 7-7-7" />
            </svg>
        </button>
            <?php endif; ?>
    </div>

            <?php if ($has_children) : ?>
    <ul class="mt-1 md:mt-0 space-y-1 md:flex md:flex-col md:items-between md:text-center md:justify-between w-full md:pl-0 gap-0
         md:shadow-lg  md:z-50 relative md:absolute md:w-fit md:left-[100%] md:bg-[var(--color-surface)] md:top-[0px] md:left-full"
        x-show="open" @mouseleave="if(is_win_large) {open = false}" x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform -translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-2">

                <?php $this->get_instance()->render_menu_items($menu_items, $menu_item->ID, true, $level + 1); ?>
    </ul>
            <?php endif; ?>
</li>
            <?php
        }
    }
}
