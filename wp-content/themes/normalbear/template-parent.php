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
$cta_btn_color = $cta['btn_color'];

?>

<!-- Child Header -->
<?php page_header($page_title, $page_sub_title, $header_bg); ?>

<!-- Dynamic Search Bar -->
<section class="search-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-11">
                <input type="text" id="dynamic-search" class="dynamic-search" placeholder="Searching for something specific?">
                <i class="fas fa-search"></i>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<?php if(have_rows('services_')): ?>
    <section class="services service-index">
        <div class="container">
            <div class="row" id="service-row">
                <?php while( have_rows('services_') ): the_row(); ?>
                    <?php
                    $icon = get_sub_field('img');
                    $head = get_sub_field('head');
                    $desc = get_sub_field('desc');
                    $link = get_sub_field('link');
                    $target = strtolower($head);
//                    $target = str_replace(' ', '-', $target);
                    ?>
                    <div class="col col-12 col-sm-6 col-md-4 service-col" target="<?php echo $target; ?>">
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
<?php cta($id); ?>




<?php get_footer(); ?>
