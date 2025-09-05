<?php
/* 
 *
 *
 *
 * @package fooddy
 * */

$args = array('post_type' => 'post', 'posts_per_page' => 6);
$featured_query = new WP_Query($args);
?>
<section class="rounded-4xl p-3 flex justify-center md:px-4 flex-col gap-4">
    <div class="flex flex-col items-center justify-center gap-4">
        <button class="w-fit text-sm p-2 rounded-full font-bold text-white bg-[var(--color-accent)]">
            <?php echo esc_html__('EXPLORE', 'fooddy'); ?>
        </button>
        <h3 class="font-bold md:text-4xl text-center text-[var(--color-text)]">
            <?php echo nl2br(esc_html("EMBRAK ON A \n JOURNEY")) ?>
        </h3>
        <p class="text-[var(--color-text)]">
            <?php echo esc_html('With our diverse collection of recipes we have something to satisfy every plate.') ?>
        </p>
    </div>
    <div class="grid grid-cols-3 gap-5">
        <?php
        if ($featured_query->have_posts()) :
            $index = 0;
            while ($featured_query->have_posts()) :
                $index++;
                $featured_query->the_post();
                get_template_part('template-parts/components/blog/post-card', 'card', ['index' => $index, 'width' => 'w-full']);
            endwhile;
            wp_reset_postdata();
        endif

        ?>
    </div>
</section>
