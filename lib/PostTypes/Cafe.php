<?php

class Cafe extends CustomPostType {


    /**
     * Construct a new Cafe post type
     */
    public function __construct() {
        parent::__construct('cafe', array());
    }

    /**
     * Create a new instance of this custom post type
     */
    public static function instance() {
        self::$instance = new Cafe();
    }

    /**
     * Grab all of the custom posts
     * @return {WP_Query} The query object
     */
    public static function all() {
        return self::$instance->query();
    }
}
