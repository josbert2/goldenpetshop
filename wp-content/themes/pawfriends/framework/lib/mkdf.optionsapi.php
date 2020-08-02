<?php

if ( ! function_exists( 'pawfriends_mikado_set_options_map_position' ) ) {
	function pawfriends_mikado_set_options_map_position( $map ) {
		$position = 10;
		
		switch ( $map ) {
			case 'general':
				$position = 1;
				break;
			case 'logo':
				$position = 2;
				break;
			case 'fonts':
				$position = 3;
				break;
			case 'header':
				$position = 4;
				break;
			case 'mobile-header':
				$position = 5;
				break;
			case 'title':
				$position = 6;
				break;
			case 'page':
				$position = 7;
				break;
			case 'sidebar':
				$position = 8;
				break;
			case 'footer':
				$position = 9;
				break;
			case 'blog':
				$position = 10;
				break;
			case 'portfolio':
				$position = 11;
				break;
			case 'proofing-gallery':
				$position = 11;
				break;
			case 'stock-photography':
				$position = 11;
				break;
			case 'sidearea':
				$position = 12;
				break;
			case 'search':
				$position = 13;
				break;
			case 'skewed-section':
				$position = 13;
				break;
			case 'subscribe-popup':
				$position = 17;
				break;
			case 'social':
				$position = 18;
				break;
			case '404':
				$position = 19;
				break;
			case 'contact_form_7':
				$position = 20;
				break;
			case 'woocommerce':
				$position = 21;
				break;
			case 'reset':
				$position = 100;
				break;
		}
		
		return apply_filters( 'pawfriends_mikado_filter_options_map_position', $position, $map );
	}
}

if ( ! function_exists( 'pawfriends_mikado_add_admin_page' ) ) {
	/**
	 * Generates admin page object and adds it to options
	 * $attributes array can container:
	 *      $slug - slug of the page with which it will be registered in admin, and which will be appended to admin URL
	 *      $title - title of the page
	 *      $icon - icon that will be added to admin page in options navigation
	 *
	 * @param $attributes
	 *
	 * @return bool|PawFriendsMikadoClassAdminPage
	 */
	function pawfriends_mikado_add_admin_page( $attributes ) {
		$slug  = '';
		$title = '';
		$icon  = '';
		
		extract( $attributes );
		
		if ( isset( $slug ) && ! empty( $title ) ) {
			$admin_page = new PawFriendsMikadoClassAdminPage( $slug, $title, $icon );
			pawfriends_mikado_framework()->mkdOptions->addAdminPage( $slug, $admin_page );
			
			return $admin_page;
		}
		
		return false;
	}
}

if ( ! function_exists( 'pawfriends_mikado_add_admin_panel' ) ) {
	/**
	 * Generates panel object from given parameters
	 * $attributes can container:
	 *      $title - title of panel
	 *      $name - name of panel with which it will be registered in admin page
	 *      $page - slug of that page to which to add panel
	 *
	 * @param $attributes
	 *
	 * @return bool|PawFriendsMikadoClassPanel
	 */
	function pawfriends_mikado_add_admin_panel( $attributes ) {
		$title           = '';
		$name            = '';
		$dependency      = array();
		$args            = array();
		$page            = '';
		
		extract( $attributes );
		
		if ( isset( $page ) && ! empty( $title ) && ! empty( $name ) && pawfriends_mikado_framework()->mkdOptions->adminPageExists( $page ) ) {
			$admin_page = pawfriends_mikado_framework()->mkdOptions->getAdminPage( $page );
			
			if ( is_object( $admin_page ) ) {
				$panel = new PawFriendsMikadoClassPanel( $title, $name, $args, $dependency);
				$admin_page->addChild( $name, $panel );
				
				return $panel;
			}
		}
		
		return false;
	}
}

if ( ! function_exists( 'pawfriends_mikado_add_admin_container' ) ) {
	/**
	 * Generates container object
	 * $attributes can contain:
	 *      $name - name of the container with which it will be added to parent element
	 *      $parent - parent object to which to add container
	 *
	 * @param $attributes
	 *
	 * @return bool|PawFriendsMikadoClassContainer
	 */
	function pawfriends_mikado_add_admin_container( $attributes ) {
		$name            = '';
		$parent          = '';
		$dependency      = array();
		
		extract( $attributes );
		
		if ( ! empty( $name ) && is_object( $parent ) ) {
			$container = new PawFriendsMikadoClassContainer( $name, $dependency );
			$parent->addChild( $name, $container );
			
			return $container;
		}
		
		return false;
	}
}

if ( ! function_exists( 'pawfriends_mikado_add_admin_twitter_button' ) ) {
	
	/**
	 * Generates twitter button field
	 *
	 * @param $attributes
	 *
	 * @return bool|PawFriendsMikadoClassTwitterFramework
	 */
	function pawfriends_mikado_add_admin_twitter_button( $attributes ) {
		$name   = '';
		$parent = '';
		
		extract( $attributes );
		
		if ( ! empty( $parent ) && ! empty( $name ) ) {
			$field = new PawFriendsMikadoClassTwitterFramework();
			
			if ( is_object( $parent ) ) {
				$parent->addChild( $name, $field );
			}
			
			return $field;
		}
		
		return false;
	}
}

if ( ! function_exists( 'pawfriends_mikado_add_admin_instagram_button' ) ) {
	
	/**
	 * Generates instagram button field
	 *
	 * @param $attributes
	 *
	 * @return bool|PawFriendsMikadoClassInstagramFramework
	 */
	function pawfriends_mikado_add_admin_instagram_button( $attributes ) {
		$name   = '';
		$parent = '';
		
		extract( $attributes );
		
		if ( ! empty( $parent ) && ! empty( $name ) ) {
			$field = new PawFriendsMikadoClassInstagramFramework();
			
			if ( is_object( $parent ) ) {
				$parent->addChild( $name, $field );
			}
			
			return $field;
		}
		
		return false;
	}
}

if ( ! function_exists( 'pawfriends_mikado_add_admin_container_no_style' ) ) {
	/**
	 * Generates container object
	 * $attributes can contain:
	 *      $name - name of the container with which it will be added to parent element
	 *      $parent - parent object to which to add container
	 *
	 * @param $attributes
	 *
	 * @return bool|PawFriendsMikadoClassContainerNoStyle
	 */
	function pawfriends_mikado_add_admin_container_no_style( $attributes ) {
		$name            = '';
		$parent          = '';
		$args            = array();
		$dependency      = array();

		extract( $attributes );
		
		if ( ! empty( $name ) && is_object( $parent ) ) {
			$container = new PawFriendsMikadoClassContainerNoStyle( $name, $args, $dependency );
			$parent->addChild( $name, $container );
			
			return $container;
		}
		
		return false;
	}
}

if ( ! function_exists( 'pawfriends_mikado_add_admin_group' ) ) {
	/**
	 * Generates group object
	 * $attributes can contain:
	 *      $name - name of the group with which it will be added to parent element
	 *      $title - title of group
	 *      $description - description of group
	 *      $parent - parent object to which to add group
	 *
	 * @param $attributes
	 *
	 * @return bool|PawFriendsMikadoClassGroup
	 */
	function pawfriends_mikado_add_admin_group( $attributes ) {
		$name        = '';
		$title       = '';
		$description = '';
		$parent      = '';
		
		extract( $attributes );
		
		if ( ! empty( $name ) && ! empty( $title ) && is_object( $parent ) ) {
			$group = new PawFriendsMikadoClassGroup( $title, $description );
			$parent->addChild( $name, $group );
			
			return $group;
		}
		
		return false;
	}
}

if ( ! function_exists( 'pawfriends_mikado_add_admin_row' ) ) {
	/**
	 * Generates row object
	 * $attributes can contain:
	 *      $name - name of the group with which it will be added to parent element
	 *      $parent - parent object to which to add row
	 *      $next - whether row has next row. Used to add bottom margin class
	 *
	 * @param $attributes
	 *
	 * @return bool|PawFriendsMikadoClassRow
	 */
	function pawfriends_mikado_add_admin_row( $attributes ) {
		$parent = '';
		$next   = false;
		$name   = '';
		
		extract( $attributes );
		
		if ( is_object( $parent ) ) {
			$row = new PawFriendsMikadoClassRow( $next );
			$parent->addChild( $name, $row );
			
			return $row;
		}
		
		return false;
	}
}

if ( ! function_exists( 'pawfriends_mikado_add_admin_field' ) ) {
	/**
	 * Generates admin field object
	 * $attributes can container:
	 *      $type - type of the field to generate
	 *      $name - name of the field. This will be name of the option in database
	 *      $default_value
	 *      $label - title of the option
	 *      $description
	 *      $options - assoc array of option. Used only for select and radiogroup field types
	 *      $args - assoc array of additional parameters. Used for dependency
	 *      $parent - parent object to which to add field
	 *
	 * @param $attributes
	 *
	 * @return bool|PawFriendsMikadoClassField
	 */
	function pawfriends_mikado_add_admin_field( $attributes ) {
		$type            = '';
		$name            = '';
		$default_value   = '';
		$label           = '';
		$description     = '';
		$options         = array();
		$args            = array();
		$parent          = '';
		$dependency		 = array();
		
		extract( $attributes );

		if ( ! empty( $parent ) && ! empty( $type ) && ! empty( $name ) ) {
			$field = new PawFriendsMikadoClassField( $type, $name, $default_value, $label, $description, $options, $args, $dependency );
			
			if ( is_object( $parent ) ) {
				$parent->addChild( $name, $field );
				
				return $field;
			}
		}
		
		return false;
	}
}

if ( ! function_exists( 'pawfriends_mikado_add_admin_section_title' ) ) {
	/**
	 * Generates admin title field
	 * $attributes can contain:
	 *      $parent - parent object to which to add title
	 *      $name - name of title with which to add it to the parent
	 *      $title - title text
	 *
	 * @param $attributes
	 *
	 * @return bool|PawFriendsMikadoClassTitle
	 */
	function pawfriends_mikado_add_admin_section_title( $attributes ) {
		$parent = '';
		$name   = '';
		$title  = '';
		
		extract( $attributes );
		
		if ( is_object( $parent ) && ! empty( $title ) && ! empty( $name ) ) {
			$section_title = new PawFriendsMikadoClassTitle( $name, $title );
			$parent->addChild( $name, $section_title );
			
			return $section_title;
		}
		
		return false;
	}
}

if ( ! function_exists( 'pawfriends_mikado_add_admin_notice' ) ) {
	/**
	 * Generates PawFriendsMikadoClassNotice object from given parameters
	 * $attributes array can contain:
	 *      $title - title of notice object
	 *      $description - description of notice object
	 *      $notice - text of notice to display
	 *      $name - unique name of notice with which it will be added to it's parent
	 *      $parent - object to which to add notice object using addChild method
	 *
	 * @param $attributes
	 *
	 * @return bool|PawFriendsMikadoClassNotice
	 */
	function pawfriends_mikado_add_admin_notice( $attributes ) {
		$title           = '';
		$description     = '';
		$notice          = '';
		$parent          = '';
		$name            = '';
		
		extract( $attributes );
		
		if ( is_object( $parent ) && ! empty( $title ) && ! empty( $notice ) && ! empty( $name ) ) {
			$notice_object = new PawFriendsMikadoClassNotice( $title, $description, $notice);
			$parent->addChild( $name, $notice_object );
			
			return $notice_object;
		}
		
		return false;
	}
}

if ( ! function_exists( 'pawfriends_mikado_framework' ) ) {
	/**
	 * Function that returns instance of PawFriendsMikadoClassFramework class
	 *
	 * @return PawFriendsMikadoClassFramework
	 */
	function pawfriends_mikado_framework() {
		return PawFriendsMikadoClassFramework::get_instance();
	}
}

if ( ! function_exists( 'pawfriends_mikado_options' ) ) {
	/**
	 * Returns instance of PawFriendsMikadoClassOptions class
	 *
	 * @return PawFriendsMikadoClassOptions
	 */
	function pawfriends_mikado_options() {
		return pawfriends_mikado_framework()->mkdOptions;
	}
}

if ( ! function_exists( 'pawfriends_mikado_meta_boxes' ) ) {
	/**
	 * Returns instance of PawFriendsMikadoClassMetaBoxes class
	 *
	 * @return PawFriendsMikadoClassMetaBoxes
	 */
	function pawfriends_mikado_meta_boxes() {
		return pawfriends_mikado_framework()->mkdMetaBoxes;
	}
}

/**
 * Meta boxes functions
 */
if ( ! function_exists( 'pawfriends_mikado_create_meta_box' ) ) {
	/**
	 * Adds new meta box
	 *
	 * @param $attributes
	 *
	 * @return bool|PawFriendsMikadoClassMetaBox
	 */
	function pawfriends_mikado_create_meta_box( $attributes ) {
		$scope           = array();
		$title           = '';
		$name            = '';
		
		extract( $attributes );
		
		if ( ! empty( $scope ) && $title !== '' && $name !== '' ) {
			$meta_box_obj = new PawFriendsMikadoClassMetaBox( $scope, $title, $name );
			pawfriends_mikado_framework()->mkdMetaBoxes->addMetaBox( $name, $meta_box_obj );
			
			return $meta_box_obj;
		}
		
		return false;
	}
}

if ( ! function_exists( 'pawfriends_mikado_create_meta_box_field' ) ) {
	/**
	 * Generates meta box field object
	 * $attributes can contain:
	 *      $type - type of the field to generate
	 *      $name - name of the field. This will be name of the option in database
	 *      $default_value
	 *      $label - title of the option
	 *      $description
	 *      $options - assoc array of option. Used only for select and radiogroup field types
	 *      $args - assoc array of additional parameters. Used for dependency
	 *      $parent - parent object to which to add field
	 *
	 * @param $attributes
	 *
	 * @return bool|PawFriendsMikadoClassField
	 */
	function pawfriends_mikado_create_meta_box_field( $attributes ) {
		$type            = '';
		$name            = '';
		$default_value   = '';
		$label           = '';
		$description     = '';
		$options         = array();
		$args            = array();
		$dependency		 = array();
		$parent          = '';
		
		extract( $attributes );
		
		if ( ! empty( $parent ) && ! empty( $type ) && ! empty( $name ) ) {
			$field = new PawFriendsMikadoClassMetaField( $type, $name, $default_value, $label, $description, $options, $args, $dependency );
			
			if ( is_object( $parent ) ) {
				$parent->addChild( $name, $field );
				
				return $field;
			}
		}
		
		return false;
	}
}

if ( ! function_exists( 'pawfriends_mikado_add_multiple_images_field' ) ) {
	/**
	 * Generates meta box field object
	 * $attributes can contain:
	 *      $name - name of the field. This will be name of the option in database
	 *      $label - title of the option
	 *      $description
	 *      $parent - parent object to which to add field
	 *
	 * @param $attributes
	 *
	 * @return bool|PawFriendsMikadoClassField
	 */
	function pawfriends_mikado_add_multiple_images_field( $attributes ) {
		$name        = '';
		$label       = '';
		$description = '';
		$parent      = '';
		
		extract( $attributes );
		
		if ( ! empty( $parent ) && ! empty( $name ) ) {
			$field = new PawFriendsMikadoClassMultipleImages( $name, $label, $description );
			
			if ( is_object( $parent ) ) {
				$parent->addChild( $name, $field );
				
				return $field;
			}
		}
		
		return false;
	}
}

if ( ! function_exists( 'pawfriends_mikado_get_yes_no_select_array' ) ) {
	/**
	 * Returns array of yes no
	 * @return array
	 */
	function pawfriends_mikado_get_yes_no_select_array( $enable_default = true, $set_yes_to_be_first = false ) {
		$select_options = array();
		
		if ( $enable_default ) {
			$select_options[''] = esc_html__( 'Default', 'pawfriends' );
		}
		
		if ( $set_yes_to_be_first ) {
			$select_options['yes'] = esc_html__( 'Yes', 'pawfriends' );
			$select_options['no']  = esc_html__( 'No', 'pawfriends' );
		} else {
			$select_options['no']  = esc_html__( 'No', 'pawfriends' );
			$select_options['yes'] = esc_html__( 'Yes', 'pawfriends' );
		}
		
		return $select_options;
	}
}

if ( ! function_exists( 'pawfriends_mikado_get_query_order_by_array' ) ) {
	/**
	 * Returns array of query order by
	 *
	 * @param bool $first_empty whether to add empty first member
	 * @param array $additional_elements
	 *
	 * @return array
	 */
	function pawfriends_mikado_get_query_order_by_array( $first_empty = false, $additional_elements = array() ) {
		$orderBy = array();
		
		if ( $first_empty ) {
			$orderBy[''] = esc_html__( 'Default', 'pawfriends' );
		}
		
		$orderBy['date']       = esc_html__( 'Date', 'pawfriends' );
		$orderBy['ID']         = esc_html__( 'ID', 'pawfriends' );
		$orderBy['menu_order'] = esc_html__( 'Menu Order', 'pawfriends' );
		$orderBy['name']       = esc_html__( 'Post Name', 'pawfriends' );
		$orderBy['rand']       = esc_html__( 'Random', 'pawfriends' );
		$orderBy['title']      = esc_html__( 'Title', 'pawfriends' );
		
		if ( ! empty( $additional_elements ) ) {
			$orderBy = array_merge( $orderBy, $additional_elements );
		}
		
		return $orderBy;
	}
}

if ( ! function_exists( 'pawfriends_mikado_get_query_order_array' ) ) {
	/**
	 * Returns array of query order
	 *
	 * @param bool $first_empty whether to add empty first member
	 *
	 * @return array
	 */
	function pawfriends_mikado_get_query_order_array( $first_empty = false ) {
		$order = array();
		
		if ( $first_empty ) {
			$order[''] = esc_html__( 'Default', 'pawfriends' );
		}
		
		$order['ASC']  = esc_html__( 'ASC', 'pawfriends' );
		$order['DESC'] = esc_html__( 'DESC', 'pawfriends' );
		
		return $order;
	}
}

if ( ! function_exists( 'pawfriends_mikado_get_number_of_columns_array' ) ) {
	/**
	 * Returns array of columns number
	 *
	 * @param bool $first_empty whether to add empty first member
	 * @param array $removed_items
	 *
	 * @return array
	 */
	function pawfriends_mikado_get_number_of_columns_array( $first_empty = false, $removed_items = array() ) {
		$options = array();
		
		if ( $first_empty ) {
			$options[''] = esc_html__( 'Default', 'pawfriends' );
		}
		
		$options['one']   = esc_html__( 'One', 'pawfriends' );
		$options['two']   = esc_html__( 'Two', 'pawfriends' );
		$options['three'] = esc_html__( 'Three', 'pawfriends' );
		$options['four']  = esc_html__( 'Four', 'pawfriends' );
		$options['five']  = esc_html__( 'Five', 'pawfriends' );
		$options['six']   = esc_html__( 'Six', 'pawfriends' );
		
		if ( ! empty( $removed_items ) ) {
			foreach ( $removed_items as $removed_item ) {
				unset( $options[ $removed_item ] );
			}
		}
		
		return $options;
	}
}

if ( ! function_exists( 'pawfriends_mikado_get_space_between_items_array' ) ) {
	/**
	 * Returns array of space between items
	 *
	 * @param bool  $first_empty whether to add empty first member
	 * @param array $disable_by_keys
	 *
	 * @return array
	 */
	function pawfriends_mikado_get_space_between_items_array( $first_empty = false, $disable_by_keys = array() ) {
		$options = array();
		
		if ( $first_empty ) {
			$options[''] = esc_html__( 'Default', 'pawfriends' );
		}
		
		$options['huge']   = esc_html__( 'Huge (40)', 'pawfriends' );
		$options['large']  = esc_html__( 'Large (25)', 'pawfriends' );
		$options['medium'] = esc_html__( 'Medium (20)', 'pawfriends' );
		$options['normal'] = esc_html__( 'Normal (15)', 'pawfriends' );
		$options['small']  = esc_html__( 'Small (10)', 'pawfriends' );
		$options['tiny']   = esc_html__( 'Tiny (5)', 'pawfriends' );
		$options['no']     = esc_html__( 'No (0)', 'pawfriends' );
		
		if ( ! empty( $disable_by_keys ) ) {
			foreach ( $disable_by_keys as $key ) {
				if ( array_key_exists( $key, $options ) ) {
					unset( $options[ $key ] );
				}
			}
		}
		
		return $options;
	}
}

if ( ! function_exists( 'pawfriends_mikado_get_link_target_array' ) ) {
	/**
	 * Returns array of link target
	 *
	 * @param bool $first_empty whether to add empty first member
	 *
	 * @return array
	 */
	function pawfriends_mikado_get_link_target_array( $first_empty = false ) {
		$order = array();
		
		if ( $first_empty ) {
			$order[''] = esc_html__( 'Default', 'pawfriends' );
		}
		
		$order['_self']  = esc_html__( 'Same Window', 'pawfriends' );
		$order['_blank'] = esc_html__( 'New Window', 'pawfriends' );
		
		return $order;
	}
}

if ( ! function_exists( 'pawfriends_mikado_get_title_tag' ) ) {
	/**
	 * Returns array of title tags
	 *
	 * @param bool $first_empty
	 * @param array $additional_elements
	 *
	 * @return array
	 */
	function pawfriends_mikado_get_title_tag( $first_empty = false, $additional_elements = array() ) {
		$title_tag = array();
		
		if ( $first_empty ) {
			$title_tag[''] = esc_html__( 'Default', 'pawfriends' );
		}
		
		$title_tag['h1'] = 'h1';
		$title_tag['h2'] = 'h2';
		$title_tag['h3'] = 'h3';
		$title_tag['h4'] = 'h4';
		$title_tag['h5'] = 'h5';
		$title_tag['h6'] = 'h6';
		
		if ( ! empty( $additional_elements ) ) {
			$title_tag = array_merge( $title_tag, $additional_elements );
		}
		
		return $title_tag;
	}
}

if ( ! function_exists( 'pawfriends_mikado_get_font_weight_array' ) ) {
	/**
	 * Returns array of font weights
	 *
	 * @param bool $first_empty whether to add empty first member
	 *
	 * @return array
	 */
	function pawfriends_mikado_get_font_weight_array( $first_empty = false ) {
		$font_weights = array();
		
		if ( $first_empty ) {
			$font_weights[''] = esc_html__( 'Default', 'pawfriends' );
		}
		
		$font_weights['100'] = esc_html__( '100 Thin', 'pawfriends' );
		$font_weights['200'] = esc_html__( '200 Thin-Light', 'pawfriends' );
		$font_weights['300'] = esc_html__( '300 Light', 'pawfriends' );
		$font_weights['400'] = esc_html__( '400 Normal', 'pawfriends' );
		$font_weights['500'] = esc_html__( '500 Medium', 'pawfriends' );
		$font_weights['600'] = esc_html__( '600 Semi-Bold', 'pawfriends' );
		$font_weights['700'] = esc_html__( '700 Bold', 'pawfriends' );
		$font_weights['800'] = esc_html__( '800 Extra-Bold', 'pawfriends' );
		$font_weights['900'] = esc_html__( '900 Ultra-Bold', 'pawfriends' );
		
		return $font_weights;
	}
}

if ( ! function_exists( 'pawfriends_mikado_get_font_style_array' ) ) {
	/**
	 * Returns array of font styles
	 *
	 * @param bool $first_empty
	 *
	 * @return array
	 */
	function pawfriends_mikado_get_font_style_array( $first_empty = false ) {
		$font_styles = array();
		
		if ( $first_empty ) {
			$font_styles[''] = esc_html__( 'Default', 'pawfriends' );
		}
		
		$font_styles['normal']  = esc_html__( 'Normal', 'pawfriends' );
		$font_styles['italic']  = esc_html__( 'Italic', 'pawfriends' );
		$font_styles['oblique'] = esc_html__( 'Oblique', 'pawfriends' );
		$font_styles['initial'] = esc_html__( 'Initial', 'pawfriends' );
		$font_styles['inherit'] = esc_html__( 'Inherit', 'pawfriends' );
		
		return $font_styles;
	}
}

if ( ! function_exists( 'pawfriends_mikado_get_text_transform_array' ) ) {
	/**
	 * Returns array of text transforms
	 *
	 * @param bool $first_empty
	 *
	 * @return array
	 */
	function pawfriends_mikado_get_text_transform_array( $first_empty = false ) {
		$text_transforms = array();
		
		if ( $first_empty ) {
			$text_transforms[''] = esc_html__( 'Default', 'pawfriends' );
		}
		
		$text_transforms['none']       = esc_html__( 'None', 'pawfriends' );
		$text_transforms['capitalize'] = esc_html__( 'Capitalize', 'pawfriends' );
		$text_transforms['uppercase']  = esc_html__( 'Uppercase', 'pawfriends' );
		$text_transforms['lowercase']  = esc_html__( 'Lowercase', 'pawfriends' );
		$text_transforms['initial']    = esc_html__( 'Initial', 'pawfriends' );
		$text_transforms['inherit']    = esc_html__( 'Inherit', 'pawfriends' );
		
		return $text_transforms;
	}
}

if ( ! function_exists( 'pawfriends_mikado_get_text_decorations' ) ) {
	/**
	 * Returns array of text transforms
	 *
	 * @param bool $first_empty
	 *
	 * @return array
	 */
	function pawfriends_mikado_get_text_decorations( $first_empty = false ) {
		$text_decorations = array();
		
		if ( $first_empty ) {
			$text_decorations[''] = esc_html__( 'Default', 'pawfriends' );
		}
		
		$text_decorations['none']         = esc_html__( 'None', 'pawfriends' );
		$text_decorations['underline']    = esc_html__( 'Underline', 'pawfriends' );
		$text_decorations['overline']     = esc_html__( 'Overline', 'pawfriends' );
		$text_decorations['line-through'] = esc_html__( 'Line-Through', 'pawfriends' );
		$text_decorations['initial']      = esc_html__( 'Initial', 'pawfriends' );
		$text_decorations['inherit']      = esc_html__( 'Inherit', 'pawfriends' );
		
		return $text_decorations;
	}
}

if ( ! function_exists( 'pawfriends_mikado_is_font_option_valid' ) ) {
	/**
	 * Checks if font family option is valid (different that -1)
	 *
	 * @param $option_name
	 *
	 * @return bool
	 */
	function pawfriends_mikado_is_font_option_valid( $option_name ) {
		return $option_name !== '-1' && $option_name !== '';
	}
}

if ( ! function_exists( 'pawfriends_mikado_get_font_option_val' ) ) {
	/**
	 * Returns font option value without + so it can be used in css
	 *
	 * @param $option_val
	 *
	 * @return mixed
	 */
	function pawfriends_mikado_get_font_option_val( $option_val ) {
		$option_val = str_replace( '+', ' ', $option_val );
		
		return $option_val;
	}
}

if ( ! function_exists( 'pawfriends_mikado_get_icon_sources_array' ) ) {
	/**
	 * Returns array of icon sources
	 *
	 * @param bool $first_empty
	 * @param bool $enable_predefined
	 *
	 * @return array
	 */
	function pawfriends_mikado_get_icon_sources_array( $first_empty = false, $enable_predefined = true ) {
		$icon_sources = array();
		
		if ( $first_empty ) {
			$icon_sources[''] = esc_html__( 'Default', 'pawfriends' );
		}
		
		$icon_sources['icon_pack']	= esc_html__( 'Icon Pack', 'pawfriends' );
		$icon_sources['svg_path']	= esc_html__( 'SVG Path', 'pawfriends' );
		
		if ( $enable_predefined ) {
			$icon_sources['predefined']	= esc_html__( 'Predefined', 'pawfriends' );
		}
		
		return $icon_sources;
	}
}

if ( ! function_exists( 'pawfriends_mikado_get_icon_sources_class' ) ) {
	/**
	 * Returns class for icon sources
	 *
	 * @param string $option_name
	 * @param string $class_prefix
	 *
	 * @return string
	 */
	function pawfriends_mikado_get_icon_sources_class( $option_name = '', $class_prefix = '' ) {
		$class = '';
		
		if ( ! empty( $option_name ) && ! empty( $class_prefix ) ) {
			$icon_source 	= pawfriends_mikado_options()->getOptionValue( $option_name . '_icon_source' );
			
			if ( $icon_source === 'icon_pack' ) {
				$class = $class_prefix . '-icon-pack';
			} else if ( $icon_source === 'svg_path' ) {
				$class = $class_prefix . '-svg-path';
			} else if ( $icon_source === 'predefined' ) {
				$class = $class_prefix . '-predefined';
			}
		}
		
		return $class;
	}
}

if ( ! function_exists( 'pawfriends_mikado_get_icon_sources_html' ) ) {
	/**
	 * Returns html for icon sources
	 *
	 * @param string $option_name
	 * @param bool $is_close_icon
	 * @param array $args
	 *
	 * @return string/html
	 */
	function pawfriends_mikado_get_icon_sources_html( $option_name = '', $is_close_icon = false, $args = array(), $is_search_icon = false ) {
		$html = '';
		
		if ( ! empty( $option_name ) ) {
			$icon_source         = pawfriends_mikado_options()->getOptionValue( $option_name . '_icon_source' );
			$icon_pack           = pawfriends_mikado_options()->getOptionValue( $option_name . '_icon_pack' );
			$icon_svg_path       = pawfriends_mikado_options()->getOptionValue( $option_name . '_icon_svg_path' );
			$close_icon_svg_path = pawfriends_mikado_options()->getOptionValue( $option_name . '_close_icon_svg_path' );
			$is_search_icon      = isset( $args['search'] ) && $args['search'] === 'yes';
			$is_dropdown_cart    = isset( $args['dropdown_cart'] ) && $args['dropdown_cart'] === 'yes';
			
			if ( $icon_source === 'icon_pack' && isset( $icon_pack ) ) {
				
				if ( $is_search_icon ) {
					
					if ( $is_close_icon ) {
						$html .= pawfriends_mikado_icon_collections()->getSearchClose( $icon_pack, true );
					} else {
						$html .= pawfriends_mikado_icon_collections()->getSearchIcon( $icon_pack, true );
					}
					
				} else if ( $is_dropdown_cart ) {
					$html .= pawfriends_mikado_icon_collections()->getDropdownCartIcon( $icon_pack, true );
				} else if ( $is_close_icon ) {
					$html .= pawfriends_mikado_icon_collections()->getMenuCloseIcon( $icon_pack, true );
				} else {
					$html .= pawfriends_mikado_icon_collections()->getMenuIcon( $icon_pack, true );
				}
				
			} else if ( ( isset( $icon_svg_path ) && ! empty( $icon_svg_path ) ) || ( isset( $close_icon_svg_path ) && ! empty( $close_icon_svg_path ) ) ) {
				
				if ( $is_close_icon ) {
					$html .= $close_icon_svg_path;
				} else {
					$html .= $icon_svg_path;
				}
				
			} else if ( $icon_source === 'predefined' ) {
				
				if ( $is_close_icon ) {
					$html .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31 34" class="mkdf-fullscreen-close">' .
                             '<path d="M28.6 4.1c1-0.5 1-0.5-0.5-2 -1-1.5-1-1.5-1.5-0.5 -0.5 0.5-1 1.5-1.5 1.5 -0.5 0.5-0.5 1-0.5 1.5 0 0-1.5 1.5-3.1 3 -1.5 1.5-3.6 3-4.6 4 -1 1-2.1 2-2.1 2 -0.5 0-2.6-2.5-4.6-4.9C8.1 6.1 5.5 3.6 5 3.6 4 2.6 3 3.1 3.5 4.1c0.5 0.5 0 1 0 0.5 -0.5 0-1 0-1.5 0.5 -1 1-1 1 0 1.5 1.5 1 6.7 5.4 8.7 7.9l1.5 1.5 -2.1 2.5c-1 1-2.6 3-3.6 4.4 -2.6 2.5-6.7 8.4-6.2 8.9 0 0 0.5 0.5 1.5 0.5 1.5 1 1.5 1 2.1-0.5 0.5-1 3.1-4 5.6-6.4l5.1-4.9 2.6 2.5c1.5 1.5 3.6 4 5.1 5.4l3.1 2.5 0.5-1c1-1.5 1-2 0-3 -0.5-0.5-1.5-2-2.6-3 -2.1-3-5.1-6.9-5.6-6.9 0-0.5 1.5-3 5.6-7.9C24.5 7.6 27.1 5.1 28.6 4.1zM19.9 20.9c1 1.5 2.1 3 2.6 3.5 0.5 0.5 0.5 1.5 0.5 2v0.5c0-0.5-1.5-2-3.1-3.5 -3.6-3.5-3.6-3.5-3.1-4.4C17.4 18.4 17.9 18.9 19.9 20.9zM17.9 14.5c-1 1-1.5 2-1.5 2.5s-3.1 3.5-6.7 6.9c-3.6 3.5-6.2 6.4-6.2 6.9 0 0-0.5 0.5-1 0.5 -1 0-1-0.5 1.5-3.5 2.1-3.5 6.2-8.4 8.2-9.9l2.1-1.5 -1.5-2L7.1 9C5 7.1 4 5.1 4 5.1c0.5 0 2.1 1 3.6 3 1.5 2 4.1 4.4 5.1 5.4l2.1 2.5 3.6-4.4c2.1-2 4.1-3.5 4.1-3.5C23 8.1 19.9 12 17.9 14.5z"/>' .
                             '</svg>';
				} elseif ( $is_search_icon ) {
                    $html .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 30" class="mkdf-search">' .
                             '<path d="M19.8 28.9c-0.3-0.1-0.6-0.3-0.8-0.5 -0.2-0.3-0.2-0.6-0.2-0.9 0.1-0.4 0.6-0.6 1.2-1 0.5-0.3 1.2-0.6 1.2-0.8 -0.1-0.6-4-6.3-5.2-8.1 -0.5-0.8-0.8-1.1-0.8-1.2 -0.1-0.1-0.5-0.1-1-0.1 -0.4 0.6-0.7 1.1-0.6 1.2 0.3 0.4 1.8 2.6 3.2 4.8 1 1.6 2.2 3.3 2.3 3.5 0.1 0.1 0.1 0.2 0.1 0.3 0 0.1-0.2 0.2-0.3 0.1 -0.1 0-0.1-0.1-2.5-3.7 -1.3-2.1-2.9-4.4-3.2-4.7 -0.3-0.3-0.1-0.8 0.4-1.5 -0.3 0-0.5 0.1-0.8 0.1C9.9 16.7 5 17.3 2.7 14c-1.7-2.4-2-5.2-0.8-7.8 1.3-2.9 4.3-5 7.4-5.2 3-0.2 5.7 1.2 7.6 4.1 2.5 3.7-0.4 7.9-2.2 10.4 -0.1 0.1-0.2 0.2-0.2 0.3 0.6 0 0.9 0.1 1.1 0.3 0.1 0.1 0.4 0.6 0.8 1.2 3.9 5.7 5.4 8 5.3 8.4 0 0.5-0.7 0.8-1.4 1.2 -0.4 0.2-1 0.5-1 0.7 0 0.2 0 0.4 0.1 0.5 0.1 0.2 0.3 0.3 0.5 0.4 0 0 0 0 0 0 0.5 0 3.1-1.7 3.2-2.3 0-0.3-0.1-0.6-0.2-0.7 -0.2-0.2-0.4-0.3-0.4-0.3 -0.1 0-0.2-0.1-0.2-0.2 0-0.1 0.1-0.2 0.2-0.2 0.2 0 0.5 0.2 0.7 0.4 0.2 0.2 0.4 0.6 0.3 1 0 0.1-0.1 0.5-1.2 1.4C21.7 28.1 20.4 28.9 19.8 28.9 19.8 28.9 19.8 28.9 19.8 28.9zM14.3 15.2c1.8-2.6 4.5-6.4 2.2-9.9 -1.8-2.7-4.4-4.1-7.2-3.9 -2.9 0.2-5.7 2.2-7 4.9C1.2 8.8 1.4 11.4 3 13.7c2.2 3.1 6.7 2.6 9.7 2.2 0.4 0 0.8-0.1 1.1-0.1C14 15.6 14.2 15.4 14.3 15.2z"/>' .
                             '</svg>';
                } elseif ( $is_dropdown_cart ) {
                    $html .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 31" class="mkdf-dropdown-cart">' .
                             '<path d="M15.7 30.2c-3.5 0-7-0.3-7.9-0.9 -1.8-1.2-7-12.9-7-14.5 0-0.7 1.5-1.9 4.3-4 1.9-3 4.9-6.8 6.4-7.1 0.5-0.1 0.7 0.1 0.9 0.2 0.2 0.2 0.2 0.4 0.2 0.6 -0.1 1.4-3.4 3.8-6.6 6.2 -0.2 0.1-0.3 0.3-0.5 0.4 -1 1.6-1.7 3-1.6 3.3 0.8 0.4 13.2 0.2 20.9-0.1 0.1 0 0.2 0.1 0.3 0.2 0 0.1-0.1 0.2-0.2 0.2 -3.4 0.1-20.4 0.7-21.3-0.1 -0.2-0.2-0.2-0.5-0.1-0.7 0.1-0.5 0.5-1.2 1-2.2 -1.6 1.2-3.1 2.4-3.1 2.9 0 1.4 5.1 13.1 6.8 14.1 1.6 1 13.4 1.2 15.4 0 2-1.2 6.8-12.5 6.8-14.1 0-0.4-1.6-1.8-3.4-3.3 1.2 1.6 2 2.8 2.2 2.9 0.1 0.1 0 0.3-0.1 0.3 -0.1 0.1-0.3 0-0.3-0.1 -0.8-1.1-2-2.7-3.3-4.5 -0.4-0.3-0.8-0.6-1.1-0.9 -4.8-3.8-7.9-6.3-7.9-7.5 0-0.2 0.1-0.4 0.3-0.5 0.2-0.1 0.4-0.2 0.6-0.1 1.7 0.3 5.6 5 8.5 8.7 3.3 2.6 5.1 4.1 5.1 4.9 0 1.7-4.8 13.2-7 14.5C22.7 29.9 19.2 30.2 15.7 30.2zM11.7 4.1c-0.1 0-0.3 0.1-0.6 0.2C9.8 5 7.7 7.6 6.1 10c2.7-2 5.8-4.4 5.9-5.5 0-0.1 0-0.2-0.1-0.3C11.9 4.2 11.8 4.1 11.7 4.1zM16.9 1.7c-0.1 0-0.2 0-0.2 0 0 0-0.1 0.1-0.1 0.1 0 1 3.9 4.2 7.3 6.8C21.3 5.2 18.3 1.9 16.9 1.7 17 1.7 16.9 1.7 16.9 1.7z"/>' .
                             '</svg>';
                } else {
					$html .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46 11" class="mkdf-fullscreen-opener">' .
                                '<path d="M42.6 1c-1.2-0.5-2.4-0.8-3.6-0.2 -0.9 0.4-1.7 1.1-2.5 1.9 0-0.2 0-0.3 0-0.5 0-0.3-0.4-0.3-0.5 0 0 0.4-0.1 0.8-0.2 1.2 -0.3 0.4-0.6 0.8-0.9 1.2 -0.4 0.5 0.1 1.1 0.6 0.8 0 0.5 0 1.1 0.2 1.6 0.4 1.2 1.5 2.2 2.6 2.8 2.9 1.7 5-0.1 6.1-3C45.2 4.7 44.9 2 42.6 1zM43.5 6.4c-0.3 0.9-0.7 1.9-1.4 2.6 -1.4 1.3-3.4 0.5-4.6-0.7 -1.2-1.1-1.3-2.3-1.2-3.5 1.4-1.4 2.9-3.1 4.8-2.8C43.4 2.3 44.2 4.1 43.5 6.4z"/>' .
                                '<path d="M25.6 1c-1.2-0.5-2.4-0.8-3.6-0.2 -0.9 0.4-1.7 1.1-2.5 1.9 0-0.2 0-0.3 0-0.5 0-0.3-0.4-0.3-0.5 0 0 0.4-0.1 0.8-0.2 1.2 -0.3 0.4-0.6 0.8-0.9 1.2 -0.4 0.5 0.1 1.1 0.6 0.8 0 0.5 0 1.1 0.2 1.6 0.4 1.2 1.5 2.2 2.6 2.8 2.9 1.7 5-0.1 6.1-3C28.2 4.7 27.9 2 25.6 1zM26.5 6.4c-0.3 0.9-0.7 1.9-1.4 2.6 -1.4 1.3-3.4 0.5-4.6-0.7 -1.2-1.1-1.3-2.3-1.2-3.5 1.4-1.4 2.9-3.1 4.8-2.8C26.4 2.3 27.2 4.1 26.5 6.4z"/>' .
                                '<path d="M8.6 1C7.4 0.5 6.2 0.3 5 0.8 4 1.2 3.2 1.9 2.5 2.7c0-0.2 0-0.3 0-0.5 0-0.3-0.4-0.3-0.5 0 0 0.4-0.1 0.8-0.2 1.2C1.5 3.9 1.2 4.3 0.9 4.7 0.6 5.1 1.1 5.7 1.5 5.4c0 0.5 0 1.1 0.2 1.6 0.4 1.2 1.5 2.2 2.6 2.8 2.9 1.7 5-0.1 6.1-3C11.2 4.7 10.9 2 8.6 1zM9.5 6.4C9.3 7.3 8.8 8.3 8.1 8.9c-1.4 1.3-3.4 0.5-4.6-0.7C2.3 7.1 2.2 6 2.3 4.7c1.4-1.4 2.9-3.1 4.8-2.8C9.4 2.3 10.2 4.1 9.5 6.4z"/>' .
                             '</svg>';
				}
			}
		}
		
		return $html;
	}
}

if ( ! function_exists( 'pawfriends_mikado_is_customizer_item_enabled' ) ) {
	/**
	 * Function check is item enabled throw customizer options
	 *
	 * @param $item string - module path
	 * @param $option_name string - customizer option name
	 * @param $is_item_id_class bool
	 *
	 * @return bool
	 */
	function pawfriends_mikado_is_customizer_item_enabled( $item, $option_name, $is_item_id_class = false ) {
		$item_slug       = $is_item_id_class ? $item : basename( dirname( $item ) );
		$item_id_class   = str_replace( '-', '_', $item_slug );
		$item_option     = get_option( $option_name . $item_id_class );
		$is_item_enabled = empty( $item_option );
		
		return $is_item_enabled;
	}
}

if ( ! function_exists( 'pawfriends_mikado_add_repeater_field' ) ) {
	/**
	 * Generates meta box field object
	 * $attributes can contain:
	 *      $name - name of the field. This will be name of the option in database
	 *      $label - title of the option
	 *      $description
	 *      $field_type - type of the field that will be rendered and repeated
	 *      $parent - parent object to which to add field
	 *
	 * @param $attributes
	 *
	 * @return bool|RepeaterField
	 */
	function pawfriends_mikado_add_repeater_field( $attributes ) {
		$name        = '';
		$label       = '';
		$description = '';
		$fields      = array();
		$parent      = '';
		$button_text = '';
		$table_layout = false;
		
		extract( $attributes );
		
		if ( ! empty( $parent ) && ! empty( $name ) ) {
			$field = new PawFriendsMikadoClassRepeater( $fields, $name, $label, $description, $button_text, $table_layout );
			
			if ( is_object( $parent ) ) {
				$parent->addChild( $name, $field );
				
				return $field;
			}
		}
		
		return false;
	}
}

/**
 * Taxonomy fields function
 */
if ( ! function_exists( 'pawfriends_mikado_add_taxonomy_fields' ) ) {
	/**
	 * Adds new meta box
	 *
	 * @param $attributes
	 *
	 * @return bool|MikadoMetaBox
	 */
	function pawfriends_mikado_add_taxonomy_fields( $attributes ) {
		$scope = array();
		$name  = '';
		
		extract( $attributes );
		
		if ( ! empty( $scope ) ) {
			$tax_obj = new PawFriendsMikadoClassTaxonomyOption( $scope );
			pawfriends_mikado_framework()->mkdTaxonomyOptions->addTaxonomyOptions( $name, $tax_obj );
			
			return $tax_obj;
		}
		
		return false;
	}
}

if ( ! function_exists( 'pawfriends_mikado_add_taxonomy_field' ) ) {
	/**
	 * Generates meta box field object
	 * $attributes can contain:
	 *      $type - type of the field to generate
	 *      $name - name of the field. This will be name of the option in database
	 *      $label - title of the option
	 *      $description
	 *      $options - assoc array of option. Used only for select and radiogroup field types
	 *      $args - assoc array of additional parameters. Used for dependency
	 *      $parent - parent object to which to add field
	 *
	 * @param $attributes
	 *
	 * @return bool|RepeaterField
	 */
	function pawfriends_mikado_add_taxonomy_field( $attributes ) {
		$type        = '';
		$name        = '';
		$label       = '';
		$description = '';
		$options     = array();
		$args        = array();
		$parent      = '';
		
		extract( $attributes );
		
		if ( ! empty( $parent ) && ! empty( $name ) ) {
			$field = new PawFriendsMikadoClassTaxonomyField( $type, $name, $label, $description, $options, $args);
			if ( is_object( $parent ) ) {
				$parent->addChild( $name, $field );
				
				return $field;
			}
		}
		
		return false;
	}
}

/**
 * User fields function
 */
if ( ! function_exists( 'pawfriends_mikado_add_user_fields' ) ) {
	/**
	 * Adds new meta box
	 *
	 * @param $attributes
	 *
	 * @return bool|MikadoMetaBox
	 */
	function pawfriends_mikado_add_user_fields( $attributes ) {
		$scope = array();
		$name  = '';
		
		extract( $attributes );
		
		if ( ! empty( $scope ) ) {
			$user_obj = new PawFriendsMikadoClassUserOption( $scope );
			pawfriends_mikado_framework()->mkdUserOptions->addUserOptions( $name, $user_obj );
			
			return $user_obj;
		}
		
		return false;
	}
}

if ( ! function_exists( 'pawfriends_mikado_add_user_field' ) ) {
	/**
	 * Generates meta box field object
	 * $attributes can contain:
	 *      $type - type of the field to generate
	 *      $name - name of the field. This will be name of the option in database
	 *      $label - title of the option
	 *      $description
	 *      $options - assoc array of option. Used only for select and radiogroup field types
	 *      $args - assoc array of additional parameters. Used for dependency
	 *      $parent - parent object to which to add field
	 *
	 * @param $attributes
	 *
	 * @return bool|RepeaterField
	 */
	function pawfriends_mikado_add_user_field( $attributes ) {
		$type        = '';
		$name        = '';
		$label       = '';
		$description = '';
		$options     = array();
		$args        = array();
		$parent      = '';
		
		extract( $attributes );
		
		if ( ! empty( $parent ) && ! empty( $name ) ) {
			$field = new PawFriendsMikadoClassUserField( $type, $name, $label, $description, $options, $args );
			if ( is_object( $parent ) ) {
				$parent->addChild( $name, $field );
				
				return $field;
			}
		}
		
		return false;
	}
}

if ( ! function_exists( 'pawfriends_mikado_add_user_group' ) ) {
	/**
	 * Generates group object
	 * $attributes can contain:
	 *      $name - name of the group with which it will be added to parent element
	 *      $title - title of group
	 *      $description - description of group
	 *      $parent - parent object to which to add group
	 *
	 * @param $attributes
	 *
	 * @return bool|PawFriendsMikadoClassUserGroup
	 */
	function pawfriends_mikado_add_user_group( $attributes ) {
		$name        = '';
		$title       = '';
		$description = '';
		$parent      = '';
		
		extract( $attributes );
		
		if ( ! empty( $name ) && ! empty( $title ) && is_object( $parent ) ) {
			$group = new PawFriendsMikadoClassUserGroup( $title, $description );
			$parent->addChild( $name, $group );
			
			return $group;
		}
		
		return false;
	}
}

/**
 * Dashboard fields function
 */
if ( ! function_exists( 'pawfriends_mikado_add_dashboard_fields' ) ) {
	/**
	 * Adds new meta box
	 *
	 * @param $attributes
	 *
	 * @return bool|PawFriendsMikadoClassDashboardOption
	 */
	function pawfriends_mikado_add_dashboard_fields( $attributes ) {
		$name = '';
		
		extract( $attributes );
		
		if ( $name !== '') {
			$dash_obj = new PawFriendsMikadoClassDashboardOption();
			pawfriends_mikado_framework()->mkdDashboardOptions->addDashboardOptions( $name, $dash_obj );
			
			return $dash_obj;
		}
		
		return false;
	}
}

if ( ! function_exists( 'pawfriends_mikado_add_dashboard_form' ) ) {
	/**
	 * Generates form object
	 * $attributes can contain:
	 *      $name - name of the form with which it will be added to parent element
	 *      $parent - parent object to which to add form
	 *      $form_id - id of form generated
	 *      $form_method - method for form generated
	 *      $form_nonce - nonce for form generated
	 *
	 * @param $attributes
	 *
	 * @return bool|PawFriendsMikadoClassContainer
	 */
	function pawfriends_mikado_add_dashboard_form( $attributes ) {
		$name				= '';
		$form_id			= '';
		$form_method		= 'post';
		$form_action		= '';
		$form_nonce_action	= '';
		$form_nonce_name	= '';
		$button_label		= esc_html__('SUMBIT','pawfriends');
		$button_args		= array();
		$parent				= '';
		
		extract( $attributes );
		
		if ( ! empty( $name ) && is_object( $parent ) && $form_id !== '') {
			$container = new PawFriendsMikadoClassDashboardForm( $name, $form_id, $form_method, $form_action, $form_nonce_action, $form_nonce_name, $button_label, $button_args);
			$parent->addChild( $name, $container );
			
			return $container;
		}
		
		return false;
	}
}

if ( ! function_exists( 'pawfriends_mikado_add_dashboard_group' ) ) {
	/**
	 * Generates form object
	 * $attributes can contain:
	 *      $name - name of the form with which it will be added to parent element
	 *      $parent - parent object to which to add form
	 *
	 * @param $attributes
	 *
	 * @return bool|PawFriendsMikadoClassContainer
	 */
	function pawfriends_mikado_add_dashboard_group( $attributes ) {
		$name		 = '';
		$title 		 = '';
		$description = '';
		$parent		 = '';
		
		extract( $attributes );
		
		if ( ! empty( $name ) && is_object( $parent ) ) {
			$container = new PawFriendsMikadoClassDashboardGroup( $name, $title, $description );
			$parent->addChild( $name, $container );
			
			return $container;
		}
		
		return false;
	}
}

if ( ! function_exists( 'pawfriends_mikado_add_dashboard_section_title' ) ) {
	/**
	 * Generates dashboard title field
	 * $attributes can contain:
	 *      $parent - parent object to which to add title
	 *      $name - name of title with which to add it to the parent
	 *      $title - title text
	 *
	 * @param $attributes
	 *
	 * @return bool|PawFriendsMikadoClassDashboardTitle
	 */
	function pawfriends_mikado_add_dashboard_section_title( $attributes ) {
		$parent = '';
		$name   = '';
		$title  = '';
		$args   = array();
		
		extract( $attributes );
		
		if ( is_object( $parent ) && ! empty( $title ) && ! empty( $name ) ) {
			$section_title = new PawFriendsMikadoClassDashboardTitle( $name, $title, $args );
			$parent->addChild( $name, $section_title );
			
			return $section_title;
		}
		
		return false;
	}
}

if ( ! function_exists( 'pawfriends_mikado_add_dashboard_repeater_field' ) ) {
	/**
	 * Generates meta box field object
	 * $attributes can contain:
	 *      $name - name of the field. This will be name of the option in database
	 *      $label - title of the option
	 *      $description
	 *      $field_type - type of the field that will be rendered and repeated
	 *      $parent - parent object to which to add field
	 *
	 * @param $attributes
	 *
	 * @return bool|PawFriendsMikadoClassDashboardRepeater
	 */
	function pawfriends_mikado_add_dashboard_repeater_field( $attributes ) {
		$name        = '';
		$label       = '';
		$description = '';
		$fields      = array();
		$parent      = '';
		$button_text = '';
		$table_layout = false;
		$value = array();
		
		extract( $attributes );
		
		if ( ! empty( $parent ) && ! empty( $name ) ) {
			$field = new PawFriendsMikadoClassDashboardRepeater( $fields, $name, $label, $description, $button_text, $table_layout, $value);
			
			if ( is_object( $parent ) ) {
				$parent->addChild( $name, $field );
				
				return $field;
			}
		}
		
		return false;
	}
}

if ( ! function_exists( 'pawfriends_mikado_add_dashboard_field' ) ) {
	/**
	 * Generates dashboard field object
	 * $attributes can contain:
	 *      $type - type of the field to generate
	 *      $name - name of the field. This will be name of the option in database
	 *      $label - title of the option
	 *      $description
	 *      $options - assoc array of option. Used only for select and radiogroup field types
	 *      $args - assoc array of additional parameters. Used for dependency
	 *      $parent - parent object to which to add field
	 *      $hidden_property - name of option that hides field
	 *      $hidden_values - array of valus of $hidden_property that hides field
	 *
	 * @param $attributes
	 *
	 * @return bool|PawFriendsMikadoClassDashboardField
	 */
	function pawfriends_mikado_add_dashboard_field( $attributes ) {
		$type        = '';
		$name        = '';
		$label       = '';
		$description = '';
		$options     = array();
		$args        = array();
		$value       = '';
		$parent      = '';
		$repeat      = array();
		
		extract( $attributes );
		
		if ( ! empty( $parent ) && ! empty( $name ) ) {
			$field = new PawFriendsMikadoClassDashboardField( $type, $name, $label, $description, $options, $args, $value, $repeat);
			if ( is_object( $parent ) ) {
				$parent->addChild( $name, $field );
				
				return $field;
			}
		}
		
		return false;
	}
}