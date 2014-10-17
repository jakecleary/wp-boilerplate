<?php

class CustomPostType extends PostType implements CustomPostTypeInterface {

    /**
     * Register the post type
     * @param String $slug The post type slug i.e 'car'
     * @param Array  $args Arguments to pass through to the register function
     */
    public function __construct($slug, array $args)
    {
        // Check which args have been set and assign defualts if needs be
        isset($args['singular'])    ? $singular = $args['singular']       : $singular = $slug;
        isset($args['plural'])      ? $plural = $args['plural']           : $plural = $slug;
        isset($args['rewrite'])     ? $rewrite = $args['rewrite']         : $rewrite = $slug;
        isset($args['icon'])        ? $icon = $args['icon']               : $icon = 'admin-post';
        isset($args['supports'])    ? $supports = $args['supports']       : $supports = ['title', 'editor'];
        isset($args['public'])      ? $public = $args['public']           : $public = true;
        isset($args['has_archive']) ? $has_archive = $args['has_archive'] : $has_archive = true;

        // Register the post type based on the supplied args
        register_post_type($slug, [
            'labels' => [
                'name'               => ucwords($plural),
                'singular_name'      => ucwords($singular),
                'menu_name'          => ucwords($plural),
                'name_admin_bar'     => ucwords($singular),
                'add_new'            => 'Add New',
                'add_new_item'       => 'Add New ' . $singular,
                'new_item'           => 'New ' . $singular,
                'edit_item'          => 'Edit ' . $singular . ' Details',
                'view_item'          => 'View ' . $singular,
                'all_items'          => 'All ' . $plural,
                'search_items'       => 'Search ' . $plural,
                'parent_item_colon'  => 'Parent ' . $plural . ':',
                'not_found'          => 'No ' . $plural . ' found.',
                'not_found_in_trash' => 'No ' . $plural . ' found in Trash.'
            ],
            'public'      => $public,
            'has_archive' => $has_archive,
            'rewrite'     => array('slug' => $rewrite),
            'menu_icon'   => 'dashicons-' . $icon,
            'supports'    => $supports
        ]);
    }
}
