<?php

class PostType implements PostTypeInterface {

    /**
     * Register the post type
     * @param String $slug The post type slug i.e 'car'
     * @param Array  $args Arguments to pass through to the register function
     */
    public function __construct(String $slug, Array $args)
    {
        // Check which args have been set and assign defualts if needs be
        $args['singular']    ? $singular = $args['singular']       : $singular = $name;
        $args['plural']      ? $plural = $args['plural']           : $name;
        $args['rewrite']     ? $rewrite = $args['rewrite']         : $name;
        $args['icon']        ? $icon = $args['icon']               : 'admin-post';
        $args['supports']    ? $supports = $args['supports']       : ['title', 'editor'];
        $args['public']      ? $public = $args['public']           : true;
        $args['has_archive'] ? $has_archive = $args['has_archive'] : true;

        // Register the post type based on the supplied args
        register_post_type($slug,
            [
                'labels' => [
                    'name'               => $plural,
                    'singular_name'      => $singular,
                    'menu_name'          => $plural,
                    'name_admin_bar'     => $singular,
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
            ]
        );
    }

    /**
     * Paginate the archive
     * @param  Object $query The $wp_query object
     * @return String The HTML pagination
     */
    public static function paginate($query)
    {
        $big = 999999999; // need an unlikely integer

        return paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'show_all' => true,
            'total' => $query->max_num_pages,
            'type' => 'list',
            'prev_text' => '<',
            'next_text' => '>'
        ));
    }
}
