<?php

class top_menu_walker extends Walker_Nav_Menu {

    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        $element->classes = array();
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
        $element->classes = array();
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

class image_menu_walker extends Walker_Nav_Menu {

    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        $element->classes = array();
        $element->has_children = !empty( $children_elements[$element->ID] );
        $element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';
        $element->classes[] = ( $element->has_children ) ? 'has-dropdown' : '';

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
    
    function start_el(&$output, $item, $depth, $args) {
        global $wp_query;

        if ( $depth == 0 ) {
            $divider = '<li class="divider"></li>';
        } else {
            $divider = '';
        }

        if ( $item->description != '' ) {
            $has_description = ' has-description';
        } else {
            $has_description = '';
        }
         
        $class_names = $value = '';
 
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
 
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="' . esc_attr( $class_names ) . $has_description . '"';
 
        $output .= $divider . '<li' . $value . $class_names .'>';
 
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';

        if ( $depth == $args->thumbnail_depth && $args->thumbnail_link == false ) {
            $attributes .= ! empty( $item->url )        ? ' href="#"' : '';
        } else {
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        }
        
        // get user defined attributes for thumbnail images
        $attr_defaults = array( 'class' => 'th' , 'alt' => esc_attr( $item->attr_title ) , 'title' => esc_attr( $item->attr_title ) );
        $attr = isset( $args->thumbnail_attr ) ? $args->thumbnail_attr : '';
        $attr = wp_parse_args( $attr , $attr_defaults );
 
        $item_output = $args->before;

        // menu link output
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after . '</a>';
        
        // thumbnail image output
        if ( $depth == $args->thumbnail_depth ) {
            $item_output .= ( isset( $args->thumbnail_link ) && $args->thumbnail_link ) ? '<a' . $attributes . '>' : '';
            $item_output .= apply_filters( 'menu_item_thumbnail' , ( isset( $args->thumbnail ) && $args->thumbnail ) ? get_the_post_thumbnail( $item->object_id , ( isset( $args->thumbnail_size ) ) ? $args->thumbnail_size : 'thumbnail' , $attr ) : '' , $item , $args , $depth );       
            $item_output .= ( isset( $args->thumbnail_link ) && $args->thumbnail_link ) ? '</a>' : '';
        }

        // menu description output based on depth
        if ( $item->description == 'yes' ) {
            $post = get_post( $item->object_id );
            $excerpt = ( $post->post_excerpt ) ? $post->post_excerpt : wp_trim_words( $post->post_content, $args->desc_length );
            $item_output .= ( $args->desc_depth >= $depth ) ? '<p class="description">' . $excerpt . '</p>' : '';
        }

        $item_output .= $args->after;
 
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= "\n<ul class=\"sub-menu dropdown small-block-grid-". $args->submenu_col ."\">\n";
    }
} // end images menu walker

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
