<?php

/** 
 *  This script contains common functions which will used in all plugin.
 */


 /**
  * @param $data       its contains data which contains array or may be object.
  * @param $data_type  its a flag variable if true needs to display data with type or its false just print data.
  */

 if( ! function_exists('art_sync_debugger') ) {
    function art_sync_debugger( $data, $data_type = true ) {

        if( $data_type ) {
            echo '<pre>';
                var_dump($data);
            echo '</pre>';
        }

        if( ! $data_type ) {
            echo '<pre>';
                print_r($data);
            echo '</pre>';
        }
    }
 }
 

/**
 * @param $page_name we pass the page for create a new page
 */



if( ! function_exists('art_sync_create_page') ) {
    function art_sync_create_page( $page_title ) {
        if( $page_title ) {
            $page_check = get_page_by_title( $page_title );
            $default_template = ART_SYNC_PLUGIN_PATH . 'templates/art-sync-login.php';
            if( ! $page_check ) {
                $page_args = array(
                    'post_title'    => $page_title,
                    'post_status'   => 'publish',
                    'post_type'     => 'page',
                );

                $page_id = wp_insert_post( $page_args );

                if( $page_id && ! is_wp_error( $page_id ) ) {
                    update_post_meta( $page_id, '_wp_page_template', $default_template );
                }  
            }
        } 
    }
}



/**
 * @param $page_name we pass the page for delete the page
 */


 if( ! function_exists('art_sync_delete_page') ) {
    function art_sync_delete_page( $page_title ) {
        if( $page_title ) {
            $page = get_page_by_title($page_title, OBJECT, 'page');
            if ($page) {
                wp_delete_post($page->ID, true);
            } 
        }
    }
}

