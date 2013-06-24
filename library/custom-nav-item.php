<?php

/*********************
NAV ITEMS WITH PREFXED CATEGORIES
*********************/

add_filter( 'wp_nav_menu_args', 'wpa_filter_menu_args' );

function wpa_filter_menu_args($args) {
    if ($args["menu"]->name == "Projekte"){
        $args['walker'] = new description_walker();
    }
    return $args;
}

class description_walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth, $args) {
        $categoryNames = array();
        $categories = get_the_category( $item->object_id );
        foreach ( $categories as $category ) {
            if ($category->name != "Uncategorized") {
                $categoryNames[] = $category->name;
            }
        }

        if (sizeof($categoryNames) > 0){
            $categoryNamesStr = sprintf('<span class="menu-item-categories">%s</span> ', esc_html(join(" ", $categoryNames)));

            $origArgsBefore = $args->link_before;
            if ($origArgsBefore){
                $args->link_before = $origArgsBefore . $categoryNamesStr;
            } else {
                $args->link_before = $categoryNamesStr;
            }

            parent::start_el($output, $item, $depth, $args);

            $args->link_before = $origArgsBefore;
        } else {
            parent::start_el($output, $item, $depth, $args);
        }
    }
}
