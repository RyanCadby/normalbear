<?php
function search_bar(){
$placeholder = get_sub_field('search_bar');
?>
<!-- Dynamic Search Bar -->
<section class="search-section child">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-12">
                <input type="text" id="dynamic-search-child" class="dynamic-search" placeholder="<?php echo $placeholder; ?>">
                <i class="fas fa-search"></i>
            </div>
        </div>
    </div>
</section>

<?php } ?>