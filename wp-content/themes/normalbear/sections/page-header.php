<?php
/** PARENT_PAGE_HEADER.PHP
// ----- Version: 1.0
// ----- Released: 4.5.2020
// ----- Description: SBC parent page header
// ----- Instructions: call "parent_page_header()" to print the parent page header
 **/
function page_header($page_title=null, $desc=null, $bg_img=null, $bg_color=null, $heirarchy='parent'){
    if($page_title == null){
        $page_title = get_the_title();
    }
    if($desc == null){
        $desc = get_the_excerpt();
    }
    ?>
    <section class="<?php echo $heirarchy; ?>-header" style="background-image: url('<?php if($bg_img != null): echo $bg_img; endif; ?>')">
        <!-- full width background - defaults to bg-primary class -->
        <div class="container-fluid <?php echo $bg_color; ?>">
            <!-- content width container -->
            <div class="container">
                <div class="row">
                    <div class="col col-12 col-md-8">
                        <?php mj_wp_breadcrumb(); ?>
                        <h1 class="head <?php echo $heirarchy; ?>-head white"><?php echo $page_title; ?></h1>
                        <?php if($desc): ?>
                            <div class="<?php echo $heirarchy; ?>-desc-cont">
                                <p class="desc quote <?php echo $heirarchy; ?>-desc white">
                                    <?php echo $desc; ?>
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!--
                -- full width background image if a background image is used
                -- styles are applied to the container
                -- overlay is applied to the container
            -->
        </div>
    </section>
<?php } ?>