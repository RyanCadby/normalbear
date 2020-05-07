<?php
/* Template Name: Blog Category Index Page */

//get template fields
$description = get_field('page_description');

get_header();

$address_line_1 = get_field('address_line_1', 'option');
$address_line_2 = get_field('address_line_2', 'option');
$address_city = get_field('address_city', 'option');
$address_state = get_field('address_state', 'option');
$address_postal_code = get_field('address_postal_code', 'option');


?>

    <!-- Child Header -->
    <?php child_page_header(null, ''); ?>


    <section>
        <div class="container">
            <div class="row">
                <div class="col col-12 col-md-4">
                    <!-- echo address and other contact info -->
                </div>
                <div class="col col-12 col-md-8">
                    <!-- Echo forminator pro form here -->
                </div>
            </div>
        </div>
    </section>


<?php get_footer(); ?>
