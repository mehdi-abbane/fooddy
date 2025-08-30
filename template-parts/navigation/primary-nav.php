<?php
/*
 * recursive dropdown for unlimited or deep and dynamic nested menus
 *
 *
 * @package Fooddy
 * */

$menu_class = \FOODDY_THEME\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id('fooddy-header-menu');
$menu_items = wp_get_nav_menu_items($header_menu_id);
?>
<nav x-show="show_nav_menu" class="w-auto flex flex-col md:flex-row mt-20 md:mt-0 justify-center items-center w-full"
    style="color: #9F9C95;">
    <ul class="md:w-48 gap-2 w-full flex flex-col md:flex-row items-center  md:opacity-[1] z-[999] md:border-none relative"
        id="header-nav-menu" x-show="show_nav_list">
        <?php $menu_class->render_menu_items($menu_items); ?>

    </ul>
    <div class="flex items-center md:hidden w-full gap-2" style="margin-top: 50px; margin-bottom: 50px;">
        <div class="w-full flex items-center gap-1" x-show="!show_search_bar_mobile">

            <img class="w-14 active:scale-[.9] transition-all duration-200"
                src="<?php echo esc_url(FOODDY_DIR_URI . '/assets/images/search-dark.svg') ?>" alt=""
                @click="toggleSearchBarMobile">

            <button class=" flex-1 h-14 text-lg rounded-4xl bg-[#494743] text-white w-full"
                x-show="!show_search_bar_mobile">
                <?php echo nl2br('Subscribe') ?>
            </button>

        </div>

        <form action="../../index.php" x-show="show_search_bar_mobile"
            @click.outside="show_search_bar_mobile = false" @clikc.outside="show_search_bar_mobile = false"
            class="w-full flex items-center gap-1"
            style="border: 2px solid rgba(var(--color-text-rgb), 0.24); width: 100%;">

            <button type="submit" class="active:scale-[.9] transition-all duration-200">
                <img src="<?php echo esc_url(FOODDY_DIR_URI . '/assets/images/search-dark.svg') ?>"
                    alt="" @click="toggleSearchBarMobile" class="w-14">
            </button>
            <input type="text" class="h-14 w-full border-2 border-white rounded-full p-2"
                placeholder="Search" name="search" id="search_nav" />


        </form>

    </div>
    <form action="" x-show="show_search_bar"
        class="w-full rounded-full border-2  text-lg text-left text-[var(--color-text)] px-2 h-10"
        style="border: 2px solid rgba(var(--color-text-rgb), 0.24)">
        <input type="text" class="h-full">

    </form>
    <div class="flex w-full items-center justify-center gap-2 md:hidden">
        <img class="w-10 h-10"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/fb.svg'); ?>"
            alt="Facebook Icon">
        <img class="w-10 h-10"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/ig.svg'); ?>"
            alt="Instagram Icon">
        <img class="w-10 h-10"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/yt.svg'); ?>"
            alt="YouTube Icon">
    </div>
</nav>
