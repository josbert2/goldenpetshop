<?php

include_once MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/sidebar/sidebar.php';
include_once MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/sidebar/mkdf-custom-sidebar.php';
include_once MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/sidebar/sidebar-functions.php';
include_once MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/sidebar/category-walker.php';

//load global sidebar options
include_once MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/sidebar/admin/options-map/sidebar-map.php';

//load per page sidebar options
include_once MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/sidebar/admin/meta-boxes/sidebar-meta-boxes.php';