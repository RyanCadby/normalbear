<?php
/** ARCHIVE-"".PHP
// ----- Version: 1.0
// ----- Released: 4.5.2020
// ----- Description: index page for custom post type
// ----- Instructions: insert the custom post type handle in the $args array below,
         add custom post type title as a class for the container "custom-post-type-cont"
 **/

$id = get_the_ID();

$args = array(
    'post_type' => '** INSERT CUSTOM POST TYPE HERE **',
    'post_status' => 'publish',
    'posts_per_page' => -1
);
$posts = get_posts($args);


get_header();
?>
    <!-- call child page header function -->
    <?php child_page_header(); ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col col-12 col-md-8">

                    <?php
                        foreach ( $posts as $post ):
                        setup_postdata($post);
                        $id = get_the_ID();

                        // card function
                        sbc_card($id);

                        endforeach;
                        wp_reset_postdata();
                    ?>

                </div>
                <?php //get_template_part('modules/services','sidebar'); ?>
            </div>
        </div>
    </section>




<?php get_footer(); ?>