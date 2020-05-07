<?php

// Classes
require_once( __DIR__ . '/classes/admin.php');
require_once( __DIR__ . '/classes/breadcrumb.php');         //** needs optimization
require_once( __DIR__ . '/classes/custom-fields.php');
//require_once( __DIR__ . '/classes/custom-post-type.php');   ** needs optimization
require_once( __DIR__ . '/classes/images.php');
require_once( __DIR__ . '/classes/menus.php');
//require_once( __DIR__ . '/classes/queries.php');            ** needs optimization
//require_once( __DIR__ . '/classes/site-search.php');        ** needs optimization
//require_once( __DIR__ . '/classes/structured-data.php');    ** needs optimization
require_once( __DIR__ . '/classes/theme-options.php');
require_once( __DIR__ . '/classes/utilities.php');
require_once( __DIR__ . '/classes/widgets.php');


// Components
require_once( __DIR__ . '/components/card.php');
require_once( __DIR__ . '/components/featured-card.php');
require_once( __DIR__ . '/components/modal.php');


// Sections
require_once( __DIR__ . '/sections/card-section.php');
require_once( __DIR__ . '/sections/parent-page-header.php');
require_once ( __DIR__ . '/sections/child-page-header.php');


// Enqueue Styles and Scripts based on page template
function enqueue_global_assets()
{
    // JQuery JS - swap WordPress' default and re-register
    wp_deregister_script('jquery'); // Disable WordPress' own version of JQuery, cf. http://wordpress.stackexchange.com/questions/189310/how-to-remove-default-jquery-and-add-js-in-footer
    wp_register_script( 'jQuery', 'https://code.jquery.com/jquery-3.4.1.min.js', array(), '3.4.1', false );
    wp_enqueue_script('jQuery');

    wp_enqueue_style('global-styles', get_template_directory_uri() . '/dist/css/global.css', array(), '1.0.0', 'all');
    wp_enqueue_script('global-scripts', get_template_directory_uri() . '/dist/js/global.js', array(), '1.0.0', false);
}

add_action('wp_enqueue_scripts', 'enqueue_global_assets');