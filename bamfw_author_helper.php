<?php
/**
 * Plugin Name:     Bamfw_author_helper
 * Plugin URI:      https://github.com/Bundeslurch/bamfw_author_helper
 * Description:     acf save action to update post_author form lwm_author field
 * Author:          Sebastian Weiss
 * Author URI:      https://lightweb-media.de
 * Text Domain:     bamfw_author_helper
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Bamfw_author_helper
 */

// Your code starts here.


define('BAH_PATH', plugin_dir_path(__FILE__));

include( plugin_dir_path( __FILE__ ) . 'acf/acf.php');


add_action( 'acf/save_post', 'set_user_by_author_id', 10, 2 ); 

function set_user_by_author_id($post_id){
    $lwm_author = get_field('author', $post_id);
    if ($lwm_author){
        $arg = array(
            'ID' => $post_id,
            'post_author' => $lwm_author[0]['ID'],
        );
        wp_update_post( $arg );
    }
}
