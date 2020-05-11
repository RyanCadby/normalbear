<?php
/**
 * Template Name: Child Template
 * The template for the about page
 */

get_header();

$id = get_the_ID();

// header section
$header = get_field('_header');
$page_title = $header['head'];
$page_sub_title = $header['sub'];
$header_bg = $header['bg'];

?>

<!-- Child Header -->
<?php parent_page_header($page_title, $page_sub_title, $header_bg); ?>
