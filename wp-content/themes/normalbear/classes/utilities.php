<?php
/** UTILITIES.PHP
// ----- Version: 1.0
// ----- Released: 4.5.2020
// ----- Description: Add theme specific utilities and functions/misc.
**/


// Load template part (instead of print/echo)
function load_template_part($template_name, $part_name = null)
{
    ob_start();
    get_template_part($template_name, $part_name);
    $var = ob_get_contents();
    ob_end_clean();
    return $var;
}


function clean_ID($string)
{
    $string = strtolower($string);
    $string = str_replace([' ', '-'], "_", $string);
    $string = str_replace(['.', ':', ';', '"', "'", '/', '#', '*', '$', '%', '@', '?', '!', '(', ')', '=', '+'], "", $string);
    $string = 's_' . $string;


    return $string;

}

// Odd/Even Function
function oddEven($number)
{
    if ($number % 2 == 0) {
        return 'even';
    } else {
        return 'odd';
    }
}


// Shorten String Function
function safe_string($string, $max)
{
    $length = strlen($string);

    if ($length > $max):

        $tok = strtok($string, ' ');
        $string = '';
        while ($tok !== false && strlen($string) < $max) {
            if (strlen($string) + strlen($tok) <= $max)
                $string .= $tok . ' ';
            else
                break;
            $tok = strtok(' ');
        }

        $last_char = substr(trim($string), -1);
        if (in_array($last_char, ['.', ',', '!', '?', ':', ';'], true)):
            return substr(trim($string), 0, -1) . '...';
        else:
            return trim($string) . '...';
        endif;

    else:
        return $string;
    endif;
}


// Remove Reference Links
function clean_refs($string)
{
    $start = "<sup";
    $end = "</sup>";
    $start_p = strpos($string, $start);
    $end_p = strpos($string, $end);
    if ($start_p === false || $end_p === false) {
        return $string;
    }

    $end_l = strlen($end);

    return substr($string, 0, $start_p) . substr($string, ($end_p + $end_l));
}


// Get Hash # "ID" from String
function get_hash($string)
{
    $string = strtolower($string);
    $string = str_replace(' & ', ' ', $string);
    $string = str_replace([' ', '-'], '_', $string);
    return $string;
}


// Remove unwanted copy from the front of titles
function clean_title($string)
{
    $string = str_replace([
        'Category | ',
        'Category |',
        'Category| ',
        'Category|',
        'Career | ',
        'Career |',
        'Career| ',
        'Career|',
        'Template | ',
        'Template |',
        'Template| ',
        'Template |',
        ' | Main',
        ' – Main',
    ], "", $string);
    return $string;
}


// Get Primary Category
function get_primary_cat()
{

    // get vars
    global $post;
    $post_categories = get_the_category($post->ID);
    $skip_categories = get_field('skip_categories', 'option');
    $primary_category = get_post_meta($post->ID, 'epc_primary_category', true);
    $return_cat = "";

    // has primary > use it
    if ($primary_category && in_array($primary_category, $post_categories)) {
        $return_cat = $primary_category;

        // no primary > use first unrestricted category
    } else {
//        print_R($post_categories);
//        print_R($post_categories[0]->term_id);
        foreach ($post_categories as $cat) {
//            if (!in_array($cat->term_id, $post_categories, false)) {
//                $return_cat = intval($cat->term_id);
//            } else{
//                $return_cat = $post_categories[0]->term_id;
//            }
            $return_cat = $post_categories[0]->term_id;
        }
    }

    // if category was selected, return it
    if ($return_cat !== '') {
        return $return_cat;

        // no unrestricted > return/force first category
    } else {
        if (count($post_categories) > 0) {
            return $post_categories[0]->term_id;
        } else {
            return 0;
        }
    }

}


function jsonString($string)
{
    $string = strip_tags($string);
    $string = str_replace('"', "", $string);
    return $string;
}
