<!doctype html>
<html lang="en">


<head>
    <?php wp_head() ;?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo the_title() . ' | ' . get_bloginfo('name'); ?></title>



    <!-- Header Code -->
    <?php the_field('header_code', 'option'); ?>

    <!-- Link Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Montserrat:wght@400;500;600;700&family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Link Animation Library -->
    <script src="https://unpkg.com/scrollreveal@4"></script>

    <!-- Link Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Link Jquery -->
<!--    <script type='text/javascript' src='https://code.jquery.com/jquery-3.4.1.min.js?ver=3.4.1'></script>-->
    <!-- Link included files and stylesheets -->
<!--    <script src="https://kit.fontawesome.com/70e2c44acf.js" crossorigin="anonymous"></script>-->

</head>

<!-- START BODY -->
<body <?php body_class(); ?>>

<?php
$GLOBALS['prefix'] = 'localhost/normalbear';
$about = get_field('_about', 'option');
$site_logo = null;
if(isset($about['logo'])):
    $site_logo = $about['logo'];
endif;
$logo_size = 'medium';
?>

<!-- START PAGE -->
<div id="page">

    <section class="bg-navy nav-section" id="navbar-section">
        <div class="container">

            <!--    Start Nav Bar   -->
            <nav class="navbar navbar-expand-lg" id="navbar">

                <!-- nav bar logo -->
                <a class="navbar-brand" href="<?php echo get_home_url(); ?>" id="logo">
                    <?php if ($site_logo):
                        echo wp_get_attachment_image( $site_logo, $logo_size, false, array('class' => 'nav-logo') ); ?>
                    <?php else: ?>
                        <span><?php echo get_bloginfo('name'); ?></span>
                    <?php endif; ?>
                </a>

                <!--toggle mobile nav-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- nav menu Items -->
                <?php
                wp_nav_menu( array(
                    'theme_location'  => 'top-nav',
                    'depth'           => 1, // 1 = no dropdowns, 2 = with dropdowns.
                    'container'       => 'div',
                    'container_class' => 'collapse navbar-collapse',
                    'container_id'    => 'navbarSupportedContent',
                    'menu_class'      => 'navbar-nav ml-auto',
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'          => new WP_Bootstrap_Navwalker(),
                ) );
                ?>

            </nav>
            <!-- End Nav Bar -->
        </div>
        <!-- End Container -->
    </section>
    <!-- End Section -->


<!-- START CONTENT -->
<div id="content" >