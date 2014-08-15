<?php

interface PostTypeInterface {

    /**
     * Paginate the items of a post type
     * @param Object $queryData The $wp_query object
     */
    public static function paginate($queryData);
}
