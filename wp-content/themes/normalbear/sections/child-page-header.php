
<?php
/** CHILD-PAGE-HEADER.PHP
// ----- Version: 1.0
// ----- Released: 4.5.2020
// ----- Description: SBC child page header
// ----- Instructions: call "child_page_header()" to print the child page header
 **/

function child_page_header($id=null, $page_title=null, $excerpt=null){
    // Title query
    if($id){
        $page_title = get_the_title($id);
    }elseif ($page_title != null){
        $page_title = $page_title;
    }else {
        $page_title = get_the_title(get_the_ID());
    }
    // get excerpt
    if($excerpt == null){
        $excerpt = get_the_excerpt();
    }
    $date = get_the_date('F j, Y');
    $author = get_the_author_meta('nickname');
    ?>
    <section class="child-header">
        <div class="container">
            <div class="row">
                <div class="col col-12">
                    <?php mj_wp_breadcrumb(); ?>
                    <h1 class="head child-head"><?php echo $page_title; ?></h1>
                    <div class="post-meta d-flex">
                        <p class="date pub-date"><?php echo $date; ?></p>
                        <p>&nbsp;|&nbsp; </p>
                        <p class="author post-author"><?php echo $author; ?></p>
                    </div>
                    <?php if($excerpt): ?>
<!--                        <div class="child-desc-cont">-->
<!--                            <p class="desc child-desc">-->
<!--                                --><?php //echo $excerpt; ?>
<!--                            </p>-->
<!--                        </div>-->
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>