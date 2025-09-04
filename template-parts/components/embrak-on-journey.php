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
<section class="border-2 border-[var(--border)] rounded-4xl">
    <div>
        <button class="w-fit text-sm p-2 rounded-full font-bold text-white bg-[var(--color-accent)]">
            <?php echo esc_html__('EXPLORE', 'fooddy'); ?>
        </button>
        <h3>
            <?php echo esc_html('EMBRAK ON A JOURNY') ?>
        </h3>
        <p>
            <?php echo esc_html('With our diverse collection of recipes we have something to satisfy every plate.') ?>
        </p>
    </div>
    <div>
        <?php
        if ($featured_query->have_posts()) :
            $index = 0;
            while ($featured_query->have_posts()) :
                $index++;
                $featured_query->the_post();
                get_template_part('template-parts/components/post-card', 'card', ['index' => $index]);
            endwhile;
        endif

        ?>
    </div>
</section>
