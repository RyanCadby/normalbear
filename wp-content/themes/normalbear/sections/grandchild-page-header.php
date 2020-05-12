
<?php
/** GRANDCHILD-PAGE-HEADER.PHP
// ----- Version: 1.0
// ----- Released: 4.5.2020
// ----- Description: SBC child page header
// ----- Instructions: call "child_page_header()" to print the child page header
 **/

function grandchild_page_header($id=null, $page_title=null){
    // Title query
    if($id){
        $page_title = get_the_title($id);
    }elseif ($page_title != null){
        $page_title = $page_title;
    }else {
        $page_title = get_the_title(get_the_ID());
    }
    $feat_img = $image = get_the_post_thumbnail( $id, 'large', array( 'class' => 'grandchild-header-img' ) );
    ?>
    <section class="grandchild-header">
        <div class="container">
            <?php if($feat_img): echo $feat_img; endif;?>
            <div class="row">
                <div class="col col-12">
                    <?php mj_wp_breadcrumb(); ?>
                    <h1 class="head grandchild-head"><?php echo $page_title; ?></h1>
                </div>
            </div>
        </div>
    </section>
<?php } ?>