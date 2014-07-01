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
define('THEME_ROOT', get_template_directory());
define('PUBLIC_DIR', THEME_ROOT.'/public')
define('STYLES_DIR', PUBLIC_DIR.'/styles');
define('SCRIPTS_DIR', PUBLIC_DIR.'/js');
define('IMAGES_DIR', PUBLIC_DIR.'/img');
