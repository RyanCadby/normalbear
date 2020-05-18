<?php

function cta($id) {
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


    <!-- CTA Section -->
    <section class="cta" style="background-image: url('<?php echo $cta_bg; ?>')">
        <div class="container">
            <div class="row">
                <div class="col col-12 col-md-8">
                    <div class="cta-copy animate" animate="right">
                        <h2 class="white mb-2 animate" animate="heightBefore"><?php echo $cta_head; ?></h2>
                        <p class="white quote"><?php echo $cta_sub; ?></p>
                    </div>
                </div>
                <div class="col col-12 col-md-4 btn-cont">
                    <a class="btn btn-<?php echo $cta_btn_color; ?> btn-cta" href="<?php echo get_template_directory_uri() . $cta_btn_link; ?>"><?php echo $cta_btn_txt; ?></a>
                </div>
            </div>
        </div>
    </section>
    <?php
}?>