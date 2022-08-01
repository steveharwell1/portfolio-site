<?php

require_once get_theme_file_path('/includes/class-block-manager.php');


class Steves_Block_Theme {
    function __construct() {
        $block_manager = new Block_Manager('stevesblocktheme');
        add_action('wp_enqueue_scripts', [$this, 'frontend_assets']);
    }

    function frontend_assets() {
        $asset = require( get_theme_file_path('build/index.asset.php') );

        wp_enqueue_style(
            'steves-theme-frontend',
            get_theme_file_uri('build/index.css'),
            [],
            $asset['version']
        );
    }
}

new Steves_Block_Theme();