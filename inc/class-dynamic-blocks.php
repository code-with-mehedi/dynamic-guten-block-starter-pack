<?php

class Dynamic_Table_Block {
    
    public function __construct() {

        add_action( 'init', array( $this,'dynamic_tb_enqueue_block_assets' ));
        
    }

    public function dynamic_tb_enqueue_block_assets() {

        $settings_file = require DNTB_PLUGIN_PATH.'build/index.asset.php';

        //register the block editor scripts
        wp_register_script( 'dntb-editor-scripts', 
            DNTB_PLUGIN_URL.'build/index.js', 
            $settings_file['dependencies'],
            $settings_file['version'],
            true
        );

        //register_editor_style
        wp_register_style( 'dntb-editor-style', DNTB_PLUGIN_URL.'build/index.css');

        //register front-end style
        wp_register_style( 'dntb-frontend-style', DNTB_PLUGIN_URL.'build/style-index.css');

        //add the block and resgister the stylesheets

        register_block_type( 'dynamic-tb/table-block', 
        [
            'editor_script'        => 'dntb-editor-scripts',
            'editor_style'         => 'dntb-editor-style',
            'style'                => 'dntb-frontend-style',
            'render_callback'      => array( $this, 'dntb_block_callback' )
        ]);
    }

    public function dntb_block_callback() {
        echo "hello world";
    }

}

$dyamic_block= new Dynamic_Table_Block();