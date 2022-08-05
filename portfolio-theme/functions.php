<?php

require_once get_theme_file_path('/inc/class-block-manager.php');


class Steves_Block_Theme {
    public $text_domain = 'stevesblocktheme';
    function __construct() {
        $block_manager = new Block_Manager('stevesblocktheme');
        add_action('wp_enqueue_scripts', [$this, 'frontend_assets']);
        add_action('init', [$this, 'register_block_pattern_categories']);
        add_action('init', [$this, 'register_block_patterns']);
        add_action('after_setup_theme', [$this, 'add_theme_supports']);

    }

    function add_theme_supports() {
        remove_theme_support( 'core-block-patterns' );
        add_theme_support( 'wp-block-styles' );
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

    function register_block_pattern_categories() {
        $block_pattern_categories = [
            'query' => ['label' => __('Query', $this->text_domain)]
        ];
        foreach ( $block_pattern_categories as $name => $properties ) {
            if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
                register_block_pattern_category( $name, $properties );
            }
        }
    }

    function register_block_patterns() {
        $block_patterns =[
            'query-project-card'
        ];
        foreach ( $block_patterns as $block_pattern ) {
            $pattern_file = get_theme_file_path( '/inc/patterns/' . $block_pattern . '.php' );
    
            register_block_pattern(
                'stevesblocktheme/' . $block_pattern,
                require $pattern_file
            );
        }
    }
}

$steves_block_theme = new Steves_Block_Theme();