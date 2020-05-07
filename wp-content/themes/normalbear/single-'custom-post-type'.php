<?php

/**
 * The page is used to show individual posts for a custom post type
 */

get_header();


$id = get_the_ID();
$img = get_the_post_thumbnail($id, 'full', array( 'class' => 'feat-img' ));
$content = apply_filters('the_content', get_post_field('post_content', $id));


?>

    <!-- Child Header -->
    <?php child_page_header(); ?>

    <!-- Custom post type individual content -->
    <section>
        <div class="container">
            <div class="row justify-content-between">
                <div class="col col-12 col-md-8">
                    <?php echo $img; ?>
                </div>
                <div class="col col-12 col-md-8">
                    <?php echo $content; ?>
                </div>

                <?php //get_template_part('modules/services','sidebar'); ?>
            </div>
        </div>
    </section>


<?php get_footer(); ?>