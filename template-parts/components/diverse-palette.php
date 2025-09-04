<section class="rounded-[30px] flex flex-col-reverse md:flex-row items-end h-fit justify-center md:justify-between p-8"
    style="background-color: var(--color-info);">

    <div class="flex flex-col mt-[150px]">
        <button class="w-fit text-sm p-2 rounded-full font-bold text-white bg-[var(--color-accent)]">
            <?php echo esc_html__('EXPLORE', 'fooddy'); ?>
        </button>

        <h3 class="font-bold text-[40px] opacity-[.75]">
            <?php echo nl2br(esc_html__("OUR DIVERSE \nPALETTE", 'fooddy')); ?>
        </h3>

        <p class="mb-14" style="color: var(--color-text);">
            <?php echo nl2br(esc_html__("If you are a breakfast enthusiast, a connoisseur of savory delights, or \n on the lookout for irresistible desserts, our curated selection has \n something to satisfy every palate.", 'fooddy')); ?>
        </p>

        <button class="rounded-full p-2" style="border: 2px solid rgba(var(--color-text-rgb), 0.5);">
            <?php echo esc_html__('SEE MORE', 'fooddy'); ?>
        </button>
    </div>

    <ul class="md:w-1/2 w-full h-full flex flex-col justify-center items-center gap-15">
        <li
            class="flex items-center gap-2 diverse-item justify-between py-2 font-bold text-[var(--color-text)]">
            <img loading="lazy"
                src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/breakfast.svg'); ?>"
                alt="<?php echo esc_attr__('Breakfast', 'fooddy'); ?>" />
            <span>
                <?php echo esc_html__('BREAKFAST', 'fooddy'); ?>
            </span>
        </li>

        <li
            class="flex items-center gap-2 diverse-item justify-between py-2 font-bold text-[var(--color-text)]">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/lunch.svg'); ?>"
                alt="<?php echo esc_attr__('Lunch', 'fooddy'); ?>" />
            <span>
                <?php echo esc_html__('LUNCH', 'fooddy'); ?>
            </span>
        </li>

        <li
            class="flex items-center gap-2 diverse-item justify-between py-2 font-bold text-[var(--color-text)]">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/dinner.svg'); ?>"
                alt="<?php echo esc_attr__('Dinner', 'fooddy'); ?>" />
            <span>
                <?php echo esc_html__('DINNER', 'fooddy'); ?>
            </span>
        </li>

        <li
            class="flex items-center gap-2 diverse-item justify-between py-2 font-bold text-[var(--color-text)]">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/quickbite.svg'); ?>"
                alt="<?php echo esc_attr__('Quick bite', 'fooddy'); ?>" />
            <span>
                <?php echo esc_html__('QUICK BITE', 'your-textdomain'); ?>
            </span>
        </li>
    </ul>
</section>
