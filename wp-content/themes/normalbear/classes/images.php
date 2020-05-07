<?php
/** IMAGES.PHP
// ----- Version: 1.0
// ----- Released: 4.5.2020
// ----- Description: custom image sizes, functions, and lazy loading
**/

// Support featured images
add_theme_support( 'post-thumbnails' );

// Add custom image sizes cards
add_action( 'after_setup_theme', 'sbc_theme_setup' );
function sbc_theme_setup() {
    add_image_size( 'card-img', 550, 350, array('center', 'center'));
    add_image_size( 'featured-img', 850, 400, array('center', 'center'));
}



// custom get attachment function
function sbc_get_attachment($id, $img_size = 'card-img', $img_class = 'blog-card-img'){

    $result = "";
    $attachment = get_post($id);
    setup_postdata( $attachment );

    if( $attachment ) {

        $img_atts = array(
            'src' => get_the_post_thumbnail_url($id),
            'data-src'   => wp_get_attachment_image_url( $id, $img_size, false ),
            'data-status' => 'not-loaded',
            'class' => 'attachment-' . $img_size . ' size-' . $img_size . ' ' . $img_class,
            'alt'   => get_post_meta($id, '_wp_attachment_image_alt', true)
        );

        //If an 'alt' attribute was not specified, try to create one from attachment post data
        if( empty( $img_atts[ 'alt' ] ) )
            $img_atts[ 'alt' ] = trim(strip_tags( $attachment->post_excerpt ));
        if( empty( $img_atts[ 'alt' ] ) )
            $img_atts[ 'alt' ] = trim(strip_tags( $attachment->post_title ));

        $img_atts = apply_filters( 'wp_get_attachment_image_attributes', $img_atts, $attachment, $img_size );

        $result .= '<img ';
        foreach( $img_atts as $name => $value ) {
            $result .= $name . '="' . $value . '" ';
        }
        $result .= '/>';

        return $result;
    } else {
        return '<img src="' . get_stylesheet_directory_uri() . '/dist/images/placeholder-img.jpg" alt="no image" class="img card-img blog-card-img">';
    }
    wp_reset_postdata();
}



// get card img (featured img)
function sbc_get_featured_img($id, $img_size = 'card-img', $img_class = 'img card-img blog-card-img'){

    $data_src = get_the_post_thumbnail_url( $id, $img_size);
    $thumb_id = get_post_thumbnail_id($id);
    $attachment = get_post( $thumb_id );

    if ($data_src) {

        $result = "";

        $img_atts = array(
            'src' => get_the_post_thumbnail_url($id),
            'data-src' => get_the_post_thumbnail_url($id, $img_size),
            'data-status' => 'not-loaded',
            'class' => 'attachment-' . $img_size . ' size-' . $img_size . ' ' . $img_class,
            'alt' => get_post_meta($thumb_id, '_wp_attachment_image_alt', true)
        );
        //If an 'alt' attribute was not specified, try to create one from attachment post data
        if (empty($img_atts['alt']))
            $img_atts['alt'] = trim(strip_tags($attachment->post_excerpt));
        if (empty($img_atts['alt']))
            $img_atts['alt'] = trim(strip_tags($attachment->post_title));

        $img_atts = apply_filters('wp_get_attachment_image_attributes', $img_atts, $attachment, $img_size);

        $result .= '<img ';
        foreach ($img_atts as $name => $value) {
            $result .= $name . '="' . $value . '" ';
        }
        $result .= '/>';

        return $result;
    } else {
        return '<img src="' . get_stylesheet_directory_uri() . '/dist/images/placeholder.jpg" alt="no image" class="img card-img blog-card-img">';
    }

}