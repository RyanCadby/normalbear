<?php
/**
 * Template Name: Parent Template
 * The template for the about page
 */

get_header();

$id = get_the_ID();

// header section
$header = get_field('_header');
$page_title = $header['head'];
$page_sub_title = $header['sub'];
$header_bg = $header['bg'];

// CTA section
$cta = get_field('_cta', $id, true);
$cta_head = $cta['head'];
$cta_sub = $cta['sub'];
$cta_btn_link = $cta['link'];
$cta_btn_txt = $cta['txt'];
$cta_bg = $cta['bg_img'];
if(!$cta_bg): $cta_bg = get_template_directory_uri() . '/dist/images/cta-bg.png'; endif;

?>

<!-- Child Header -->
<?php parent_page_header($page_title, $page_sub_title, $header_bg); ?>

<!-- Services Section -->
<?php if(have_rows('services_')): ?>
    <section class="services service-index">
        <div class="container">
            <div class="row">
                <?php while( have_rows('services_') ): the_row(); ?>
                    <?php
                    $icon = get_sub_field('img');
                    $head = get_sub_field('head');
                    $desc = get_sub_field('desc');
                    $link = get_sub_field('link');
                    ?>
                    <div class="col col-12 col-sm-6 col-md-4">
                        <a href="<?php echo $link; ?>" class="card service-card">
                            <div class="icon-cont">
                                <?php
                                if($icon):
                                    echo wp_get_attachment_image( $icon, 'medium');
                                else:
                                    echo '<img src="' . get_template_directory_uri() . '/dist/images/service-icon-placeholder.png">';
                                endif;?>
                            </div>
                            <p class="service-head card-head"><?php echo $head; ?></p>
                            <p class="card-desc service-desc mb-0"><?php echo $desc; ?></p>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- CTA Section -->
<section class="cta" style="background-image: url('<?php echo $cta_bg; ?>'">
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
