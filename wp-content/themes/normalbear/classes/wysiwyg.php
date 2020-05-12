<?php



/*
* Callback function to filter the MCE settings
*/

function my_mce_before_init_insert_formats( $init_array ) {

// Define the style_formats array

    $style_formats = array(
        /*
        * Each array child is a format with it's own settings
        * Notice that each array has title, block, classes, and wrapper arguments
        * Title is the label which will be visible in Formats menu
        * Block defines whether it is a span, div, selector, or inline style
        * Classes allows you to define CSS classes
        * Wrapper whether or not to add a new block-level element around any selected elements
        */
        array(
            'title' => 'Sub Title Purple',
            'block' => 'span',
            'classes' => 'grandchild-sub quote purple',
            'wrapper' => true,

        ),
        array(
            'title' => 'Sub Title Teal',
            'block' => 'span',
            'classes' => 'grandchild-sub quote teal',
            'wrapper' => true,
        ),
        array(
            'title' => 'Paragraph',
            'block' => 'span',
            'classes' => 'paragraph',
            'wrapper' => true,
        ),
        array(
            'title' => 'Image Left',
            'block' => 'div',
            'classes' => 'grandchild-img-cont',
            'wrapper' => true,
        ),
//        array(
//            'title' => 'Two Column',
//            'block' => 'div',
//            'classes' => 'grandchild-img-cont',
//            'wrapper' => true,
//        ),
    );
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );

    return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

function wpb_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');


function my_theme_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );