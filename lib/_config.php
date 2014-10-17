<?php

/*
* Theme options
* -------------
* Here we decide what features fo WordPress we want to enable,
* as well as deciding some custom function support stuff too.
*/

$theme_config = array(
    'enable_thumbnail_support'   => true,
    'enable_theme_editor'       => false,
    'enable_admin_bar'          => true,
    'enable_woocommerce_support' => false,
);

$theme_root = parse_url(get_template_directory_uri());
define('THEME_ROOT', $theme_root['path'] . '/');
define('THEME_PATH', $_SERVER['DOCUMENT_ROOT'] . THEME_ROOT);
define('PUBLIC_DIR', THEME_ROOT.'public/');
define('STYLES_DIR', PUBLIC_DIR.'styles/');
define('SCRIPTS_DIR', PUBLIC_DIR.'scripts/');
define('IMAGES_DIR', PUBLIC_DIR.'images/');

function get_css($file) {
    print STYLES_DIR . $file;
}

function get_script($file) {
    print SCRIPTS_DIR . $file;
}

function get_image($file) {
    print IMAGES_DIR . $file;
}
