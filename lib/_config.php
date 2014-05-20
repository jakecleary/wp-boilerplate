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
define( 'THEME_PATH' , get_template_directory_uri() . '/');
define( 'JS', THEME_PATH . 'assets/js/' );
define( 'IMG', THEME_PATH . 'assets/img/' );
define( 'LIB', THEME_PATH . 'lib/' );
define( 'INC', THEME_PATH . 'inc/');