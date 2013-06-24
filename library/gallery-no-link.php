<?php

/*********************
NAV ITEMS WITH PREFXED CATEGORIES
*********************/

add_shortcode( 'gallery', 'new_gallery_shortcode' );

/**
* The Gallery shortcode - modified for link="none".
*/
function new_gallery_shortcode($attr) {
    global $post, $wp_locale;

    $output = gallery_shortcode($attr);

    // remove link
    if($attr['link'] == "none") {
        $output = preg_replace(array('/<a[^>]*>/', '/<\/a>/'), '', $output);
    }

    return $output;
}