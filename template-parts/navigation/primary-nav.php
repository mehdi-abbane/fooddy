<nav id="header-nav-menu"
	class=" w-full  md:w-fit gap-2 px-4 flex flex-col md:flex-row h-0 items-center opacity-[0] md:opacity-[1]"
	style="color: #9F9C95;">
	<a class="nav-item px-1 py-2 md:p-0 w-full" style="border-bottom: 2px solid var(--color-background);" href="">
		<?php echo esc_html('HOME'); ?>
	</a>
	<a class="nav-item px-1 py-2 md:p-0 w-full" style="border-bottom: 2px solid var(--color-background);" href="">
		<?php echo esc_html('RECIPES'); ?>
	</a>
	<a class="nav-item px-1 py-2 md:p-0 w-full" style="border-bottom: 2px solid var(--color-background);" href="">
		<?php echo esc_html(str_replace(' ', '&nbsp;', 'COOKING TIPS')); ?>
	</a>
	<a class="nav-item px-1 py-2 md:p-0 w-full" style="border-bottom: 2px solid var(--color-background);" href="">
		<?php echo esc_html(str_replace(' ', '&nbsp;', 'ABOUT US')); ?>
	</a>
	<div class="flex items-center md:hidden w-full gap-2 " style="margin-top: 50px; margin-bottom: 50px;">
		<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/search-dark.svg') ?>"
			alt="">
		<button class=" flex-1 p-2 rounded-4xl text-white w-full" style="background-color: #494743;">
			<?php echo esc_html('Subscribe') ?>
		</button>

	</div>
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
