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
require_once('lib/timber.php');

// Classes
require_once('lib/PostTypes/PostTypeInterface.php');
require_once('lib/PostTypes/PostType.php');
require_once('lib/PostTypes/CustomPostTypeInterface.php');
require_once('lib/PostTypes/CustomPostType.php');
require_once('lib/postTypes.php');
