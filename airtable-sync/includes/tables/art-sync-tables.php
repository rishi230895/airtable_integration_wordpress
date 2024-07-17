<?php

/**
 *  This script includes functions for creating tables when the plugin is activated.
 * 
 */


 
/** Create a table for art sync create */

if( ! function_exists('art_sync_create_likes_table') ) {
    function art_sync_create_likes_table() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'art_sync_likes';
        $charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            post_id INT NOT NULL,
            user_id INT NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}