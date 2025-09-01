<?php
function get_the_post_custom_thumbnail($post_id, $size = 'featured-imge', $additional_attributes = [])
{
    $custom_thumbnail = '';
    if ($post_id === null) {
        $post_id = get_the_ID();
    }
    if (has_post_thumbnail($post_id)) {
        $default_attributes = [
        'loading' => 'lazy',
        ];

        $attributes = array_merge($additional_attributes, $default_attributes);
        $custom_thumbnail = wp_get_attachment_image(get_post_thumbnail_id($post_id), $size, false, $additional_attributes);
    }
    return $custom_thumbnail;
}
function the_post_custom_thumbnail($post_id, $size = 'featured-imge', $additional_attributes)
{
    echo get_the_post_thumbnail($post_id, $size, $additional_attributes);
}
function format_prep_time($minutes)
{
    if ($minutes < 60) {
        return $minutes . ' MIN';
    }

    $hours = floor($minutes / 60);
    $mins  = $minutes % 60;

    if ($mins > 0) {
        return $hours . 'H ' . $mins . 'M';
    } else {
        return $hours . 'H';
    }
}
