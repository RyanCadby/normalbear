<?php
/**
 * The template for listing all the standard blog posts
 */

get_header();

$id = get_the_ID();

$args =  array(
    'numberposts' => -1,
    'post_status' => 'published',
    'post_type' => 'post'
);
$posts = get_posts($args);

?>

<!-- Child Header -->
<?php child_page_header(null, ''); ?>


<section>
    <div class="container">
        <div class="row">
            <div class="col col-12 div col-lg-8">
                <?php foreach( $posts as $post ):
                    $excerpt = $post->post_excerpt;
                    $content = $post->post_content;
                    $link = get_permalink();
                    if(!$excerpt){
                        $excerpt = wp_trim_words($content, 55);
                    }
                    ?>
                    <div class="blog-prev">
                        <a class="blog-title-link" href="<?php echo $link ?>"><h2><?php echo $post->post_title; ?></h2></a>
                        <p class="blog-excerpt"><?php echo $excerpt; ?></p>
                        <a href="<?php echo $link ?>" class="read-more">learn more <i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i></a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>
