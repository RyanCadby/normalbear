<?php
/* Template Name: Blog Category Index Page */

//get template fields
$description = get_field('page_description');

get_header();

?>

    <!-- Child Header -->
    <?php child_page_header(null, ''); ?>

    <!--BLOG QUERY-->
    <section>
        <div class="container">
            <div class="row" id="ajax-cats">

                <?php
                $args = array(
                    'taxonomy' => 'category',
                    'hide_empty' => false,
//                    'orderby' => 'meta_value_num',
//                    'order' => 'DESC',
                    'posts_per_page' => -1
                );
                $categories = get_terms($args);
                $i = 1;

                $all_cats = get_categories();
                $total_cats = count($all_cats);


                foreach ( $categories as $category ) :
                    // Skip the Uncategorized category.
                    if ( $category->slug == 'uncategorized' ) {
                        continue;
                    }
                    ?>
                    <div class="cat-card col col-12 col-md-6 col-lg-4 <?php if($i >= 7): echo 'new-cats'; endif; ?>" id="<?php echo $i; ?>">
                        <?php
                        $name = $category->name;
                        $link = get_field('custom_permalink', 'term_' . $category->term_id);
                        if(!$link):
                            $link = get_category_link($category->term_id);
                        endif;
                        $image = get_field('category_img', 'term_' . $category->term_id);
                        $size = 'card-img';
                        $img = wp_get_attachment_image( $image, $size, '', ["class" => "attachment-card-img size-card-img blog-card-img"] );
                        $desc = $category->description;
                        ?>
                        <a href="<?php echo $link; ?>" class="blog-card mb-4">
                            <?php if (!$img): ?>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/placeholder-img.jpg" alt="no image" class="blog-card-img">
                            <?php else: echo $img; endif; ?>
                            <div class="blog-card-meta">
                                <h3 class="blog-card-title"><?php echo $name; ?></h3>
                                <?php if($desc): ?>
                                    <p class="blog-card-desc">
                                        <span><?php echo $desc; ?></span>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </a>

                    </div>
                    <?php $i++; ?>
                <?php endforeach; ?>

                <?php wp_reset_postdata(); ?>

            </div>
            <!-- Load More button -->
            <div id="more_cats" class="btn full icon d-none" total="<?php echo $total_cats; ?>"><?php the_field('ajax_button_text', 'option') ?> <i class="fas fa-chevron-right"></i></div>
        </div>
    </section>


<?php get_footer(); ?>