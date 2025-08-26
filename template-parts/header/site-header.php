<header id="header-nav"
	class="flex p-4 flex-col md:flex-row  h-fit rounded-full bg-transparent md:h-fit transition-all duration-150 m-5"
	style="border: 2px solid rgba(var(--color-text-rgb), 0.24);">

	<div class="flex px-2 w-full md:w-fit items-center justify-between">
		<div class="flex gap-2 items-center">
			<?php if ('the_custom_logo') {
				the_custom_logo();
			}  ?>
			<h3 class="font-bold" id="title">
				<?php echo esc_html('Cooking'); ?><br />
				<?php echo esc_html('Delight'); ?>
			</h3>
		</div>

		<button id="toggle-btn" @click='toggleNavMenu' @click="show_nav_menu=!show_nav_menu"
			class="md:hidden inline-block">
			<img x-show="show_nav_menu"
				src="<?php echo esc_url(FOODDY_DIR_URI . '/assets/images/toggle-open.svg'); ?>"
				alt="<?php echo esc_attr__('Open menu', 'your-textdomain'); ?>" />
			<img x-show="!show_nav_menu" class="bg-white rounded-full"
				src="<?php echo esc_url(FOODDY_DIR_URI . '/assets/images/toggle-close.svg'); ?>"
				alt="<?php echo esc_attr__('Close menu', 'your-textdomain'); ?>" />
		</button>
	</div>

	<?php get_template_part('template-parts/navigation/primary-nav'); ?>
	<div class="md:flex items-center gap-2 hidden mx-4">
		<button class="px-3 py-2 h-15 w-15" @click="toggleSearchBar">
			<img src="<?php echo esc_url(FOODDY_DIR_URI . '/assets/images/search.svg'); ?>"
				alt="<?php echo esc_attr__('Search', 'your-textdomain'); ?>" class="w-full h-full" />
		</button>
		<button class="bg-[var(--color-text)] text-[var(--color-surface)] px-3 py-2 rounded-full">
			<?php echo esc_html__('Subscribe', 'your-textdomain'); ?>
		</button>
	</div>
</header>
