<?php
/**
 * Template Name: Child Template
 * The template for the about page
 */

get_header();

$id = get_the_ID();

// header section
$header = get_field('_header');
$page_title = $header['head'];
$page_sub_title = $header['sub'];
$header_bg = $header['bg'];

// sub menu
$sub_menu = get_field('_sub_menu');
$sub_desc = $sub_menu['desc'];

// Portfolio Section
$portfolio = get_field('portfolio_');

// Process Section
$process = get_field('_process');
$process_head = $process['head'];
$process_sub = $process['sub'];

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

<!-- Sub Menu -->
<section class="sub-menu">
    <div class="container">
        <div class="row">
            <div class="col col-12 col-md-6">
                <p class="desc"><?php echo $sub_desc; ?></p>
            </div>
            <div class="col col-12 col-md-6">
                <ul class="sub-menu-list">
                    <?php
                    if( have_rows('_sub_menu')):
                        while( have_rows('_sub_menu') ): the_row();
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
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Child Services -->
<section class="child-services">
    <div class="container">

        <?php if( have_rows('service_items') ): ?>
            <?php while( have_rows('service_items') ): the_row(); ?>
                <?php if( get_row_layout() == 'img-right' ):
                    $head = get_sub_field('head');
                    $sub = get_sub_field('sub');
                    $desc = get_sub_field('desc');
                    $link = get_sub_field('link');
                    $icon = get_sub_field('icon');
                    $bg = get_sub_field('bg');
                    if(!$bg): $bg = get_template_directory_uri() . '/dist/images/grand-child-placeholder-bg-1.png'; endif;
                    ?>
                    <div class="row img-right">
                        <div class="col col-12 col-sm-9 col-md-7 child-service-cont">
                            <h2 class="head child-service-head"><?php echo $head; ?></h2>
                            <p class="quote"><?php echo $sub; ?></p>
                            <p class="desc"><?php echo $desc; ?></p>
                            <a href="<?php echo $link; ?>" class="learn-more">
                                <span>Learn More</span>
                                <i class="fas fa-chevron-circle-right"></i>
                            </a>
                        </div>
                        <div class="col col-12 col-sm-3 col-md-5 child-service-img-cont">
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
                    ?>
                    <div class="row img-left">
                        <div class="col col-12 col-sm-3 col-md-5 child-service-img-cont">
                            <a href="<?php echo $link; ?>" class="icon-link" style="background-image:url('<?php echo $bg; ?>')">
                                <?php if($icon): echo wp_get_attachment_image( $icon, 'medium', array( "class" => "child-service-icon" ) ); endif; ?>
                            </a>
                        </div>
                        <div class="col col-12 col-sm-9 col-md-7 child-service-cont">
                            <h2 class="head child-service-head"><?php echo $head; ?></h2>
                            <p class="quote"><?php echo $sub; ?></p>
                            <p class="desc"><?php echo $desc; ?></p>
                            <a href="<?php echo $link; ?>" class="learn-more">
                                <span>Learn More</span>
                                <i class="fas fa-chevron-circle-right"></i>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>


<!-- Portfolio Section -->
<section class="portfolio" id="portfolio">
    <div class="container-fluid">
        <?php if(have_rows('portfolio_') ): ?>
            <div class="row">
                <?php while( have_rows('portfolio_') ): the_row(); ?>
                    <div class="col col-sm-6 col-md-4">
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

<!-- Process Section -->
<section class="process">
    <div class="container">
        <div class="row">
            <div class="col col-12">
                <h2 class="d-teal"><?php echo $process_head; ?></h2>
            </div>
            <div class="col col-12 col-sm-8 col-md-6">
                <p class="sub teal"><?php echo $process_sub; ?></p>
            </div>
        </div>

        <div class="row process-step-cont">
            <?php
            if( have_rows('_process') ):
            while( have_rows('_process') ): the_row();
            if( have_rows('steps_') ):
            while( have_rows('steps_') ): the_row();
            $num = get_sub_field('num');
            $head = get_sub_field('head');
            $desc = get_sub_field('desc');
            ?>
            <div class="col col-12 col-sm-6 col-md-4 process-step">
                <div class="process-card">
                    <p class="head step-head"><span><?php echo $num; ?></span> <?php echo $head; ?></p>
                    <p class="desc"><?php echo $desc; ?></p>
                </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>



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