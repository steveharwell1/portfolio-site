<?php

class Block_Manager {

    private $block_namespace;
    private $static_blocks = [];
    private $dynamic_blocks =[];

    function __construct($block_namespace, $has_render_callback=false) {
      $this->block_namespace = $block_namespace;
      add_action('init', [$this, 'onInit']);
    }
  
    function render_callback($attributes, $content) {
      ob_start();
      require get_theme_file_path("/blocks/frontpageheader/render.php");
      return ob_get_clean();
    }
  
    function onInit() {
        foreach ($this->dynamic_blocks as $block_name) {
            $options = [];
            $options['render_callback'] = [$this, "render_callback"];
            register_block_type(
              get_theme_file_path("/blocks/{$block_name}"),
              $options
            );
        }
    }

    function registerDynamicBlock($block_name) {
        $this->dynamic_blocks[] = $block_name;
    }
  }