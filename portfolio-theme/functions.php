<?php

require_once get_theme_file_path('/includes/class-block-manager.php');

$block_manager = new Block_Manager('stevesblocktheme');
$block_manager->registerDynamicBlock('frontpageheader');