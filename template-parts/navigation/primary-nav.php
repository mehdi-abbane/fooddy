<?php
$menu_class = \FOODDY_THEME\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id('fooddy-header-menu');
$menu_items = wp_get_nav_menu_items($header_menu_id);

function render_menu_items($menu_items, $parent_id = 0, $is_sub = false, $level = 0)
{
	foreach ($menu_items as $menu_item) {
		if (intval($menu_item->menu_item_parent) !== $parent_id) continue;

		$child_items = array_filter($menu_items, function ($item) use ($menu_item) {
			return intval($item->menu_item_parent) === intval($menu_item->ID);
		});

		$has_children = !empty($child_items);

		// Calculate indentation for mobile
		$mobile_indent_px = min($level * 16, 48); // 16px per level, max 48px
?>

<li class="relative w-full md:w-auto <?php echo esc_attr(($is_sub) ?? " md:border-b-[4px]
	md:border-[var(--color-text)]") ?>" x-data="{ open: false }"
	@click.outside="open = false"
	@mouseleave="if (is_win_large) { open = false }">
	<div class="flex items-center <?php echo esc_attr(($is_sub) ?? " md:border-[4px] md:border-[var(--color-text)]")
		?>">
		<a href="<?php echo esc_url($menu_item->url); ?>" class="<?php echo esc_attr(($is_sub) ?? "
			md:border-b-[4px] md:border-[var(--color-text)]") ?> block py-2 px-3 md:px-4 transition-colors
			w-full "
			style="padding-left:
			<?php echo $mobile_indent_px; ?>px;">
			<?php echo str_replace(' ', '&nbsp;', esc_html($menu_item->title)) ?>
		</a>

		<?php if ($has_children) : ?>
		<button @click=" open = !open " :aria-expanded="open.toString()"
			@mouseenter="if (is_win_large) { open = true }"
			class="ml-1 p-1 flex items-center justify-center transition-transform duration-150"
			:class="{ 'rotate-180': open }">
			<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
				stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
					d="M19 9l-7 7-7-7" />
			</svg>
		</button>
		<?php endif; ?>
	</div>

	<?php if ($has_children) : ?>
	<ul class="mt-1 space-y-1 md:flex md:flex-col md:items-between md:text-center md:justify-between w-full relative
           md:absolute md:top-full md:left-0 md:border-b-[4px] md:border-[var(--color-text)] md:w-48
           md:bg-white md:dark:bg-[var(--color-background)] md:shadow-lg  md:z-50" x-show="open" x-cloak
		x-transition:enter="transition ease-out duration-200"
		x-transition:enter-start="opacity-0 transform -translate-y-2"
		x-transition:enter-end="opacity-100 transform translate-y-0"
		x-transition:leave="transition ease-in duration-150"
		x-transition:leave-start="opacity-100 transform translate-y-0"
		x-transition:leave-end="opacity-0 transform -translate-y-2"
		style="padding-left: <?php echo $mobile_indent_px; ?>px;">

		<?php render_menu_items($menu_items, $menu_item->ID, true, $level + 1); ?>
	</ul>
	<?php endif; ?>
</li>
<?php
	}
}
?>

<nav x-show="show_nav_menu" class="w-auto flex flex-col md:flex-row mt-20 md:mt-0 justify-center items-center w-full"
	style="color: #9F9C95;">
	<ul class="md:w-48 gap-2 w-full flex flex-col md:flex-row items-center  md:opacity-[1] z-[999] md:border-none relative"
		id="header-nav-menu" x-show="show_nav_list">
		<?php render_menu_items($menu_items); ?>

	</ul>
	<div class="flex items-center md:hidden w-full gap-2" style="margin-top: 50px; margin-bottom: 50px;">
		<div class="w-full flex items-center gap-1" x-show="!show_search_bar_mobile">

			<img class="w-14" src="<?php echo esc_url(FOODDY_DIR_URI . '/assets/images/search-dark.svg') ?>"
				alt="" @click="toggleSearchBarMobile">

			<button class=" flex-1 h-14 text-lg rounded-4xl bg-[#494743] text-white w-full"
				x-show="!show_search_bar_mobile" style="background-color: #49743;">
				<?php echo nl2br('Subscribe') ?>
			</button>

		</div>

		<form action="../../index.php" x-show="show_search_bar_mobile"
			@click.outside="show_search_bar_mobile = false" @clikc.outside="show_search_bar_mobile = false"
			class="w-full flex items-center gap-1"
			style="border: 2px solid rgba(var(--color-text-rgb), 0.24)">

			<button type="submit" class="w-14">

				<img src="<?php echo esc_url(FOODDY_DIR_URI . '/assets/images/search-dark.svg') ?>"
					alt="" @click="toggleSearchBarMobile">
			</button>
			<input type="text" class="h-14 w-auto border-2 border-white rounded-full p-2"
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
