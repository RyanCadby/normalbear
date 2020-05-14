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
require_once( __DIR__ . '/classes/wysiwyg.php');


// Components
require_once( __DIR__ . '/components/card.php');
require_once( __DIR__ . '/components/featured-card.php');
require_once( __DIR__ . '/components/modal.php');


// Sections
require_once( __DIR__ . '/sections/card-section.php');
require_once( __DIR__ . '/sections/page-header.php');
require_once ( __DIR__ . '/sections/grandchild-page-header.php');
require_once ( __DIR__ . '/sections/cta.php');


// Enqueue Styles and Scripts based on page template
function register_assets()
{

    // JQuery JS - swap WordPress' default and re-register
    wp_deregister_script('jquery'); // Disable WordPress' own version of JQuery, cf. http://wordpress.stackexchange.com/questions/189310/how-to-remove-default-jquery-and-add-js-in-footer
    wp_register_script( 'jQuery', 'https://code.jquery.com/jquery-3.4.1.min.js', array(), '3.4.1', false );
    wp_enqueue_script('jQuery');

    wp_enqueue_style('global-styles', get_template_directory_uri() . '/dist/css/global.css', array(), '1.0.0', 'all');
    wp_enqueue_script('global-scripts', get_template_directory_uri() . '/dist/js/global.js', array(), '1.0.0', false);
    wp_enqueue_script('search-scripts', get_template_directory_uri() . '/dist/js/dynamic-search.js', array(), '1.0.0', false);

    //   front page
    if ( is_front_page() ):
        wp_enqueue_style('front-page-styles', get_template_directory_uri() . '/dist/css/front-page.css', array(), '1.0.0', 'all');
    //   parent page / service index page
    elseif ( is_page_template('template-parent.php') ):
        wp_enqueue_style('parent-page-styles', get_template_directory_uri() . '/dist/css/parent-page.css', array(), '1.0.0', 'all');
    //   child page
    elseif ( is_page_template('template-child.php') ):
        wp_enqueue_style('child-page-styles', get_template_directory_uri() . '/dist/css/child-page.css', array(), '1.0.0', 'all');
    //   GRANDchild page
    elseif ( is_page_template('template-grandchild.php') ):
        wp_enqueue_style('grandchild-page-styles', get_template_directory_uri() . '/dist/css/grandchild-page.css', array(), '1.0.0', 'all');


    endif;

}

add_action('wp_enqueue_scripts', 'register_assets');

