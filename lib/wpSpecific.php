<?php

if ( $theme_config['thumbnail_support'] === false )
{
    add_theme_support('post-thumbnails');

    // add_image_size('name', xxx, xxx, true);
}

//
// Disable the file editor
//

if ( $theme_config['enable_theme_editor'] === false )
{
    function remove_editor_menu() {
        remove_action('admin_menu', '_add_themes_utility_last', 101);
    }
    add_action('_admin_menu', 'remove_editor_menu', 1);
}

//
// Disable the admin bar
//

if ( $theme_config['show_admin_bar'] === false )
{
    add_filter('show_admin_bar', '__return_false');
}