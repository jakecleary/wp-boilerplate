<?php

interface PostTypeInterface {

    /**
     * Create the new post type
     * @param Array $args An array of arguments
     */
    public function __construct(Array $args);

    /**
     * Paginate the items of a post type
     * @param Object $queryData The $wp_query object
     */
    public static function paginate($queryData);
}
