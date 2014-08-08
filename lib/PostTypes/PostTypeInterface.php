<?php

abstract class PostTypeInterface {

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
