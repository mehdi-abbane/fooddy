<?php get_header() ?>
<main class="flex flex-col gap-2" :class="(is_win_large) ?'mx-15 my-2 ' : 'm-5' ">
    <?php get_template_part('template-parts/components/hero'); ?>
    <?php get_template_part('template-parts/components/diverse-palette'); ?>
    <?php get_template_part('template-parts/components/blog/featured-recipes'); ?>
</main>
<?php get_footer() ?>
