<?php
/* 
 * Template Featured Recipes
 *
 * @package fooddy
 */
?>

<section class="border-2 border-[var(--border)] rounded-[30px] p-15 flex flex-col">
    <h3 class="font-bold text-4xl">
        <?php echo esc_html('FEATURED RECIPES'); ?>
    </h3>
    <div class="grid gird-cols-1 md:grid-cols-2  gap-4">
        <?php if (have_posts()) : ?>
            <?php
            $count = 0;
            while (have_posts() && $count < 4) :
                the_post();
                get_template_part('template-parts/components/blog/post-card');
                $count++;
            endwhile;
            ?>
        <?php endif; ?>
    </div>
</section>
