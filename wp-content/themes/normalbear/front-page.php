<?php
/**
 * The front page: this page will automatically be used
 * for the front page declared in wp settings > reading
 */

get_header();

?>

<?php //------ variables ------//
    $id = get_the_ID();
    // Hero
    $hero = get_field('_hero');
    $hero_bg = $hero['bg_img'];
    $hero_head = $hero['head'];
    $hero_sub = $hero['sub'];
    $hero_btn_txt = $hero['btn_txt'];
    $hero_btn_link = $hero['btn_link'];

    // Title Left
    $title_left = get_field('_title_left_section');
    $title_left_title = $title_left['head'];
    $title_left_sub = $title_left['sub'];
    $title_left_desc = $title_left['desc'];

    // Services Section
    $service_btn_txt = get_field('services_btn_txt');
    $service_btn_link = get_field('services_btn_link');

    // Image Left Section
    $img_left_section = get_field('_img_left_section');
    $img_left = $img_left_section['img'];
    $img_left_head = $img_left_section['head'];
    $img_left_sub = $img_left_section['sub'];
    $img_left_desc = $img_left_section['desc'];

    // CTA section
    $cta = get_field('_cta', $id, true);
    $cta_head = $cta['head'];
    $cta_sub = $cta['sub'];
    $cta_btn_link = $cta['link'];
    $cta_btn_txt = $cta['txt'];
    $cta_bg = $cta['bg_img'];
    if(!$cta_bg): $cta_bg = get_template_directory_uri() . '/dist/images/cta-bg.png'; endif;

    // Portfolio Section
    $portfolio_head = get_field('portfolio_head');
    $portfolio = get_field('portfolio_');


?>
<section class="hero" style="background-image: url('<?php echo $hero_bg; ?>)">
    <div class="container">
        <div class="row">
            <div class="col col-12 col-sm-10 col-md-8 col-lg-6">
                <h1 class="display-1 white"><?php echo $hero_head; ?></h1>
                <p class="white"><?php echo $hero_sub; ?></p>
                <div class="btn-cont">
                    <a class="btn btn-primary" href="<?php echo $hero_btn_link; ?>"><?php echo $hero_btn_txt; ?></a>
                </div>
            </div>
            <img class="accent landing-line" src="<?php echo get_template_directory_uri(); ?>/dist/images/landing-line.png" alt="">
        </div>

    </div>
</section>

<!-- Title Left Section -->
<section class="title-left">
    <div class="container">
        <div class="row">
            <div class="col col-12 col-md-4">
                <h2 class="purple"><?php echo $title_left_title; ?></h2>
            </div>
            <div class="col col-12 col-md-8">
                <p class="quote purple"><?php echo $title_left_sub; ?></p>
                <p><?php echo $title_left_desc; ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<?php if(have_rows('services_')): ?>
    <section class="front-page services">
        <div class="container">
            <div class="row justify-content-center">
                <?php while( have_rows('services_') ): the_row(); ?>
                <?php
                    $icon = get_sub_field('img');
                    $head = get_sub_field('head');
                    $desc = get_sub_field('desc');
                    $link = get_sub_field('link');
                ?>
                    <div class="col col-10 col-sm-6 col-md-4">
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
                            <p class="card-desc service-desc"><?php echo $desc; ?></p>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="row">
                <div class="col col-12 justify-content-center d-flex">
                    <a href="<?php echo $service_btn_link; ?>" class="btn btn-secondary"><?php echo $service_btn_txt; ?></a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- Image Left Section -->
<section class="img-left p-0">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col col-12 col-md-4 col-lg-6 d-none d-md-block overflow-hidden">
                <?php
                if($img_left):
                    echo wp_get_attachment_image( $img_left, 'medium');
                else:
                    echo '<img src="' . get_template_directory_uri() . '/dist/images/placeholder.jpg">';
                endif;?>
            </div>
            <div class="col col-12 col-md-8 col-lg-6 bod">
                <h2 class="d-teal"><?php echo $img_left_head; ?></h2>
                <p class="quote teal"><?php echo $img_left_sub; ?></p>
                <p><?php echo $img_left_desc; ?></p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<?php cta($id); ?>


<!-- Portfolio Section -->
<section class="portfolio" id="portfolio">
    <div class="container-fluid">
        <div class="row head-cont">
            <div class="col col-12 d-flex justify-content-center">
                <h2 class="navy"><?php echo $portfolio_head; ?></h2>
            </div>
        </div>
        <?php if(have_rows('portfolio_') ): ?>
        <div class="row">
            <?php while( have_rows('portfolio_') ): the_row(); ?>
            <div class="col col-12 col-sm-6 col-md-4">
                <?php
                $img = get_sub_field('img');
                if($img):
                    echo wp_get_attachment_image( $img, 'medium');
                else:
                    echo '<img src="' . get_template_directory_uri() . '/dist/images/placeholder.jpg">';
                endif; ?>
                <div class="portfolio-overlay"></div>
                <div class="portfolio-hover"><h3 class="white"><?php //echo $head; ?></h3></div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
</section>


<?php get_footer(); ?>
