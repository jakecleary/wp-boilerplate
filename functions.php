<?php

if ( defined( 'USE_PRODUCTION_ACF' ) ) {
    // advanced custom fields
    define( 'ACF_LITE' , true );
    include_once('advanced-custom-fields/acf.php');
    include_once('acf-repeater/acf-repeater.php');
    include_once('acf-options-page/acf-options-page.php');
    include_once('lib/acf.php');
}

require_once('lib/_config.php');
require_once('lib/helpers.php');
require_once('lib/wpSpecific.php');
require_once('lib/bodyClasses.php');


/**
 * Autoload some posttype classes
 */
spl_autoload_register(function ($class) {
    $path = 'lib/PostTypes/';
    $file = $path . $class . '.php';

    if(file_exists($file))
        include_once $file;
});
