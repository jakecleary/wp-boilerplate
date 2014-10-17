<?php

/**
 * Post Type Registration
 * ======================
 * Register all of the custom posts types in
 * this file using the CustomPostType class.
 */

$students = new CustomPostType('student', [
    'plural' => 'students',
    'icon' => 'welcome-learn-more'
]);
