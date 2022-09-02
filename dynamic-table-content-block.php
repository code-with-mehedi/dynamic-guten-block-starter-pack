<?php
/**
 * Plugin Name:       Dynamic Table Content Block
 * Description:       Dynamic Table Blockx
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       dynamic-tb
 *
 * @package           create-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */

if(!defined('ABSPATH')){
    die;
}

// Define plugin url.
if(!defined('DNTB_PLUGIN_URL')){
    define('DNTB_PLUGIN_URL', plugin_dir_url(__FILE__));
}

// Define plugin path.
if(!defined('DNTB_PLUGIN_PATH')){
    define('DNTB_PLUGIN_PATH', plugin_dir_path(__FILE__));
}

add_action( 'plugins_loaded', 'dynamic_tb_load_text_domain' );
/**
 * Load localization files
 *
 * @return void
 */
function dynamic_tb_load_text_domain() {
    load_plugin_textdomain( 'dynamic-tb', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

// if( !class_exists('Dynamic_Table_Block')) {
// 	require DNTB_PLUGIN_PATH.'inc/class-dynamic-blocks.php';
	
// }


function wpdocs_create_blocks_mysite_block_init() {
     
    register_block_type( __DIR__ . '/build/block-posts',
        [
            'render_callback'=> 'block_post_callback'
        ]

    );
    register_block_type( __DIR__ . '/build/block-table',
        [
            'render_callback'=> 'block_table_callback'
        ]
    );
 
}
add_action( 'init', 'wpdocs_create_blocks_mysite_block_init' );

function block_post_callback(){
    ob_start();
        ?>
        <div class="frontend-post">
            <h3>Posts Table Callback</h3>
        <?php
    return ob_get_clean();
}

function block_table_callback(){
    ob_start();
        ?>
        <div class="frontend-table">
            <h3>Frontend Table Callback</h3>
        <?php
    return ob_get_clean();
}