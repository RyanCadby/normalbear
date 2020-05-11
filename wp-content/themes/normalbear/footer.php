</div>
<!--END CONTENT-->

<!--START FOOTER-->
<?php
wp_footer();

$site_copyright = get_field('site_copyright', 'option', false);

$footer_info_title = get_field('footer_info_title', 'option');
$footer_info_copy = get_field('footer_info_copy', 'option');

$footer_menu_title = get_field('footer_menu_title', 'option');

$footer_connect_title = get_field('footer_connect_title', 'option');
$footer_connect_list = ''; //build repeater, social type, social link, FB, Insta, Twi, Linkedin, Youtube, -- print string

$about = get_field('_about', 'option');
$phone = $about['phone_num'];
$email = $about['email'];
$address_1 = $about['address_line_1'];
$address_2 = $about['address_line_2'];
$city = $about['city'];
$state = $about['state'];
$zip = $about['zip'];

?>
<footer>
    <!-- Footer section - populated with the theme options footer section and widgets -->
    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col col-12 col-sm-6 col-md-3">
                    <img class="logo footer-logo mb-3" src="<?php echo get_template_directory_uri() . '/dist/images/nb-logo-hor-blk.png'; ?>" alt="Normal Bear Logo">
                    <?php if ( is_active_sidebar( 'left-col' ) ) : ?>
                        <?php dynamic_sidebar( 'left-col' ); ?>
                    <?php endif; ?>
                    <a class="btn btn-primary mt-3" href="<?php echo get_template_directory_uri() . '/contact'?>">Let's Talk.</a>
                </div>
                <div class="col col-12 col-md-6 col-lg-3 footer-nav-cont">
                    <?php if ( is_active_sidebar( 'center-col' ) ) : ?>
                        <?php dynamic_sidebar( 'center-col' ); ?>
                    <?php endif; ?>
                </div>
                <div class="col col-12 col-sm-6 col-md-3 footer-contact-cont">
                    <h4>Contact</h4>
                    <?php if($phone): ?>
                        <div class="phone-cont">
                            <a class="phone" href="tel:<?php echo $phone; ?>"><i class="fas fa-mobile-alt"></i> <span><?php echo $phone ?></span></a>
                        </div>
                    <?php endif; ?>
                    <div class="email-cont">
                        <a class="email" href="mailto:<?php echo $email; ?>"><i class="fas fa-envelope"></i> <span><?php echo $email; ?></span></a>
                    </div>
                    <div class="address-cont">
                        <a class="address" href="https://www.google.com/maps/place/<?php echo $address_1 . '+' . $city . '+' . $state . '+' . $zip;?>">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="address-item-cont">
                                <p class="address-item address1"><?php echo $address_1; ?></p>
                                <?php if($address_2): ?>
                                <p class="address-item address2"><?php echo $address_2; ?></p>
                                <?php endif; ?>
                                <p class="address-item address3"><?php echo $city . ', ' . $state .  $zip?></p>
                            </div>
                        </a>
                    </div>

                </div>
                <div class="col col-12 col-sm-6 col-md-3">
                    <h4>Subscribe</h4>
                    <div class="email-input"></div>
                    <?php if ( is_active_sidebar( 'right-col' ) ) : ?>
                        <?php dynamic_sidebar( 'right-col' ); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Bottom Bar / Copyright -->
    <section id="bottom-bar">
        <div class="container">
            <div class="row">
                <div class="col col-12" id="copyright">
                    <span class="x-small"><?php echo $site_copyright; ?></span>
                </div>
            </div>
        </div>
    </section>

</footer>



<!--END PAGE, BODY, & HTML-->
</div>
</body>
</html>