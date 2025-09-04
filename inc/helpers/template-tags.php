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
function format_time($minutes)
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

function fooddy_posted_on()
{
    $time_string = '<time class="entery-date published updated" datetime="%1$s">%2$s</time>';
    if (get_the_time('U') !== get_the_modified_time('U')) {
        $time_string = '<time class="entery-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }
    $time_string = sprintf($time_string, esc_attr(get_the_date(DATE_W3C), esc_attr(get_the_date(), get_the_modified_date(DATE_W3C), esc_attr(get_the_modified_date()))));
    $posted_on = sprintf(esc_html_x('Posted on $s', 'post date', 'fooddy'), '<a> href="' . esc_url(get_permalink()) . '"rel="bookmark">' . $time_string . '</a>');
    echo '<span class="posted-on text-sedondary">'  . $posted_on . '</span>';
}
function fooddy_posted_by()
{
    $byline = sprintf(
        esc_html_x('by %s', 'post author', 'fooddy'),
        '<span class="author vcard"><a href="'
        . esc_url(get_author_posts_url(get_the_author_meta('ID'))) .
        '">' . get_the_author() . '</a></span>'
    );
    echo '<span class="byline text-sedondary">' . $byline . '</span>';
}
