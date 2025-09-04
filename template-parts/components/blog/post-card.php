<?php
/* Post Card 
 *
 * @package fooddy
 * */

use function FOODDY_THEME\Inc\Helpers\debugger;

$post_id = get_the_ID();
$is_vegan = get_post_meta($post_id, '_is_vegan', true);
$has_post_thumbnail = get_the_post_thumbnail_url($post_id);
$prep_time = get_post_meta($post_id, '_prep_time', true);
$prep_lvl = get_post_meta($post_id, '_prep_time', true);
$title = get_the_title($post_id);
$escerpt = get_the_excerpt($post_id);
$serves = get_post_meta($post_id, '_serves', true);
$index = $args['index']
?>
<article class="rounded-4xl bg-[var(--color-surface)]  overflow-hidden relative flex flex-col gap-5  w-full md:w-1/2  shrink-0 md:snap-start transition-transform duration-500 post-card snap-start"
    data-index="<?php echo esc_html($index); ?>" data-index="<?php echo esc_attr($index) ?>">
    <?php if ($has_post_thumbnail) { ?>
    <img class="h-[234px] w-full md:h-[243px] object-cover" src="<?php echo esc_url($has_post_thumbnail) ?>" alt="">
        <?php
    }
    ?>
    <div class="flex flex-col gap-3 p-5">
        <h4 class="font-bold">
            <?php echo esc_html($title) ?>
        </h4>
        <p class="text-[var(--text-dark)]">
            <?php echo esc_html($escerpt) ?>
        </p>
        <div class="flex gap-3 items-center text-[var(--color-text)]">

            <span>
                <?php echo esc_html(format_time($prep_time)) ?>
            </span>
            <span>
                <?php echo esc_html($prep_lvl) ?> PREP

            </span>
            <span>
                <?php echo esc_html($serves) ?> SERVES
            </span>
            <a class="border-2 px-4 ml-auto py-1 rounded-full border-[var(--color-text)]">View Recipe</a>

        </div>

        <img loading="lazy"
            class="absolute top-1/2 right-5 <?php echo esc_attr($is_vegan ? 'flex' : 'hidden'); ?>"
            src="<?php echo esc_url(FOODDY_DIR_URI . '/assets/images/vegan.svg') ?>" alt="">
    </div>
</article>
