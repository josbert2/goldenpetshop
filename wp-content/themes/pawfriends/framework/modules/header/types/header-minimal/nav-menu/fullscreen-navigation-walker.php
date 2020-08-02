<?php

if (!class_exists('PawFriendsMikadoClassFullscreenNavigationWalker')) {
	class PawFriendsMikadoClassFullscreenNavigationWalker extends Walker_Nav_Menu {

		// add classes to ul sub-menus
		function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ){
			$id_field = $this->db_fields['id'];
			if ( is_object( $args[0] ) ) {
				$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
			}
			return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
		}

		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);

			// build html
			$output .= "\n" . $indent  .'<ul class="sub_menu">' . "\n";
		}

		function end_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);

			$output .= "$indent</ul>" ."\n";
		}

		// add main/sub classes to li's and links
		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

			$sub = "";
			$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
			if($depth >=0 && $args->has_children) :
				$sub = ' has_sub';
			endif;

			// passed classes
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;

			$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

			$anchor = '';
			if($item->anchor != ""){
				$anchor = '#'.esc_attr($item->anchor);
			}

			$active = "";
			// depth dependent classes
			if ($item->anchor == "" && (($item->current && $depth == 0) ||  ($item->current_item_ancestor && $depth == 0))):
				$active = 'mkdf-active-item';
			endif;

			// build html
			$output .= $indent . '<li id="popup-menu-item-'. $item->ID . '" class="' . $class_names . ' ' . $active . $sub .'">';

			$current_a = "";
			// link attributes
			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ' href="'   . esc_attr( $item->url        ) .$anchor.'"';
			if (($item->current && $depth == 0) ||  ($item->current_item_ancestor && $depth == 0) ):
				$current_a .= ' current ';
			endif;

			$attributes .= ' class="'. $current_a . '"';
			$item_output = $args->before;
			if($item->hide == ""){
				if($item->nolink == ""){
					$item_output .= '<a'. $attributes .'>';
				}else{
					$item_output .= '<a href="#">';
				}

                $item_output .= '<span class="mkdf-active-hover">' .
                    '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-left">' .
                    '<path d="M2 0C0.9 0 0 0.9 0 2l2 23.8c0 1.1 0.9 2 2 2h3.9V0H2z"/>' .
                    '</svg>' .
                    '<span class="mkdf-active-hover-middle"></span>' .
                    '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="100%" preserveAspectRatio="none" viewBox="-0.5 -0.5 11 29" class="mkdf-active-hover-right">' .
                    '<path d="M5.9 0c1.1 0 2 0.9 2 2L5 25.8c-0.2 1.6-1.1 1.9-3 2H0V0H5.9"/>' .
                    '</svg>' .
                    '</span>';

				$item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
				$item_output .= $args->link_after;
				if($args->has_children) {
                    if($depth == 0) {
                        $item_output .= '<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 8 17" class="mkdf-menu-arrow">' .
                            '<path d="M9.1 8.7L7.8 6.6C7 5.7 5.7 4.5 5.2 3.2S3.9 1.1 3.9 1.1L3.5 0.7C2.6 1.5 4.4 5.7 6.1 7.4c2.2 2.1 1.3 3.8-1.7 5.9 -3 1.3-4 2.7-1.8 2.3 0.9 0 3.1-1.8 4.4-3.1l1.7-1.7C8.7 10.8 9.9 9.9 9.1 8.7z"/>' .
                            '</svg>';
                    } else {
                        $item_output .= '<svg xmlns="http://www.w3.org/2000/svg" width="11" height="15" viewBox="0 0 11 17" class="mkdf-menu-arrow">' .
                            '<path d="M9.1 8.7L7.8 6.6C7 5.7 5.7 4.5 5.2 3.2S3.9 1.1 3.9 1.1L3.5 0.7C2.6 1.5 4.4 5.7 6.1 7.4c2.2 2.1 1.3 3.8-1.7 5.9 -3 1.3-4 2.7-1.8 2.3 0.9 0 3.1-1.8 4.4-3.1l1.7-1.7C8.7 10.8 9.9 9.9 9.1 8.7z"/>' .
                            '</svg>';
                    }
				}
				$item_output .= '</a>';
			}
			$item_output .= $args->after;

			// build html
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
}