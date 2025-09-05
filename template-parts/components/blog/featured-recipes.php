<?php
/* 
 * Template Featured Recipes
 *
 * @package fooddy
 */

$args = array(
    'post_type'      => 'post',   // ✅ only posts
    'posts_per_page' => 4,        // ✅ limit to 4
);
$featured_query = new WP_Query($args);
?>

<section class="border-2 border-[var(--border)] rounded-[30px] p-1 md:px-4 flex flex-col gap-4">
    <div class="flex justify-between p-5" aria-label="Featured Recipes">

        <h3 class="font-bold md:text-4xl">
            <?php echo esc_html('FEATURED RECIPES'); ?>
        </h3>
        <div class="flex gap-2">

            <button class="rotate-180" @click="scrollLeft" :class="current_slide == 0 && 'opacity-50'">
                <img src="<?php echo esc_url(FOODDY_DIR_URI . '/assets/images/arrow-featured.svg'); ?>"
                    alt="">
            </button>
            <button @click="scrollRight" :class="current_slide == total_slides && 'opacity-50'">

                <img src="<?php echo esc_url(FOODDY_DIR_URI . '/assets/images/arrow-featured.svg'); ?>"
                    alt="">
            </button>
        </div>
    </div>
    <div class="flex gap-4 overflow-scroll w-full relative snap-start snap-mandatory snap-x md:p-5 featured-recipes no-scrollbar"
        x-ref="featured_scroll">

        <?php

        if ($featured_query->have_posts()) :
            $index = 0;
            while ($featured_query->have_posts()) :
                $index++;
                $featured_query->the_post();
                get_template_part('template-parts/components/blog/post-card', 'card', ['index' => $index, 'width' => 'md:w-1/2']);
            endwhile;
            wp_reset_postdata(); // ✅ reset after custom query
        endif;
        ?>
    </div>
</section>
