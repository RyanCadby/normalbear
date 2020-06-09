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
<section class="hero" style="background-image: url('<?php echo $hero_bg; ?>')">
    <div class="container">
        <div class="row">
            <div class="col col-12 col-sm-10 col-md-8">
                <h1 class="display-1 white"><?php echo $hero_head; ?></h1>
                <p class="white quote"><?php echo $hero_sub; ?></p>
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
                <h2 class="d-teal animate" animate="right"><?php echo $img_left_head; ?></h2>
                <p class="quote teal animate" animate="right"><?php echo $img_left_sub; ?></p>
                <p class="animate" animate="right"><?php echo $img_left_desc; ?></p>
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
            <div class="col col-12 col-sm-6 col-md-4 portfolio-item">
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


<?php //---------------- FLEXIBLE CONTENT ----------------//
// check for rows in flexible content
if(have_rows('page') ):
// loop through flexible content rows
while( have_rows('page') ): the_row();

    //---------------- FEATURED SERVICES ----------------//
    // Get row layout name
    if( get_row_layout() == 'featured_services' ):
    // check for rows in that LAYOUT
    if( have_rows( '_featured_services_group') ):?>
    <!-- Featured Services Section -->
    <section class="front-page services">
        <div class="container">
            <div class="row justify-content-center">
                <?php // get rows from GROUP
                while ( have_rows( '_featured_services_group')  ) : the_row();
                    // get rows from REPEATER
                    if( have_rows('featured_services' ) ):
                        // loop through rows in REPEATER
                        while ( have_rows('featured_services') ) : the_row(); ?>
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
                            <a href="<?php the_sub_field('btn_link'); ?>" class="btn btn-secondary"><?php the_sub_field('btn_txt'); ?></a>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endwhile; ?>
        </div>
    </section>
    <?php endif; ?>
    <?php endif; ?>





    <?php //---------------- PORTFOLIO ----------------//
    // Get row layout name
    if( get_row_layout() == 'portfolio' ):
        // check for rows in that LAYOUT
        if( have_rows( '_portfolio_group') ): ?>
        <!-- Portfolio Section -->
        <section class="portfolio" id="portfolio">
            <div class="container-fluid">
            <?php while( have_rows('_portfolio_group') ): the_row();
                // Display section title if enabled
                if( get_sub_field('show_portfolio_section_title')):?>
                    <div class="row head-cont">
                        <div class="col col-12 d-flex justify-content-center">
                            <h2 class="navy"><?php the_sub_field('head'); ?></h2>
                        </div>
                    </div>
                <?php endif; ?>

                <?php // check for rows in portfolio repeater
                if( have_rows('portfolio')): ?>
                    <div class="row">
                    <?php while( have_rows('portfolio')): the_row(); ?>
                        <div class="col col-12 col-sm-6 col-md-4 portfolio-item">
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
                <?php endif; ?>
            <?php endwhile; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>
    <?php endif; ?>


    <?php //---------------- CTA ----------------//
    // Get row layout name
    if( get_row_layout() == 'cta' ):
        // check for rows in that LAYOUT
        if( have_rows( '_cta_group') ): ?>
            <?php while( have_rows('_cta_group') ): the_row();?>
                <!-- CTA Section -->
                <?php cta(); ?>
            <?php endwhile; ?>
        <?php endif; ?>
    <?php endif; ?>


    <?php //---------------- SEARCH BAR ----------------//
    // Get row layout name
    if( get_row_layout() == 'search_bar' ):
        // check for rows in that LAYOUT ?>
            <!-- CTA Section -->
            <?php search_bar(); ?>
    <?php endif; ?>

    <?php //---------------- SUB MENU ----------------//
    // Get row layout name
    if( get_row_layout() == 'sub_menu' ):
    // check for rows in that LAYOUT
    if( have_rows( '_sub_menu') ):?>
    <!-- Child Sub Menu -->
        <section class="sub-menu pb-0">
            <div class="container">
                <div class="row">
                    <?php while( have_rows('_sub_menu') ): the_row(); ?>
                    <?php if( get_sub_field('desc') ): ?>
                        <div class="col col-12 col-md-6">
                            <p class="desc"><?php the_sub_field('desc'); ?></p>
                        </div>
                    <?php endif; ?>
                    <div class="col col-12 col-md-6">
                        <ul class="sub-menu-list">
                            <?php
                            if( have_rows('nav_list')):
                                while( have_rows('nav_list') ): the_row();
                                    $head = get_sub_field('head');
                                    $link = get_sub_field('link');?>
                                    <li class="sub-menu-item">
                                        <a href="<?php echo $link; ?>" class="link">
                                            <i class="fas fa-chevron-circle-right"></i>
                                            <span><?php echo $head; ?></span>
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php endif; ?>



    <?php //---------------- SERVICES ----------------//
    // Get row layout name
    if( get_row_layout() == 'services' ):
        // check for rows in that LAYOUT
        if( have_rows( '_services') ):?>
            <!-- Services -->
            <section class="services service-index">
                <div class="container">
                    <div class="row" id="service-row">
                        <?php while( have_rows('_services') ): the_row(); ?>
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
    <?php endif; ?>




    <?php //---------------- FLIP FLOP CARDS ----------------//
    // Get row layout name
    if( get_row_layout() == 'flip_flop_cards' ): ?>

<!--        --><?php //if( have_rows('flip_flop_cards') ): ?>
<!--            --><?php //while( have_rows('flip_flop_cards') ): the_row(); ?>
<!--                --><?php //if( have_rows('_flip_flop_cards') ): ?>
<!--                    --><?php //while( have_rows('_flip_flop_cards') ): the_row(); ?>
                <?php if( get_row_layout() == 'img-right' ):
                    $head = get_sub_field('head');
                    $sub = get_sub_field('sub');
                    $desc = get_sub_field('desc');
                    $link = get_sub_field('link');
                    $icon = get_sub_field('icon');
                    $bg = get_sub_field('bg');
                    if(!$bg): $bg = get_template_directory_uri() . '/dist/images/grand-child-placeholder-bg-1.png'; endif;
                    $target = strtolower($head);
//                    $target = str_replace(' ', '-', $target);
                    ?>
                    <div class="row img-right child-service-row" target="<?php echo $target; ?>">
                        <div class="col col-12 col-md-7 child-service-cont animate" animate="objRight">
                            <a href="<?php echo $link; ?>" class="child-service-link">
                                <h3 class="head child-service-head"><?php echo $head; ?></h3>
                            </a>
                            <p class="quote"><?php echo $sub; ?></p>
                            <p class="desc"><?php echo $desc; ?></p>
                            <a href="<?php echo $link; ?>" class="learn-more">
                                <span>Learn More</span>
                                <i class="fas fa-chevron-circle-right"></i>
                            </a>
                        </div>
                        <div class="col col-12 col-sm-3 col-md-5 child-service-img-cont animate" animate="in">
                            <a href="<?php echo $link; ?>" class="icon-link" style="background-image:url('<?php echo $bg; ?>')">
                                <?php if($icon): echo wp_get_attachment_image( $icon, 'medium', array( "class" => "child-service-icon" ) ); endif; ?>
                            </a>
                        </div>
                    </div>
                <?php elseif( get_row_layout() == 'img-left' ):
                    $head = get_sub_field('head');
                    $sub = get_sub_field('sub');
                    $desc = get_sub_field('desc');
                    $link = get_sub_field('link');
                    $icon = get_sub_field('icon');
                    $bg = get_sub_field('bg');
                    if(!$bg): $bg = get_template_directory_uri() . '/dist/images/grand-child-placeholder-bg-1.png'; endif;
                    $target = strtolower($head);
                    ?>
                    <div class="row img-left child-service-row" target="<?php echo $target; ?>">
                        <div class="col col-12 col-sm-3 col-md-5 child-service-img-cont animate" animate="in">
                            <a href="<?php echo $link; ?>" class="icon-link" style="background-image:url('<?php echo $bg; ?>')">
                                <?php if($icon): echo wp_get_attachment_image( $icon, 'medium', array( "class" => "child-service-icon" ) ); endif; ?>
                            </a>
                        </div>
                        <div class="col col-12 col-md-7 child-service-cont animate" animate="left">
                            <a href="<?php echo $link; ?>" class="child-service-link">
                                <h3 class="head child-service-head"><?php echo $head; ?></h3>
                            </a>
                            <p class="quote"><?php echo $sub; ?></p>
                            <p class="desc"><?php echo $desc; ?></p>
                            <a href="<?php echo $link; ?>" class="learn-more">
                                <span>Learn More</span>
                                <i class="fas fa-chevron-circle-right"></i>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
<!--            --><?php //endwhile; ?>
<!--                --><?php //endif; ?>
<!--            --><?php //endwhile; ?>
<!--        --><?php //endif; ?>
    <?php endif; ?>




<?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>
