<?php
/**
 * Template Name: Grand Child Template
 * The template for the about page
 */

get_header();

$id = get_the_ID();
$page_title = get_the_title();
?>

<!-- Child Header -->
<?php grandchild_page_header($id, $page_title); ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col col-12 col-md-8">
                <?php
                wp_reset_query();
                the_content(); ?>
            </div>
        </div>
    </div>
</section>

<?php wp_footer(); ?>