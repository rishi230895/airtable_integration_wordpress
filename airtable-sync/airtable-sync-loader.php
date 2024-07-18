<?php

/*
 * Plugin Name:       Airtable Sync
 * Description:       Sync Airtable data with your website and provide REST API services.
 * Version:           1.0.0
 * Author:            Believin-Technologies Pvt Ltd (Suraj Prakash)
 * Author URI:        https://believintech.com
 * Text Domain:       airtable-sync
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

/** Define plugin path constants */

if( ! defined( 'ART_SYNC_PLUGIN_PATH' ) ) {
    define('ART_SYNC_PLUGIN_PATH', plugin_dir_path(__FILE__));
}

/** Requires files  */

require_once ART_SYNC_PLUGIN_PATH . 'includes/common/art-sync-common.php';
require_once ART_SYNC_PLUGIN_PATH . 'includes/constants/art-sync-constants.php';
require_once ART_SYNC_PLUGIN_PATH . 'includes/tables/art-sync-tables.php';
require_once ART_SYNC_PLUGIN_PATH . 'includes/settings/art-sync-settings.php';
require_once ART_SYNC_PLUGIN_PATH . 'includes/custom-post-types/art-sync-cpt.php';


/** Activation Plugin  */

if( ! function_exists('art_sync_activation') ) {
    function art_sync_activation() {
        /** create likes table in database */
        art_sync_create_likes_table();

        /** Create login page template */
        art_sync_create_page('test-ascs');
    }
}

register_activation_hook( __FILE__, 'art_sync_activation' );



/** Deactivate Plugin  */

if( ! function_exists('art_sync_delete_deactivation') ) {
    function art_sync_delete_deactivation() {
        /** Delete login page   */
        art_sync_delete_page('test-ascs');
    }
}

register_deactivation_hook( __FILE__, 'art_sync_delete_deactivation' );




/** Add settings option in plugin list  */

if( ! function_exists('art_sync_plugin_settings_link') ) {
    function art_sync_plugin_settings_link($links) {
        $settings_link = '<a href="' . admin_url('admin.php?page=airtable-settings') . '">' . __('Settings') . '</a>';
        array_unshift($links, $settings_link);
        return $links;
    }   
}

add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'art_sync_plugin_settings_link');

