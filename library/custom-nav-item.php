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
			$beforeStr = '<span class="menu-item-title">';

            $origArgsBefore = $args->link_before;
            if ($origArgsBefore){
                $args->link_before = $origArgsBefore . $beforeStr;
            } else {
                $args->link_before =$beforeStr;
            }

            $afterStr = '</span>';
            $afterStr = sprintf('<span class="menu-item-categories">%s</span>', esc_html(join(" ", $categoryNames)));
            $origArgsAfter = $args->link_after;
            if ($origArgsAfter){
                $args->link_after = $afterStr . $origArgsAfter;
            } else {
                $args->link_after = $afterStr;
            }

            parent::start_el($output, $item, $depth, $args);

            $args->link_before = $origArgsBefore;
            $args->link_after = $origArgsAfter;
        } else {
            parent::start_el($output, $item, $depth, $args);
        }
    }
}
