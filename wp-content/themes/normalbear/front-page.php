<?php
/**
 * The front page: this page will automatically be used
 * for the front page declared in wp settings > reading
 */

get_header();

?>

<!-- Child Header -->
<?php child_page_header(); ?>


<section>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Hello World!, this is the home page</h1>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <?php show_card_section(); ?>
        </div>
    </div>
</section>


<?php get_footer(); ?>
