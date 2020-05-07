<?php
/**
 * Template Name: About
 * The template for the about page
 */

get_header();

$id = get_the_ID();

?>

<!-- Child Header -->
<?php child_page_header(null, ''); ?>


<section>
    <div class="container">
        <div class="row">
            <div class="col col-12">
                <p>Hello World, This is the About Page</p>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>
