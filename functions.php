<?php

/**
 * RDG Starter Theme
 * @package RDG
 */

namespace VENTOCOM;

define('VENTOCOM_THEME_VERSION', '1.0.0');
define('VENTOCOM_THEME_PATH', get_template_directory());
define('VENTOCOM_THEME_URL', get_template_directory_uri());
define('IMG_PATH_URL', get_template_directory_uri() . '/assets/img');
require get_template_directory() . '/inc/customizer/theme-customizer.php';

if (file_exists(get_template_directory() . '/vendor/autoload.php')) {
    require_once get_template_directory() . '/vendor/autoload.php';
}

if (class_exists('VENTOCOM\\Core\\Setup')) {
    new Core\Setup();

    if (class_exists('VENTOCOM\\Integrations\\ContactForm7')) {
        new Integrations\ContactForm7();
    }
}
