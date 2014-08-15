<?php

interface CustomPostTypeInterface {

    /**
     * Create the new post type
     * @param String $name The name of the custom post type
     * @param Array  $args An array of arguments
     */
    public function __construct($slug, array $args);
}
