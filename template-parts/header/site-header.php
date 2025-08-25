<header id="header-nav"
	class="flex items-center md:justify-between p-4 relative flex-col md:flex-row w-screen h-fit rounded-[50px] md:bg-transparent md:h-fit transition-all duration-150 overflow-hidden top-0 left-0 absolute z-20 w-full"
	style="border: 2px solid rgba(var(--color-text-rgb), 0.24); width:100%">

	<div class="flex px-2 w-full md:w-fit justify-between">
		<div class="flex gap-2">
			<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.svg'); ?>"
				alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
			<h3 class="font-bold" id="title">
				<?php echo esc_html('Cooking'); ?><br />
				<?php echo esc_html('Delight'); ?>
			</h3>
		</div>

		<button id="toggle-btn" class="md:hidden inline-block">
			<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/toggle-open.svg'); ?>"
				alt="<?php echo esc_attr__('Open menu', 'your-textdomain'); ?>" />
			<img class="bg-white rounded-full hidden"
				src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/toggle-close.svg'); ?>"
				alt="<?php echo esc_attr__('Close menu', 'your-textdomain'); ?>" />
		</button>
	</div>

	<?php get_template_part('template-parts/navigation/primary-nav'); ?>

	<div class="md:flex items-center gap-2 hidden">
		<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/search.svg'); ?>"
			alt="<?php echo esc_attr__('Search', 'your-textdomain'); ?>" />
		<button class="bg-[var(--color-text)] text-[var(--color-surface)] px-3 py-2 rounded-full">
			<?php echo esc_html__('Subscribe', 'your-textdomain'); ?>
		</button>
	</div>
</header>
