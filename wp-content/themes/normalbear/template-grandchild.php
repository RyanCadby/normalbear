<?php
/**
 * Template Name: Grand Child Template
 * The template for the about page
 */

get_header();

$id = get_the_ID();
$page_title = get_the_title();

// CTA section
$cta = get_field('_cta', $id, true);
$cta_head = $cta['head'];
$cta_sub = $cta['sub'];
$cta_btn_link = $cta['link'];
$cta_btn_txt = $cta['txt'];
$cta_bg = $cta['bg_img'];
if(!$cta_bg): $cta_bg = get_template_directory_uri() . '/dist/images/cta-bg.png'; endif;
?>

<div class="grandchild-content">
    <!-- Child Header -->
    <?php grandchild_page_header($id, $page_title); ?>

    <section class="grandchild">
        <div class="container">
            <div class="row">
                <div class="col col-12 col-md-8 grandchild-bod-cont">
                    <?php
                    wp_reset_query();
                    the_content();
                    ?>
                </div>
            </div>
        </div>
    </section>

    <div class="grandchild-sidebar-cont bg-l-navy">
        <div class="grandchild-sidebar-wrap">
            <?php if ( is_active_sidebar( 'service-sidebar' ) ) : ?>
                <?php dynamic_sidebar( 'service-sidebar' ); ?>
            <?php endif; ?>
        </div>

    </div>
</div>

<!-- CTA Section -->
<section class="cta" style="background-image: url('<?php echo $cta_bg; ?>')">
    <div class="container">
        <div class="row">
            <div class="col col-12 col-md-6">
                <h2 class="white"><?php echo $cta_head; ?></h2>
                <p class="white"><?php echo $cta_sub; ?></p>
            </div>
            <div class="col col-12 col-md-6 btn-cont">
                <a class="btn btn-primary" href="<?php echo get_template_directory_uri() . $cta_btn_link; ?>"><?php echo $cta_btn_txt; ?></a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>