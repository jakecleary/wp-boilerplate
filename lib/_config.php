<?php

/*
* Theme options
* -------------
* Here we decide what features fo WordPress we want to enable,
* as well as deciding some custom function support stuff too.
*/

$theme_config = array(
    'thumbnail_support'   => true,
    'enable_theme_editor' => false,
    'show_admin_bar'      => true,
    'woocommerce_support' => false,
);

// Constants

define( 'JS', get_template_directory_uri() . '/assets/js/' );
define( 'IMG', get_template_directory_uri() . '/assets/img/' );