<?php

namespace FOODDY_THEME\Inc;

use FOODDY_THEME\Inc\Traits\Singleton;

class Meta_Boxes
{
    use Singleton;
    protected function __construct()
    {
        $this->setup_hooks();
    }
    protected function setup_hooks()
    {
        add_action('add_meta_boxes', [$this, 'add_custom_meta_box']);
        add_action('save_post', [$this, 'save_post_meta_data']);
    }
    public function add_custom_meta_box()
    {
        $screens = ['post'];

        add_meta_box(
            'fooddy-recipe-options',
            'Recipe Options',
            [$this, 'render_recipe_meta_box'],
            $screens,
            'side'
        );
    }

    public function render_recipe_meta_box($post)
    {
        // Get values
        $is_vegan = get_post_meta($post->ID, '_is_vegan', true);
        $prep_lvl = get_post_meta($post->ID, '_prep_lvl', true);
        $prep_time = get_post_meta($post->ID, '_prep_time', true);
        $serves = get_post_meta($post->ID, '_serves', true);

        // Nonce field for security
        wp_nonce_field('fooddy_recipe_nonce_action', 'fooddy_recipe_nonce');
        ?>
<label for="fooddy-prep-time">
    <span>
        <?php echo esc_html('Preparation Time (minutes): '); ?>
    </span>
    <input type="number" id="fooddy-prep-time" name="fooddy-prep-time-field"
        value="<?php echo esc_attr($prep_time) ?>" min="1" />
</label>
<br />
<label for="fooddy-serves">
    <span>
        <?php echo esc_html('Serves: '); ?>
    </span>
    <input type="number" id="fooddy-serves" name="fooddy-serves-field" value="<?php echo esc_attr($serves) ?>"
        min="1" />
</label>
<br>
<label for="fooddy-is-vegan">
    <span>
        <?php echo esc_html('Is Vegan: '); ?>
    </span>
    <input type="checkbox" id="fooddy-is-vegan" name="fooddy-is-vegan-field" value="1" <?php checked(
        $is_vegan, '1'
                                                                                       ); ?> />

</label>
<br />
<label for=" fooddy-prep-level-field">
    <span>

        <?php echo esc_html('Preparation Level:'); ?>
    </span>

    <select name="fooddy-prep-level-field" id="fooddy-prep-level-field">
        <option value="easy" <?php selected($prep_lvl, 'easy'); ?>>Easy</option>
        <option value="medium" <?php selected($prep_lvl, 'medium'); ?>>Medium</option>
        <option value="advanced" <?php selected($prep_lvl, 'advanced'); ?>>Advanced</option>
    </select>
</label>
        <?php
    }
    public function save_post_meta_data($post_id)
    {
        // Security check
        if (!isset($_POST['fooddy_recipe_nonce'])
            || !wp_verify_nonce($_POST['fooddy_recipe_nonce'], 'fooddy_recipe_nonce_action')
        ) {
            return;
        }

        // Vegan checkbox
        if (isset($_POST['fooddy-is-vegan-field'])) {
            update_post_meta($post_id, '_is_vegan', '1');
        } else {
            update_post_meta($post_id, '_is_vegan', '0'); // unchecked state
        }

        // Prep level dropdown
        if (isset($_POST['fooddy-prep-level-field'])) {
            update_post_meta(
                $post_id,
                '_prep_lvl',
                sanitize_text_field($_POST['fooddy-prep-level-field'])
            );
        }

        if (isset($_POST['fooddy-prep-time-field'])) {
            update_post_meta(
                $post_id,
                '_prep_time',
                sanitize_text_field($_POST['fooddy-prep-time-field'])
            );
        }

        if (isset($_POST['fooddy-serves-field'])) {
            update_post_meta(
                $post_id,
                '_serves',
                sanitize_text_field($_POST['fooddy-serves-field'])
            );
        }
    }
}
