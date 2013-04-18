<?php

class top_menu_walker extends Walker_Nav_Menu {

    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        $element->has_children = !empty( $children_elements[$element->ID] );
        $element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';
        $element->classes[] = ( $element->has_children ) ? 'has-dropdown' : '';

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

    function start_el( &$output, $item, $depth, $args ) {

        if ( $depth == 0 ) {
            $divider = '<li class="divider"></li>';
        } else {
            $divider = '';
        }

        $item_html = $divider;
        parent::start_el( $item_html, $item, $depth, $args );

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $output .= $item_html;
    }

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= "\n<ul class=\"sub-menu dropdown\">\n";
    }

} // end top menu walker

class general_menu_walker extends Walker_Nav_Menu {

    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        $element->has_children = !empty( $children_elements[$element->ID] );
        $element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';
        $element->classes[] = ( $element->has_children ) ? 'has-dropdown' : '';

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

    function start_el( &$output, $item, $depth, $args ) {

        if ( $depth == 0 ) {
            $divider = '<li class="divider"></li>';
        } else {
            $divider = '';
        }

        $item_html = $divider;
        parent::start_el( $item_html, $item, $depth, $args );

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $output .= $item_html;
    }

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= "\n<ul class=\"sub-menu dropdown\">\n";
    }

} // end general menu walker

class fallback_menu extends Walker_Page {

    function start_el( &$output, $page, $depth, $args, $current_page ) {

        if ( $depth == 0 ) {
            $divider = '<li class="divider"></li>';
        } else {
            $divider = '';
        }

        $item_html = $divider;
        parent::start_el( $item_html, $page, $depth, $args, $current_page );

        $css_class = array( 'page_item', 'page-item-'.$page->ID );

        if ( $args['has_children'] ) {
            $css_class[] = 'has-dropdown';
        }

        if ( $page->ID == $current_page ) {
            $css_class[] = 'active';
        }

        $css_class = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );

        $item_html = $divider . '<li class="' . $css_class . '"><a href="' . get_permalink( $page->ID ) . '">' . apply_filters( 'the_title', $page->post_title, $page->ID ) . '</a>';

        $output .= $item_html;
    }

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= "\n<ul class=\"sub-menu dropdown\">\n";
    }

} // end fallback menu walker

?>
