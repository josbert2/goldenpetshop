<?php

if ( ! function_exists( 'pawfriends_mikado_sidearea_options_map' ) ) {
	function pawfriends_mikado_sidearea_options_map() {

        pawfriends_mikado_add_admin_page(
            array(
                'slug'  => '_side_area_page',
                'title' => esc_html__('Side Area', 'pawfriends'),
                'icon'  => 'fa fa-indent'
            )
        );

        $side_area_panel = pawfriends_mikado_add_admin_panel(
            array(
                'title' => esc_html__('Side Area', 'pawfriends'),
                'name'  => 'side_area',
                'page'  => '_side_area_page'
            )
        );

        pawfriends_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_type',
                'default_value' => 'side-menu-slide-from-right',
                'label'         => esc_html__('Side Area Type', 'pawfriends'),
                'description'   => esc_html__('Choose a type of Side Area', 'pawfriends'),
                'options'       => array(
                    'side-menu-slide-from-right'       => esc_html__('Slide from Right Over Content', 'pawfriends'),
                    'side-menu-slide-with-content'     => esc_html__('Slide from Right With Content', 'pawfriends'),
                    'side-area-uncovered-from-content' => esc_html__('Side Area Uncovered from Content', 'pawfriends'),
                ),
            )
        );

        pawfriends_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'text',
                'name'          => 'side_area_width',
                'default_value' => '',
                'label'         => esc_html__('Side Area Width', 'pawfriends'),
                'description'   => esc_html__('Enter a width for Side Area (px or %). Default width: 405px.', 'pawfriends'),
                'args'          => array(
                    'col_width' => 3,
                )
            )
        );

        $side_area_width_container = pawfriends_mikado_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_width_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_type' => 'side-menu-slide-from-right',
                    )
                )
            )
        );

        pawfriends_mikado_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'color',
                'name'          => 'side_area_content_overlay_color',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Color', 'pawfriends'),
                'description'   => esc_html__('Choose a background color for a content overlay', 'pawfriends'),
            )
        );

        pawfriends_mikado_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'text',
                'name'          => 'side_area_content_overlay_opacity',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Transparency', 'pawfriends'),
                'description'   => esc_html__('Choose a transparency for the content overlay background color (0 = fully transparent, 1 = opaque)', 'pawfriends'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        pawfriends_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_icon_source',
                'default_value' => 'predefined',
                'label'         => esc_html__('Select Side Area Icon Source', 'pawfriends'),
                'description'   => esc_html__('Choose whether you would like to use icons from an icon pack or SVG icons', 'pawfriends'),
                'options'       => pawfriends_mikado_get_icon_sources_array()
            )
        );

        $side_area_icon_pack_container = pawfriends_mikado_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_icon_pack_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'icon_pack'
                    )
                )
            )
        );

        pawfriends_mikado_add_admin_field(
            array(
                'parent'        => $side_area_icon_pack_container,
                'type'          => 'select',
                'name'          => 'side_area_icon_pack',
                'default_value' => 'font_elegant',
                'label'         => esc_html__('Side Area Icon Pack', 'pawfriends'),
                'description'   => esc_html__('Choose icon pack for Side Area icon', 'pawfriends'),
                'options'       => pawfriends_mikado_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'dripicons', 'simple_line_icons'))
            )
        );

        $side_area_svg_icons_container = pawfriends_mikado_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_svg_icons_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'svg_path'
                    )
                )
            )
        );

        pawfriends_mikado_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_icon_svg_path',
                'label'       => esc_html__('Side Area Icon SVG Path', 'pawfriends'),
                'description' => esc_html__('Enter your Side Area icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'pawfriends'),
            )
        );

        pawfriends_mikado_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_close_icon_svg_path',
                'label'       => esc_html__('Side Area Close Icon SVG Path', 'pawfriends'),
                'description' => esc_html__('Enter your Side Area close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'pawfriends'),
            )
        );

        $side_area_icon_style_group = pawfriends_mikado_add_admin_group(
            array(
                'parent'      => $side_area_panel,
                'name'        => 'side_area_icon_style_group',
                'title'       => esc_html__('Side Area Icon Style', 'pawfriends'),
                'description' => esc_html__('Define styles for Side Area icon', 'pawfriends')
            )
        );

        $side_area_icon_style_row1 = pawfriends_mikado_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row1'
            )
        );

        pawfriends_mikado_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_color',
                'label'  => esc_html__('Color', 'pawfriends')
            )
        );

        pawfriends_mikado_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_hover_color',
                'label'  => esc_html__('Hover Color', 'pawfriends')
            )
        );

        $side_area_icon_style_row2 = pawfriends_mikado_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row2',
                'next'   => true
            )
        );

        pawfriends_mikado_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_color',
                'label'  => esc_html__('Close Icon Color', 'pawfriends')
            )
        );

        pawfriends_mikado_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_hover_color',
                'label'  => esc_html__('Close Icon Hover Color', 'pawfriends')
            )
        );

        pawfriends_mikado_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'color',
                'name'        => 'side_area_background_color',
                'label'       => esc_html__('Background Color', 'pawfriends'),
                'description' => esc_html__('Choose a background color for Side Area', 'pawfriends')
            )
        );

        pawfriends_mikado_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'text',
                'name'        => 'side_area_padding',
                'label'       => esc_html__('Padding', 'pawfriends'),
                'description' => esc_html__('Define padding for Side Area in format top right bottom left', 'pawfriends'),
                'args'        => array(
                    'col_width' => 3
                )
            )
        );

        pawfriends_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'selectblank',
                'name'          => 'side_area_aligment',
                'default_value' => 'center',
                'label'         => esc_html__('Text Alignment', 'pawfriends'),
                'description'   => esc_html__('Choose text alignment for side area', 'pawfriends'),
                'options'       => array(
                    ''       => esc_html__('Default', 'pawfriends'),
                    'left'   => esc_html__('Left', 'pawfriends'),
                    'center' => esc_html__('Center', 'pawfriends'),
                    'right'  => esc_html__('Right', 'pawfriends')
                )
            )
        );
    }

    add_action('pawfriends_mikado_action_options_map', 'pawfriends_mikado_sidearea_options_map', pawfriends_mikado_set_options_map_position( 'sidearea' ) );
}