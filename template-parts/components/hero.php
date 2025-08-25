<div class="relative w-full h-[600px] overflow-hidden rounded-[40px]">

	<!-- Background image -->
	<img class="absolute inset-0 w-full h-full object-cover -z-10"
		src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-bg.jpg'); ?>"
		alt="<?php echo esc_attr__('Hero background image', 'your-textdomain'); ?>" />

	<!-- Black overlay -->
	<div class="absolute inset-0 bg-black/50 -z-0"></div>

	<!-- Content -->
	<div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-6 gap-5">
		<h3 class="font-bold text-[90px] leading-tight text-[var(--color-surface)]">
			<?php echo nl2br(esc_html__("Unleash Culinary \nExcellence", 'your-textdomain')); ?>
		</h3>
		<p class="mt-4 max-w-3xl text-xl text-[var(--color-surface)]">
			<?php echo nl2br(esc_html__("Explore a world of flavors, discover \nhandcrafted recipes, and let the aroma of \nour passion for cooking fill your kitchen", 'your-textdomain')); ?>
		</p>
		<button class="p-2 rounded-full font-bold"
			style="color: var(--color-text); background-color: var(--color-secondary);">
			<?php echo esc_html__('EXPLORE RECIPES', 'your-textdomain'); ?>
		</button>
	</div>

</div>
