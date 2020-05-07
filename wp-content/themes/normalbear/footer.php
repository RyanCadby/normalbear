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


?>
<footer>
    <!-- Footer section - populated with the theme options footer section and widgets -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col col-12 col-sm-6 col-md-4">
                    <?php if ( is_active_sidebar( 'left-col' ) ) : ?>
                        <?php dynamic_sidebar( 'left-col' ); ?>
                    <?php endif; ?>
                </div>
                <div class="col col-12 col-sm-6 col-md-4">
                    <?php if ( is_active_sidebar( 'center-col' ) ) : ?>
                        <?php dynamic_sidebar( 'center-col' ); ?>
                    <?php endif; ?>
                </div>
                <div class="col col-12 col-sm-6 col-md-4">
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
                    <span class="x-small">© <?php echo date('Y') . " " . $site_copyright; ?></span>
                </div>
            </div>
        </div>
    </section>

</footer>



<!--END PAGE, BODY, & HTML-->
</div>
</body>
</html>